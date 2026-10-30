@extends('layouts.siswa')

@section('isi_siswa')
<div style="max-width: 900px; margin: 0 auto;">

    <!-- Breadcrumb & Header Sub-Bab -->
    <div style="margin-bottom: 1.5rem;">
        <div style="display: flex; align-items: center; gap: 0.5rem; font-size: 0.85rem; color: var(--teks-pudar); margin-bottom: 0.5rem;">
            <a href="{{ route('dashboard') }}" style="color: var(--teks-pudar); text-decoration: none;">Dasbor</a>
            <i class="fas fa-chevron-right" style="font-size: 0.7rem;"></i>
            <span style="color: var(--biru-utama); font-weight: 600;">Sub-bab {{ chr(64 + $subBab->urutan) }}</span>
        </div>

        <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 1rem;">
            <div>
                @if($isTuntas)
                    <span class="badge badge-hijau" style="font-size: 0.8rem; margin-bottom: 0.35rem;">Tuntas</span>
                @endif
                <h2 style="font-size: 1.75rem; font-weight: 600; color: var(--teks-utama); margin: 0.25rem 0;">
                    {{ $subBab->judul }}
                </h2>
            </div>

        </div>
    </div>

    <!-- Konten Materi Markdown -->
    <div class="kartu" style="margin-bottom: 2rem; padding: 2.25rem; line-height: 1.75; font-size: 1rem; color: var(--teks-utama);">
        <div class="materi-konten" style="overflow-wrap: break-word;">
            {!! Str::markdown($subBab->isi_markdown ?? '') !!}
        </div>
    </div>

    <!-- Area Kuis Sub-Bab -->
    <div class="kartu" style="margin-bottom: 3rem;">
        <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 1rem; margin-bottom: 1.25rem;">
            <div style="display: flex; align-items: center; gap: 0.75rem;">
                <div style="width: 44px; height: 44px; border-radius: var(--radius-md); background: var(--biru-muda); color: var(--biru-utama); display: flex; align-items: center; justify-content: center; font-size: 1.25rem;">
                    <i class="fas fa-tasks"></i>
                </div>
                <div>
                    <h3 style="font-size: 1.25rem; font-weight: 600; color: var(--teks-utama); margin: 0;">
                        Kuis Pemahaman: Sub-bab {{ chr(64 + $subBab->urutan) }}
                    </h3>
                    <p style="font-size: 0.85rem; color: var(--teks-pudar); margin: 0;">
                        5 soal latihan dengan cara pengerjaan sesuai jenis soalnya.
                    </p>
                </div>
            </div>

            @if($isTuntas)
                <span class="badge badge-hijau" style="font-size: 0.85rem; padding: 0.4rem 0.85rem;">
                    <i class="fas fa-circle-check"></i> Sub-bab Telah Tuntas
                </span>
            @endif
        </div>

        <div style="background-color: var(--abu-latar); padding: 1.25rem; border-radius: var(--radius-md); border: 1px solid var(--abu-border); margin-bottom: 1.5rem; font-size: 0.875rem; color: var(--teks-pudar); line-height: 1.6;">
            <strong>Aturan Pengerjaan Kuis:</strong>
            <ul style="margin: 0.5rem 0 0; padding-left: 1.25rem;">
                @if($subBab->urutan === 1)
                    <li>Soal A4 dikerjakan dengan <strong>↵ Cek Step</strong>. Soal A1–A3 dan A5 memakai satu jawaban langsung.</li>
                @elseif($subBab->urutan === 2)
                    <li>Soal B2–B4 dikerjakan dengan <strong>↵ Cek Step</strong>. Soal B1 dan B5 memakai satu jawaban langsung.</li>
                @else
                    <li>Soal C1–C5 memakai satu jawaban langsung. Kuis ini tidak menggunakan <strong>↵ Cek Step</strong>.</li>
                @endif
                <li>Gunakan tombol <strong>Petunjuk</strong> jika memerlukan panduan berpikir.</li>
                <li>Kerjakan soal secara berurutan. Setelah siap, klik <strong>Kumpulkan Jawaban</strong> untuk membuka soal berikutnya.</li>
                <li>Semua 5 soal harus selesai dikumpulkan untuk menuntaskan sub-bab ini.</li>
            </ul>
        </div>

        <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 1rem;">
            @if($sesiAktif)
                <div style="font-size: 0.9rem; color: var(--teks-utama);">
                    <i class="fas fa-hourglass-half text-amber-500"></i> Ada pengerjaan aktif (Percobaan ke-{{ $sesiAktif->percobaan_ke }}).
                </div>
                <form action="{{ route('siswa.kuis.mulai', $subBab->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary" style="padding: 0.75rem 1.75rem; font-size: 0.95rem;">
                        <i class="fas fa-play"></i> Lanjutkan Pengerjaan Kuis
                    </button>
                </form>
            @elseif($isTuntas)
                <div style="display: flex; gap: 0.75rem; flex-wrap: wrap;">
                    <form action="{{ route('siswa.kuis.ulang', $subBab->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-secondary">
                            <i class="fas fa-rotate-right"></i> Kerjakan Ulang Kuis (Latihan)
                        </button>
                    </form>

                    @if($nextSubBab && $nextTerbuka)
                        <a href="{{ route('siswa.subbab.show', $nextSubBab->id) }}" class="btn btn-primary" style="text-decoration: none;">
                            Lanjut ke Sub-bab {{ chr(64 + $nextSubBab->urutan) }}: {{ $nextSubBab->judul }} <i class="fas fa-arrow-right"></i>
                        </a>
                    @elseif($evaluasiTerbuka)
                        <a href="{{ route('siswa.evaluasi.index') }}" class="btn btn-primary" style="text-decoration: none;">
                            <i class="fas fa-award"></i> Lanjut ke Evaluasi Akhir Bab 4 <i class="fas fa-arrow-right"></i>
                        </a>
                    @endif
                </div>
            @else
                <div></div>
                <form action="{{ route('siswa.kuis.mulai', $subBab->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary" style="padding: 0.75rem 1.75rem; font-size: 0.95rem;">
                        <i class="fas fa-pencil-alt"></i> Mulai Kuis Sub-bab {{ chr(64 + $subBab->urutan) }}
                    </button>
                </form>
            @endif
        </div>
    </div>

</div>

@endsection
