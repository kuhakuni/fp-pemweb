@extends("layouts.template")

@section("main")
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Data Kategori</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
          <li class="breadcrumb-item">Inventory</li>
          <li class="breadcrumb-item active">Data Kategori</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Daftar Kategori</h5>
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
                                    <th scope="col">Nama Kategori</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dataKategori as $kategori)
                                <tr>
                                    <td>{{ $kategori->id }}</td>
                                    <td>{{ $kategori->kategori }}</td>
                                    <td>
                                        <a href="/kategori/{{ $kategori->id }}/edit" class="btn btn-warning btn-sm"><i class="bi bi-pencil-fill"></i></a>
                                        <form action="/kategori/{{ $kategori->id }}" method="post" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin akan menghapus data dengan id = {{ $kategori->id }}?')"><i class="bi bi-trash-fill"></i></button>
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
                            + Tambah Data Kategori
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
                <h5 class="modal-title fw-bold" id="formModalLabel">Tambah Data Kategori</h5>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="/kategori" method="POST">
                    @csrf
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input
                                type="text"
                                class="form-control"
                                id="kategori"
                                name="kategori"
                                placeholder="Nama Kategori"
                                required
                            />
                            <label for="kategori">Nama Kategori</label>
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