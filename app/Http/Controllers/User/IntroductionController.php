<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Introduction;

class IntroductionController extends Controller
{
    public $view;
    public $introduction;
    public function __construct(){
        $this->view = "pages.user.introduction.";
        $this->introduction = new Introduction();
    }
    public function index(){
        return view($this->view."index");
    }

    public function learningObjectives(){
        $introduction = $this->introduction::first();
        return view($this->view."learning-objectives",[
            "introduction" => $introduction
        ]);
    }
    public function guide(){
        $introduction = $this->introduction::first();
        return view($this->view."guide",[
            "introduction" => $introduction
        ]);
    }
    public function stage(){
        $introduction = $this->introduction::first();
        return view($this->view."stage",[
            "introduction" => $introduction
        ]);
    }
}
