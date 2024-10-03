<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Assignment;
use App\Http\Requests\User\AssignmentRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class AssignmentController extends Controller
{
    private $view;
    private $route;
    private $assignment;
    public function __construct(){
        $this->view = "pages.user.assignment.";
        $this->route = "assignment.";
        $this->assignment = new Assignment();
    }

    public function index(){
        $assignment = $this->assignment::first();

        $user = Auth::id();
        $team_id = DB::table('team_user')
                    ->where('user_id', $user)
                    ->value('team_id');
        if ($team_id) {
            $id = $team_id;
        } else {
            $id = null;
        }

        return view($this->view.'index', [
            'id' => $id,
            'assignment' => $assignment,
        ]);
    }

    public function explore(){
        $assignment = $this->assignment::all();
        return view($this->view."explore",[
            'assignment' => $assignment,
        ]);
    }

    public function edit(string $id = null)
    {
        $assignment = null;
        $team = null;
        $members = [];

        // Ambil user yang sedang login
        $loggedInUser = auth()->user();

        // Gunakan relasi untuk mengambil tim yang terkait dengan user yang sedang login
        $team = $loggedInUser->teams()->first(); // Ambil tim pertama yang terkait dengan user

        // Jika user memiliki tim, ambil semua anggotanya
        if ($team) {
            // Ambil anggota tim dengan relasi
            $members = $team->members()->get(); // Ambil semua member dari tim tersebut
        }

        $existingAssignment = $this->assignment::where('team_id', $id)->first();

        return view($this->view . 'edit', [
            'assignment' => $assignment,
            'team' => $team,
            'members' => $members,
            'id' => $id,
            'existingAssignment' => $existingAssignment,
        ]);
    }

    public function store(AssignmentRequest $request)
    {
        $filePath = null;
        if ($request->hasFile('image')) {
            $id = $request->team_id;
            $file = $request->file('image');
            $fileName = 'poster_kelompok_'.$id.'_'.time() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('assignment', $fileName, 'public');
        }

        $data = $request->validated();

        $existingAssignment = $this->assignment::where('team_id', $request->team_id)->first();

        if ($existingAssignment) {
            // If a record with the same team_id exists, update the assignment
            $assignment = $this->assignment::findOrFail($existingAssignment->id);

            if ($filePath === null) {
                $filePath = $assignment->image;
            } else {
                if ($assignment->image && Storage::exists('public/' . $assignment->image)) {
                    Storage::delete('public/' . $assignment->image);
                }
            }

            $data['image'] = $filePath;
            $assignment->update($data);
            alert()->html('Berhasil', 'Data berhasil diperbarui', 'success');
        } else {
            // If no record with the same team_id exists, create a new assignment
            $data['image'] = $filePath;
            $data['team_id'] = $request->team_id;
            $data['description'] = $request->description;
            $this->assignment::create($data);
            alert()->html('Berhasil', 'Data berhasil ditambahkan', 'success');
        }

        return redirect()->route($this->route.'index');
    }
}
