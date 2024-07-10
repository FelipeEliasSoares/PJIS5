<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class CompanyController extends Controller
{
    // Existente

    // Novo
    public function create()
    {
        return view('register.company');
    }

    public function store(Request $request)
    {
        $request->validate([
            'company_code' => 'required|string',
            'company_name' => 'required|string|min:3',
            'company_cnpj' => 'required|numeric|digits:14',
            'company_address' => 'required|string',
            'company_password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->company_name,
            'email' => $request->company_email,
            'password' => bcrypt($request->company_password),
            'type' => 'company',
        ]);

        return redirect()->route('dashboard')->with('success', 'Empresa registrada com sucesso!');
    }
}