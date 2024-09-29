<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Admin\TeamRequest;
use Illuminate\Support\Facades\Log;


class TeamController extends Controller
{
    private $view;
    private $route;
    private $team;
    private $user;
    public function __construct()
    {
        $this->view = 'pages.admin.team.';
        $this->route = 'dashboard.team.';
        $this->team = new Team();
        $this->user = new User();
    }

    public function index()
    {
        $team = $this->team::all();
        $member = Team::with('members')->get();
        return view($this->view.'index',[
            'team' => $team,
            'member' => $member,
        ]);
    }

    public function edit(string $id=null)
    {
        $team = null;
        $users = $this->user::all();

        // Ambil user_id yang sudah terdaftar di team selain tim yang sedang diedit
        $usedUsers = DB::table('team_user')
            ->where('team_id', '!=', $id)
            ->pluck('user_id')
            ->toArray();

        // Ambil user_id yang terdaftar di tim yang sedang diedit
        $teamUserIds = [];
        if ($id) {
            $team = $this->team::findOrFail($id);
            $teamUserIds = DB::table('team_user')
                ->where('team_id', $team->id)
                ->pluck('user_id')
                ->toArray();
        }

        return view($this->view.'edit', [
            'team' => $team,
            'users' => $users,
            'usedUsers' => $usedUsers,
            'teamUserIds' => $teamUserIds, // Simpan user_id yang terkait dengan tim yang sedang diedit
        ]);
    }

    public function store(TeamRequest $request)
    {
        DB::beginTransaction();
        try {
            // Cek apakah ini update atau store berdasarkan ada tidaknya id di request
            if ($request->has('id')) {
                // Proses update
                $team = DB::table('teams')->where('id', $request->input('id'))->first();
                if (!$team) {
                    return redirect()->back()->with('error', 'Tim tidak ditemukan.');
                }

                // Update data tim
                DB::table('teams')->where('id', $team->id)->update([
                    'name' => $request->input('name'),
                    'description' => $request->input('description'),
                    'updated_at' => now(),
                ]);

                // Set teamId untuk update relasi team_user
                $teamId = $team->id;
            } else {
                // Proses store (buat data baru)
                $teamId = DB::table('teams')->insertGetId([
                    'name' => $request->input('name'),
                    'description' => $request->input('description'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            // Ambil user_id[] dari input form
            $newUserIds = $request->input('user_id');

            // Ambil user_id[] yang sudah ada di team_user untuk team ini
            $currentUserIds = DB::table('team_user')
                ->where('team_id', $teamId)
                ->pluck('user_id')
                ->toArray();

            // 1. Tambahkan user yang baru dipilih (yang belum ada di team_user)
            $usersToAdd = array_diff($newUserIds, $currentUserIds);
            foreach ($usersToAdd as $userId) {
                DB::table('team_user')->insert([
                    'team_id' => $teamId,
                    'user_id' => $userId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            // 2. Hapus user yang tidak dipilih lagi (dihapus dari team_user)
            $usersToRemove = array_diff($currentUserIds, $newUserIds);
            DB::table('team_user')
                ->where('team_id', $teamId)
                ->whereIn('user_id', $usersToRemove)
                ->delete();

            // Commit transaksi jika semua berhasil
            DB::commit();

            // Tentukan pesan sukses berdasarkan store atau update
            $message = $request->has('id')
                ? 'Tim dan anggotanya berhasil diperbarui.'
                : 'Tim dan anggotanya berhasil ditambahkan.';

            return redirect()->route('dashboard.team.index')->with('success', $message);
        } catch (\Exception $e) {
            // Rollback transaksi jika ada error
            DB::rollback();

            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function single_destroy($id)
    {
        try {
            $result = $this->team;
            $result = $result->where('id',$id);
            $result = $result->first();

            $result->delete();

            alert()->html('Berhasil','Data berhasil dihapus','success');
            return redirect()->route($this->route."index");

        } catch (\Throwable $e) {
            Log::emergency($e->getMessage());

            alert()->error('Gagal',$e->getMessage());
            return redirect()->route($this->route."index");
        }
    }
}
