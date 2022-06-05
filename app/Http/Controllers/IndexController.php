<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use App\Models\Customer;
use Illuminate\Routing\Route;

class IndexController extends Controller
{
    public function index()
    {
        $route = "dashboard";
        //get count sales this month and last month
        $count_sales_this_month = Transaksi::whereMonth(
            "created_at",
            date("m")
        )->count();
        $count_sales_last_month = Transaksi::whereMonth(
            "created_at",
            date("m", strtotime("-1 month"))
        )->count();
        $difference_sales = $count_sales_this_month - $count_sales_last_month;
        // $percentage_sales = ($difference_sales / $count_sales_last_month) * 100;
        $percentage_sales = 0;
        //get count customer this day and last day
        $customer_today = Customer::whereDate(
            "created_at",
            date("Y-m-d")
        )->count();
        $most_sold = DetailTransaksi::selectRaw(
            "barang.nama_barang, barang.harga, transaksi.status_transaksi,  SUM(detail_transaksi.jumlah_barang) as jumlah"
        )
            ->join("barang", "barang.id", "=", "detail_transaksi.id_barang")
            ->join(
                "transaksi",
                "transaksi.id",
                "=",
                "detail_transaksi.id_transaksi"
            )
            ->whereMonth("detail_transaksi.created_at", date("m"))
            ->where("transaksi.status_transaksi", "=", "approved")
            ->groupBy(
                "barang.nama_barang",
                "barang.harga",
                "transaksi.status_transaksi"
            )
            ->orderBy("jumlah", "desc")
            ->take(5)
            ->get();

        $popular_categories = DetailTransaksi::selectRaw(
            "kategori.kategori, SUM(detail_transaksi.jumlah_barang) as jumlah"
        )
            ->join("barang", "barang.id", "=", "detail_transaksi.id_barang")
            ->join("kategori", "kategori.id", "=", "barang.id_kategori")
            ->join(
                "transaksi",
                "transaksi.id",
                "=",
                "detail_transaksi.id_transaksi"
            )
            ->whereMonth("detail_transaksi.created_at", date("m"))
            ->where("transaksi.status_transaksi", "=", "approved")
            ->groupBy("kategori.kategori")
            ->orderBy("jumlah", "desc")
            ->take(5)
            ->get();

        return view("index", [
            "total_customer" => Customer::count(),
            "total_sales" => Transaksi::where(
                "status_transaksi",
                "=",
                "approved"
            )->count(),
            "customer_today" => $customer_today,
            "difference_sales" => $difference_sales,
            "percentage_sales" => $percentage_sales,
            "most_sold" => $most_sold,
            "popular_categories" => $popular_categories,
            "route" => $route,
        ]);
    }
}