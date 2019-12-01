<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

use Symfony\Component\Console\Output\ConsoleOutput;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255',],
            'password' => ['required', 'string', 'min:8',],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data, Request $request)
    {
        if($request->hasFile('avatar')){
            $aFile = $request->file('avatar');
            $aFilename = time().$aFile->getClientOriginalName();
            $aFile->move(public_path().'/avatar/', $aFilename);
        }
        if($request->hasFile('portrait')){
            $pFile = $request->file('portrait');
            $pFilename = time().$pFile->getClientOriginalName();
            $pFile->move(public_path().'/portrait/', $pFilename);
        }

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'username' => $data['username'],
            'phone' => $data['phone'],
            'address' => $data['address'],
            'description' => $data['description'],
            'avatar' => $aFilename,
            'portrait' => $pFilename,
        ]);

        $role = Role::select('id')->where('name', 'user')->first();
        $user->roles()->attach($role);

        return $user;
    }
}
