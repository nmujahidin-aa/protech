<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Log;
use App\Enums\RoleEnum;
use App\Models\User;
use Error;
class LoginController extends Controller
{
    private $view;
    public function __construct()
    {
        $this->view = "pages.auth.";
    }
    public function index(){
        if(Auth::check()){
            return redirect()->route('home.index');
        }
        return view($this->view."login");
    }

    public function post(LoginRequest $request)
    {
        try {
            $email = trim(htmlentities($request->input("email")));
            $password = trim(htmlentities($request->input("password")));
            $rememberme = $request->input('rememberme', false);

            $credentials = [
                'email' => $email,
                'password' => $password,
            ];

            if (Auth::attempt($credentials, $rememberme)) {
                // Ensure the role check is correct
                if (!Auth::user()->hasRole([RoleEnum::ADMINISTRATOR, RoleEnum::USER])) {
                    Auth::logout();
                    throw new \Exception("Anda tidak diperbolehkan mengakses menu ini");
                }

                // Determine the redirect URL based on the user's role
                $redirectUrl = Auth::user()->hasRole(RoleEnum::ADMINISTRATOR)
                    ? route('dashboard.dashboard.index')
                    : route('home.index');

                alert()->html('Berhasil', 'Login berhasil', 'success');

                // Return a JSON response with the redirect URL
                return response()->json([
                    'status' => 'success',
                    'redirect_url' => $redirectUrl
                ]);
            } else {
                throw new \Exception("Email / password tidak sesuai");
            }
        } catch (\Throwable $e) {
            Log::emergency($e->getMessage());
            alert()->html('Gagal', $e->getMessage(), 'error');
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 400);
        }
    }

}
