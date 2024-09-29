<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Material;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\Admin\MaterialRequest;

class MaterialController extends Controller
{
    private $view;
    private $route;
    private $material;
    public function __construct(){
        $this->view = 'pages.admin.material.';
        $this->route = 'dashboard.material.';
        $this->material = new Material;
    }
    public function index(){
        $material = $this->material::all();
        return view($this->view.'index', [
            'material' => $material,
        ]);
    }

    public function edit(string $id=null){
        $material = null;
        if ($id) {
            $material = $this->material::findOrFail($id);
        }
        return view($this->view.'edit', [
            'material' => $material,
        ]);
    }

    public function store(MaterialRequest $request){
        if ($request->has('id')) {
            $material = $this->material::findOrFail($request->id);
            $material->update($request->validated());
            alert()->html('Berhasil','Data berhasil diperbarui','success');
            return redirect()->route($this->route.'index');
        } else {
            $this->material::create($request->validated());
            alert()->html('Berhasil','Data berhasil ditambahkan','success');
            return redirect()->route($this->route."index");
        }
    }

    public function single_destroy($id)
    {
        try {
            $result = $this->material;
            $result = $result->where('id',$id);
            $result = $result->first();

            $result->delete();

            alert()->html('Berhasil','Data berhasil dihapus','success');
            return redirect()->route($this->route."index");

        } catch (\Throwable $e) {
            Log::emergency($e->getMessage());

            alert()->error('Gagal',$e->getMessage());
            return redirect()->route($this->route."index");
        }
    }

    public function upload(Request $request){
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;
            $request->file('upload')->move(public_path('storage'), $fileName);

            $url = asset('storage/'.$fileName);
            return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]);
        }
    }
}
