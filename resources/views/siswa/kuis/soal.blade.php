@extends('layouts.siswa')

@section('isi_siswa')
<div style="max-width: 900px; margin: 0 auto;">

    <!-- Header Soal & Indikator Soal -->
    <div style="margin-bottom: 1.25rem;">
        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 0.75rem;">
            <div style="display: flex; align-items: center; gap: 0.5rem; font-size: 0.85rem; color: var(--teks-pudar);">
                <a href="{{ route('siswa.subbab.show', $subBab->id) }}" style="color: var(--teks-pudar); text-decoration: none;">
                    Sub-bab {{ chr(64 + $subBab->urutan) }}
                </a>
                <i class="fas fa-chevron-right" style="font-size: 0.7rem;"></i>
                <span style="color: var(--biru-utama); font-weight: 600;">Kuis (Percobaan ke-{{ $sesi->percobaan_ke }})</span>
            </div>

            <button type="button" class="btn btn-secondary btn-buka-kamus" style="padding: 0.35rem 0.75rem; font-size: 0.8rem;">
                <i class="fas fa-book-bookmark text-blue-600"></i> Kamus Istilah
            </button>
        </div>

        <!-- Indikator 5 Soal Kuis -->
        <div style="display: flex; align-items: center; justify-content: space-between; background: var(--putih); border: 1px solid var(--abu-border); padding: 0.75rem 1rem; border-radius: var(--radius-md);">
            <div style="display: flex; gap: 0.5rem; align-items: center;">
                @for($n = 1; $n <= 5; $n++)
                    @php
                        $isCurrent = ($n === $soal->nomor);
                        // Cek apakah soal ini sudah dikumpulkan di sesi ini
                        $soalN = \App\Models\SoalKuis::where('kuis_id', $sesi->kuis_id)->where('nomor', $n)->first();
                        $sudahDone = $soalN ? \App\Models\LangkahKuis::where('sesi_kuis_id', $sesi->id)->where('soal_kuis_id', $soalN->id)->where('dikumpulkan', true)->exists() : false;
                    @endphp
                    @if($sudahDone || $isCurrent)
                        <a href="{{ route('siswa.kuis.soal', ['sesi' => $sesi->id, 'nomor' => $n]) }}" 
                           style="width: 34px; height: 34px; border-radius: var(--radius-sm); display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 0.85rem; text-decoration: none; {{ $isCurrent ? 'background: var(--biru-utama); color: var(--putih);' : ($sudahDone ? 'background: var(--hijau-bg); color: var(--hijau-benar); border: 1px solid var(--hijau-border);' : 'background: var(--abu-latar); color: var(--teks-halus);') }}">
                            {{ $n }}
                        </a>
                    @else
                        <div style="width: 34px; height: 34px; border-radius: var(--radius-sm); display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 0.85rem; background: var(--abu-latar); color: var(--abu-garis); border: 1px dashed var(--abu-garis);">
                            <i class="fas fa-lock" style="font-size: 0.7rem;"></i>
                        </div>
                    @endif
                @endfor
            </div>

            <div style="font-size: 0.8rem; font-weight: 700; color: var(--teks-pudar);">
                Soal {{ $soal->nomor }} dari 5
            </div>
        </div>
    </div>

    <!-- Lembar Kerja Container -->
    <div class="lembar-kerja-container">

        <!-- Header Pertanyaan -->
        <div class="soal-header-box">
            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 0.5rem;">
                <span class="soal-posisi-badge">Soal Nomor {{ $soal->nomor }}</span>
                <div style="display: flex; align-items: center; gap: 0.5rem;">
                    <span class="badge {{ $soal->mode === 'langkah' ? 'badge-biru' : '' }}" @if($soal->mode !== 'langkah') style="background: var(--abu-latar); color: var(--teks-pudar);" @endif>
                        {{ $soal->mode === 'langkah' ? 'Mode langkah' : 'Jawaban langsung' }}
                    </span>
                    @if($sudahDikumpulkan)
                    <span class="badge badge-hijau"><i class="fas fa-check-circle"></i> Sudah Dikumpulkan</span>
                    @endif
                </div>
            </div>

            <div class="soal-teks-pertanyaan">
                {{ $soal->teks_soal }}
            </div>
            <p class="petunjuk-mode-soal">
                @if($soal->mode === 'langkah')
                    Tulis langkah sesuai pembahasan ({{ $soal->jumlah_langkah }} langkah), lalu pilih <strong>Cek Step</strong>. Setelah langkah terakhir benar, kumpulkan jawaban akhir.
                @else
                    Tulis jawaban akhir pada kolom di bawah, lalu pilih <strong>Kumpulkan Jawaban</strong>.
                @endif
            </p>
        </div>

        <!-- Daftar Baris Langkah yang Sudah Divalidasi -->
        <div id="daftar-baris-langkah" class="daftar-baris-langkah" @if($soal->mode !== 'langkah') style="display: none;" @endif>
            @php
                $jumlahLangkahTerkunci = 0;
            @endphp
            @forelse($langkahList as $idx => $lk)
                @php
                    $langkahTerkunci = $lk->apakah_ekuivalen && ! $lk->dikumpulkan;
                    if ($langkahTerkunci) $jumlahLangkahTerkunci++;
                @endphp
                <div class="baris-langkah-item {{ $lk->apakah_ekuivalen ? 'benar' : 'salah' }} {{ $lk->dikumpulkan ? 'dikumpulkan' : '' }}">
                    <span class="baris-nomor">{{ $lk->dikumpulkan ? '↵' : ($langkahTerkunci ? $jumlahLangkahTerkunci : '↻') }}</span>
                    <span class="baris-ekspresi font-math">{{ $lk->ekspresi_siswa }}</span>
                    <span class="baris-status-icon">
                        @if($lk->apakah_ekuivalen)
                            <i class="fas fa-check-circle text-green-600" style="color: var(--hijau-benar);"></i>
                        @else
                            <i class="fas fa-times-circle text-red-500" style="color: var(--merah-salah);"></i>
                        @endif
                    </span>
                </div>
            @empty
                <!-- Belum ada langkah -->
            @endforelse
        </div>

        <!-- Umpan Balik Instan Box (Hidden by default, shown by JS) -->
        <div id="umpan-balik-box" class="umpan-balik-box" style="display: none; align-items: center; gap: 0.65rem;">
            <i class="fas fa-info-circle"></i>
            <span id="umpan-balik-teks"></span>
        </div>

        <div id="hasil-kumpulan" class="umpan-balik-box" style="display: none; align-items: center; gap: 0.65rem;" role="status" aria-live="polite"></div>

        <!-- Gelembung Bimbingan Hint AI (Hidden by default) -->
        <div id="gelembung-ai" class="gelembung-ai-container" style="display: none;">
            <div class="avatar-ai">
                <i class="fas fa-comment-dots"></i>
            </div>
            <div class="ai-bubble-content">
                <div class="ai-bubble-title">Petunjuk Sokratik</div>
                <div id="teks-ai" class="ai-bubble-text">
                    Sedang memuat petunjuk...
                </div>
            </div>
        </div>

        <!-- Kotak Pembahasan (Jika sudah dikumpulkan) -->
        <div id="box-pembahasan" class="pembahasan-box" style="{{ $sudahDikumpulkan ? 'display: block;' : 'display: none;' }}">
            <div class="pembahasan-title">
                <i class="fas fa-book-open"></i> Pembahasan Jawaban
            </div>
            <div id="isi-pembahasan" class="pembahasan-isi">
                {{ $soal->pembahasan ?? 'Pembahasan telah dicatat.' }}
            </div>
        </div>

        <!-- Navigasi Selanjutnya (Jika sudah dikumpulkan & bukan soal 5) -->
        <div id="navigasi-selanjutnya" style="{{ ($sudahDikumpulkan && $soal->nomor < 5) ? 'display: flex;' : 'display: none;' }} justify-content: flex-end; margin-top: 1.25rem;">
            <a href="{{ route('siswa.kuis.soal', ['sesi' => $sesi->id, 'nomor' => $soal->nomor + 1]) }}" class="btn btn-primary" style="text-decoration: none;">
                Lanjut ke Soal {{ $soal->nomor + 1 }} <i class="fas fa-arrow-right"></i>
            </a>
        </div>

        <!-- Kotak Selesai Kuis (Jika soal 5 sudah dikumpulkan) -->
        <div id="box-selesai-kuis" style="{{ ($sudahDikumpulkan && $soal->nomor === 5) ? 'display: block;' : 'display: none;' }} background: var(--hijau-bg); border: 1px solid var(--hijau-border); padding: 1.5rem; border-radius: var(--radius-md); text-align: center; margin-top: 1.5rem;">
            <div style="font-size: 2rem; color: var(--hijau-benar); margin-bottom: 0.5rem;">
                <i class="fas fa-circle-check"></i>
            </div>
            <h4 style="font-size: 1.25rem; font-weight: 600; color: var(--hijau-benar); margin-bottom: 0.35rem;">
                Selamat! Seluruh Soal Kuis Selesai!
            </h4>
            <p style="font-size: 0.875rem; color: var(--status-hijau-teks); margin-bottom: 1.25rem;">
                Kamu telah menuntaskan kuis Sub-bab {{ chr(64 + $subBab->urutan) }}. Terus pertahankan semangat belajarmu!
            </p>
            <div style="display: flex; justify-content: center; gap: 0.75rem; flex-wrap: wrap;">
                <a href="{{ route('siswa.subbab.show', $subBab->id) }}" class="btn btn-secondary" style="text-decoration: none;">
                    Kembali ke Halaman Sub-bab
                </a>
                <a href="{{ route('dashboard') }}" class="btn btn-primary" style="text-decoration: none;">
                    Ke Dasbor Utama
                </a>
            </div>
        </div>

        @if(! $isReadOnly)
            <!-- Area Input Langkah Baru -->
            <div style="margin-top: 1.5rem;">
                <label style="display: block; font-size: 0.85rem; font-weight: 700; color: var(--teks-utama); margin-bottom: 0.4rem;">
                    @if($soal->mode === 'langkah')
                        <span id="label-input-langkah" data-langkah-berikutnya="{{ $jumlahLangkahBenar + 1 }}">Ketik langkah {{ $jumlahLangkahBenar + 1 }} dari {{ $soal->jumlah_langkah }}:</span>
                    @else
                        Ketik jawaban:
                    @endif
                </label>
                <div class="baris-input-aktif">
                <math-field id="input-ekspresi" class="input-ekspresi-field font-math" data-last-correct="{{ $ekspresiBenarTerakhir }}" value="{{ $ekspresiDraf }}" virtual-keyboard-mode="onfocus" smart-mode aria-label="Tulis langkah atau jawaban akhir"></math-field>
                </div>
                <p class="keyboard-petunjuk">Gunakan keyboard matematika yang muncul saat kolom jawaban dipilih.</p>

                <!-- Tombol Aksi Utama -->
                <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 0.75rem; margin-top: 0.75rem;">
                    <div style="display: flex; gap: 0.5rem;">
                        @if($soal->mode === 'langkah')
                        <button type="button" id="btn-cek-step" class="btn btn-primary" data-jumlah-langkah="{{ $soal->jumlah_langkah }}" data-langkah-selesai="{{ $semuaLangkahSelesai ? 'true' : 'false' }}" @disabled($semuaLangkahSelesai) style="background-color: var(--biru-utama);">
                            <span>{{ $semuaLangkahSelesai ? 'Semua langkah diperiksa' : '↵ Cek Step' }}</span>
                        </button>
                        @endif
                        <button type="button" id="btn-hint" class="btn btn-secondary">
                            <span><i class="fas fa-circle-question" style="margin-right: 0.35rem;"></i> Petunjuk</span>
                        </button>
                    </div>

                    <button type="button" id="btn-kumpul" class="btn btn-success">
                        <i class="fas fa-check-circle"></i> Kumpulkan Jawaban
                    </button>
                </div>
            </div>

        @endif

    </div>

</div>

<!-- Modal Kamus Istilah -->
@include('components.kamus-istilah', ['kamusIstilah' => $kamusIstilah])
@endsection

@push('skrip')
<script src="{{ asset('js/util-fetch.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/mathlive@0.111.1"></script>
<script src="{{ asset('js/kuis.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        if (window.mathVirtualKeyboard) {
            window.mathVirtualKeyboard.layouts = ['numeric', 'symbols', 'alphabetic'];
            window.mathVirtualKeyboard.editToolbar = 'none';
            window.mathVirtualKeyboard.container = document.body;
        }

        if (typeof initKuisWorksheet === 'function') {
            initKuisWorksheet({
                sesiId: {{ $sesi->id }},
                nomorSoal: {{ $soal->nomor }},
                isReadOnly: {{ $isReadOnly ? 'true' : 'false' }}
            });
        }
    });
</script>
@endpush
