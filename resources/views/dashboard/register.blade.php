@extends('templates/master')
@section('judul','Register')

@section('content')

@if (session('status'))
<div class="alert alert-success my-3">
{{ session('status') }}
</div>
@endif


<form method="POST" action="/register/add_Admin">
@csrf
  <div class="form-group">
    <label for="exampleFormControlInput1">Nama</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="masukan nama" autocomplete="off">
    @error('name')
        <div class="alert alert-warning invalid-feedback">
            <strong>Kesalahan!</strong> {{ $message }}
        </div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Email</label>
    <input type="email" class="form-control col-md-6 @error('email') is-invalid @enderror" name="email" placeholder="masukan email" autocomplete="off">
    @error('email')
        <div class="alert alert-warning invalid-feedback">
            <strong>Kesalahan!</strong> {{ $message }}
        </div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Role</label>
    <select class="form-control col-md-6" id="exampleFormControlSelect1" name="role" style="height:40px;">
      <option value="Administrator">Administrator</option>
      <option value="Waiter">Waiter</option>
      <option value="Kasir">Kasir</option>
      <option value="Owner">Owner</option>
      <option value="Pelanggan">Pelanggan</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Password</label>
    <input type="password" class="form-control col-md-6 @error('password') is-invalid @enderror" name="password" placeholder="masukan email" autocomplete="off">
    @error('password')
        <div class="alert alert-warning invalid-feedback">
            <strong>Kesalahan!</strong> {{ $message }}
        </div>
    @enderror
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection