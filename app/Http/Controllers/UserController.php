<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Gate;

use Symfony\Component\Console\Output\ConsoleOutput;

class UserController extends Controller
{
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*
    public function index()
    {

    }
    */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => ['required', 'string',],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email',],
            'username' => ['required', 'string', 'min:8', 'unique:users,username',],
            'password' => ['required', 'string', 'min:8',],
            'description' => ['required', 'string', 'max:100',],
            'avatar' => ['required',],
            'portrait' => ['required',],
        ];
        $messages = [
            'required' =>  'This field is required',
            'email' => 'The :attribute must be a valid address',
            'min' => 'Must be greater than :min characters',
            'max' => 'Only up to :max characters',
            'unique' => 'This :attribute is already taken',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {
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

            $username = strtolower($request->input('username'));

            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'username' => $username,
                'phone' => $request->input('phone'),
                'address' => $request->input('address'),
                'description' => $request->input('description'),
                'avatar' => $aFilename,
                'portrait' => $pFilename,
            ]);

            $role = Role::select('id')->where('name', 'user')->first();
            $user->roles()->attach($role);

            Auth::guard()->login($user);
            return redirect('/');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('account', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if(Auth::user()->id == $user->id){
            return view('edit', compact('user'));
        } else {
            return view('account', compact('user'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'name' => ['required', 'string',],
            'description' => ['required', 'string', 'max:100',],
        ];
        $messages = [
            'required' =>  'This field is required',
            'min' => 'Must be greater than :min characters',
            'max' => 'Only up to :max characters',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {
            if(Auth::user()->id == $user->id){
                $user->fill($request->except(['password', 'avatar', 'portrait']));
                if($request->hasFile('avatar')){
                    $path = public_path().'/avatar/'.$user->avatar;
                    if(File::exists($path)){
                        File::delete($path);
                    }

                    $aFile = $request->file('avatar');
                    $aFilename = time().$aFile->getClientOriginalName();
                    $aFile->move(public_path().'/avatar/', $aFilename);
                    $user->avatar = $aFilename;
                }
                if($request->hasFile('portrait')){
                    $path = public_path().'/portrait/'.$user->portrait;
                    if(File::exists($path)){
                        File::delete($path);
                    }

                    $pFile = $request->file('portrait');
                    $pFilename = time().$pFile->getClientOriginalName();
                    $pFile->move(public_path().'/portrait/', $pFilename);
                    $user->portrait = $pFilename;
                }
                if($request->input('password') != ""){
                    $user->password = Hash::make($request->input('password'));
                }

                $user->save();

                return view('account', compact('user'));
            } else {
                return view('account', compact('user'));
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $output = new ConsoleOutput();
        $output->writeln("Accessed function");
        if(Auth::user()->id != $user->id or Gate::allows('admin-users')){
            $path = public_path().'/avatar/'.$user->avatar;
            if(File::exists($path)){
                File::delete($path);
            }
            $path = public_path().'/portrait/'.$user->portrait;
            if(File::exists($path)){
                File::delete($path);
            }
            $user->delete();
            return redirect('/');
        } else if(Auth::user()->id == $user->id){
            $path = public_path().'/avatar/'.$user->avatar;
            if(File::exists($path)){
                File::delete($path);
            }
            $path = public_path().'/portrait/'.$user->portrait;
            if(File::exists($path)){
                File::delete($path);
            }
            Auth::logout();
            $user->delete();
            return redirect('/');
        }
    }
}
