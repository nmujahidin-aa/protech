<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public $view;
    public function __construct()
    {
        $this->view = "pages.user.home.";
    }
    public function index()
    {
        return view($this->view."index");
    }
}
