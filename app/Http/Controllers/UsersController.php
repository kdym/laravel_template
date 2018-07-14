<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['storeFirstUser']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function storeFirstUser(Request $request)
    {
        $user = new User;

        $user->fill($request->all());

        $user->password = Hash::make($request->password);
        $user->role = User::ADMIN;

        $user->save();

        return redirect()->route('home');
    }

    public function profile()
    {
        $user = User::find(Auth::user()->id);

        return view('users.profile', [
            'user' => $user
        ]);
    }

    public function updateProfile(Request $request)
    {
        $user = User::find(Auth::user()->id);

        $user->fill($request->all());

        if (!empty($request->new_password)) {
            $user->password = Hash::make($request->new_password);
        }

        $user->save();

        return redirect()->route('users.profile')->with('flash.success', 'Perfil salvo com sucesso');
    }
}
