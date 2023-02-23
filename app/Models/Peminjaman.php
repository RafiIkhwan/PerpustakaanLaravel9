<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Peminjaman extends Model
{
    use SoftDeletes;

    use HasFactory;

    protected $table = "tbl_peminjaman";

    protected $primaryKey = "idpinjam";

    protected $fillable = ['idpinjam', 'idpetugas', 'idsiswa', 'idbuku', 'created_at', 'updated_at'];

    protected $dates = ['deleted_at'];

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'idbuku');
    }
    public function petugas()
    {
        return $this->belongsTo(Petugas::class, 'idpetugas');
    }
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'idsiswa');
    }
}
