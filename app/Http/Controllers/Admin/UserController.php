<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\Admin\UserRequest;
use Illuminate\Support\Facades\Log;
use App\Enums\RoleEnum;


class UserController extends Controller
{
    private $view;
    private $route;
    private $user;
    public function __construct(){
        $this->view = 'pages.admin.user.';
        $this->route = 'dashboard.user.';
        $this->user = new User();
    }
    public function index(){
        $user = $this->user::whereHas('roles', function ($query) {
            $query->where('name', RoleEnum::USER);
        })->get();
        return view($this->view.'index', [
            'user' => $user,
        ]);
    }

    public function edit(string $id=null){
        $user = null;
        if ($id) {
            $user = $this->user::findOrFail($id);
        }
        return view($this->view.'edit', [
            'user' => $user,
        ]);
    }

    public function store(UserRequest $request)
    {
        if ($request->has('id')) {
            $user = $this->user::findOrFail($request->id);
            $data = $request->validated();

            // Jika password tidak diisi, hapus dari array agar tidak diubah
            if (!$request->filled('password')) {
                unset($data['password']);
            } else {
                // Jika password diisi, hash password baru
                $data['password'] = bcrypt($request->password);
            }

            // Set role menjadi User
            $user->update($data);
            $user->assignRole(RoleEnum::USER);
            alert()->html('Berhasil','Data berhasil diperbarui','success');
            return redirect()->route($this->route.'index');

        } else {
            $data = $request->validated();
            if ($request->filled('password')) {
                $data['password'] = bcrypt($request->password);
            }
            $user = $this->user::create($data);
            $user->assignRole(RoleEnum::USER);
            alert()->html('Berhasil','Data berhasil ditambahkan','success');
            return redirect()->route($this->route."index");
        }
    }


    public function single_destroy($id)
    {
        try {
            $result = $this->user;
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
