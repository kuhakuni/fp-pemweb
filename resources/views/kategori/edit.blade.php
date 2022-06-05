@extends('layouts.template')

@section('main')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Edit Data Kategori</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/kategori">Data Kategori</a></li>
          <li class="breadcrumb-item active">Edit</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-md-6 mx-auto">

          <div class="card p-5">
            <div class="card-title">
                <div class="h5">Ubah Data Kategori</div>
            </div>
            <div class="card-body p-0">
                <form class="row g-3" action="/kategori/{{ $dataKategori->id }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input
                            type="text"
                            class="form-control"
                            id="kategori"
                            name="kategori"
                            placeholder="Nama Kategori"
                            value="{{ $dataKategori->kategori }}"
                            required
                            />
                      <label for="kategori">Nama Kategori</label>
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
