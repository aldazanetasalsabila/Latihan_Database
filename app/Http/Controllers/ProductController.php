<?php
namespace App\Http\Controllers;
// Ganti App\Models\Menu menjadi App\Models\Product
use App\Models\Product; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

// Ganti MenuController menjadi ProductController
class ProductController extends Controller
{
 public function index()
 {
 // Ganti $menus = Menu::latest()->get();
 $products = Product::latest()->get(); 
 // Ganti view('menus.index', compact('menus'));
 return view('products.index', compact('products')); 
 }
 public function create()
 {
 // Ganti view('menus.create');
 return view('products.create'); 
 }
 public function store(Request $request)
 {
  // Ubah validasi nama_menu menjadi nama_produk
  $validated = $request->validate([
  'nama_produk' => 'required|string|max:255',
  'harga' => 'required|numeric',
  'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
  ]);

  if ($request->hasFile('foto')) {
  // Simpan di folder 'product'
  $validated['foto'] = $request->file('foto')->store('product', 'public'); 
  }

  // Ganti Menu::create($validated);
  Product::create($validated); 
  // Ganti redirect()->route('menus.index')->with('success', 'Menu berhasil ditambahkan!');
  return redirect()->route('products.index')->with('success', 'Produk Glowing berhasil ditambahkan!'); 
 }

 // Ganti Menu $menu menjadi Product $product
 public function edit(Product $product) 
 {
  // Ganti view('menus.edit', compact('menu'));
  return view('products.edit', compact('product')); 
 }
 
 // Ganti Menu $menu menjadi Product $product
 public function update(Request $request, Product $product) 
 {
  // Ubah validasi nama_menu menjadi nama_produk
  $validated = $request->validate([
  'nama_produk' => 'required|string|max:255',
  'harga' => 'required|numeric',
  'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
  ]);

  if ($request->hasFile('foto')) {
  // Ganti $menu->foto menjadi $product->foto
  if ($product->foto && Storage::disk('public')->exists($product->foto)) {
  // Ganti $menu->foto menjadi $product->foto
  Storage::disk('public')->delete($product->foto); 
  }
  // Simpan di folder 'product'
  $validated['foto'] = $request->file('foto')->store('product', 'public'); 
  }
  
  // Ganti $menu->update($validated);
  $product->update($validated); 
  // Ganti redirect()->route('menus.index')->with('success', 'Menu berhasil diperbarui!');
  return redirect()->route('products.index')->with('success', 'Produk Wardah berhasil di-update! Cantik!'); 
 }

 // Ganti Menu $menu menjadi Product $product
 public function destroy(Product $product) 
 {
  // Ganti $menu->foto menjadi $product->foto
  if ($product->foto && Storage::disk('public')->exists($product->foto)) {
  // Ganti $menu->foto menjadi $product->foto
  Storage::disk('public')->delete($product->foto); 
  }
  // Ganti $menu->delete();
  $product->delete(); 
  // Ganti redirect()->route('menus.index')->with('success', 'Menu berhasil dihapus!');
  return redirect()->route('products.index')->with('success', 'Produk sudah dihapus! Bye-bye~ 👋'); 
 }
}