@extends('layouts.app')

@section('title', 'SPK2 - Perbandingan Kriteria')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card position-relative inner-page-bg bg-primary" style="height: 150px;">
                    <div class="inner-page-title">
                        <h3 class="text-white">AHP (Analytic Hierarchy Process)</h3>
                        <p class="text-white"> Halaman AHP adalah sebuah metode pengambilan keputusan multikriteria yang
                            terstruktur. Metode ini membantu kita untuk membuat keputusan yang lebih baik, terutama ketika
                            kita dihadapkan pada banyak alternatif dan kriteria yang harus dipertimbangkan.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="card">
                    <h3 class="card-header text-center font-weight-bold text-uppercase">
                        Matriks Perbandingan Kriteria
                    </h3>
                    <div class="card-body">
                        <div class="table-responsive">

                            <div class="d-flex justify-content-between mb-1">
                                <div>
                                    <button id="newDataButton" class="btn btn-primary mb-1">Bersihkan</button>
                                    <button id="updateButton" class="btn btn-primary mb-1">Simpan</button>
                                </div>
                                <div>
                                    <a href="/dashboard/kriterias" class="btn btn-info">Ubah Kriteria</a>
                                </div>
                            </div>
                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Matriks Perbandingan</th>
                                        @foreach ($kriteria as $k)
                                            <th>{{ $k->nama }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $savedData = [];
                                    @endphp
                                    @foreach ($kriteria as $k1)
                                        <tr>
                                            <th>{{ $k1->nama }}</th>
                                            @foreach ($kriteria as $k2)
                                                @php
                                                    $perbandingan =
                                                        $perbandingans[$k1->id]->firstWhere('kriteria2_id', $k2->id) ??
                                                        null;
                                                    $savedData[$k1->id][$k2->id] = $perbandingan;
                                                @endphp
                                                <td contenteditable="true" data-id="{{ $perbandingan->id ?? '' }}">
                                                    {{ $perbandingan->nilai_perbandingan ?? '' }}
                                                </td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </tbody>
                                <thead>
                                    <tr>
                                        <th>Matriks Perbandingan</th>
                                        @foreach ($kriteria as $k)
                                            <th>{{ $k->nama }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr id="sumRow">
                                        <td>Jumlah</td>
                                        @foreach ($kriteria as $k)
                                            <td id="sum{{ $k->id }}">0</td>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                            <p>*Bagian tabel ini bisa di edit secara langsung</p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <h3 class="card-header text-center font-weight-bold text-uppercase">
                        Matriks Normalisasi
                    </h3>
                    <div class="card-body">
                        <button id="simpanBobot" class="btn btn-primary mb-1">Simpan Bobot</button>
                        <div class="">
                            <table id="datatable-normalisasi" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Matriks Normalisasi</th>
                                        @foreach ($perbandingansGrouped->first() as $perbandingan)
                                            <th>{{ $perbandingan->kriteria1->nama }}</th>
                                        @endforeach
                                        <th>Bobot</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($perbandingansGrouped as $kriteriaId => $perbandingans)
                                        <tr>
                                            <th>{{ $perbandingans->first()->kriteria2->nama }}</th>
                                            @foreach ($perbandingans as $perbandingan)
                                                <td data-id="{{ $perbandingan->id }}">
                                                    <span class="normalisasi-value"></span>
                                                </td>
                                            @endforeach
                                            <th class="rata-rata">0</th>
                                        </tr>
                                    @endforeach
                                    {{-- @foreach ($perbandingansGrouped as $kriteriaId => $perbandingans)
                                        <tr>
                                            <th>{{ $perbandingans->first()->kriteria2->nama }}</th>
                                            @foreach ($perbandingans as $perbandingan)
                                                <td data-id="{{ $perbandingan->id }}">
                                                    <span class="normalisasi-value"></span>
                                                </td>
                                            @endforeach
                                            <th class="rata-rata">0</th>
                                        </tr>
                                    @endforeach --}}
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Matriks Normalisasi</th>
                                        @foreach ($perbandingansGrouped->first() as $perbandingan)
                                            <th>{{ $perbandingan->kriteria1->nama }}</th>
                                        @endforeach
                                        <th>Bobot</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10">
                        <div class="card">
                            <h3 class="card-header text-center font-weight-bold text-uppercase">
                                Matriks Perkalian
                            </h3>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Perkalian</th>
                                                @foreach ($kriteria as $k)
                                                    <th>{{ $k->nama }}</th>
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($kriteria as $k1)
                                                <tr>
                                                    <th>{{ $k1->nama }}</th>
                                                    @foreach ($kriteria as $k2)
                                                        @php
                                                            $perbandingan = $savedData[$k1->id][$k2->id] ?? null;
                                                        @endphp
                                                        <td contenteditable="true" data-id="{{ $perbandingan->id ?? '' }}">
                                                            {{ $perbandingan->nilai_perbandingan ?? '' }}
                                                        </td>
                                                    @endforeach
                                                    <th>x</th>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <thead>
                                            <tr>
                                                <th>Perkalian</th>
                                                @foreach ($kriteria as $k)
                                                    <th>{{ $k->nama }}</th>
                                                @endforeach
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card">
                            <h3 class="card-header text-center font-weight-bold text-uppercase">
                                Bobot
                            </h3>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Bobot</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($kriteria as $bobot)
                                                <tr>
                                                    <td>{{ number_format($bobot->bobot, 5) }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <thead>
                                            <tr>
                                                <th>Bobot</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <h3 class="card-header text-center font-weight-bold text-uppercase">
                        Matrik Hasil Perkalian
                    </h3>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Hasil *</th>
                                        @foreach ($kriteria as $k)
                                            <th>{{ $k->nama }}</th>
                                        @endforeach
                                        <th>Sum</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $rowSums = [];
                                    @endphp
                                    @foreach ($kriteria as $k1)
                                        <tr>
                                            <th>{{ $k1->nama }}</th>
                                            @php
                                                $rowSum = 0;
                                                $bobotIndex = 0;
                                            @endphp
                                            @foreach ($kriteria as $k2)
                                                @php
                                                    $perbandingan = $savedData[$k1->id][$k2->id] ?? null;
                                                    $bobot = $kriteria[$bobotIndex]->bobot ?? 1; // Default to 1 if bobot is not found
                                                    $result = $perbandingan->nilai_perbandingan * $bobot;
                                                    $rowSum += $result;
                                                    $bobotIndex++;
                                                @endphp
                                                <td data-id="{{ $perbandingan->id ?? '' }}">
                                                    {{ number_format($result, 4) }}
                                                </td>
                                            @endforeach
                                            @php
                                                $rowSums[$k1->id] = $rowSum;
                                            @endphp
                                            <td>{{ number_format($rowSum, 4) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <thead>
                                    <tr>
                                        <th>Hasil *</th>
                                        @foreach ($kriteria as $k)
                                            <th>{{ $k->nama }}</th>
                                        @endforeach
                                        <th>Sum</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <h3 class="card-header text-center font-weight-bold text-uppercase">
                        Uji Konsistensi
                    </h3>
                    <div class="card-body">
                        <div class="">
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
                <div class="card">
                    <h3 class="card-header text-center font-weight-bold text-uppercase">
                        Konsistensi Rasio
                    </h3>
                    <div class="card-body">
                        <div class="">
                            <button id="simpanCI" class="btn btn-primary mb-1">Simpan</button>
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Keterangan</th>
                                        <th>Nilai</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>Jumlah Kriteria (n)</th>
                                        <th>{{ $kriteria->count() }}</th>
                                    </tr>
                                    <tr>
                                        <th>Indeks Random Consistency (IR)</th>
                                        @php
                                            $filteredKonsistensis = $konsistensis->where('n', $kriteria->count());
                                        @endphp

                                        @foreach ($filteredKonsistensis as $konsistensi)
                                            <th>{{ $konsistensi->rasio_konsistensi }}</th>
                                            <!-- Add other columns as needed -->
                                        @endforeach
                                    </tr>
                                    <tr>
                                        @php
                                            $n = count($kriteria);
                                            $lambdaMax = 0;
                                            foreach ($kriteria as $index => $k) {
                                                $lambdaMax += $rowSums[$k->id] / $k->bobot;
                                            }
                                            $lambdaMax = $lambdaMax / $n;
                                        @endphp
                                        <th>λ maks (T) (Jumlah / n)</th>
                                        <th>{{ number_format($lambdaMax, 4) }}</th>
                                    </tr>
                                    <tr>
                                        @php
                                            $ci = ($lambdaMax - $n) / ($n - 1);
                                        @endphp
                                        <th>Nilai Consistency Index (CI) ((λ maks - n)/n)</th>
                                        <th>{{ number_format($ci, 4) }}</th>
                                    </tr>
                                    <tr>
                                        @php
                                            $ri = $filteredKonsistensis->first()->rasio_konsistensi;
                                            $cr = $ci / $ri;
                                            $crClass = $cr <= 0.1 ? 'text-success' : 'text-danger';
                                            $iconClass = $cr <= 0.1 ? 'ri-check-line' : 'ri-close-line';
                                            $hasil = $cr <= 0.1 ? 'Konsisten' : 'Tidak Konsisten';
                                        @endphp
                                        <th>Nilai Consistency Ratio (CR) (CI / IR)</th>
                                        <th class="{{ $crClass }}">{{ number_format($cr, 4) }}<i
                                                class="{{ $iconClass }} {{ $crClass }}"></i></th>
                                    </tr>
                                    <tr>
                                        <th>Syarat Nilai CR</th>
                                        <th>CR ≤ 0.1 maka A cukup konsisten;<br> CR > 0.1 maka A sangat tidak konsisten</th>
                                    </tr>
                                </tbody>
                                <tfoot>

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
            let sums = Array.from({
                length: {{ $kriteria->count() }}
            }, () => 0);
            document.querySelectorAll('#datatable tbody tr').forEach(function(row) {
                row.querySelectorAll('td[contenteditable="true"]').forEach(function(cell, index) {
                    sums[index] += parseFloat(cell.innerText) || 0;
                });
            });

            sums.forEach((sum, index) => {
                let kriteriaId = {{ $kriteria->pluck('id') }}[index];
                document.getElementById('sum' + kriteriaId).innerText = sum.toFixed(2);
            });

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
                    console.log('sum index ' + sums[cellIndex]);
                    console.log(normalisasiValue);
                    cell.querySelector('.normalisasi-value').innerText = normalisasiValue.toFixed(5);
                    total += normalisasiValue;
                });
                row.querySelector('.rata-rata').innerText = (total / sums.length).toFixed(4);
            });
        }

        document.getElementById('simpanBobot').addEventListener('click', function() {
            let bobots = [];
            document.querySelectorAll('#datatable-normalisasi tbody tr').forEach(function(row) {
                let kriteria = row.querySelector('th').innerText;
                let rataRata = parseFloat(row.querySelector('.rata-rata').innerText) || 0;
                bobots.push({
                    kriteria: kriteria,
                    bobot: rataRata
                });
            });

            fetch('{{ route('perbandingan-kriteria.save-bobot') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        bobots: bobots
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Bobot berhasil disimpan!');
                        window.location.reload();
                    } else {
                        alert('Gagal menyimpan bobot.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan saat menyimpan bobot.');
                });
        });

        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('td[contenteditable="true"]').forEach(function(cell) {
                cell.addEventListener('input', calculateSums);
            });
        });


        document.getElementById('newDataButton').addEventListener('click', function() {
            document.querySelectorAll('td[contenteditable="true"]').forEach(function(td) {
                td.innerText = '';
                td.setAttribute('data-id', '');
                td.setAttribute('data-user-form-number', '');
            });
            calculateSums();
        });
    </script>
    <script>
        document.getElementById('updateButton').addEventListener('click', function() {
            let updates = [];
            document.querySelectorAll('td[contenteditable="true"]').forEach(function(td) {
                updates.push({
                    id: td.getAttribute('data-id'),
                    nilai_perbandingan: td.innerText
                });
            });

            fetch('{{ route('perbandingan-kriteria.update') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        updates: updates
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Data updated successfully!');
                    } else {
                        alert('Failed to update data.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while updating data.');
                });
        });

        document.getElementById('simpanCI').addEventListener('click', function() {
            let userId = {{ auth()->check() ? auth()->user()->id : 4 }};
            let t = {{ number_format($lambdaMax, 4, '.', '') }};
            let ci = {{ number_format($ci, 4, '.', '') }};
            let ri = {{ number_format($ri, 4, '.', '') }};
            let hasil = '{{ $hasil }}';

            fetch('{{ route('hasil.store') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        user_id: userId,
                        t: t,
                        ci: ci,
                        ri: ri,
                        hasil: hasil
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Data berhasil disimpan!');
                        window.location.reload();
                    } else {
                        alert('Gagal menyimpan data.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan saat menyimpan data.');
                });
        });
    </script>
@endsection
