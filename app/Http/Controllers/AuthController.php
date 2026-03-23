<?php

/** Made by: Samuel Martínez Arteaga */

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.index');
    }

    public function create(RegisterUserRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'],
        ]);

        $request->session()->put('user_id', $user->getID());
        $request->session()->put('role', $user->getRole());

        return redirect()->route('catalog.index');
    }

    public function login(LoginUserRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $user = User::where('email', $validated['email'])->first();

        if (! $user || ! Hash::check($validated['password'], $user->getPassword())) {
            return redirect()->route('auth.index')->with('error', 'Credenciales inválidas.');
        }

        $request->session()->put('user_id', $user->getID());
        $request->session()->put('role', $user->getRole());

        return redirect()->route('catalog.index');
    }

    public function logout(Request $request): RedirectResponse
    {
        $request->session()->flush();

        return redirect()->route('catalog.index');
    }
}
