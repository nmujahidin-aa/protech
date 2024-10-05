<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Assignment;
use App\Models\Comment;

class AssignmentController extends Controller
{
    private $view;
    private $route;
    private $assignment;
    private $comment;
    public function __construct(){
        $this->view = "pages.admin.assignment.";
        $this->route = "dashboard.assignment.";
        $this->assignment = new Assignment();
        $this->comment = new Comment();
    }

    public function index(){
        $assignment = $this->assignment::all();
        $comment = $this->comment::all();

        return view($this->view.'index',[
            'assignment' => $assignment,
            'comment' => $comment,
        ]);
    }

    public function edit(string $id=null){
        $result = null;
        if ($id) {
            $result = $this->assignment::findOrFail($id);
        }
        return view($this->view.'edit', [
            'result' => $result,
        ]);
    }
}
