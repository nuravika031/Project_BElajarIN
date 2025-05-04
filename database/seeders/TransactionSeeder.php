<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transaction;

class TransactionSeeder extends Seeder
{
    public function run(): void
    {
        Transaction::create([
            'user_id' => 3,
            'course_id' => 1,
            'status_pembayaran' => 'berhasil',
            'jumlah' => 150000,
        ]);
    }
}
