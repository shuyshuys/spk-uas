@extends('layouts.app')

@section('title', 'SPK2 - Matriks Keputusan')

@section('content')
    <!-- Page Content  -->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card position-relative inner-page-bg bg-primary" style="height: 150px;">
                    <div class="inner-page-title">
                        <h3 class="text-white">Halaman Matriks Normalisasi</h3>
                        <p class="text-white">Halaman ini menampilkan hasil normalisasi dari matriks keputusan. Normalisasi
                            bertujuan untuk mengubah nilai mentah dalam matriks keputusan menjadi nilai yang dapat
                            diperbandingkan secara langsung.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <!-- Editable table -->
                <div class="card">
                    <h3 class="card-header text-center font-weight-bold text-uppercase">
                        Matriks Perbandingan (Input User)
                    </h3>
                    <div class="card-body">
                        <div class="">
                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Matriks Perbandingan</th>
                                        @foreach ($perbandingansGrouped->first() as $perbandingan)
                                            <th>{{ $perbandingan->kriteria1->nama }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($perbandingansGrouped as $kriteriaId => $perbandingans)
                                        <tr>
                                            <th>{{ $perbandingans->first()->kriteria2->nama }}</th>
                                            @foreach ($perbandingans as $perbandingan)
                                                <td data-id="{{ $perbandingan->id }}">
                                                    {{ $perbandingan->nilai_perbandingan }}</td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr id="sumRow">
                                        <td>Jumlah</td>
                                        <td id="sumB">0</td>
                                        <td id="sumC">0</td>
                                        <td id="sumD">0</td>
                                        <td id="sumE">0</td>
                                        <td id="sumF">0</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <h3 class="card-header text-center font-weight-bold text-uppercase">
                        Matriks Normalisasi
                    </h3>
                    <div class="card-body">
                        <div class="">
                            <table id="datatable-normalisasi" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Matriks Normalisasi</th>
                                        @foreach ($perbandingansGrouped->first() as $perbandingan)
                                            <th>{{ $perbandingan->kriteria1->nama }}</th>
                                        @endforeach
                                        <th>Rata-rata</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($perbandingansGrouped as $kriteriaId => $perbandingans)
                                        <tr>
                                            <td>{{ $perbandingans->first()->kriteria2->nama }}</td>
                                            @foreach ($perbandingans as $perbandingan)
                                                <td data-id="{{ $perbandingan->id }}">
                                                    <span class="normalisasi-value"></span>
                                                </td>
                                            @endforeach
                                            <td class="rata-rata">0</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Kriteria/Alternatif</th>
                                        @foreach ($perbandingansGrouped->first() as $perbandingan)
                                            <th>{{ $perbandingan->kriteria1->nama }}</th>
                                        @endforeach
                                        <th>Rata-rata</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function calculateSums() {
            let sums = [0, 0, 0, 0, 0];
            document.querySelectorAll('#datatable tbody tr').forEach(function(row, rowIndex) {
                row.querySelectorAll('td[data-id]').forEach(function(cell, cellIndex) {
                    sums[cellIndex] += parseFloat(cell.innerText) || 0;
                });
            });

            document.getElementById('sumB').innerText = sums[0].toFixed(5);
            document.getElementById('sumC').innerText = sums[1].toFixed(5);
            document.getElementById('sumD').innerText = sums[2].toFixed(5);
            document.getElementById('sumE').innerText = sums[3].toFixed(5);
            document.getElementById('sumF').innerText = sums[4].toFixed(5);

            calculateNormalisasi(sums);
        }

        function calculateNormalisasi(sums) {
            document.querySelectorAll('#datatable-normalisasi tbody tr').forEach(function(row, rowIndex) {
                let total = 0;
                row.querySelectorAll('td[data-id]').forEach(function(cell, cellIndex) {
                    let originalValue = parseFloat(document.querySelector(
                        `#datatable tbody tr:nth-child(${rowIndex + 1}) td:nth-child(${cellIndex + 2})`
                    ).innerText) || 0;
                    let normalisasiValue = originalValue / sums[cellIndex];
                    cell.querySelector('.normalisasi-value').innerText = normalisasiValue.toFixed(5);
                    total += normalisasiValue;
                });
                row.querySelector('.rata-rata').innerText = (total / sums.length).toFixed(5);
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            calculateSums();
        });
    </script>
@endsection
