@extends('layouts.app')

@section('title', 'SPK2 - Konsistensi')

@section('content')
    <!-- Page Content  -->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card position-relative inner-page-bg bg-primary" style="height: 150px;">
                    <div class="inner-page-title">
                        <h3 class="text-white">Halaman Konsistensi</h3>
                        <p class="text-white"> Halaman ini menampilkan uji konsistensi untuk matriks perbandingan berpasangan
                            (khusus metode AHP). Uji konsistensi digunakan untuk memastikan bahwa perbandingan antar
                            kriteria yang diberikan konsisten, yang penting untuk validitas hasil.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <!-- Editable table -->
                <div class="card">
                    <h3 class="card-header text-center font-weight-bold text-uppercase">
                        Konsistensi
                    </h3>
                    <div class="card-body">
                        <div class="table-editable">
                            <span class="table-add float-end mb-3 me-2">
                                {{-- <a href="{{ url('/dashboard/alternatifs/create') }}" class="btn btn-sm btn-success"><i
                                        class="ri-add-fill"><span class="ps-1">Add
                                            New</span></i>
                                </a> --}}

                            </span>
                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>N</th>
                                        @foreach ($konsistensis as $konsistensi)
                                            <td>{{ $konsistensi->n }}</td>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>Rasio</th>
                                        @foreach ($konsistensis as $konsistensi)
                                            <td>{{ $konsistensi->rasio_konsistensi }}</td>
                                        @endforeach
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
