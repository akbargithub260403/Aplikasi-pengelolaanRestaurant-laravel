<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Aplikasi Kasir Restoran.xls");
?>

<H2>List Orderan Pelanggan</H2>
<hr>
<table class="table" border=1>
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama Pemesan</th>
      <th scope="col">Nama Menu</th>
      <th scope="col">Jumlah Menu</th>
      <th scope="col">Total Harga Menu</th>
    </tr>
  </thead>
  <tbody>
  @foreach($dataOrder as $dto)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$dto->nama_pemesan}}</td>
      <td>{{$dto->nama_pesanan}}</td>
      <td>{{$dto->jumlah_pesanan}}</td>
      <td>Rp.{{$dto->harga_pesanan}}</td>
    </tr>
    @endforeach
  </tbody>
</table>

<br><br>

<H2>List Daftar Menu</H2>
<hr>
<table class="table" border=1>
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama Menu</th>
      <th scope="col">Harga</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  @foreach($dataMenu as $dtm)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$dtm->nama_menu}}</td>
      <td>Rp.{{$dtm->harga}}</td>
      <td>{{$dtm->keterangan}}</td>
    </tr>
    @endforeach
  </tbody>
</table>

<br><br>

<H2>List Daftar Paket Menu</H2>
<hr>
<table class="table" border=1>
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Kode Paket</th>
      <th scope="col">Nama Paket</th>
      <th scope="col">nama_menu1</th>
      <th scope="col">nama_menu2</th>
      <th scope="col">nama_menu3</th>
      <th scope="col">harga</th>
      <th scope="col">Keterangan</th>
    </tr>
  </thead>
  <tbody>
  @foreach($dataPaketMenu as $dtp)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$dtp->kode_paket}}</td>
      <td>{{$dtp->nama_paket}}</td>
      <td>{{$dtp->nama_menu1}}</td>
      <td>{{$dtp->nama_menu2}}</td>
      <td>{{$dtp->nama_menu3}}</td>
      <td>Rp.{{$dtp->harga}}</td>
      <td>{{$dtp->keterangan}}</td>
    </tr>
    @endforeach
  </tbody>
</table>

<br><br>

<H2>List Daftar Akun</H2>
<hr>
<table class="table" border=1>
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama</th>
      <th scope="col">Email</th>
      <th scope="col">Role</th>
    </tr>
  </thead>
  <tbody>
  @foreach($dataAkun as $dta)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$dta->name}}</td>
      <td>{{$dta->email}}</td>
      <td>{{$dta->role}}</td>
    </tr>
    @endforeach
  </tbody>
</table>