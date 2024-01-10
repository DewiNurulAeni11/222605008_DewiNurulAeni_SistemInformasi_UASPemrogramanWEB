<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Pagination\Paginator;
use App\Models\User;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['data_user'] = User::orderBy('id', 'asc')->paginate(5);

        Paginator::useBootstrap();

        return view('user.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = new User();
        
        $user->id = $request->id;
        $user->name= $request->name;
        $user->email = $request->email;
        $user->password = $request->password;

        $user->save();

        return redirect()->route('user.index')->with('success', 'Data User Dengan Id : ' . $request->id . 'berhasil dibuat !.');
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
    public function edit(User $user)
    {
        return view('user.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = User::find($id);
        
        $user->id = $request->id;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        
        $user->save();

        return redirect()->route('user.index')->with('success', 'Data User Dengan Id : ' . $request->id . 'berhasil diupdate !.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('user.index')->with('success', 'Data User dengan Id : ' . $user->id . 'berhasil dihapus !.');
    }
}
