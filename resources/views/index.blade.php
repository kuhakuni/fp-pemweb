@extends('layouts.template')

@section('main')

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Dashboard</h1>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-8">
        <div class="row">

          <!-- Sales Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">

              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>

                  <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul>
              </div>

              <div class="card-body">
                <h5 class="card-title">Total Sales <span>| This Month</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-cart"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{ $total_sales }}</h6>
                    @if ($difference_sales >0)
                    <span class="text-success small pt-1 fw-bold">{{ $percentage_sales }}%</span> <span class="text-muted small pt-2 ps-1">increase</span>
                    @else
                    <span class="text-danger small pt-1 fw-bold">{{ $percentage_sales }}%</span> <span class="text-muted small pt-2 ps-1">decrease</span>
                    @endif


                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Sales Card -->

          <!-- Customers Card -->
          <div class="col-xxl-4 col-md-6">

            <div class="card info-card customers-card">

              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>

                  <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul>
              </div>

              <div class="card-body">
                <h5 class="card-title">Total Customers <span>| This Day</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{ $total_customer }}</h6>
                    @if ($customer_today >0)
                    <span class="text-success small pt-1 fw-bold">+{{ $customer_today }}</span><span class="text-muted small pt-2 ps-1">pelanggan</span>
                    @endif

                  </div>
                </div>

              </div>
            </div>

          </div><!-- End Customers Card -->

          <!-- Top Selling -->
          <div class="col-12">
            <div class="card top-selling overflow-auto">
              <div class="card-body pb-0">
                <h5 class="card-title">Top Selling <span>| Month</span></h5>

                <table class="table table-borderless">
                  <thead>
                    <tr>
                      <th scope="col">Nama Barang</th>
                      <th scope="col">Harga (Rp)</th>
                      <th scope="col">Terjual</th>
                      <th scope="col">Status</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                    @foreach($most_sold as $product)
                    <tr>
                      <td>{{ $product->nama_barang }}</td>
                      <td>{{ $product->harga}}</td>
                      <td class="fw-bold">{{ $product->jumlah }}</td>
                      <td>
                      @switch($product->status_transaksi)
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
                    </tr>
                    @endforeach
                  </tbody>
                </table>

              </div>

            </div>
          </div><!-- End Top Selling -->

        </div>
      </div><!-- End Left side columns -->

      <!-- Right side columns -->
      <div class="col-lg-4">


        <!-- Website Traffic -->
        <div class="card">
          <div class="card-body pb-0">
            <h5 class="card-title">Kategori Terlaris</h5>

            <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

            <script>
              document.addEventListener("DOMContentLoaded", () => {
                echarts.init(document.querySelector("#trafficChart")).setOption({
                  tooltip: {
                    trigger: 'item'
                  },
                  legend: {
                    top: '5%',
                    left: 'center'
                  },
                  series: [{
                    name: 'Kategori',
                    type: 'pie',
                    radius: ['40%', '70%'],
                    avoidLabelOverlap: false,
                    label: {
                      show: false,
                      position: 'center'
                    },
                    emphasis: {
                      label: {
                        show: true,
                        fontSize: '18',
                        fontWeight: 'bold'
                      }
                    },
                    labelLine: {
                      show: false
                    },
                    data: [
                      @foreach($popular_categories as $category)
                      {
                        value: {{ $category->jumlah }},
                        name: '{{ $category->kategori }}',
                      },
                      @endforeach
                    ],
                  }]
                });
              });
            </script>

          </div>
        </div><!-- End Website Traffic -->


      </div><!-- End Right side columns -->

    </div>
  </section>

</main><!-- End #main -->


@endsection