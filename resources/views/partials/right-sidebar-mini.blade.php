<div class="right-sidebar-mini right-sidebar">
    <div class="right-sidebar-panel p-0">
        <div class="card shadow-none">
            <div class="card-body p-0">
                <div class="media-height p-3" data-scrollbar="init">
                    <h4 class="pt-3">Hasil terbaru</h4>
                    <hr style="border: 1px solid grey; margin: 6px 0;" class="mb-2">
                    @foreach ($konsistensis as $konsistensi)
                        <div class="d-flex align-items-start mb-4">
                            <div class="iq-profile-avatar status-online">
                                <img class="rounded-circle avatar-50"
                                    src="{{ $konsistensi->kriteria->user->profile_picture }}" alt="">
                            </div>
                            <div class="ms-3">
                                <h5>Konsistensi Rasio<br>{{ $konsistensi->kriteria->nama }}</h5>
                                <h6 class="mb-0">t = 6.0579</h6>
                                <h6 class="mb-0">CI = {{ $konsistensi->ci }}</h6>
                                <h6 class="mb-0">CR = {{ $konsistensi->cr }}</h6>
                                <h6 class="mb-0">Hasil = {{ $konsistensi->hasil }}</h6>
                            </div>
                        </div>
                        <hr style="border: 1px solid grey; margin: 6px 0;" class="mb-2">
                    @endforeach
                </div>
                <div class="right-sidebar-toggle bg-primary text-white mt-3">
                    <i class="ri-arrow-left-line side-left-icon"></i>
                    <i class="ri-arrow-right-line side-right-icon"><span class="ms-3 d-inline-block">Close
                            Menu</span></i>
                </div>
            </div>
        </div>
    </div>
</div>
