<!DOCTYPE html>
<html>
<head>
 <title>🌸 CRUD Produk Wardah Glowing 🌟</title>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">
 <style>
  /* Tema Warna Wardah */
  :root {
    --wardah-tosca: #9FE2BF; /* Hijau Tosca Muda */
    --wardah-light: #f0f8ff; /* Putih kebiruan */
    --wardah-accent: #ffb6c1; /* Pink Muda */
  }
  .bg-wardah { background-color: var(--wardah-light); }
  .text-wardah { color: var(--wardah-tosca); }
  .btn-wardah {
    background-color: var(--wardah-tosca);
    border-color: var(--wardah-tosca);
    color: #333; /* Teks gelap agar terbaca */
  }
  .btn-wardah:hover {
    background-color: #79d0a6; /* Warna sedikit lebih gelap saat hover */
    border-color: #79d0a6;
  }
  .table-wardah thead { background-color: var(--wardah-tosca); }
  .alert-success {
    background-color: #e0f7fa; /* Biru muda/cyan untuk sukses */
    border-color: #b2ebf2;
    color: #00796b;
  }
 </style>
</head>
<body class="bg-wardah">
<div class="container mt-4">
 <h2 class="text-center mb-4"><span class="text-wardah">✨</span> Katalog Produk Wardah <span class="text-wardah">💖</span></h2>
 @if(session('success'))
 <div id="alertMessage" class="alert alert-success alert-dismissible fade show"
role="alert">
 **Yeay!** {{ session('success') }} <span class="float-end">🎉</span>
 </div>
 <script>
 // Setelah 3 detik (3000 ms), sembunyikan alert
 setTimeout(() => {
 const alertBox = document.getElementById('alertMessage');
 if (alertBox) {
 alertBox.classList.remove('show');
 alertBox.classList.add('fade');
 setTimeout(() => alertBox.remove(), 500); // hapus elemen setelah animasi
 }
 }, 3000);
 </script>
@endif
 @yield('content')
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>