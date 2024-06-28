<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Alert;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengguna = Pengguna::all();
        confirmDelete("Delete", "Are you sure you want to delete?");
        return view('admin.Penggna.index', compact('pengguna'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.Penggna.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required',
            'email'=>'required',
        ]);

        $pengguna= new Pengguna();
        $pengguna->name=$request->name;
        $pengguna->email=$request->email;
        $pengguna->save();
        Alert::success('Success', 'Data Berhasil di Tambahkan')->autoClose(2000);
        return redirect()->route('pengguna.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengguna $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pengguna= Pengguna::findOrFail($id);
        return view('admin.Penggna.edit', compact('pengguna'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'=>'required',
            'email'=>'required',
        ]);

        $pengguna= Pengguna::findOrFail($id);
        $pengguna->name=$request->name;
        $pengguna->email=$request->email;
        $pengguna->save();
        Alert::success('Success', 'Data Berhasil di Edit')->autoClose(2000);
        return redirect()->route('pengguna.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengguna $id)
    {
        //
    }
}
