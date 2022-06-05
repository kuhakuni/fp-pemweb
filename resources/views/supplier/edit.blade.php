@extends('layouts.template')

@section('main')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Edit Data Supplier</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/supplier">Data Supplier</a></li>
          <li class="breadcrumb-item active">Edit</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-md-6 mx-auto">

          <div class="card p-5">
            <div class="card-title">
                <div class="h5">Ubah Data Supplier</div>
            </div>
            <div class="card-body p-0">
                <form class="row g-3" action="/supplier/{{ $dataSupplier->id }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input
                            type="text"
                            class="form-control"
                            id="nama-supplier"
                            name="nama_supplier"
                            placeholder="Nama Supplier"
                            value="{{ $dataSupplier->nama_supplier }}"
                            required
                            />
                      <label for="nama-supplier">Nama Supplier</label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input
                                type="text"
                                class="form-control"
                                id="alamat"
                                name="alamat"
                                placeholder="Alamat"
                                value="{{ $dataSupplier->alamat }}"
                                required
                            />
                            <label for="alamat">Alamat</label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input
                            type="text"
                            class="form-control"
                            id="no_telp"
                            name="no_telp"
                            placeholder="No. Telepon"
                            value="{{ $dataSupplier->no_telp }}"
                            required
                        />
                        <label for="no_telp">No. Telepon</label>
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
