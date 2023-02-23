<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = "tbl_buku";
    protected $primaryKey = "idbuku";

    protected $fillable = ['kodebuku', 'judul', 'pengarang', 'penerbit'];

    public function peminjaman()
    {
        $this->hasMany(Peminjaman::class);
    }
    
}
