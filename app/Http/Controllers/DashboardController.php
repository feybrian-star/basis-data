<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $penjualan = DB::table('penjualans')
            ->orderBy('tanggal', 'desc')
            ->get();

        $totalPenjualan = DB::table('penjualans')
            ->sum('total_harga');

        $jumlahTransaksi = DB::table('penjualans')
            ->count();

        return view('dashboard', compact(
            'penjualan',
            'totalPenjualan',
            'jumlahTransaksi'
        ));
    }
}