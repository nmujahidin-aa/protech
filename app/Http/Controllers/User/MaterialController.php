<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    private $view;
    private $route;
    private $material;
    public function __construct(){
        $this->view = "pages.user.material.";
        $this->route = "material.";
        $this->material = new Material();
    }

    public function index(){
        $material = $this->material::all();
        return view($this->view.'index', [
            'material' => $material,
        ]);
    }
}
