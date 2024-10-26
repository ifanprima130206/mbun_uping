@extends('admin.layout.main')

@section('content')
    <header class="page-header page-header-dark bg-dark pb-10">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4">
                <div class="row">
                    <div class="col-12">
                        <marquee class="page-header-subtitle">
                            <span style="margin-right: 500px;">
                                “Dan tidak ada suatu makhluk melata pun di bumi melainkan Allah-lah yang memberi rezekinya.
                                Dan Dia mengetahui tempat tinggalnya dan tempat penyimpanannya. Semuanya tertulis dalam
                                kitab yang nyata (Lauh Mahfuz).” (Q.S. Hud: 6)
                            </span>
                            <span style="margin-right: 500px;">
                                "Sesungguhnya shalat itu adalah fardhu bagi orang-orang yang beriman." (QS. An-Nisa': 103)
                            </span>
                        </marquee>
                    </div>
                </div>
                <div class="row align-items-center justify-content-between">
                    <div class="col-md-6 col-12 mt-4">
                        <h1 class="page-header-title">
                            {{ $title }}
                        </h1>
                    </div>
                    <div class="col-12 col-xl-auto mt-4">
                        <div class="input-group input-group-joined border-0" style="width: 16.5rem">
                            <span class="input-group-text"><i class="text-primary" data-feather="calendar"></i></span>
                            <input class="form-control ps-0 pointer" id="litepickerRangePlugin"
                                placeholder="Select date range..." />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container-xl px-4 mt-n10">
        <div class="row">
            <div class="col-lg-6 col-xl-6 mb-4">
                <div class="card bg-primary text-white h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="me-3">
                                <div class="text-white-75 small">Kamis</div>
                                <div class="text-lg fw-bold">20</div>
                            </div>
                            <i class="feather-xl text-white-50" data-feather="calendar"></i>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between small">
                        April 2024
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-3 mb-4">
                <div class="card bg-warning text-white h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="me-3">
                                <div class="text-white-75 small">Pengeluaran</div>
                                <div class="text-lg fw-bold">$215,000</div>
                            </div>
                            <i class="feather-xl text-white-50" data-feather="credit-card"></i>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between small">
                        <a class="text-white stretched-link" href="#!">Lihat Laporan</a>
                        <div class="text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-3 mb-4">
                <div class="card bg-success text-white h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="me-3">
                                <div class="text-white-75 small">Pemasukan</div>
                                <div class="text-lg fw-bold">$40,000</div>
                            </div>
                            <i class="feather-xl text-white-50" data-feather="dollar-sign"></i>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between small">
                        <a class="text-white stretched-link" href="#!">Lihat Laporan</a>
                        <div class="text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-3 mb-4">
                <div class="card bg-info text-white h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="me-3">
                                <div class="text-white-75 small">Menunggu</div>
                                <div class="text-lg fw-bold">17</div>
                            </div>
                            <i class="feather-xl text-white-50" data-feather="list"></i>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between small">
                        <a class="text-white stretched-link" href="#!">Lihat Pesanan</a>
                        <div class="text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-3 mb-4">
                <div class="card bg-secondary text-white h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="me-3">
                                <div class="text-white-75 small">Pesanan</div>
                                <div class="text-lg fw-bold">5</div>
                            </div>
                            <i class="feather-xl text-white-50" data-feather="clock"></i>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between small">
                        <a class="text-white stretched-link" href="#!">Lihat Waiting List</a>
                        <div class="text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-3 mb-4">
                <div class="card bg-warning text-white h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="me-3">
                                <div class="text-white-75 small">Proses</div>
                                <div class="text-lg fw-bold">3</div>
                            </div>
                            <i class="feather-xl text-white-50" data-feather="loader"></i>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between small">
                        <a class="text-white stretched-link" href="#!">Lihat Proses</a>
                        <div class="text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-3 mb-4">
                <div class="card bg-success text-white h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="me-3">
                                <div class="text-white-75 small">Selesai</div>
                                <div class="text-lg fw-bold">7</div>
                            </div>
                            <i class="feather-xl text-white-50" data-feather="check-circle"></i>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between small">
                        <a class="text-white stretched-link" href="#!">Lihat Selesai</a>
                        <div class="text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Example Charts for Dashboard Demo-->
        <div class="row">
            <div class="col-xl-6 mb-4">
                <div class="card card-header-actions h-100">
                    <div class="card-header">
                        Keuntungan
                        <div class="dropdown no-caret">
                            <button class="btn btn-transparent-dark btn-icon dropdown-toggle"
                                id="areaChartDropdownExample" type="button" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false"><i class="text-gray-500"
                                    data-feather="more-vertical"></i></button>
                            <div class="dropdown-menu dropdown-menu-end animated--fade-in-up"
                                aria-labelledby="areaChartDropdownExample">
                                <a class="dropdown-item" href="#!">Last 12 Months</a>
                                <a class="dropdown-item" href="#!">Last 30 Days</a>
                                <a class="dropdown-item" href="#!">Last 7 Days</a>
                                <a class="dropdown-item" href="#!">This Month</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#!">Custom Range</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart-area"><canvas id="myAreaChart" width="100%" height="30"></canvas></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 mb-4">
                <div class="card card-header-actions h-100">
                    <div class="card-header">
                        Pengunjung
                        <div class="dropdown no-caret">
                            <button class="btn btn-transparent-dark btn-icon dropdown-toggle"
                                id="areaChartDropdownExample" type="button" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false"><i class="text-gray-500"
                                    data-feather="more-vertical"></i></button>
                            <div class="dropdown-menu dropdown-menu-end animated--fade-in-up"
                                aria-labelledby="areaChartDropdownExample">
                                <a class="dropdown-item" href="#!">Last 12 Months</a>
                                <a class="dropdown-item" href="#!">Last 30 Days</a>
                                <a class="dropdown-item" href="#!">Last 7 Days</a>
                                <a class="dropdown-item" href="#!">This Month</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#!">Custom Range</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart-bar"><canvas id="myBarChart" width="100%" height="30"></canvas></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">Pesanan (Menunggu)</div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Pembeli</th>
                            <th>Produk</th>
                            <th>Vairan</th>
                            <th>Total</th>
                            <th>Jenis</th>
                            <th>Tanggal Pemesanan</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Pembeli</th>
                            <th>Produk</th>
                            <th>Vairan</th>
                            <th>Total</th>
                            <th>Jenis</th>
                            <th>Tanggal Pemesanan</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr>
                            <td>Ifan Prima Nursaid</td>
                            <td>Brownies</td>
                            <td>Coklat</td>
                            <td>Rp. 75.0000</td>
                            <td>
                                <div class="badge bg-primary text-white rounded-pill">COD (Cash On Delivery)</div>
                            </td>
                            <td>Selasa, 15 Oktober 2024 Jam Sekian</td>
                            <td>
                                <button class="btn btn-datatable btn-icon btn-transparent-dark me-2"><i
                                        class="fa-solid fa-ellipsis-vertical"></i></button>
                                <button class="btn btn-datatable btn-icon btn-transparent-dark"><i
                                        class="fa-regular fa-trash-can"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('custom')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" crossorigin="anonymous"></script>
    <script src="{{ url('assets/admin') }}/assets/demo/chart-area-demo.js"></script>
    <script src="{{ url('assets/admin') }}/assets/demo/chart-bar-demo.js"></script>
@endpush
