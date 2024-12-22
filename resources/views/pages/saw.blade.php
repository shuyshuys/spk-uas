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
                            <table id="datatable" class="table table-striped table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th>\Kriteria<br>
                                            &nbsp;\<br>
                                            Alternatif\
                                        </th>
                                        {{-- @dd($sawsGrouped) --}}
                                        @foreach ($sawsGrouped->first() as $saw)
                                            <th class="align-middle">C{{ $loop->iteration }} {{ $saw->kriteria->nama }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sawsGrouped as $alternatif_id => $saws)
                                        @if ($saws->first() && $saws->first()->alternatif)
                                            <tr>
                                                <th>A{{ $loop->iteration }} {{ $saws->first()->alternatif->nama }}</th>
                                                @foreach ($saws as $saw)
                                                    <td>{{ $saw->nilai }}</td>
                                                @endforeach
                                            </tr>
                                        @endif
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
                                            <th class="align-middle">C{{ $loop->iteration }} {{ $saw->kriteria->nama }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @foreach ($sawsGrouped as $alternatif_id => $saws)
                                        @if ($saws->first() && $saws->first()->alternatif)
                                            <tr>
                                                <th>A{{ $loop->iteration }} {{ $saws->first()->alternatif->nama }}</th>
                                                @foreach ($saws as $saw)
                                                    <td class="normalized-value"></td>
                                                @endforeach
                                            </tr>
                                        @endif
                                    @endforeach --}}
                                    @php
                                        $maxValues = [];
                                        foreach ($sawsGrouped->first() as $index => $saw) {
                                            $maxValues[$index] = $sawsGrouped->pluck('nilai')->flatten()->max();
                                        }
                                    @endphp
                                    @foreach ($sawsGrouped as $alternatif_id => $saws)
                                        <tr>
                                            <th>A{{ $loop->iteration }} {{ $saws->first()->alternatif->nama }}</th>
                                            @foreach ($saws as $index => $saw)
                                                @php
                                                    $maxValue = $maxValues[$index] ?? 1; // Default to 1 if max value is zero or not set
                                                    $normalizedValue = $maxValue != 0 ? $saw->nilai / $maxValue : 0;
                                                @endphp
                                                <td>{{ number_format($normalizedValue, 4) }}</td>
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
                                        @foreach ($bobots as $bobot)
                                            <td>{{ number_format($bobot->nilai, 5) }}</td>
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
                                        <th></th>
                                        <th>SAW Score (blm cek bener ga)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @foreach ($sawsGrouped as $alternatif_id => $saws)
                                        @if ($saws->first() && $saws->first()->alternatif)
                                            <tr>
                                                <th>A{{ $loop->iteration }} {{ $saws->first()->alternatif->nama }}</th>
                                                <td class="saw-score"></td>
                                            </tr>
                                        @endif
                                    @endforeach --}}
                                    @php
                                        $sawScores = [];
                                        $maxScore = 0;
                                        $bestAlternative = '';
                                    @endphp
                                    @foreach ($sawsGrouped as $alternatif_id => $saws)
                                        @php
                                            $sawScore = 0;
                                            foreach ($saws as $index => $saw) {
                                                $maxValue = $maxValues[$index] ?? 1; // Default to 1 if max value is zero or not set
                                                $normalizedValue = $maxValue != 0 ? $saw->nilai / $maxValue : 0;
                                                $sawScore += $normalizedValue * $bobots[$index]->nilai;
                                            }
                                            if ($sawScore > $maxScore) {
                                                $maxScore = $sawScore;
                                                $bestAlternative = $saws->first()->alternatif->nama;
                                            }
                                            $sawScores[] = [
                                                'name' => $saws->first()->alternatif->nama,
                                                'score' => $sawScore,
                                            ];
                                        @endphp
                                        <tr>
                                            <th>A{{ $loop->iteration }} {{ $saws->first()->alternatif->nama }}</th>
                                            <td>{{ number_format($sawScore, 4) }}</td>
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
                        @foreach ($sawScores as $score)
                            <p class="mb-1"><strong>{{ $score['name'] }}:</strong>
                                {{ number_format($score['score'], 4) }}</p>
                        @endforeach
                        <p class="mt-3"><strong>Kesimpulan:</strong> Nilai terbesar ada pada
                            <strong>{{ $bestAlternative }}</strong>
                            sehingga alternatif <strong>{{ $bestAlternative }}</strong> adalah alternatif yang terpilih
                            sebagai alternatif
                            terbaik.<br>Dengan kata lain, <strong>{{ $bestAlternative }}</strong> akan terpilih sebagai
                            Project Management
                            terbaik sesuai kebutuhanmu.
                        </p>
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
            document.querySelectorAll('#weight-datatable tbody tr td').forEach((td, index) => {
                weights.push(parseFloat(td.innerText) || 0);
            });

            document.querySelectorAll('#normalized-datatable tbody tr').forEach((row, rowIndex) => {
                let sawScore = 0;
                row.querySelectorAll('td').forEach((cell, cellIndex) => {
                    let normalizedValue = parseFloat(cell.innerText) || 0;
                    sawScore += normalizedValue * weights[cellIndex];
                });
                document.querySelector(
                    `#saw-scores-datatable tbody tr:nth-child(${rowIndex + 1}) td.saw-score`
                ).innerText = sawScore.toFixed(4);
            });
        });
    </script>
@endsection
