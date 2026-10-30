@extends('layouts.siswa')

@section('isi_siswa')
<div style="max-width: 1000px; margin: 0 auto;">

    <!-- Top Exam Bar: Title + Timer -->
    <div class="evaluasi-header" style="background: var(--putih); border: 1px solid var(--abu-border); padding: 1rem 1.5rem; border-radius: var(--radius-md); margin-bottom: 1.5rem; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 1rem;">
        <div>
            <div style="display: flex; align-items: center; gap: 0.5rem; font-size: 0.8rem; color: var(--teks-pudar);">
                <span>Evaluasi Akhir</span>
                <i class="fas fa-chevron-right" style="font-size: 0.65rem;"></i>
                <span>Percobaan ke-{{ $evaluasi->percobaan_ke }}</span>
            </div>
            <h3 style="font-size: 1.25rem; font-weight: 600; color: var(--teks-utama); margin: 0.2rem 0 0;">
                Lembar Ujian Bab 4 Bentuk Aljabar
            </h3>
        </div>

        <div style="display: flex; align-items: center; gap: 1.25rem;">
            <!-- Timer Hitung Mundur -->
            <div class="timer-box" style="display: flex; align-items: center; gap: 0.65rem; background: var(--merah-bg); border: 1px solid var(--merah-border); color: var(--merah-salah); padding: 0.5rem 1rem; border-radius: var(--radius-sm); font-weight: 600; font-size: 1.1rem;">
                <i class="fas fa-stopwatch text-red-600"></i>
                <span id="timer-display">--:--:--</span>
            </div>

            <!-- Tombol Kumpul Ujian -->
            <form id="form-kumpul-evaluasi" action="{{ route('siswa.evaluasi.kumpul', $evaluasi->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin mengumpulkan seluruh lembar ujian sekarang?');">
                @csrf
                <button type="submit" class="btn btn-success" style="font-weight: 700;">
                    <i class="fas fa-paper-plane"></i> Kumpulkan Ujian
                </button>
            </form>
        </div>
    </div>

    <div style="display: grid; grid-template-columns: 1fr 300px; gap: 1.5rem; align-items: start;">

        <!-- Kolom Kiri: Kartu Soal Aktif -->
        <div>
            @foreach($daftarJawaban as $idx => $jw)
                @php
                    $nomor = $idx + 1;
                    $soal = $jw->soalEvaluasi;
                @endphp
                <div id="soal-card-{{ $nomor }}" class="kartu evaluasi-soal-card" style="{{ $nomor === 1 ? '' : 'display: none;' }}">
                    <div style="display: flex; align-items: center; justify-content: space-between; border-bottom: 1px solid var(--abu-border); padding-bottom: 0.75rem; margin-bottom: 1.25rem;">
                        <div class="soal-nomor-judul" style="font-weight: 600; color: var(--biru-utama); font-size: 1.05rem;">
                            Soal Nomor {{ $nomor }} dari {{ $daftarJawaban->count() }}
                        </div>
                        <span class="badge badge-biru" style="font-size: 0.75rem;">
                            Sub-bab {{ $soal->kode_sub_bab }}
                        </span>
                    </div>

                    <!-- Teks Pertanyaan -->
                    <div class="soal-pertanyaan-teks" style="font-size: 1.05rem; line-height: 1.6; color: var(--teks-utama); margin-bottom: 1.5rem;">
                        {{ $soal->pertanyaan }}
                    </div>

                    <!-- Input Jawaban Siswa -->
                    <div style="margin-bottom: 1.5rem;">
                        <label style="display: block; font-size: 0.85rem; font-weight: 700; color: var(--teks-utama); margin-bottom: 0.5rem;">
                            Tuliskan Jawaban Akhir Anda:
                        </label>
                        <input type="text" 
                               class="input-jawaban-evaluasi font-math" 
                               data-soal-id="{{ $soal->id }}" 
                               data-index="{{ $nomor }}" 
                               value="{{ $jw->jawaban_siswa ?? '' }}" 
                               placeholder="Ketik jawaban Anda di sini (contoh: 3x + 5)..."
                               style="width: 100%; padding: 0.85rem 1rem; font-size: 1.15rem; border: 2px solid var(--biru-border); border-radius: var(--radius-sm); outline: none; transition: border-color 0.2s;">
                        <div style="font-size: 0.75rem; color: var(--teks-pudar); margin-top: 0.4rem; display: flex; align-items: center; gap: 0.35rem;">
                            <i class="fas fa-cloud-arrow-up text-green-600"></i> Jawaban tersimpan otomatis ke server.
                        </div>
                    </div>

                    <!-- Tombol Navigasi Bawah Soal -->
                    <div style="display: flex; justify-content: space-between; border-top: 1px solid var(--abu-border); padding-top: 1rem;">
                        @if($nomor > 1)
                            <button type="button" class="btn btn-secondary" onclick="pindahSoal({{ $nomor - 1 }})">
                                <i class="fas fa-arrow-left"></i> Soal Sebelumnya
                            </button>
                        @else
                            <div></div>
                        @endif

                        @if($nomor < $daftarJawaban->count())
                            <button type="button" class="btn btn-primary" onclick="pindahSoal({{ $nomor + 1 }})">
                                Soal Selanjutnya <i class="fas fa-arrow-right"></i>
                            </button>
                        @else
                            <button type="button" class="btn btn-success" onclick="document.getElementById('form-kumpul-evaluasi').requestSubmit();">
                                Selesai & Kumpulkan <i class="fas fa-check"></i>
                            </button>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Kolom Kanan: Papan Nomor Soal -->
        <div class="kartu" style="position: sticky; top: 1rem;">
            <div style="font-weight: 600; font-size: 0.95rem; color: var(--teks-utama); margin-bottom: 0.75rem; display: flex; justify-content: space-between; align-items: center;">
                <span>Daftar Nomor Soal</span>
                <span id="hitung-terisi" style="font-size: 0.75rem; color: var(--teks-pudar);"></span>
            </div>

            <div class="nomor-soal-grid" style="display: grid; grid-template-columns: repeat(5, 1fr); gap: 0.5rem; margin-bottom: 1.25rem;">
                @foreach($daftarJawaban as $idx => $jw)
                    @php
                        $nomor = $idx + 1;
                        $sudahDiisi = !empty(trim($jw->jawaban_siswa ?? ''));
                    @endphp
                    <button type="button" 
                            class="nomor-soal-btn {{ $nomor === 1 ? 'aktif' : '' }} {{ $sudahDiisi ? 'sudah-isi' : '' }}" 
                            data-index="{{ $nomor }}"
                            style="width: 100%; height: 40px; border-radius: var(--radius-sm); border: 1px solid var(--abu-border); font-weight: 700; font-size: 0.85rem; cursor: pointer;">
                        {{ $nomor }}
                    </button>
                @endforeach
            </div>

            <!-- Keterangan Warna Nomor -->
            <div style="font-size: 0.75rem; color: var(--teks-pudar); display: flex; flex-direction: column; gap: 0.4rem; border-top: 1px solid var(--abu-border); padding-top: 0.75rem;">
                <div style="display: flex; align-items: center; gap: 0.5rem;">
                    <div style="width: 12px; height: 12px; background: var(--biru-utama); border-radius: 2px;"></div>
                    <span>Soal sedang dibuka</span>
                </div>
                <div style="display: flex; align-items: center; gap: 0.5rem;">
                    <div style="width: 12px; height: 12px; background: var(--hijau-bg); border: 1px solid var(--hijau-benar); border-radius: 2px;"></div>
                    <span>Sudah dijawab</span>
                </div>
                <div style="display: flex; align-items: center; gap: 0.5rem;">
                    <div style="width: 12px; height: 12px; background: var(--abu-latar); border: 1px solid var(--abu-border); border-radius: 2px;"></div>
                    <span>Belum dijawab</span>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection

@push('skrip')
<script src="{{ asset('js/util-fetch.js') }}"></script>
<script src="{{ asset('js/evaluasi.js') }}"></script>
<script>
    function pindahSoal(targetIndex) {
        const btn = document.querySelector(`.nomor-soal-btn[data-index="${targetIndex}"]`);
        if (btn) btn.click();
    }

    document.addEventListener('DOMContentLoaded', function () {
        if (typeof initEvaluasiClient === 'function') {
            initEvaluasiClient({
                evaluasiId: {{ $evaluasi->id }},
                sisaDetik: {{ $sisaDetik }}
            });
        }
    });
</script>
@endpush
