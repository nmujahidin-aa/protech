<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\VideoRequest;
use App\Models\Video;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class VideoController extends Controller
{
    private $view;
    private $route;
    private $video;
    public function __construct(){
        $this->view = "pages.admin.video.";
        $this->route = "dashboard.video.";
        $this->video = new Video();
    }

    public function index(){
        $video = $this->video::all();
        return view($this->view.'index',[
            'video' => $video,
        ]);
    }

    public function edit(string $id=null){
        $video = null;
        if ($id) {
            $video = $this->video::findOrFail($id);
        }
        return view($this->view.'edit', [
            'video' => $video,
        ]);
    }

    public function store(VideoRequest $request)
    {
        $filePath = null;
        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $title = $request->input('title');
            $fileName = Str::slug($title). '-' . time() . '.' . $thumbnail->getClientOriginalExtension();
            $filePath = $thumbnail->storeAs('uploads', $fileName, 'public');
        }

        $data = $request->validated();
        if ($request->has('id')) {
            $video = $this->video::findOrFail($request->id);
            if ($filePath === null) {
                $filePath = $video->thumbnail;
            } else {
                if ($video->thumbnail && Storage::exists('public/' . $video->thumbnail)) {
                    Storage::delete('public/' . $video->thumbnail);
                }
            }
        }
        $data['thumbnail'] = $filePath;

        if ($request->has('id')) {
            $video = $this->video::findOrFail($request->id);
            $video->update($data);
            alert()->html('Berhasil', 'Data berhasil diperbarui', 'success');
        } else {
            $this->video::create($data);
            alert()->html('Berhasil', 'Data berhasil ditambahkan', 'success');
        }

        return redirect()->route($this->route.'index');
    }

    public function single_destroy($id)
    {
        try {
            $result = $this->video;
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

}
