@extends('layouts.app')

@section('title', 'SPK2 - Kriteria')

@section('content')
    <!-- Page Content  -->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card position-relative inner-page-bg bg-primary" style="height: 150px;">
                    <div class="inner-page-title">
                        <h3 class="text-white">Halaman Kriteria</h3>
                        <p class="text-white">Halaman ini berfungsi untuk menampilkan dan mengelola daftar kriteria yang
                            digunakan dalam analisis. Kriteria adalah faktor yang akan digunakan untuk menilai
                            alternatif-alternatif yang tersedia.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <!-- Editable table -->
                <div class="card">
                    <h3 class="card-header text-center font-weight-bold text-uppercase">
                        Kriteria
                    </h3>
                    <div class="card-body">
                        <div class="table-responsive">
                            <span class="table-add float-end mb-3 me-2">
                                <a href="{{ url('/dashboard/kriterias/create') }}" class="btn btn-sm btn-success"><i
                                        class="ri-add-fill"><span class="ps-1">Add
                                            New</span></i>
                                </a>

                            </span>
                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Jenis Kriteria</th>
                                        <th>Bobot</th>
                                        <th>Dibuat oleh</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kriterias as $kriteria)
                                        <tr>
                                            <td>{{ $kriteria->nama }}</td>
                                            <td>{{ $kriteria->jenis_kriteria }}</td>
                                            <td>{{ $kriteria->bobot }}</td>
                                            <td>{{ $kriteria->user->name }}</td>
                                            <td>
                                                <a href="{{ url('/dashboard/kriterias/' . $kriteria->id . '/edit') }}"
                                                    class="btn btn-info btn-rounded btn-sm my-0">Edit</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Jenis Kriteria</th>
                                        <th>Bobot</th>
                                        <th>Dibuat oleh</th>
                                        <th>Aksi</th>
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
