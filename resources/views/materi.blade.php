<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materi Pembelajaran - AljabarLearn</title>
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
                <a href="/dashboard" class="w-full text-left flex items-center justify-between px-3.5 py-2.5 rounded-xl border border-transparent hover:bg-gray-100 text-gray-700 transition text-xs font-semibold">
                    <div class="flex items-center gap-2.5">
                        <i class="fas fa-th-large text-sm text-blue-600"></i>
                        <span class="font-bold text-sm">Dashboard</span>
                    </div>
                    <i class="fas fa-arrow-right text-xs opacity-50"></i>
                </a>
            </div>

            <!-- 2. MENU MATERI SUB-BAB 1 - 4 DI BAWAH DASHBOARD -->
            <div class="mb-6">
                <h3 class="text-xs font-bold text-gray-400 mb-2 tracking-wider uppercase">MATERI PEMBELAJARAN</h3>
                <div class="space-y-1.5" id="navSubbabs">
                    
                    <button onclick="activatePanel('1')" id="navBtn1" class="w-full text-left flex items-center justify-between px-3 py-2.5 rounded-xl border transition text-xs font-semibold bg-blue-50 text-blue-700 border-blue-200 shadow-sm">
                        <div>
                            <div class="font-bold text-xs">Sub-Bab 1</div>
                            <div class="text-[11px] opacity-75 font-normal">Suku & Koefisien</div>
                        </div>
                        <i class="fas fa-chevron-right text-xs"></i>
                    </button>

                    <button onclick="activatePanel('2')" id="navBtn2" class="w-full text-left flex items-center justify-between px-3 py-2.5 rounded-xl border border-transparent hover:bg-gray-100 text-gray-600 transition text-xs font-semibold">
                        <div>
                            <div class="font-bold text-xs">Sub-Bab 2</div>
                            <div class="text-[11px] opacity-75 font-normal">Operasi Aljabar</div>
                        </div>
                        <i class="fas fa-chevron-right text-xs"></i>
                    </button>

                    <button onclick="activatePanel('3')" id="navBtn3" class="w-full text-left flex items-center justify-between px-3 py-2.5 rounded-xl border border-transparent hover:bg-gray-100 text-gray-600 transition text-xs font-semibold">
                        <div>
                            <div class="font-bold text-xs">Sub-Bab 3</div>
                            <div class="text-[11px] opacity-75 font-normal">Pemodelan Aljabar</div>
                        </div>
                        <i class="fas fa-chevron-right text-xs"></i>
                    </button>

                    <button onclick="activatePanel('4')" id="navBtn4" class="w-full text-left flex items-center justify-between px-3 py-2.5 rounded-xl border border-transparent hover:bg-gray-100 text-gray-600 transition text-xs font-semibold">
                        <div>
                            <div class="font-bold text-xs">Sub-Bab 4</div>
                            <div class="text-[11px] opacity-75 font-normal">Sifat & Persamaan</div>
                        </div>
                        <i class="fas fa-chevron-right text-xs"></i>
                    </button>

                </div>
            </div>

            <!-- 3. MENU UJIAN / EVALUASI (TERSENDIRI DI BAWAH MATERI) -->
            <div>
                <h3 class="text-xs font-bold text-gray-400 mb-2 tracking-wider uppercase">UJIAN & EVALUASI</h3>
                <button onclick="activatePanel('evaluasi')" id="navBtnEvaluasi" class="w-full text-left bg-blue-600 hover:bg-blue-700 text-white px-3.5 py-3 rounded-xl transition block shadow-sm">
                    <div class="font-bold text-sm flex items-center justify-between">
                        <span>Evaluasi Akhir</span>
                        <i class="fas fa-arrow-right text-xs"></i>
                    </div>
                    <div class="text-xs opacity-90 mt-0.5">7 Soal Kuis Mandiri</div>
                </button>
            </div>
        </div>

        <!-- Tombol Landing Page di Bawah Navbar -->
        <div class="p-6 border-t border-gray-100">
            <a href="/" class="flex items-center text-gray-500 hover:text-blue-600 text-xs font-medium transition">
                <i class="fas fa-home mr-2.5 text-blue-600"></i>
                Halaman Utama (Landing)
            </a>
        </div>
    </aside>

    <!-- Konten Utama Materi (Tidak fixed, dapat di-scroll) -->
    <main class="flex-1 ml-64 p-8 min-h-screen">
        <div class="bg-white rounded-3xl p-8 sm:p-10 shadow-sm border border-gray-100 max-w-4xl mx-auto border-t-4 border-t-blue-500">

            <!-- ======================================================== -->
            <!-- SUB-BAB 1: SUKU & KOEFISIEN (TP 1, TP 2, TP 3)           -->
            <!-- ======================================================== -->
            <section id="panelSubbab1" class="space-y-8">
                <div>
                    <div class="flex items-center text-xs text-blue-600 bg-blue-50 px-3 py-1.5 rounded-md w-max mb-4 font-semibold border border-blue-100">
                        Sub-Bab 1 • TP 1, TP 2, TP 3
                    </div>
                    <h2 class="text-4xl font-bold text-gray-800 mb-2">Suku & Koefisien</h2>
                    <p class="text-sm text-gray-500">Mengenal unsur-unsur dasar bentuk aljabar, simulasi pola batang korek api, dan substitusi nilai variabel.</p>
                </div>

                <div class="text-gray-600 leading-relaxed space-y-4 text-base">
                    <p>
                        Bentuk aljabar terdiri dari unsur-unsur yang disebut <strong>suku</strong>. Setiap suku dipisahkan oleh tanda operasi hitung penjumlahan (+) atau pengurangan (-).
                    </p>

                    <!-- Contoh Visual 3x + 5y - 7 Asli & 1 + 3n -->
                    <div class="bg-blue-50 p-6 rounded-2xl border border-blue-100 my-6 text-center space-y-3">
                        <span class="text-xs font-bold text-blue-600 uppercase tracking-wider block">Bentuk Aljabar:</span>
                        <div class="text-3xl sm:text-4xl font-bold text-blue-800 tracking-wider">
                            3x + 5y - 7
                        </div>
                        <div class="grid grid-cols-3 gap-2 text-xs pt-3 text-blue-800 border-t border-blue-200/60 max-w-sm mx-auto">
                            <div>Suku ke-1: <strong class="text-blue-900 block font-mono text-sm">3x</strong></div>
                            <div>Suku ke-2: <strong class="text-blue-900 block font-mono text-sm">5y</strong></div>
                            <div>Suku ke-3: <strong class="text-blue-900 block font-mono text-sm">-7</strong></div>
                        </div>
                    </div>

                    <h3 class="text-2xl font-bold text-gray-800 mt-8 mb-4">Mengenal Unsur-Unsur Bentuk Aljabar</h3>
                    <ul class="list-disc list-inside space-y-3 bg-gray-50 p-6 rounded-2xl border border-gray-100 text-sm">
                        <li><strong>Variabel:</strong> Simbol huruf pengganti kuantitas berubah-ubah atau tak diketahui (<span class="font-math">x, y, n, s, L</span>).</li>
                        <li><strong>Koefisien:</strong> Angka pengali di depan variabel. Angka <strong>3</strong> adalah koefisien dari <span class="font-math">x</span>, dan <strong>5</strong> adalah koefisien dari <span class="font-math">y</span>.</li>
                        <li><strong>Konstanta:</strong> Angka bernilai tetap yang berdiri sendiri tanpa variabel (angka <strong>-7</strong>).</li>
                        <li><strong>Aturan Penulisan:</strong> Perkalian variabel dengan angka ditulis berdempetan di depan variabel: <span class="font-math">n × 3 = 3n</span>.</li>
                    </ul>
                </div>

                <!-- SIMULASI KOREK API NYOMAN & ARIEF (Eksplorasi 4.1) -->
                <div class="p-6 rounded-2xl bg-white border border-gray-200 shadow-sm space-y-4">
                    <div class="flex items-center justify-between border-b border-gray-100 pb-3">
                        <div class="flex items-center gap-2">
                            <span class="w-7 h-7 rounded-lg bg-blue-100 text-blue-700 flex items-center justify-center text-xs font-bold">4.1</span>
                            <h4 class="font-bold text-gray-800 text-base">Eksplorasi Pola Korek Api (Nyoman & Arief)</h4>
                        </div>
                        <span class="text-xs text-blue-600 font-semibold bg-blue-50 px-2.5 py-1 rounded-md">Simulasi Interaktif</span>
                    </div>

                    <p class="text-xs text-gray-600 leading-relaxed">
                        Arief menghitung bahwa setiap persegi baru hanya butuh 3 batang tambahan karena 1 sisi menyatu dengan persegi sebelumnya. 
                        Rumus umum: <span class="font-math font-bold text-blue-700">1 + 3n</span>.
                    </p>

                    <!-- Slider -->
                    <div class="space-y-1.5 bg-gray-50 p-4 rounded-xl border border-gray-200">
                        <div class="flex items-center justify-between text-xs font-bold text-gray-700">
                            <span>Banyak Persegi (<span class="font-math text-blue-600">n</span>):</span>
                            <span id="korekVal" class="text-base text-blue-600 font-mono">4</span>
                        </div>
                        <input type="range" id="korekRange" min="1" max="15" value="4" oninput="updateKorek()" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer accent-blue-600">
                    </div>

                    <!-- Visual Kanvas Korek Api -->
                    <div class="p-4 bg-gray-50 rounded-xl border border-gray-200 overflow-x-auto text-center">
                        <svg id="korekSvgEl" class="h-20 mx-auto" xmlns="http://www.w3.org/2000/svg"></svg>
                    </div>

                    <!-- Kolom A, B, C Arief -->
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 text-center text-xs">
                        <div class="p-3 rounded-xl bg-gray-50 border border-gray-200">
                            <span class="text-[10px] text-gray-400 uppercase font-bold block">Kolom A (Tetap)</span>
                            <span class="text-base font-bold text-gray-800">1</span>
                            <span class="text-[10px] text-gray-500 block">Batang Pertama</span>
                        </div>
                        <div class="p-3 rounded-xl bg-gray-50 border border-gray-200">
                            <span class="text-[10px] text-gray-400 uppercase font-bold block">Kolom B (Berubah)</span>
                            <span id="korekColBVal" class="text-base font-bold text-blue-600 font-mono">4</span>
                            <span class="text-[10px] text-gray-500 block">Banyak Persegi (<span class="font-math">n</span>)</span>
                        </div>
                        <div class="p-3 rounded-xl bg-gray-50 border border-gray-200">
                            <span class="text-[10px] text-gray-400 uppercase font-bold block">Kolom C (Tetap)</span>
                            <span class="text-base font-bold text-gray-800">3</span>
                            <span class="text-[10px] text-gray-500 block">Tambahan per Sisi</span>
                        </div>
                        <div class="p-3 rounded-xl bg-blue-50 border border-blue-200 text-blue-900">
                            <span class="text-[10px] text-blue-600 uppercase font-bold block">Bentuk Aljabar</span>
                            <span id="korekTotalVal" class="text-base font-bold text-blue-700 font-mono">13</span>
                            <span class="text-[10px] text-blue-600 block">1 + 3(4)</span>
                        </div>
                    </div>

                    <div class="pt-2 flex flex-wrap items-center gap-2 text-xs">
                        <span class="font-semibold text-gray-700">Tantangan Nyoman:</span>
                        <button onclick="tebakKorek(5)" class="px-2.5 py-1 rounded bg-blue-50 text-blue-700 hover:bg-blue-100 border border-blue-200 font-medium">5 Persegi?</button>
                        <button onclick="tebakKorek(10)" class="px-2.5 py-1 rounded bg-blue-50 text-blue-700 hover:bg-blue-100 border border-blue-200 font-medium">10 Persegi?</button>
                        <button onclick="tebakKorek(33)" class="px-2.5 py-1 rounded bg-blue-50 text-blue-700 hover:bg-blue-100 border border-blue-200 font-medium">33 Persegi?</button>
                    </div>
                    <div id="korekNotice" class="hidden p-3 rounded-xl bg-blue-50 text-blue-800 text-xs font-medium border border-blue-200"></div>
                </div>

                <!-- Konteks Tiket Liburan & Sembako -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs">
                    <div class="p-4 rounded-xl bg-gray-50 border border-gray-200 space-y-2">
                        <div class="font-bold text-gray-800 text-sm flex items-center gap-1.5">
                            <i class="fas fa-ticket-alt text-blue-600"></i> Tiket Liburan Rahmat (Hal. 133)
                        </div>
                        <p class="text-gray-600">Total harga tiket masuk: <span class="font-math font-bold text-blue-700 text-sm">3a + 2b</span></p>
                        <ul class="space-y-1 text-gray-600">
                            <li>• <span class="font-math">a</span> = harga tiket anak (membawa <strong>3 anak</strong>).</li>
                            <li>• <span class="font-math">b</span> = harga tiket dewasa (membawa <strong>2 dewasa</strong>).</li>
                            <li>• Parkir tetap Rp25.000: <span class="font-math font-bold text-blue-700">3a + 2b + 25.000</span>.</li>
                        </ul>
                    </div>

                    <div class="p-4 rounded-xl bg-gray-50 border border-gray-200 space-y-2">
                        <div class="font-bold text-gray-800 text-sm flex items-center gap-1.5">
                            <i class="fas fa-calculator text-blue-600"></i> Substitusi Nilai (Latihan 4.1)
                        </div>
                        <p class="text-gray-600">Jika nilai <span class="font-math font-bold">m = 3</span>, hitung nilai ekspresi:</p>
                        <ul class="space-y-1 text-gray-600 font-mono">
                            <li>• m + 2 = 3 + 2 = <strong>5</strong></li>
                            <li>• -2m + 7 = -2(3) + 7 = <strong>1</strong></li>
                            <li>• -3m - 1 = -3(3) - 1 = <strong>-10</strong></li>
                            <li>• 10 - 5m = 10 - 5(3) = <strong>-5</strong></li>
                        </ul>
                    </div>
                </div>
            </section>

            <!-- ======================================================== -->
            <!-- SUB-BAB 2: OPERASI ALJABAR (TP 4)                        -->
            <!-- ======================================================== -->
            <section id="panelSubbab2" class="hidden space-y-8">
                <div>
                    <div class="flex items-center text-xs text-blue-600 bg-blue-50 px-3 py-1.5 rounded-md w-max mb-4 font-semibold border border-blue-100">
                        Sub-Bab 2 • TP 4
                    </div>
                    <h2 class="text-4xl font-bold text-gray-800 mb-2">Operasi Aljabar</h2>
                    <p class="text-sm text-gray-500">Bentuk Ekuivalen Ubin Kolam Renang, Sifat Distributif (Faktor vs Jabaran), dan Kaidah Suku Sejenis.</p>
                </div>

                <!-- SIMULASI UBIN KOLAM RENANG (Eksplorasi 4.2) -->
                <div class="p-6 rounded-2xl bg-white border border-gray-200 shadow-sm space-y-4">
                    <div class="flex items-center justify-between border-b border-gray-100 pb-3">
                        <div class="flex items-center gap-2">
                            <span class="w-7 h-7 rounded-lg bg-blue-100 text-blue-700 flex items-center justify-center text-xs font-bold">4.2</span>
                            <h4 class="font-bold text-gray-800 text-base">Penguji Bentuk Ekuivalen Ubin Kolam Renang</h4>
                        </div>
                        <span class="text-xs text-blue-600 font-semibold bg-blue-50 px-2.5 py-1 rounded-md">Simulasi Interaktif</span>
                    </div>

                    <p class="text-xs text-gray-600 leading-relaxed">
                        Kolam persegi dengan panjang sisi <span class="font-math">s</span> meter dikelilingi ubin selebar 1 m. 
                        Uji 5 bentuk aljabar yang diajukan Rani dan rekan kerjanya!
                    </p>

                    <!-- Slider Sisi Kolam -->
                    <div class="space-y-1.5 bg-gray-50 p-4 rounded-xl border border-gray-200">
                        <div class="flex items-center justify-between text-xs font-bold text-gray-700">
                            <span>Ukuran Sisi Kolam (<span class="font-math text-blue-600">s</span> meter):</span>
                            <span id="poolVal" class="text-base text-blue-600 font-mono">10 m</span>
                        </div>
                        <input type="range" id="poolRange" min="2" max="20" value="10" oninput="updatePool()" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer accent-blue-600">
                    </div>

                    <!-- 5 Card Rekan Kerja -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 text-xs">
                        <div class="p-3.5 rounded-xl bg-blue-50 border border-blue-200">
                            <div class="flex items-center justify-between mb-1">
                                <strong class="text-blue-900">Rani</strong>
                                <span class="text-[10px] font-bold text-emerald-600">Ekuivalen ✓</span>
                            </div>
                            <div class="font-math text-sm font-bold text-blue-800">4s + 4</div>
                            <div class="text-[11px] text-gray-500 mt-1">4 sisi + 4 sudut</div>
                            <div class="mt-2 font-bold text-blue-700 font-mono text-sm">Hasil: <span id="resRani">44</span></div>
                        </div>

                        <div class="p-3.5 rounded-xl bg-blue-50 border border-blue-200">
                            <div class="flex items-center justify-between mb-1">
                                <strong class="text-blue-900">Joko</strong>
                                <span class="text-[10px] font-bold text-emerald-600">Ekuivalen ✓</span>
                            </div>
                            <div class="font-math text-sm font-bold text-blue-800">4(s + 1)</div>
                            <div class="text-[11px] text-gray-500 mt-1">Bentuk faktor distributif</div>
                            <div class="mt-2 font-bold text-blue-700 font-mono text-sm">Hasil: <span id="resJoko">44</span></div>
                        </div>

                        <div class="p-3.5 rounded-xl bg-blue-50 border border-blue-200">
                            <div class="flex items-center justify-between mb-1">
                                <strong class="text-blue-900">Wisnu</strong>
                                <span class="text-[10px] font-bold text-emerald-600">Ekuivalen ✓</span>
                            </div>
                            <div class="font-math text-sm font-bold text-blue-800">s + s + s + s + 4</div>
                            <div class="text-[11px] text-gray-500 mt-1">4 sisi lepas + 4 pojok</div>
                            <div class="mt-2 font-bold text-blue-700 font-mono text-sm">Hasil: <span id="resWisnu">44</span></div>
                        </div>

                        <div class="p-3.5 rounded-xl bg-blue-50 border border-blue-200">
                            <div class="flex items-center justify-between mb-1">
                                <strong class="text-blue-900">Ayu</strong>
                                <span class="text-[10px] font-bold text-emerald-600">Ekuivalen ✓</span>
                            </div>
                            <div class="font-math text-sm font-bold text-blue-800">2(s + 2) + 2s</div>
                            <div class="text-[11px] text-gray-500 mt-1">2 sisi panjang + 2 sisi dalam</div>
                            <div class="mt-2 font-bold text-blue-700 font-mono text-sm">Hasil: <span id="resAyu">44</span></div>
                        </div>

                        <div class="p-3.5 rounded-xl bg-rose-50 border-2 border-rose-400 sm:col-span-2">
                            <div class="flex items-center justify-between mb-1">
                                <strong class="text-rose-900">Riska (Keliru!)</strong>
                                <span class="text-[10px] font-bold text-rose-700">TIDAK Ekuivalen ✗</span>
                            </div>
                            <div class="font-math text-sm font-bold text-rose-800">4(s + 2) = 4s + 8</div>
                            <div class="text-[11px] text-rose-700 mt-1">
                                <strong>Analisis:</strong> Riska menghitung 4 sudut sebanyak dua kali sehingga nilainya selalu lebih 4 ubin!
                            </div>
                            <div class="mt-2 font-bold text-rose-700 font-mono text-sm">Hasil: <span id="resRiska">48</span> (Selalu kelebihan 4)</div>
                        </div>
                    </div>
                </div>

                <!-- Sifat Distributif & Kaidah Suku Sejenis -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs">
                    <div class="p-4 rounded-xl bg-gray-50 border border-gray-200 space-y-2">
                        <strong class="text-gray-800 block text-sm font-bold">Sifat Distributif (Faktor vs Jabaran)</strong>
                        <p class="text-gray-600">Menjabarkan: mengalikan suku di luar kurung ke dalam:</p>
                        <div class="font-math font-bold text-blue-800 bg-white p-2.5 rounded border border-gray-200">
                            3(x + 4) = 3x + 12
                        </div>
                        <p class="text-gray-600 pt-1">Memfaktorkan: mencari faktor persekutuan terbesar:</p>
                        <div class="font-math font-bold text-blue-800 bg-white p-2.5 rounded border border-gray-200">
                            6x + 9 = 3(2x + 3)
                        </div>
                    </div>

                    <div class="p-4 rounded-xl bg-gray-50 border border-gray-200 space-y-2">
                        <strong class="text-gray-800 block text-sm font-bold">Kaidah Suku Sejenis & Analogi Buah</strong>
                        <p class="text-gray-600">Suku sejenis memiliki variabel sama, dapat disederhanakan:</p>
                        <div class="font-math font-bold text-blue-800 bg-white p-2.5 rounded border border-gray-200">
                            5x + 7x = (5 + 7)x = 12x
                        </div>
                        <p class="text-gray-500 text-[11px] pt-1">
                            Suku tak sejenis: <span class="font-math font-bold text-rose-600">2x + 3y ≠ 5xy</span>. 
                            2 apel ditambah 3 jeruk tetap bernilai 2 apel dan 3 jeruk, tidak dapat digabung!
                        </p>
                    </div>
                </div>
            </section>

            <!-- ======================================================== -->
            <!-- SUB-BAB 3: PEMODELAN ALJABAR (TP 5)                      -->
            <!-- ======================================================== -->
            <section id="panelSubbab3" class="hidden space-y-8">
                <div>
                    <div class="flex items-center text-xs text-blue-600 bg-blue-50 px-3 py-1.5 rounded-md w-max mb-4 font-semibold border border-blue-100">
                        Sub-Bab 3 • TP 5
                    </div>
                    <h2 class="text-4xl font-bold text-gray-800 mb-2">Pemodelan Aljabar</h2>
                    <p class="text-sm text-gray-500">Pemodelan Masalah Jarak-Waktu Wisnu, Kasus Tinggi Badan Linda, dan Uji Batas Kewajaran Nilai Variabel.</p>
                </div>

                <!-- SIMULASI JARAK TEMPUH WISNU (Eksplorasi 4.4) -->
                <div class="p-6 rounded-2xl bg-white border border-gray-200 shadow-sm space-y-4">
                    <div class="flex items-center justify-between border-b border-gray-100 pb-3">
                        <div class="flex items-center gap-2">
                            <span class="w-7 h-7 rounded-lg bg-blue-100 text-blue-700 flex items-center justify-center text-xs font-bold">4.4</span>
                            <h4 class="font-bold text-gray-800 text-base">Jarak dan Waktu Wisnu ke Sekolah</h4>
                        </div>
                        <span class="text-xs text-blue-600 font-semibold bg-blue-50 px-2.5 py-1 rounded-md">Simulasi Interaktif</span>
                    </div>

                    <p class="text-xs text-gray-600 leading-relaxed">
                        Jarak rumah ke sekolah 5.000 meter. Motor melaju 15 m/detik. Geser waktu <span class="font-math">t</span> (detik) untuk memantau perjalanan!
                    </p>

                    <!-- Slider Waktu t -->
                    <div class="space-y-1.5 bg-gray-50 p-4 rounded-xl border border-gray-200">
                        <div class="flex items-center justify-between text-xs font-bold text-gray-700">
                            <span>Waktu Perjalanan (<span class="font-math text-blue-600">t</span> detik):</span>
                            <div>
                                <span id="tripSec" class="text-base text-blue-600 font-mono">120</span> detik
                                <span id="tripMin" class="text-[11px] text-gray-400 font-normal">(2 Menit)</span>
                            </div>
                        </div>
                        <input type="range" id="tripRange" min="0" max="333" value="120" oninput="updateTrip()" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer accent-blue-600">
                    </div>

                    <div class="space-y-1 pt-1">
                        <div class="flex justify-between text-[11px] text-gray-400 font-semibold">
                            <span>Rumah (0 m)</span>
                            <span>Sekolah (5.000 m)</span>
                        </div>
                        <div class="w-full bg-gray-100 rounded-full h-2.5 overflow-hidden">
                            <div id="tripBarEl" class="bg-blue-600 h-2.5 rounded-full transition-all duration-150" style="width: 36%;"></div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-xs pt-2">
                        <div class="p-3.5 rounded-xl bg-blue-50 border border-blue-200">
                            <span class="text-[11px] text-blue-700 block font-semibold">Jarak Ditempuh:</span>
                            <div class="font-math text-base font-bold text-blue-900">
                                15t = <span id="tripDistDone" class="font-mono">1.800</span> m
                            </div>
                        </div>
                        <div class="p-3.5 rounded-xl bg-gray-50 border border-gray-200">
                            <span class="text-[11px] text-gray-500 block font-semibold">Sisa Jarak:</span>
                            <div class="font-math text-base font-bold text-gray-800">
                                5.000 - 15t = <span id="tripDistLeft" class="font-mono">3.200</span> m
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Kasus Keluarga Linda & Kewajaran Berat Buah -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs">
                    <div class="p-4 rounded-xl bg-gray-50 border border-gray-200 space-y-2">
                        <strong class="text-gray-800 block text-sm font-bold">Tinggi Keluarga Linda (Hal. 149)</strong>
                        <p class="text-gray-600">Bayi Linda tinggi <span class="font-math">L</span> cm:</p>
                        <ul class="space-y-1 text-gray-600">
                            <li>• Endah (kakak perempuan): <span class="font-math font-bold">2L</span></li>
                            <li>• Rizki (kakak laki-laki): <span class="font-math font-bold">2L + 13</span></li>
                            <li>• Ibu: <span class="font-math font-bold">4L - 30</span> (30 cm lebih pendek dari 4 kali Linda)</li>
                        </ul>
                    </div>

                    <div class="p-4 rounded-xl bg-gray-50 border border-gray-200 space-y-2">
                        <strong class="text-gray-800 block text-sm font-bold">Uji Kewajaran Nilai Variabel (Hal. 148)</strong>
                        <p class="text-gray-600">Jeruk = <span class="font-math">t</span> kg, Anggur = <span class="font-math">t - 7</span> kg.</p>
                        <div class="p-2.5 rounded bg-rose-50 border border-rose-200 text-rose-800 text-[11px]">
                            Jika $t = 3$ kg, maka berat anggur $3 - 7 = -4$ kg (berat negatif mustahil). Nilai variabel harus dibatasi syarat kewajaran: <span class="font-math font-bold">t > 7</span> kg.
                        </div>
                    </div>
                </div>
            </section>

            <!-- ======================================================== -->
            <!-- SUB-BAB 4: SIFAT & PERSAMAAN LINEAR (TP 4, TP 5)        -->
            <!-- ======================================================== -->
            <section id="panelSubbab4" class="hidden space-y-8">
                <div>
                    <div class="flex items-center text-xs text-blue-600 bg-blue-50 px-3 py-1.5 rounded-md w-max mb-4 font-semibold border border-blue-100">
                        Sub-Bab 4 • Sifat & Penerapan Aljabar
                    </div>
                    <h2 class="text-4xl font-bold text-gray-800 mb-2">Sifat & Persamaan Linear</h2>
                    <p class="text-sm text-gray-500">Teka-Teki Sulap Bilangan, Komparator Tarif Ojol Bayu, dan Perencanaan Modal Usaha.</p>
                </div>

                <!-- SULAP TEKA-TEKI BILANGAN (Hal. 150) -->
                <div class="p-6 rounded-2xl bg-white border border-gray-200 shadow-sm space-y-4">
                    <div class="flex items-center gap-2 border-b border-gray-100 pb-3">
                        <i class="fas fa-wand-magic-sparkles text-blue-600"></i>
                        <h4 class="font-bold text-gray-800 text-base">Sulap Teka-Teki Bilangan Aljabar (Hal. 150)</h4>
                    </div>

                    <p class="text-xs text-gray-600 leading-relaxed">
                        Masukkan bilangan berapa pun yang kamu sukai. Saksikan bagaimana aljabar membuktikan hasilnya selalu bernilai 3!
                    </p>

                    <div class="flex items-center gap-3">
                        <input type="number" id="magicNum" value="7" class="w-32 px-3 py-2 rounded-xl border border-gray-300 font-mono font-bold text-center text-sm focus:border-blue-600 outline-none">
                        <button onclick="calcMagic()" class="px-4 py-2 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs transition">
                            Jalankan Trik
                        </button>
                    </div>

                    <div class="grid grid-cols-2 sm:grid-cols-5 gap-2 text-xs text-center font-mono">
                        <div class="p-2.5 rounded-lg bg-gray-50 border border-gray-200">
                            <span class="text-gray-400 block text-[10px] font-sans">1. Awal (n)</span>
                            <span id="st1" class="font-bold text-gray-800">7</span>
                        </div>
                        <div class="p-2.5 rounded-lg bg-gray-50 border border-gray-200">
                            <span class="text-gray-400 block text-[10px] font-sans">2. Kali 2</span>
                            <span id="st2" class="font-bold text-gray-800">14</span>
                        </div>
                        <div class="p-2.5 rounded-lg bg-gray-50 border border-gray-200">
                            <span class="text-gray-400 block text-[10px] font-sans">3. Tambah 6</span>
                            <span id="st3" class="font-bold text-gray-800">20</span>
                        </div>
                        <div class="p-2.5 rounded-lg bg-gray-50 border border-gray-200">
                            <span class="text-gray-400 block text-[10px] font-sans">4. Bagi 2</span>
                            <span id="st4" class="font-bold text-gray-800">10</span>
                        </div>
                        <div class="p-2.5 rounded-lg bg-blue-50 border border-blue-300 text-blue-900 col-span-2 sm:col-span-1">
                            <span class="text-blue-600 block text-[10px] font-sans font-bold">5. Kurang n</span>
                            <span id="st5" class="text-base font-bold text-blue-700">3</span>
                        </div>
                    </div>
                </div>

                <!-- KOMPARATOR OJOL (Hal. 152) -->
                <div class="p-6 rounded-2xl bg-white border border-gray-200 shadow-sm space-y-4">
                    <div class="flex items-center gap-2 border-b border-gray-100 pb-3">
                        <i class="fas fa-motorcycle text-blue-600"></i>
                        <h4 class="font-bold text-gray-800 text-base">Literasi Finansial: Tarif Ojek Online Bayu (Hal. 152)</h4>
                    </div>

                    <div class="space-y-1.5 bg-gray-50 p-4 rounded-xl border border-gray-200">
                        <div class="flex items-center justify-between text-xs font-bold text-gray-700">
                            <span>Jarak Perjalanan (<span class="font-math text-blue-600">x</span> km):</span>
                            <span id="ojolKmVal" class="text-base text-blue-600 font-mono">5 km</span>
                        </div>
                        <input type="range" id="ojolKmRange" min="1" max="25" value="5" oninput="updateOjol()" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer accent-blue-600">
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 text-xs">
                        <div id="cardGogo" class="p-3.5 rounded-xl bg-gray-50 border border-gray-200 space-y-1">
                            <strong class="text-gray-800 block">Gogo</strong>
                            <div class="font-math text-gray-500">5.000 + 1.500x</div>
                            <div id="costGogo" class="font-bold text-sm text-gray-800 font-mono pt-1">Rp12.500</div>
                        </div>

                        <div id="cardGaga" class="p-3.5 rounded-xl bg-gray-50 border border-gray-200 space-y-1">
                            <strong class="text-gray-800 block">Gaga</strong>
                            <div class="font-math text-gray-500">2.000x</div>
                            <div id="costGaga" class="font-bold text-sm text-gray-800 font-mono pt-1">Rp10.000</div>
                        </div>

                        <div id="cardGugu" class="p-3.5 rounded-xl bg-gray-50 border border-gray-200 space-y-1">
                            <strong class="text-gray-800 block">Gugu</strong>
                            <div class="font-math text-gray-500">3.000 + 1.800x</div>
                            <div id="costGugu" class="font-bold text-sm text-gray-800 font-mono pt-1">Rp12.000</div>
                        </div>
                    </div>

                    <div id="ojolAdvice" class="text-xs text-blue-700 bg-blue-50 p-3 rounded-xl border border-blue-100 font-medium"></div>
                </div>

                <!-- PENGAYAAN MODAL USAHA -->
                <div class="p-6 rounded-2xl bg-gray-50 border border-gray-200 space-y-4">
                    <div class="flex items-center gap-2 border-b border-gray-200 pb-3">
                        <i class="fas fa-coins text-blue-600"></i>
                        <h4 class="font-bold text-gray-800 text-base">Rencana Modal Usaha Rp5.000.000 (Hal. 157-158)</h4>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 text-xs">
                        <div class="space-y-1">
                            <label class="text-gray-600 font-bold block">Harga Jual per Produk (<span class="font-math">p</span>):</label>
                            <input type="number" id="bizPrice" value="15000" oninput="updateBiz()" class="w-full px-3 py-2 rounded-xl border border-gray-300 font-mono font-bold focus:border-blue-600 outline-none">
                        </div>
                        <div class="space-y-1">
                            <label class="text-gray-600 font-bold block">Biaya Bahan Baku (<span class="font-math">c</span>):</label>
                            <input type="number" id="bizCost" value="8000" oninput="updateBiz()" class="w-full px-3 py-2 rounded-xl border border-gray-300 font-mono font-bold focus:border-blue-600 outline-none">
                        </div>
                        <div class="space-y-1">
                            <label class="text-gray-600 font-bold block">Biaya Tetap Bulanan (<span class="font-math">F</span>):</label>
                            <input type="number" id="bizFixed" value="1400000" oninput="updateBiz()" class="w-full px-3 py-2 rounded-xl border border-gray-300 font-mono font-bold focus:border-blue-600 outline-none">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 text-xs pt-1">
                        <div class="p-3.5 rounded-xl bg-white border border-gray-200">
                            <span class="text-gray-500 block text-[11px]">Keuntungan per Unit ($p - c$):</span>
                            <span id="bizMarginVal" class="text-base font-bold text-emerald-600 font-mono">Rp7.000</span>
                        </div>
                        <div class="p-3.5 rounded-xl bg-white border border-gray-200">
                            <span class="text-gray-500 block text-[11px]">Titik Impas BEP ($F / (p - c)$):</span>
                            <span id="bizBepVal" class="text-base font-bold text-blue-600 font-mono">200 unit</span>
                        </div>
                        <div class="p-3.5 rounded-xl bg-white border border-gray-200">
                            <span class="text-gray-500 block text-[11px]">Estimasi Balik Modal:</span>
                            <span id="bizDaysVal" class="text-base font-bold text-gray-800 font-mono">~14 Hari (15 unit/hari)</span>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ======================================================== -->
            <!-- EVALUASI AKHIR: KUIS 7 SOAL (TERSENDIRI DI MENU UJIAN)   -->
            <!-- ======================================================== -->
            <section id="panelEvaluasi" class="hidden space-y-6">
                <div class="flex items-center justify-between border-b border-gray-100 pb-4">
                    <div>
                        <div class="flex items-center text-xs text-blue-600 bg-blue-50 px-3 py-1.5 rounded-md w-max mb-2 font-semibold border border-blue-100">
                            Ujian & Evaluasi Mandiri
                        </div>
                        <h2 class="text-3xl font-bold text-gray-800">Evaluasi Akhir Aljabar</h2>
                    </div>
                    <span id="qBadge" class="text-xs font-bold px-3 py-1.5 rounded-full bg-blue-50 text-blue-700 border border-blue-100">
                        Soal 1 dari 7
                    </span>
                </div>

                <!-- Box Soal -->
                <div id="boxQuiz" class="space-y-5">
                    <div class="w-full bg-gray-100 rounded-full h-2">
                        <div id="barQuiz" class="bg-blue-600 h-2 rounded-full transition-all duration-300" style="width: 14%;"></div>
                    </div>

                    <div class="p-6 rounded-2xl bg-gray-50 border border-gray-200 space-y-4">
                        <div class="flex items-center justify-between text-xs">
                            <span id="txtConcept" class="font-bold text-blue-600 bg-blue-100 px-2.5 py-0.5 rounded">TP 2</span>
                            <span id="txtStatus" class="text-gray-400">Pilih salah satu jawaban</span>
                        </div>

                        <h3 id="txtQuestion" class="text-base sm:text-lg font-bold text-gray-800 leading-relaxed">
                            Memuat soal...
                        </h3>

                        <!-- Opsi Jawaban -->
                        <div id="boxOptions" class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-2">
                            <!-- JS Injection -->
                        </div>

                        <!-- Kotak Pembahasan -->
                        <div id="boxExplanation" class="hidden p-4 rounded-xl text-xs sm:text-sm leading-relaxed border transition-all"></div>
                    </div>

                    <!-- Navigasi Kuis -->
                    <div class="flex items-center justify-between pt-2">
                        <button id="btnPrevQ" onclick="prevQ()" class="px-4 py-2 rounded-xl text-xs font-semibold text-gray-600 bg-gray-100 hover:bg-gray-200 transition disabled:opacity-30 disabled:pointer-events-none">
                            <i class="fas fa-arrow-left mr-1"></i> Sebelumnya
                        </button>
                        <button id="btnNextQ" onclick="nextQ()" class="px-5 py-2.5 rounded-xl text-xs font-bold bg-blue-600 hover:bg-blue-700 text-white transition shadow-sm">
                            Selanjutnya <i class="fas fa-arrow-right ml-1"></i>
                        </button>
                    </div>
                </div>

                <!-- Layar Skor Akhir -->
                <div id="boxResult" class="hidden text-center py-8 space-y-6">
                    <div class="w-16 h-16 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center text-3xl mx-auto shadow-inner">
                        <i id="iconRes" class="fas fa-trophy"></i>
                    </div>

                    <div class="space-y-2">
                        <h3 class="text-2xl font-bold text-gray-800">Evaluasi Selesai!</h3>
                        <div class="text-4xl font-extrabold text-blue-600 font-mono">
                            <span id="scoreVal">0</span> / 7
                        </div>
                        <p id="scoreMsg" class="text-sm text-gray-600 max-w-md mx-auto leading-relaxed"></p>
                    </div>

                    <div class="pt-2">
                        <button onclick="redoQuiz()" class="px-6 py-2.5 rounded-full bg-blue-600 hover:bg-blue-700 text-white font-bold text-sm shadow transition">
                            <i class="fas fa-rotate-right mr-2"></i> Ulangi Kuis
                        </button>
                    </div>
                </div>
            </section>

            <!-- Footer Atribusi Buku Resmi -->
            <div class="pt-8 mt-10 border-t border-gray-100 flex flex-col sm:flex-row items-center justify-between text-xs text-gray-400 gap-2">
                <span>Sumber: Buku Siswa Matematika SMP/MTs Kelas VII Bab 4 (Kemendikbudristek 2022)</span>
                <span>AljabarLearn • Media Pembelajaran SMP</span>
            </div>

        </div>
    </main>

    <!-- Script Sub-Bab, Simulasi, dan Kuis 7 Soal -->
    <script>
        // --- 1. PANEL NAVIGATION (SUB-BAB 1-4 & EVALUASI) ---
        function activatePanel(target) {
            // Panels list
            const panels = ['1', '2', '3', '4', 'evaluasi'];
            panels.forEach(p => {
                const el = document.getElementById(p === 'evaluasi' ? 'panelEvaluasi' : `panelSubbab${p}`);
                const btn = p === 'evaluasi' ? document.getElementById('navBtnEvaluasi') : document.getElementById(`navBtn${p}`);
                if (el) {
                    if (p === target) {
                        el.classList.remove('hidden');
                        if (btn) {
                            if (p === 'evaluasi') {
                                btn.className = 'w-full text-left bg-blue-700 text-white px-3.5 py-3 rounded-xl transition block shadow-md ring-2 ring-blue-300';
                            } else {
                                btn.className = 'w-full text-left flex items-center justify-between px-3 py-2.5 rounded-xl border transition text-xs font-semibold bg-blue-50 text-blue-700 border-blue-200 shadow-sm';
                            }
                        }
                    } else {
                        el.classList.add('hidden');
                        if (btn) {
                            if (p === 'evaluasi') {
                                btn.className = 'w-full text-left bg-blue-600 hover:bg-blue-700 text-white px-3.5 py-3 rounded-xl transition block shadow-sm';
                            } else {
                                btn.className = 'w-full text-left flex items-center justify-between px-3 py-2.5 rounded-xl border border-transparent hover:bg-gray-100 text-gray-600 transition text-xs font-semibold';
                            }
                        }
                    }
                }
            });
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        // URL parameter reader (?subbab=X)
        const params = new URLSearchParams(window.location.search);
        const initTarget = params.get('subbab') || '1';

        // --- 2. SIMULASI KOREK API ---
        function updateKorek() {
            const n = parseInt(document.getElementById('korekRange').value);
            document.getElementById('korekVal').textContent = n;
            document.getElementById('korekColBVal').textContent = n;
            const total = 1 + (n * 3);
            document.getElementById('korekTotalVal').textContent = total;

            drawKorekSvg(n);
        }

        function drawKorekSvg(n) {
            const svg = document.getElementById('korekSvgEl');
            svg.innerHTML = '';
            const size = 36;
            const startX = 15;
            const startY = 15;
            const width = startX * 2 + (n * size);
            svg.setAttribute('viewBox', `0 0 ${Math.max(width, 180)} 70`);
            svg.style.minWidth = `${Math.min(width, 600)}px`;

            function draw(x1, y1, x2, y2, head1 = true) {
                const g = document.createElementNS('http://www.w3.org/2000/svg', 'g');
                const line = document.createElementNS('http://www.w3.org/2000/svg', 'line');
                line.setAttribute('x1', x1);
                line.setAttribute('y1', y1);
                line.setAttribute('x2', x2);
                line.setAttribute('y2', y2);
                line.setAttribute('stroke', '#d97706');
                line.setAttribute('stroke-width', '3');
                line.setAttribute('stroke-linecap', 'round');
                g.appendChild(line);

                const c = document.createElementNS('http://www.w3.org/2000/svg', 'circle');
                c.setAttribute('cx', head1 ? x1 : x2);
                c.setAttribute('cy', head1 ? y1 : y2);
                c.setAttribute('r', '3.5');
                c.setAttribute('fill', '#ef4444');
                g.appendChild(c);

                svg.appendChild(g);
            }

            draw(startX, startY, startX, startY + size, true);
            for (let i = 0; i < n; i++) {
                const xl = startX + (i * size);
                const xr = xl + size;
                draw(xl, startY, xr, startY, false);
                draw(xl, startY + size, xr, startY + size, false);
                draw(xr, startY, xr, startY + size, true);
            }
        }

        function tebakKorek(n) {
            const ans = 1 + (n * 3);
            const box = document.getElementById('korekNotice');
            box.innerHTML = `<strong>Tantangan ${n} Persegi:</strong> Rumus: $1 + 3(${n}) = 1 + ${3 * n} =$ <strong>${ans} batang korek api</strong>.`;
            box.classList.remove('hidden');
        }

        // --- 3. SIMULASI UBIN KOLAM ---
        function updatePool() {
            const s = parseInt(document.getElementById('poolRange').value);
            document.getElementById('poolVal').textContent = `${s} m`;

            document.getElementById('resRani').textContent = 4 * s + 4;
            document.getElementById('resJoko').textContent = 4 * (s + 1);
            document.getElementById('resWisnu').textContent = s + s + s + s + 4;
            document.getElementById('resAyu').textContent = 2 * (s + 2) + 2 * s;
            document.getElementById('resRiska').textContent = 4 * (s + 2);
        }

        // --- 4. SIMULASI WISNU ---
        function updateTrip() {
            const t = parseInt(document.getElementById('tripRange').value);
            document.getElementById('tripSec').textContent = t;
            document.getElementById('tripMin').textContent = `(${(t/60).toFixed(1)} Menit)`;

            const traveled = Math.min(15 * t, 5000);
            const left = Math.max(5000 - traveled, 0);
            const pct = Math.min((traveled / 5000) * 100, 100);

            document.getElementById('tripBarEl').style.width = `${pct}%`;
            document.getElementById('tripDistDone').textContent = traveled.toLocaleString('id-ID');
            document.getElementById('tripDistLeft').textContent = left.toLocaleString('id-ID');
        }

        // --- 5. SULAP TEKA-TEKI BILANGAN ---
        function calcMagic() {
            const n = parseFloat(document.getElementById('magicNum').value) || 0;
            const s2 = n * 2;
            const s3 = s2 + 6;
            const s4 = s3 / 2;
            const s5 = s4 - n;

            document.getElementById('st1').textContent = n;
            document.getElementById('st2').textContent = s2;
            document.getElementById('st3').textContent = s3;
            document.getElementById('st4').textContent = s4;
            document.getElementById('st5').textContent = Math.round(s5);
        }

        // --- 6. SIMULASI TARIF OJOL ---
        function updateOjol() {
            const x = parseInt(document.getElementById('ojolKmRange').value);
            document.getElementById('ojolKmVal').textContent = `${x} km`;

            const gogo = 5000 + (1500 * x);
            const gaga = 2000 * x;
            const gugu = 3000 + (1800 * x);

            document.getElementById('costGogo').textContent = `Rp${gogo.toLocaleString('id-ID')}`;
            document.getElementById('costGaga').textContent = `Rp${gaga.toLocaleString('id-ID')}`;
            document.getElementById('costGugu').textContent = `Rp${gugu.toLocaleString('id-ID')}`;

            const min = Math.min(gogo, gaga, gugu);
            const cGogo = document.getElementById('cardGogo');
            const cGaga = document.getElementById('cardGaga');
            const cGugu = document.getElementById('cardGugu');

            cGogo.className = 'p-3.5 rounded-xl bg-gray-50 border border-gray-200 space-y-1';
            cGaga.className = 'p-3.5 rounded-xl bg-gray-50 border border-gray-200 space-y-1';
            cGugu.className = 'p-3.5 rounded-xl bg-gray-50 border border-gray-200 space-y-1';

            let msg = '';
            if (min === gaga) {
                cGaga.className = 'p-3.5 rounded-xl bg-blue-50 border-2 border-blue-600 space-y-1 shadow-sm';
                msg = `Untuk jarak <strong>${x} km</strong>, <strong>Perusahaan Gaga</strong> paling murah (Rp${gaga.toLocaleString('id-ID')}) karena tanpa biaya admin.`;
            } else if (min === gogo) {
                cGogo.className = 'p-3.5 rounded-xl bg-blue-50 border-2 border-blue-600 space-y-1 shadow-sm';
                msg = `Untuk jarak <strong>${x} km</strong>, <strong>Perusahaan Gogo</strong> paling hemat (Rp${gogo.toLocaleString('id-ID')}) karena tarif per kilometernya paling murah (Rp1.500/km).`;
            } else {
                cGugu.className = 'p-3.5 rounded-xl bg-blue-50 border-2 border-blue-600 space-y-1 shadow-sm';
                msg = `Untuk jarak <strong>${x} km</strong>, <strong>Perusahaan Gugu</strong> paling hemat (Rp${gugu.toLocaleString('id-ID')}).`;
            }
            document.getElementById('ojolAdvice').innerHTML = `<i class="fas fa-info-circle mr-1"></i> ${msg}`;
        }

        // --- 7. PENGAYAAN MODAL USAHA ---
        function updateBiz() {
            const p = parseFloat(document.getElementById('bizPrice').value) || 0;
            const c = parseFloat(document.getElementById('bizCost').value) || 0;
            const f = parseFloat(document.getElementById('bizFixed').value) || 0;

            const margin = Math.max(p - c, 0);
            document.getElementById('bizMarginVal').textContent = `Rp${margin.toLocaleString('id-ID')}`;

            if (margin > 0) {
                const bep = Math.ceil(f / margin);
                document.getElementById('bizBepVal').textContent = `${bep} unit`;
                const days = Math.ceil(bep / 15);
                document.getElementById('bizDaysVal').textContent = `~${days} Hari (15 unit/hari)`;
            } else {
                document.getElementById('bizBepVal').textContent = `Rugi`;
                document.getElementById('bizDaysVal').textContent = `-`;
            }
        }

        // --- 8. KUIS EVALUASI 7 SOAL PLAN MD ---
        const quizItems = [
            {
                q: "Koefisien dari variabel <i>y</i> pada bentuk aljabar 5<i>x</i> − 2<i>y</i> + 7 adalah...",
                tp: "TP 2: Unsur Aljabar",
                opts: ["5", "−2", "2", "7"],
                ans: 1,
                exp: "Koefisien adalah angka di depan variabel beserta tandanya. Pada −2<i>y</i>, koefisiennya adalah <strong>−2</strong>."
            },
            {
                q: "Nilai dari bentuk aljabar 3<i>m</i> + 4 untuk <i>m</i> = 5 adalah...",
                tp: "TP 3: Substitusi Nilai",
                opts: ["15", "19", "23", "12"],
                ans: 1,
                exp: "Substitusikan <i>m</i> = 5: 3(5) + 4 = 15 + 4 = <strong>19</strong>."
            },
            {
                q: "Bentuk jabaran dari 3(<i>x</i> + 4) menggunakan sifat distributif adalah...",
                tp: "TP 4: Sifat Distributif",
                opts: ["3<i>x</i> + 4", "3<i>x</i> + 12", "<i>x</i> + 12", "7<i>x</i>"],
                ans: 1,
                exp: "Gunakan sifat distributif <i>a</i>(<i>b</i> + <i>c</i>) = <i>ab</i> + <i>ac</i>: 3 × <i>x</i> + 3 × 4 = <strong>3<i>x</i> + 12</strong>."
            },
            {
                q: "Hasil penyederhanaan dari bentuk aljabar 7<i>a</i> + 2<i>b</i> − 3<i>a</i> adalah...",
                tp: "TP 4: Suku Sejenis",
                opts: ["6<i>ab</i>", "4<i>a</i> + 2<i>b</i>", "10<i>a</i> + 2<i>b</i>", "4<i>ab</i>"],
                ans: 1,
                exp: "Gabungkan hanya suku yang sejenis: (7<i>a</i> − 3<i>a</i>) + 2<i>b</i> = <strong>4<i>a</i> + 2<i>b</i></strong>."
            },
            {
                q: "Bentuk faktor dari bentuk jabaran 6<i>x</i> + 9 adalah...",
                tp: "TP 4: Bentuk Faktor",
                opts: ["3(2<i>x</i> + 3)", "2(3<i>x</i> + 4)", "6(<i>x</i> + 9)", "3(2<i>x</i> + 9)"],
                ans: 0,
                exp: "Keluarkan FPB dari 6 dan 9 yaitu 3: 3(2<i>x</i> + 3)."
            },
            {
                q: "Cakra membeli 4 pensil (<i>p</i>) dan 3 buku (<i>b</i>). Bentuk aljabar total belanjaan Cakra adalah...",
                tp: "TP 5: Pemodelan",
                opts: ["7<i>pb</i>", "4<i>p</i> + 3<i>b</i>", "3<i>p</i> + 4<i>b</i>", "12<i>pb</i>"],
                ans: 1,
                exp: "4 pensil (<i>p</i>) dan 3 buku (<i>b</i>) dimodelkan menjadi <strong>4<i>p</i> + 3<i>b</i></strong>."
            },
            {
                q: "Tinggi badan Ibu adalah 30 cm lebih pendek dari 4 kali tinggi badan Linda (<i>L</i>). Bentuk aljabar tinggi Ibu adalah...",
                tp: "TP 5: Pemodelan Relasi",
                opts: ["4<i>L</i> + 30", "30 − 4<i>L</i>", "4<i>L</i> − 30", "4(<i>L</i> − 30)"],
                ans: 2,
                exp: "4 kali tinggi Linda adalah 4<i>L</i>. 30 cm lebih pendek berarti dikurangi 30: <strong>4<i>L</i> − 30</strong>."
            }
        ];

        let indexQ = 0;
        let answersQ = new Array(quizItems.length).fill(null);

        function displayQ(idx) {
            const item = quizItems[idx];
            document.getElementById('qBadge').textContent = `Soal ${idx + 1} dari ${quizItems.length}`;
            document.getElementById('txtConcept').textContent = item.tp;
            document.getElementById('txtQuestion').innerHTML = `${idx + 1}. ${item.q}`;
            document.getElementById('barQuiz').style.width = `${((idx + 1) / quizItems.length) * 100}%`;

            const optBox = document.getElementById('boxOptions');
            optBox.innerHTML = '';

            const expBox = document.getElementById('boxExplanation');
            expBox.classList.add('hidden');

            const hasAns = answersQ[idx] !== null;
            document.getElementById('txtStatus').textContent = hasAns ? 'Jawaban tersimpan' : 'Pilih salah satu jawaban';

            item.opts.forEach((opt, i) => {
                const btn = document.createElement('button');
                btn.type = 'button';
                btn.className = 'w-full text-left p-3.5 rounded-xl border text-xs sm:text-sm font-medium transition flex items-center justify-between ';
                const label = String.fromCharCode(65 + i);

                if (hasAns) {
                    btn.disabled = true;
                    if (i === item.ans) {
                        btn.className += 'bg-emerald-50 border-emerald-500 text-emerald-800 font-bold';
                        btn.innerHTML = `<span><strong>${label}.</strong> ${opt}</span> <i class="fas fa-check text-emerald-600"></i>`;
                    } else if (i === answersQ[idx]) {
                        btn.className += 'bg-rose-50 border-rose-500 text-rose-800 font-bold';
                        btn.innerHTML = `<span><strong>${label}.</strong> ${opt}</span> <i class="fas fa-times text-rose-600"></i>`;
                    } else {
                        btn.className += 'bg-gray-50 border-gray-200 text-gray-400 opacity-60';
                        btn.innerHTML = `<span><strong>${label}.</strong> ${opt}</span>`;
                    }
                } else {
                    btn.className += 'bg-white border-gray-200 hover:border-blue-600 text-gray-800';
                    btn.innerHTML = `<span><strong>${label}.</strong> ${opt}</span>`;
                    btn.onclick = () => chooseQ(i);
                }

                optBox.appendChild(btn);
            });

            if (hasAns) {
                expBox.innerHTML = item.exp;
                expBox.className = 'p-4 rounded-xl text-xs sm:text-sm leading-relaxed border ' + 
                    (answersQ[idx] === item.ans ? 'bg-emerald-50 border-emerald-300 text-emerald-800' : 'bg-rose-50 border-rose-300 text-rose-800');
                expBox.classList.remove('hidden');
            }

            document.getElementById('btnPrevQ').disabled = idx === 0;
            const nextBtn = document.getElementById('btnNextQ');
            if (idx === quizItems.length - 1) {
                nextBtn.innerHTML = 'Lihat Nilai Akhir <i class="fas fa-check-double ml-1"></i>';
            } else {
                nextBtn.innerHTML = 'Selanjutnya <i class="fas fa-arrow-right ml-1"></i>';
            }
        }

        function chooseQ(i) {
            answersQ[indexQ] = i;
            displayQ(indexQ);
        }

        function nextQ() {
            if (indexQ < quizItems.length - 1) {
                indexQ++;
                displayQ(indexQ);
            } else {
                showFinalScore();
            }
        }

        function prevQ() {
            if (indexQ > 0) {
                indexQ--;
                displayQ(indexQ);
            }
        }

        function showFinalScore() {
            let sc = 0;
            answersQ.forEach((a, i) => {
                if (a === quizItems[i].ans) sc++;
            });

            document.getElementById('boxQuiz').classList.add('hidden');
            document.getElementById('boxResult').classList.remove('hidden');
            document.getElementById('scoreVal').textContent = sc;

            const msg = document.getElementById('scoreMsg');
            const ic = document.getElementById('iconRes');

            if (sc >= 6) {
                msg.innerHTML = '<strong class="text-blue-600 text-base block mb-1">Sangat Baik (Skor 6–7)</strong> Kamu telah menguasai Bab 4 Bentuk Aljabar dengan sangat baik!';
                ic.className = 'fas fa-trophy text-amber-500';
            } else if (sc >= 4) {
                msg.innerHTML = '<strong class="text-blue-600 text-base block mb-1">Cukup Baik (Skor 4–5)</strong> Pemahamanmu sudah bagus, pelajari kembali beberapa konsep yang belum tepat.';
                ic.className = 'fas fa-medal text-blue-600';
            } else {
                msg.innerHTML = '<strong class="text-rose-500 text-base block mb-1">Perlu Mengulang (Skor < 4)</strong> Yuk pelajari kembali konsep dasar di Sub-Bab 1 dan 2 sebelum mencoba kembali.';
                ic.className = 'fas fa-book text-gray-400';
            }
        }

        function redoQuiz() {
            indexQ = 0;
            answersQ = new Array(quizItems.length).fill(null);
            document.getElementById('boxResult').classList.add('hidden');
            document.getElementById('boxQuiz').classList.remove('hidden');
            displayQ(0);
        }

        // Init
        window.addEventListener('DOMContentLoaded', () => {
            activatePanel(initTarget);
            updateKorek();
            updatePool();
            updateTrip();
            calcMagic();
            updateOjol();
            updateBiz();
            displayQ(0);
        });
    </script>
</body>
</html>