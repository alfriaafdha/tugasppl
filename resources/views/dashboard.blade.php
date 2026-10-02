<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AljabarLearn - Dashboard Pembelajaran</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .font-math {
            font-family: "Cambria Math", Cambria, Georgia, "Times New Roman", serif;
            font-style: italic;
        }
    </style>
</head>
<body class="bg-gray-50 flex min-h-screen font-sans text-gray-800">

    <!-- Navbar di Sisi Kiri (Fixed / Diam saat Scroll) -->
    <aside class="fixed top-0 left-0 bottom-0 w-64 h-screen bg-white border-r border-gray-200 flex flex-col justify-between shrink-0 z-40 overflow-y-auto">
        <div class="p-6">
            <!-- Brand Logo -->
            <div class="flex items-center gap-3 mb-6">
                <div class="w-10 h-10 bg-blue-600 rounded-xl flex items-center justify-center text-white shadow-sm">
                    <i class="fas fa-robot text-xl"></i>
                </div>
                <div>
                    <h1 class="text-lg font-bold text-blue-900 leading-tight">AljabarLearn</h1>
                    <p class="text-xs text-gray-500">Aljabar SMP</p>
                </div>
            </div>

            <!-- Profil Siswa -->
            <div class="flex items-center gap-3 mb-6 pb-6 border-b border-gray-100">
                <div class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center text-white font-bold text-sm shadow-sm">
                    MA
                </div>
                <div>
                    <h2 class="text-sm font-bold truncate w-32">Muhammad Alfria Afdha</h2>
                    <span class="text-xs bg-blue-100 text-blue-700 px-2 py-0.5 rounded-md font-semibold mt-1 inline-block">Kelas VII</span>
                </div>
            </div>

            <!-- 1. HALAMAN DASHBOARD SENDIRI DI ATAS BAGIAN MATERI -->
            <div class="mb-6">
                <h3 class="text-xs font-bold text-gray-400 mb-2 tracking-wider uppercase">MENU UTAMA</h3>
                <a href="/dashboard" class="flex items-center justify-between px-3.5 py-2.5 rounded-xl border transition text-xs font-semibold bg-blue-50 text-blue-700 border-blue-200 shadow-sm">
                    <div class="flex items-center gap-2.5">
                        <i class="fas fa-th-large text-sm text-blue-600"></i>
                        <span class="font-bold text-sm">Dashboard</span>
                    </div>
                    <i class="fas fa-chevron-right text-xs opacity-60"></i>
                </a>
            </div>

            <!-- 2. MENU MATERI SUB-BAB 1 - 4 DI BAWAH DASHBOARD -->
            <div class="mb-6">
                <h3 class="text-xs font-bold text-gray-400 mb-2 tracking-wider uppercase">MATERI PEMBELAJARAN</h3>
                <div class="space-y-1.5">
                    <a href="/materi?subbab=1" class="flex items-center justify-between px-3 py-2 rounded-xl border border-transparent hover:bg-gray-100 text-gray-600 transition block">
                        <div>
                            <div class="font-bold text-xs">Sub-Bab 1</div>
                            <div class="text-[11px] opacity-75">Suku & Koefisien</div>
                        </div>
                        <i class="fas fa-check text-xs text-blue-600"></i>
                    </a>
                    <a href="/materi?subbab=2" class="flex items-center justify-between px-3 py-2 rounded-xl border border-transparent hover:bg-gray-100 text-gray-600 transition block">
                        <div>
                            <div class="font-bold text-xs">Sub-Bab 2</div>
                            <div class="text-[11px] opacity-75">Operasi Aljabar</div>
                        </div>
                        <i class="fas fa-check text-xs text-blue-600"></i>
                    </a>
                    <a href="/materi?subbab=3" class="flex items-center justify-between px-3 py-2 rounded-xl border border-transparent hover:bg-gray-100 text-gray-600 transition block">
                        <div>
                            <div class="font-bold text-xs">Sub-Bab 3</div>
                            <div class="text-[11px] opacity-75">Pemodelan Aljabar</div>
                        </div>
                        <i class="fas fa-check text-xs text-blue-600"></i>
                    </a>
                    <a href="/materi?subbab=4" class="flex items-center justify-between px-3 py-2 rounded-xl border border-transparent hover:bg-gray-100 text-gray-600 transition block">
                        <div>
                            <div class="font-bold text-xs">Sub-Bab 4</div>
                            <div class="text-[11px] opacity-75">Sifat & Persamaan</div>
                        </div>
                        <i class="fas fa-check text-xs text-blue-600"></i>
                    </a>
                </div>
            </div>

            <!-- 3. MENU UJIAN / EVALUASI (TERSENDIRI DI BAWAH MATERI) -->
            <div>
                <h3 class="text-xs font-bold text-gray-400 mb-2 tracking-wider uppercase">UJIAN & EVALUASI</h3>
                <a href="/materi?subbab=evaluasi" class="bg-blue-600 hover:bg-blue-700 text-white px-3.5 py-3 rounded-xl transition block shadow-sm">
                    <div class="font-bold text-sm flex items-center justify-between">
                        <span>Evaluasi Akhir</span>
                        <i class="fas fa-arrow-right text-xs"></i>
                    </div>
                    <div class="text-xs opacity-90 mt-0.5">7 Soal Kuis Mandiri</div>
                </a>
            </div>
        </div>

        <!-- Tombol Kembali ke Landing Page di Bawah Navbar Kiri -->
        <div class="p-6 border-t border-gray-100">
            <a href="/" class="flex items-center text-gray-500 hover:text-blue-600 text-xs font-medium transition">
                <i class="fas fa-home mr-2.5 text-blue-600"></i>
                Halaman Utama (Landing)
            </a>
        </div>
    </aside>

    <!-- Konten Utama Dasbor (Tidak fixed, dapat di-scroll) -->
    <main class="flex-1 ml-64 p-8 min-h-screen">
        
        <!-- Welcome Hero Banner Asli (Biru Putih) -->
        <div class="bg-blue-600 rounded-3xl p-8 text-white mb-8 relative overflow-hidden shadow-sm">
            <div class="relative z-10 max-w-2xl">
                <p class="text-blue-100 text-sm mb-1">Selamat datang kembali!</p>
                <h2 class="text-3xl font-bold mb-2">Halo, Muhammad Alfria Afdha!</h2>
                <p class="text-blue-100 mb-6 text-sm leading-relaxed">
                    Semua materi <strong>Bab 4: Bentuk Aljabar</strong> (Kurikulum Merdeka 2022) siap dipelajari! 
                    Pahami konsep, coba simulasi interaktif, dan selesaikan evaluasi akhir kuis.
                </p>
                <div class="flex flex-wrap items-center gap-3">
                    <a href="/materi?subbab=1" class="bg-white text-blue-600 px-6 py-2.5 rounded-full font-bold text-sm shadow-sm hover:bg-blue-50 transition inline-flex items-center gap-2">
                        <i class="fas fa-book-open"></i> Mulai Belajar Materi
                    </a>
                    <a href="/materi?subbab=evaluasi" class="bg-blue-700/80 hover:bg-blue-800 text-white px-5 py-2.5 rounded-full font-bold text-sm transition inline-flex items-center gap-2 border border-blue-400">
                        <i class="fas fa-clipboard-check"></i> Mulai Evaluasi Akhir
                    </a>
                </div>
            </div>
            <div class="absolute right-12 top-1/2 transform -translate-y-1/2 opacity-15 pointer-events-none hidden md:block">
                <i class="fas fa-robot text-9xl"></i>
            </div>
        </div>

        <!-- 3 Stat Cards Asli -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-8">
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <h3 class="text-2xl font-bold text-gray-800 mb-1">4/4</h3>
                <p class="text-gray-400 text-sm">Sub-Bab Selesai</p>
            </div>
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <h3 class="text-2xl font-bold text-gray-800 mb-1">100%</h3>
                <p class="text-gray-400 text-sm">Progres Total</p>
            </div>
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <h3 class="text-2xl font-bold text-blue-600 mb-1">Terbuka</h3>
                <p class="text-gray-400 text-sm">Status Ujian</p>
            </div>
        </div>

        <!-- Pertanyaan Pemantik Buku Siswa -->
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 mb-8">
            <div class="flex items-start gap-4">
                <div class="w-10 h-10 rounded-xl bg-blue-100 text-blue-700 flex items-center justify-center text-xl shrink-0 font-bold">
                    ?
                </div>
                <div class="flex-1 space-y-3">
                    <div>
                        <span class="text-xs font-bold text-blue-600 uppercase tracking-wider">Pertanyaan Pemantik Buku Siswa</span>
                        <h3 class="text-lg font-bold text-gray-800 mt-0.5">Mengapa ada penggunaan huruf dalam matematika?</h3>
                    </div>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        Alih-alih menggunakan kalimat panjang, matematika memakai <strong>huruf (variabel)</strong> 
                        agar informasi dapat dinyatakan secara singkat, akurat, dan dapat dimengerti melintasi bahasa manusia.
                    </p>
                    
                    <!-- Kotak Medis Infus -->
                    <div class="bg-blue-50 p-4 rounded-xl border border-blue-100 flex flex-col sm:flex-row items-center gap-4 text-xs sm:text-sm">
                        <div class="w-10 h-10 rounded-lg bg-blue-600 text-white flex items-center justify-center text-lg shrink-0">
                            <i class="fas fa-prescription-bottle-medical"></i>
                        </div>
                        <div class="flex-1">
                            <strong class="text-blue-900 block font-semibold">Contoh Medis Nyata: Rumus Tetesan Infus</strong>
                            <p class="text-blue-800 mt-0.5">
                                Rumus laju tetes per menit: <span class="font-math font-bold text-base px-2 py-0.5 bg-white rounded border border-blue-200">D = \frac{dv}{60n}</span> 
                                (<span class="font-math">D</span> = tetes/menit, <span class="font-math">d</span> = faktor tetes, <span class="font-math">v</span> = volume mL, <span class="font-math">n</span> = jam).
                            </p>
                        </div>
                        <div class="text-xs text-gray-500 italic shrink-0">
                            Tokoh: Al-Khawarizmi
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Planning Tree Materi Bab 4 (Collapsible) -->
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 mb-8">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h3 class="text-lg font-bold text-gray-800 flex items-center gap-2">
                        <i class="fas fa-sitemap text-blue-600"></i>
                        Planning Tree Materi Bab 4
                    </h3>
                    <p class="text-xs text-gray-500 mt-0.5">Peta rencana belajar interaktif berdasarkan kurikulum resmi Kemendikbudristek 2022</p>
                </div>
                <div class="flex items-center gap-2">
                    <button onclick="setTree(true)" class="px-3 py-1.5 rounded-lg text-xs font-semibold bg-blue-50 text-blue-700 hover:bg-blue-100 transition">
                        Buka Semua
                    </button>
                    <button onclick="setTree(false)" class="px-3 py-1.5 rounded-lg text-xs font-semibold bg-gray-100 text-gray-600 hover:bg-gray-200 transition">
                        Tutup Semua
                    </button>
                </div>
            </div>

            <div class="space-y-3 text-sm" id="treeList">
                <details open class="group bg-gray-50 rounded-xl border border-gray-200 p-4 transition">
                    <summary class="cursor-pointer font-bold text-gray-800 flex items-center justify-between select-none">
                        <span class="flex items-center gap-2 text-blue-900">
                            <span class="w-6 h-6 rounded-md bg-blue-600 text-white flex items-center justify-center text-xs">A</span>
                            Sub-Bab 1: Unsur-Unsur Bentuk Aljabar (2 Pertemuan)
                        </span>
                        <i class="fas fa-chevron-down text-xs text-gray-400 group-open:rotate-180 transition-transform"></i>
                    </summary>
                    <div class="mt-3 pl-6 border-l-2 border-blue-200 space-y-2 text-xs text-gray-600">
                        <div class="flex justify-between items-center py-0.5">
                            <span>• Variabel untuk nilai berubah & tak tentu (Eksplorasi korek api <span class="font-math">1 + 3n</span>)</span>
                            <span class="px-2 py-0.5 rounded bg-blue-100 text-blue-800 font-bold text-[10px]">TP 1</span>
                        </div>
                        <div class="flex justify-between items-center py-0.5">
                            <span>• Suku, koefisien, dan konstanta (Tiket taman bermain <span class="font-math">3a + 2b</span>)</span>
                            <span class="px-2 py-0.5 rounded bg-blue-100 text-blue-800 font-bold text-[10px]">TP 2</span>
                        </div>
                        <div class="flex justify-between items-center py-0.5">
                            <span>• Substitusi nilai variabel (Latihan 4.1)</span>
                            <span class="px-2 py-0.5 rounded bg-blue-100 text-blue-800 font-bold text-[10px]">TP 3</span>
                        </div>
                    </div>
                </details>

                <details open class="group bg-gray-50 rounded-xl border border-gray-200 p-4 transition">
                    <summary class="cursor-pointer font-bold text-gray-800 flex items-center justify-between select-none">
                        <span class="flex items-center gap-2 text-blue-900">
                            <span class="w-6 h-6 rounded-md bg-blue-600 text-white flex items-center justify-center text-xs">B</span>
                            Sub-Bab 2: Sifat-Sifat dan Operasi Aljabar (3 Pertemuan)
                        </span>
                        <i class="fas fa-chevron-down text-xs text-gray-400 group-open:rotate-180 transition-transform"></i>
                    </summary>
                    <div class="mt-3 pl-6 border-l-2 border-blue-200 space-y-2 text-xs text-gray-600">
                        <div class="flex justify-between items-center py-0.5">
                            <span>• Bentuk ekuivalen ubin kolam renang (<span class="font-math">4s + 4 = 4(s + 1)</span>)</span>
                            <span class="px-2 py-0.5 rounded bg-blue-100 text-blue-800 font-bold text-[10px]">TP 4</span>
                        </div>
                        <div class="flex justify-between items-center py-0.5">
                            <span>• Sifat distributif: bentuk faktor dan bentuk jabaran (<span class="font-math">a(b + c) = ab + ac</span>)</span>
                            <span class="px-2 py-0.5 rounded bg-blue-100 text-blue-800 font-bold text-[10px]">TP 4</span>
                        </div>
                        <div class="flex justify-between items-center py-0.5">
                            <span>• Kaidah suku sejenis (<span class="font-math">5x + 7x = 12x</span>, analogi buah apel dan jeruk)</span>
                            <span class="px-2 py-0.5 rounded bg-blue-100 text-blue-800 font-bold text-[10px]">TP 4</span>
                        </div>
                    </div>
                </details>

                <details open class="group bg-gray-50 rounded-xl border border-gray-200 p-4 transition">
                    <summary class="cursor-pointer font-bold text-gray-800 flex items-center justify-between select-none">
                        <span class="flex items-center gap-2 text-blue-900">
                            <span class="w-6 h-6 rounded-md bg-blue-600 text-white flex items-center justify-center text-xs">C</span>
                            Sub-Bab 3: Pemodelan dengan Bentuk Aljabar (2 Pertemuan)
                        </span>
                        <i class="fas fa-chevron-down text-xs text-gray-400 group-open:rotate-180 transition-transform"></i>
                    </summary>
                    <div class="mt-3 pl-6 border-l-2 border-blue-200 space-y-2 text-xs text-gray-600">
                        <div class="flex justify-between items-center py-0.5">
                            <span>• Pemodelan jarak tempuh Wisnu (<span class="font-math">5.000 - 15t</span>)</span>
                            <span class="px-2 py-0.5 rounded bg-blue-100 text-blue-800 font-bold text-[10px]">TP 5</span>
                        </div>
                        <div class="flex justify-between items-center py-0.5">
                            <span>• Banyak variabel, keluarga Linda, & kewajaran berat buah</span>
                            <span class="px-2 py-0.5 rounded bg-blue-100 text-blue-800 font-bold text-[10px]">TP 5</span>
                        </div>
                        <div class="flex justify-between items-center py-0.5">
                            <span>• Trik sulap bilangan hasil selalu 3 & tarif ojol Bayu</span>
                            <span class="px-2 py-0.5 rounded bg-blue-100 text-blue-800 font-bold text-[10px]">TP 5</span>
                        </div>
                    </div>
                </details>
            </div>
        </div>

        <!-- Heading Daftar Sub-Bab -->
        <h3 class="text-lg font-bold text-gray-800 mb-5">Sub-Bab Materi</h3>

        <!-- Grid 2 Kolom Sub-Bab Asli -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            
            <!-- Sub-Bab 1 -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 border-t-4 border-t-blue-500 flex flex-col justify-between">
                <div>
                    <div class="flex items-center text-xs text-blue-600 bg-blue-50 px-2.5 py-1 rounded-md w-max mb-4 font-semibold">
                        <i class="fas fa-check mr-1.5 text-[10px]"></i> Selesai
                    </div>
                    <p class="text-gray-400 text-xs mb-1 font-medium">Sub-Bab 1</p>
                    <h4 class="text-lg font-bold text-gray-800 mb-2">Suku & Koefisien</h4>
                    <p class="text-xs text-gray-500 mb-6 leading-relaxed">
                        Mengenal variabel, suku, koefisien, dan konstanta melalui simulasi pola korek api ($1 + 3n$), serta latihan substitusi nilai variabel.
                    </p>
                </div>
                <a href="/materi?subbab=1" class="text-xs font-semibold text-gray-500 hover:text-blue-600 transition flex items-center">
                    Ulangi Materi <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>

            <!-- Sub-Bab 2 -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 border-t-4 border-t-purple-500 flex flex-col justify-between">
                <div>
                    <div class="flex items-center text-xs text-purple-600 bg-purple-50 px-2.5 py-1 rounded-md w-max mb-4 font-semibold">
                        <i class="fas fa-check mr-1.5 text-[10px]"></i> Selesai
                    </div>
                    <p class="text-gray-400 text-xs mb-1 font-medium">Sub-Bab 2</p>
                    <h4 class="text-lg font-bold text-gray-800 mb-2">Operasi Aljabar</h4>
                    <p class="text-xs text-gray-500 mb-6 leading-relaxed">
                        Membuktikan rumus ekuivalen ubin kolam renang ($4s+4 = 4(s+1)$), sifat distributif (jabaran vs faktor), dan penjumlahan suku sejenis.
                    </p>
                </div>
                <a href="/materi?subbab=2" class="text-xs font-semibold text-gray-500 hover:text-purple-600 transition flex items-center">
                    Ulangi Materi <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>

            <!-- Sub-Bab 3 -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 border-t-4 border-t-teal-500 flex flex-col justify-between">
                <div>
                    <div class="flex items-center text-xs text-teal-600 bg-teal-50 px-2.5 py-1 rounded-md w-max mb-4 font-semibold">
                        <i class="fas fa-check mr-1.5 text-[10px]"></i> Selesai
                    </div>
                    <p class="text-gray-400 text-xs mb-1 font-medium">Sub-Bab 3</p>
                    <h4 class="text-lg font-bold text-gray-800 mb-2">Pemodelan Aljabar</h4>
                    <p class="text-xs text-gray-500 mb-6 leading-relaxed">
                        Memodelkan jarak dan waktu tempuh Wisnu ($5.000 - 15t$), tinggi badan keluarga Linda, uji kewajaran berat buah, serta tarif ojol.
                    </p>
                </div>
                <a href="/materi?subbab=3" class="text-xs font-semibold text-gray-500 hover:text-teal-600 transition flex items-center">
                    Ulangi Materi <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>

            <!-- Sub-Bab 4 -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 border-t-4 border-t-pink-500 flex flex-col justify-between">
                <div>
                    <div class="flex items-center text-xs text-pink-600 bg-pink-50 px-2.5 py-1 rounded-md w-max mb-4 font-semibold">
                        <i class="fas fa-check mr-1.5 text-[10px]"></i> Selesai
                    </div>
                    <p class="text-gray-400 text-xs mb-1 font-medium">Sub-Bab 4</p>
                    <h4 class="text-lg font-bold text-gray-800 mb-2">Sifat & Persamaan Linear</h4>
                    <p class="text-xs text-gray-500 mb-6 leading-relaxed">
                        Teka-teki bilangan aljabar rahasia selalu bernilai 3, komparator tarif ojol Bayu, dan pemodelan aljabar modal usaha.
                    </p>
                </div>
                <a href="/materi?subbab=4" class="text-xs font-semibold text-gray-500 hover:text-pink-600 transition flex items-center">
                    Ulangi Materi <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>

        </div>

        <footer class="mt-12 text-center text-xs text-gray-400 py-4">
            Sumber Materi: Matematika SMP/MTs Kelas VII, Kemendikbudristek 2022 (Bab 4 Bentuk Aljabar).
        </footer>

    </main>

    <script>
        function setTree(isOpen) {
            document.querySelectorAll('#treeList details').forEach(d => d.open = isOpen);
        }
    </script>
</body>
</html>