<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateUser;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function create(ValidateUser $request): RedirectResponse
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

        return redirect()->route('user.index')->with('success', 'Usuario creado correctamente.');
    }

    public function login(ValidateUser $request): RedirectResponse
    {
        $validated = $request->validated();

        $user = User::where('email', $validated['email'])->first();

        if (!$user || !Hash::check($validated['password'], $user->password)) {
            return redirect()->route('user.index')->with('error', 'Credenciales inválidas.');
        }

        $request->session()->put('user_id', $user->getID());
        $request->session()->put('role', $user->getRole());

        return redirect()->route('user.index')->with('success', 'Inicio de sesión exitoso.');
    }

}