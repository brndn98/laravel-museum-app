<?php

namespace App\Http\Controllers;

use App\Prueba;
use Illuminate\Http\Request;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Facades\Auth;

class MuserController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $musers = Prueba::all();

        return view('prueba', compact('musers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('signup');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $filename = time().$file->getClientOriginalName();
            $file->move(public_path().'/avatar/', $filename);
        }

        $muser = new Prueba();

        $muser->fullname = $request->input('fullname');
        $muser->username = $request->input('username');
        $muser->avatar = $filename;

        $muser->save();

        return 'Muser saved';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Prueba $muser)
    {
        return view('show', compact('muser'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Prueba $muser)
    {
        return view('edit', compact('muser'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prueba $muser)
    {
        $muser->fill($request->except('avatar'));
        if($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $filename = time().$file->getClientOriginalName();
            $file->move(public_path().'/avatar/', $filename);
            $muser->avatar = $filename;
        }

        $muser->save();

        return 'Muser updated';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
