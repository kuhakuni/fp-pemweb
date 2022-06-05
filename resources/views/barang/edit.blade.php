@extends('layouts.template')

@section('main')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Edit Data Product</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/barang">Data Product</a></li>
          <li class="breadcrumb-item active">Edit</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-md-6 mx-auto">

          <div class="card p-5">
            <div class="card-title">
                <div class="h5">Ubah Data Product</div>
            </div>
            <div class="card-body p-0">
                <form class="row g-3" action="/barang/{{ $dataBarang->id }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input
                                type="text"
                                class="form-control"
                                id="nama-barang"
                                name="nama_barang"
                                placeholder="Nama Barang"
                                value={{ $dataBarang->nama_barang }}
                                required
                            />
                            <label for="nama-barang">Nama Barang</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input
                                type="number"
                                class="form-control"
                                id="stok-barang"
                                name="stok"
                                placeholder="Stok"
                                value={{ $dataBarang->stok }}
                                required
                            />
                            <label for="stok-barang">Stok</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input
                                type="number"
                                class="form-control"
                                id="harga-barang"
                                name="harga"
                                placeholder="Harga"
                                value={{ $dataBarang->harga }}
                                required
                            />
                            <label for="harga-barang">Harga</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <select
                                class="form-select"
                                id="kategori-barang"
                                name="id_kategori"
                                aria-label="Kategori"
                                required
                            >
                                @foreach($dataKategori as $kategori)
                                @if($dataBarang->kategori->id === $kategori->id)
                                    <option value="{{ $kategori->id }}" selected>
                                        {{ $kategori->kategori }}
                                    </option>
                                @else
                                    <option value="{{ $kategori->id }}">
                                        {{ $kategori->kategori }}
                                    </option>
                                @endif
                                @endforeach
                            </select>
                            <label for="kategori-barang">Kategori</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <select
                                class="form-select"
                                id="supplier-barang"
                                name="id_supplier"
                                aria-label="Supplier"
                                required
                            >
                                @foreach($dataSupplier as $supplier)
                                 @if($dataBarang->supplier->id === $supplier->id)
                                    <option value="{{ $supplier->id }}" selected>
                                        {{ $supplier->nama_supplier }}
                                    </option>
                                @else
                                    <option value="{{ $supplier->id }}">
                                        {{ $supplier->nama_supplier }}
                                    </option>
                                @endif
                                @endforeach
                            </select>
                            <label for="supplier-barang">Supplier</label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button class="btn btn-primary" type="submit">Ubah</button>
                    </div>
                </form>
            </div>
            
          </div>

        </div>

      </div>
    </section>

</main><!-- End #main -->

@endsection
