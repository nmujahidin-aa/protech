<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Worksheet;
use Illuminate\Http\Request;
use App\Http\Requests\User\WorksheetRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class WorksheetController extends Controller
{
    private $view;
    private $route;
    private $worksheet;
    public function __construct(){
        $this->view = "pages.user.worksheet.";
        $this->route = "worksheet.";
        $this->worksheet = new Worksheet();
    }

    public function index(){
        $worksheet = $this->worksheet::first();
        return view($this->view.'index', [
            'worksheet' => $worksheet,
        ]);
    }

    public function edit(string $id = null)
    {
        $worksheet = null;
        $team = null;
        $members = [];

        if ($id) {
            $worksheet = $this->worksheet::findOrFail($id);
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
            'worksheet' => $worksheet,
            'team' => $team,
            'members' => $members,
        ]);
    }

    public function store(WorksheetRequest $request)
    {
        $filePath = null;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('lkpd', $fileName, 'public');
        }

        $data = $request->validated();
        if ($request->has('id')) {
            $worksheet = $this->worksheet::findOrFail($request->id);
            if ($filePath === null) {
                $filePath = $worksheet->file;
            } else {
                if ($worksheet->file && Storage::exists('public/' . $worksheet->file)) {
                    Storage::delete('public/' . $worksheet->file);
                }
            }
        }
        $data['file'] = $filePath;

        if ($request->has('id')) {
            $worksheet = $this->worksheet::findOrFail($request->id);
            $worksheet->update($data);
            alert()->html('Berhasil', 'Data berhasil diperbarui', 'success');
        } else {
            $this->worksheet::create($data);
            alert()->html('Berhasil', 'Data berhasil ditambahkan', 'success');
        }

        return redirect()->route($this->route.'index');
    }
}
