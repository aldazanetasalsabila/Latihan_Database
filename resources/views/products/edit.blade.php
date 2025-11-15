@extends('layouts.app')
@section('content')
<div class="card shadow-lg border-0">
 <div class="card-body">
  <h4 class="card-title text-wardah">Edit Produk Glowing</h4>
  <!-- Pastikan rute dan variabel sudah benar -->
  <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
   @csrf
   @method('PUT')
   <div class="mb-3">
    <label for="nama_produk" class="form-label">Nama Produk</label>
    <input type="text" name="nama_produk" id="nama_produk" class="form-control" value="{{ old('nama_produk', $product->nama_produk) }}">
    @error('nama_produk') <small class="text-danger">{{ $message }}</small> @enderror
   </div>
   <div class="mb-3">
    <label for="harga" class="form-label">Harga (IDR)</label>
    <!-- Perbaikan Harga: type="text" -->
    <input type="text" name="harga" id="harga" class="form-control" value="{{ old('harga', $product->harga) }}" placeholder="Gunakan titik (.) untuk desimal">
    @error('harga') <small class="text-danger">{{ $message }}</small> @enderror
   </div>
   <div class="mb-3">
    <label for="foto" class="form-label">Foto Produk (JPG/PNG)</label><br>
    @if($product->foto)
    <p class="text-muted">Foto lama:</p>
    <!-- Ganti $menu->foto menjadi $product->foto -->
    <img src="{{ asset('storage/'.$product->foto) }}" width="100" class="mb-2 rounded shadow-sm">
    @endif
    <input type="file" name="foto" id="foto" class="form-control">
    @error('foto') <small class="text-danger">{{ $message }}</small> @enderror
   </div>
   <button type="submit" class="btn btn-wardah shadow">Update Produk</button>
   <a href="{{ route('products.index') }}" class="btn btn-secondary">Kembali</a>
  </form>
 </div>
</div>
@endsection