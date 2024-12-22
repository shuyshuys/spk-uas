@extends('layouts.app')

@section('title', 'SPK2 - Simple Additive Weighting (SAW)')

@section('content')
    <!-- Page Content  -->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card position-relative inner-page-bg bg-primary mb-3" style="height: 150px;">
                    <div class="inner-page-title">
                        <h3 class="text-white">SAW (Simple Additive Weighting)</h3>
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
                        Alternatif di setiap Kriteria
                    </h3>
                    <div class="card-body">
                        <div class="table-editable">
                            <div class="d-flex justify-content-between mb-1">
                                <div>
                                    <button id="clearButton" class="btn btn-primary">Bersihkan</button>
                                    <button id="updateButton" class="btn btn-primary">Simpan</button>
                                </div>
                                <div>
                                    <a href="/dashboard/alternatifs" class="btn btn-info">Ubah Alternatif</a>
                                </div>
                            </div>
                            <table id="datatable" class="table table-striped table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th>\Kriteria<br>
                                            &nbsp;\<br>
                                            Alternatif\
                                        </th>
                                        @foreach ($sawsGrouped->first() as $saw)
                                            <th class="align-middle">C{{ $loop->iteration }} {{ $saw->kriteria->nama }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sawsGrouped as $alternatif_id => $saws)
                                        @if ($saws->first() && $saws->first()->alternatif)
                                            <tr data-alternatif-id="{{ $alternatif_id }}">
                                                <th>A{{ $loop->iteration }} {{ $saws->first()->alternatif->nama }}</th>
                                                @foreach ($saws as $saw)
                                                    <td contenteditable="true" data-kriteria-id="{{ $saw->kriteria_id }}">
                                                        {{ $saw->nilai }}</td>
                                                @endforeach
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                                <thead>
                                    <tr>
                                        <th>Alternatif/<br>
                                            &nbsp;/<br>
                                            /Kriteria
                                        </th>
                                        @foreach ($sawsGrouped->first() as $saw)
                                            <th class="align-middle">C{{ $loop->iteration }} {{ $saw->kriteria->nama }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                            </table>
                            <p>*Bagian tabel ini bisa di edit secara langsung</p>
                            <p>*Jika alternatif belum muncul semua, bisa di refresh lagi untuk memunculkan data awal</p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <h3 class="card-header text-center font-weight-bold text-uppercase">
                        Normalisasi
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
                                            <th class="align-middle">C{{ $loop->iteration }} {{ $saw->kriteria->nama }}
                                            </th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sawsGrouped as $alternatif_id => $saws)
                                        <tr>
                                            <th>A{{ $loop->iteration }} {{ $saws->first()->alternatif->nama }}</th>
                                            @foreach ($saws as $index => $saw)
                                                <td class="normalized-value"></td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <h3 class="card-header text-center font-weight-bold text-uppercase">
                        Bobot
                    </h3>
                    <div class="card-body">
                        <div class="">
                            <table id="weight-datatable" class="table table-striped table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th></th>
                                        @foreach ($saws as $weight)
                                            <th class="align-middle">C{{ $loop->iteration }} {{ $weight->kriteria->nama }}
                                            </th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="align-middle">Bobot</td>
                                        @foreach ($kriterias as $bobot)
                                            <td class="bobot-value">{{ number_format($bobot->bobot, 5) }}</td>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <h3 class="card-header text-center font-weight-bold text-uppercase">
                        Nilai SAW
                    </h3>
                    <div class="card-body">
                        <div class="">
                            <table id="saw-scores-datatable" class="table table-striped table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th>Alternatif</th>
                                        @foreach ($sawsGrouped->first() as $saw)
                                            <th class="align-middle">C{{ $loop->iteration }} {{ $saw->kriteria->nama }}
                                            </th>
                                        @endforeach
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sawsGrouped as $alternatif_id => $saws)
                                        <tr>
                                            <th>A{{ $loop->iteration }} {{ $saws->first()->alternatif->nama }}</th>
                                            @foreach ($saws as $index => $saw)
                                                <td class="saw-value"></td>
                                            @endforeach
                                            <td class="saw-total"></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <h3 class="card-header text-center font-weight-bold text-uppercase">
                        Hasil dan Kesimpulan
                    </h3>
                    <div id="result-explanation" class="card-body">
                        <h4 class="mt-3"><strong>Kesimpulan</strong><br> Nilai terbesar ada pada
                            <strong id="best-alternative"></strong>
                            sehingga alternatif <strong id="best-alternative"></strong> adalah alternatif yang terpilih
                            sebagai alternatif
                            terbaik.<br>Dengan kata lain, <strong id="best-alternative"></strong> akan terpilih sebagai
                            Project Management sesuai kebutuhanmu.
                        </h4>
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
                }
            });

            // Normalize the values and update the normalized table
            document.querySelectorAll('#datatable tbody tr').forEach((row, rowIndex) => {
                row.querySelectorAll('td').forEach((cell, cellIndex) => {
                    let value = parseFloat(cell.innerText) || 0;
                    let normalizedValue = value / maxValues[cellIndex];
                    document.querySelector(
                        `#normalized-datatable tbody tr:nth-child(${rowIndex + 1}) td:nth-child(${cellIndex + 2})`
                    ).innerText = normalizedValue.toFixed(4);
                });
            });

            // Calculate SAW scores and update the SAW scores table
            let weights = [];
            document.querySelectorAll('#weight-datatable .bobot-value').forEach(td => {
                weights.push(parseFloat(td.innerText) || 0);
            });

            let maxScore = 0;
            let bestAlternative = '';
            document.querySelectorAll('#normalized-datatable tbody tr').forEach((row, rowIndex) => {
                let sawScore = 0;
                row.querySelectorAll('td').forEach((cell, cellIndex) => {
                    let normalizedValue = parseFloat(cell.innerText) || 0;
                    let weightedValue = normalizedValue * weights[cellIndex];
                    document.querySelector(
                        `#saw-scores-datatable tbody tr:nth-child(${rowIndex + 1}) td:nth-child(${cellIndex + 2})`
                    ).innerText = weightedValue.toFixed(9);
                    sawScore += weightedValue;
                });
                document.querySelector(
                    `#saw-scores-datatable tbody tr:nth-child(${rowIndex + 1}) td.saw-total`
                ).innerText = sawScore.toFixed(9);

                if (sawScore > maxScore) {
                    maxScore = sawScore;
                    bestAlternative = document.querySelector(
                        `#saw-scores-datatable tbody tr:nth-child(${rowIndex + 1}) th`
                    ).innerText;
                }
            });

            document.getElementById('best-alternative').innerText = bestAlternative;

            // Save updated data to the database
            document.getElementById('updateButton').addEventListener('click', function() {
                let updatedData = [];
                document.querySelectorAll('#datatable tbody tr').forEach(row => {
                    let alternatifId = row.getAttribute('data-alternatif-id');
                    row.querySelectorAll('td').forEach(cell => {
                        let kriteriaId = cell.getAttribute('data-kriteria-id');
                        let nilai = parseFloat(cell.innerText) || 0;
                        updatedData.push({
                            alternatif_id: alternatifId,
                            kriteria_id: kriteriaId,
                            nilai: nilai
                        });
                    });
                });

                fetch('{{ route('alternatifkriteria.update') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            data: updatedData
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

            // Clear all data in the table
            document.getElementById('clearButton').addEventListener('click', function() {
                document.querySelectorAll('#datatable tbody tr td').forEach(cell => {
                    cell.innerText = '';
                });
                document.querySelectorAll('#normalized-datatable tbody tr td').forEach(cell => {
                    cell.innerText = '';
                });
                document.querySelectorAll('#saw-scores-datatable tbody tr td').forEach(cell => {
                    cell.innerText = '';
                });
                document.getElementById('best-alternative').innerText = '';
            });
        });
    </script>
@endsection
