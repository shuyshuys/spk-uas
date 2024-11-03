@extends('layouts.app')

@section('title', 'SPK2 - Matriks Keputusan')

@section('content')
    <!-- Page Content  -->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card position-relative inner-page-bg bg-primary" style="height: 150px;">
                    <div class="inner-page-title">
                        <h3 class="text-white">Halaman Matriks Keputusan</h3>
                        <p class="text-white"> Halaman ini menampilkan matriks keputusan yang menunjukkan nilai setiap
                            alternatif terhadap setiap kriteria. Matriks ini berisi data awal sebelum dilakukan normalisasi.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <!-- Editable table -->
                <div class="card">
                    <h3 class="card-header text-center font-weight-bold text-uppercase">
                        Matriks Keputusan
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
                                        <th>Kriteria/Alternatif</th>
                                        @foreach ($matriksGrouped->first() as $matrik)
                                            <th>{{ $matrik->alternatif->nama }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($matriksGrouped as $kriteriaId => $matriks)
                                        <tr>
                                            <td>{{ $matriks->first()->kriteria->nama }}</td>
                                            @foreach ($matriks as $matrik)
                                                <td contenteditable="true" data-id="{{ $matrik->id }}">
                                                    {{ $matrik->nilai }}</td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Kriteria/Alternatif</th>
                                        @foreach ($matriksGrouped->first() as $matrik)
                                            <th>{{ $matrik->alternatif->nama }}</th>
                                        @endforeach
                                    </tr>
                                </tfoot>
                            </table>

                            <script>
                                document.getElementById('updateButton').addEventListener('click', function() {
                                    let updates = [];
                                    document.querySelectorAll('td[contenteditable="true"]').forEach(function(td) {
                                        updates.push({
                                            id: td.getAttribute('data-id'),
                                            nilai: td.innerText
                                        });
                                    });

                                    fetch('{{ route('matriks-keputusans.update') }}', {
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
