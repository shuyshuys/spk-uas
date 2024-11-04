@extends('layouts.app')

@section('title', 'SPK2 - Simple Additive Weighting (SAW)')

@section('content')
    <!-- Page Content  -->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card position-relative inner-page-bg bg-primary mb-3" style="height: 150px;">
                    <div class="inner-page-title">
                        <h3 class="text-white">Simple Additive Weighting</h3>
                        <p class="text-white"> Metode Simple Additive Weighting (SAW) Sering juga dikenal istilah metode
                            penjumlahan terbobot. Konsep dasar metode SAW adalah mencari penjumlahan terbobot dari rating
                            kinerja pada setiap alternatif pada semua atribut (Fishburn, 1067)(MacCrommon, 1968).
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <!-- Editable table -->
                <div class="card">
                    <h3 class="card-header text-center font-weight-bold text-uppercase">
                        Simple Additive Weighting (SAW)
                    </h3>
                    <div class="card-body">
                        <div class="">
                            <span class="table-add float-end mb-3 me-2">
                                {{-- <a href="{{ url('/dashboard/alternatifs/create') }}" class="btn btn-sm btn-success"><i
                                        class="ri-add-fill"><span class="ps-1">Add
                                            New</span></i>
                                </a> --}}

                            </span>
                            <table id="datatable" class="table table-striped table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th>\Kriteria<br>
                                            &nbsp;\<br>
                                            Alternatif\
                                        </th>
                                        @foreach ($sawsGrouped->first() as $saw)
                                            <th class="align-middle">{{ $saw->kriteria->nama }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sawsGrouped as $alternatif_id => $saws)
                                        <tr>
                                            <th>{{ $saws->first()->alternatif->nama }}</th>
                                            @foreach ($saws as $saw)
                                                <td>{{ $saw->nilai }}</td>
                                            @endforeach
                                        </tr>
                                    @endforeach
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
                        Normalized Table (masih salah hhh)
                    </h3>
                    <div class="card-body">
                        <div class="">
                            <table id="normalized-datatable" class="table table-striped table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th>\Kriteria<br>
                                            &nbsp;\<br>
                                            Alternatif\
                                        </th>
                                        @foreach ($sawsGrouped->first() as $saw)
                                            <th class="align-middle">{{ $saw->kriteria->nama }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sawsGrouped as $alternatif_id => $saws)
                                        <tr>
                                            <th>{{ $saws->first()->alternatif->nama }}</th>
                                            @foreach ($saws as $saw)
                                                <td class="normalized-value"></td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Calculate the maximum values for each column
            let maxValues = [];
            document.querySelectorAll('#datatable thead th').forEach((th, index) => {
                if (index > 0) { // Skip the first column header
                    let maxValue = 0;
                    document.querySelectorAll(`#datatable tbody tr td:nth-child(${index + 1})`).forEach(
                        td => {
                            let value = parseFloat(td.innerText) || 0;
                            if (value > maxValue) {
                                maxValue = value;
                            }
                        });
                    maxValues.push(maxValue);
                    // console.log(maxValue);
                }
            });

            // Normalize the values and update the normalized table
            document.querySelectorAll('#datatable tbody tr').forEach((row, rowIndex) => {
                row.querySelectorAll('td').forEach((cell, cellIndex) => {
                    let value = parseFloat(cell.innerText) || 0;
                    let normalizedValue = value / maxValues[cellIndex];
                    // console.log(value);
                    // console.log(maxValues[cellIndex]);
                    // console.log(cellIndex);
                    // console.log(normalizedValue = value / maxValues[cellIndex]);
                    document.querySelector(
                        `#normalized-datatable tbody tr:nth-child(${rowIndex + 1}) td:nth-child(${cellIndex + 2})`
                    ).innerText = normalizedValue.toFixed(4);
                });
            });
        });
    </script>
@endsection
