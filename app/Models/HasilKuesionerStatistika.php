<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilKuesionerStatistika extends Model
{
    use HasFactory;

    protected $table = 'hasil_kuesioner_statistikas';

    protected $guarded = [];

    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            'bekerja' => 'Sudah Bekerja',
            'belum' => 'Belum Bekerja',
            'kuliah' => 'Lanjut Kuliah',
            default => (string) $this->status,
        };
    }

    public function getPendapatanFormatAttribute(): string
    {
        if ($this->pendapatan === null) {
            return '-';
        }

        return 'Rp '.number_format($this->pendapatan, 0, ',', '.');
    }
}
