@extends('layouts.app')
@section('content')
<div class="card shadow-lg border-0">
 <div class="card-body">
  <h4 class="card-title text-wardah">Tambahkan Produk Glowing Baru 💖</h4>
  <!-- PERBAIKAN PENTING: enctype="multipart/form-data" -->
  <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
   @csrf
   <div class="mb-3">
    <label for="nama_produk" class="form-label">Nama Produk</label>
    <input type="text" name="nama_produk" id="nama_produk" class="form-control" value="{{ old('nama_produk') }}">
    @error('nama_produk') <small class="text-danger">{{ $message }}</small> @enderror
   </div>
   <div class="mb-3">
    <label for="harga" class="form-label">Harga (IDR)</label>
    <!-- Perbaikan Harga: type="text" agar bisa menerima desimal (e.g., 37525.50) -->
    <input type="text" name="harga" id="harga" class="form-control" value="{{ old('harga') }}" placeholder="Gunakan titik (.) untuk desimal">
    @error('harga') <small class="text-danger">{{ $message }}</small> @enderror
   </div>
   <div class="mb-3">
    <label for="foto" class="form-label">Foto Produk (JPG/PNG)</label>
    <input type="file" name="foto" id="foto" class="form-control">
    @error('foto') <small class="text-danger">{{ $message }}</small> @enderror
   </div>
   <button type="submit" class="btn btn-wardah shadow">Simpan Produk</button>
   <a href="{{ route('products.index') }}" class="btn btn-secondary">Kembali</a>
  </form>
 </div>
</div>
@endsection