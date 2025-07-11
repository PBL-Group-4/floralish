# Laporan Eksplorasi OOP & MVC pada Fitur Order

## 1. Eksplorasi OOP (Object Oriented Programming)

### a. Contoh Class, Property, Method, dan Objek

| Nama Class         | Property         | Method                                 | Objek yang Memanggil         |
|--------------------|-----------------|----------------------------------------|------------------------------|
| Order (Model)      | $fillable       | (bawaan Eloquent: create, find, dst)   | $order = Order::create([...])|
| OrderController    | -               | checkout(), store(), success()         | Dipanggil oleh routing Laravel|
| Notification (Model)| $fillable      | (bawaan Eloquent: create)              | Notification::create([...])  |

### b. Contoh Kode Program PHP

#### Order Model (`app/Models/Order.php`)
```php
<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Order extends Model
{
    protected $fillable = [
        'user_id', 'product_id', 'name', 'address', 'phone', 'payment_proof', 'status'
    ];
}
```

#### OrderController (`app/Http/Controllers/OrderController.php`)
```php
<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
class OrderController extends Controller
{
    public function checkout($productId) { /* ... */ }
    public function store(Request $request) { /* ... */ }
    public function success() { /* ... */ }
}
```

#### Notification Model (`app/Models/Notification.php`)
```php
<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Notification extends Model
{
    protected $fillable = [
        'type', 'message', 'data'
    ];
}
```

#### Contoh Objek yang Memanggil Kelas
```php
// Membuat order baru (di OrderController)
$order = Order::create([
    'user_id' => Auth::id(),
    'product_id' => $request->product_id,
    'name' => $request->name,
    'address' => $request->address,
    'phone' => $request->phone,
    'payment_proof' => $paymentProofPath,
    'status' => 'pending'
]);

// Membuat notifikasi baru
Notification::create([
    'type' => 'order',
    'message' => "Pesanan baru #{$order->id} dari {$order->name} - {$product->name}",
    'data' => [
        'order_id' => $order->id,
        'customer_name' => $order->name,
        'product_name' => $product->name,
        'product_price' => $product->price
    ]
]);
```

### c. Hasil Program
- Saat user melakukan checkout dan submit order, maka:
  - Objek `$order` dibuat dari class `Order`
  - Objek notifikasi dibuat dari class `Notification`
  - Semua proses ini dijalankan oleh method di `OrderController`

---

## 2. Eksplorasi Konsep MVC

### a. File yang Dipilih
- **Model:** `app/Models/Order.php`
- **View:** `resources/views/checkout.blade.php` & `resources/views/orders/success.blade.php`
- **Controller:** `app/Http/Controllers/OrderController.php`

### b. Kode Program

#### Model: `app/Models/Order.php`
```php
<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Order extends Model
{
    protected $fillable = [
        'user_id', 'product_id', 'name', 'address', 'phone', 'payment_proof', 'status'
    ];
}
```

#### Controller: `app/Http/Controllers/OrderController.php`
```php
<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
class OrderController extends Controller
{
    public function checkout($productId)
    {
        $product = Product::findOrFail($productId);
        return view('checkout', compact('product'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'phone' => 'required|string|max:20',
            'payment_proof' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'product_id' => 'required|exists:products,id'
        ]);
        $paymentProofPath = $request->file('payment_proof')->store('payment-proofs', 'public');
        $product = Product::findOrFail($request->product_id);
        $order = Order::create([
            'user_id' => Auth::id(),
            'product_id' => $request->product_id,
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'payment_proof' => $paymentProofPath,
            'status' => 'pending'
        ]);
        Notification::create([
            'type' => 'order',
            'message' => "Pesanan baru #{$order->id} dari {$order->name} - {$product->name}",
            'data' => [
                'order_id' => $order->id,
                'customer_name' => $order->name,
                'product_name' => $product->name,
                'product_price' => $product->price
            ]
        ]);
        return redirect()->route('orders.success')->with('success', 'Pesanan Anda telah berhasil dibuat!');
    }
    public function success()
    {
        return view('orders.success');
    }
}
```

#### View: `resources/views/checkout.blade.php`
```blade
<form action="{{ route('orders.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="product_id" value="{{ $product->id }}">
    <label>Nama:</label>
    <input type="text" name="name" required>
    <label>Alamat:</label>
    <input type="text" name="address" required>
    <label>No. HP:</label>
    <input type="text" name="phone" required>
    <label>Bukti Pembayaran:</label>
    <input type="file" name="payment_proof" required>
    <button type="submit">Pesan</button>
</form>
```

#### View: `resources/views/orders/success.blade.php`
```blade
@if(session('success'))
    <div>{{ session('success') }}</div>
@endif
<p>Terima kasih, pesanan Anda telah berhasil dibuat!</p>
```

### c. Hasil Program
1. User membuka halaman checkout (`/checkout/{productId}`) → Controller `OrderController@checkout` menampilkan form dari view `checkout.blade.php`.
2. User mengisi form dan submit → Controller `OrderController@store` memproses data, menyimpan ke database lewat Model `Order`, dan membuat notifikasi.
3. Setelah berhasil, user diarahkan ke halaman sukses (`orders.success`) yang menampilkan view `orders/success.blade.php`.

---

**Disusun oleh: [Nama Anda]** 