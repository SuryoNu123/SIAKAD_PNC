<?php

namespace App\Models;

use CodeIgniter\Model;

class KeuanganModel extends Model
{
    protected $table = 'keuangan';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'npm',
        'total_balance', 'outstanding', 'paid_this_semester',
        'percent_change', 'percent_completed',
        'semester', 'prodi', 'jumlah_tagihan', 'status_tagihan', 
        'due_date', 'nomor_tagihan',
        'keterangan_pembayaran', 'jumlah_pembayaran', 
        'tanggal_bayar', 'status_pembayaran',
        'metode_pembayaran', 'deskripsi_metode'
    ];
}
