<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Models\Barangjadi;

class BarangjadiController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['data_bj'] = Barangjadi::orderBy('id_bj', 'asc')->paginate(5);

        Paginator::useBootstrap();

        return view('barangjadi.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('barangjadi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_bj' => 'required',
            'nama' => 'required',
            'stock_min' => 'required',
            'stock' => 'required'
        ]);

        $barangjadi = new Barangjadi();
        
        $barangjadi->id_bj = $request->id_bj;
        $barangjadi->nama = $request->nama;
        $barangjadi->stock_min = $request->stock_min;
        $barangjadi->stock = $request->stock;

        $barangjadi->save();

        return redirect()->route('barangjadi.index')->with('success', 'Data Barang Jadi Dengan Id : ' . $request->id_bj . 'berhasil dibuat !.');
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
    public function edit(Barangjadi $barangjadi)
    {
        return view('barangjadi.edit', ['barangjadi' => $barangjadi]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_bj)
    {
        $request->validate([
            'nama' => 'required',
            'stock_min' => 'required',
            'stock' => 'required'
        ]);

        $barangjadi = Barangjadi::find($id_bj);
        
        $barangjadi->id_bj = $request->id_bj;
        $barangjadi->nama = $request->nama;
        $barangjadi->stock_min = $request->stock_min;
        $barangjadi->stock = $request->stock;

        $barangjadi->save();

        return redirect()->route('barangjadi.index')->with('success', 'Data Barang Jadi dengan Id : ' . $request->id_bj . 'berhasil diupdate !.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barangjadi $barangjadi)
    {
        $barangjadi->delete();

        return redirect()->route('barangjadi.index')->with('success', 'Data Barang Jadi dengan Id : ' . $barangjadi->id_bj . 'berhasil dihapus !.');
    }
}
