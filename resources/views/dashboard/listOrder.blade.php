@extends('templates/master')
@section('judul','ListOrder')

@section('content')
<H2>List Order</H2>
<hr>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama Pemesan</th>
      <th scope="col">Nama Menu</th>
      <th scope="col">Jumlah Menu</th>
      <th scope="col">Total Harga Menu</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  @foreach($data as $dt)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$dt->nama_pemesan}}</td>
      <td>{{$dt->nama_pesanan}}</td>
      <td>{{$dt->jumlah_pesanan}}</td>
      <td>Rp.{{$dt->harga_pesanan}}</td>
      <td>
        <a href="#" class="badge badge-success">Bukti Pembayaran</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection