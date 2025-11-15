@extends('layouts.app')
@section('content')
<a href="{{ route('products.create') }}" class="btn btn-wardah mb-3 shadow">+ Tambah Produk Glowing ✨</a>
<div class="table-responsive">
<table class="table table-bordered table-striped align-middle">
 <thead class="table-dark">
  <tr>
   <th>No</th>
   <th>Nama Produk</th>
   <th>Foto</th>
   <th>Harga</th>
   <th>Aksi</th>
  </tr>
 </thead>
 <tbody>
  <!-- Ganti $menus as $menu menjadi $products as $product -->
  @foreach($products as $product)
  <tr>
   <td>{{ $loop->iteration }}</td>
   <td>{{ $product->nama_produk }}</td>
   <td>
    @if($product->foto)
    <!-- Ganti $menu->foto menjadi $product->foto -->
    <img src="{{ asset('storage/'.$product->foto) }}" width="80" class="rounded">
    @else
    <small class="text-muted">Tidak ada</small>
    @endif
   </td>
   <td>Rp {{ number_format($product->harga, 0, ',', '.') }}</td>
   <td>
    <!-- Ganti menus.edit menjadi products.edit -->
    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
    <!-- Ganti menus.destroy menjadi products.destroy -->
    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline"
     onsubmit="return confirm('Yakin hapus produk ini? Tidak bisa dikembalikan lho!')">
     @csrf
     @method('DELETE')
     <button class="btn btn-danger btn-sm">Hapus</button>
    </form>
   </td>
  </tr>
  @endforeach
 </tbody>
</table>
</div>
@endsection