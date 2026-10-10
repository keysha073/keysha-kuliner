<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Reservasi extends Model {
    protected $fillable = ['nama_pemesan','tanggal','jam','jumlah_orang','status'];
    protected $casts = ['tanggal' => 'date'];
}
