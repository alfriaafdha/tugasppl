@extends('layouts.dasar')

@php
    $user = Auth::user();
@endphp

@section('konten')
<div class="wadah-aplikasi">
    <!-- Sidebar Kiri Guru (Fixed) -->
    <aside class="sidebar-kiri">
        <div>
            <!-- Brand -->
            <a href="{{ route('guru.dasbor') }}" class="brand-box">
                <div class="brand-icon">
                    <i class="fas fa-chalkboard-user"></i>
                </div>
                <div>
                    <h1 class="brand-title">AljabarLearn</h1>
                    <p class="brand-subtitle">Dasbor Pemantauan Guru</p>
                </div>
            </a>

            <!-- Profil Guru -->
            <div class="profil-box">
                <div class="profil-avatar" style="background-color: var(--biru-utama);">
                    <i class="fas fa-user-tie"></i>
                </div>
                <div class="profil-info">
                    <div class="profil-nama" title="{{ $user->nama }}">{{ $user->nama }}</div>
                    <span class="profil-peran">Guru Matematika</span>
                </div>
            </div>

            <!-- Menu Navigasi Guru -->
            <div class="sidebar-section-title">Menu Pemantauan</div>
            <ul class="nav-list">
                <li>
                    <a href="{{ route('guru.dasbor') }}" class="nav-item-link {{ request()->routeIs('guru.dasbor') || request()->routeIs('guru.siswa.detail') ? 'aktif' : '' }}">
                        <span style="display: flex; align-items: center; gap: 0.65rem;">
                            <i class="fas fa-users" style="width: 18px;"></i>
                            <span>Daftar Siswa & Progres</span>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('guru.ringkasan') }}" class="nav-item-link {{ request()->routeIs('guru.ringkasan') ? 'aktif' : '' }}">
                        <span style="display: flex; align-items: center; gap: 0.65rem;">
                            <i class="fas fa-chart-line" style="width: 18px;"></i>
                            <span>Analisis Materi Sulit</span>
                        </span>
                    </a>
                </li>
            </ul>

            <div style="padding: 1rem; background-color: var(--abu-latar); border-radius: var(--radius-md); border: 1px solid var(--abu-border); font-size: 0.75rem; color: var(--teks-pudar); line-height: 1.45;">
                <i class="fas fa-info-circle text-blue-600"></i> Dasbor ini bersifat <strong>baca-saja</strong> untuk melihat durasi, progres, dan kesalahan langkah siswa guna mendiagnosis materi yang sulit.
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

    <!-- Area Konten Utama Guru -->
    <main class="area-konten-utama">
        @yield('isi_guru')
    </main>
</div>
@endsection
