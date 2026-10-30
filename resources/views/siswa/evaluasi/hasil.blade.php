@extends('layouts.siswa')

@section('isi_siswa')
<div style="max-width: 900px; margin: 0 auto;">

    @php
        $isLulus = ($evaluasi->nilai >= $kkm);
        $jawabanA = $daftarJawaban->filter(fn($j) => $j->soalEvaluasi?->subBab?->urutan == 1);
        $jawabanB = $daftarJawaban->filter(fn($j) => $j->soalEvaluasi?->subBab?->urutan == 2);
        $jawabanC = $daftarJawaban->filter(fn($j) => $j->soalEvaluasi?->subBab?->urutan == 3);
        $skorA = $jawabanA->count() > 0 ? (int) round(($jawabanA->where('status_benar', true)->count() / $jawabanA->count()) * 100) : 0;
        $skorB = $jawabanB->count() > 0 ? (int) round(($jawabanB->where('status_benar', true)->count() / $jawabanB->count()) * 100) : 0;
        $skorC = $jawabanC->count() > 0 ? (int) round(($jawabanC->where('status_benar', true)->count() / $jawabanC->count()) * 100) : 0;
    @endphp

    <!-- Hasil Skor Banner -->
    <div class="kartu hasil-skor-card" style="text-align: center; padding: 2.5rem 1.5rem; margin-bottom: 2rem;">
        <div style="width: 72px; height: 72px; border-radius: 50%; background: {{ $isLulus ? 'var(--hijau-bg)' : 'var(--merah-bg)' }}; color: {{ $isLulus ? 'var(--hijau-benar)' : 'var(--merah-salah)' }}; display: inline-flex; align-items: center; justify-content: center; font-size: 2.25rem; margin-bottom: 1rem;">
            <i class="fas {{ $isLulus ? 'fa-circle-check' : 'fa-circle-xmark' }}"></i>
        </div>

        <h2 style="font-size: 1.75rem; font-weight: 600; color: var(--teks-utama); margin: 0 0 0.5rem;">
            {{ $isLulus ? 'Evaluasi Akhir Tuntas' : 'Hasil Belum Mencapai KKM' }}
        </h2>

        <p style="font-size: 0.95rem; color: var(--teks-pudar); max-width: 550px; margin: 0 auto 1.5rem;">
            {{ $isLulus 
                ? 'Skor Anda telah memenuhi Kriteria Ketuntasan Minimal (KKM). Pemahaman Bab 4 Bentuk Aljabar tercapai.' 
                : 'Skor Anda belum mencapai batas minimal kelulusan. Pelajari pembahasan pada nomor yang salah, lalu kerjakan ulang evaluasi.' }}
        </p>

        <!-- Lingkaran Skor -->
        <div style="display: inline-block; background: var(--abu-latar); border: 2px solid var(--abu-border); border-radius: var(--radius-lg); padding: 1.25rem 2.5rem; margin-bottom: 1.5rem;">
            <div style="font-size: 0.8rem; font-weight: 700; color: var(--teks-pudar); text-transform: uppercase;">Skor Akhir Anda</div>
            <div style="font-size: 3.5rem; font-weight: 600; color: {{ $isLulus ? 'var(--hijau-benar)' : 'var(--merah-salah)' }}; line-height: 1.1;">
                {{ $evaluasi->nilai }}
            </div>
            <div style="font-size: 0.85rem; font-weight: 700; color: var(--teks-pudar);">KKM Minimal: {{ $kkm }}</div>
        </div>

        <!-- Breakdown Skor per Sub-Bab -->
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem; max-width: 650px; margin: 0 auto 1.5rem;">
            <div style="background: var(--abu-latar); padding: 0.85rem; border-radius: var(--radius-md); border: 1px solid var(--abu-border);">
                <div style="font-size: 0.75rem; font-weight: 700; color: var(--teks-pudar);">Sub-bab A (Unsur)</div>
                <div style="font-size: 1.35rem; font-weight: 600; color: var(--biru-utama); margin-top: 0.25rem;">
                    {{ $skorA }} <span style="font-size: 0.8rem; color: var(--teks-pudar);">/ 100</span>
                </div>
            </div>

            <div style="background: var(--abu-latar); padding: 0.85rem; border-radius: var(--radius-md); border: 1px solid var(--abu-border);">
                <div style="font-size: 0.75rem; font-weight: 700; color: var(--teks-pudar);">Sub-bab B (Operasi)</div>
                <div style="font-size: 1.35rem; font-weight: 600; color: var(--biru-utama); margin-top: 0.25rem;">
                    {{ $skorB }} <span style="font-size: 0.8rem; color: var(--teks-pudar);">/ 100</span>
                </div>
            </div>

            <div style="background: var(--abu-latar); padding: 0.85rem; border-radius: var(--radius-md); border: 1px solid var(--abu-border);">
                <div style="font-size: 0.75rem; font-weight: 700; color: var(--teks-pudar);">Sub-bab C (Substitusi)</div>
                <div style="font-size: 1.35rem; font-weight: 600; color: var(--biru-utama); margin-top: 0.25rem;">
                    {{ $skorC }} <span style="font-size: 0.8rem; color: var(--teks-pudar);">/ 100</span>
                </div>
            </div>
        </div>

        <div style="display: flex; justify-content: center; gap: 1rem; flex-wrap: wrap;">
            <a href="{{ route('dashboard') }}" class="btn btn-secondary">
                <i class="fas fa-home"></i> Kembali ke Dasbor
            </a>

            <form action="{{ route('siswa.evaluasi.mulai') }}" method="POST">
                @csrf
                <input type="hidden" name="ulang" value="1">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-rotate-right"></i> Kerjakan Ulang Evaluasi
                </button>
            </form>
        </div>
    </div>

    <!-- Rincian Jawaban & Pembahasan -->
    <div class="kartu">
        <h3 style="font-size: 1.25rem; font-weight: 600; color: var(--teks-utama); margin-bottom: 1.25rem;">
            <i class="fas fa-clipboard-check text-blue-600"></i> Rincian Jawaban Soal
        </h3>

        <div style="display: flex; flex-direction: column; gap: 1.25rem;">
            @foreach($daftarJawaban as $idx => $jw)
                @php
                    $nomor = $idx + 1;
                    $soal = $jw->soalEvaluasi;
                    $benar = (bool) $jw->status_benar;
                @endphp
                <div style="padding: 1.25rem; border-radius: var(--radius-md); border: 1px solid {{ $benar ? 'var(--hijau-border)' : 'var(--merah-border)' }}; background-color: {{ $benar ? 'var(--hijau-bg)' : 'var(--merah-bg)' }};">
                    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 0.5rem;">
                        <div style="display: flex; align-items: center; gap: 0.5rem;">
                            <span style="font-weight: 600; font-size: 0.95rem; color: var(--teks-utama);">Soal {{ $nomor }}</span>
                            <span class="badge badge-biru" style="font-size: 0.7rem;">
                                Sub-bab {{ $soal->subBab ? chr(64 + $soal->subBab->urutan) : '' }}
                            </span>
                        </div>
                        <span class="badge {{ $benar ? 'badge-hijau' : 'badge-merah' }}">
                            <i class="fas {{ $benar ? 'fa-check' : 'fa-times' }}"></i> {{ $benar ? 'Benar' : 'Salah' }}
                        </span>
                    </div>

                    <div style="font-size: 0.95rem; color: var(--teks-utama); margin-bottom: 0.75rem; line-height: 1.5;">
                        {{ $soal->teks_soal }}
                    </div>

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 0.75rem; background: var(--putih); padding: 0.75rem 1rem; border-radius: var(--radius-sm); border: 1px solid var(--abu-border); font-size: 0.85rem; margin-bottom: 0.75rem;">
                        <div>
                            <span style="color: var(--teks-pudar);">Jawaban Anda:</span>
                            <div class="font-math" style="font-weight: 700; color: {{ $benar ? 'var(--hijau-benar)' : 'var(--merah-salah)' }};">
                                {{ $jw->jawaban ?: '(Tidak dijawab)' }}
                            </div>
                        </div>
                        <div>
                            <span style="color: var(--teks-pudar);">Kunci Jawaban:</span>
                            <div class="font-math" style="font-weight: 700; color: var(--biru-utama);">
                                {{ $soal->jawaban_akhir }}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</div>
@endsection
