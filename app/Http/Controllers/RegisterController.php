<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin;
use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{

    public function adminRegisterForm(Request $request)
    {
        return view('admin.adminRegister');
    }

    public function managerRegisterForm(Request $request)
    {
        return view('admin.managerRegister');
    }

    protected function adminValidator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:App\Models\Admin'],
            'password' => ['required', 'confirmed', Password::min(8)],
            'admin_level' => ['required', 'numeric'],
        ]);
    }

    protected function adminRegisterDatabase(array $data)
    {
        return Admin::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'admin_level' => $data['admin_level'],
            'VPN' => $data['VPN'],
        ]);
        return view('admin.login');
    }
    

    public function adminRegister(Request $request)
    {
        $this->adminValidator($request->all())->validate();
        $user = $this->adminRegisterDatabase($request->all());
        if ($user) {
            return view('admin.adminLogin', ['registered' => true, 'registered_email' => $user->email]);
        }
    }
}
