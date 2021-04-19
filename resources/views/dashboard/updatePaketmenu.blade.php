@extends('templates/master')
@section('judul','Input Update Paket Menu')

@section('content')

@if (session('status'))
<div class="alert alert-success my-3">
{{ session('status') }}
</div>
@endif

@foreach($data as $dt)
<form action="{{Route('updatePaketMenu',$dt->id)}}" method="post">
@csrf
@method('patch')
<div class="form-group">
          <label>Nama Paket Menu</label>
            <input type="text" value="{{$dt->nama_paket}}" class="form-control col-md-6 @error('nama_paket') is-invalid @enderror" name="nama_paket" placeholder="masukan nama menu" autocomplete="off">
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
          <input type="text" value="{{$dt->nama_menu1}}" class="form-control @error('nama_menu1') is-invalid @enderror" name="nama_menu1" placeholder="masukan nama menu" autocomplete="off">
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
            <input type="text" value="{{$dt->nama_menu2}}" class="form-control @error('nama_menu2') is-invalid @enderror" name="nama_menu2" placeholder="masukan nama menu" autocomplete="off">
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
            <input type="text" value="{{$dt->nama_menu3}}" class="form-control col-md-6 @error('nama_menu3') is-invalid @enderror" name="nama_menu3" placeholder="masukan nama menu" autocomplete="off">
            @error('nama_menu3')
              <div class="alert alert-warning invalid-feedback">
                  <strong>Kesalahan!</strong> {{ $message }}
              </div>
          @enderror
        </div>
  <hr>
  <div class="form-group">
    <label for="exampleFormControlInput1">Harga</label>
    <input type="number" value="{{$dt->harga_paket}}" class="form-control col-md-6 @error('harga_paket') is-invalid @enderror" name="harga_paket" placeholder="masukan harga Paket" autocomplete="off">
    @error('harga_paket')
        <div class="alert alert-warning invalid-feedback">
            <strong>Kesalahan!</strong> {{ $message }}
        </div>
    @enderror
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="form-group">
        <label>Keterangan Paket</label>
        <input type="text" value="{{$dt->keterangan}}" class="form-control col-md-6 @error('keterangan') is-invalid @enderror" name="keterangan" autocomplete="off">   
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
@endforeach

@endsection