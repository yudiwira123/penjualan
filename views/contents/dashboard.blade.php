@extends('master')

@section('title', 'Dashboard')

@section('content')
    <div class="d-flex">
        <h4>{{ $title }}</h4>
    </div>
    <hr />
    <div class="accordion" id="accordionPanelsStayOpenExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne">
                    Semua Aset
                </button>
            </h2>
            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                <div class="accordion-body">
                    <div class="row row-cols-lg-4 row-cols-xxl-5 g-3 g-xxl-4 mb-4">
                        <div class="col">
                            <div class="card text-white" style="background-color: #222E50">
                                <div class="card-body">
                                    <h4 class="card-title">Jumlah : {{ count($data['inventaris']) }}</h4>
                                    <span class="card-text">Total Harga :</span> <br/>
                                    <span class="card-text">{{ 'Rp. ' . number_format($data['inventaris']->sum('harga'), 2, ',', '.') }}</span>
                                </div>
                                <div class="card-footer">
                                    <span class="card-text">Total Aset</span>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card text-white" style="background-color: #222E50">
                                <div class="card-body">
                                    <h4 class="card-title">Jumlah : {{ count($data['inventaris']->where('kondisi', 'Baik')) }}</h4>
                                    <span class="card-text">Total Harga :</span> <br/>
                                    <span class="card-text">{{ 'Rp. ' . number_format($data['inventaris']->where('kondisi', 'Baik')->sum('harga'), 2, ',', '.') }}</span>
                                </div>
                                <div class="card-footer">
                                    <span class="card-text">Aset Kondisi Baik</span>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card text-white" style="background-color: #222E50">
                                <div class="card-body">
                                    <h4 class="card-title">Jumlah : {{ count($data['inventaris']->where('kondisi', 'Kurang Baik')) }}</h4>
                                    <span class="card-text">Total Harga :</span> <br/>
                                    <span class="card-text">{{ 'Rp. ' . number_format($data['inventaris']->where('kondisi', 'Kurang Baik')->sum('harga'), 2, ',', '.') }}</span>
                                </div>
                                <div class="card-footer">
                                    <span class="card-text">Aset Kondisi Kurang Baik</span>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card text-white" style="background-color: #222E50">
                                <div class="card-body">
                                    <h4 class="card-title">Jumlah : {{ count($data['inventaris']->where('kondisi', 'Rusak Berat')) }}</h4>
                                    <span class="card-text">Total Harga :</span> <br/>
                                    <span class="card-text">{{ 'Rp. ' . number_format($data['inventaris']->where('kondisi', 'Rusak Berat')->sum('harga'), 2, ',', '.') }}</span>
                                </div>
                                <div class="card-footer">
                                    <span class="card-text">Aset Kondisi Rusak Berat</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo">
                    Aset Berdasarkan Kategori
                </button>
            </h2>
            <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
                <div class="accordion-body">
                    <div class="row row-cols-lg-4 row-cols-xxl-5 g-3 g-xxl-4 mb-4">
                        <div class="col">
                            <div class="card text-white" style="background-color: #222E50">
                                <div class="card-body">
                                    <h4 class="card-title">Jumlah : {{ count($data['kib-a']) }}</h4>
                                    <span class="card-text">Total Harga :</span> <br/>
                                    <span class="card-text">{{ 'Rp. ' . number_format($data['kib-a']->sum('harga'), 2, ',', '.') }}</span>
                                </div>
                                <div class="card-footer">
                                    <span class="card-text">Aset KIB A</span>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card text-white" style="background-color: #222E50">
                                <div class="card-body">
                                    <h4 class="card-title">Jumlah : {{ count($data['kib-b']) }}</h4>
                                    <span class="card-text">Total Harga :</span> <br/>
                                    <span class="card-text">{{ 'Rp. ' . number_format($data['kib-b']->sum('harga'), 2, ',', '.') }}</span>
                                </div>
                                <div class="card-footer">
                                    <span class="card-text">Aset KIB B</span>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card text-white" style="background-color: #222E50">
                                <div class="card-body">
                                    <h4 class="card-title">Jumlah : {{ count($data['kib-c']) }}</h4>
                                    <span class="card-text">Total Harga :</span> <br/>
                                    <span class="card-text">{{ 'Rp. ' . number_format($data['kib-c']->sum('harga'), 2, ',', '.') }}</span>
                                </div>
                                <div class="card-footer">
                                    <span class="card-text">Aset KIB C</span>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card text-white" style="background-color: #222E50">
                                <div class="card-body">
                                    <h4 class="card-title">Jumlah : {{ count($data['kib-d']) }}</h4>
                                    <span class="card-text">Total Harga :</span> <br/>
                                    <span class="card-text">{{ 'Rp. ' . number_format($data['kib-d']->sum('harga'), 2, ',', '.') }}</span>
                                </div>
                                <div class="card-footer">
                                    <span class="card-text">Aset KIB D</span>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card text-white" style="background-color: #222E50">
                                <div class="card-body">
                                    <h4 class="card-title">Jumlah : {{ count($data['kib-e']) }}</h4>
                                    <span class="card-text">Total Harga :</span> <br/>
                                    <span class="card-text">{{ 'Rp. ' . number_format($data['kib-e']->sum('harga'), 2, ',', '.') }}</span>
                                </div>
                                <div class="card-footer">
                                    <span class="card-text">Aset KIB E</span>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card text-white" style="background-color: #222E50">
                                <div class="card-body">
                                    <h4 class="card-title">Jumlah : {{ count($data['kib-f']) }}</h4>
                                    <span class="card-text">Total Harga :</span> <br/>
                                    <span class="card-text">{{ 'Rp. ' . number_format($data['kib-f']->sum('harga'), 2, ',', '.') }}</span>
                                </div>
                                <div class="card-footer">
                                    <span class="card-text">Aset KIB F</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @can('setting')
        <div class="accordion-item">
            <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree">
                    Maintenance
                </button>
            </h2>
            <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                <div class="accordion-body">
                    <div class="row row-cols-lg-4 row-cols-xxl-5 g-3 g-xxl-4">
                        <div class="col">
                            <div class="card text-white" style="background-color: #222E50">
                                <div class="card-body">
                                    <h4 class="card-title mb-3">{{ count($data['user']) }}</h4>
                                </div>
                                <div class="card-footer">
                                    <span class="card-text">User</span>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card text-white" style="background-color: #222E50">
                                <div class="card-body">
                                    <h4 class="card-title mb-3">{{ count($data['kategori']) }}</h4>
                                </div>
                                <div class="card-footer">
                                    <span class="card-text">Kategori</span>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card text-white" style="background-color: #222E50">
                                <div class="card-body">
                                    <h4 class="card-title mb-3">{{ count($data['ruangan']) }}</h4>
                                </div>
                                <div class="card-footer">
                                    <span class="card-text">Ruangan</span>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card text-white" style="background-color: #222E50">
                                <div class="card-body">
                                    <h4 class="card-title mb-3">{{ count($data['pengelola']) }}</h4>
                                </div>
                                <div class="card-footer">
                                    <span class="card-text">Pengelola</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endcan
    </div>
@endsection