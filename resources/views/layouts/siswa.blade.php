@extends('layouts.dasar')

@php
    $user = Auth::user();
    $subBabsSidebar = \App\Models\SubBab::orderBy('urutan')->get();
    $progresService = app(\App\Services\Progres\ProgresService::class);
    $persenSidebar = $progresService->persenProgres($user);
    $evaluasiTerbukaSidebar = $progresService->evaluasiTerbuka($user);
@endphp

@section('konten')
<div class="wadah-aplikasi">
    <!-- Sidebar Kiri Siswa (Fixed) -->
    <aside class="sidebar-kiri">
        <div>
            <!-- Brand -->
            <a href="{{ route('dashboard') }}" class="brand-box">
                <div class="brand-icon">
                    <i class="fas fa-shapes"></i>
                </div>
                <div>
                    <h1 class="brand-title">AljabarLearn</h1>
                    <p class="brand-subtitle">Matematika SMP Kelas VII</p>
                </div>
            </a>

            <!-- Profil Siswa -->
            <div class="profil-box">
                <div class="profil-avatar">
                    {{ strtoupper(substr($user->nama, 0, 2)) }}
                </div>
                <div class="profil-info">
                    <div class="profil-nama" title="{{ $user->nama }}">{{ $user->nama }}</div>
                    <span class="profil-peran">Siswa Kelas VII</span>
                </div>
            </div>

            <!-- Progress Bar Belajar -->
            <div style="background-color: var(--abu-latar); padding: 0.85rem; border-radius: var(--radius-md); border: 1px solid var(--abu-border); margin-bottom: 1.5rem;">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.4rem;">
                    <span style="font-size: 0.75rem; font-weight: 700; color: var(--teks-pudar); text-transform: uppercase;">Progres Bab 4</span>
                    <span style="font-size: 0.85rem; font-weight: 600; color: var(--biru-utama);">{{ $persenSidebar }}%</span>
                </div>
                <div style="width: 100%; height: 8px; background-color: var(--abu-border); border-radius: 9999px; overflow: hidden;">
                    <div style="width: {{ $persenSidebar }}%; height: 100%; background-color: var(--biru-utama); border-radius: 9999px; transition: width 0.4s ease;"></div>
                </div>
            </div>

            <!-- Menu Utama -->
            <div class="sidebar-section-title">Menu Belajar</div>
            <ul class="nav-list">
                <li>
                    <a href="{{ route('dashboard') }}" class="nav-item-link {{ request()->routeIs('dashboard') || request()->routeIs('siswa.dasbor') ? 'aktif' : '' }}">
                        <span style="display: flex; align-items: center; gap: 0.65rem;">
                            <i class="fas fa-chart-pie" style="width: 18px;"></i>
                            <span>Dasbor Siswa</span>
                        </span>
                        <i class="fas fa-chevron-right" style="font-size: 0.7rem; opacity: 0.5;"></i>
                    </a>
                </li>
            </ul>

            <!-- Daftar 3 Sub-Bab Berurutan -->
            <div class="sidebar-section-title">Materi & Kuis Sub-Bab</div>
            <ul class="nav-list">
                @foreach($subBabsSidebar as $sb)
                    @php
                        $isOpen = true;
                        $isDone = (bool) $user->progresSiswa()->where('sub_bab_id', $sb->id)->where('status_tuntas', true)->exists();
                        $isCurrent = request()->is("sub-bab/{$sb->id}*") || (isset($subBab) && $subBab->id === $sb->id);
                    @endphp
                    <li>
                        @if($isOpen)
                            <a href="{{ route('siswa.subbab.show', $sb->id) }}" class="nav-item-link {{ $isCurrent ? 'aktif' : '' }}">
                                <span style="display: flex; align-items: center; gap: 0.65rem;">
                                    <span style="font-weight: 600; color: var(--biru-utama); font-size: 0.8rem;">{{ chr(64 + $sb->urutan) }}.</span>
                                    <span style="font-size: 0.825rem;">{{ Str::limit($sb->judul, 18) }}</span>
                                </span>
                                @if($isDone)
                                    <i class="fas fa-circle-check text-green-600" style="color: var(--hijau-benar); font-size: 0.85rem;" title="Tuntas"></i>
                                @else
                                    <i class="fas fa-circle-dot text-blue-500" style="color: var(--biru-utama); font-size: 0.75rem;" title="Aktif"></i>
                                @endif
                            </a>
                        @else
                            <div class="nav-item-link terkunci" title="Terkunci - selesaikan sub-bab sebelumnya">
                                <span style="display: flex; align-items: center; gap: 0.65rem;">
                                    <span style="font-weight: 600; color: var(--teks-pudar); font-size: 0.8rem;">{{ chr(64 + $sb->urutan) }}.</span>
                                    <span style="font-size: 0.825rem; color: var(--teks-pudar);">{{ Str::limit($sb->judul, 18) }}</span>
                                </span>
                                <i class="fas fa-lock" style="font-size: 0.75rem; color: var(--teks-halus);"></i>
                            </div>
                        @endif
                    </li>
                @endforeach
            </ul>

            <!-- Evaluasi Akhir (Terkunci jika belum 100%) -->
            <div class="sidebar-section-title">Ujian Akhir</div>
            <ul class="nav-list">
                <li>
                    @if($evaluasiTerbukaSidebar)
                        <a href="{{ route('siswa.evaluasi.index') }}" class="nav-item-link {{ request()->is('evaluasi*') ? 'aktif' : '' }}">
                            <span style="display: flex; align-items: center; gap: 0.65rem;">
                                <i class="fas fa-award" style="color: var(--biru-utama); width: 18px;"></i>
                                <span>Evaluasi Akhir</span>
                            </span>
                            <span class="badge badge-hijau" style="font-size: 0.65rem;">Terbuka</span>
                        </a>
                    @else
                        <div class="nav-item-link terkunci" title="Terkunci sampai seluruh sub-bab tuntas (100%)">
                            <span style="display: flex; align-items: center; gap: 0.65rem;">
                                <i class="fas fa-award" style="color: var(--teks-halus); width: 18px;"></i>
                                <span style="color: var(--teks-pudar);">Evaluasi Akhir</span>
                            </span>
                            <i class="fas fa-lock" style="font-size: 0.75rem; color: var(--teks-halus);"></i>
                        </div>
                    @endif
                </li>
            </ul>

            <!-- Buka Kamus Istilah Button -->
            <div style="margin-top: 1rem;">
                <button type="button" class="btn btn-secondary btn-buka-kamus" style="width: 100%; font-size: 0.8rem; padding: 0.55rem;">
                    <i class="fas fa-book-bookmark text-blue-600"></i> Kamus Istilah
                </button>
            </div>
        </div>

        <!-- Tombol Keluar -->
        <div style="border-top: 1px solid var(--abu-border); padding-top: 1rem; margin-top: 1rem;">
            <form action="{{ route('keluar') }}" method="POST">
                @csrf
                <button type="submit" class="btn" style="width: 100%; background-color: var(--abu-latar); color: var(--teks-pudar); font-size: 0.8rem; padding: 0.55rem;">
                    <i class="fas fa-arrow-right-from-bracket"></i> Keluar
                </button>
            </form>
        </div>
    </aside>

    <!-- Area Konten Utama Siswa -->
    <main class="area-konten-utama">
        @if(session('error'))
            <div style="background-color: var(--merah-bg); border: 1px solid var(--merah-border); color: var(--merah-salah); padding: 0.85rem 1.25rem; border-radius: var(--radius-md); margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.65rem; font-weight: 600; font-size: 0.875rem;">
                <i class="fas fa-circle-exclamation" style="color: var(--merah-salah);"></i>
                <span>{{ session('error') }}</span>
            </div>
        @endif

        @if(session('info'))
            <div style="background-color: var(--biru-muda); border: 1px solid var(--biru-border); color: var(--biru-utama); padding: 0.85rem 1.25rem; border-radius: var(--radius-md); margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.65rem; font-weight: 600; font-size: 0.875rem;">
                <i class="fas fa-circle-info" style="color: var(--biru-utama);"></i>
                <span>{{ session('info') }}</span>
            </div>
        @endif

        @yield('isi_siswa')
    </main>
</div>
@endsection
