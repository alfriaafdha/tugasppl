@extends('layouts.guru')

@section('isi_guru')
<div class="guru-dashboard analysis-page">
    <header class="dashboard-header analysis-header">
        <div>
            <p class="dashboard-eyebrow"><a href="{{ route('guru.dasbor') }}">Daftar siswa</a> <span aria-hidden="true">·</span> Kelas VII · Bab 4</p>
            <h1>Analisis materi</h1>
            <p class="dashboard-intro">Tinjau waktu pengerjaan, penggunaan petunjuk, dan langkah yang sering keliru di tiap sub-bab.</p>
        </div>
    </header>

    @forelse($ringkasan as $item)
        <section class="analysis-topic" aria-labelledby="subbab-{{ $item['urutan'] }}">
            <div class="analysis-topic-heading">
                <div>
                    <p class="dashboard-eyebrow">Sub-bab {{ chr(64 + $item['urutan']) }}</p>
                    <h2 id="subbab-{{ $item['urutan'] }}">{{ $item['judul'] }}</h2>
                </div>
                <div class="analysis-metrics" aria-label="Ringkasan sub-bab">
                    <div class="analysis-metric">
                        <span>Rata-rata waktu</span>
                        <strong>{{ $item['avg_durasi_detik'] > 0 ? gmdate('i\m s\s', $item['avg_durasi_detik']) : '—' }}</strong>
                    </div>
                    <div class="analysis-metric">
                        <span>Petunjuk per sesi</span>
                        <strong>{{ $item['avg_hint'] }}</strong>
                    </div>
                    <div class="analysis-metric analysis-metric-primary">
                        <span>Langkah keliru</span>
                        <strong>{{ $item['persen_salah'] }}%</strong>
                    </div>
                </div>
            </div>

            <div class="analysis-table-heading">
                <h3>Rincian soal</h3>
                <p>Persentase menunjukkan proporsi langkah yang keliru dari seluruh langkah yang dicatat.</p>
            </div>

            <div class="tabel-wadah analysis-table-wrap">
                <table class="tabel-data analysis-table">
                    <thead>
                        <tr>
                            <th scope="col">Soal</th>
                            <th scope="col">Topik</th>
                            <th scope="col">Pertanyaan</th>
                            <th scope="col">Langkah dicatat</th>
                            <th scope="col">Langkah keliru</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($item['soal'] as $s)
                            <tr>
                                <td class="analysis-question-number">{{ $s['nomor'] }}</td>
                                <td>{{ $s['subtopik'] }}</td>
                                <td class="analysis-question-text">{{ Str::limit($s['teks_soal'], 100) }}</td>
                                <td class="analysis-number">{{ $s['total_langkah'] }}</td>
                                <td class="analysis-number">
                                    @if($s['total_langkah'] > 0)
                                        <span>{{ $s['persen_salah'] }}%</span>
                                    @else
                                        <span class="analysis-no-data">Belum ada data</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="5" class="students-empty">Belum ada data pengerjaan untuk sub-bab ini.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>
    @empty
        <section class="analysis-empty">
            <h2>Belum ada data analisis</h2>
            <p>Rincian akan muncul setelah siswa mengerjakan kuis sub-bab.</p>
        </section>
    @endforelse

    <a href="{{ route('guru.dasbor') }}" class="dashboard-primary-link dashboard-analysis-link">
        <span aria-hidden="true">←</span> Kembali ke daftar siswa
    </a>
</div>
@endsection
