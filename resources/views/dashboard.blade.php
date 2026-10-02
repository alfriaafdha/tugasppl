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
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }
        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 9999px;
        }
    </style>
</head>
<body class="bg-gray-50 flex min-h-screen font-sans text-gray-800">

    <!-- Navbar Sisi Kiri (Fixed / Diam saat Scroll) -->
    <aside class="fixed top-0 left-0 bottom-0 w-64 h-screen bg-white border-r border-gray-200 flex flex-col justify-between shrink-0 z-40 overflow-y-auto">
        <div class="p-6">
            <!-- Brand Logo -->
            <div class="flex items-center gap-3 mb-6">
                <div class="w-10 h-10 bg-blue-600 rounded-xl flex items-center justify-center text-white shadow-sm">
                    <i class="fas fa-shapes text-xl"></i>
                </div>
                <div>
                    <h1 class="text-lg font-bold text-blue-900 leading-tight">AljabarLearn</h1>
                    <p class="text-xs text-gray-500 font-medium">Matematika SMP Kelas VII</p>
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

            <!-- Menu Utama: Dashboard -->
            <div class="mb-5">
                <h3 class="text-[10px] font-bold text-gray-400 mb-2 tracking-wider uppercase">MENU UTAMA</h3>
                <a href="/dashboard" class="flex items-center justify-between px-3.5 py-2.5 rounded-xl border transition text-xs font-semibold bg-blue-50 text-blue-700 border-blue-200 shadow-sm">
                    <div class="flex items-center gap-2.5">
                        <i class="fas fa-th-large text-sm text-blue-600"></i>
                        <span class="font-bold text-sm">Dashboard</span>
                    </div>
                    <i class="fas fa-chevron-right text-xs opacity-60"></i>
                </a>
            </div>

            <!-- Menu Materi Sub-Bab 1 - 4 -->
            <div class="mb-5">
                <h3 class="text-[10px] font-bold text-gray-400 mb-2 tracking-wider uppercase">MATERI PEMBELAJARAN</h3>
                <div class="space-y-1.5">
                    <a href="/materi?subbab=1" class="flex items-center justify-between px-3 py-2 rounded-xl border border-transparent hover:bg-gray-100 text-gray-600 transition block">
                        <div>
                            <div class="font-bold text-xs">Sub-Bab 1</div>
                            <div class="text-[11px] opacity-75">Mengenal Variabel & Unsur</div>
                        </div>
                        <i class="fas fa-check text-xs text-blue-600"></i>
                    </a>
                    <a href="/materi?subbab=2" class="flex items-center justify-between px-3 py-2 rounded-xl border border-transparent hover:bg-gray-100 text-gray-600 transition block">
                        <div>
                            <div class="font-bold text-xs">Sub-Bab 2</div>
                            <div class="text-[11px] opacity-75">Suku Sejenis</div>
                        </div>
                        <i class="fas fa-check text-xs text-blue-600"></i>
                    </a>
                    <a href="/materi?subbab=3" class="flex items-center justify-between px-3 py-2 rounded-xl border border-transparent hover:bg-gray-100 text-gray-600 transition block">
                        <div>
                            <div class="font-bold text-xs">Sub-Bab 3</div>
                            <div class="text-[11px] opacity-75">Distributif & Faktor</div>
                        </div>
                        <i class="fas fa-check text-xs text-blue-600"></i>
                    </a>
                    <a href="/materi?subbab=4" class="flex items-center justify-between px-3 py-2 rounded-xl border border-transparent hover:bg-gray-100 text-gray-600 transition block">
                        <div>
                            <div class="font-bold text-xs">Sub-Bab 4</div>
                            <div class="text-[11px] opacity-75">Pemodelan Aljabar</div>
                        </div>
                        <i class="fas fa-check text-xs text-blue-600"></i>
                    </a>
                    <a href="/materi?subbab=ringkasan" class="flex items-center justify-between px-3 py-2 rounded-xl border border-transparent hover:bg-gray-100 text-gray-600 transition block">
                        <div class="flex items-center gap-2">
                            <i class="fas fa-bookmark text-amber-500 text-xs"></i>
                            <div class="font-bold text-xs">Ringkasan Materi</div>
                        </div>
                        <i class="fas fa-arrow-right text-xs opacity-40"></i>
                    </a>
                </div>
            </div>

            <!-- Menu Evaluasi Akhir -->
            <div>
                <h3 class="text-[10px] font-bold text-gray-400 mb-2 tracking-wider uppercase">UJIAN & EVALUASI</h3>
                <a href="/materi?subbab=evaluasi" class="bg-blue-600 hover:bg-blue-700 text-white px-3.5 py-3 rounded-xl transition block shadow-sm group">
                    <div class="font-bold text-sm flex items-center justify-between">
                        <span>Evaluasi Akhir</span>
                        <i class="fas fa-arrow-right text-xs group-hover:translate-x-1 transition-transform"></i>
                    </div>
                    <div class="text-[11px] text-blue-100 mt-0.5 flex items-center justify-between">
                        <span>7 Soal • 20 Menit</span>
                        <span class="bg-blue-800/80 px-1.5 py-0.5 rounded text-[10px]">Bebas AI</span>
                    </div>
                </a>
            </div>
        </div>

        <!-- Tombol Landing Page -->
        <div class="p-6 border-t border-gray-100">
            <a href="/" class="flex items-center text-gray-500 hover:text-blue-600 text-xs font-medium transition">
                <i class="fas fa-home mr-2.5 text-blue-600"></i>
                Halaman Utama (Landing)
            </a>
        </div>
    </aside>

    <!-- Konten Utama Dasbor -->
    <main class="flex-1 ml-64 p-6 sm:p-8 min-h-screen">
        
        <!-- Welcome Hero Banner -->
        <div class="bg-blue-600 rounded-3xl p-8 text-white mb-8 relative overflow-hidden shadow-sm">
            <div class="relative z-10 max-w-2xl">
                <p class="text-blue-100 text-sm mb-1">Selamat datang kembali!</p>
                <h2 class="text-3xl font-bold mb-2">Halo, Muhammad Alfria Afdha!</h2>
                <p class="text-blue-100 mb-6 text-sm leading-relaxed">
                    Semua materi <strong>Bab 4: Bentuk Aljabar</strong> (Kurikulum Merdeka 2022) lengkap dengan 16 soal latihan baris demi baris (Line-by-Line Checker) dan petunjuk Socratic Hint AI telah siap dipelajari!
                </p>
                <div class="flex flex-wrap items-center gap-3">
                    <a href="/materi?subbab=1" class="bg-white text-blue-600 px-6 py-2.5 rounded-full font-bold text-sm shadow-sm hover:bg-blue-50 transition inline-flex items-center gap-2">
                        <i class="fas fa-book-open"></i> Mulai Belajar Materi
                    </a>
                    <a href="/materi?subbab=evaluasi" class="bg-blue-700/80 hover:bg-blue-800 text-white px-5 py-2.5 rounded-full font-bold text-sm transition inline-flex items-center gap-2 border border-blue-400">
                        <i class="fas fa-clipboard-check"></i> Mulai Evaluasi Akhir (20 Menit)
                    </a>
                </div>
            </div>
            <div class="absolute right-12 top-1/2 transform -translate-y-1/2 opacity-15 pointer-events-none hidden md:block">
                <i class="fas fa-shapes text-9xl"></i>
            </div>
        </div>

        <!-- 3 Stat Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-8">
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <h3 class="text-2xl font-bold text-gray-800 mb-1">4 / 4</h3>
                <p class="text-gray-400 text-sm">Sub-Bab Tersedia</p>
                <span class="text-[11px] text-blue-600 font-semibold mt-1 inline-block">16 Soal Latihan Formatif</span>
            </div>
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <h3 class="text-2xl font-bold text-gray-800 mb-1">100%</h3>
                <p class="text-gray-400 text-sm">Progres Belajar</p>
                <span class="text-[11px] text-emerald-600 font-semibold mt-1 inline-block">Semua Sub-Bab Terbuka</span>
            </div>
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <h3 class="text-2xl font-bold text-blue-600 mb-1">Terbuka</h3>
                <p class="text-gray-400 text-sm">Status Ujian Evaluasi</p>
                <span class="text-[11px] text-gray-500 font-semibold mt-1 inline-block">7 Soal • Bebas AI</span>
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
                        Alih-alih menggunakan kalimat panjang yang sulit dan memakan ruang, matematika menggunakan <strong>huruf (variabel)</strong> sebagai <em>"kotak kosong"</em> agar informasi dapat dinyatakan secara singkat, akurat, dan dapat dimengerti melintasi bahasa manusia di seluruh dunia.
                    </p>
                    
                    <!-- Kotak Medis Infus (Render teks bersih tanpa LaTeX) -->
                    <div class="bg-blue-50 p-4 rounded-xl border border-blue-100 flex flex-col sm:flex-row items-center gap-4 text-xs sm:text-sm">
                        <div class="w-10 h-10 rounded-lg bg-blue-600 text-white flex items-center justify-center text-lg shrink-0">
                            <i class="fas fa-prescription-bottle-medical"></i>
                        </div>
                        <div class="flex-1">
                            <strong class="text-blue-900 block font-semibold">Contoh Medis Nyata: Rumus Tetesan Infus</strong>
                            <p class="text-blue-800 mt-0.5">
                                Rumus laju tetes per menit: <span class="font-math font-bold text-base px-2 py-0.5 bg-white rounded border border-blue-200">D = dv / (60n)</span> 
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
                <!-- Sub-Bab 1 -->
                <details open class="group bg-gray-50 rounded-xl border border-gray-200 p-4 transition">
                    <summary class="cursor-pointer font-bold text-gray-800 flex items-center justify-between select-none">
                        <span class="flex items-center gap-2 text-blue-900">
                            <span class="w-6 h-6 rounded-md bg-blue-600 text-white flex items-center justify-center text-xs">1</span>
                            Unit 1: Mengenal Huruf dalam Matematika (Variabel, Suku, Koefisien, Konstanta)
                        </span>
                        <i class="fas fa-chevron-down text-xs text-gray-400 group-open:rotate-180 transition-transform"></i>
                    </summary>
                    <div class="mt-3 pl-6 border-l-2 border-blue-200 space-y-2 text-xs text-gray-600">
                        <div class="flex justify-between items-center py-0.5">
                            <span>• Variabel sebagai "kotak kosong", pola korek api (<span class="font-math">1 + 3n</span>) & tetesan infus</span>
                            <span class="px-2 py-0.5 rounded bg-blue-100 text-blue-800 font-bold text-[10px]">TP 1</span>
                        </div>
                        <div class="flex justify-between items-center py-0.5">
                            <span>• Suku, koefisien, konstanta pada <span class="font-math">5x − 2y + 7</span> dan tiket liburan <span class="font-math">3a + 2b</span></span>
                            <span class="px-2 py-0.5 rounded bg-blue-100 text-blue-800 font-bold text-[10px]">TP 2</span>
                        </div>
                        <div class="flex justify-between items-center py-0.5">
                            <span>• Substitusi nilai variabel: <span class="font-math">3m + 4</span> untuk m = 5, serta aturan tanda minus</span>
                            <span class="px-2 py-0.5 rounded bg-blue-100 text-blue-800 font-bold text-[10px]">TP 3</span>
                        </div>
                        <div class="flex justify-between items-center py-0.5 font-semibold text-blue-700">
                            <span>• Kuis Latihan Sub-Bab 1 (4 Soal: K1.1 - K1.4) dengan Line-by-Line & Hint AI</span>
                            <span class="px-2 py-0.5 rounded bg-blue-600 text-white font-bold text-[10px]">Kuis 1</span>
                        </div>
                    </div>
                </details>

                <!-- Sub-Bab 2 -->
                <details open class="group bg-gray-50 rounded-xl border border-gray-200 p-4 transition">
                    <summary class="cursor-pointer font-bold text-gray-800 flex items-center justify-between select-none">
                        <span class="flex items-center gap-2 text-blue-900">
                            <span class="w-6 h-6 rounded-md bg-purple-600 text-white flex items-center justify-center text-xs">2</span>
                            Unit 2: Menjumlahkan dan Mengurangkan Suku Sejenis
                        </span>
                        <i class="fas fa-chevron-down text-xs text-gray-400 group-open:rotate-180 transition-transform"></i>
                    </summary>
                    <div class="mt-3 pl-6 border-l-2 border-purple-200 space-y-2 text-xs text-gray-600">
                        <div class="flex justify-between items-center py-0.5">
                            <span>• Kaidah suku sejenis & analogi buah: <span class="font-math">2x + 3x = 5x</span>; <span class="font-math">2x + 3y</span> tidak bisa disatukan</span>
                            <span class="px-2 py-0.5 rounded bg-purple-100 text-purple-800 font-bold text-[10px]">TP 4</span>
                        </div>
                        <div class="flex justify-between items-center py-0.5">
                            <span>• Menyederhanakan banyak suku: <span class="font-math">7a + 2b − 3a = 4a + 2b</span> (sifat komutatif, tanda minus ikut sukunya)</span>
                            <span class="px-2 py-0.5 rounded bg-purple-100 text-purple-800 font-bold text-[10px]">TP 4</span>
                        </div>
                        <div class="flex justify-between items-center py-0.5">
                            <span>• Operasi koefisien pecahan: <span class="font-math">2/3 a + 1/4 a = 11/12 a</span> dengan menyamakan penyebut</span>
                            <span class="px-2 py-0.5 rounded bg-purple-100 text-purple-800 font-bold text-[10px]">TP 4</span>
                        </div>
                        <div class="flex justify-between items-center py-0.5 font-semibold text-purple-700">
                            <span>• Kuis Latihan Sub-Bab 2 (4 Soal: K2.1 - K2.4) dengan Line-by-Line & Hint AI</span>
                            <span class="px-2 py-0.5 rounded bg-purple-600 text-white font-bold text-[10px]">Kuis 2</span>
                        </div>
                    </div>
                </details>

                <!-- Sub-Bab 3 -->
                <details open class="group bg-gray-50 rounded-xl border border-gray-200 p-4 transition">
                    <summary class="cursor-pointer font-bold text-gray-800 flex items-center justify-between select-none">
                        <span class="flex items-center gap-2 text-blue-900">
                            <span class="w-6 h-6 rounded-md bg-teal-600 text-white flex items-center justify-center text-xs">3</span>
                            Unit 3: Sifat Distributif dan Bentuk yang Sama Nilainya
                        </span>
                        <i class="fas fa-chevron-down text-xs text-gray-400 group-open:rotate-180 transition-transform"></i>
                    </summary>
                    <div class="mt-3 pl-6 border-l-2 border-teal-200 space-y-2 text-xs text-gray-600">
                        <div class="flex justify-between items-center py-0.5">
                            <span>• Eksplorasi ubin kolam renang: <span class="font-math">4s + 4 = 4(s + 1)</span> dan analisis kekeliruan Riska <span class="font-math">4(s + 2)</span></span>
                            <span class="px-2 py-0.5 rounded bg-teal-100 text-teal-800 font-bold text-[10px]">TP 4</span>
                        </div>
                        <div class="flex justify-between items-center py-0.5">
                            <span>• Sifat distributif: <span class="font-math">a(b + c) = ab + ac</span>; Bentuk jabaran vs Bentuk faktor (<span class="font-math">6x + 9 = 3(2x + 3)</span>)</span>
                            <span class="px-2 py-0.5 rounded bg-teal-100 text-teal-800 font-bold text-[10px]">TP 4</span>
                        </div>
                        <div class="flex justify-between items-center py-0.5">
                            <span>• Menjabarkan dengan tanda minus: <span class="font-math">(5x − 1) − (2x + 3) = 3x − 4</span></span>
                            <span class="px-2 py-0.5 rounded bg-teal-100 text-teal-800 font-bold text-[10px]">TP 4</span>
                        </div>
                        <div class="flex justify-between items-center py-0.5 font-semibold text-teal-700">
                            <span>• Kuis Latihan Sub-Bab 3 (4 Soal: K3.1 - K3.4) dengan Line-by-Line & Hint AI</span>
                            <span class="px-2 py-0.5 rounded bg-teal-600 text-white font-bold text-[10px]">Kuis 3</span>
                        </div>
                    </div>
                </details>

                <!-- Sub-Bab 4 -->
                <details open class="group bg-gray-50 rounded-xl border border-gray-200 p-4 transition">
                    <summary class="cursor-pointer font-bold text-gray-800 flex items-center justify-between select-none">
                        <span class="flex items-center gap-2 text-blue-900">
                            <span class="w-6 h-6 rounded-md bg-rose-600 text-white flex items-center justify-center text-xs">4</span>
                            Unit 4: Mengubah Cerita Menjadi Bentuk Aljabar (Pemodelan)
                        </span>
                        <i class="fas fa-chevron-down text-xs text-gray-400 group-open:rotate-180 transition-transform"></i>
                    </summary>
                    <div class="mt-3 pl-6 border-l-2 border-rose-200 space-y-2 text-xs text-gray-600">
                        <div class="flex justify-between items-center py-0.5">
                            <span>• 5 Langkah memodelkan & kamus kata cerita ke operasi aljabar</span>
                            <span class="px-2 py-0.5 rounded bg-rose-100 text-rose-800 font-bold text-[10px]">TP 5</span>
                        </div>
                        <div class="flex justify-between items-center py-0.5">
                            <span>• Pemodelan jarak Wisnu (<span class="font-math">5.000 − 15t</span>), tinggi keluarga Linda, dan uji kewajaran nilai variabel</span>
                            <span class="px-2 py-0.5 rounded bg-rose-100 text-rose-800 font-bold text-[10px]">TP 5</span>
                        </div>
                        <div class="flex justify-between items-center py-0.5">
                            <span>• Teka-teki sulap bilangan hasil selalu 3 & komparator tarif ojol (Gogo, Gaga, Gugu)</span>
                            <span class="px-2 py-0.5 rounded bg-rose-100 text-rose-800 font-bold text-[10px]">TP 5</span>
                        </div>
                        <div class="flex justify-between items-center py-0.5 font-semibold text-rose-700">
                            <span>• Kuis Latihan Sub-Bab 4 (4 Soal: K4.1 - K4.4) dengan Line-by-Line & Hint AI</span>
                            <span class="px-2 py-0.5 rounded bg-rose-600 text-white font-bold text-[10px]">Kuis 4</span>
                        </div>
                    </div>
                </details>
            </div>
        </div>

        <!-- Heading Daftar Sub-Bab -->
        <h3 class="text-lg font-bold text-gray-800 mb-5">Sub-Bab Materi & Kuis Latihan</h3>

        <!-- Grid 4 Sub-Bab -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            
            <!-- Sub-Bab 1 -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 border-t-4 border-t-blue-500 flex flex-col justify-between">
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-xs text-blue-600 bg-blue-50 px-2.5 py-1 rounded-md font-semibold">
                            <i class="fas fa-check mr-1.5 text-[10px]"></i> Unit 1 • TP 1-3
                        </span>
                        <span class="text-[11px] font-bold text-gray-400">4 Soal Latihan</span>
                    </div>
                    <p class="text-gray-400 text-xs mb-1 font-medium">Sub-Bab 1</p>
                    <h4 class="text-lg font-bold text-gray-800 mb-2">Mengenal Huruf dalam Matematika</h4>
                    <p class="text-xs text-gray-500 mb-6 leading-relaxed">
                        Mengenal variabel sebagai "kotak kosong", pola korek api (<span class="font-math">1 + 3n</span>), suku, koefisien, konstanta, dan substitusi nilai.
                    </p>
                </div>
                <a href="/materi?subbab=1" class="text-xs font-semibold text-blue-600 hover:text-blue-800 transition flex items-center justify-between pt-4 border-t border-gray-100">
                    <span>Buka Materi & Latihan</span>
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>

            <!-- Sub-Bab 2 -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 border-t-4 border-t-purple-500 flex flex-col justify-between">
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-xs text-purple-600 bg-purple-50 px-2.5 py-1 rounded-md font-semibold">
                            <i class="fas fa-check mr-1.5 text-[10px]"></i> Unit 2 • TP 4
                        </span>
                        <span class="text-[11px] font-bold text-gray-400">4 Soal Latihan</span>
                    </div>
                    <p class="text-gray-400 text-xs mb-1 font-medium">Sub-Bab 2</p>
                    <h4 class="text-lg font-bold text-gray-800 mb-2">Suku Sejenis</h4>
                    <p class="text-xs text-gray-500 mb-6 leading-relaxed">
                        Kaidah suku sejenis, analogi nama barang apel & jeruk, menyederhanakan suku banyak, dan operasi koefisien pecahan (<span class="font-math">2/3 a + 1/4 a</span>).
                    </p>
                </div>
                <a href="/materi?subbab=2" class="text-xs font-semibold text-purple-600 hover:text-purple-800 transition flex items-center justify-between pt-4 border-t border-gray-100">
                    <span>Buka Materi & Latihan</span>
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>

            <!-- Sub-Bab 3 -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 border-t-4 border-t-teal-500 flex flex-col justify-between">
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-xs text-teal-600 bg-teal-50 px-2.5 py-1 rounded-md font-semibold">
                            <i class="fas fa-check mr-1.5 text-[10px]"></i> Unit 3 • TP 4
                        </span>
                        <span class="text-[11px] font-bold text-gray-400">4 Soal Latihan</span>
                    </div>
                    <p class="text-gray-400 text-xs mb-1 font-medium">Sub-Bab 3</p>
                    <h4 class="text-lg font-bold text-gray-800 mb-2">Sifat Distributif & Faktor</h4>
                    <p class="text-xs text-gray-500 mb-6 leading-relaxed">
                        Membuktikan rumus ekuivalen ubin kolam (<span class="font-math">4s + 4 = 4(s + 1)</span>), sifat distributif, bentuk jabaran vs faktor, dan operasi tanda minus.
                    </p>
                </div>
                <a href="/materi?subbab=3" class="text-xs font-semibold text-teal-600 hover:text-teal-800 transition flex items-center justify-between pt-4 border-t border-gray-100">
                    <span>Buka Materi & Latihan</span>
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>

            <!-- Sub-Bab 4 -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 border-t-4 border-t-rose-500 flex flex-col justify-between">
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-xs text-rose-600 bg-rose-50 px-2.5 py-1 rounded-md font-semibold">
                            <i class="fas fa-check mr-1.5 text-[10px]"></i> Unit 4 • TP 5
                        </span>
                        <span class="text-[11px] font-bold text-gray-400">4 Soal Latihan</span>
                    </div>
                    <p class="text-gray-400 text-xs mb-1 font-medium">Sub-Bab 4</p>
                    <h4 class="text-lg font-bold text-gray-800 mb-2">Pemodelan Aljabar</h4>
                    <p class="text-xs text-gray-500 mb-6 leading-relaxed">
                        Pemodelan jarak Wisnu (<span class="font-math">5.000 − 15t</span>), keluarga Linda, batas kewajaran berat buah (<span class="font-math">t > 7</span>), teka-teki bilangan, dan tarif ojek online.
                    </p>
                </div>
                <a href="/materi?subbab=4" class="text-xs font-semibold text-rose-600 hover:text-rose-800 transition flex items-center justify-between pt-4 border-t border-gray-100">
                    <span>Buka Materi & Latihan</span>
                    <i class="fas fa-arrow-right"></i>
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