<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materi & Kuis Pembelajaran - AljabarLearn</title>
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
        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
    </style>
</head>
<body class="bg-gray-50 flex min-h-screen font-sans text-gray-800">

    <!-- Navbar Sisi Kiri (Fixed saat Scroll) -->
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
                <a href="/dashboard" class="w-full text-left flex items-center justify-between px-3.5 py-2.5 rounded-xl border border-transparent hover:bg-gray-100 text-gray-700 transition text-xs font-semibold">
                    <div class="flex items-center gap-2.5">
                        <i class="fas fa-th-large text-sm text-blue-600"></i>
                        <span class="font-bold text-sm">Dashboard</span>
                    </div>
                    <i class="fas fa-arrow-right text-xs opacity-50"></i>
                </a>
            </div>

            <!-- 4 Sub-Bab Materi Pembelajaran -->
            <div class="mb-5">
                <h3 class="text-[10px] font-bold text-gray-400 mb-2 tracking-wider uppercase">MATERI & LATIHAN</h3>
                <div class="space-y-1.5" id="navSubbabs">
                    
                    <button onclick="activatePanel('1')" id="navBtn1" class="w-full text-left flex items-center justify-between px-3 py-2.5 rounded-xl border transition text-xs font-semibold bg-blue-50 text-blue-700 border-blue-200 shadow-sm">
                        <div>
                            <div class="font-bold text-xs flex items-center gap-1.5">
                                <span>Sub-Bab 1</span>
                                <span id="badgeLatihan1" class="text-[9px] px-1.5 py-0.2 rounded bg-blue-200 text-blue-800">4 Soal</span>
                            </div>
                            <div class="text-[11px] opacity-75 font-normal truncate w-36">Mengenal Variabel & Unsur</div>
                        </div>
                        <i class="fas fa-chevron-right text-xs"></i>
                    </button>

                    <button onclick="activatePanel('2')" id="navBtn2" class="w-full text-left flex items-center justify-between px-3 py-2.5 rounded-xl border border-transparent hover:bg-gray-100 text-gray-600 transition text-xs font-semibold">
                        <div>
                            <div class="font-bold text-xs flex items-center gap-1.5">
                                <span>Sub-Bab 2</span>
                                <span id="badgeLatihan2" class="text-[9px] px-1.5 py-0.2 rounded bg-gray-200 text-gray-700">4 Soal</span>
                            </div>
                            <div class="text-[11px] opacity-75 font-normal truncate w-36">Suku Sejenis</div>
                        </div>
                        <i class="fas fa-chevron-right text-xs"></i>
                    </button>

                    <button onclick="activatePanel('3')" id="navBtn3" class="w-full text-left flex items-center justify-between px-3 py-2.5 rounded-xl border border-transparent hover:bg-gray-100 text-gray-600 transition text-xs font-semibold">
                        <div>
                            <div class="font-bold text-xs flex items-center gap-1.5">
                                <span>Sub-Bab 3</span>
                                <span id="badgeLatihan3" class="text-[9px] px-1.5 py-0.2 rounded bg-gray-200 text-gray-700">4 Soal</span>
                            </div>
                            <div class="text-[11px] opacity-75 font-normal truncate w-36">Distributif & Faktor</div>
                        </div>
                        <i class="fas fa-chevron-right text-xs"></i>
                    </button>

                    <button onclick="activatePanel('4')" id="navBtn4" class="w-full text-left flex items-center justify-between px-3 py-2.5 rounded-xl border border-transparent hover:bg-gray-100 text-gray-600 transition text-xs font-semibold">
                        <div>
                            <div class="font-bold text-xs flex items-center gap-1.5">
                                <span>Sub-Bab 4</span>
                                <span id="badgeLatihan4" class="text-[9px] px-1.5 py-0.2 rounded bg-gray-200 text-gray-700">4 Soal</span>
                            </div>
                            <div class="text-[11px] opacity-75 font-normal truncate w-36">Pemodelan Aljabar</div>
                        </div>
                        <i class="fas fa-chevron-right text-xs"></i>
                    </button>

                    <button onclick="activatePanel('ringkasan')" id="navBtnRingkasan" class="w-full text-left flex items-center justify-between px-3 py-2 rounded-xl border border-transparent hover:bg-gray-100 text-gray-600 transition text-xs font-semibold">
                        <div class="flex items-center gap-2">
                            <i class="fas fa-bookmark text-amber-500"></i>
                            <span class="font-bold text-xs">Ringkasan Satu Halaman</span>
                        </div>
                        <i class="fas fa-chevron-right text-xs"></i>
                    </button>

                </div>
            </div>

            <!-- Menu Evaluasi Akhir (Tersendiri di Bawah Materi) -->
            <div>
                <h3 class="text-[10px] font-bold text-gray-400 mb-2 tracking-wider uppercase">UJIAN & EVALUASI</h3>
                <button onclick="activatePanel('evaluasi')" id="navBtnEvaluasi" class="w-full text-left bg-blue-600 hover:bg-blue-700 text-white px-3.5 py-3 rounded-xl transition block shadow-sm group">
                    <div class="font-bold text-sm flex items-center justify-between">
                        <span>Evaluasi Akhir</span>
                        <i class="fas fa-arrow-right text-xs group-hover:translate-x-1 transition-transform"></i>
                    </div>
                    <div class="text-[11px] text-blue-100 mt-0.5 flex items-center justify-between">
                        <span>7 Soal • 20 Menit</span>
                        <span class="bg-blue-800/80 px-1.5 py-0.5 rounded text-[10px]">Bebas AI</span>
                    </div>
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

    <!-- Konten Utama Materi (Dapat di-scroll) -->
    <main class="flex-1 ml-64 p-6 sm:p-8 min-h-screen">
        <div class="bg-white rounded-3xl p-6 sm:p-10 shadow-sm border border-gray-100 max-w-4xl mx-auto border-t-4 border-t-blue-500">

            <!-- ======================================================== -->
            <!-- SUB-BAB 1: MENGENAL HURUF DALAM MATEMATIKA (TP 1, 2, 3) -->
            <!-- ======================================================== -->
            <section id="panelSubbab1" class="space-y-8">
                <!-- Header Sub-Bab -->
                <div class="border-b border-gray-100 pb-5">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="text-xs text-blue-700 bg-blue-50 px-3 py-1 rounded-md font-semibold border border-blue-100">
                            Unit 1 / Sub-Bab 1 • TP 1, TP 2, TP 3
                        </span>
                        <span class="text-xs text-emerald-700 bg-emerald-50 px-2.5 py-1 rounded-md font-semibold border border-emerald-100">
                            4 Soal Latihan
                        </span>
                    </div>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 tracking-tight">
                        Mengenal Huruf dalam Matematika
                    </h2>
                    <p class="text-sm text-gray-500 mt-1">
                        Variabel sebagai kotak kosong, pola korek api <span class="font-math font-semibold">1 + 3n</span>, unsur bentuk aljabar, dan substitusi nilai.
                    </p>
                </div>

                <!-- Pertanyaan Pembuka -->
                <div class="bg-amber-50/70 border-l-4 border-amber-500 p-4 rounded-r-2xl">
                    <div class="flex items-start gap-3">
                        <i class="fas fa-question-circle text-amber-600 text-xl mt-0.5"></i>
                        <div>
                            <h4 class="font-bold text-amber-900 text-sm">Pertanyaan Pembuka</h4>
                            <p class="text-xs sm:text-sm text-amber-800 mt-0.5">
                                Kenapa di matematika ada huruf, padahal itu pelajaran tentang angka?
                            </p>
                        </div>
                    </div>
                </div>

                <!-- 1.1 Huruf sebagai "kotak kosong" -->
                <div class="space-y-3">
                    <h3 class="text-xl font-bold text-gray-800 flex items-center gap-2">
                        <span class="w-7 h-7 rounded-lg bg-blue-100 text-blue-700 flex items-center justify-center text-xs font-bold">1.1</span>
                        Huruf sebagai "Kotak Kosong"
                    </h3>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        Bayangkan kamu mau menulis aturan: <em>"banyak korek api sama dengan satu ditambah tiga kali banyak persegi"</em>. Kalimat tersebut panjang sekali. Matematika meringkasnya menjadi:
                    </p>
                    <div class="bg-blue-50 p-4 rounded-2xl border border-blue-200 text-center my-3">
                        <span class="text-2xl sm:text-3xl font-bold text-blue-800 font-math tracking-wide">1 + 3n</span>
                    </div>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        Huruf <strong>n</strong> di situ adalah <strong>kotak kosong</strong> untuk banyak persegi. Kamu boleh mengisinya dengan angka apa pun yang masuk akal. Huruf seperti ini disebut <strong>variabel</strong>.
                    </p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-xs pt-1">
                        <div class="bg-gray-50 p-3.5 rounded-xl border border-gray-200">
                            <strong class="text-blue-900 block font-bold mb-1">1. Nilai yang Berubah-ubah</strong>
                            Contoh: banyak persegi bisa 1, 2, 3, dan seterusnya.
                        </div>
                        <div class="bg-gray-50 p-3.5 rounded-xl border border-gray-200">
                            <strong class="text-blue-900 block font-bold mb-1">2. Nilai yang Belum Diketahui</strong>
                            Contoh: berat jeruk yang belum ditimbang, ditulis <span class="font-math font-semibold">t</span> kg.
                        </div>
                    </div>
                    <p class="text-xs text-gray-600 pt-1">
                        Kalimat yang memakai variabel seperti <span class="font-math font-bold text-blue-700">1 + 3n</span> disebut <strong>bentuk aljabar</strong>.
                    </p>
                    <!-- Contoh Medis Nyata -->
                    <div class="bg-blue-50/60 p-4 rounded-xl border border-blue-100 flex items-center gap-3 text-xs text-blue-900">
                        <i class="fas fa-stethoscope text-xl text-blue-600 shrink-0"></i>
                        <div>
                            <strong>Contoh di Dunia Medis:</strong> Perawat menghitung tetesan infus per menit dengan rumus <span class="font-math font-bold text-sm bg-white px-2 py-0.5 rounded border border-blue-200">D = dv / (60n)</span>. Satu rumus pendek itu dipahami oleh perawat di seluruh dunia, apa pun bahasanya.
                        </div>
                    </div>
                </div>

                <!-- 1.2 Pola Korek Api & Simulasi Interaktif -->
                <div class="space-y-4 pt-2">
                    <h3 class="text-xl font-bold text-gray-800 flex items-center gap-2">
                        <span class="w-7 h-7 rounded-lg bg-blue-100 text-blue-700 flex items-center justify-center text-xs font-bold">1.2</span>
                        Contoh: Pola Korek Api
                    </h3>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        Susun persegi berderet. Satu persegi butuh 4 korek. Setiap persegi tambahan hanya butuh 3 korek baru, karena satu sisinya menempel pada persegi sebelumnya.
                    </p>

                    <!-- Simulasi Korek Api -->
                    <div class="p-6 rounded-2xl bg-white border border-gray-200 shadow-sm space-y-4">
                        <div class="flex items-center justify-between border-b border-gray-100 pb-3">
                            <div class="flex items-center gap-2">
                                <span class="w-6 h-6 rounded-md bg-blue-600 text-white flex items-center justify-center text-xs font-bold"><i class="fas fa-sliders"></i></span>
                                <h4 class="font-bold text-gray-800 text-sm">Simulasi Interaktif: Pola Korek Api</h4>
                            </div>
                            <span class="text-[11px] font-bold text-blue-600 bg-blue-50 px-2 py-0.5 rounded">Eksplorasi Buku</span>
                        </div>

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

                        <!-- Rincian Nilai -->
                        <div class="grid grid-cols-2 sm:grid-cols-4 gap-2 text-center text-xs">
                            <div class="p-3 rounded-xl bg-gray-50 border border-gray-200">
                                <span class="text-[10px] text-gray-400 uppercase font-bold block">Kolom A (Tetap)</span>
                                <span class="text-base font-bold text-gray-800">1</span>
                                <span class="text-[10px] text-gray-500 block">Korek Pertama</span>
                            </div>
                            <div class="p-3 rounded-xl bg-gray-50 border border-gray-200">
                                <span class="text-[10px] text-gray-400 uppercase font-bold block">Kolom B (Berubah)</span>
                                <span id="korekColBVal" class="text-base font-bold text-blue-600 font-mono">4</span>
                                <span class="text-[10px] text-gray-500 block">Banyak Persegi (<span class="font-math">n</span>)</span>
                            </div>
                            <div class="p-3 rounded-xl bg-gray-50 border border-gray-200">
                                <span class="text-[10px] text-gray-400 uppercase font-bold block">Kolom C (Tetap)</span>
                                <span class="text-base font-bold text-gray-800">3</span>
                                <span class="text-[10px] text-gray-500 block">Korek Tambahan</span>
                            </div>
                            <div class="p-3 rounded-xl bg-blue-50 border border-blue-200 text-blue-900">
                                <span class="text-[10px] text-blue-600 uppercase font-bold block">Total Korek</span>
                                <span id="korekTotalVal" class="text-base font-bold text-blue-700 font-mono">13</span>
                                <span class="text-[10px] text-blue-600 block">1 + 3(4)</span>
                            </div>
                        </div>

                        <!-- Tantangan Nyoman -->
                        <div class="pt-2 flex flex-wrap items-center gap-2 text-xs">
                            <span class="font-semibold text-gray-700">Tantangan Cepat:</span>
                            <button onclick="tebakKorek(5)" class="px-2.5 py-1 rounded bg-blue-50 text-blue-700 hover:bg-blue-100 border border-blue-200 font-medium">5 Persegi?</button>
                            <button onclick="tebakKorek(10)" class="px-2.5 py-1 rounded bg-blue-50 text-blue-700 hover:bg-blue-100 border border-blue-200 font-medium">10 Persegi?</button>
                            <button onclick="tebakKorek(33)" class="px-2.5 py-1 rounded bg-blue-50 text-blue-700 hover:bg-blue-100 border border-blue-200 font-medium">33 Persegi?</button>
                        </div>
                        <div id="korekNotice" class="hidden p-3 rounded-xl bg-blue-50 text-blue-800 text-xs font-medium border border-blue-200"></div>
                    </div>

                    <div class="p-3.5 bg-gray-50 rounded-xl border border-gray-200 text-xs text-gray-600">
                        <strong>Tentang cara menulis:</strong> Perkalian <span class="font-math">3 × n</span> cukup ditulis <strong>3n</strong>. Tanda kali dihilangkan dan angkanya diletakkan di depan. Jadi <strong>3n</strong> berarti <em>"tiga kali n"</em>.
                    </div>
                </div>

                <!-- 1.3 Empat Istilah yang Harus Dikenal -->
                <div class="space-y-3 pt-2">
                    <h3 class="text-xl font-bold text-gray-800 flex items-center gap-2">
                        <span class="w-7 h-7 rounded-lg bg-blue-100 text-blue-700 flex items-center justify-center text-xs font-bold">1.3</span>
                        Empat Istilah yang Harus Kamu Kenal
                    </h3>
                    <p class="text-sm text-gray-600">Ambil contoh bentuk aljabar: <strong class="font-math text-base text-blue-800 bg-blue-50 px-2 py-0.5 rounded border border-blue-200">5x − 2y + 7</strong></p>

                    <div class="overflow-x-auto">
                        <table class="w-full text-xs text-left border-collapse border border-gray-200 rounded-xl overflow-hidden">
                            <thead class="bg-gray-100 text-gray-700 font-bold uppercase text-[10px]">
                                <tr>
                                    <th class="p-3 border border-gray-200">Istilah</th>
                                    <th class="p-3 border border-gray-200">Artinya</th>
                                    <th class="p-3 border border-gray-200">Di contoh ini</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 text-gray-600">
                                <tr class="hover:bg-gray-50">
                                    <td class="p-3 font-bold text-gray-800 border border-gray-200">Variabel</td>
                                    <td class="p-3 border border-gray-200">Huruf yang mewakili bilangan</td>
                                    <td class="p-3 font-math font-bold text-blue-700 border border-gray-200">x dan y</td>
                                </tr>
                                <tr class="hover:bg-gray-50">
                                    <td class="p-3 font-bold text-gray-800 border border-gray-200">Suku</td>
                                    <td class="p-3 border border-gray-200">Potongan yang dipisah tanda + atau −</td>
                                    <td class="p-3 font-math font-bold text-blue-700 border border-gray-200">5x, −2y, dan 7</td>
                                </tr>
                                <tr class="hover:bg-gray-50">
                                    <td class="p-3 font-bold text-gray-800 border border-gray-200">Koefisien</td>
                                    <td class="p-3 border border-gray-200">Angka yang mengalikan variabel</td>
                                    <td class="p-3 font-math font-bold text-blue-700 border border-gray-200">5 (untuk x) dan −2 (untuk y)</td>
                                </tr>
                                <tr class="hover:bg-gray-50">
                                    <td class="p-3 font-bold text-gray-800 border border-gray-200">Konstanta</td>
                                    <td class="p-3 border border-gray-200">Angka tanpa variabel, nilainya tetap</td>
                                    <td class="p-3 font-math font-bold text-blue-700 border border-gray-200">7</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- 3 Hal yang Sering Membingungkan -->
                    <div class="bg-rose-50/70 border border-rose-200 rounded-2xl p-4 space-y-2 text-xs text-rose-900">
                        <strong class="text-sm font-bold flex items-center gap-1.5 text-rose-800">
                            <i class="fas fa-exclamation-triangle"></i> Tiga Hal yang Sering Bikin Bingung:
                        </strong>
                        <ul class="list-disc list-inside space-y-1 pl-1">
                            <li><strong>Tanda ikut sukunya:</strong> Pada <span class="font-math">5x − 2y</span>, suku keduanya adalah <span class="font-math">−2y</span>, jadi koefisiennya <strong>−2</strong>, bukan 2.</li>
                            <li><strong>Huruf tanpa angka tetap punya koefisien:</strong> Pada <span class="font-math">x</span>, koefisiennya adalah <strong>1</strong>. Pada <span class="font-math">−x − 3</span>, koefisien x adalah <strong>−1</strong>.</li>
                            <li><strong>Konstanta juga suku:</strong> Angka 7 itu satu suku sendiri (suku konstanta).</li>
                        </ul>
                    </div>
                </div>

                <!-- 1.4 Mengartikan Unsur dalam Cerita -->
                <div class="space-y-3 pt-2">
                    <h3 class="text-xl font-bold text-gray-800 flex items-center gap-2">
                        <span class="w-7 h-7 rounded-lg bg-blue-100 text-blue-700 flex items-center justify-center text-xs font-bold">1.4</span>
                        Mengartikan Unsur dalam Cerita
                    </h3>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        Rahmat membeli tiket taman bermain. Total bayarnya <strong class="font-math text-blue-700">3a + 2b</strong>, dengan <span class="font-math">a</span> = harga tiket anak dan <span class="font-math">b</span> = harga tiket dewasa.
                    </p>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 text-xs">
                        <div class="p-3 rounded-xl bg-gray-50 border border-gray-200">
                            <strong class="text-gray-800 block mb-1">Koefisien 3 pada a:</strong>
                            Menyatakan ada <strong>3 anak</strong> yang membeli tiket.
                        </div>
                        <div class="p-3 rounded-xl bg-gray-50 border border-gray-200">
                            <strong class="text-gray-800 block mb-1">Koefisien 2 pada b:</strong>
                            Menyatakan ada <strong>2 orang dewasa</strong> yang membeli tiket.
                        </div>
                        <div class="p-3 rounded-xl bg-gray-50 border border-gray-200">
                            <strong class="text-gray-800 block mb-1">Biaya Parkir Tetap:</strong>
                            Jika parkir Rp25.000, bentuknya jadi <span class="font-math font-bold">3a + 2b + 25.000</span> (25.000 adalah konstanta).
                        </div>
                    </div>
                    <div class="p-3 bg-blue-50 text-blue-800 rounded-xl text-xs font-medium border border-blue-200">
                        💡 <strong>Aturan Praktis:</strong> Koefisien = jumlahnya, Variabel = barangnya/harganya, Konstanta = biaya atau nilai tetap.
                    </div>
                </div>

                <!-- 1.5 Substitusi -->
                <div class="space-y-3 pt-2">
                    <h3 class="text-xl font-bold text-gray-800 flex items-center gap-2">
                        <span class="w-7 h-7 rounded-lg bg-blue-100 text-blue-700 flex items-center justify-center text-xs font-bold">1.5</span>
                        Substitusi: Mengisi Kotak Kosong
                    </h3>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        <strong>Substitusi</strong> artinya mengganti variabel dengan angka lalu menghitung hasilnya.
                    </p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-xs font-mono">
                        <div class="p-3.5 rounded-xl bg-gray-50 border border-gray-200 space-y-1">
                            <span class="font-bold font-sans text-gray-800 block">Contoh 1: 3m + 4 untuk m = 5</span>
                            <div>• Ganti m dengan 5: 3 × 5 + 4</div>
                            <div>• Hitung: 15 + 4 = <strong class="text-blue-600 text-sm">19</strong></div>
                        </div>
                        <div class="p-3.5 rounded-xl bg-gray-50 border border-gray-200 space-y-1">
                            <span class="font-bold font-sans text-gray-800 block">Contoh 2: −2m + 7 untuk m = 3</span>
                            <div>• Ganti m dengan 3: −2 × 3 + 7</div>
                            <div>• Hitung: −6 + 7 = <strong class="text-blue-600 text-sm">1</strong></div>
                        </div>
                    </div>
                    <p class="text-xs text-gray-500">
                        *Catatan kewajaran: Pada <span class="font-math">1 + 3n</span> dengan n = 5, angka 16 berarti 16 korek api. Nilai <span class="font-math">n = −2</span> persegi tidak masuk akal dalam dunia nyata.
                    </p>
                </div>

                <!-- 1.6 Kesalahan Umum -->
                <div class="space-y-2 pt-2">
                    <h4 class="text-sm font-bold text-gray-800">1.6 Kesalahan Umum yang Harus Dihindari</h4>
                    <ul class="list-disc list-inside text-xs text-rose-700 bg-rose-50/60 p-4 rounded-xl border border-rose-200 space-y-1">
                        <li>Menulis koefisien <span class="font-math">−2y</span> sebagai 2 (lupa tanda minus di depannya).</li>
                        <li>Mengira <span class="font-math">x</span> tidak punya koefisien (seharusnya koefisiennya 1).</li>
                        <li>Lupa memakai tanda kurung saat mengganti variabel dengan bilangan negatif.</li>
                    </ul>
                </div>

                <!-- 1.7 Cek Pemahaman -->
                <div class="space-y-3 pt-2">
                    <h4 class="text-sm font-bold text-gray-800">1.7 Cek Pemahaman</h4>
                    <div class="space-y-2 text-xs">
                        <details class="bg-gray-50 rounded-xl border border-gray-200 p-3">
                            <summary class="font-semibold text-gray-800 cursor-pointer">1. Pada 4x − y + 9, sebutkan koefisien y dan konstantanya!</summary>
                            <div class="mt-2 pt-2 border-t border-gray-200 text-blue-700">
                                <strong>Kunci:</strong> Koefisien y = −1; Konstanta = 9. <br>
                                <span class="text-gray-500 italic">Pancingan: "Kalau y ditulis lengkap dengan angkanya, bentuknya jadi apa? Tanda minus di depannya milik siapa?"</span>
                            </div>
                        </details>
                        <details class="bg-gray-50 rounded-xl border border-gray-200 p-3">
                            <summary class="font-semibold text-gray-800 cursor-pointer">2. Hitung 2m − 5 untuk m = 4.</summary>
                            <div class="mt-2 pt-2 border-t border-gray-200 text-blue-700">
                                <strong>Kunci:</strong> 2(4) − 5 = 8 − 5 = <strong>3</strong>.
                            </div>
                        </details>
                    </div>
                </div>

                <!-- ======================================================== -->
                <!-- KUIS LATIHAN SUB-BAB 1 (K1.1 - K1.4)                     -->
                <!-- ======================================================== -->
                <div class="mt-10 pt-8 border-t-2 border-dashed border-blue-200">
                    <div class="bg-blue-600 rounded-2xl p-5 text-white flex items-center justify-between mb-6 shadow-sm">
                        <div>
                            <span class="text-xs uppercase tracking-wider text-blue-200 font-bold block">Latihan Formatif Sub-Bab 1</span>
                            <h3 class="text-xl font-extrabold">Kuis Latihan: Mengenal Huruf & Unsur (4 Soal)</h3>
                            <p class="text-xs text-blue-100 mt-0.5">Syarat tuntas: benar minimal 3 dari 4 soal. Gunakan tombol Cek Step & Hint AI!</p>
                        </div>
                        <span id="scoreBadge1" class="text-xs font-bold bg-white text-blue-700 px-3 py-1.5 rounded-full shadow-sm">
                            0 / 4 Tuntas
                        </span>
                    </div>

                    <div id="quizContainerSubbab1" class="space-y-6">
                        <!-- JS Render Soal K1.1 - K1.4 -->
                    </div>
                </div>
            </section>


            <!-- ======================================================== -->
            <!-- SUB-BAB 2: SUKU SEJENIS (TP 4)                           -->
            <!-- ======================================================== -->
            <section id="panelSubbab2" class="hidden space-y-8">
                <!-- Header Sub-Bab -->
                <div class="border-b border-gray-100 pb-5">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="text-xs text-purple-700 bg-purple-50 px-3 py-1 rounded-md font-semibold border border-purple-100">
                            Unit 2 / Sub-Bab 2 • TP 4
                        </span>
                        <span class="text-xs text-emerald-700 bg-emerald-50 px-2.5 py-1 rounded-md font-semibold border border-emerald-100">
                            4 Soal Latihan
                        </span>
                    </div>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 tracking-tight">
                        Menjumlahkan dan Mengurangkan Suku Sejenis
                    </h2>
                    <p class="text-sm text-gray-500 mt-1">
                        Kaidah suku sejenis, analogi nama barang, menyederhanakan suku banyak, dan koefisien pecahan.
                    </p>
                </div>

                <!-- Pertanyaan Pembuka -->
                <div class="bg-purple-50/70 border-l-4 border-purple-500 p-4 rounded-r-2xl">
                    <div class="flex items-start gap-3">
                        <i class="fas fa-question-circle text-purple-600 text-xl mt-0.5"></i>
                        <div>
                            <h4 class="font-bold text-purple-900 text-sm">Pertanyaan Pembuka</h4>
                            <p class="text-xs sm:text-sm text-purple-800 mt-0.5">
                                2 apel + 3 apel = 5 apel. Tapi kalau 2 apel + 3 jeruk, jadi berapa?
                            </p>
                        </div>
                    </div>
                </div>

                <!-- 2.1 Suku Sejenis -->
                <div class="space-y-3">
                    <h3 class="text-xl font-bold text-gray-800 flex items-center gap-2">
                        <span class="w-7 h-7 rounded-lg bg-purple-100 text-purple-700 flex items-center justify-center text-xs font-bold">2.1</span>
                        Pengertian Suku Sejenis
                    </h3>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        <strong>Suku sejenis</strong> adalah suku yang variabelnya sama persis. Angka tanpa variabel (konstanta) juga sejenis dengan sesama angka.
                    </p>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs">
                        <div class="p-4 rounded-xl bg-emerald-50/70 border border-emerald-200 space-y-2">
                            <strong class="text-emerald-900 font-bold block text-sm">✓ Suku Sejenis (Bisa Digabung):</strong>
                            <ul class="space-y-1 font-mono text-emerald-800">
                                <li>• <strong>3x</strong> dan <strong>5x</strong> (variabel sama-sama x)</li>
                                <li>• <strong>7a</strong> dan <strong>−2a</strong> (variabel sama-sama a)</li>
                                <li>• <strong>4</strong> dan <strong>9</strong> (sama-sama konstanta)</li>
                            </ul>
                        </div>
                        <div class="p-4 rounded-xl bg-rose-50/70 border border-rose-200 space-y-2">
                            <strong class="text-rose-900 font-bold block text-sm">✗ Bukan Suku Sejenis (Tidak Bisa Digabung):</strong>
                            <ul class="space-y-1 font-mono text-rose-800">
                                <li>• <strong>3x</strong> dan <strong>5y</strong> (variabel x beda dengan y)</li>
                                <li>• <strong>7a</strong> dan <strong>7</strong> (satu berhuruf, satu angka)</li>
                                <li>• <strong>4x</strong> dan <strong>x²</strong> (pangkat variabelnya berbeda)</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- 2.2 Ide Utama: Hitung yang Sejenis Saja -->
                <div class="space-y-3 pt-2">
                    <h3 class="text-xl font-bold text-gray-800 flex items-center gap-2">
                        <span class="w-7 h-7 rounded-lg bg-purple-100 text-purple-700 flex items-center justify-center text-xs font-bold">2.2</span>
                        Ide Utama: Hitung yang Sejenis Saja
                    </h3>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        Anggap variabel sebagai nama barang:
                    </p>
                    <ul class="list-disc list-inside text-sm text-gray-700 space-y-1.5 pl-2">
                        <li><strong>2x + 3x = 5x</strong> (<em>"2 apel tambah 3 apel jadi 5 apel"</em>).</li>
                        <li><strong>7p − 4p = 3p</strong> (<em>"punya 7 pensil, dipinjam 4, sisa 3 pensil"</em>).</li>
                        <li><strong>2x + 3y TIDAK BISA</strong> dijadikan satu suku. Tidak ada nama barang bersama untuk "2 apel dan 3 jeruk" selain tetap ditulis <strong>2x + 3y</strong>.</li>
                    </ul>
                    <div class="p-4 bg-purple-50 rounded-2xl border border-purple-200 text-xs sm:text-sm text-purple-900">
                        <strong>Caranya:</strong> Jumlahkan atau kurangkan <strong>koefisiennya</strong>, variabelnya tetap!
                        <div class="font-math font-bold text-base mt-2 grid grid-cols-1 sm:grid-cols-2 gap-2">
                            <div class="bg-white p-2 rounded-lg border border-purple-200">5x + 7x = (5 + 7)x = 12x</div>
                            <div class="bg-white p-2 rounded-lg border border-purple-200">15n − 2n = (15 − 2)n = 13n</div>
                        </div>
                    </div>
                </div>

                <!-- 2.3 Menyederhanakan Banyak Suku -->
                <div class="space-y-3 pt-2">
                    <h3 class="text-xl font-bold text-gray-800 flex items-center gap-2">
                        <span class="w-7 h-7 rounded-lg bg-purple-100 text-purple-700 flex items-center justify-center text-xs font-bold">2.3</span>
                        Menyederhanakan Banyak Suku
                    </h3>
                    <p class="text-sm text-gray-600">Contoh pengerjaan: <strong class="font-math text-purple-800 text-base">7a + 2b − 3a</strong></p>
                    <ol class="list-decimal list-inside space-y-2 text-xs sm:text-sm text-gray-600 bg-gray-50 p-4 rounded-2xl border border-gray-200">
                        <li><strong>Tandai suku sejenis:</strong> Suku <span class="font-math font-bold">7a</span> dan <span class="font-math font-bold">−3a</span> sejenis. Suku <span class="font-math font-bold">2b</span> sendirian.</li>
                        <li><strong>Kumpulkan:</strong> <span class="font-math">7a − 3a + 2b</span> (Tanda minus ikut pindah bersama suku di belakangnya!).</li>
                        <li><strong>Hitung koefisiennya:</strong> <span class="font-math font-bold text-purple-700">(7 − 3)a + 2b = 4a + 2b</span>.</li>
                    </ol>

                    <div class="p-3.5 bg-amber-50 border border-amber-200 rounded-xl text-xs text-amber-900">
                        <strong>Sifat Komutatif:</strong> Urutan suku bebas dibalik (contoh: <span class="font-math">4a + 2b</span> sama dengan <span class="font-math">2b + 4a</span>). Tetapi tanda minus wajib menempel pada suku di belakangnya!
                    </div>
                </div>

                <!-- 2.4 Koefisien Pecahan -->
                <div class="space-y-3 pt-2">
                    <h3 class="text-xl font-bold text-gray-800 flex items-center gap-2">
                        <span class="w-7 h-7 rounded-lg bg-purple-100 text-purple-700 flex items-center justify-center text-xs font-bold">2.4</span>
                        Koefisien Pecahan
                    </h3>
                    <p class="text-sm text-gray-600">Caranya sama persis, hanya penyebut pecahan yang harus disamakan terlebih dahulu (KPK):</p>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 text-xs font-mono">
                        <div class="p-3 bg-gray-50 rounded-xl border border-gray-200">
                            1/2 x + 1/2 x = <strong>x</strong>
                        </div>
                        <div class="p-3 bg-gray-50 rounded-xl border border-gray-200">
                            2/3 a + 1/4 a = (8/12 + 3/12)a = <strong class="text-purple-700 font-bold">11/12 a</strong>
                        </div>
                        <div class="p-3 bg-gray-50 rounded-xl border border-gray-200">
                            1/3 m − 1/2 m = (2/6 − 3/6)m = <strong class="text-purple-700 font-bold">−1/6 m</strong>
                        </div>
                    </div>
                </div>

                <!-- 2.5 Kesalahan Umum Tabel -->
                <div class="space-y-3 pt-2">
                    <h4 class="text-sm font-bold text-gray-800">2.5 Kesalahan Umum & Uji Coba Angka</h4>
                    <div class="overflow-x-auto">
                        <table class="w-full text-xs text-left border-collapse border border-gray-200 rounded-xl overflow-hidden">
                            <thead class="bg-gray-100 text-gray-700 font-bold uppercase text-[10px]">
                                <tr>
                                    <th class="p-3 border border-gray-200 text-rose-700">Yang Salah</th>
                                    <th class="p-3 border border-gray-200">Kenapa Salah?</th>
                                    <th class="p-3 border border-gray-200 text-emerald-700">Yang Benar</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 text-gray-600">
                                <tr>
                                    <td class="p-3 font-math font-bold text-rose-600 border border-gray-200">2x + 3y = 5xy</td>
                                    <td class="p-3 border border-gray-200">x dan y bukan barang yang sama</td>
                                    <td class="p-3 font-math font-bold text-emerald-600 border border-gray-200">2x + 3y (tetap)</td>
                                </tr>
                                <tr>
                                    <td class="p-3 font-math font-bold text-rose-600 border border-gray-200">3x + 4 = 7x</td>
                                    <td class="p-3 border border-gray-200">3x dan 4 tidak sejenis</td>
                                    <td class="p-3 font-math font-bold text-emerald-600 border border-gray-200">3x + 4</td>
                                </tr>
                                <tr>
                                    <td class="p-3 font-math font-bold text-rose-600 border border-gray-200">x + x = x²</td>
                                    <td class="p-3 border border-gray-200">Menjumlah, bukan mengalikan</td>
                                    <td class="p-3 font-math font-bold text-emerald-600 border border-gray-200">x + x = 2x</td>
                                </tr>
                                <tr>
                                    <td class="p-3 font-math font-bold text-rose-600 border border-gray-200">7a − 3a = 4</td>
                                    <td class="p-3 border border-gray-200">Variabel a ikut hilang</td>
                                    <td class="p-3 font-math font-bold text-emerald-600 border border-gray-200">4a</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- ======================================================== -->
                <!-- KUIS LATIHAN SUB-BAB 2 (K2.1 - K2.4)                     -->
                <!-- ======================================================== -->
                <div class="mt-10 pt-8 border-t-2 border-dashed border-purple-200">
                    <div class="bg-purple-600 rounded-2xl p-5 text-white flex items-center justify-between mb-6 shadow-sm">
                        <div>
                            <span class="text-xs uppercase tracking-wider text-purple-200 font-bold block">Latihan Formatif Sub-Bab 2</span>
                            <h3 class="text-xl font-extrabold">Kuis Latihan: Suku Sejenis (4 Soal)</h3>
                            <p class="text-xs text-purple-100 mt-0.5">Syarat tuntas: benar minimal 3 dari 4 soal. Gunakan tombol Cek Step & Hint AI!</p>
                        </div>
                        <span id="scoreBadge2" class="text-xs font-bold bg-white text-purple-700 px-3 py-1.5 rounded-full shadow-sm">
                            0 / 4 Tuntas
                        </span>
                    </div>

                    <div id="quizContainerSubbab2" class="space-y-6">
                        <!-- JS Render Soal K2.1 - K2.4 -->
                    </div>
                </div>
            </section>


            <!-- ======================================================== -->
            <!-- SUB-BAB 3: SIFAT DISTRIBUTIF & FAKTOR (TP 4)             -->
            <!-- ======================================================== -->
            <section id="panelSubbab3" class="hidden space-y-8">
                <!-- Header Sub-Bab -->
                <div class="border-b border-gray-100 pb-5">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="text-xs text-teal-700 bg-teal-50 px-3 py-1 rounded-md font-semibold border border-teal-100">
                            Unit 3 / Sub-Bab 3 • TP 4
                        </span>
                        <span class="text-xs text-emerald-700 bg-emerald-50 px-2.5 py-1 rounded-md font-semibold border border-emerald-100">
                            4 Soal Latihan
                        </span>
                    </div>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 tracking-tight">
                        Sifat Distributif dan Bentuk yang Sama Nilainya
                    </h2>
                    <p class="text-sm text-gray-500 mt-1">
                        Eksplorasi ubin kolam renang, konsep bentuk ekuivalen, sifat distributif, bentuk jabaran vs bentuk faktor, dan menjabarkan tanda minus.
                    </p>
                </div>

                <!-- Pertanyaan Pembuka -->
                <div class="bg-teal-50/70 border-l-4 border-teal-500 p-4 rounded-r-2xl">
                    <div class="flex items-start gap-3">
                        <i class="fas fa-question-circle text-teal-600 text-xl mt-0.5"></i>
                        <div>
                            <h4 class="font-bold text-teal-900 text-sm">Pertanyaan Pembuka</h4>
                            <p class="text-xs sm:text-sm text-teal-800 mt-0.5">
                                Ada banyak cara menuliskan jumlah ubin di tepi kolam renang. Mana rumus yang benar dan mana yang keliru?
                            </p>
                        </div>
                    </div>
                </div>

                <!-- 3.1 Cerita Ubin Kolam & Simulasi -->
                <div class="space-y-4">
                    <h3 class="text-xl font-bold text-gray-800 flex items-center gap-2">
                        <span class="w-7 h-7 rounded-lg bg-teal-100 text-teal-700 flex items-center justify-center text-xs font-bold">3.1</span>
                        Cerita Ubin Kolam
                    </h3>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        Kolam persegi bersisi <span class="font-math font-bold">s</span> meter dikelilingi ubin 1 m × 1 m. Rani membaginya jadi 4 sisi (masing-masing <span class="font-math">s</span> ubin) dan 4 ubin di pojok. Banyak ubin Rani: <strong class="font-math text-teal-800 text-base">4s + 4</strong>.
                    </p>

                    <!-- SIMULASI UBIN KOLAM RENANG (Eksplorasi 4.2) -->
                    <div class="p-6 rounded-2xl bg-white border border-gray-200 shadow-sm space-y-4">
                        <div class="flex items-center justify-between border-b border-gray-100 pb-3">
                            <div class="flex items-center gap-2">
                                <span class="w-6 h-6 rounded-md bg-teal-600 text-white flex items-center justify-center text-xs font-bold"><i class="fas fa-water"></i></span>
                                <h4 class="font-bold text-gray-800 text-sm">Penguji Bentuk Ekuivalen Ubin Kolam Renang</h4>
                            </div>
                            <span class="text-xs text-teal-600 font-semibold bg-teal-50 px-2 py-0.5 rounded">Simulasi Interaktif</span>
                        </div>

                        <!-- Slider Sisi Kolam -->
                        <div class="space-y-1.5 bg-gray-50 p-4 rounded-xl border border-gray-200">
                            <div class="flex items-center justify-between text-xs font-bold text-gray-700">
                                <span>Ukuran Sisi Kolam (<span class="font-math text-teal-600">s</span> meter):</span>
                                <span id="poolVal" class="text-base text-teal-600 font-mono">10 m</span>
                            </div>
                            <input type="range" id="poolRange" min="2" max="20" value="10" oninput="updatePool()" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer accent-teal-600">
                        </div>

                        <!-- 5 Card Rekan Kerja -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 text-xs">
                            <div class="p-3.5 rounded-xl bg-teal-50 border border-teal-200">
                                <div class="flex items-center justify-between mb-1">
                                    <strong class="text-teal-900">Rani</strong>
                                    <span class="text-[10px] font-bold text-emerald-600">Ekuivalen ✓</span>
                                </div>
                                <div class="font-math text-sm font-bold text-teal-800">4s + 4</div>
                                <div class="text-[11px] text-gray-500 mt-1">4 sisi + 4 sudut</div>
                                <div class="mt-2 font-bold text-teal-700 font-mono text-sm">Hasil: <span id="resRani">44</span></div>
                            </div>

                            <div class="p-3.5 rounded-xl bg-teal-50 border border-teal-200">
                                <div class="flex items-center justify-between mb-1">
                                    <strong class="text-teal-900">Joko</strong>
                                    <span class="text-[10px] font-bold text-emerald-600">Ekuivalen ✓</span>
                                </div>
                                <div class="font-math text-sm font-bold text-teal-800">4(s + 1)</div>
                                <div class="text-[11px] text-gray-500 mt-1">Bentuk faktor distributif</div>
                                <div class="mt-2 font-bold text-teal-700 font-mono text-sm">Hasil: <span id="resJoko">44</span></div>
                            </div>

                            <div class="p-3.5 rounded-xl bg-teal-50 border border-teal-200">
                                <div class="flex items-center justify-between mb-1">
                                    <strong class="text-teal-900">Wisnu</strong>
                                    <span class="text-[10px] font-bold text-emerald-600">Ekuivalen ✓</span>
                                </div>
                                <div class="font-math text-sm font-bold text-teal-800">s + s + s + s + 4</div>
                                <div class="text-[11px] text-gray-500 mt-1">4 sisi lepas + 4 pojok</div>
                                <div class="mt-2 font-bold text-teal-700 font-mono text-sm">Hasil: <span id="resWisnu">44</span></div>
                            </div>

                            <div class="p-3.5 rounded-xl bg-teal-50 border border-teal-200">
                                <div class="flex items-center justify-between mb-1">
                                    <strong class="text-teal-900">Ayu</strong>
                                    <span class="text-[10px] font-bold text-emerald-600">Ekuivalen ✓</span>
                                </div>
                                <div class="font-math text-sm font-bold text-teal-800">2(s + 2) + 2s</div>
                                <div class="text-[11px] text-gray-500 mt-1">2 sisi panjang + 2 sisi pendek</div>
                                <div class="mt-2 font-bold text-teal-700 font-mono text-sm">Hasil: <span id="resAyu">44</span></div>
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
                                <div class="mt-2 font-bold text-rose-700 font-mono text-sm">Hasil: <span id="resRiska">48</span> (Kelebihan 4)</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 3.2 Bentuk Ekuivalen -->
                <div class="space-y-3 pt-2">
                    <h3 class="text-xl font-bold text-gray-800 flex items-center gap-2">
                        <span class="w-7 h-7 rounded-lg bg-teal-100 text-teal-700 flex items-center justify-center text-xs font-bold">3.2</span>
                        Bentuk Ekuivalen
                    </h3>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        Dua bentuk aljabar disebut <strong>ekuivalen</strong> jika nilainya selalu sama untuk <strong>angka berapa pun</strong> yang disubstitusikan ke variabelnya.
                    </p>
                    <div class="p-3.5 rounded-xl bg-amber-50 border border-amber-200 text-xs text-amber-900 space-y-1">
                        <strong>⚠️ Jebakan Mencoba Angka:</strong>
                        <p>Dua bentuk aljabar bisa kebetulan menghasilkan angka sama pada satu nilai saja. Contoh: <span class="font-math font-bold">2x</span> dan <span class="font-math font-bold">x + 2</span>. Pada x = 2, keduanya bernilai 4 (sama). Tapi pada x = 3, nilainya 6 dan 5 (berbeda!). Jadi untuk membuktikan kesetaraan, kita harus menggunakan sifat-sifat aljabar.</p>
                    </div>
                </div>

                <!-- 3.3 Sifat Distributif & 3.4 Faktor vs Jabaran -->
                <div class="space-y-3 pt-2">
                    <h3 class="text-xl font-bold text-gray-800 flex items-center gap-2">
                        <span class="w-7 h-7 rounded-lg bg-teal-100 text-teal-700 flex items-center justify-center text-xs font-bold">3.3 - 3.4</span>
                        Sifat Distributif, Bentuk Jabaran, & Bentuk Faktor
                    </h3>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        Bayangkan luas persegi panjang dengan lebar <span class="font-math">a</span> dan panjang <span class="font-math">(b + c)</span>:
                    </p>
                    <div class="bg-teal-50 p-4 rounded-2xl border border-teal-200 text-center font-math font-bold text-teal-900 text-lg sm:text-xl space-y-1">
                        <div>a(b + c) = ab + ac</div>
                        <div>a(b − c) = ab − ac</div>
                    </div>
                    <p class="text-xs text-gray-500">
                        <em>Cara bacanya: Pengali di luar tanda kurung membagikan dirinya ke semua suku di dalam kurung.</em>
                    </p>

                    <!-- Tabel Komparasi Faktor vs Jabaran -->
                    <div class="overflow-x-auto pt-2">
                        <table class="w-full text-xs text-left border-collapse border border-gray-200 rounded-xl overflow-hidden">
                            <thead class="bg-gray-100 text-gray-700 font-bold uppercase text-[10px]">
                                <tr>
                                    <th class="p-3 border border-gray-200">Bentuk Faktor (Ada Kurung)</th>
                                    <th class="p-3 border border-gray-200 text-center">Operasi</th>
                                    <th class="p-3 border border-gray-200">Bentuk Jabaran (Tanpa Kurung)</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 text-gray-700 font-math">
                                <tr>
                                    <td class="p-3 font-bold text-teal-700 border border-gray-200">4(s + 1)</td>
                                    <td class="p-3 text-center text-xs font-sans text-gray-400 border border-gray-200">← Memfaktorkan / Menjabarkan →</td>
                                    <td class="p-3 font-bold text-gray-800 border border-gray-200">4s + 4</td>
                                </tr>
                                <tr>
                                    <td class="p-3 font-bold text-teal-700 border border-gray-200">3(x + 4)</td>
                                    <td class="p-3 text-center text-xs font-sans text-gray-400 border border-gray-200">← Memfaktorkan / Menjabarkan →</td>
                                    <td class="p-3 font-bold text-gray-800 border border-gray-200">3x + 12</td>
                                </tr>
                                <tr>
                                    <td class="p-3 font-bold text-teal-700 border border-gray-200">3(2x + 3)</td>
                                    <td class="p-3 text-center text-xs font-sans text-gray-400 border border-gray-200">← FPB 3 Ditarik Keluar →</td>
                                    <td class="p-3 font-bold text-gray-800 border border-gray-200">6x + 9</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- 3.5 & 3.6 Menjabarkan dengan Tanda Minus -->
                <div class="space-y-3 pt-2">
                    <h3 class="text-xl font-bold text-gray-800 flex items-center gap-2">
                        <span class="w-7 h-7 rounded-lg bg-teal-100 text-teal-700 flex items-center justify-center text-xs font-bold">3.5 - 3.6</span>
                        Menjabarkan dengan Tanda Minus & Sederhanakan
                    </h3>
                    <div class="p-4 bg-gray-50 rounded-2xl border border-gray-200 space-y-2 text-xs sm:text-sm">
                        <strong class="text-gray-800 block">Contoh: (5x − 1) − (2x + 3)</strong>
                        <div class="font-math text-gray-700 space-y-1 pl-2 border-l-2 border-teal-400">
                            <div>= 5x − 1 − 2x − 3 <span class="font-sans text-rose-600 text-xs">(Perhatikan: tanda +3 berubah jadi −3!)</span></div>
                            <div>= (5 − 2)x + (−1 − 3)</div>
                            <div>= <strong class="text-teal-700 text-base">3x − 4</strong></div>
                        </div>
                    </div>
                </div>

                <!-- ======================================================== -->
                <!-- KUIS LATIHAN SUB-BAB 3 (K3.1 - K3.4)                     -->
                <!-- ======================================================== -->
                <div class="mt-10 pt-8 border-t-2 border-dashed border-teal-200">
                    <div class="bg-teal-600 rounded-2xl p-5 text-white flex items-center justify-between mb-6 shadow-sm">
                        <div>
                            <span class="text-xs uppercase tracking-wider text-teal-200 font-bold block">Latihan Formatif Sub-Bab 3</span>
                            <h3 class="text-xl font-extrabold">Kuis Latihan: Distributif & Faktor (4 Soal)</h3>
                            <p class="text-xs text-teal-100 mt-0.5">Syarat tuntas: benar minimal 3 dari 4 soal. Gunakan tombol Cek Step & Hint AI!</p>
                        </div>
                        <span id="scoreBadge3" class="text-xs font-bold bg-white text-teal-700 px-3 py-1.5 rounded-full shadow-sm">
                            0 / 4 Tuntas
                        </span>
                    </div>

                    <div id="quizContainerSubbab3" class="space-y-6">
                        <!-- JS Render Soal K3.1 - K3.4 -->
                    </div>
                </div>
            </section>


            <!-- ======================================================== -->
            <!-- SUB-BAB 4: PEMODELAN DENGAN BENTUK ALJABAR (TP 5)         -->
            <!-- ======================================================== -->
            <section id="panelSubbab4" class="hidden space-y-8">
                <!-- Header Sub-Bab -->
                <div class="border-b border-gray-100 pb-5">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="text-xs text-rose-700 bg-rose-50 px-3 py-1 rounded-md font-semibold border border-rose-100">
                            Unit 4 / Sub-Bab 4 • TP 5
                        </span>
                        <span class="text-xs text-emerald-700 bg-emerald-50 px-2.5 py-1 rounded-md font-semibold border border-emerald-100">
                            4 Soal Latihan
                        </span>
                    </div>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 tracking-tight">
                        Mengubah Cerita Menjadi Bentuk Aljabar
                    </h2>
                    <p class="text-sm text-gray-500 mt-1">
                        5 langkah pemodelan, pemodelan jarak-waktu Wisnu, relasi tinggi keluarga Linda, uji kewajaran berat buah, teka-teki bilangan, dan tarif ojek online.
                    </p>
                </div>

                <!-- Pertanyaan Pembuka -->
                <div class="bg-rose-50/70 border-l-4 border-rose-500 p-4 rounded-r-2xl">
                    <div class="flex items-start gap-3">
                        <i class="fas fa-question-circle text-rose-600 text-xl mt-0.5"></i>
                        <div>
                            <h4 class="font-bold text-rose-900 text-sm">Pertanyaan Pembuka</h4>
                            <p class="text-xs sm:text-sm text-rose-800 mt-0.5">
                                Bagaimana caranya supaya satu rumus aljabar yang pendek bisa menjawab banyak variasi soal cerita sehari-hari?
                            </p>
                        </div>
                    </div>
                </div>

                <!-- 4.1 Lima Langkah Memodelkan -->
                <div class="space-y-3">
                    <h3 class="text-xl font-bold text-gray-800 flex items-center gap-2">
                        <span class="w-7 h-7 rounded-lg bg-rose-100 text-rose-700 flex items-center justify-center text-xs font-bold">4.1</span>
                        Lima Langkah Memodelkan
                    </h3>
                    <ol class="list-decimal list-inside space-y-1.5 text-xs sm:text-sm text-gray-700 bg-gray-50 p-4 rounded-2xl border border-gray-200">
                        <li><strong>Baca ceritanya:</strong> Tentukan apa yang sebenarnya ditanyakan.</li>
                        <li><strong>Pilih huruf (variabel):</strong> Untuk nilai yang berubah/belum diketahui (misal <span class="font-math">t</span> = waktu dalam detik).</li>
                        <li><strong>Terjemahkan kata-kata:</strong> Ubah kalimat bahasa Indonesia menjadi operasi hitung.</li>
                        <li><strong>Tulis bentuk aljabar:</strong> Sederhanakan bentuknya jika memungkinkan.</li>
                        <li><strong>Substitusi angka & cek kewajaran:</strong> Pastikan hasilnya masuk akal dalam situasi nyata!</li>
                    </ol>

                    <!-- Kamus Terjemahan Cerita -->
                    <div class="overflow-x-auto pt-1">
                        <table class="w-full text-xs text-left border-collapse border border-gray-200 rounded-xl overflow-hidden">
                            <thead class="bg-gray-100 text-gray-700 font-bold uppercase text-[10px]">
                                <tr>
                                    <th class="p-3 border border-gray-200">Kata di Dalam Cerita</th>
                                    <th class="p-3 border border-gray-200">Operasi Aljabar</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 text-gray-600">
                                <tr><td class="p-2.5 border border-gray-200">Lebih, ditambah, bertambah</td><td class="p-2.5 font-bold text-blue-600 border border-gray-200">+</td></tr>
                                <tr><td class="p-2.5 border border-gray-200">Kurang, lebih ringan, lebih pendek, dikurangi</td><td class="p-2.5 font-bold text-blue-600 border border-gray-200">−</td></tr>
                                <tr><td class="p-2.5 border border-gray-200">2 kali, 3 kali lipat</td><td class="p-2.5 font-bold text-blue-600 border border-gray-200">×</td></tr>
                                <tr><td class="p-2.5 border border-gray-200">Setengah dari</td><td class="p-2.5 font-bold text-blue-600 border border-gray-200">× 1/2 (atau dibagi 2)</td></tr>
                                <tr><td class="p-2.5 border border-gray-200">Dibagi rata untuk 6 orang</td><td class="p-2.5 font-bold text-blue-600 border border-gray-200">÷ 6</td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- 4.2 Jarak & Waktu Wisnu -->
                <div class="space-y-4 pt-2">
                    <h3 class="text-xl font-bold text-gray-800 flex items-center gap-2">
                        <span class="w-7 h-7 rounded-lg bg-rose-100 text-rose-700 flex items-center justify-center text-xs font-bold">4.2</span>
                        Jarak dan Waktu ke Sekolah (Wisnu)
                    </h3>
                    
                    <div class="p-6 rounded-2xl bg-white border border-gray-200 shadow-sm space-y-4">
                        <div class="flex items-center justify-between border-b border-gray-100 pb-3">
                            <h4 class="font-bold text-gray-800 text-sm">Simulasi Interaktif: Perjalanan Motor Wisnu</h4>
                            <span class="text-xs text-rose-600 font-semibold bg-rose-50 px-2.5 py-0.5 rounded">Eksplorasi 4.4</span>
                        </div>

                        <p class="text-xs text-gray-600">
                            Rumah ke sekolah 5.000 meter. Kecepatan 15 m/detik. Rumus jarak tersisa: <strong class="font-math text-rose-700 text-sm">5.000 − 15t</strong> meter.
                        </p>

                        <!-- Slider Waktu t -->
                        <div class="space-y-1.5 bg-gray-50 p-4 rounded-xl border border-gray-200">
                            <div class="flex items-center justify-between text-xs font-bold text-gray-700">
                                <span>Waktu Tempuh (<span class="font-math text-rose-600">t</span> detik):</span>
                                <div>
                                    <span id="tripSec" class="text-base text-rose-600 font-mono">120</span> detik
                                    <span id="tripMin" class="text-[11px] text-gray-400 font-normal">(2 Menit)</span>
                                </div>
                            </div>
                            <input type="range" id="tripRange" min="0" max="333" value="120" oninput="updateTrip()" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer accent-rose-600">
                        </div>

                        <div class="w-full bg-gray-100 rounded-full h-2.5 overflow-hidden">
                            <div id="tripBarEl" class="bg-rose-600 h-2.5 rounded-full transition-all duration-150" style="width: 36%;"></div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-xs pt-1">
                            <div class="p-3 rounded-xl bg-blue-50 border border-blue-200">
                                <span class="text-[10px] text-blue-700 font-bold block">Jarak Ditempuh:</span>
                                <div class="font-math text-base font-bold text-blue-900">15t = <span id="tripDistDone">1.800</span> m</div>
                            </div>
                            <div class="p-3 rounded-xl bg-gray-50 border border-gray-200">
                                <span class="text-[10px] text-gray-500 font-bold block">Sisa Jarak ke Sekolah:</span>
                                <div class="font-math text-base font-bold text-gray-800">5.000 − 15t = <span id="tripDistLeft">3.200</span> m</div>
                            </div>
                        </div>

                        <div class="p-2.5 bg-amber-50 border border-amber-200 rounded-lg text-[11px] text-amber-900">
                            ⚠️ <strong>Jebakan Satuan:</strong> Jika di soal ditanya <em>"setelah 1 menit"</em>, harus diubah dulu ke satuan detik: 1 menit = <strong>60 detik</strong>! Jangan memasukkan t = 1 langsung.
                        </div>
                    </div>
                </div>

                <!-- 4.3 Berat Buah & Kewajaran & 4.4 Keluarga Linda -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs pt-2">
                    <div class="p-4 rounded-xl bg-gray-50 border border-gray-200 space-y-2">
                        <strong class="text-gray-800 block text-sm font-bold">Uji Kewajaran Nilai Variabel (Berat Buah)</strong>
                        <p class="text-gray-600">Jeruk = <span class="font-math">t</span> kg. Anggur = 5 kg lebih ringan dari belimbing (<span class="font-math">t − 2</span>) = <strong class="font-math text-rose-700">t − 7</strong> kg.</p>
                        <div class="p-2.5 rounded-lg bg-rose-50 text-rose-800 border border-rose-200">
                            Jika <span class="font-math">t = 3</span>, maka berat anggur = 3 − 7 = <strong>−4 kg</strong> (berat bernilai negatif tidak mungkin di alam nyata). Maka variabel dibatasi: <span class="font-math font-bold">t > 7</span> kg.
                        </div>
                    </div>

                    <div class="p-4 rounded-xl bg-gray-50 border border-gray-200 space-y-2">
                        <strong class="text-gray-800 block text-sm font-bold">Tinggi Keluarga Linda</strong>
                        <p class="text-gray-600">Tinggi Linda = <span class="font-math">L</span> cm.</p>
                        <ul class="space-y-1 text-gray-600">
                            <li>• Endah (2 kali Linda) = <span class="font-math font-bold">2L</span></li>
                            <li>• Rizki = <span class="font-math font-bold">2L + 13</span></li>
                            <li>• Ibu (30 cm lebih pendek dari 4 kali Linda) = <strong class="font-math text-rose-700">4L − 30</strong></li>
                            <li>• Ayah = 2(2L + 13) − 30 = <span class="font-math font-bold">4L − 4</span></li>
                        </ul>
                    </div>
                </div>

                <!-- 4.5 Teka-Teki Sulap & 4.6 Ojol -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs pt-2">
                    <!-- Sulap Teka Teki Bilangan -->
                    <div class="p-4 rounded-xl bg-white border border-gray-200 shadow-sm space-y-3">
                        <div class="flex items-center gap-2">
                            <i class="fas fa-wand-magic-sparkles text-amber-500"></i>
                            <strong class="text-gray-800 text-sm font-bold">Teka-Teki Sulap: Selalu Bernilai 3</strong>
                        </div>
                        <p class="text-gray-600">Pilih sembarang angka awal <span class="font-math">n</span>:</p>
                        <div class="flex items-center gap-2">
                            <input type="number" id="magicNum" value="7" class="w-20 px-2 py-1 border border-gray-300 rounded text-center font-bold">
                            <button onclick="calcMagic()" class="px-3 py-1 bg-blue-600 text-white font-bold rounded hover:bg-blue-700">Coba</button>
                            <span class="text-xs text-gray-500 font-mono">Hasil: <strong id="st5" class="text-blue-700 text-sm">3</strong></span>
                        </div>
                        <p class="text-[11px] text-gray-500">
                            Aljabar membuktikan: <span class="font-math">(2n + 6)/2 − n = (n + 3) − n = 3</span>. Nilai n saling menghabisi di akhir!
                        </p>
                    </div>

                    <!-- Literasi Ojol -->
                    <div class="p-4 rounded-xl bg-white border border-gray-200 shadow-sm space-y-3">
                        <div class="flex items-center gap-2">
                            <i class="fas fa-motorcycle text-blue-600"></i>
                            <strong class="text-gray-800 text-sm font-bold">Komparator Tarif Ojol</strong>
                        </div>
                        <div class="flex items-center justify-between text-gray-700">
                            <span>Jarak: <strong id="ojolKmVal" class="text-blue-600 font-mono">5 km</strong></span>
                            <input type="range" id="ojolKmRange" min="1" max="25" value="5" oninput="updateOjol()" class="w-28 accent-blue-600">
                        </div>
                        <div class="grid grid-cols-3 gap-1 text-[11px] text-center font-mono">
                            <div class="p-1.5 bg-gray-50 rounded border">Gogo: <div id="costGogo" class="font-bold text-gray-800">12.500</div></div>
                            <div class="p-1.5 bg-blue-50 rounded border border-blue-200">Gaga: <div id="costGaga" class="font-bold text-blue-700">10.000</div></div>
                            <div class="p-1.5 bg-gray-50 rounded border">Gugu: <div id="costGugu" class="font-bold text-gray-800">12.000</div></div>
                        </div>
                    </div>
                </div>

                <!-- ======================================================== -->
                <!-- KUIS LATIHAN SUB-BAB 4 (K4.1 - K4.4)                     -->
                <!-- ======================================================== -->
                <div class="mt-10 pt-8 border-t-2 border-dashed border-rose-200">
                    <div class="bg-rose-600 rounded-2xl p-5 text-white flex items-center justify-between mb-6 shadow-sm">
                        <div>
                            <span class="text-xs uppercase tracking-wider text-rose-200 font-bold block">Latihan Formatif Sub-Bab 4</span>
                            <h3 class="text-xl font-extrabold">Kuis Latihan: Pemodelan Aljabar (4 Soal)</h3>
                            <p class="text-xs text-rose-100 mt-0.5">Syarat tuntas: benar minimal 3 dari 4 soal. Gunakan tombol Cek Step & Hint AI!</p>
                        </div>
                        <span id="scoreBadge4" class="text-xs font-bold bg-white text-rose-700 px-3 py-1.5 rounded-full shadow-sm">
                            0 / 4 Tuntas
                        </span>
                    </div>

                    <div id="quizContainerSubbab4" class="space-y-6">
                        <!-- JS Render Soal K4.1 - K4.4 -->
                    </div>
                </div>
            </section>


            <!-- ======================================================== -->
            <!-- PANEL RINGKASAN: RINGKASAN SATU HALAMAN                  -->
            <!-- ======================================================== -->
            <section id="panelRingkasan" class="hidden space-y-6">
                <div class="border-b border-gray-100 pb-4">
                    <span class="text-xs text-amber-700 bg-amber-50 px-3 py-1 rounded-md font-semibold border border-amber-200">
                        Rangkuman Inti Bab 4
                    </span>
                    <h2 class="text-3xl font-extrabold text-gray-900 mt-2">Ringkasan Satu Halaman</h2>
                    <p class="text-sm text-gray-500">Seluruh konsep pokok bentuk aljabar kurikulum kelas VII dalam satu tabel ringkas.</p>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-xs text-left border-collapse border border-gray-200 rounded-2xl overflow-hidden shadow-sm">
                        <thead class="bg-blue-600 text-white font-bold uppercase text-[10px]">
                            <tr>
                                <th class="p-3.5 border-r border-blue-500 w-1/4">Topik</th>
                                <th class="p-3.5">Yang Perlu Diingat</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 text-gray-700 text-xs sm:text-sm">
                            <tr class="hover:bg-blue-50/50">
                                <td class="p-3.5 font-bold text-blue-900 border-r border-gray-200">Variabel</td>
                                <td class="p-3.5 text-gray-600">Huruf pengganti nilai yang berubah-ubah atau belum diketahui (<span class="font-math">x, y, a, b, n</span>).</td>
                            </tr>
                            <tr class="hover:bg-blue-50/50">
                                <td class="p-3.5 font-bold text-blue-900 border-r border-gray-200">Suku, Koefisien, Konstanta</td>
                                <td class="p-3.5 text-gray-600">Suku dipisah tanda + atau −; koefisien = angka pengali variabel; konstanta = angka tetap tanpa variabel. Tanda minus ikut sukunya.</td>
                            </tr>
                            <tr class="hover:bg-blue-50/50">
                                <td class="p-3.5 font-bold text-blue-900 border-r border-gray-200">Substitusi</td>
                                <td class="p-3.5 text-gray-600">Ganti huruf dengan angka yang ditentukan, hitung dengan tertib operasi, lalu tafsirkan hasilnya sesuai konteks nyata.</td>
                            </tr>
                            <tr class="hover:bg-blue-50/50">
                                <td class="p-3.5 font-bold text-blue-900 border-r border-gray-200">Suku Sejenis</td>
                                <td class="p-3.5 text-gray-600">Variabel dan pangkatnya sama; jumlahkan atau kurangkan koefisiennya saja, variabel tetap (<span class="font-math">5x + 7x = 12x</span>). Suku tidak sejenis tak boleh digabung (<span class="font-math">2x + 3y ≠ 5xy</span>).</td>
                            </tr>
                            <tr class="hover:bg-blue-50/50">
                                <td class="p-3.5 font-bold text-blue-900 border-r border-gray-200">Distributif</td>
                                <td class="p-3.5 text-gray-600 font-math">a(b + c) = ab + ac dan a(b − c) = ab − ac. Pengali luar didistribusikan ke setiap suku di dalam kurung.</td>
                            </tr>
                            <tr class="hover:bg-blue-50/50">
                                <td class="p-3.5 font-bold text-blue-900 border-r border-gray-200">Jabaran dan Faktor</td>
                                <td class="p-3.5 text-gray-600">Jabaran = tanpa tanda kurung (<span class="font-math">6x + 9</span>); Faktor = memuat tanda kurung dengan FPB ditarik keluar (<span class="font-math">3(2x + 3)</span>). Keduanya ekuivalen.</td>
                            </tr>
                            <tr class="hover:bg-blue-50/50">
                                <td class="p-3.5 font-bold text-blue-900 border-r border-gray-200">Ekuivalen</td>
                                <td class="p-3.5 text-gray-600">Sama nilainya untuk semua nilai variabel; membuktikannya harus memakai sifat aljabar yang sah, bukan sekadar mencoba 1 nilai.</td>
                            </tr>
                            <tr class="hover:bg-blue-50/50">
                                <td class="p-3.5 font-bold text-blue-900 border-r border-gray-200">Pemodelan</td>
                                <td class="p-3.5 text-gray-600">Pilih huruf, terjemahkan kata-kata ke operasi (+, −, ×, ÷), tulis bentuk aljabar, substitusi angka, dan wajib cek kewajaran hasil (tidak boleh ada besaran negatif yang mustahil).</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="text-center pt-4">
                    <button onclick="activatePanel('evaluasi')" class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold text-sm rounded-xl shadow-md transition inline-flex items-center gap-2">
                        <span>Lanjut ke Evaluasi Akhir</span>
                        <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </section>


            <!-- ======================================================== -->
            <!-- PANEL EVALUASI AKHIR (7 SOAL E1 - E7)                    -->
            <!-- Bebas AI, Timer 20 Menit, Papan Tombol Matematika         -->
            <!-- ======================================================== -->
            <section id="panelEvaluasi" class="hidden space-y-6">
                <!-- Header Evaluasi -->
                <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between border-b border-gray-100 pb-4 gap-3">
                    <div>
                        <div class="flex items-center gap-2 mb-1">
                            <span class="text-xs text-blue-700 bg-blue-50 px-2.5 py-1 rounded-md font-bold border border-blue-100">
                                Ujian Mandiri
                            </span>
                            <span class="text-xs text-emerald-700 bg-emerald-50 px-2.5 py-1 rounded-md font-bold border border-emerald-100">
                                Bebas Panggilan AI
                            </span>
                        </div>
                        <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900">Evaluasi Akhir Aljabar</h2>
                    </div>

                    <!-- Timer Countdown (20 Menit) -->
                    <div class="bg-gray-900 text-white px-4 py-2.5 rounded-2xl flex items-center gap-3 shadow-sm">
                        <i class="fas fa-clock text-blue-400 text-lg animate-pulse"></i>
                        <div>
                            <div class="text-[10px] text-gray-400 uppercase font-semibold">Sisa Waktu</div>
                            <div id="evalTimerVal" class="text-lg font-mono font-extrabold tracking-wider text-amber-400">20:00</div>
                        </div>
                    </div>
                </div>

                <!-- Box Pengerjaan Evaluasi -->
                <div id="boxEvaluasiWork" class="space-y-6">
                    <!-- Progress Bar Soal -->
                    <div class="space-y-1">
                        <div class="flex items-center justify-between text-xs text-gray-500 font-semibold">
                            <span id="evalProgressText">Soal 1 dari 7</span>
                            <span id="evalStatusSave" class="text-blue-600"><i class="fas fa-keyboard mr-1"></i>Masukkan jawaban</span>
                        </div>
                        <div class="w-full bg-gray-100 rounded-full h-2 overflow-hidden">
                            <div id="evalProgressBar" class="bg-blue-600 h-2 rounded-full transition-all duration-300" style="width: 14%;"></div>
                        </div>
                    </div>

                    <!-- Kartu Soal Evaluasi -->
                    <div class="p-6 rounded-2xl bg-gray-50 border border-gray-200 space-y-4">
                        <div class="flex items-center justify-between text-xs">
                            <span id="evalTpBadge" class="font-bold text-blue-700 bg-blue-100 px-2.5 py-0.5 rounded">TP 2: Unsur Bentuk Aljabar</span>
                            <span id="evalShapeBadge" class="text-gray-500 font-mono text-[11px] bg-white px-2 py-0.5 rounded border">Bentuk: nilai</span>
                        </div>

                        <h3 id="evalQuestionText" class="text-base sm:text-lg font-bold text-gray-800 leading-relaxed">
                            Memuat soal...
                        </h3>

                        <!-- Input Box Jawaban Siswa -->
                        <div class="space-y-2 pt-2">
                            <label class="text-xs font-bold text-gray-700 block">Jawaban Akhirmu:</label>
                            <div class="flex items-center gap-2">
                                <input type="text" id="evalInputAnswer" placeholder="Ketik atau gunakan papan tombol di bawah..." class="flex-1 px-4 py-3 rounded-xl border border-gray-300 text-sm font-mono font-bold focus:border-blue-600 focus:ring-2 focus:ring-blue-100 outline-none transition bg-white" oninput="onEvalInputChanged()">
                                <button onclick="evalClearInput()" class="px-3 py-3 rounded-xl bg-gray-200 hover:bg-gray-300 text-gray-600 text-xs font-bold transition" title="Hapus input">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </div>
                            <p class="text-[11px] text-gray-400">
                                💡 Tip: Kamu bisa mengetik langsung dengan keyboard laptop/PC atau mengklik tombol matematika di bawah.
                            </p>
                        </div>

                        <!-- Papan Tombol Matematika untuk Evaluasi -->
                        <div class="pt-2 border-t border-gray-200">
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-[11px] font-bold text-gray-500 uppercase tracking-wider">Papan Tombol Matematika:</span>
                                <span class="text-[10px] text-gray-400">x, y, a, b, angka & operasi</span>
                            </div>
                            <!-- Grid Tombol -->
                            <div class="grid grid-cols-6 sm:grid-cols-10 gap-1.5">
                                <button type="button" onclick="insertEvalChar('x')" class="p-2.5 rounded-lg bg-white border border-gray-200 hover:border-blue-500 font-math font-bold text-blue-700 text-sm shadow-sm transition">x</button>
                                <button type="button" onclick="insertEvalChar('y')" class="p-2.5 rounded-lg bg-white border border-gray-200 hover:border-blue-500 font-math font-bold text-blue-700 text-sm shadow-sm transition">y</button>
                                <button type="button" onclick="insertEvalChar('a')" class="p-2.5 rounded-lg bg-white border border-gray-200 hover:border-blue-500 font-math font-bold text-blue-700 text-sm shadow-sm transition">a</button>
                                <button type="button" onclick="insertEvalChar('b')" class="p-2.5 rounded-lg bg-white border border-gray-200 hover:border-blue-500 font-math font-bold text-blue-700 text-sm shadow-sm transition">b</button>
                                <button type="button" onclick="insertEvalChar('+')" class="p-2.5 rounded-lg bg-gray-100 border border-gray-200 hover:border-blue-500 font-bold text-gray-700 text-sm shadow-sm transition">+</button>
                                <button type="button" onclick="insertEvalChar('−')" class="p-2.5 rounded-lg bg-gray-100 border border-gray-200 hover:border-blue-500 font-bold text-gray-700 text-sm shadow-sm transition">−</button>
                                <button type="button" onclick="insertEvalChar('×')" class="p-2.5 rounded-lg bg-gray-100 border border-gray-200 hover:border-blue-500 font-bold text-gray-700 text-sm shadow-sm transition">×</button>
                                <button type="button" onclick="insertEvalChar('÷')" class="p-2.5 rounded-lg bg-gray-100 border border-gray-200 hover:border-blue-500 font-bold text-gray-700 text-sm shadow-sm transition">÷</button>
                                <button type="button" onclick="insertEvalChar('(')" class="p-2.5 rounded-lg bg-gray-100 border border-gray-200 hover:border-blue-500 font-bold text-gray-700 text-sm shadow-sm transition">(</button>
                                <button type="button" onclick="insertEvalChar(')')" class="p-2.5 rounded-lg bg-gray-100 border border-gray-200 hover:border-blue-500 font-bold text-gray-700 text-sm shadow-sm transition">)</button>

                                <button type="button" onclick="insertEvalChar('7')" class="p-2.5 rounded-lg bg-white border border-gray-200 hover:border-blue-500 font-bold text-gray-800 text-sm shadow-sm transition">7</button>
                                <button type="button" onclick="insertEvalChar('8')" class="p-2.5 rounded-lg bg-white border border-gray-200 hover:border-blue-500 font-bold text-gray-800 text-sm shadow-sm transition">8</button>
                                <button type="button" onclick="insertEvalChar('9')" class="p-2.5 rounded-lg bg-white border border-gray-200 hover:border-blue-500 font-bold text-gray-800 text-sm shadow-sm transition">9</button>
                                <button type="button" onclick="insertEvalChar('4')" class="p-2.5 rounded-lg bg-white border border-gray-200 hover:border-blue-500 font-bold text-gray-800 text-sm shadow-sm transition">4</button>
                                <button type="button" onclick="insertEvalChar('5')" class="p-2.5 rounded-lg bg-white border border-gray-200 hover:border-blue-500 font-bold text-gray-800 text-sm shadow-sm transition">5</button>
                                <button type="button" onclick="insertEvalChar('6')" class="p-2.5 rounded-lg bg-white border border-gray-200 hover:border-blue-500 font-bold text-gray-800 text-sm shadow-sm transition">6</button>
                                <button type="button" onclick="insertEvalChar('1')" class="p-2.5 rounded-lg bg-white border border-gray-200 hover:border-blue-500 font-bold text-gray-800 text-sm shadow-sm transition">1</button>
                                <button type="button" onclick="insertEvalChar('2')" class="p-2.5 rounded-lg bg-white border border-gray-200 hover:border-blue-500 font-bold text-gray-800 text-sm shadow-sm transition">2</button>
                                <button type="button" onclick="insertEvalChar('3')" class="p-2.5 rounded-lg bg-white border border-gray-200 hover:border-blue-500 font-bold text-gray-800 text-sm shadow-sm transition">3</button>
                                <button type="button" onclick="insertEvalChar('0')" class="p-2.5 rounded-lg bg-white border border-gray-200 hover:border-blue-500 font-bold text-gray-800 text-sm shadow-sm transition">0</button>

                                <button type="button" onclick="insertEvalChar('-')" class="p-2.5 rounded-lg bg-gray-100 border border-gray-200 hover:border-blue-500 font-bold text-rose-700 text-sm shadow-sm transition" title="Tanda negatif">-</button>
                                <button type="button" onclick="insertEvalChar('/')" class="p-2.5 rounded-lg bg-gray-100 border border-gray-200 hover:border-blue-500 font-bold text-gray-700 text-sm shadow-sm transition" title="Garis pecahan">/</button>
                                <button type="button" onclick="evalBackspace()" class="p-2.5 col-span-2 rounded-lg bg-rose-50 border border-rose-200 hover:bg-rose-100 font-bold text-rose-700 text-xs shadow-sm transition">⌫ Hapus</button>
                                <button type="button" onclick="evalClearInput()" class="p-2.5 col-span-2 rounded-lg bg-gray-100 border border-gray-200 hover:bg-gray-200 font-bold text-gray-600 text-xs shadow-sm transition">Clear</button>
                            </div>
                        </div>
                    </div>

                    <!-- Navigasi Soal Evaluasi -->
                    <div class="flex items-center justify-between pt-2">
                        <button id="btnEvalPrev" onclick="evalPrevQ()" class="px-4 py-2.5 rounded-xl text-xs font-semibold text-gray-600 bg-gray-100 hover:bg-gray-200 transition disabled:opacity-30 disabled:pointer-events-none">
                            <i class="fas fa-arrow-left mr-1"></i> Sebelumnya
                        </button>

                        <div class="flex items-center gap-1.5" id="evalDotContainer">
                            <!-- JS render 7 dots -->
                        </div>

                        <button id="btnEvalNext" onclick="evalNextQ()" class="px-5 py-2.5 rounded-xl text-xs font-bold bg-blue-600 hover:bg-blue-700 text-white transition shadow-sm">
                            Selanjutnya <i class="fas fa-arrow-right ml-1"></i>
                        </button>
                    </div>
                </div>

                <!-- Layar Skor Akhir Evaluasi -->
                <div id="boxEvaluasiResult" class="hidden text-center py-8 space-y-6">
                    <div class="w-16 h-16 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center text-3xl mx-auto shadow-inner">
                        <i id="evalResultIcon" class="fas fa-trophy"></i>
                    </div>

                    <div class="space-y-2">
                        <span class="text-xs font-bold uppercase tracking-wider text-gray-400">Hasil Evaluasi Akhir</span>
                        <h3 class="text-2xl sm:text-3xl font-extrabold text-gray-800">Ujian Mandiri Selesai</h3>
                        
                        <div class="py-2">
                            <div class="text-5xl font-black text-blue-600 font-mono">
                                <span id="evalFinalScoreNum">0</span><span class="text-2xl text-gray-400 font-normal"> / 100</span>
                            </div>
                            <div class="text-sm font-bold text-gray-600 mt-1">
                                <span id="evalCorrectCount">0</span> dari 7 Soal Dijawab Benar
                            </div>
                        </div>

                        <div id="evalResultBadge" class="inline-block px-4 py-1.5 rounded-full text-xs font-bold"></div>
                        <p id="evalResultDesc" class="text-xs sm:text-sm text-gray-600 max-w-md mx-auto leading-relaxed pt-1"></p>
                    </div>

                    <!-- Pembahasan Detail 7 Soal -->
                    <div class="text-left max-w-2xl mx-auto pt-4 space-y-3">
                        <h4 class="font-bold text-gray-800 text-sm border-b pb-2 flex items-center gap-2">
                            <i class="fas fa-list-check text-blue-600"></i> Pembahasan Lengkap Tiap Soal:
                        </h4>
                        <div id="evalReviewList" class="space-y-2 text-xs">
                            <!-- JS Render Review Soal E1-E7 -->
                        </div>
                    </div>

                    <div class="pt-4 flex items-center justify-center gap-3">
                        <button onclick="redoEvaluasi()" class="px-6 py-2.5 rounded-full bg-blue-600 hover:bg-blue-700 text-white font-bold text-sm shadow transition inline-flex items-center gap-2">
                            <i class="fas fa-rotate-right"></i> Ulangi Evaluasi
                        </button>
                        <a href="/dashboard" class="px-5 py-2.5 rounded-full bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold text-sm transition">
                            Kembali ke Dashboard
                        </a>
                    </div>
                </div>
            </section>

            <!-- Footer Atribusi Buku Resmi -->
            <div class="pt-8 mt-10 border-t border-gray-100 flex flex-col sm:flex-row items-center justify-between text-xs text-gray-400 gap-2">
                <span>Sumber: Buku Siswa Matematika SMP/MTs Kelas VII Bab 4 (Kemendikbudristek 2022)</span>
                <span>AljabarLearn • Line-by-Line Checker & Socratic AI</span>
            </div>

        </div>
    </main>

    <!-- Modal Dialog Hint AI Socratic (Petunjuk Pancingan) -->
    <div id="modalHintAi" class="hidden fixed inset-0 bg-black/40 backdrop-blur-sm z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-3xl p-6 max-w-md w-full shadow-2xl border border-gray-100 space-y-4 animate-scaleUp">
            <div class="flex items-center justify-between border-b border-gray-100 pb-3">
                <div class="flex items-center gap-2.5">
                    <div class="w-8 h-8 rounded-xl bg-amber-100 text-amber-600 flex items-center justify-center text-sm font-bold">
                        <i class="fas fa-robot"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-800 text-sm">Hint AI • Socratic Tutor</h4>
                        <span id="hintAiCountBadge" class="text-[10px] text-amber-700 bg-amber-50 px-2 py-0.5 rounded font-semibold">Hint 1 dari 3</span>
                    </div>
                </div>
                <button onclick="closeHintModal()" class="w-7 h-7 rounded-lg hover:bg-gray-100 text-gray-400 hover:text-gray-600 flex items-center justify-center text-sm transition">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <div class="space-y-3">
                <div class="p-4 rounded-2xl bg-amber-50/60 border border-amber-200 text-xs sm:text-sm text-amber-950 leading-relaxed space-y-2">
                    <p id="hintAiPromptText">
                        <!-- JS Injection Pancingan Hint -->
                    </p>
                </div>
                <p class="text-[11px] text-gray-400 italic">
                    *Catatan: Socratic Tutor hanya memberikan petunjuk pemicu logika berpikir, tidak pernah memberikan jawaban akhir.
                </p>
            </div>

            <div class="flex items-center justify-end pt-1">
                <button onclick="closeHintModal()" class="px-5 py-2 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs transition">
                    Saya Paham, Lanjutkan
                </button>
            </div>
        </div>
    </div>

    <!-- SCRIPT LOGIKA ALJABARLEARN -->
    <script>
        // ================================================================
        // 1. DATA BANK KUIS RESMI (16 LATIHAN + 7 EVALUASI AKHIR)
        // ================================================================
        const bankLatihan = {
            // SUB-BAB 1: K1.1 - K1.4
            '1': [
                {
                    id: 'K1.1',
                    tp: 'TP 1-3: Unsur Aljabar',
                    tipe: 'isian',
                    bentuk_akhir: 'nilai',
                    soal: 'Berapa banyak suku pada bentuk aljabar 3x − y + 10?',
                    jawaban_akhir: '3',
                    kunci_langkah: ['3'],
                    kesalahan: 'Menjawab 2 (hanya yang berhuruf) atau 4 (menghitung tanda).',
                    hints: [
                        'Suku dipisahkan oleh tanda + atau −. Coba lingkari tiap potongan.',
                        'Apakah angka 10 yang berdiri sendiri tanpa variabel juga merupakan potongan (suku konstanta)?',
                        'Potongannya adalah 3x, −y, dan 10. Ada berapa total suku?'
                    ]
                },
                {
                    id: 'K1.2',
                    tp: 'TP 1-3: Koefisien',
                    tipe: 'isian',
                    bentuk_akhir: 'nilai',
                    soal: 'Tentukan koefisien x pada bentuk aljabar −x − 3.',
                    jawaban_akhir: '-1',
                    kunci_langkah: ['-1'],
                    kesalahan: 'Menjawab 1 (tanda terlewat) atau 0 (mengira x tidak punya angka).',
                    hints: [
                        'Kalau x ditulis lengkap dengan angka pengalinya, bentuknya jadi 1x.',
                        'Tanda minus di depan x itu milik siapa? Apakah angka pengalinya menjadi negatif?',
                        'Koefisien dari −x adalah bilangan pengali di depan variabel tersebut beserta tandanya.'
                    ]
                },
                {
                    id: 'K1.3',
                    tp: 'TP 1-3: Substitusi Nilai',
                    tipe: 'langkah',
                    bentuk_akhir: 'nilai',
                    soal: 'Hitung nilai 10 − 5x untuk x = 3.',
                    jawaban_akhir: '-5',
                    kunci_langkah: ['10 - 5 * 3', '10 - 15', '-5'],
                    kesalahan: '(10 − 5) × 3 = 15, yaitu mengerjakan pengurangan sebelum perkalian.',
                    hints: [
                        'Setelah x diganti 3, operasi mana yang harus dikerjakan lebih dulu, pengurangan atau perkalian?',
                        'Hitung dulu hasil perkalian 5 × 3, lalu kurangkan dari angka 10.',
                        'Berapa hasil dari 10 − 15? Perhatikan tanda bilangan negatifnya.'
                    ]
                },
                {
                    id: 'K1.4',
                    tp: 'TP 1-3: Pemodelan & Substitusi',
                    tipe: 'langkah',
                    bentuk_akhir: 'nilai',
                    soal: 'Total harga tiket di taman bermain adalah 3a + 2b, dengan a = harga tiket anak dan b = harga tiket dewasa. Berapa total yang dibayar jika a = 20000 dan b = 30000?',
                    jawaban_akhir: '120000',
                    kunci_langkah: ['3 * 20000 + 2 * 30000', '60000 + 60000', '120000'],
                    kesalahan: 'Menukar harga anak dan dewasa; menulis 3a sebagai 3 + a.',
                    hints: [
                        'Angka 3 di depan a artinya apa dalam cerita ini? Kalikan harga a dengan 3, dan harga b dengan 2.',
                        'Hitung masing-masing: berapa biaya 3 anak (3 × 20.000) dan 2 dewasa (2 × 30.000)?',
                        'Jumlahkan kedua hasil perkalian tersebut untuk mendapatkan total pembayaran.'
                    ]
                }
            ],

            // SUB-BAB 2: K2.1 - K2.4
            '2': [
                {
                    id: 'K2.1',
                    tp: 'TP 4: Suku Sejenis',
                    tipe: 'isian',
                    bentuk_akhir: 'sederhana',
                    soal: 'Sederhanakan 5x + 7x.',
                    jawaban_akhir: '12x',
                    kunci_langkah: ['12x'],
                    kesalahan: '12x² (menganggap dikali) atau 35x.',
                    hints: [
                        'Kedua suku punya variabel sama (x). Yang dijumlahkan koefisiennya atau variabelnya?',
                        'Ingat analogi barang: 5 apel + 7 apel jadi berapa apel?',
                        'Hitung (5 + 7) lalu tempelkan variabel x di belakangnya.'
                    ]
                },
                {
                    id: 'K2.2',
                    tp: 'TP 4: Suku Sejenis',
                    tipe: 'langkah',
                    bentuk_akhir: 'sederhana',
                    soal: 'Sederhanakan 9a + 4b − 5a − b.',
                    jawaban_akhir: '4a + 3b',
                    kunci_langkah: ['9a - 5a + 4b - b', '(9 - 5)a + (4 - 1)b', '4a + 3b'],
                    kesalahan: '4a + 5b (lupa bahwa −b sama dengan −1b); 13a + 3b (tanda −5a hilang).',
                    hints: [
                        'Suku apa saja yang bersaudara dengan 9a? Kumpulkan suku yang bervariabel a lebih dulu.',
                        'Dan koefisien dari −b itu berapa? Ingat −b sama dengan −1b.',
                        'Hitung masing-masing: (9 − 5)a dan (4 − 1)b.'
                    ]
                },
                {
                    id: 'K2.3',
                    tp: 'TP 4: Suku Sejenis & Konstanta',
                    tipe: 'langkah',
                    bentuk_akhir: 'sederhana',
                    soal: 'Sederhanakan 2x + 8 − 5x + 1.',
                    jawaban_akhir: '-3x + 9',
                    kunci_langkah: ['2x - 5x + 8 + 1', '(2 - 5)x + 9', '-3x + 9'],
                    kesalahan: '3x + 9 (tanda hasil 2 − 5 terbalik); 11x (semua digabung).',
                    hints: [
                        'Berapa hasil 2 − 5? Perhatikan tandanya, apakah positif atau negatif?',
                        'Lalu angka konstanta 8 dan 1 digabung menjadi berapa?',
                        'Gabungkan suku variabel dan konstanta: jangan menyatukan suku x dengan angka biasa!'
                    ]
                },
                {
                    id: 'K2.4',
                    tp: 'TP 4: Koefisien Pecahan',
                    tipe: 'isian',
                    bentuk_akhir: 'sederhana',
                    soal: 'Sederhanakan 2/3 a + 1/4 a.',
                    jawaban_akhir: '11/12 a',
                    kunci_langkah: ['(8/12 + 3/12)a', '11/12 a'],
                    kesalahan: '3/7 a (menjumlahkan pembilang dan penyebut secara langsung).',
                    hints: [
                        'Sebelum dijumlah, pecahan harus punya penyebut yang sama. Berapa KPK dari 3 dan 4?',
                        'Ubah 2/3 menjadi per-12 dan 1/4 menjadi per-12: (8/12 + 3/12).',
                        'Jumlahkan pembilangnya: 8 + 3 = 11, sehingga menjadi 11/12 a.'
                    ]
                }
            ],

            // SUB-BAB 3: K3.1 - K3.4
            '3': [
                {
                    id: 'K3.1',
                    tp: 'TP 4: Sifat Distributif',
                    tipe: 'isian',
                    bentuk_akhir: 'jabaran',
                    soal: 'Jabarkan 2(3x − 5).',
                    jawaban_akhir: '6x - 10',
                    kunci_langkah: ['6x - 10'],
                    kesalahan: '6x − 5 (pengali hanya dikalikan ke suku pertama).',
                    hints: [
                        'Angka 2 di luar kurung harus bertemu dengan berapa suku di dalam?',
                        'Kalikan 2 dengan 3x, lalu kalikan juga 2 dengan −5.',
                        'Hasilnya harus tanpa tanda kurung: 2 × 3x − 2 × 5.'
                    ]
                },
                {
                    id: 'K3.2',
                    tp: 'TP 4: Bentuk Faktor',
                    tipe: 'isian',
                    bentuk_akhir: 'faktor',
                    soal: 'Tulis 10x + 15 dalam bentuk faktor.',
                    jawaban_akhir: '5(2x + 3)',
                    kunci_langkah: ['5(2x + 3)'],
                    kesalahan: '10x + 15 (bentuk awal diulang); 5(2x + 15) (hanya satu suku dibagi).',
                    hints: [
                        'Angka terbesar berapa (FPB) yang bisa membagi 10 dan 15 sekaligus?',
                        'Tarik angka 5 keluar tanda kurung: 5( ... ).',
                        'Setelah 10x dibagi 5 dan 15 dibagi 5, apa yang tersisa di dalam kurung?'
                    ]
                },
                {
                    id: 'K3.3',
                    tp: 'TP 4: Jabarkan & Sederhanakan',
                    tipe: 'langkah',
                    bentuk_akhir: 'sederhana',
                    soal: 'Jabarkan dan sederhanakan 3(x + 2) + 2(x − 1).',
                    jawaban_akhir: '5x + 4',
                    kunci_langkah: ['3x + 6 + 2x - 2', '(3 + 2)x + (6 - 2)', '5x + 4'],
                    kesalahan: '5x + 8 (angka −2 dari 2 × (−1) terlewat); 5x + 3.',
                    hints: [
                        'Buka kurung satu per satu dengan sifat distributif: 3(x + 2) dan 2(x − 1).',
                        'Apa hasil dari 2 × (−1)? Tuliskan baris jabaran lengkapnya.',
                        'Setelah kurung terbuka, kelompokkan suku sejenis x dengan x dan angka dengan angka.'
                    ]
                },
                {
                    id: 'K3.4',
                    tp: 'TP 4: Pengurangan Kurung',
                    tipe: 'langkah',
                    bentuk_akhir: 'sederhana',
                    soal: 'Sederhanakan (6x − 2) − (2x + 5).',
                    jawaban_akhir: '4x - 7',
                    kunci_langkah: ['6x - 2 - 2x - 5', '(6 - 2)x + (-2 - 5)', '4x - 7'],
                    kesalahan: '4x + 3 (tanda +5 di dalam kurung tidak dibalik).',
                    hints: [
                        'Tanda minus di depan kurung kedua mempengaruhi suku apa saja di dalamnya?',
                        'Ingat bahwa −(2x + 5) menjadi −2x − 5 karena dikalikan −1.',
                        'Sederhanakan: 6x − 2x = 4x, dan −2 − 5 = ?'
                    ]
                }
            ],

            // SUB-BAB 4: K4.1 - K4.4
            '4': [
                {
                    id: 'K4.1',
                    tp: 'TP 5: Pemodelan Cerita',
                    tipe: 'isian',
                    bentuk_akhir: 'sederhana',
                    soal: 'Dika punya x kelereng. Raka punya 4 kali kelereng Dika, dikurangi 6. Tulis bentuk aljabar untuk banyak kelereng Raka.',
                    jawaban_akhir: '4x - 6',
                    kunci_langkah: ['4x - 6'],
                    kesalahan: '4x + 6 (kata "dikurangi" salah dibaca); 4(x − 6).',
                    hints: [
                        'Mulai dari "empat kali kelereng Dika" dulu. Jika kelereng Dika x, empat kalinya adalah apa?',
                        'Lalu kata "dikurangi 6" dikenakan pada hasil tersebut.',
                        'Tuliskan sebagai ekspresi aljabar: pengali x lalu tanda kurang.'
                    ]
                },
                {
                    id: 'K4.2',
                    tp: 'TP 5: Pemodelan Tarif',
                    tipe: 'isian',
                    bentuk_akhir: 'sederhana',
                    soal: 'Tarif sebuah ojek online adalah biaya admin Rp4.000 ditambah Rp2.000 per km. Tulis bentuk aljabar biaya untuk perjalanan x km.',
                    jawaban_akhir: '4000 + 2000x',
                    kunci_langkah: ['4000 + 2000x'],
                    kesalahan: '6000x (semua dikalikan x); 4000x + 2000.',
                    hints: [
                        'Mana biaya yang selalu sama (konstanta) berapa pun jaraknya?',
                        'Dan mana biaya yang berubah mengikuti jarak (dikalikan dengan x)?',
                        'Gabungkan biaya admin tetap dan biaya per kilometer.'
                    ]
                },
                {
                    id: 'K4.3',
                    tp: 'TP 5: Substitusi Pemodelan',
                    tipe: 'langkah',
                    bentuk_akhir: 'nilai',
                    soal: 'Biaya ojek pada soal sebelumnya adalah 4000 + 2000x. Berapa biaya untuk perjalanan 7 km?',
                    jawaban_akhir: '18000',
                    kunci_langkah: ['4000 + 2000 * 7', '4000 + 14000', '18000'],
                    kesalahan: '(4000 + 2000) × 7 = 42000 (mengerjakan penjumlahan sebelum perkalian).',
                    hints: [
                        'Substitusikan x = 7 ke dalam rumus: 4000 + 2000 × 7.',
                        'Apakah kamu menghitung penjumlahan atau perkalian lebih dulu?',
                        'Hitung 2000 × 7 = 14000, lalu jumlahkan dengan 4000.'
                    ]
                },
                {
                    id: 'K4.4',
                    tp: 'TP 5: Pemodelan Jarak & Satuan',
                    tipe: 'langkah',
                    bentuk_akhir: 'nilai',
                    soal: 'Sinta berjalan dari rumah ke taman sejauh 600 m dengan kecepatan 2 m per detik. Setelah x detik, jarak yang tersisa adalah 600 − 2x meter. Berapa meter jarak tersisa setelah 1 menit?',
                    jawaban_akhir: '480',
                    kunci_langkah: ['600 - 2 * 60', '600 - 120', '480'],
                    kesalahan: 'Memasukkan x = 1 langsung (satuan menit tidak diubah ke detik) sehingga hasil 598.',
                    hints: [
                        'Rumus 600 − 2x memakai x dalam satuan detik. Satu menit sama dengan berapa detik?',
                        'Ganti nilai x dengan 60 (bukan 1): 600 − 2 × 60.',
                        'Hitung 2 × 60 = 120, lalu kurangkan: 600 − 120.'
                    ]
                }
            ]
        };

        // BANK EVALUASI AKHIR (7 SOAL E1 - E7)
        const bankEvaluasi = [
            {
                id: 'E1',
                tp: 'TP 2: Unsur Bentuk Aljabar',
                soal: 'Tentukan koefisien y pada bentuk aljabar 5x − 2y + 7.',
                tipe: 'isian',
                bentuk_akhir: 'nilai',
                jawaban_akhir: '-2',
                exp: 'Koefisien adalah angka yang mengalikan variabel beserta tandanya. Pada −2y, tanda minus ikut sehingga koefisien y adalah <strong>−2</strong>.'
            },
            {
                id: 'E2',
                tp: 'TP 3: Substitusi Nilai',
                soal: 'Hitung nilai 3x + 4 untuk x = 5.',
                tipe: 'isian',
                bentuk_akhir: 'nilai',
                jawaban_akhir: '19',
                exp: 'Substitusikan x = 5: 3(5) + 4 = 15 + 4 = <strong>19</strong>.'
            },
            {
                id: 'E3',
                tp: 'TP 4: Sifat Distributif',
                soal: 'Jabarkan 3(x + 4).',
                tipe: 'isian',
                bentuk_akhir: 'jabaran',
                jawaban_akhir: '3x + 12',
                exp: 'Gunakan sifat distributif a(b + c) = ab + ac: 3 × x + 3 × 4 = <strong>3x + 12</strong>.'
            },
            {
                id: 'E4',
                tp: 'TP 4: Suku Sejenis',
                soal: 'Sederhanakan 7a + 2b − 3a.',
                tipe: 'isian',
                bentuk_akhir: 'sederhana',
                jawaban_akhir: '4a + 2b',
                exp: 'Kumpulkan suku sejenis: (7a − 3a) + 2b = <strong>4a + 2b</strong> (juga diterima 2b + 4a).'
            },
            {
                id: 'E5',
                tp: 'TP 4: Bentuk Faktor',
                soal: 'Tulis 6x + 9 dalam bentuk faktor.',
                tipe: 'isian',
                bentuk_akhir: 'faktor',
                jawaban_akhir: '3(2x + 3)',
                exp: 'Tarik FPB dari 6 dan 9 yaitu 3: <strong>3(2x + 3)</strong>. Bentuk 6x + 9 ditolak karena belum difaktorkan.'
            },
            {
                id: 'E6',
                tp: 'TP 5: Pemodelan Aljabar',
                soal: 'Seorang siswa membeli 4 pensil seharga a rupiah per buah dan 3 buku seharga b rupiah per buah. Tulis bentuk aljabar total harga.',
                tipe: 'isian',
                bentuk_akhir: 'sederhana',
                jawaban_akhir: '4a + 3b',
                exp: 'Total biaya adalah 4 kali harga pensil (a) ditambah 3 kali harga buku (b): <strong>4a + 3b</strong>.'
            },
            {
                id: 'E7',
                tp: 'TP 5: Pemodelan Hubungan',
                soal: 'Tinggi Linda adalah a cm. Tinggi ibunya 30 cm lebih pendek dari 4 kali tinggi Linda. Tulis bentuk aljabar tinggi ibu.',
                tipe: 'isian',
                bentuk_akhir: 'sederhana',
                jawaban_akhir: '4a - 30',
                exp: '4 kali tinggi Linda adalah 4a. 30 cm lebih pendek berarti dikurangi 30: <strong>4a − 30</strong>.'
            }
        ];


        // ================================================================
        // 2. MATHEMATICAL CHECKER & EQUIVALENCE ENGINE
        // ================================================================
        function cleanAndParseMath(raw) {
            if (!raw || typeof raw !== 'string') return { valid: false, error: 'Input kosong' };
            let s = raw.trim();
            // Normalisasi simbol
            s = s.replace(/[\u2212\u2013\u2014]/g, '-');
            s = s.replace(/[\u00D7\u00B7]/g, '*');
            s = s.replace(/[\u00F7]/g, '/');
            // Hapus titik pemisah ribuan (misal 120.000 atau 14.500)
            s = s.replace(/\b(\d{1,3})\.(\d{3})(?:\.(\d{3}))*\b/g, (m) => m.replace(/\./g, ''));

            // Cek keseimbangan kurung
            let openCount = 0;
            for (let c of s) {
                if (c === '(') openCount++;
                if (c === ')') openCount--;
                if (openCount < 0) return { valid: false, error: 'Tanda kurung tutup tanpa kurung buka' };
            }
            if (openCount !== 0) return { valid: false, error: 'Jumlah kurung buka dan tutup tidak seimbang' };

            // Cek sintaks tanda ganda tak valid
            if (/\+\+|\/\/|\*\*|[\+\-\*\/\(]\s*[\*\/]|^[\*\/]/.test(s)) {
                return { valid: false, error: 'Format tanda operasi tidak valid' };
            }
            if (/[+\-*\/]$/.test(s)) {
                return { valid: false, error: 'Format penulisan belum selesai di akhir' };
            }

            let evalStr = s;
            // Sisipkan perkalian implisit
            evalStr = evalStr.replace(/(\d+)\/(\d+)\s*([xyab])/g, '($1/$2)*$3');
            evalStr = evalStr.replace(/(\d+)\s*([xyab])/g, '$1*$2');
            evalStr = evalStr.replace(/(\d+)\s*\(/g, '$1*(');
            evalStr = evalStr.replace(/\)\s*\(/g, ')*(');
            evalStr = evalStr.replace(/\)\s*([xyab])/g, ')*$1');
            evalStr = evalStr.replace(/([xyab])\s*\(/g, '$1*(');

            return { valid: true, raw: raw.trim(), evalStr: evalStr };
        }

        function evaluateMath(evalStr, vars) {
            let replaced = evalStr;
            for (let [k, v] of Object.entries(vars)) {
                let regex = new RegExp('\\b' + k + '\\b', 'g');
                replaced = replaced.replace(regex, `(${v})`);
            }
            try {
                if (/[^0-9\+\-\*\/\(\)\.\s]/.test(replaced)) return NaN;
                let fn = new Function(`return (${replaced});`);
                return fn();
            } catch (e) {
                return NaN;
            }
        }

        function checkAlgebraEquivalence(input, prevOrTarget, shape, finalTarget) {
            const pIn = cleanAndParseMath(input);
            if (!pIn.valid) {
                return { status: 'invalid', message: `Format tidak valid: ${pIn.error} (tidak dihitung salah).` };
            }

            const pTarget = cleanAndParseMath(prevOrTarget);
            if (!pTarget.valid) {
                return { status: 'error', message: 'Target perbandingan tidak valid.' };
            }

            const trimmed = input.trim();

            // Validasi bentuk akhir
            if (shape === 'faktor') {
                if (!trimmed.includes('(') || !trimmed.includes(')')) {
                    return { status: 'rejected', message: 'Jawaban ditolak: Jawabanmu ekuivalen tetapi belum berbentuk faktor (harus memuat tanda kurung dan faktor persekutuan di luar kurung).' };
                }
            }
            if (shape === 'jabaran') {
                if (trimmed.includes('(') || trimmed.includes(')')) {
                    return { status: 'rejected', message: 'Jawaban ditolak: Jawaban belum berbentuk jabaran (buka tanda kurung terlebih dahulu).' };
                }
            }
            if (shape === 'nilai') {
                if (/[xyab]/.test(trimmed)) {
                    return { status: 'rejected', message: 'Jawaban harus berupa satu nilai angka tetap tanpa variabel.' };
                }
            }
            if (shape === 'sederhana') {
                let clean = trimmed.replace(/\s+/g, '');
                let varsFound = clean.match(/[xyab]/g) || [];
                let hasDuplicateVars = varsFound.some((v, i) => varsFound.indexOf(v) !== i);
                if (hasDuplicateVars) {
                    return { status: 'unsimplified', message: 'Suku sejenis belum disederhanakan secara penuh.' };
                }
            }

            // Uji ekuivalensi pada 5 titik nilai acak yang berbeda
            const testPoints = [
                { x: 2, y: 3, a: 4, b: 5 },
                { x: 7, y: -2, a: -3, b: 8 },
                { x: -5, y: 6, a: 7, b: -1 },
                { x: 11, y: 13, a: 2, b: -4 },
                { x: 0.5, y: -1.5, a: 2.5, b: 3.5 }
            ];

            for (let pt of testPoints) {
                let v1 = evaluateMath(pIn.evalStr, pt);
                let v2 = evaluateMath(pTarget.evalStr, pt);
                if (isNaN(v1) || isNaN(v2) || Math.abs(v1 - v2) > 1e-5) {
                    return { status: 'wrong', message: 'Langkah atau jawaban salah (tidak ekuivalen dengan baris sebelumnya).' };
                }
            }

            // Pengecekan ekstra untuk bentuk faktor bilangan bulat terbesar
            if (shape === 'faktor' && finalTarget) {
                const pFinal = cleanAndParseMath(finalTarget);
                if (pFinal.valid) {
                    for (let pt of testPoints) {
                        let v1 = evaluateMath(pIn.evalStr, pt);
                        let vf = evaluateMath(pFinal.evalStr, pt);
                        if (Math.abs(v1 - vf) > 1e-5) {
                            return { status: 'wrong', message: 'Jawaban belum mencapai faktor persekutuan terbesar.' };
                        }
                    }
                }
            }

            return { status: 'correct', message: 'Benar!' };
        }


        // ================================================================
        // 3. STATE KUIS LATIHAN & LINE-BY-LINE CHECKER
        // ================================================================
        const userWorksheet = {}; // Menyimpan progres langkah kuis per nomor latihan
        const hintCounters = {};  // Menyimpan jumlah pemakaian hint AI per soal

        function initLatihanContainers() {
            ['1', '2', '3', '4'].forEach(sub => {
                const container = document.getElementById(`quizContainerSubbab${sub}`);
                if (!container) return;
                container.innerHTML = '';
                const items = bankLatihan[sub];

                items.forEach((item, idx) => {
                    const qKey = `${sub}_${idx}`;
                    userWorksheet[qKey] = {
                        steps: [],
                        completed: false,
                        activeInput: ''
                    };
                    hintCounters[qKey] = 0;

                    const card = document.createElement('div');
                    card.className = 'p-6 rounded-2xl bg-white border border-gray-200 shadow-sm space-y-4';
                    card.id = `cardLatihan_${qKey}`;

                    card.innerHTML = `
                        <div class="flex items-center justify-between border-b border-gray-100 pb-3">
                            <div class="flex items-center gap-2">
                                <span class="w-7 h-7 rounded-lg bg-blue-100 text-blue-700 flex items-center justify-center text-xs font-bold font-mono">${item.id}</span>
                                <span class="text-xs font-bold text-gray-500">${item.tp}</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="text-[10px] uppercase font-bold px-2 py-0.5 rounded ${item.tipe === 'langkah' ? 'bg-amber-100 text-amber-800' : 'bg-blue-100 text-blue-800'}">
                                    Tipe: ${item.tipe}
                                </span>
                                <span id="statusTag_${qKey}" class="text-[10px] font-bold px-2 py-0.5 rounded bg-gray-100 text-gray-600">
                                    Belum selesai
                                </span>
                            </div>
                        </div>

                        <!-- Teks Soal -->
                        <div class="text-sm sm:text-base font-bold text-gray-900 leading-relaxed">
                            ${item.soal}
                        </div>

                        <!-- Lembar Kerja (Line-by-Line / Isian) -->
                        <div class="space-y-2 pt-1" id="worksheetArea_${qKey}">
                            ${item.tipe === 'langkah' ? `
                                <div class="text-xs font-bold text-gray-500 mb-1 flex items-center gap-1">
                                    <i class="fas fa-layer-group text-blue-500"></i> Pengerjaan Baris demi Baris:
                                </div>
                                <div id="stepList_${qKey}" class="space-y-1.5 font-mono text-xs">
                                    <div class="p-2.5 rounded-lg bg-gray-50 border border-gray-200 text-gray-600 flex items-center justify-between">
                                        <span><strong>Soal Awal:</strong> ${item.soal}</span>
                                        <span class="text-[10px] text-gray-400">Dasar acuan</span>
                                    </div>
                                </div>
                            ` : ''}

                            <!-- Input Baris Aktif -->
                            <div id="inputBoxWrap_${qKey}" class="space-y-2 pt-1">
                                <div class="flex items-center gap-2">
                                    <input type="text" id="inputLine_${qKey}" placeholder="${item.tipe === 'langkah' ? 'Ketik langkah berikutnya...' : 'Ketik jawaban akhirmu...'}" class="flex-1 px-4 py-2.5 rounded-xl border border-gray-300 font-mono text-xs sm:text-sm font-bold focus:border-blue-600 outline-none transition bg-white" onkeydown="handleEnterKey(event, '${qKey}')">
                                    
                                    <button onclick="checkStudentStep('${qKey}')" class="px-4 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs shadow-sm transition flex items-center gap-1.5 shrink-0">
                                        <i class="fas fa-check"></i>
                                        <span>${item.tipe === 'langkah' ? 'Cek Step' : 'Cek Jawaban'}</span>
                                    </button>

                                    <button onclick="triggerHintAi('${qKey}')" class="px-3.5 py-2.5 rounded-xl bg-amber-50 hover:bg-amber-100 text-amber-700 border border-amber-200 font-bold text-xs transition flex items-center gap-1 shrink-0" title="Buka Petunjuk AI">
                                        <i class="fas fa-lightbulb text-amber-500"></i>
                                        <span class="hidden sm:inline">Hint AI</span>
                                    </button>
                                </div>

                                <!-- Mini Math Buttons Keyboard untuk Soal Ini -->
                                <div class="flex flex-wrap items-center gap-1 pt-1">
                                    <span class="text-[10px] font-bold text-gray-400 mr-1">Sisipkan:</span>
                                    <button type="button" onclick="insertCharToInput('${qKey}', 'x')" class="px-2 py-0.5 rounded bg-gray-100 hover:bg-blue-50 text-blue-700 font-math font-bold text-xs border border-gray-200">x</button>
                                    <button type="button" onclick="insertCharToInput('${qKey}', 'y')" class="px-2 py-0.5 rounded bg-gray-100 hover:bg-blue-50 text-blue-700 font-math font-bold text-xs border border-gray-200">y</button>
                                    <button type="button" onclick="insertCharToInput('${qKey}', 'a')" class="px-2 py-0.5 rounded bg-gray-100 hover:bg-blue-50 text-blue-700 font-math font-bold text-xs border border-gray-200">a</button>
                                    <button type="button" onclick="insertCharToInput('${qKey}', 'b')" class="px-2 py-0.5 rounded bg-gray-100 hover:bg-blue-50 text-blue-700 font-math font-bold text-xs border border-gray-200">b</button>
                                    <button type="button" onclick="insertCharToInput('${qKey}', '+')" class="px-2 py-0.5 rounded bg-gray-100 hover:bg-gray-200 font-bold text-xs border border-gray-200">+</button>
                                    <button type="button" onclick="insertCharToInput('${qKey}', '−')" class="px-2 py-0.5 rounded bg-gray-100 hover:bg-gray-200 font-bold text-xs border border-gray-200">−</button>
                                    <button type="button" onclick="insertCharToInput('${qKey}', '×')" class="px-2 py-0.5 rounded bg-gray-100 hover:bg-gray-200 font-bold text-xs border border-gray-200">×</button>
                                    <button type="button" onclick="insertCharToInput('${qKey}', '(')" class="px-2 py-0.5 rounded bg-gray-100 hover:bg-gray-200 font-bold text-xs border border-gray-200">(</button>
                                    <button type="button" onclick="insertCharToInput('${qKey}', ')')" class="px-2 py-0.5 rounded bg-gray-100 hover:bg-gray-200 font-bold text-xs border border-gray-200">)</button>
                                    <button type="button" onclick="insertCharToInput('${qKey}', '/')" class="px-2 py-0.5 rounded bg-gray-100 hover:bg-gray-200 font-bold text-xs border border-gray-200">/</button>
                                    <button type="button" onclick="insertCharToInput('${qKey}', '-')" class="px-2 py-0.5 rounded bg-rose-50 hover:bg-rose-100 text-rose-700 font-bold text-xs border border-rose-200">negatif (-)</button>
                                </div>
                            </div>
                        </div>

                        <!-- Feedback Message Box -->
                        <div id="feedbackBox_${qKey}" class="hidden p-3 rounded-xl text-xs font-medium leading-relaxed border transition-all"></div>
                    `;

                    container.appendChild(card);
                });
            });
        }

        function handleEnterKey(e, qKey) {
            if (e.key === 'Enter') {
                checkStudentStep(qKey);
            }
        }

        function insertCharToInput(qKey, char) {
            const input = document.getElementById(`inputLine_${qKey}`);
            if (!input) return;
            const start = input.selectionStart || input.value.length;
            const end = input.selectionEnd || input.value.length;
            const val = input.value;
            input.value = val.substring(0, start) + char + val.substring(end);
            input.focus();
            input.setSelectionRange(start + char.length, start + char.length);
        }

        function checkStudentStep(qKey) {
            const [sub, idx] = qKey.split('_');
            const item = bankLatihan[sub][parseInt(idx)];
            const inputEl = document.getElementById(`inputLine_${qKey}`);
            const feedbackEl = document.getElementById(`feedbackBox_${qKey}`);
            const text = (inputEl.value || '').trim();

            if (!text) {
                feedbackEl.innerHTML = '<i class="fas fa-info-circle mr-1"></i> Masukkan jawaban atau langkah pengerjaan terlebih dahulu.';
                feedbackEl.className = 'p-3 rounded-xl text-xs font-medium border bg-amber-50 border-amber-300 text-amber-800';
                feedbackEl.classList.remove('hidden');
                return;
            }

            // Tentukan ekspresi rujukan (baris sebelumnya atau soal awal)
            let prevExpr = '';
            if (item.tipe === 'langkah') {
                const currentSteps = userWorksheet[qKey].steps;
                if (currentSteps.length === 0) {
                    prevExpr = item.kunci_langkah[0]; // Acuan awal
                } else {
                    prevExpr = currentSteps[currentSteps.length - 1];
                }
            } else {
                prevExpr = item.jawaban_akhir;
            }

            // Cek kesetaraan aljabar & bentuk akhir
            const res = checkAlgebraEquivalence(text, prevExpr, item.tipe === 'isian' ? item.bentuk_akhir : '', item.jawaban_akhir);

            if (res.status === 'invalid') {
                feedbackEl.innerHTML = `<i class="fas fa-exclamation-triangle mr-1"></i> ${res.message}`;
                feedbackEl.className = 'p-3 rounded-xl text-xs font-medium border bg-amber-50 border-amber-300 text-amber-800';
                feedbackEl.classList.remove('hidden');
                return;
            }

            if (res.status === 'rejected' || res.status === 'unsimplified') {
                feedbackEl.innerHTML = `<i class="fas fa-times-circle mr-1"></i> ${res.message}`;
                feedbackEl.className = 'p-3 rounded-xl text-xs font-medium border bg-rose-50 border-rose-300 text-rose-800';
                feedbackEl.classList.remove('hidden');
                return;
            }

            if (res.status === 'wrong') {
                feedbackEl.innerHTML = `<i class="fas fa-times-circle mr-1"></i> Langkah atau jawaban belum tepat. Coba periksa kembali atau gunakan tombol <strong>Hint AI</strong>.`;
                feedbackEl.className = 'p-3 rounded-xl text-xs font-medium border bg-rose-50 border-rose-300 text-rose-800';
                feedbackEl.classList.remove('hidden');
                return;
            }

            // JIKA BENAR:
            if (item.tipe === 'langkah') {
                userWorksheet[qKey].steps.push(text);
                const stepList = document.getElementById(`stepList_${qKey}`);
                const stepIdx = userWorksheet[qKey].steps.length;

                const stepDiv = document.createElement('div');
                stepDiv.className = 'p-2.5 rounded-lg bg-emerald-50 border border-emerald-200 text-emerald-800 flex items-center justify-between font-mono animate-fadeIn';
                stepDiv.innerHTML = `<span><strong>Langkah ${stepIdx}:</strong> ${text}</span> <i class="fas fa-check text-emerald-600"></i>`;
                stepList.appendChild(stepDiv);

                inputEl.value = '';

                // Periksa apakah sudah mencapai jawaban akhir dan memenuhi bentuk akhir
                const checkFinal = checkAlgebraEquivalence(text, item.jawaban_akhir, item.bentuk_akhir, item.jawaban_akhir);
                if (checkFinal.status === 'correct') {
                    // Tuntas!
                    userWorksheet[qKey].completed = true;
                    document.getElementById(`inputBoxWrap_${qKey}`).classList.add('hidden');
                    feedbackEl.innerHTML = `<i class="fas fa-trophy mr-1 text-amber-500"></i> <strong>Luar Biasa!</strong> Soal ini tuntas dengan jawaban akhir: <strong>${item.jawaban_akhir}</strong>.`;
                    feedbackEl.className = 'p-3 rounded-xl text-xs font-medium border bg-emerald-50 border-emerald-300 text-emerald-800';
                    feedbackEl.classList.remove('hidden');
                    
                    const tag = document.getElementById(`statusTag_${qKey}`);
                    tag.textContent = '✓ Tuntas Benar';
                    tag.className = 'text-[10px] font-bold px-2 py-0.5 rounded bg-emerald-100 text-emerald-800';
                    updateSubbabScoreBadge(sub);
                    return;
                } else {
                    feedbackEl.innerHTML = `<i class="fas fa-check-circle mr-1"></i> Baris ini ekuivalen dan benar! Lanjutkan ke baris/langkah berikutnya hingga bentuk akhir sederhana.`;
                    feedbackEl.className = 'p-3 rounded-xl text-xs font-medium border bg-blue-50 border-blue-300 text-blue-800';
                    feedbackEl.classList.remove('hidden');
                }
            } else {
                // Tipe Isian Langsung
                userWorksheet[qKey].completed = true;
                document.getElementById(`inputBoxWrap_${qKey}`).classList.add('hidden');
                feedbackEl.innerHTML = `<i class="fas fa-check-circle mr-1"></i> <strong>Benar Sekali!</strong> Jawaban akhirmu tepat: <strong>${item.jawaban_akhir}</strong>.`;
                feedbackEl.className = 'p-3 rounded-xl text-xs font-medium border bg-emerald-50 border-emerald-300 text-emerald-800';
                feedbackEl.classList.remove('hidden');

                const tag = document.getElementById(`statusTag_${qKey}`);
                tag.textContent = '✓ Tuntas Benar';
                tag.className = 'text-[10px] font-bold px-2 py-0.5 rounded bg-emerald-100 text-emerald-800';
                updateSubbabScoreBadge(sub);
            }
        }

        function updateSubbabScoreBadge(sub) {
            let correct = 0;
            const items = bankLatihan[sub];
            items.forEach((item, idx) => {
                const qKey = `${sub}_${idx}`;
                if (userWorksheet[qKey] && userWorksheet[qKey].completed) correct++;
            });

            const badge = document.getElementById(`scoreBadge${sub}`);
            if (badge) {
                badge.textContent = `${correct} / ${items.length} Tuntas`;
                if (correct >= 3) {
                    badge.className = 'text-xs font-bold bg-emerald-100 text-emerald-800 px-3 py-1.5 rounded-full shadow-sm';
                }
            }

            const navBadge = document.getElementById(`badgeLatihan${sub}`);
            if (navBadge) {
                navBadge.textContent = `${correct}/${items.length}`;
                if (correct >= 3) {
                    navBadge.className = 'text-[9px] px-1.5 py-0.2 rounded bg-emerald-200 text-emerald-800 font-bold';
                }
            }
        }

        // ================================================================
        // 4. HINT AI SOCRATIC MODAL
        // ================================================================
        function triggerHintAi(qKey) {
            const [sub, idx] = qKey.split('_');
            const item = bankLatihan[sub][parseInt(idx)];
            const curCount = hintCounters[qKey] || 0;

            if (curCount >= 3) {
                alert('Batas pemakaian Hint AI telah tercapai (maksimal 3 kali per soal). Coba diskusikan dengan teman atau ulas materi di atas!');
                return;
            }

            const hintText = item.hints[curCount] || item.hints[item.hints.length - 1];
            hintCounters[qKey] = curCount + 1;

            document.getElementById('hintAiCountBadge').textContent = `Hint ${hintCounters[qKey]} dari 3`;
            document.getElementById('hintAiPromptText').textContent = `"${hintText}"`;
            document.getElementById('modalHintAi').classList.remove('hidden');
        }

        function closeHintModal() {
            document.getElementById('modalHintAi').classList.add('hidden');
        }


        // ================================================================
        // 5. EVALUASI AKHIR (7 SOAL E1 - E7): TIMER, MATH KB, CHECKER
        // ================================================================
        let evalCurrentIdx = 0;
        let evalAnswers = new Array(bankEvaluasi.length).fill('');
        let evalTimeSec = 20 * 60; // 20 Menit = 1200 detik
        let evalTimerInterval = null;

        function startEvalTimer() {
            if (evalTimerInterval) clearInterval(evalTimerInterval);
            evalTimerInterval = setInterval(() => {
                evalTimeSec--;
                if (evalTimeSec <= 0) {
                    clearInterval(evalTimerInterval);
                    evalTimeSec = 0;
                    alert('Waktu 20 menit Evaluasi Akhir telah habis! Jawabanmu dikumpulkan secara otomatis.');
                    finishEvaluasi();
                }
                updateTimerDisplay();
            }, 1000);
        }

        function updateTimerDisplay() {
            const m = Math.floor(evalTimeSec / 60);
            const s = evalTimeSec % 60;
            const str = `${String(m).padStart(2, '0')}:${String(s).padStart(2, '0')}`;
            const el = document.getElementById('evalTimerVal');
            if (el) {
                el.textContent = str;
                if (evalTimeSec <= 120) {
                    el.className = 'text-lg font-mono font-extrabold tracking-wider text-rose-400 animate-bounce';
                }
            }
        }

        function displayEvalQuestion(idx) {
            evalCurrentIdx = idx;
            const q = bankEvaluasi[idx];

            document.getElementById('evalProgressText').textContent = `Soal ${idx + 1} dari ${bankEvaluasi.length}`;
            document.getElementById('evalProgressBar').style.width = `${((idx + 1) / bankEvaluasi.length) * 100}%`;
            document.getElementById('evalTpBadge').textContent = q.tp;
            document.getElementById('evalShapeBadge').textContent = `Bentuk: ${q.bentuk_akhir}`;
            document.getElementById('evalQuestionText').innerHTML = `<span class="text-blue-600 font-mono">${idx + 1}.</span> ${q.soal}`;

            const input = document.getElementById('evalInputAnswer');
            input.value = evalAnswers[idx] || '';

            document.getElementById('btnEvalPrev').disabled = idx === 0;
            const nextBtn = document.getElementById('btnEvalNext');
            if (idx === bankEvaluasi.length - 1) {
                nextBtn.innerHTML = 'Kumpulkan Evaluasi <i class="fas fa-check-double ml-1"></i>';
                nextBtn.className = 'px-5 py-2.5 rounded-xl text-xs font-bold bg-emerald-600 hover:bg-emerald-700 text-white transition shadow-sm';
            } else {
                nextBtn.innerHTML = 'Selanjutnya <i class="fas fa-arrow-right ml-1"></i>';
                nextBtn.className = 'px-5 py-2.5 rounded-xl text-xs font-bold bg-blue-600 hover:bg-blue-700 text-white transition shadow-sm';
            }

            renderEvalDots();
        }

        function onEvalInputChanged() {
            const val = document.getElementById('evalInputAnswer').value;
            evalAnswers[evalCurrentIdx] = val;
            renderEvalDots();
        }

        function insertEvalChar(char) {
            const input = document.getElementById('evalInputAnswer');
            const start = input.selectionStart || input.value.length;
            const end = input.selectionEnd || input.value.length;
            const val = input.value;
            input.value = val.substring(0, start) + char + val.substring(end);
            evalAnswers[evalCurrentIdx] = input.value;
            input.focus();
            input.setSelectionRange(start + char.length, start + char.length);
            renderEvalDots();
        }

        function evalBackspace() {
            const input = document.getElementById('evalInputAnswer');
            const start = input.selectionStart || input.value.length;
            const end = input.selectionEnd || input.value.length;
            if (start > 0 || end > start) {
                const val = input.value;
                if (start === end) {
                    input.value = val.substring(0, start - 1) + val.substring(end);
                    input.setSelectionRange(start - 1, start - 1);
                } else {
                    input.value = val.substring(0, start) + val.substring(end);
                    input.setSelectionRange(start, start);
                }
                evalAnswers[evalCurrentIdx] = input.value;
                input.focus();
                renderEvalDots();
            }
        }

        function evalClearInput() {
            const input = document.getElementById('evalInputAnswer');
            input.value = '';
            evalAnswers[evalCurrentIdx] = '';
            input.focus();
            renderEvalDots();
        }

        function renderEvalDots() {
            const container = document.getElementById('evalDotContainer');
            if (!container) return;
            container.innerHTML = '';
            bankEvaluasi.forEach((_, i) => {
                const dot = document.createElement('button');
                dot.type = 'button';
                dot.onclick = () => {
                    evalAnswers[evalCurrentIdx] = document.getElementById('evalInputAnswer').value;
                    displayEvalQuestion(i);
                };
                const hasAnswer = (evalAnswers[i] || '').trim().length > 0;
                const isCurrent = i === evalCurrentIdx;

                if (isCurrent) {
                    dot.className = 'w-6 h-6 rounded-full font-mono text-[10px] font-bold bg-blue-600 text-white shadow-sm ring-2 ring-blue-300';
                } else if (hasAnswer) {
                    dot.className = 'w-6 h-6 rounded-full font-mono text-[10px] font-bold bg-blue-100 text-blue-700 hover:bg-blue-200';
                } else {
                    dot.className = 'w-6 h-6 rounded-full font-mono text-[10px] font-bold bg-gray-100 text-gray-400 hover:bg-gray-200';
                }
                dot.textContent = i + 1;
                container.appendChild(dot);
            });
        }

        function evalNextQ() {
            evalAnswers[evalCurrentIdx] = document.getElementById('evalInputAnswer').value;
            if (evalCurrentIdx < bankEvaluasi.length - 1) {
                displayEvalQuestion(evalCurrentIdx + 1);
            } else {
                if (confirm('Apakah kamu yakin ingin mengumpulkan lembar jawaban Evaluasi Akhir sekarang?')) {
                    finishEvaluasi();
                }
            }
        }

        function evalPrevQ() {
            evalAnswers[evalCurrentIdx] = document.getElementById('evalInputAnswer').value;
            if (evalCurrentIdx > 0) {
                displayEvalQuestion(evalCurrentIdx - 1);
            }
        }

        function finishEvaluasi() {
            if (evalTimerInterval) clearInterval(evalTimerInterval);

            let correctCount = 0;
            const reviewContainer = document.getElementById('evalReviewList');
            reviewContainer.innerHTML = '';

            bankEvaluasi.forEach((q, i) => {
                const studentAns = (evalAnswers[i] || '').trim();
                const res = checkAlgebraEquivalence(studentAns, q.jawaban_akhir, q.bentuk_akhir, q.jawaban_akhir);
                const isCorrect = res.status === 'correct';
                if (isCorrect) correctCount++;

                const row = document.createElement('div');
                row.className = `p-3.5 rounded-xl border ${isCorrect ? 'bg-emerald-50 border-emerald-200 text-emerald-900' : 'bg-rose-50 border-rose-200 text-rose-900'} space-y-1`;
                row.innerHTML = `
                    <div class="flex items-center justify-between font-bold">
                        <span>Soal ${i + 1}: ${q.soal}</span>
                        <span>${isCorrect ? '✓ Benar' : '✗ Salah'}</span>
                    </div>
                    <div class="text-[11px] font-mono">
                        <div>Jawabanmu: <strong class="${isCorrect ? 'text-emerald-700' : 'text-rose-700'}">${studentAns || '(Tidak dijawab)'}</strong></div>
                        <div>Kunci Acuan: <strong class="text-blue-700">${q.jawaban_akhir}</strong> (Bentuk: ${q.bentuk_akhir})</div>
                    </div>
                    <div class="text-[11px] opacity-90 pt-1 border-t ${isCorrect ? 'border-emerald-200' : 'border-rose-200'}">
                        <strong>Pembahasan:</strong> ${q.exp}
                    </div>
                `;
                reviewContainer.appendChild(row);
            });

            const score = Math.round((correctCount / bankEvaluasi.length) * 100);
            document.getElementById('evalFinalScoreNum').textContent = score;
            document.getElementById('evalCorrectCount').textContent = correctCount;

            const badge = document.getElementById('evalResultBadge');
            const desc = document.getElementById('evalResultDesc');
            const icon = document.getElementById('evalResultIcon');

            if (correctCount >= 6) {
                badge.className = 'inline-block px-4 py-1.5 rounded-full text-xs font-bold bg-emerald-100 text-emerald-800';
                badge.textContent = 'Kategori: Sangat Baik (6-7 Benar)';
                desc.textContent = 'Selamat! Kamu telah menguasai kompetensi Bab 4 Bentuk Aljabar dengan sangat baik dan siap melangkah ke materi berikutnya.';
                icon.className = 'fas fa-trophy text-amber-500';
            } else if (correctCount >= 4) {
                badge.className = 'inline-block px-4 py-1.5 rounded-full text-xs font-bold bg-blue-100 text-blue-800';
                badge.textContent = 'Kategori: Cukup Baik (4-5 Benar)';
                desc.textContent = 'Bagus! Kamu sudah memahami sebagian besar konsep aljabar. Cermati pembahasan pada soal yang belum tepat.';
                icon.className = 'fas fa-medal text-blue-600';
            } else {
                badge.className = 'inline-block px-4 py-1.5 rounded-full text-xs font-bold bg-rose-100 text-rose-800';
                badge.textContent = 'Kategori: Perlu Mengulang Konsep Inti (< 4 Benar)';
                desc.textContent = 'Yuk pelajari kembali konsep dasar di Sub-Bab 1 dan 2, lalu coba ulangi evaluasi ini dengan tenang.';
                icon.className = 'fas fa-book text-gray-400';
            }

            document.getElementById('boxEvaluasiWork').classList.add('hidden');
            document.getElementById('boxEvaluasiResult').classList.remove('hidden');
        }

        function redoEvaluasi() {
            evalCurrentIdx = 0;
            evalAnswers = new Array(bankEvaluasi.length).fill('');
            evalTimeSec = 20 * 60;
            document.getElementById('boxEvaluasiResult').classList.add('hidden');
            document.getElementById('boxEvaluasiWork').classList.remove('hidden');
            displayEvalQuestion(0);
            startEvalTimer();
        }


        // ================================================================
        // 6. PANEL NAVIGATION
        // ================================================================
        function activatePanel(target) {
            const panels = ['1', '2', '3', '4', 'ringkasan', 'evaluasi'];
            panels.forEach(p => {
                const el = document.getElementById(p === 'evaluasi' ? 'panelEvaluasi' : (p === 'ringkasan' ? 'panelRingkasan' : `panelSubbab${p}`));
                const btn = p === 'evaluasi' ? document.getElementById('navBtnEvaluasi') : (p === 'ringkasan' ? document.getElementById('navBtnRingkasan') : document.getElementById(`navBtn${p}`));
                if (el) {
                    if (p === target) {
                        el.classList.remove('hidden');
                        if (btn) {
                            if (p === 'evaluasi') {
                                btn.className = 'w-full text-left bg-blue-700 text-white px-3.5 py-3 rounded-xl transition block shadow-md ring-2 ring-blue-300';
                                startEvalTimer();
                                displayEvalQuestion(0);
                            } else if (p === 'ringkasan') {
                                btn.className = 'w-full text-left flex items-center justify-between px-3 py-2 rounded-xl border transition text-xs font-semibold bg-amber-50 text-amber-800 border-amber-200 shadow-sm';
                            } else {
                                btn.className = 'w-full text-left flex items-center justify-between px-3 py-2.5 rounded-xl border transition text-xs font-semibold bg-blue-50 text-blue-700 border-blue-200 shadow-sm';
                            }
                        }
                    } else {
                        el.classList.add('hidden');
                        if (btn) {
                            if (p === 'evaluasi') {
                                btn.className = 'w-full text-left bg-blue-600 hover:bg-blue-700 text-white px-3.5 py-3 rounded-xl transition block shadow-sm group';
                            } else if (p === 'ringkasan') {
                                btn.className = 'w-full text-left flex items-center justify-between px-3 py-2 rounded-xl border border-transparent hover:bg-gray-100 text-gray-600 transition text-xs font-semibold';
                            } else {
                                btn.className = 'w-full text-left flex items-center justify-between px-3 py-2.5 rounded-xl border border-transparent hover:bg-gray-100 text-gray-600 transition text-xs font-semibold';
                            }
                        }
                    }
                }
            });
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }


        // ================================================================
        // 7. SIMULASI VISUAL MATERI
        // ================================================================
        // Simulasi Korek Api
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
            box.innerHTML = `<strong>Tantangan ${n} Persegi:</strong> Rumus: 1 + 3(${n}) = 1 + ${3 * n} = <strong>${ans} batang korek api</strong>.`;
            box.classList.remove('hidden');
        }

        // Simulasi Ubin Kolam
        function updatePool() {
            const s = parseInt(document.getElementById('poolRange').value);
            document.getElementById('poolVal').textContent = `${s} m`;

            document.getElementById('resRani').textContent = 4 * s + 4;
            document.getElementById('resJoko').textContent = 4 * (s + 1);
            document.getElementById('resWisnu').textContent = s + s + s + s + 4;
            document.getElementById('resAyu').textContent = 2 * (s + 2) + 2 * s;
            document.getElementById('resRiska').textContent = 4 * (s + 2);
        }

        // Simulasi Wisnu
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

        // Sulap Teka-Teki Bilangan
        function calcMagic() {
            const n = parseFloat(document.getElementById('magicNum').value) || 0;
            const res = Math.round(((2 * n + 6) / 2) - n);
            document.getElementById('st5').textContent = res;
        }

        // Komparator Tarif Ojol
        function updateOjol() {
            const x = parseInt(document.getElementById('ojolKmRange').value);
            document.getElementById('ojolKmVal').textContent = `${x} km`;
            document.getElementById('costGogo').textContent = (5000 + 1500 * x).toLocaleString('id-ID');
            document.getElementById('costGaga').textContent = (2000 * x).toLocaleString('id-ID');
            document.getElementById('costGugu').textContent = (3000 + 1800 * x).toLocaleString('id-ID');
        }

        // Init On Load
        window.addEventListener('DOMContentLoaded', () => {
            initLatihanContainers();
            const params = new URLSearchParams(window.location.search);
            const initTarget = params.get('subbab') || '1';
            activatePanel(initTarget);

            updateKorek();
            updatePool();
            updateTrip();
            calcMagic();
            updateOjol();
        });
    </script>
</body>
</html>