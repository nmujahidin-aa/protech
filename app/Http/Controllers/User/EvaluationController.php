<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    private $view;
    private $route;
    public function __construct(){
        $this->view = "pages.user.evaluation.";
        $this->route = "evaluation.";
    }

    public function index(){
        return view($this->view.'index');
    }
}
