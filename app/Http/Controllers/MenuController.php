<?php
namespace App\Http\Controllers;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MenuController extends Controller {
    public function index() { $items = Menu::latest()->get(); return view('admin.menus.index', compact('items')); }
    public function create() { return view('admin.menus.form', ['item' => new Menu(), 'mode' => 'create']); }
    public function store(Request $request) {
        $data = $request->validate([
            'nama_menu' => 'required|string|max:100',
            'kategori' => 'required|in:Makanan,Minuman,Camilan',
            'harga' => 'required|integer|min:0',
            'stok' => 'required|integer|min:0',
            'deskripsi' => 'nullable|string|max:1000',
        ]);
        Menu::create($data);
        return redirect()->route('menu.index')->with('success', 'Menu berhasil ditambahkan.');
    }
    public function edit(Menu $menu) { return view('admin.menus.form', ['item' => $menu, 'mode' => 'edit']); }
    public function update(Request $request, Menu $menu) {
        $data = $request->validate([
            'nama_menu' => 'required|string|max:100',
            'kategori' => 'required|in:Makanan,Minuman,Camilan',
            'harga' => 'required|integer|min:0',
            'stok' => 'required|integer|min:0',
            'deskripsi' => 'nullable|string|max:1000',
        ]);
        $menu->update($data);
        return redirect()->route('menu.index')->with('success', 'Menu berhasil diperbarui.');
    }
    public function destroy(Menu $menu) { $menu->delete(); return redirect()->route('menu.index')->with('success', 'Menu berhasil dihapus.'); }
}
