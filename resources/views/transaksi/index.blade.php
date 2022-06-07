@extends('layouts.template')

@section('main')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Data Transaksi</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
          <li class="breadcrumb-item active">Transaksi</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Daftar Transaksi</h5>
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nama Barang</th>
                                    <th scope="col">Jumlah Barang</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Waktu Transaksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dataDetailTransaksi as $detailTransaksi)
                                <tr>
                                    <td>{{ $detailTransaksi->id }}</td>
                                    <td>{{ $detailTransaksi->barang->nama_barang }}</td>
                                    <td>{{ $detailTransaksi->jumlah_barang }}</td>
                                    <td>
                                    @switch($detailTransaksi->transaksi->status_transaksi)
                                    @case("approved")
                                        <span class="badge rounded-pill bg-success">Approved</span>
                                        @break
                                    @case("pending")
                                        <span class="badge rounded-pill bg-warning">Pending</span>
                                        @break
                                    @default
                                        <span class="badge rounded-pill bg-danger">Rejected</span>
                                    @endswitch
                                    </td>
                                    <td>{{ $detailTransaksi->transaksi->created_at }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection