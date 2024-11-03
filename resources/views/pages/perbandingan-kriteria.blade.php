@extends('layouts.app')

@section('title', 'SPK2 - Perbandingan Kriteria')

@section('content')
    <!-- Page Content  -->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card position-relative inner-page-bg bg-primary" style="height: 150px;">
                    <div class="inner-page-title">
                        <h3 class="text-white">Halaman Perbandingan Kriteria</h3>
                        <p class="text-white"> Halaman ini memungkinkan pengguna untuk melakukan perbandingan berpasangan
                            antar kriteria. Halaman ini khusus untuk metode AHP, yang memerlukan penentuan bobot kriteria
                            melalui perbandingan berpasangan.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <!-- Editable table -->
                <div class="card">
                    <h3 class="card-header text-center font-weight-bold text-uppercase">
                        Perbandingan Kriteria
                    </h3>
                    <div class="card-body">
                        <div class="table-responsive">
                            <span class="table-add float-end mb-3 me-2">
                                {{-- <a href="{{ url('/dashboard/alternatifs/create') }}" class="btn btn-sm btn-success"><i
                                        class="ri-add-fill"><span class="ps-1">Add
                                            New</span></i>
                                </a> --}}

                            </span>
                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kriteria 1</th>
                                        <th>Kriteria 2</th>
                                        <th>Nilai Perbandingan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($perbandingans as $perbandingan)
                                        <tr>
                                            <td>{{ $loop->iteration }}.</td>
                                            <td>{{ $perbandingan->kriteria1->nama }}</td>
                                            <td>{{ $perbandingan->kriteria2->nama }}</td>
                                            <td>{{ $perbandingan->nilai_perbandingan }}</td>
                                            <td>
                                                <a href="{{ url('/dashboard/perbandingan-kriterias/' . $perbandingan->id . '/edit') }}"
                                                    class="btn btn-info btn-rounded btn-sm my-0">Edit</a>
                                                <p>ubah agar tidak perlu login untuk mengisi</p>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Keterangan</th>
                                        <th>Dibuat Oleh</th>
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
