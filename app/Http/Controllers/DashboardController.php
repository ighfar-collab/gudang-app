<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;
use App\Models\Transaction;
use App\Models\Pembelian;
use App\Models\Installment;
use App\Models\Loan;

class DashboardController extends Controller
{
    public function index()
    {

        // Cash In
        $penjualan = Transaction::sum('total');

        $bayarPiutang = Installment::whereHas('loan', function($q){
            $q->where('jenis','piutang');
        })->sum('bayar');

        $cashIn = $penjualan + $bayarPiutang;

    $totalTransaksi = Transaction::count();
    $totalPembelian = Pembelian::count();
        // Cash Out
        $pembelian = Pembelian::sum('total');

        $bayarUtang = Installment::whereHas('loan', function($q){
            $q->where('jenis','utang');
        })->sum('bayar');

        $cashOut = $pembelian + $bayarUtang;


        // Cash Flow
        $cashFlow = $cashIn - $cashOut;

        return view('dashboard', compact(
            'cashIn',
            'cashOut',
            'cashFlow',
               'totalTransaksi',
        'totalPembelian'
        ));
    }
}