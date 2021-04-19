<?php

namespace App\Http\Controllers;

use App\Pesanan;
use App\User;
use App\PaketMenu;

use App\Mail\pesananBerhasil;
use App\Mail\pesananPaket;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class PesananController extends Controller
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
            'nama_pemesan'      => 'required',
            'jumlah_pesanan'    => 'required',
            'email_pemesan'     => 'required',
            'nama_pesanan'      => 'required'
        ]);

        $nama_menu  = $request->nama_pesanan;
        
        $menu = DB::table('daftarmenu')->where('nama_menu','=',$nama_menu)->get();

        foreach($menu as $mn){
            $harga_menu  = $mn->harga;
        }

        $harga_pesanan = $harga_menu * $request->jumlah_pesanan;

        $data   = ([
            'nama_pemesan'      => $request->nama_pemesan,
            'jumlah_pesanan'    => $request->jumlah_pesanan,
            'nama_pesanan'      => $request->nama_pesanan,
            'total_harga'       => $harga_pesanan
        ]);

        Mail::to($request->email_pemesan)->send(new pesananBerhasil($data));
        
        Pesanan::create([
            'kode_pesanan'      => rand(0,100000000),
            'nama_pemesan'      => $request->nama_pemesan,
            'nama_pesanan'      => $nama_menu,
            'harga_pesanan'     => $harga_pesanan,
            'jumlah_pesanan'    => $request->jumlah_pesanan,
            'email_pemesan'     => $request->email_pemesan
        ]);

        // Mail::to($request->email_pemesan())->send(new PesananEmail());

        return back()->with('status','Pesanan Berhasil dibuat');
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

    public function listOrder()
    {
        $data = Pesanan::all();
        return view('dashboard/listOrder',['data' => $data]);
    }

    public function export()
    {
        $daftar_menu    = DB::table('daftarMenu')->get();
        $administrator  = User::where('role','=','Administrator');
        $waiter  = User::where('role','=','Waiter')->get();
        $kasir  = User::where('role','=','Kasir')->get();
        $owner  = User::where('role','=','Owner')->get();
        $pelanggan  = User::where('role','=','Pelanggan')->get();

        return view('dashboard/export',['daftar_menu' => $daftar_menu]);
    }

    public function storePaket(Request $request)
    {
        $this->validate($request,[
            'kode_paket'        => 'required',
            'nama_menu1'        => 'required',
            'nama_menu2'        => 'required',
            'nama_menu3'        => 'required',
            'nama_pemesan'      => 'required',
            'jumlah_pesanan'    => 'required'
        ]);

        $nama_pesanan   = "$request->nama_menu1 , $request->nama_menu2 , $request->nama_menu3";

        $harga_pesanan  = DB::table('paketmenu')->where('kode_paket','=',$request->kode_paket)->get();

        foreach ($harga_pesanan as $dt) {
            $harga_pesanan = $dt->harga_paket;
        }

        $harga_pesanan  = $harga_pesanan * $request->jumlah_pesanan;

        $data   = ([
            'kode_paket'        => $request->kode_paket,
            'nama_paket'        => $request->nama_pesanan,
            'nama_pemesan'      => $request->nama_pemesan,
            'nama_pesanan'      => $nama_pesanan,
            'total_harga'       => $harga_pesanan,
            'jumlah_pesanan'    => $request->jumlah_pesanan
        ]);

        Mail::to($request->email_pemesan)->send(new pesananPaket($data));

        Pesanan::create([
            'kode_pesanan'      => rand(0,100000000),
            'nama_pemesan'      => $request->nama_pemesan,
            'nama_pesanan'      => $nama_pesanan,
            'harga_pesanan'     => $harga_pesanan,
            'jumlah_pesanan'    => $request->jumlah_pesanan,
            'email_pemesan'     => $request->email_pemesan
        ]);

        return back()->with('status','Pesanan Berhasil dibuat');

    }
}
