<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Worksheet;
use App\Http\Requests\Admin\WorksheetRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class WorksheetController extends Controller
{
    private $view;
    private $route;
    private $worksheet;
    public function __construct(){
        $this->view = "pages.admin.worksheet.";
        $this->route = "dashboard.worksheet.";
        $this->worksheet = new Worksheet();
    }
    public function index(){
        $worksheet = $this->worksheet::all();
        return view($this->view.'index',[
            'worksheet' => $worksheet,
        ]);
    }

    public function edit(string $id=null){
        $worksheet = null;
        if ($id) {
            $worksheet = $this->worksheet::findOrFail($id);
        }
        return view($this->view.'edit', [
            'worksheet' => $worksheet,
        ]);
    }

    public function store(WorksheetRequest $request)
    {
        $filePath = null;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('lkpd', $fileName, 'public');
        }

        $data = $request->validated();
        if ($request->has('id')) {
            $worksheet = $this->worksheet::findOrFail($request->id);
            if ($filePath === null) {
                $filePath = $worksheet->file;
            } else {
                if ($worksheet->file && Storage::exists('public/' . $worksheet->file)) {
                    Storage::delete('public/' . $worksheet->file);
                }
            }
        }
        $data['file'] = $filePath;

        if ($request->has('id')) {
            $worksheet = $this->worksheet::findOrFail($request->id);
            $worksheet->update($data);
            alert()->html('Berhasil', 'Data berhasil diperbarui', 'success');
        } else {
            $this->worksheet::create($data);
            alert()->html('Berhasil', 'Data berhasil ditambahkan', 'success');
        }

        return redirect()->route($this->route.'index');
    }
}
