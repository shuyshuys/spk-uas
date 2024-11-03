@extends('layouts.app')

@section('title', 'SPK2 - Hasil')

@section('content')
    <!-- Page Content  -->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card position-relative inner-page-bg bg-primary" style="height: 150px;">
                    <div class="inner-page-title">
                        <h3 class="text-white">Halaman Hasil</h3>
                        <p class="text-white"> Halaman ini menampilkan hasil akhir perhitungan untuk setiap alternatif
                            berdasarkan metode SAW atau AHP. Hasil ini menunjukkan peringkat atau skor akhir dari setiap
                            alternatif, membantu pengguna dalam pengambilan keputusan.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <!-- Editable table -->
                <div class="card">
                    <h3 class="card-header text-center font-weight-bold text-uppercase">
                        Hasil
                    </h3>
                    <div class="card-body">
                        <div class="table-editable">
                            <span class="table-add float-end mb-3 me-2">
                                {{-- <a href="{{ url('/dashboard/alternatifs/create') }}" class="btn btn-sm btn-success"><i
                                        class="ri-add-fill"><span class="ps-1">Add
                                            New</span></i>
                                </a> --}}

                            </span>
                            <button id="updateButton" class="btn btn-primary">Update</button>
                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>

                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>

                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
