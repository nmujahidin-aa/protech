<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Worksheet;
use Illuminate\Http\Request;
use App\Http\Requests\User\WorksheetRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Team;
use App\Models\User;

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
            'worksheet' => $worksheet,
        ]);
    }

    public function edit(string $id = null)
    {
        $worksheet = null;
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

        $existingWorksheet = $this->worksheet::where('team_id', $id)->first();

        return view($this->view . 'edit', [
            'worksheet' => $worksheet,
            'team' => $team,
            'members' => $members,
            'id' => $id,
            'existingWorksheet' => $existingWorksheet,
        ]);
    }

    public function store(WorksheetRequest $request)
    {
        $filePath = null;
        if ($request->hasFile('file')) {
            $id = $request->team_id;
            $file = $request->file('file');
            $fileName = 'kelompok_'.$id.'_'.time() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('lkpd', $fileName, 'public');
        }

        $data = $request->validated();

        $existingWorksheet = $this->worksheet::where('team_id', $request->team_id)->first();

        if ($existingWorksheet) {
            // If a record with the same team_id exists, update the worksheet
            $worksheet = $this->worksheet::findOrFail($existingWorksheet->id);

            if ($filePath === null) {
                $filePath = $worksheet->file;
            } else {
                if ($worksheet->file && Storage::exists('public/' . $worksheet->file)) {
                    Storage::delete('public/' . $worksheet->file);
                }
            }

            $data['file'] = $filePath;
            $worksheet->update($data);
            alert()->html('Berhasil', 'Data berhasil diperbarui', 'success');
        } else {
            // If no record with the same team_id exists, create a new worksheet
            $data['file'] = $filePath;
            $data['team_id'] = $request->team_id;
            $this->worksheet::create($data);
            alert()->html('Berhasil', 'Data berhasil ditambahkan', 'success');
        }

        return redirect()->route($this->route.'index');
    }
}
