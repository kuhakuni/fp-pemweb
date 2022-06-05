@extends("layouts.template")

@section("main")
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Data Product</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
          <li class="breadcrumb-item">Inventory</li>
          <li class="breadcrumb-item active">Data Product</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Daftar Product</h5>
                        @if(Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                           {{ Session::get('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                        @endif
                        @if(Session::has('deleted'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                           {{ Session::get('deleted') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                        @endif
                        @if(Session::has('updated'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                           {{ Session::get('updated') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nama Product</th>
                                    <th scope="col">Stok</th>
                                    <th scope="col">Harga (Rp)</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Supplier</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dataBarang as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->nama_barang }}</td>
                                    <td>{{ $product->stok }}</td>
                                    <td>{{ $product->harga}}</td>
                                    <td>{{ $product->kategori->kategori }}</td>
                                    <td>{{ $product->supplier->nama_supplier }}</td>
                                    <td>
                                        <a href="/barang/{{ $product->id }}/edit" class="btn btn-warning btn-sm"><i class="bi bi-pencil-fill"></i></a>
                                        <form action="/barang/{{ $product->id }}" method="post" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin akan menghapus data dengan id = {{ $product->id }}?')"><i class="bi bi-trash-fill"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <button
                            class="btn btn-primary w-100 my-3"
                            data-bs-toggle="modal"
                            data-bs-target="#formModal"
                        >
                            + Tambah Data Product
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
        <!-- Modal -->
    <div
    class="modal fade"
    id="formModal"
    tabindex="-1"
    aria-labelledby="formModalLabel"
    aria-hidden="true"
    >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="formModalLabel">Tambah Data Product</h5>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="/barang" method="POST">
                    @csrf
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input
                                type="text"
                                class="form-control"
                                id="nama-barang"
                                name="nama_barang"
                                placeholder="Nama Barang"
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
                                <option selected disabled hidden>
                                    Pilih Kategori
                                </option>
                                @foreach($dataKategori as $kategori)
                                <option value="{{ $kategori->id }}">
                                    {{ $kategori->kategori }}
                                </option>
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
                                <option selected disabled hidden>
                                    Pilih Supplier
                                </option>
                                @foreach($dataSupplier as $supplier)
                                <option value="{{ $supplier->id }}">
                                    {{ $supplier->nama_supplier }}
                                </option>
                                @endforeach
                            </select>
                            <label for="supplier-barang">Supplier</label>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">
                    Tambah
                </button>
                <button
                    type="button"
                    class="btn btn-secondary"
                    data-bs-dismiss="modal"
                >
                    Close
                </button>
               
            </div>
            </form>
        </div>
    </div>
    </div>

  </main><!-- End #main -->

@endsection