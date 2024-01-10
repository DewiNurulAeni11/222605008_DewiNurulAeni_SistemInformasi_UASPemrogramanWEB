<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bahanbaku;
use Illuminate\Pagination\Paginator;

class BahanbakuController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['data_bb'] = Bahanbaku::orderBy('id_bb', 'asc')->paginate(5);

        Paginator::useBootstrap();

        return view('bahanbaku.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bahanbaku.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_bb' => 'required',
            'nama' => 'required',
            'stock_min' => 'required',
            'stock' => 'required'
        ]);

        $bahanbaku = new Bahanbaku();
        
        $bahanbaku->id_bb = $request->id_bb;
        $bahanbaku->nama = $request->nama;
        $bahanbaku->stock_min = $request->stock_min;
        $bahanbaku->stock = $request->stock;

        $bahanbaku->save();

        return redirect()->route('bahanbaku.index')->with('success', 'Data Bahan Baku Dengan Id : ' . $request->id_bb . 'berhasil dibuat !.');
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
    public function edit(Bahanbaku $bahanbaku)
    {
        return view('bahanbaku.edit', ['bahanbaku' => $bahanbaku]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_bb)
    {
        $request->validate([
            'nama' => 'required',
            'stock_min' => 'required',
            'stock' => 'required'
        ]);

        $bahanbaku = Bahanbaku::find($id_bb);
        
        $bahanbaku->id_bb = $request->id_bb;
        $bahanbaku->nama = $request->nama;
        $bahanbaku->stock_min = $request->stock_min;
        $bahanbaku->stock = $request->stock;

        $bahanbaku->save();

        return redirect()->route('bahanbaku.index')->with('success', 'Data Bahan Baku dengan Id : ' . $request->id_bb . 'berhasil diupdate !.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bahanbaku $bahanbaku)
    {
        $bahanbaku->delete();

        return redirect()->route('bahanbaku.index')->with('success', 'Data Bahan Baku dengan Id : ' . $bahanbaku->id_bb . 'berhasil dihapus !.');
    }
}
