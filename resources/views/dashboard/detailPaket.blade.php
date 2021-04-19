@extends('templates/master')
@section('judul','Detail Menu')

@section('content')
<div class="content">
              @foreach ($data as $dt)
        <div class="row">
          <div class="col-md-4">
            <div class="card card-user">
              <div class="image">
                <img src="{{ asset('img/jan-sendereks.jpg')}}" alt="...">
              </div>
              <div class="card-body">
                <div class="author">
                  <a href="#">
                    <img class="avatar border-gray" height="100px;" width="100px;" src="{{asset('images/'.$dt->gambar)}}" alt="...">
                    <h5 class="title">{{$dt->nama_paket}}</h5>
                  </a>
                </div>
                <p class="description text-center">
                  <i>"{{$dt->keterangan}}"</i>"
                </p>
              </div>
              <div class="card-footer">
                <hr>
                <div class="button-container">
                  <div class="row">
                    <div class="col">
                      <center><h5><small>Rp.{{$dt->harga_paket}}</small></center>
                    </div>
                  </div>
                </div>
                @if(auth()->user()->role == 'Administrator')
                <hr>
                <div class="button-container">
                  <div class="row">
                    <div class="col">
                      <a href="/update/Paketmenu/{{$dt->id}}" class="btn btn-outline-warning">Update</a>
                    </div>
                    <div class="col">
                      <form action="/delete/Paketmenu/{{$dt->id}}" method="POST">
                        @csrf
                        @method('delete')
                        <button class="btn btn-outline-danger">Hapus</button>
                      </form>
                    </div>
                  </div>
                </div>
                @endif
              </div>
            </div>
          </div>
          <div class="col-md-8">
        @if (session('status'))
            <div class="alert alert-success my-3">
            {{ session('status') }}
            </div>
        @endif
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Pesanan</h5>
              </div>
              <div class="card-body">
                <form action="/add/OrderPaket/dibuat" method="POST">
                @csrf
                <input type="hidden" name="kode_paket" value="{{$dt->kode_paket}}">
                  <div class="row">
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label>Nama Paket</label>
                        <input type="text" name="nama_pesanan" class="form-control @error('nama_menu') is-invalid @enderror" readonly value="{{$dt->nama_paket}}">
                        @error('nama_menu')
                            <div class="alert alert-warning invalid-feedback">
                                <strong>Kesalahan!</strong> {{ $message }}
                            </div>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <hr>
                  <h4>Daftar Menu</h4>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Nama Menu</label>
                        <input type="text" name="nama_menu1" autocomplete="off" readonly value="{{$dt->nama_menu1}}" class="form-control  @error('nama_menu1') is-invalid @enderror" placeholder="Nama">
                        @error('nama_menu1')
                            <div class="alert alert-warning invalid-feedback">
                                <strong>Kesalahan!</strong> {{ $message }}
                            </div>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Nama Menu</label>
                        <input type="text" name="nama_menu2"value="{{$dt->nama_menu2}}" readonly autocomplete="off" class="form-control @error('nama_menu2') is-invalid @enderror" placeholder="Jumlah">
                        @error('nama_menu2')
                            <div class="alert alert-warning invalid-feedback">
                                <strong>Kesalahan!</strong> {{ $message }}
                            </div>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Nama Menu</label>
                        <input type="text" name="nama_menu3" value="{{$dt->nama_menu3}}" readonly autocomplete="off" class="form-control @error('nama_menu3') is-invalid @enderror" placeholder="Jumlah">
                        @error('nama_menu3')
                            <div class="alert alert-warning invalid-feedback">
                                <strong>Kesalahan!</strong> {{ $message }}
                            </div>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Nama Pemesan</label>
                        <input type="text" name="nama_pemesan" autocomplete="off" class="form-control  @error('nama_pemesan') is-invalid @enderror" placeholder="Nama">
                        @error('nama_pemesan')
                            <div class="alert alert-warning invalid-feedback">
                                <strong>Kesalahan!</strong> {{ $message }}
                            </div>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Jumlah Pesanan</label>
                        <input type="number" name="jumlah_pesanan" autocomplete="off" class="form-control @error('jumlah_pesanan') is-invalid @enderror" placeholder="Jumlah">
                        @error('jumlah_pesanan')
                            <div class="alert alert-warning invalid-feedback">
                                <strong>Kesalahan!</strong> {{ $message }}
                            </div>
                        @enderror
                      </div>
                    </div>
                  </div>
                <input type="hidden" name="email_pemesan" value="{{ Auth::user()->email }}" id="">
                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <button type="submit" class="btn btn-primary btn-round">Buat Pesanan</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
            

@endsection