@extends('layout.app')

@section('title', 'Home')
@section('page_title', 'Selamat datang di Berita Batam')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Selamat Pagi</h1>
    <p class="mb-4">Berikut adalah berita update di hari ini</p>

    @include('components.card', [
        'imgsrc' => 'image/flower.jpg',
        'title' => 'Gonggong goreng Tepung mak Limah',
        'desc' => 'Kuliner unik satu ini wajib dicoba untuk menguji ketahanan gigi.'
    ])
@endsection
    