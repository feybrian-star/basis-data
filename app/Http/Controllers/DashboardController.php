<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Mengambil seluruh data penjualan
        $penjualan = DB::table('penjualans')
            ->orderBy('tanggal', 'desc')
            ->get();

        // Menghitung total pendapatan
        $totalPenjualan = DB::table('penjualans')
            ->sum('total_harga');

        // Menghitung jumlah transaksi
        $jumlahTransaksi = DB::table('penjualans')
            ->count();

        // Mengambil data penjualan per bulan pada tahun ini
        $dataBulanan = DB::table('penjualans')
            ->whereYear('tanggal', now()->year)
            ->selectRaw('MONTH(tanggal) as bulan, SUM(total_harga) as total')
            ->groupByRaw('MONTH(tanggal)')
            ->pluck('total', 'bulan');

        $namaBulan = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember'
        ];

        $grafikLabels = [];
        $grafikData = [];

        foreach ($namaBulan as $nomor => $nama) {
            $grafikLabels[] = $nama;

            $grafikData[] = (float) ($dataBulanan[$nomor] ?? 0);
        }

        // Menentukan bulan dengan penjualan tertinggi
        $bulanTertinggi = null;

        if (max($grafikData) > 0) {
            $indexTertinggi = array_search(max($grafikData), $grafikData);

            $bulanTertinggi = $namaBulan[$indexTertinggi + 1];
        }

        return view('dashboard', compact(
            'penjualan',
            'totalPenjualan',
            'jumlahTransaksi',
            'grafikLabels',
            'grafikData',
            'bulanTertinggi'
        ));
    }
}