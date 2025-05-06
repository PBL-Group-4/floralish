<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\LengthAwarePaginator;

class AdminController extends Controller
{
    /**
     * Menampilkan form login admin
     */
    public function showLoginForm()
    {
        return view('admin.login');
    }

    /**
     * Menampilkan form register admin
     */
    public function showRegisterForm()
    {
        return view('admin.register');
    }

    /**
     * Memproses register admin
     */
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $admin = Admin::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role_id' => 9998, // Admin role
        ]);

        return redirect()->route('admin.login')
            ->with('success', 'Akun admin berhasil dibuat. Silakan login.');
    }

    /**
     * Memproses login admin
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    /**
     * Menampilkan dashboard admin
     */
    public function dashboard()
    {
        $totalProducts = Product::count();
        $totalUsers = User::count();
        $totalAdmins = Admin::count();
        $totalAllUsers = $totalUsers + $totalAdmins;
        $popularProducts = Product::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalProducts',
            'totalUsers',
            'totalAdmins',
            'totalAllUsers',
            'popularProducts'
        ));
    }

    /**
     * Memproses logout admin
     */
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }

    public function products(Request $request)
    {
        $query = Product::query();

        // Filter berdasarkan lokasi
        if ($request->has('location') && $request->location != '') {
            $query->where('location', $request->location);
        }

        // Filter berdasarkan pencarian
        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
        }

        // Filter berdasarkan kategori
        if ($request->has('category') && $request->category != '') {
            $query->where('category', $request->category);
        }

        // Filter berdasarkan stok
        if ($request->has('stock_filter')) {
            switch ($request->stock_filter) {
                case 'in_stock':
                    $query->where('stock', '>', 10);
                    break;
                case 'low_stock':
                    $query->where('stock', '>', 0)->where('stock', '<=', 10);
                    break;
                case 'out_of_stock':
                    $query->where('stock', 0);
                    break;
            }
        }

        // Sorting
        if ($request->has('sort')) {
            switch ($request->sort) {
                case 'name_asc':
                    $query->orderBy('name', 'asc');
                    break;
                case 'name_desc':
                    $query->orderBy('name', 'desc');
                    break;
                case 'price_asc':
                    $query->orderBy('price', 'asc');
                    break;
                case 'price_desc':
                    $query->orderBy('price', 'desc');
                    break;
                case 'stock_asc':
                    $query->orderBy('stock', 'asc');
                    break;
                case 'stock_desc':
                    $query->orderBy('stock', 'desc');
                    break;
                default:
                    $query->latest();
                    break;
            }
        } else {
            $query->latest();
        }

        $products = $query->paginate(10);
        $locations = Product::distinct()->pluck('location')->filter();

        return view('admin.products.index', compact('products', 'locations'));
    }

    public function createProduct()
    {
        return view('admin.products.create');
    }

    public function storeProduct(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category' => 'required|in:Bunga,Karangan Bunga Papan,Kado & Cakes',
            'location' => 'nullable|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/products'), $imageName);
            $validated['image'] = 'images/products/' . $imageName;
        }

        Product::create($validated);

        return redirect()->route('admin.products.index')
            ->with('success', 'Produk berhasil ditambahkan');
    }

    public function editProduct(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function updateProduct(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category' => 'required|in:Bunga,Karangan Bunga Papan,Kado & Cakes',
            'location' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($product->image && file_exists(public_path($product->image))) {
                unlink(public_path($product->image));
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/products'), $imageName);
            $validated['image'] = 'images/products/' . $imageName;
        }

        $product->update($validated);

        return redirect()->route('admin.products.index')
            ->with('success', 'Produk berhasil diperbarui');
    }

    public function destroyProduct(Product $product)
    {
        // Hapus gambar produk jika ada
        if ($product->image && file_exists(public_path($product->image))) {
            unlink(public_path($product->image));
        }

        $product->delete();

        return redirect()->route('admin.products.index')
            ->with('success', 'Produk berhasil dihapus');
    }

    /**
     * Menampilkan daftar pengguna
     */
    public function users()
    {
        // Ambil data dari tabel users dan admins
        $users = User::latest()->get();
        $admins = Admin::latest()->get();
        
        // Gabungkan data users dan admins
        $allUsers = $users->concat($admins);
        
        // Urutkan berdasarkan created_at terbaru
        $allUsers = $allUsers->sortByDesc('created_at');
        
        // Buat pagination manual
        $page = request()->get('page', 1);
        $perPage = 10;
        $offset = ($page - 1) * $perPage;
        $items = $allUsers->slice($offset, $perPage);
        
        // Buat instance LengthAwarePaginator
        $paginatedItems = new \Illuminate\Pagination\LengthAwarePaginator(
            $items,
            $allUsers->count(),
            $perPage,
            $page,
            ['path' => request()->url()]
        );
        
        return view('admin.users.index', compact('paginatedItems'));
    }

    /**
     * Menampilkan form edit pengguna
     */
    public function editUser($id)
    {
        // Coba cari di tabel users
        $user = User::find($id);
        
        // Jika tidak ditemukan di users, cari di admins
        if (!$user) {
            $user = Admin::findOrFail($id);
        }
        
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Memperbarui data pengguna
     */
    public function updateUser(Request $request, $id)
    {
        // Coba cari di tabel users
        $user = User::find($id);
        
        // Jika tidak ditemukan di users, cari di admins
        if (!$user) {
            $user = Admin::findOrFail($id);
            $table = 'admins';
        } else {
            $table = 'users';
        }
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => "required|string|email|max:255|unique:{$table},email,{$id}",
            'role_id' => 'required|in:9998,9999',
        ]);

        $user->update($validated);

        return redirect()->route('admin.users.index')
            ->with('success', 'Data pengguna berhasil diperbarui');
    }

    /**
     * Menghapus pengguna
     */
    public function destroyUser($id)
    {
        // Coba cari di tabel users
        $user = User::find($id);
        
        // Jika tidak ditemukan di users, cari di admins
        if (!$user) {
            $user = Admin::findOrFail($id);
            
            // Cek jika admin mencoba menghapus dirinya sendiri
            if ($user->id === auth()->guard('admin')->id()) {
                return redirect()->route('admin.users.index')
                    ->with('error', 'Anda tidak dapat menghapus akun Anda sendiri');
            }
        }

        $user->delete();

        return redirect()->route('admin.users.index')
            ->with('success', 'Pengguna berhasil dihapus');
    }

    /**
     * Menampilkan detail pengguna
     */
    public function showUser($id)
    {
        // Coba cari di tabel users
        $user = User::find($id);
        
        // Jika tidak ditemukan di users, cari di admins
        if (!$user) {
            $user = Admin::findOrFail($id);
        }
        
        return view('admin.users.show', compact('user'));
    }

    /**
     * Menampilkan halaman pengaturan
     */
    public function settings()
    {
        return view('admin.settings');
    }

    /**
     * Menampilkan daftar produk Batam
     */
    public function batamProducts(Request $request)
    {
        $query = Product::where('location', 'batam');

        // Filter berdasarkan pencarian
        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
        }

        // Filter berdasarkan kategori
        if ($request->has('category') && $request->category != '') {
            $query->where('category', $request->category);
        }

        // Filter berdasarkan stok
        if ($request->has('stock_filter')) {
            switch ($request->stock_filter) {
                case 'in_stock':
                    $query->where('stock', '>', 10);
                    break;
                case 'low_stock':
                    $query->where('stock', '>', 0)->where('stock', '<=', 10);
                    break;
                case 'out_of_stock':
                    $query->where('stock', 0);
                    break;
            }
        }

        // Sorting
        if ($request->has('sort')) {
            switch ($request->sort) {
                case 'name_asc':
                    $query->orderBy('name', 'asc');
                    break;
                case 'name_desc':
                    $query->orderBy('name', 'desc');
                    break;
                case 'price_asc':
                    $query->orderBy('price', 'asc');
                    break;
                case 'price_desc':
                    $query->orderBy('price', 'desc');
                    break;
                case 'stock_asc':
                    $query->orderBy('stock', 'asc');
                    break;
                case 'stock_desc':
                    $query->orderBy('stock', 'desc');
                    break;
                default:
                    $query->latest();
                    break;
            }
        } else {
            $query->latest();
        }

        $products = $query->paginate(10);

        return view('admin.batam-products.index', compact('products'));
    }

    /**
     * Menampilkan form tambah produk Batam
     */
    public function createBatamProduct()
    {
        return view('admin.batam-products.create');
    }

    /**
     * Menyimpan produk Batam baru
     */
    public function storeBatamProduct(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category' => 'required|in:Bunga,Karangan Bunga Papan,Kado & Cakes',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/products'), $imageName);
            $validated['image'] = 'images/products/' . $imageName;
        }

        $validated['location'] = 'batam';
        Product::create($validated);

        return redirect()->route('admin.batam.products.index')
            ->with('success', 'Produk Batam berhasil ditambahkan');
    }

    /**
     * Menampilkan form edit produk Batam
     */
    public function editBatamProduct(Product $product)
    {
        if ($product->location !== 'batam') {
            return redirect()->route('admin.batam.products.index')
                ->with('error', 'Produk tidak ditemukan');
        }
        return view('admin.batam-products.edit', compact('product'));
    }

    /**
     * Memperbarui produk Batam
     */
    public function updateBatamProduct(Request $request, Product $product)
    {
        if ($product->location !== 'batam') {
            return redirect()->route('admin.batam.products.index')
                ->with('error', 'Produk tidak ditemukan');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category' => 'required|in:Bunga,Karangan Bunga Papan,Kado & Cakes',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($product->image && file_exists(public_path($product->image))) {
                unlink(public_path($product->image));
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/products'), $imageName);
            $validated['image'] = 'images/products/' . $imageName;
        }

        $product->update($validated);

        return redirect()->route('admin.batam.products.index')
            ->with('success', 'Produk Batam berhasil diperbarui');
    }

    /**
     * Menghapus produk Batam
     */
    public function destroyBatamProduct(Product $product)
    {
        if ($product->location !== 'batam') {
            return redirect()->route('admin.batam.products.index')
                ->with('error', 'Produk tidak ditemukan');
        }

        // Hapus gambar produk jika ada
        if ($product->image && file_exists(public_path($product->image))) {
            unlink(public_path($product->image));
        }

        $product->delete();

        return redirect()->route('admin.batam.products.index')
            ->with('success', 'Produk Batam berhasil dihapus');
    }
} 