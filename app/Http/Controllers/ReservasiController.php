<?php
namespace App\Http\Controllers;
use App\Models\Reservasi;
use Illuminate\Http\Request;

class ReservasiController extends Controller {
    public function index() { $items = Reservasi::latest()->get(); return view('admin.reservasis.index', compact('items')); }
    public function create() { return view('admin.reservasis.form', ['item' => new Reservasi(), 'mode' => 'create']); }
    public function store(Request $request) {
        $data = $request->validate([
            'nama_pemesan' => 'required|string|max:100',
            'tanggal' => 'required|date|after_or_equal:today',
            'jam' => 'required|date_format:H:i',
            'jumlah_orang' => 'required|integer|min:1|max:30',
            'status' => 'required|in:Menunggu,Dikonfirmasi,Selesai,Dibatalkan',
        ]);
        Reservasi::create($data);
        return redirect()->route('reservasi.index')->with('success', 'Reservasi berhasil ditambahkan.');
    }
    public function edit(Reservasi $reservasi) { return view('admin.reservasis.form', ['item' => $reservasi, 'mode' => 'edit']); }
    public function update(Request $request, Reservasi $reservasi) {
        $data = $request->validate([
            'nama_pemesan' => 'required|string|max:100',
            'tanggal' => 'required|date',
            'jam' => 'required|date_format:H:i',
            'jumlah_orang' => 'required|integer|min:1|max:30',
            'status' => 'required|in:Menunggu,Dikonfirmasi,Selesai,Dibatalkan',
        ]);
        $reservasi->update($data);
        return redirect()->route('reservasi.index')->with('success', 'Reservasi berhasil diperbarui.');
    }
    public function destroy(Reservasi $reservasi) { $reservasi->delete(); return redirect()->route('reservasi.index')->with('success', 'Reservasi berhasil dihapus.'); }
}
