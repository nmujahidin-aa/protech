<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Assignment;
use App\Http\Requests\User\AssignmentRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

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
        return view($this->view."index");
    }

    public function explore(){
        return view($this->view."explore");
    }

    public function edit(string $id = null)
    {
        $assignment = null;
        $team = null;
        $members = [];

        if ($id) {
            $assignment = $this->assignment::findOrFail($id);
        }

        $loggedInUserId = auth()->id();
        // Pengecekan apakah ada user_id yang cocok dengan auth->id;
        $team = DB::table('team_user')
                    ->join('teams', 'team_user.team_id', '=', 'teams.id')
                    ->where('team_user.user_id', $loggedInUserId)
                    ->select('teams.id','teams.name')
                    ->first();

        // Pengecekan jika terdapat $team maka foreach semua user_id sebagai member tim;
        if ($team) {
        $members = DB::table('team_user')
                    ->where('team_id', $team->id)
                    ->pluck('user_id');
                }

        return view($this->view . 'edit', [
            'assignment' => $assignment,
            'team' => $team,
            'members' => $members,
        ]);
    }

    public function store(AssignmentRequest $request)
    {
        $filePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $team = $request->input('team');
            $fileName = Str::slug($team). '-' . time() . '.' . $image->getClientOriginalExtension();
            $filePath = $image->storeAs('assignment', $fileName, 'public');
        }

        $data = $request->validated();
        if ($request->has('id')) {
            $assignment = $this->assignment::findOrFail($request->id);
            if ($filePath === null) {
                $filePath = $assignment->image;
            } else {
                if ($assignment->image && Storage::exists('public/' . $assignment->image)) {
                    Storage::delete('public/' . $assignment->image);
                }
            }
        }
        $data['image'] = $filePath;

        if ($request->has('id')) {
            $assignment = $this->$assignment::findOrFail($request->id);
            $assignment->update($data);
            alert()->html('Berhasil', 'Data berhasil diperbarui', 'success');
        } else {
            $this->$assignment::create($data);
            alert()->html('Berhasil', 'Data berhasil ditambahkan', 'success');
        }

        return redirect()->route($this->route.'index');
    }
}
