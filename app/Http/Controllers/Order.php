<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class Order extends Controller
{
    public function Order(Request $request) {
        DB::table('tbl_keranjang')->insert([
            'id_user' => Session::get('id_user'),
            'id_barang' => $request->id_barang,
            'jumlah' => $request->jumlah
        ]);

        return redirect('/');
    }

    public function Keranjang(Request $request) {
        $keranjang = DB::table('keranjang')->get();
        return view('Keranjang', ['keranjang' => $keranjang]);
    }

    public function Checkout(Request $request) {
        $id_check = rand().rand().rand();
        $total = 0;
        $data = DB::table('tbl_keranjang')->where('id_user', Session::get('id_user'))->get();
        foreach ($data as $krj) {
            $barang = DB::table('tbl_barang')->where('id', $krj->id_barang)->get();
            foreach ($barang as $brg) {
                $total += ($krj->jumlah * $brg->harga);
                DB::table('detail_checkout')->insert([
                    'id_checkout' => $id_check,
                    'id_barang' => $krj->id_barang,
                    'jumlah' => $krj->jumlah
                ]);
            }
        }
        DB::table('tbl_checkout')->insert([
            'id_checkout' => $id_check,
            'id_user' => Session::get('id_user'),
            'total' => $total
        ]);
        return redirect('/Checkout_list');
    }

    public function Checkout_list(Request $request) {
        $checkout = DB::table('checkout')->get();
        return view('Checkout', ['checkout' => $checkout]);
    }
}
