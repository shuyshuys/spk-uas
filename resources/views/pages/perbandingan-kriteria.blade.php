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
                        Matriks Perbandingan Kriteria
                    </h3>
                    <div class="card-body">
                        <div class="table-responsive">
                            <span class="table-add float-end mb-3 me-2">
                                {{-- <a href="{{ url('/dashboard/alternatifs/create') }}" class="btn btn-sm btn-success"><i
                                        class="ri-add-fill"><span class="ps-1">Add
                                            New</span></i>
                                </a> --}}
                            </span>
                            <button id="updateButton" class="btn btn-primary mb-1">Simpan</button>
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
                                                <td contenteditable="true" data-id="{{ $perbandingan->id }}">
                                                    {{ $perbandingan->nilai_perbandingan }}</td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </tbody>
                                <thead>
                                    <tr>
                                        <th>Kriteria/Alternatif</th>
                                        @foreach ($perbandingansGrouped->first() as $perbandingan)
                                            <th>{{ $perbandingan->kriteria1->nama }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr id="sumRow">
                                        <td>Jumlah</td>
                                        <td id="sumB">0</td>
                                        <td id="sumC">0</td>
                                        <td id="sumD">0</td>
                                        <td id="sumE">0</td>
                                        <td id="sumF">0</td>
                                    </tr>
                                </tbody>
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
                row.querySelectorAll('td[contenteditable="true"]').forEach(function(cell, cellIndex) {
                    sums[cellIndex] += parseFloat(cell.innerText) || 0;
                });
            });

            document.getElementById('sumB').innerText = sums[0].toFixed(2);
            document.getElementById('sumC').innerText = sums[1].toFixed(2);
            document.getElementById('sumD').innerText = sums[2].toFixed(2);
            document.getElementById('sumE').innerText = sums[3].toFixed(2);
            document.getElementById('sumF').innerText = sums[4].toFixed(2);
        }

        document.addEventListener('DOMContentLoaded', function() {
            calculateSums();

            document.querySelectorAll('td[contenteditable="true"]').forEach(function(cell) {
                cell.addEventListener('input', calculateSums);
            });
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
