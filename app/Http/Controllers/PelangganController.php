<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['pelanggan'] = Pelanggan::all();
        return view('admin.pelanggan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pelanggan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'firstname' => 'required',
            'lastname'  => 'required',
            'birthday'  => 'required|date',
            'gender'    => 'required|in:Male,Female',
            'email'     => 'required|email',
            'phone'     => 'required|numeric'
        ]);

        $data['firstname'] = $request->firstname;
        $data['lastname']  = $request->lastname;
        $data['birthday']  = $request->birthday;
        $data['gender']    = $request->gender;
        $data['email']     = $request->email;
        $data['phone']     = $request->phone;

        Pelanggan::create($data);
        return redirect()->route('pelanggan.index')->with('success', 'Penambahan data berhasil');
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
        $data['pelanggan'] = Pelanggan::findOrFail($id);
        return view('admin.pelanggan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname'  => 'required',
            'birthday'  => 'required|date',
            'gender'    => 'required|in:Male,Female',
            'email'     => 'required|email',
            'phone'     => 'required|numeric'
        ]);

        $pelanggan_id = $id;
        $pelanggan = Pelanggan::findOrFail($pelanggan_id);

        $pelanggan->firstname = $request->firstname;
        $pelanggan->lastname = $request->lastname;
        $pelanggan->birthday = $request->birthday;
        $pelanggan->gender = $request->gender;
        $pelanggan->email = $request->email;
        $pelanggan->phone = $request->phone;

        $pelanggan->save();
        return redirect()->route('pelanggan.index')->with('success', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->delete();
        return redirect()->route('pelanggan.index')->with('success', 'Data berhasil dihapus');
    }
}
