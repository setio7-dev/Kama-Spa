<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $validateData = Validator::make($request->all(), [
            "email" => "required",
            "password" => "required",
        ]);

        if ($validateData->fails()) {
            return redirect()->route("login")->with([
                "route" => route("login"),
                "icon" => "error",
                "message" => "Data Harus Diisi!"
            ]);
        }

        $user = User::where("email", $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return redirect()->route("login")->with([
                "route" => route("login"),
                "icon" => "error",
                "message" => "Email / Kata Sandi Salah!"
            ]);
        }

        Auth::login($user);
        if ($user->role == "admin") {
            return redirect()->route("login")->with([
                "route" => route("adminDashboard"),
                "icon" => "success",
                "message" => "Masuk Berhasil!"
            ]);
        } else if ($user->role == "accounting") {
            return redirect()->route("login")->with([
                "route" => route("keuanganDashboard"),
                "icon" => "success",
                "message" => "Masuk Berhasil!"
            ]);
        } else if ($user->role == "leader") {
            return redirect()->route("login")->with([
                "route" => route("leaderDashboard"),
                "icon" => "success",
                "message" => "Masuk Berhasil!"
            ]);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route("login")->with([
            "route" => route("login"),
            "icon" => "success",
            "message" => "Logout Berhasil!"
        ]);
    }

    public function adminShow()
    {
        $auth = Auth::user();
        $user = User::where("id", $auth->id)->first();
        return view('admin.profile', compact('user'));
    }

    public function accountingShow()
    {
        $auth = Auth::user();
        $user = User::where("id", $auth->id)->first();
        return view('admin.profile', compact('user'));
    }

    public function leaderShow()
    {
        $auth = Auth::user();
        $user = User::where("id", $auth->id)->first();
        return view('admin.profile', compact('user'));
    }

    public function update(Request $request, $routes)
    {
        $auth = Auth::user();
        $user = User::where("id", $auth->id)->first();

        $user->name = $request->name ?? $user->name;        
        $user->email = $request->email ?? $user->email;        
        if ($request->filled('password')) {
            $user->password = $request->password;
        }
        $user->save();

        return redirect()->route($routes)->with([
            "route" => route($routes),
            "icon" => "success",
            "message" => "Ubah Profile Berhasil!"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
