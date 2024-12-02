@extends('layouts.app')

@section('title', 'SPK2 - Perbandingan Kriteria')

@section('content')
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
                <div class="card">
                    <h3 class="card-header text-center font-weight-bold text-uppercase">
                        Matriks Perbandingan Kriteria
                    </h3>
                    <div class="card-body">
                        <div class="table-responsive">
                            <button id="newDataButton" class="btn btn-primary mb-1">Baru</button>
                            <button id="updateButton" class="btn btn-primary mb-1">Simpan</button>
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
                                    @foreach ($kriteria as $k1)
                                        <tr>
                                            <th>{{ $k1->nama }}</th>
                                            @foreach ($kriteria as $k2)
                                                @php
                                                    $perbandingan =
                                                        $perbandingans[$k1->id]->firstWhere('kriteria2_id', $k2->id) ??
                                                        null;
                                                @endphp
                                                <td contenteditable="true" data-id="{{ $perbandingan->id ?? '' }}">
                                                    {{ $perbandingan->nilai_perbandingan ?? '' }}
                                                </td>
                                                {{-- <td contenteditable="true" data-id="{{ $perbandingan->id ?? '' }}" data-user-id="{{ auth()->user()->id }}" data-user-form-number="">
                                                    {{ $perbandingan->nilai_perbandingan ?? '' }}
                                                </td> --}}
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
                        </div>
                    </div>
                    <div class="card">
                        <h3 class="card-header text-center font-weight-bold text-uppercase">
                            Matriks Normalisasi
                        </h3>
                        <div class="card-body">
                            <button id="updateButton" class="btn btn-primary mb-1">Simpan Bobot</button>
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
                                                <th>{{ $perbandingans->first()->kriteria2->nama }}</th>
                                                @foreach ($perbandingans as $perbandingan)
                                                    <td data-id="{{ $perbandingan->id }}">
                                                        <span class="normalisasi-value"></span>
                                                    </td>
                                                @endforeach
                                                <th class="rata-rata">0</th>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Matriks Normalisasi</th>
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
                    cell.querySelector('.normalisasi-value').innerText = normalisasiValue.toFixed(5);
                    total += normalisasiValue;
                });
                row.querySelector('.rata-rata').innerText = (total / sums.length).toFixed(5);
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            calculateSums();

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
    </script>
@endsection
