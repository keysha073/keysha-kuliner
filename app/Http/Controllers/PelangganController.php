<?php
namespace App\Http\Controllers;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PelangganController extends Controller {
    public function index() { $items = Pelanggan::latest()->get(); return view('admin.pelanggans.index', compact('items')); }
    public function create() { return view('admin.pelanggans.form', ['item' => new Pelanggan(), 'mode' => 'create']); }
    public function store(Request $request) {
        $data = $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'required|email|max:120|unique:pelanggans,email',
            'telepon' => 'required|string|max:20',
            'alamat' => 'nullable|string|max:1000',
        ]);
        Pelanggan::create($data);
        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil ditambahkan.');
    }
    public function edit(Pelanggan $pelanggan) { return view('admin.pelanggans.form', ['item' => $pelanggan, 'mode' => 'edit']); }
    public function update(Request $request, Pelanggan $pelanggan) {
        $data = $request->validate([
            'nama' => 'required|string|max:100',
            'email' => ['required','email','max:120',Rule::unique('pelanggans','email')->ignore($pelanggan->id)],
            'telepon' => 'required|string|max:20',
            'alamat' => 'nullable|string|max:1000',
        ]);
        $pelanggan->update($data);
        return redirect()->route('pelanggan.index')->with('success', 'Data pelanggan berhasil diperbarui.');
    }
    public function destroy(Pelanggan $pelanggan) { $pelanggan->delete(); return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil dihapus.'); }
}
