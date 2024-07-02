<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use Illuminate\Http\Request;
use App\Models\Pengguna;

class TestimoniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimoni=Testimoni::all();
        return view('admin.Testimoni.index', compact('testimoni'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pengguna=Pengguna::all();
        return view('admin.Testimoni.create', compact('pengguna'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'id_pengguna'=>'required',
            'email'=>'required',
            'tanggapan'=>'required',
        ]);

        $testimoni= new Testimoni();
        $testimoni->id_pengguna=$request->id_pengguna;
        $testimoni->email=$request->email;
        $testimoni->tanggapan=$request->tanggapan;
        $testimoni->save();
        return redirect()->route('testimoni.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Testimoni $testimoni)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $testimoni=Testimoni::findOrFail($id);
        return view('admin.Testimoni.edit', compact('testimoni'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'id_pengguna'=>'required',
            'email'=>'required',
            'tanggapan'=>'required',
        ]);

        $testimoni= Testimoni::findOrFail($id);
        $testimoni->id_pengguna=$request->id_pengguna;
        $testimoni->email=$request->email;
        $testimoni->tanggapan=$request->tanggapan;
        $testimoni->save();
        return redirect()->route('testimoni.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $testimoni=Testimoni::findOrFail($id);
        $testimoni->delete();
        return redirect()->route('testimoni.index');
    }
}
