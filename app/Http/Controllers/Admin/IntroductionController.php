<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Introduction;
use App\Http\Requests\Admin\IntroductionRequest;

class IntroductionController extends Controller
{
    private $view;
    private $introduction;
    private $route;
    public function __construct(){
        $this->view = "pages.admin.introduction.";
        $this->introduction = new Introduction();
        $this->route = "dashboard.introduction.";
    }
    public function index(){
        $introduction = $this->introduction::all();
        return view($this->view."index",[
            'introduction' => $introduction,
        ]);
    }

    public function edit(string $id=null){
        $introduction = null;
        if ($id) {
            $introduction = $this->introduction::findOrFail($id);
        }
        return view($this->view.'edit', [
            'introduction' => $introduction,
        ]);
    }

    public function store(introductionRequest $request){
        if ($request->has('id')) {
            $introduction = $this->introduction::findOrFail($request->id);
            $introduction->update($request->validated());
            alert()->html('Berhasil','Data berhasil diperbarui','success');
            return redirect()->route($this->route.'index');
        } else {
            $this->introduction::create($request->validated());
            alert()->html('Berhasil','Data berhasil ditambahkan','success');
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
