<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Str;

class RegistrationForm extends Component
{
    public $step = 1;
    public $type;
    public $progress = 0;

    // Campos para Empresa
    public $company_id;
    public $company_code;
    public $company_name;
    public $company_cnpj;
    public $company_address;
    public $company_password;
    public $company_password_confirmation;

    // Campos para Membro
    public $member_id;
    public $member_code;
    public $member_position;
    public $member_name;
    public $member_age;
    public $member_email;
    public $member_phone;
    public $member_cpf;
    public $member_password;
    public $member_password_confirmation;
    public $member_department;

    protected $rules = [
        // Regras para Empresa
        'company_code' => 'required_if:type,company|string',
        'company_name' => 'required_if:type,company|string|min:3',
        'company_cnpj' => 'required_if:type,company|numeric|digits:14',
        'company_address' => 'required_if:type,company|string',
        'company_password' => 'required_if:type,company|min:6|confirmed',

        // Regras para Membro
        'member_code' => 'required_if:type,person|string',
        'member_position' => 'required_if:type,person|string',
        'member_name' => 'required_if:type,person|string|min:3',
        'member_age' => 'required_if:type,person|numeric|min:18',
        'member_email' => 'required_if:type,person|email|unique:users,email',
        'member_phone' => 'required_if:type,person|numeric',
        'member_cpf' => 'required_if:type,person|numeric|digits:11',
        'member_password' => 'required_if:type,person|min:6|confirmed',
        'member_department' => 'required_if:type,person|string',
    ];

    public function selectType($type)
    {
        $this->type = $type;
        $this->step = 2;
        $this->progress = 50;

        // Gerar IDs aleatórios
        if ($type == 'company') {
            $this->company_id = Str::uuid()->toString();
        } else {
            $this->member_id = Str::uuid()->toString();
        }
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $this->validate();

        // Adicione lógica de registro de usuário aqui

        $this->progress = 100;
    }

    public function render()
    {
        return view('resources\views\livewire\registration-form.blade.php');
    }
}
