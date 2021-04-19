<?php

namespace App\Http\Controllers;

use App\DaftarMenu;
use App\PaketMenu;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DaftarmenuController extends Controller
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
        return view('dashboard/inputmenu');
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
            'nama_menu'     => 'required',
            'harga'         => 'required',
            'gambar'        => 'required|file|image|mimes:jpg,png,jpeg,JPG,PNG,JPEG|max:2048',
            'keterangan'    => 'required'
        ]);


        // menyimpan data file yang diupload ke variabel $file
        $gambar = $request->file('gambar');
 
		$nama_gambar = time()."_".$gambar->getClientOriginalName();
 
      	// isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'images';

        $gambar->move($tujuan_upload,$nama_gambar);


        DaftarMenu::create([
            'nama_menu'     => $request->nama_menu,
            'harga'         => $request->harga,
            'gambar'        => $nama_gambar,
            'keterangan'    => $request->keterangan
        ]); 
        
        return back()->with('status','Data Menu berhasil dimasukan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data   = DB::table('daftarmenu')->where('id','=',$id)->get();
        
        return view('dashboard.detail',['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */ 
    public function edit($id)
    {
        $data = DB::table('daftarmenu')->where('id','=',$id)->get();

        return view('dashboard.updateMenu',['data' => $data]);
    }

    public function editPaketmenu($id)
    {
        $data = DB::table('paketmenu')->where('id','=',$id)->get();

        return view('dashboard.updatePaketmenu',['data' => $data]);
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
        $this->validate($request,[
            'nama_menu'     => 'required',
            'harga'         => 'required',
            'keterangan'    => 'required'
        ]);

        DaftarMenu::where('id','=',$id)
            ->update([  
                'nama_menu'     => $request->nama_menu,
                'harga'         => $request->harga,
                'keterangan'    => $request->keterangan
        ]);

        return redirect('/home')->with('status','Data berhasil di Update');
    }


    public function updatePaket(Request $request, $id)
    {
        $this->validate($request,[
            'nama_paket'            => 'required',
            'nama_menu1'            => 'required',
            'nama_menu2'            => 'required',
            'nama_menu3'            => 'required',
            'harga_paket'           => 'required',
            'keterangan'            => 'required',
        ]);

        PaketMenu::where('id','=',$id)
            ->update([  
                'nama_paket'            => $request->nama_paket,
                'nama_menu1'            => $request->nama_menu1,
                'nama_menu2'            => $request->nama_menu2,
                'nama_menu3'            => $request->nama_menu3,
                'harga_paket'           => $request->harga_paket,
                'keterangan'            => $request->keterangan,
        ]);

        return redirect('/paketMenu')->with('status','Data berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DaftarMenu::destroy($id);

        return redirect('/home')->with('status','Data menu berhasil dihapus');
    }

    public function destroyPaketmenu($id)
    {
        PaketMenu::destroy($id);

        return redirect('/paketMenu')->with('status','Data menu berhasil dihapus');
    }

    public function paketMenu()
    {
        $data   = PaketMenu::all();
        return view('dashboard.paketMenu',['data' => $data]);
    }

    public function create_paketMenu()
    {
        return view('dashboard.inputPaket');
    }

    public function store_paketMenu(Request $request)
    {
        $this->validate($request,[
            'nama_paket'    => 'required',
            'nama_menu1'    => 'required', 
            'nama_menu2'    => 'required', 
            'nama_menu3'    => 'required', 
            'harga'         => 'required',
            'keterangan'    => 'required',
            'gambar'        => 'required|file|image|mimes:jpg,png,jpeg,JPG,PNG,JPEG|max:2048'
        ]);

        // menyimpan data file yang diupload ke variabel $file
        $gambar = $request->file('gambar');
 
		$nama_gambar = time()."_".$gambar->getClientOriginalName();
 
      	// isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'images';

        $gambar->move($tujuan_upload,$nama_gambar);

        PaketMenu::create([
            'kode_paket'    => rand(0,100000000),
            'nama_paket'    => $request->nama_paket,
            'nama_menu1'    => $request->nama_menu1,
            'nama_menu2'    => $request->nama_menu2,
            'nama_menu3'    => $request->nama_menu3,
            'harga_paket'   => $request->harga,
            'gambar'        => $nama_gambar,
            'keterangan'    => $request->keterangan
        ]);

        return back()->with('status','Data Paket Menu berhasil dimasukan');

    }

    public function show_Paket($id)
    {
        $data   = PaketMenu::where('id','=',$id)->get();

        return view('dashboard.detailPaket',['data' => $data]);
    }
}
