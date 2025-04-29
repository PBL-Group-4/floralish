<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Florish.id - Lokasi</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&family=Roboto+Mono&family=Roboto:wght@400;700&display=swap" rel="stylesheet" />
  <style>
    body { font-family: 'Roboto', sans-serif; }
    .logo-font { font-family: 'Roboto Slab', cursive; font-weight: 700; }
    .btn-store {
      font-family: 'Roboto Mono', monospace;
      font-weight: 500;
      font-size: 0.875rem;
      letter-spacing: 0.15em;
    }
    .btn-pilih {
      font-family: 'Roboto Mono', monospace;
      font-weight: 600;
      font-size: 0.875rem;
      letter-spacing: 0.05em;
    }
  </style>
</head>
<body class="bg-gradient-to-b from-[#d1f0f5] to-[#a1d9db] min-h-screen">

  {{-- Template Navbar --}}
  {{-- @include('partials.navbar') --}}

  <!-- Hero Section -->
  <section class="max-w-6xl mx-auto mt-6 px-4 sm:px-6 md:px-10 lg:px-16 relative">
    <div class="rounded-3xl overflow-hidden relative flex justify-center">
    
    <img alt="Person holding white roses"
     class="rounded-3xl w-full max-w-4xl object-cover"
     src="{{ asset('image/lokasi_asset/Frame 2.png') }}" />

      <div class="absolute top-1/2 right-6 transform -translate-y-1/2 bg-white rounded-2xl p-6 max-w-md shadow-lg">
        <h2 class="font-bold text-lg sm:text-xl leading-tight mb-2 text-center">Toko Bunga & Florist Online Terlengkap, Kirim Se-Indonesia</h2>
        <p class="text-xs sm:text-sm font-semibold text-center mb-4">Toko bunga & florist online yang menghadirkan rangkaian bunga berkualitas tinggi...</p>
        <button class="btn-pilih bg-[#7eaeb5] text-white rounded-full px-5 py-2 mx-auto block shadow-md hover:bg-[#6a9ba3] transition-colors">Pilih Tujuan Pengiriman</button>
      </div>
    </div>
  </section>

  <!-- Features -->
  <section class="max-w-full mx-0 mt-6 px-4 sm:px-6 md:px-10 lg:px-16">
  <div class="bg-white rounded-2xl px-6 py-8 max-w-screen-xl mx-auto shadow-md flex flex-col sm:flex-row justify-between items-center gap-6">
    <!-- Item -->
    <div class="flex items-center gap-4 min-w-[200px] flex-1 justify-center sm:justify-start">
      <div class="text-[#7eaeb5] text-3xl"><i class="fas fa-shipping-fast"></i></div>
      <div>
        <div class="font-bold text-base sm:text-lg">Gratis Ongkir</div>
        <div class="text-gray-600 text-sm">Free Ongkir Pembelian Didalam Kota</div>
      </div>
    </div>

    <div class="flex items-center gap-4 min-w-[200px] flex-1 justify-center sm:justify-start">
      <div class="text-[#7eaeb5] text-3xl"><i class="far fa-map"></i></div>
      <div>
        <div class="font-bold text-base sm:text-lg">Jangkauan Luas</div>
        <div class="text-gray-600 text-sm">Kirim ke 200+ Kota di Indonesia</div>
      </div>
    </div>

    <div class="flex items-center gap-4 min-w-[200px] flex-1 justify-center sm:justify-start">
      <div class="text-[#7eaeb5] text-3xl"><i class="fas fa-shield-alt"></i></div>
      <div>
        <div class="font-bold text-base sm:text-lg">Keamanan Pembeli</div>
        <div class="text-gray-600 text-sm">Menjamin keamanan Data pembeli</div>
      </div>
    </div>

    <div class="flex items-center gap-4 min-w-[200px] flex-1 justify-center sm:justify-start relative">
      <div class="text-[#7eaeb5] text-3xl relative">
        <i class="fas fa-clock"></i>
        <div class="absolute top-[-0.5rem] left-1/2 transform -translate-x-1/2 bg-white rounded-full text-xs text-[#7eaeb5] font-bold w-5 h-5 flex items-center justify-center shadow-sm">24</div>
      </div>
      <div>
        <div class="font-bold text-base sm:text-lg">Garansi Waktu</div>
        <div class="text-gray-600 text-sm">Pesanan anda pasti tiba sesuai Jadwal</div>
      </div>
    </div>
  </div>
  </section>

  <!-- Offline Store / Lokasi -->
  <section class="max-w-6xl mx-auto mt-10 px-4 sm:px-6 md:px-10 lg:px-16 pb-10">
    <h3 class="text-white text-center text-lg sm:text-xl font-semibold tracking-widest mb-8">Temukan Offline Store kami</h3>
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 max-w-4xl mx-auto">
      @foreach(['Batam','Jakarta','Bandung','Surabaya','Medan','Padang','Palembang','Pekanbaru','Pontianak','Kupang','Ambon','Manado','Makassar','Banjarmasin','Samarinda'] as $city)
        <button class="btn-store bg-white rounded-full shadow-lg py-2 px-6 text-[#7eaeb5] hover:brightness-90 transition">{{ $city }}</button>
      @endforeach
    </div>
  </section>

</body>
</html>
