<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WhatsAppController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function send()
    {
        // Nomor WhatsApp penjual (format: 628xxxxxxxxxx)
        $phoneNumber = '6282283130010'; // Ganti dengan nomor WhatsApp penjual yang sebenarnya
        
        // Template pesan dengan informasi user
        $message = "Halo, saya " . auth()->user()->name . " tertarik dengan produk Floralish.\n";
        $message .= "Email: " . auth()->user()->email . "\n";
        $message .= "Mohon informasinya lebih lanjut.";
        
        // Encode pesan untuk URL
        $encodedMessage = urlencode($message);
        
        // Buat URL WhatsApp
        $whatsappUrl = "https://wa.me/{$phoneNumber}?text={$encodedMessage}";
        
        // Redirect ke WhatsApp
        return redirect($whatsappUrl);
    }
} 