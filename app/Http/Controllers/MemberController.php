<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class MemberController extends Controller
{
    // Existente

    // Novo
    public function create()
    {
        return view('register.member');
    }

    public function store(Request $request)
    {
        $request->validate([
            'member_code' => 'required|string',
            'member_name' => 'required|string|min:3',
            'member_age' => 'required|numeric|min:18',
            'member_email' => 'required|email|unique:users,email',
            'member_phone' => 'required|numeric',
            'member_cpf' => 'required|numeric|digits:11',
            'member_password' => 'required|min:6|confirmed',
            'member_department' => 'required|string',
        ]);

        User::create([
            'name' => $request->member_name,
            'email' => $request->member_email,
            'password' => bcrypt($request->member_password),
            'type' => 'member',
        ]);

        return redirect()->route('dashboard')->with('success', 'Membro registrado com sucesso!');
    }
}