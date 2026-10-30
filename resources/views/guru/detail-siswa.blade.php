@extends('layouts.guru')

@section('isi_guru')
<div style="max-width: 1100px; margin: 0 auto;">

    <!-- Breadcrumb & Header -->
    <div style="margin-bottom: 1.5rem;">
        <div style="display: flex; align-items: center; gap: 0.5rem; font-size: 0.85rem; color: var(--teks-pudar); margin-bottom: 0.5rem;">
            <a href="{{ route('guru.dasbor') }}" style="color: var(--teks-pudar); text-decoration: none;">Dasbor Guru</a>
            <i class="fas fa-chevron-right" style="font-size: 0.7rem;"></i>
            <span style="color: var(--biru-utama); font-weight: 600;">Detail Siswa</span>
        </div>

        <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 1rem;">
            <div style="display: flex; align-items: center; gap: 1rem;">
                <div style="width: 52px; height: 52px; border-radius: 50%; background: var(--biru-muda); color: var(--biru-utama); display: flex; align-items: center; justify-content: center; font-weight: 600; font-size: 1.25rem;">
                    {{ strtoupper(substr($siswa->nama, 0, 2)) }}
                </div>
                <div>
                    <h2 style="font-size: 1.5rem; font-weight: 600; color: var(--teks-utama); margin: 0;">
                        {{ $siswa->nama }}
                    </h2>
                    <div style="font-size: 0.85rem; color: var(--teks-pudar);">
                        {{ $siswa->email }} • Progres Bab 4: <strong style="color: var(--biru-utama);">{{ $progres }}%</strong>
                    </div>
                </div>
            </div>

            <a href="{{ route('guru.dasbor') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali ke Daftar Siswa
            </a>
        </div>
    </div>

    <!-- Riwayat Sesi Kuis -->
    <div class="kartu" style="margin-bottom: 2rem;">
        <h3 style="font-size: 1.15rem; font-weight: 600; color: var(--teks-utama); margin-bottom: 1rem;">
            <i class="fas fa-tasks text-blue-600"></i> Riwayat Pengerjaan Kuis Sub-Bab
        </h3>

        @if($sesi_kuis->isEmpty())
            <p style="color: var(--teks-pudar); font-size: 0.875rem;">Siswa ini belum memulai kuis apa pun.</p>
        @else
            <div style="display: flex; flex-direction: column; gap: 1.5rem;">
                @foreach($sesi_kuis as $sesi)
                    <div style="background: var(--abu-latar); border: 1px solid var(--abu-border); border-radius: var(--radius-md); padding: 1.25rem;">
                        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 0.75rem; flex-wrap: wrap; gap: 0.5rem;">
                            <div style="display: flex; align-items: center; gap: 0.65rem;">
                                <span class="badge badge-biru">Sub-bab {{ chr(64 + ($sesi->kuis->subBab->urutan ?? 1)) }}</span>
                                <strong style="font-size: 0.95rem; color: var(--teks-utama);">
                                    {{ $sesi->kuis->subBab->judul ?? 'Kuis' }}
                                </strong>
                                <span style="font-size: 0.8rem; color: var(--teks-pudar);">(Percobaan ke-{{ $sesi->percobaan_ke }})</span>
                            </div>

                            <div style="display: flex; align-items: center; gap: 1rem; font-size: 0.8rem; color: var(--teks-pudar);">
                                <span><i class="fas fa-circle-question" style="color: var(--biru-utama);"></i> {{ $sesi->jumlah_hint_ai }} Petunjuk</span>
                                <span><i class="fas fa-clock"></i> {{ $sesi->durasi_detik ? gmdate('i\m s\s', $sesi->durasi_detik) : '-' }}</span>
                                <span class="badge {{ $sesi->status === 'selesai' ? 'badge-hijau' : 'badge-kuning' }}">
                                    {{ ucfirst($sesi->status) }}
                                </span>
                            </div>
                        </div>

                        <!-- Langkah Pengerjaan Siswa -->
                        @if($sesi->langkahKuis->isNotEmpty())
                            <div style="background: var(--putih); border: 1px solid var(--abu-border); border-radius: var(--radius-sm); padding: 0.75rem; margin-top: 0.5rem; font-size: 0.825rem;">
                                <div style="font-weight: 700; color: var(--teks-pudar); margin-bottom: 0.35rem;">Log Langkah Siswa:</div>
                                <div style="display: flex; flex-direction: column; gap: 0.35rem;">
                                    @foreach($sesi->langkahKuis as $lk)
                                        <div style="display: flex; align-items: center; justify-content: space-between; padding: 0.25rem 0.5rem; background: {{ $lk->apakah_ekuivalen ? 'var(--hijau-bg)' : 'var(--merah-bg)' }}; border-radius: 4px;">
                                            <span>
                                                Soal #{{ $lk->soalKuis->nomor ?? '?' }}: <code class="font-math" style="font-weight: 700;">{{ $lk->ekspresi_siswa }}</code>
                                            </span>
                                            <span style="font-size: 0.75rem; color: {{ $lk->apakah_ekuivalen ? 'var(--hijau-benar)' : 'var(--merah-salah)' }}; font-weight: 700;">
                                                {{ $lk->apakah_ekuivalen ? 'Ekuivalen' : 'Salah' }}
                                            </span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @else
                            <div style="font-size: 0.8rem; color: var(--teks-pudar);">Belum ada baris langkah yang dicatat.</div>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <!-- Riwayat Evaluasi Akhir -->
    <div class="kartu">
        <h3 style="font-size: 1.15rem; font-weight: 600; color: var(--teks-utama); margin-bottom: 1rem;">
            <i class="fas fa-award text-amber-500"></i> Riwayat Evaluasi Akhir Siswa
        </h3>

        @if($evaluasi_akhir->isEmpty())
            <p style="color: var(--teks-pudar); font-size: 0.875rem;">Siswa ini belum pernah menempuh Evaluasi Akhir.</p>
        @else
            <div style="overflow-x: auto;">
                <table style="width: 100%; border-collapse: collapse; font-size: 0.875rem;">
                    <thead>
                        <tr style="background: var(--abu-latar); border-bottom: 2px solid var(--abu-border); text-align: left; color: var(--teks-pudar);">
                            <th style="padding: 0.75rem 1rem;">Percobaan</th>
                            <th style="padding: 0.75rem 1rem;">Nilai Akhir</th>
                            <th style="padding: 0.75rem 1rem;">Status KKM</th>
                            <th style="padding: 0.75rem 1rem;">Waktu Mulai</th>
                            <th style="padding: 0.75rem 1rem;">Waktu Selesai</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($evaluasi_akhir as $eval)
                            <tr style="border-bottom: 1px solid var(--abu-border);">
                                <td style="padding: 0.75rem 1rem; font-weight: 700;">Ke-{{ $eval->percobaan_ke }}</td>
                                <td style="padding: 0.75rem 1rem; font-weight: 600; font-size: 1.1rem; color: {{ ($eval->nilai >= 65) ? 'var(--hijau-benar)' : 'var(--merah-salah)' }};">
                                    {{ $eval->nilai }}
                                </td>
                                <td style="padding: 0.75rem 1rem;">
                                    @if($eval->status === 'dikumpulkan')
                                        @if($eval->lulus_kkm)
                                            <span class="badge badge-hijau">Lulus KKM</span>
                                        @else
                                            <span class="badge badge-merah">Belum Lulus</span>
                                        @endif
                                    @else
                                        <span class="badge badge-kuning">Sedang Berlangsung</span>
                                    @endif
                                </td>
                                <td style="padding: 0.75rem 1rem; color: var(--teks-pudar); font-size: 0.8rem;">
                                    {{ $eval->waktu_mulai ? $eval->waktu_mulai->format('d M Y, H:i') : '-' }}
                                </td>
                                <td style="padding: 0.75rem 1rem; color: var(--teks-pudar); font-size: 0.8rem;">
                                    {{ $eval->waktu_selesai ? $eval->waktu_selesai->format('d M Y, H:i') : '-' }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

</div>
@endsection
