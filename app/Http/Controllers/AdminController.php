<?php

namespace App\Http\Controllers;

use App\Admin;
use App\DaftarMenu;
use App\PaketMenu;
use App\Pesanan;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminController extends Controller
{
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
        return view('dashboard.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            "name"          => "required",
            "email"         => "required",
            "role"          => "required",
            "password"      => "required|min:8"
        ]);

        Admin::create([
            "name"      => $request->name,
            "email"     => $request->email,
            "password"  => bcrypt($request->password),
            "role"      => $request->role,
            'remember_token'    => Str::random(60)
        ]);

        return back()->with('status','Data berhasil dimasukan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function export()
    {
        $dataOrder      = Pesanan::all();
        $dataMenu       = DaftarMenu::all();
        $dataPaketMenu  = PaketMenu::all();
        $dataAkun       = Admin::all();

        return view('Export.export',['dataOrder' => $dataOrder , 'dataMenu' => $dataMenu , 'dataPaketMenu' => $dataPaketMenu , 'dataAkun' => $dataAkun]);
    }
}
