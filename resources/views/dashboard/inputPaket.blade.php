@extends('templates/master')
@section('judul','Input Paket Menu')

@section('content')

@if (session('status'))
<div class="alert alert-success my-3">
{{ session('status') }}
</div>
@endif

<form action="/add/paketMenu/dibuat" method="POST" enctype="multipart/form-data">
@csrf
<div class="form-group">
          <label>Nama Paket Menu</label>
            <input type="text" class="form-control col-md-6 @error('nama_paket') is-invalid @enderror" name="nama_paket" placeholder="masukan nama menu" autocomplete="off">
            @error('nama_paket')
              <div class="alert alert-warning invalid-feedback">
                  <strong>Kesalahan!</strong> {{ $message }}
              </div>
          @enderror
        </div>
  <hr>
  <div class="row">
    <div class="col-md-6 pr-1">
      <div class="form-group">
        <label>Nama Menu</label>
          <input type="text" class="form-control @error('nama_menu1') is-invalid @enderror" name="nama_menu1" placeholder="masukan nama menu" autocomplete="off">
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
            <input type="text" class="form-control @error('nama_menu2') is-invalid @enderror" name="nama_menu2" placeholder="masukan nama menu" autocomplete="off">
            @error('nama_menu2')
              <div class="alert alert-warning invalid-feedback">
                  <strong>Kesalahan!</strong> {{ $message }}
              </div>
          @enderror
        </div>
    </div>
  </div>
        <div class="form-group">
          <label>Nama Menu</label>
            <input type="text" class="form-control col-md-6 @error('nama_menu3') is-invalid @enderror" name="nama_menu3" placeholder="masukan nama menu" autocomplete="off">
            @error('nama_menu3')
              <div class="alert alert-warning invalid-feedback">
                  <strong>Kesalahan!</strong> {{ $message }}
              </div>
          @enderror
        </div>
  <hr>
  <div class="form-group">
    <label for="exampleFormControlInput1">Harga</label>
    <input type="number" class="form-control col-md-6 @error('harga') is-invalid @enderror" name="harga" placeholder="masukan harga Paket" autocomplete="off">
    @error('harga')
        <div class="alert alert-warning invalid-feedback">
            <strong>Kesalahan!</strong> {{ $message }}
        </div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleFormControlFile1">Masukan Gambar</label>
    <input type="file" class="form-control-file @error('gambar') is-invalid @enderror" name="gambar" id="exampleFormControlFile1">
    @error('gambar')
        <div class="alert alert-warning invalid-feedback">
            <strong>Kesalahan!</strong> {{ $message }}
        </div>
    @enderror
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="form-group">
        <label>Keterangan Paket</label>
        <textarea class="form-control textarea" name="keterangan"></textarea>
        @error('keterangan')
        <div class="alert alert-warning invalid-feedback">
            <strong>Kesalahan!</strong> {{ $message }}
        </div>
        @enderror 
      </div>
    </div>
  </div>
  <button class="btn btn-info" type="submit">Buat Pesanan</button>
</form>

@endsection