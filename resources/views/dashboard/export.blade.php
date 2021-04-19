<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Aplikasi Kasir Restoran.xls");
?>

<h2>Data Daftar Menu </h2>
<table class="table" border=1>
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama Menu</th>
      <th scope="col">Harga Menu</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($daftar_menu as $ps)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$ps->nama_menu}}</td>
      <td>{{$ps->harga}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
<br><br>
