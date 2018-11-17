<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use \App\User;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public  function show () {
        redirect('/home');
    }

    public function edit ($id) {
        $user = User::find($id);
        return view('edit', ['user' => $user]);
    }

    public function delete (Request $request) {
        $user = User::find($request->id);
        $user->delete();
    }

    public  function update (Request $request, $id) {
        $user = User::find($id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = $request->get('password');
        $user->save();
        return view('home', ['users' =>
            User::all()]);
    }

    public function store (Request $request) {
        User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);
        $users = User::all();
        return view('home', ['users' =>
            $users]);
    }

    public function destroy ($id) {
        $user = User::find($id);
        $user->delete();
        return redirect('/home')->with
        ('success','Information has been  deleted');
    }

    public function index()
    {
        $users = User::all();
        return view('home', ['users' =>
            $users]);
    }
}
