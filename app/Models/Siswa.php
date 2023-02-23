<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = "tbl_siswa";
    protected $primaryKey = "idsiswa";
    protected $fillable = ['idsiswa','nis','namasiswa','kelas','hp'];

    public function peminjaman()
    {
        $this->hasMany(Peminjaman::class);
    }
    
}
