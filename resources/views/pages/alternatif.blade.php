@extends('layouts.app')

@section('title', 'SPK2 - Alternatif')

@section('content')
    <!-- Page Content  -->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card position-relative inner-page-bg bg-primary" style="height: 150px;">
                    <div class="inner-page-title">
                        <h3 class="text-white">Halaman Alternatif</h3>
                        <p class="text-white">Halaman ini menampilkan daftar alternatif yang akan dinilai berdasarkan
                            kriteria yang telah ditentukan. Alternatif adalah pilihan yang tersedia dalam proses pengambilan
                            keputusan.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <!-- Editable table -->
                <div class="card">
                    <h3 class="card-header text-center font-weight-bold text-uppercase">
                        Alternatif
                    </h3>
                    <div class="card-body">
                        <div class="table-responsive">
                            <span class="table-add float-end mb-3 me-2">
                                <a href="{{ url('/dashboard/alternatifs/create') }}" class="btn btn-sm btn-success"><i
                                        class="ri-add-fill"><span class="ps-1">Add
                                            New</span></i>
                                </a>

                            </span>
                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Keterangan</th>
                                        <th>Dibuat Oleh</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($alternatifs as $alternatif)
                                        <tr>
                                            <td>{{ $alternatif->nama }}</td>
                                            <td>{{ $alternatif->keterangan }}</td>
                                            <td>{{ $alternatif->user->name }}</td>
                                            <td>
                                                <a href="{{ url('/dashboard/alternatifs/' . $alternatif->id . '/edit') }}"
                                                    class="btn btn-info btn-rounded btn-sm my-0">Edit</a>
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
