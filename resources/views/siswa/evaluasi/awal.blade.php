@extends('layouts.siswa')

@section('isi_siswa')
<div style="max-width: 850px; margin: 0 auto;">

    <!-- Header Evaluasi -->
    <div style="margin-bottom: 1.5rem; text-align: center;">
        <div style="width: 56px; height: 56px; background-color: var(--biru-utama); color: white; border-radius: var(--radius-md); display: inline-flex; align-items: center; justify-content: center; font-size: 1.75rem; margin-bottom: 0.75rem;">
            <i class="fas fa-award"></i>
        </div>
        <h2 style="font-size: 1.85rem; font-weight: 600; color: var(--teks-utama); margin: 0 0 0.5rem;">
            Evaluasi Akhir: Bab 4 Bentuk Aljabar
        </h2>
        <p style="font-size: 0.95rem; color: var(--teks-pudar); max-width: 600px; margin: 0 auto; line-height: 1.6;">
            Ujian akhir untuk mengukur pemahaman materi aljabar secara menyeluruh. Siapkan kertas coretan dan kerjakan dengan teliti.
        </p>
    </div>

    <!-- Kotak Ketentuan Ujian -->
    <div class="kartu" style="margin-bottom: 2rem;">
        <h3 style="font-size: 1.15rem; font-weight: 600; color: var(--teks-utama); margin-bottom: 1rem;">
            <i class="fas fa-circle-info" style="color: var(--biru-utama);"></i> Ketentuan dan Informasi Ujian
        </h3>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 1rem; margin-bottom: 1.5rem;">
            <div style="background: var(--abu-latar); padding: 1rem; border-radius: var(--radius-md); border: 1px solid var(--abu-border);">
                <div style="font-size: 0.75rem; font-weight: 700; color: var(--teks-pudar); text-transform: uppercase;">Jumlah Soal</div>
                <div style="font-size: 1.5rem; font-weight: 600; color: var(--teks-utama); margin: 0.25rem 0;">{{ $jumlahSoal }} Soal</div>
                <div style="font-size: 0.75rem; color: var(--teks-pudar);">Kombinasi Sub-bab A, B, & C</div>
            </div>

            <div style="background: var(--abu-latar); padding: 1rem; border-radius: var(--radius-md); border: 1px solid var(--abu-border);">
                <div style="font-size: 0.75rem; font-weight: 700; color: var(--teks-pudar); text-transform: uppercase;">Alokasi Waktu</div>
                <div style="font-size: 1.5rem; font-weight: 600; color: var(--teks-utama); margin: 0.25rem 0;">{{ $durasiMenit }} Menit</div>
                <div style="font-size: 0.75rem; color: var(--teks-pudar);">Hitung mundur otomatis</div>
            </div>

            <div style="background: var(--abu-latar); padding: 1rem; border-radius: var(--radius-md); border: 1px solid var(--abu-border);">
                <div style="font-size: 0.75rem; font-weight: 700; color: var(--teks-pudar); text-transform: uppercase;">Ketuntasan (KKM)</div>
                <div style="font-size: 1.5rem; font-weight: 600; color: var(--hijau-benar); margin: 0.25rem 0;">{{ $kkm }} / 100</div>
                <div style="font-size: 0.75rem; color: var(--teks-pudar);">Skor minimal kelulusan</div>
            </div>
        </div>

        <div style="background-color: var(--abu-latar); border: 1px solid var(--abu-border); padding: 1rem 1.25rem; border-radius: var(--radius-md); font-size: 0.85rem; color: var(--teks-utama); line-height: 1.6; margin-bottom: 1.5rem;">
            <strong>Catatan Ujian:</strong>
            <ul style="margin: 0.25rem 0 0; padding-left: 1.25rem;">
                <li>Pada evaluasi akhir ini, fitur bantuan petunjuk bertahap dinonaktifkan untuk menguji kemandirian.</li>
                <li>Jawaban tersimpan otomatis ke server setiap kali selesai diketik.</li>
                <li>Bila batas waktu berakhir, sistem otomatis mengumpulkan lembar ujian.</li>
            </ul>
        </div>

        <div style="text-align: center;">
            @if($evaluasiAktif)
                <div style="margin-bottom: 1rem; font-size: 0.9rem; color: var(--teks-utama); font-weight: 700;">
                    <i class="fas fa-clock text-amber-500"></i> Ada sesi ujian yang sedang berjalan (Percobaan ke-{{ $evaluasiAktif->percobaan_ke }}).
                </div>
                <form action="{{ route('siswa.evaluasi.mulai') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary" style="padding: 0.85rem 2.25rem; font-size: 1rem;">
                        <i class="fas fa-play"></i> Lanjutkan Ujian Sekarang
                    </button>
                </form>
            @else
                <form action="{{ route('siswa.evaluasi.mulai') }}" method="POST">
                    @csrf
                    @if($riwayatEvaluasi->isNotEmpty())
                        <input type="hidden" name="ulang" value="1">
                        <button type="submit" class="btn btn-primary" style="padding: 0.85rem 2.25rem; font-size: 1rem;">
                            <i class="fas fa-pencil-alt"></i> Mulai Percobaan Baru (Ke-{{ $riwayatEvaluasi->count() + 1 }})
                        </button>
                    @else
                        <button type="submit" class="btn btn-primary" style="padding: 0.85rem 2.25rem; font-size: 1rem;">
                            <i class="fas fa-pencil-alt"></i> Mulai Evaluasi Akhir
                        </button>
                    @endif
                </form>
            @endif
        </div>
    </div>

    <!-- Riwayat Percobaan Sebelumnya -->
    @if($riwayatEvaluasi->isNotEmpty())
        <div class="kartu">
            <h3 style="font-size: 1.15rem; font-weight: 600; color: var(--teks-utama); margin-bottom: 1rem;">
                <i class="fas fa-clock-rotate-left text-blue-600"></i> Riwayat Percobaan Anda
            </h3>
            <div style="overflow-x: auto;">
                <table style="width: 100%; border-collapse: collapse; font-size: 0.875rem;">
                    <thead>
                        <tr style="background: var(--abu-latar); border-bottom: 2px solid var(--abu-border); color: var(--teks-pudar); text-align: left;">
                            <th style="padding: 0.75rem 1rem;">Percobaan</th>
                            <th style="padding: 0.75rem 1rem;">Skor</th>
                            <th style="padding: 0.75rem 1rem;">Status</th>
                            <th style="padding: 0.75rem 1rem;">Tanggal Selesai</th>
                            <th style="padding: 0.75rem 1rem; text-align: right;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($riwayatEvaluasi as $eval)
                            <tr style="border-bottom: 1px solid var(--abu-border);">
                                <td style="padding: 0.75rem 1rem; font-weight: 700;">Ke-{{ $eval->percobaan_ke }}</td>
                                <td style="padding: 0.75rem 1rem; font-weight: 600; font-size: 1.05rem; color: {{ ($eval->skor_total >= $kkm) ? 'var(--hijau-benar)' : 'var(--merah-salah)' }};">
                                    {{ $eval->skor_total ?? '-' }}
                                </td>
                                <td style="padding: 0.75rem 1rem;">
                                    @if($eval->status === 'dikumpulkan')
                                        @if($eval->skor_total >= $kkm)
                                            <span class="badge badge-hijau"><i class="fas fa-check"></i> Lulus KKM</span>
                                        @else
                                            <span class="badge badge-merah"><i class="fas fa-times"></i> Belum Lulus</span>
                                        @endif
                                    @else
                                        <span class="badge badge-kuning">Sedang Berlangsung</span>
                                    @endif
                                </td>
                                <td style="padding: 0.75rem 1rem; color: var(--teks-pudar);">
                                    {{ $eval->waktu_selesai ? \Carbon\Carbon::parse($eval->waktu_selesai)->format('d M Y, H:i') : '-' }}
                                </td>
                                <td style="padding: 0.75rem 1rem; text-align: right;">
                                    @if($eval->status === 'dikumpulkan')
                                        <a href="{{ route('siswa.evaluasi.hasil', $eval->id) }}" class="btn btn-secondary" style="padding: 0.35rem 0.75rem; font-size: 0.75rem; text-decoration: none;">
                                            Lihat Hasil
                                        </a>
                                    @else
                                        <a href="{{ route('siswa.evaluasi.kerja', $eval->id) }}" class="btn btn-primary" style="padding: 0.35rem 0.75rem; font-size: 0.75rem; text-decoration: none;">
                                            Lanjutkan
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

</div>
@endsection
