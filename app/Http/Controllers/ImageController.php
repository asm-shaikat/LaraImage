<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $validation =  $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'images' => 'required',
        ]);
        $user = new User();
        if($validation){
          $user->name = $request->input('name');
          $user->email = $request->input('email');
          $user->password = bcrypt($request->input('password'));
          if($request->hasFile('images')){
            $fileName = $request->file('images')->getClientOriginalName();
            $imagePath = $request->file('images')->storeAs('public/images', $fileName);
            $user->images = 'images/' . $fileName; 
          }
        }
        $user->save();
        return redirect()->back();
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
}
