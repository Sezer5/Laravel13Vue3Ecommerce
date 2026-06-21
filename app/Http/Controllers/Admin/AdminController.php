<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthAdminRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function login(){
        return view('admin.login');
    }

    public function auth(AuthAdminRequest $request){
        if($request->validated()){
            $credentials = $request->validated();
            if(Auth::attempt($credentials)){
                $request->session()->regenerate();
            }

            if(Auth::check() && Auth::user()->hasRole('admin')){
                return redirect()->route('admin.index');
            }else{
                Auth::logout();
                return redirect()->route('admin.login')->with([
                    'error' => 'Something went wrong'
                ]);
            }
        }
    }

    public function logout(){
        Auth::logout();
                return redirect()->route('admin.login')->with([
                    'error' => 'Something went wrong'
                ]);
    }
}
