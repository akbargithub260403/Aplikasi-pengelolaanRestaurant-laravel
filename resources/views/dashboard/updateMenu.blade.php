@extends('templates/master')
@section('judul','Input Update Menu')

@section('content')


@if (session('status'))
<div class="alert alert-success my-3">
{{ session('status') }}
</div>
@endif

@foreach($data as $dt)
<form action="/update/berhasil/{{$dt->id}}" method="POST">
@csrf
@method('patch')
  <div class="form-group">
    <label for="exampleFormControlInput1">Nama Menu</label>
    <input type="text" value="{{$dt->nama_menu}}" class="form-control col-md-6 @error('nama_menu') is-invalid @enderror" name="nama_menu" placeholder="masukan nama menu" autocomplete="off">
    @error('nama_menu')
        <div class="alert alert-warning invalid-feedback">
            <strong>Kesalahan!</strong> {{ $message }}
        </div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Harga</label>
    <input type="number" value="{{$dt->harga}}" class="form-control col-md-6 @error('harga') is-invalid @enderror" name="harga" placeholder="masukan harga menu" autocomplete="off">
    @error('harga')
        <div class="alert alert-warning invalid-feedback">
            <strong>Kesalahan!</strong> {{ $message }}
        </div>
    @enderror
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="form-group">
        <label>Keterangan Makanan</label>
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