<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function store(Request $request, Product $product)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000'
        ]);

        $rating = Rating::updateOrCreate(
            [
                'user_id' => Auth::id(),
                'product_id' => $product->id
            ],
            [
                'rating' => $request->rating,
                'comment' => $request->comment
            ]
        );

        return back()->with('success', 'Rating berhasil disimpan!');
    }

    public function destroy(Product $product)
    {
        $rating = Rating::where('user_id', Auth::id())
            ->where('product_id', $product->id)
            ->first();

        if ($rating) {
            $rating->delete();
            return back()->with('success', 'Rating berhasil dihapus!');
        }

        return back()->with('error', 'Rating tidak ditemukan!');
    }
} 