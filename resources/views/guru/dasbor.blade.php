@extends('layouts.guru')

@section('isi_guru')
<div class="guru-dashboard">
    <header class="dashboard-header">
        <div>
            <p class="dashboard-eyebrow">Kelas VII <span aria-hidden="true">·</span> Bab 4</p>
            <h1>Progres belajar siswa</h1>
            <p class="dashboard-intro">Pantau perkembangan siswa pada materi Bentuk Aljabar.</p>
        </div>
    </header>

    <section class="dashboard-summary" aria-labelledby="ringkasan-kelas">
        <h2 id="ringkasan-kelas" class="dashboard-section-title">Ringkasan kelas</h2>
        <div class="stats-grid">
            <article class="stat-card">
                <h3 class="stat-label">Jumlah siswa</h3>
                <p class="stat-value">{{ $statistik['total_siswa'] }}</p>
                <p class="stat-note">Terdaftar di kelas</p>
            </article>
            <article class="stat-card">
                <h3 class="stat-label">Progres rata-rata</h3>
                <p class="stat-value">{{ $statistik['avg_progres'] }}%</p>
                <p class="stat-note">Penyelesaian sub-bab</p>
            </article>
            <article class="stat-card">
                <h3 class="stat-label">Menyelesaikan semua sub-bab</h3>
                <p class="stat-value">{{ $statistik['siswa_tuntas'] }}</p>
                <p class="stat-note">Progres mencapai 100%</p>
            </article>
            <article class="stat-card">
                <h3 class="stat-label">Lulus evaluasi</h3>
                <p class="stat-value">{{ $statistik['siswa_lulus_evaluasi'] }}</p>
                <p class="stat-note">Nilai minimal 65</p>
            </article>
            <article class="stat-card">
                <h3 class="stat-label">Nilai evaluasi rata-rata</h3>
                <p class="stat-value">{{ $statistik['avg_nilai_evaluasi'] }}</p>
                <p class="stat-note">Dari evaluasi yang dikerjakan</p>
            </article>
        </div>
    </section>

    <section class="dashboard-students" aria-labelledby="daftar-siswa">
        <div class="students-heading">
            <div>
                <h2 id="daftar-siswa">Daftar siswa</h2>
                <p>Cari siswa untuk melihat progres dan hasil evaluasinya.</p>
            </div>
            <div class="students-controls">
                <label class="visually-hidden" for="cari-siswa">Cari nama atau email siswa</label>
                <div class="dashboard-search">
                    <i class="fas fa-search" aria-hidden="true"></i>
                    <input type="search" id="cari-siswa" placeholder="Cari siswa…" autocomplete="off">
                </div>
                <label class="visually-hidden" for="filter-status">Filter siswa</label>
                <select id="filter-status">
                    <option value="semua">Semua siswa</option>
                    <option value="tuntas">Sub-bab selesai</option>
                    <option value="belum-tuntas">Sub-bab belum selesai</option>
                    <option value="lulus">Lulus evaluasi</option>
                    <option value="belum-lulus">Belum lulus evaluasi</option>
                    <option value="belum-ujian">Belum mengerjakan evaluasi</option>
                </select>
            </div>
        </div>

        <p class="students-result" id="hasil-pencarian" aria-live="polite"></p>

        <div class="tabel-wadah">
            <table class="tabel-data" id="tabel-siswa">
                <thead>
                    <tr>
                        <th scope="col">Siswa</th>
                        <th scope="col">Progres Bab 4</th>
                        <th scope="col">Terakhir dipelajari</th>
                        <th scope="col">Sesi kuis</th>
                        <th scope="col">Nilai evaluasi</th>
                        <th scope="col">Status</th>
                        <th scope="col"><span class="visually-hidden">Tindakan</span></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($daftarSiswa as $s)
                        @php
                            $evalStatus = 'belum-ujian';
                            if ($s['lulus_evaluasi']) {
                                $evalStatus = 'lulus';
                            } elseif ($s['nilai_evaluasi'] !== null) {
                                $evalStatus = 'belum-lulus';
                            }
                            $progresStatus = ($s['progres'] === 100) ? 'tuntas' : 'belum-tuntas';
                        @endphp
                        <tr class="baris-siswa"
                            data-nama="{{ strtolower($s['nama']) }}"
                            data-email="{{ strtolower($s['email']) }}"
                            data-progres-status="{{ $progresStatus }}"
                            data-eval-status="{{ $evalStatus }}">
                            <td>
                                <div class="student-identity">
                                    <span class="student-avatar" aria-hidden="true">{{ strtoupper(substr($s['nama'], 0, 1)) }}</span>
                                    <span class="student-name-wrap">
                                        <a class="student-name" href="{{ route('guru.siswa.detail', $s['id']) }}">{{ $s['nama'] }}</a>
                                        <span class="student-email">{{ $s['email'] }}</span>
                                    </span>
                                </div>
                            </td>
                            <td>
                                <div class="progress-summary"><span>{{ $s['progres'] }}%</span><span>{{ $s['progres'] === 100 ? 'Selesai' : 'Berjalan' }}</span></div>
                                <div class="progress-track" role="progressbar" aria-label="Progres {{ $s['nama'] }}" aria-valuemin="0" aria-valuemax="100" aria-valuenow="{{ $s['progres'] }}">
                                    <span style="width: {{ $s['progres'] }}%"></span>
                                </div>
                            </td>
                            <td>{{ $s['sub_bab_terakhir'] ?: 'Belum mulai' }}</td>
                            <td class="cell-centered">{{ $s['total_sesi'] }}</td>
                            <td class="cell-centered">{{ $s['nilai_evaluasi'] !== null ? $s['nilai_evaluasi'] : '—' }}</td>
                            <td>
                                @if($s['lulus_evaluasi'])
                                    <span class="student-status">Lulus</span>
                                @elseif($s['nilai_evaluasi'] !== null)
                                    <span class="student-status">Belum lulus</span>
                                @else
                                    <span class="student-status">Belum mengerjakan</span>
                                @endif
                            </td>
                            <td class="cell-action">
                                <a class="student-detail-link" href="{{ route('guru.siswa.detail', $s['id']) }}">Lihat detail <span aria-hidden="true">→</span></a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="students-empty" colspan="7">Belum ada siswa yang terdaftar.</td>
                        </tr>
                    @endforelse
                    <tr id="siswa-tidak-ditemukan" hidden>
                        <td class="students-empty" colspan="7">Tidak ada siswa yang cocok dengan pencarian ini.</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

    <a href="{{ route('guru.ringkasan') }}" class="dashboard-primary-link dashboard-analysis-link">
        Lihat analisis materi <span aria-hidden="true">→</span>
    </a>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const inputCari = document.getElementById('cari-siswa');
        const selectFilter = document.getElementById('filter-status');
        const barisSiswa = Array.from(document.querySelectorAll('.baris-siswa'));
        const pesanKosong = document.getElementById('siswa-tidak-ditemukan');
        const hasil = document.getElementById('hasil-pencarian');

        function filterTabel() {
            const query = inputCari.value.toLocaleLowerCase('id').trim();
            const filterVal = selectFilter.value;
            let jumlahTerlihat = 0;

            barisSiswa.forEach(function (baris) {
                const cocokCari = (baris.dataset.nama || '').includes(query) || (baris.dataset.email || '').includes(query);
                const filterEvaluasi = ['lulus', 'belum-lulus', 'belum-ujian'].includes(filterVal);
                const cocokStatus = filterVal === 'semua'
                    || (filterEvaluasi ? baris.dataset.evalStatus === filterVal : baris.dataset.progresStatus === filterVal);
                const cocok = cocokCari && cocokStatus;

                baris.hidden = !cocok;
                if (cocok) jumlahTerlihat++;
            });

            pesanKosong.hidden = jumlahTerlihat > 0 || barisSiswa.length === 0;
            hasil.textContent = barisSiswa.length ? jumlahTerlihat + ' dari ' + barisSiswa.length + ' siswa' : '';
        }

        inputCari.addEventListener('input', filterTabel);
        selectFilter.addEventListener('change', filterTabel);
        filterTabel();
    });
</script>
@endsection
