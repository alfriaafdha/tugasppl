@extends('layouts.siswa')

@section('isi_siswa')
<div style="max-width: 1050px; margin: 0 auto; padding-bottom: 2rem;">

    <!-- Banner Profil & Status Siswa (Flat Surface + Intentional Type) -->
    <div class="kartu" style="background-color: var(--putih); border: 1px solid var(--abu-border); border-radius: var(--radius-sm); padding: 1.75rem 2rem; margin-bottom: 1.5rem; box-shadow: var(--bayangan-sm);">
        <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 1.5rem;">
            <div style="flex: 1; min-width: 280px;">
                <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 0.5rem;">
                    <span class="badge badge-biru" style="font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.05em;">
                        Matematika SMP Kelas VII
                    </span>
                    <span style="font-size: 0.75rem; color: var(--teks-pudar);">
                        Bab 4: Bentuk Aljabar
                    </span>
                </div>

                <h2 style="font-size: 1.85rem; font-weight: 600; margin: 0 0 0.35rem; color: var(--teks-utama);">
                    Dasbor Belajar: {{ $siswa->nama }}
                </h2>
                <p style="color: var(--teks-pudar); font-size: 0.9rem; line-height: 1.55; margin: 0; max-width: 600px;">
                    Semua materi dan kuis tersedia untuk pengetesan. Progres tetap tercatat, sementara evaluasi akhir mengikuti syarat ketuntasan.
                </p>
            </div>

            <!-- Widget Persentase Progres -->
            <div style="background-color: var(--abu-latar); padding: 1.25rem 1.75rem; border-radius: var(--radius-sm); text-align: center; min-width: 160px; border: 1px solid var(--abu-border);">
                <div style="font-size: 0.75rem; font-weight: 700; text-transform: uppercase; color: var(--teks-pudar); letter-spacing: 0.05em;">Progres Bab 4</div>
                <div style="font-size: 2.25rem; font-weight: 600; line-height: 1.1; margin: 0.25rem 0; color: var(--biru-utama);">
                    {{ $persen }}%
                </div>
                <div style="font-size: 0.75rem; font-weight: 600; color: var(--teks-pudar);">
                    @if($persen === 100)
                        <span style="color: var(--hijau-benar); font-weight: 700;">Evaluasi Akhir Terbuka</span>
                    @elseif($persen >= 67)
                        <span>Sub-bab C Aktif</span>
                    @elseif($persen >= 33)
                        <span>Sub-bab B Aktif</span>
                    @else
                        <span>Sub-bab A Aktif</span>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Ringkasan Statistik Belajar (4 Kartu Mini) -->
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(210px, 1fr)); gap: 1rem; margin-bottom: 2rem;">
        <div class="kartu" style="border-radius: var(--radius-sm); padding: 1rem 1.25rem;">
            <div style="font-size: 0.75rem; font-weight: 700; color: var(--teks-pudar); text-transform: uppercase; margin-bottom: 0.25rem;">Ketuntasan Materi</div>
            <div style="font-size: 1.35rem; font-weight: 600; color: var(--teks-utama);">
                {{ (int)($persen / 33.33) }} / 3 <span style="font-size: 0.8rem; font-weight: 400; color: var(--teks-pudar);">Sub-bab</span>
            </div>
        </div>

        <div class="kartu" style="border-radius: var(--radius-sm); padding: 1rem 1.25rem;">
            <div style="font-size: 0.75rem; font-weight: 700; color: var(--teks-pudar); text-transform: uppercase; margin-bottom: 0.25rem;">Sesi Kuis Dicoba</div>
            <div style="font-size: 1.35rem; font-weight: 600; color: var(--teks-utama);">
                {{ $totalSesi }} <span style="font-size: 0.8rem; font-weight: 400; color: var(--teks-pudar);">Percobaan</span>
            </div>
        </div>

        <div class="kartu" style="border-radius: var(--radius-sm); padding: 1rem 1.25rem;">
            <div style="font-size: 0.75rem; font-weight: 700; color: var(--teks-pudar); text-transform: uppercase; margin-bottom: 0.25rem;">Skor Evaluasi Terbaik</div>
            <div style="font-size: 1.35rem; font-weight: 600; color: {{ $evaluasiTerbaik !== null ? ($evaluasiTerbaik >= 65 ? 'var(--hijau-benar)' : 'var(--merah-salah)') : 'var(--teks-pudar)' }};">
                {{ $evaluasiTerbaik !== null ? $evaluasiTerbaik : '-' }} <span style="font-size: 0.8rem; font-weight: 400; color: var(--teks-pudar);">/ 100</span>
            </div>
        </div>

        <div class="kartu" style="border-radius: var(--radius-sm); padding: 1rem 1.25rem;">
            <div style="font-size: 0.75rem; font-weight: 700; color: var(--teks-pudar); text-transform: uppercase; margin-bottom: 0.25rem;">Status KKM (65)</div>
            <div style="font-size: 1rem; font-weight: 600; color: {{ $lulusEvaluasi ? 'var(--hijau-benar)' : 'var(--kuning-peringatan)' }};">
                {{ $lulusEvaluasi ? 'Lulus KKM' : 'Belum Lulus' }}
            </div>
        </div>
    </div>

    <!-- Tiga Sub-Bab Berurutan (Clean Cards without colored borders) -->
    <div style="margin-bottom: 2rem;">
        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1.25rem; flex-wrap: wrap; gap: 0.5rem;">
            <div>
                <h3 style="font-size: 1.25rem; font-weight: 600; color: var(--teks-utama); margin: 0 0 0.25rem;">
                    Materi dan Kuis Sub-Bab
                </h3>
                <p style="font-size: 0.85rem; color: var(--teks-pudar); margin: 0;">
                    Buka materi mana pun dan coba kuisnya sesuai kebutuhan.
                </p>
            </div>

            <button type="button" class="btn btn-secondary btn-buka-kamus" style="font-size: 0.8rem; padding: 0.45rem 0.85rem;">
                <i class="fas fa-book-bookmark text-blue-600"></i> Kamus Istilah Aljabar
            </button>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1.25rem;">
            @foreach($daftarSubBab as $item)
                @php
                    $huruf = chr(64 + $item['urutan']);
                @endphp
                <div class="kartu" style="display: flex; flex-direction: column; justify-content: space-between; border-radius: var(--radius-sm); border: 1px solid var(--abu-border);">

                    <div>
                        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 0.85rem;">
                            <span class="badge {{ $item['status_tuntas'] ? 'badge-hijau' : ($item['status_terbuka'] ? 'badge-biru' : 'badge-kuning') }}" style="font-size: 0.75rem;">
                                Sub-bab {{ $huruf }}
                            </span>

                            @if($item['status_tuntas'])
                                <span style="color: var(--hijau-benar); font-size: 0.8rem; font-weight: 700;">
                                    Tuntas
                                </span>
                            @elseif($item['status_terbuka'])
                                <span style="color: var(--biru-utama); font-size: 0.8rem; font-weight: 700;">
                                    Terbuka
                                </span>
                            @else
                                <span style="color: var(--teks-pudar); font-size: 0.8rem; font-weight: 600;">
                                    Siap dipelajari
                                </span>
                            @endif
                        </div>

                        <h4 style="font-size: 1.05rem; font-weight: 600; color: var(--teks-utama); margin: 0 0 0.5rem; line-height: 1.4;">
                            {{ $item['judul'] }}
                        </h4>

                        <p style="font-size: 0.825rem; color: var(--teks-pudar); line-height: 1.55; margin: 0 0 1rem;">
                            @if($item['urutan'] === 1)
                                Memahami variabel, koefisien, konstanta, suku, serta pembentukan model matematika dari situasi kontekstual.
                            @elseif($item['urutan'] === 2)
                                Menentukan suku sejenis dan menyederhanakan ekspresi aljabar melalui operasi penjumlahan dan pengurangan.
                            @else
                                Menghitung nilai numerik bentuk aljabar dengan metode substitusi dan memecahkan soal cerita nyata.
                            @endif
                        </p>

                        <div style="background-color: var(--abu-latar); border-radius: var(--radius-xs); padding: 0.6rem 0.75rem; border: 1px solid var(--abu-border); margin-bottom: 1.25rem; font-size: 0.75rem; color: var(--teks-pudar);">
                            <strong>Fokus Pembahasan:</strong>
                            @if($item['urutan'] === 1)
                                Variabel, Koefisien, Konstanta, Suku.
                            @elseif($item['urutan'] === 2)
                                Suku Sejenis, Penjumlahan, Pengurangan.
                            @else
                                Substitusi Nilai, Pemodelan Masalah.
                            @endif
                        </div>
                    </div>

                    <div>
                        @if($item['status_terbuka'])
                            <a href="{{ route('siswa.subbab.show', $item['id']) }}" class="btn {{ $item['status_tuntas'] ? 'btn-secondary' : 'btn-primary' }}" style="width: 100%; text-decoration: none; justify-content: center; font-size: 0.85rem;">
                                @if($item['status_tuntas'])
                                    Buka Materi / Latihan Ulang
                                @else
                                    Buka Materi & Kuis
                                @endif
                            </a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Evaluasi Akhir (Flat Surface, Clear Rules) -->
    <div class="kartu" style="border: 1px solid {{ $evaluasiTerbuka ? 'var(--kuning-peringatan)' : 'var(--abu-border)' }}; border-radius: var(--radius-sm); margin-bottom: 2rem;">
        <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 1.25rem;">
            <div style="flex: 1; min-width: 280px;">
                <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 0.25rem;">
                    <h4 style="font-size: 1.15rem; font-weight: 600; color: var(--teks-utama); margin: 0;">
                        Evaluasi Akhir: Bab 4 Bentuk Aljabar
                    </h4>
                    @if($evaluasiTerbuka)
                        <span class="badge badge-hijau" style="font-size: 0.75rem;">Terbuka</span>
                    @else
                        <span class="badge badge-kuning" style="font-size: 0.75rem;">Terkunci</span>
                    @endif
                </div>
                <p style="font-size: 0.85rem; color: var(--teks-pudar); margin: 0; line-height: 1.55;">
                    @if($evaluasiTerbuka)
                        Seluruh kuis telah tuntas. Ujian evaluasi terdiri dari 20 soal acak berdurasi 60 menit dengan Kriteria Ketuntasan Minimal (KKM) 65. Fitur petunjuk tidak aktif selama ujian.
                    @else
                        Evaluasi akhir terbuka setelah kuis pada Sub-bab A, B, dan C tuntas (progres 100%).
                    @endif
                </p>
            </div>

            <div>
                @if($evaluasiTerbuka)
                    <a href="{{ route('siswa.evaluasi.index') }}" class="btn btn-primary" style="text-decoration: none; padding: 0.7rem 1.5rem; font-size: 0.9rem; background: var(--biru-utama);">
                        Masuk Lembar Ujian
                    </a>
                @else
                    <button class="btn" style="background: var(--abu-latar); color: var(--teks-halus); border: 1px solid var(--abu-border); cursor: not-allowed; padding: 0.7rem 1.25rem;" disabled>
                        Selesaikan Sub-bab
                    </button>
                @endif
            </div>
        </div>
    </div>

    <!-- Riwayat Evaluasi Akhir -->
    @if($riwayatEvaluasi->isNotEmpty())
        <div class="kartu" style="border-radius: var(--radius-sm); margin-bottom: 2rem;">
            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1rem;">
                <h4 style="font-size: 1.1rem; font-weight: 600; color: var(--teks-utama); margin: 0;">
                    Riwayat Percobaan Evaluasi Akhir
                </h4>
                <span style="font-size: 0.8rem; color: var(--teks-pudar);">Total {{ $riwayatEvaluasi->count() }} Percobaan</span>
            </div>

            <div style="overflow-x: auto;">
                <table style="width: 100%; border-collapse: collapse; font-size: 0.875rem; text-align: left;">
                    <thead>
                        <tr style="background: var(--abu-latar); border-bottom: 1px solid var(--abu-border); color: var(--teks-pudar);">
                            <th style="padding: 0.75rem 1rem;">Percobaan</th>
                            <th style="padding: 0.75rem 1rem;">Skor Akhir</th>
                            <th style="padding: 0.75rem 1rem;">Status KKM</th>
                            <th style="padding: 0.75rem 1rem;">Waktu Selesai</th>
                            <th style="padding: 0.75rem 1rem; text-align: right;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($riwayatEvaluasi as $eval)
                            @php
                                $skor = $eval->nilai ?? 0;
                                $lulus = ($skor >= 65);
                            @endphp
                            <tr style="border-bottom: 1px solid var(--abu-border);">
                                <td style="padding: 0.75rem 1rem; font-weight: 700;">Ke-{{ $eval->percobaan_ke }}</td>
                                <td style="padding: 0.75rem 1rem; font-weight: 600; font-size: 1.05rem; color: {{ $lulus ? 'var(--hijau-benar)' : 'var(--merah-salah)' }};">
                                    {{ $skor }} <span style="font-size: 0.75rem; color: var(--teks-pudar); font-weight: normal;">/ 100</span>
                                </td>
                                <td style="padding: 0.75rem 1rem;">
                                    @if($eval->status === 'dikumpulkan')
                                        @if($lulus)
                                            <span class="badge badge-hijau">Lulus KKM (≥65)</span>
                                        @else
                                            <span class="badge badge-merah">Belum Lulus (&lt;65)</span>
                                        @endif
                                    @else
                                        <span class="badge badge-kuning">Sedang Berlangsung</span>
                                    @endif
                                </td>
                                <td style="padding: 0.75rem 1rem; color: var(--teks-pudar); font-size: 0.8rem;">
                                    {{ $eval->waktu_selesai ? \Carbon\Carbon::parse($eval->waktu_selesai)->format('d M Y, H:i') : ($eval->waktu_mulai ? \Carbon\Carbon::parse($eval->waktu_mulai)->format('d M Y, H:i') : '-') }}
                                </td>
                                <td style="padding: 0.75rem 1rem; text-align: right;">
                                    @if($eval->status === 'dikumpulkan')
                                        <a href="{{ route('siswa.evaluasi.hasil', $eval->id) }}" class="btn btn-secondary" style="text-decoration: none; padding: 0.35rem 0.75rem; font-size: 0.75rem;">
                                            Lihat Hasil
                                        </a>
                                    @else
                                        <a href="{{ route('siswa.evaluasi.kerja', $eval->id) }}" class="btn btn-primary" style="text-decoration: none; padding: 0.35rem 0.75rem; font-size: 0.75rem;">
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

    <!-- Catatan Konsep Matematika -->
    <div class="kartu" style="border-radius: var(--radius-sm); background-color: var(--putih);">
        <h4 style="font-size: 0.95rem; font-weight: 600; color: var(--teks-utama); margin: 0 0 0.75rem;">
            Catatan Konsep: Penjumlahan dan Pengurangan Aljabar
        </h4>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 1rem; font-size: 0.85rem; color: var(--teks-utama);">
            <div style="background: var(--abu-latar); padding: 0.85rem 1rem; border-radius: var(--radius-xs); border: 1px solid var(--abu-border);">
                <strong style="color: var(--biru-utama); display: block; margin-bottom: 0.25rem;">Aturan Suku Sejenis</strong>
                Penjumlahan dan pengurangan hanya berlaku pada suku yang memiliki variabel dan eksponen identik. Bentuk <span class="font-math">4x + 3y</span> tidak dapat dijumlahkan menjadi suku tunggal.
            </div>

            <div style="background: var(--abu-latar); padding: 0.85rem 1rem; border-radius: var(--radius-xs); border: 1px solid var(--abu-border);">
                <strong style="color: var(--biru-utama); display: block; margin-bottom: 0.25rem;">Koefisien Bernilai Satu</strong>
                Variabel tanpa angka tertulis di depannya memiliki koefisien 1. Bentuk <span class="font-math">x + 2x</span> bermakna <span class="font-math">1x + 2x = 3x</span>.
            </div>

            <div style="background: var(--abu-latar); padding: 0.85rem 1rem; border-radius: var(--radius-xs); border: 1px solid var(--abu-border);">
                <strong style="color: var(--biru-utama); display: block; margin-bottom: 0.25rem;">Tanda Kurung Negatif</strong>
                Tanda minus di depan kurung mendistribusikan faktor -1 ke setiap suku di dalam tanda kurung. Contoh: <span class="font-math">-(3a - 5) = -3a + 5</span>.
            </div>
        </div>
    </div>

</div>

<!-- Modal Kamus Istilah Aljabar -->
@include('components.kamus-istilah', ['kamusIstilah' => $kamusIstilah])
@endsection
