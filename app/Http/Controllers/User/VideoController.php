<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video;

class VideoController extends Controller
{
    private $view;
    private $video;
    public function __construct(){
        $this->view = "pages.user.video.";
        $this->video = new Video();
    }
    public function index(){
        $video = $this->video::all();
        return view($this->view.'index',[
            'video' => $video,
        ]);
    }
}
