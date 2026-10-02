<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AljabarLearn - Media Pembelajaran Aljabar SMP Kelas VII</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .font-math {
            font-family: "Cambria Math", Cambria, Georgia, "Times New Roman", serif;
            font-style: italic;
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 font-sans antialiased">

    <!-- Top Navigation Bar Landing Page -->
    <header class="sticky top-0 z-50 bg-white/95 backdrop-blur-md border-b border-gray-200">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 h-16 flex items-center justify-between">
            <!-- Brand -->
            <a href="/" class="flex items-center gap-3">
                <div class="w-10 h-10 bg-blue-600 rounded-xl flex items-center justify-center text-white shadow-sm">
                    <i class="fas fa-shapes text-lg"></i>
                </div>
                <div>
                    <h1 class="text-lg font-bold text-blue-900 leading-tight">AljabarLearn</h1>
                    <p class="text-[11px] text-gray-500 font-medium">Matematika SMP Kelas VII</p>
                </div>
            </a>

            <!-- Nav Links -->
            <nav class="hidden md:flex items-center gap-6 text-sm font-semibold text-gray-600">
                <a href="#tentang" class="hover:text-blue-600 transition">Tentang Materi</a>
                <a href="#capaian" class="hover:text-blue-600 transition">Capaian Belajar</a>
                <a href="#fitur" class="hover:text-blue-600 transition">Fitur Interaktif</a>
                <a href="#peta" class="hover:text-blue-600 transition">Peta Belajar</a>
            </nav>

            <!-- Langsung Masuk (Tanpa Login) -->
            <div class="flex items-center gap-3">
                <a href="/dashboard" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-xl text-sm font-bold shadow-sm transition flex items-center gap-2">
                    <span>Masuk ke Pembelajaran</span>
                    <i class="fas fa-arrow-right text-xs"></i>
                </a>
            </div>
        </div>
    </header>

    <!-- Hero Section (Biru Putih) -->
    <section class="relative overflow-hidden bg-gradient-to-b from-blue-50/60 to-white py-16 sm:py-24 border-b border-gray-100">
        <div class="max-w-6xl mx-auto px-4 sm:px-6">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                
                <!-- Teks Hero -->
                <div class="lg:col-span-7 space-y-6 text-center lg:text-left">
                    <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-blue-100 text-blue-800 text-xs font-bold tracking-wide">
                        <i class="fas fa-book-open"></i> Kurikulum Merdeka • Bab 4 Bentuk Aljabar
                    </div>

                    <h1 class="text-3xl sm:text-5xl font-extrabold text-gray-900 tracking-tight leading-tight">
                        Belajar Aljabar Lebih <span class="text-blue-600">Mudah, Visual,</span> & Interaktif
                    </h1>

                    <p class="text-base sm:text-lg text-gray-600 leading-relaxed max-w-2xl mx-auto lg:mx-0">
                        Platform media pembelajaran matematika interaktif untuk SMP/MTs Kelas VII berdasarkan Buku Siswa Resmi Kemendikbudristek 2022. Pahami konsep variabel, simulasi ubin kolam, pemodelan nyata, dan uji kemampuan melalui kuis mandiri.
                    </p>

                    <!-- Tombol Aksi Langsung Masuk -->
                    <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-3.5 pt-2">
                        <a href="/dashboard" class="w-full sm:w-auto bg-blue-600 hover:bg-blue-700 text-white px-8 py-3.5 rounded-xl font-bold text-sm shadow-md hover:shadow-lg transition flex items-center justify-center gap-2">
                            <i class="fas fa-play-circle text-base"></i> Mulai Belajar Sekarang
                        </a>
                        <a href="/materi" class="w-full sm:w-auto bg-white hover:bg-gray-50 text-blue-700 border-2 border-blue-200 px-6 py-3.5 rounded-xl font-bold text-sm transition flex items-center justify-center gap-2">
                            <i class="fas fa-book-reader"></i> Buka Materi Langsung
                        </a>
                    </div>

                    <!-- Keterangan Bebas Login -->
                    <p class="text-xs text-gray-400 flex items-center justify-center lg:justify-start gap-1.5">
                        <i class="fas fa-check-circle text-emerald-500"></i> Langsung masuk tanpa login atau registrasi
                    </p>
                </div>

                <!-- Preview Card Hero -->
                <div class="lg:col-span-5">
                    <div class="bg-white rounded-3xl p-6 sm:p-7 shadow-xl border border-gray-100 space-y-5 relative">
                        <div class="flex items-center justify-between border-b border-gray-100 pb-3">
                            <div class="flex items-center gap-2">
                                <span class="w-3 h-3 rounded-full bg-red-400 inline-block"></span>
                                <span class="w-3 h-3 rounded-full bg-amber-400 inline-block"></span>
                                <span class="w-3 h-3 rounded-full bg-emerald-400 inline-block"></span>
                            </div>
                            <span class="text-xs font-bold text-blue-600 bg-blue-50 px-2.5 py-0.5 rounded-md">Bab 4 SMP Kelas VII</span>
                        </div>

                        <!-- Mini Visual Aljabar -->
                        <div class="bg-blue-600 rounded-2xl p-5 text-white space-y-2">
                            <span class="text-[11px] text-blue-100 block font-semibold uppercase">Pola Batang Korek Api</span>
                            <div class="text-2xl font-bold font-serif">1 + 3n = Total Batang</div>
                            <p class="text-xs text-blue-100">Formula ringkas universal untuk menghitung kebutuhan pola gabungan persegi.</p>
                        </div>

                        <div class="space-y-2.5 text-xs">
                            <div class="p-3 rounded-xl bg-gray-50 border border-gray-100 flex items-center justify-between">
                                <span class="text-gray-600 font-medium"><i class="fas fa-square mr-2 text-blue-600"></i> Penguji Ubin Kolam</span>
                                <span class="font-bold text-blue-700 font-math">4s + 4 = 4(s+1)</span>
                            </div>
                            <div class="p-3 rounded-xl bg-gray-50 border border-gray-100 flex items-center justify-between">
                                <span class="text-gray-600 font-medium"><i class="fas fa-route mr-2 text-blue-600"></i> Model Jarak Wisnu</span>
                                <span class="font-bold text-blue-700 font-math">5.000 - 15t m</span>
                            </div>
                            <div class="p-3 rounded-xl bg-gray-50 border border-gray-100 flex items-center justify-between">
                                <span class="text-gray-600 font-medium"><i class="fas fa-check-double mr-2 text-blue-600"></i> Evaluasi Mandiri</span>
                                <span class="font-bold text-emerald-600">7 Soal Kuis</span>
                            </div>
                        </div>

                        <a href="/dashboard" class="block text-center bg-gray-100 hover:bg-blue-50 hover:text-blue-700 text-gray-700 font-bold text-xs py-2.5 rounded-xl transition">
                            Masuk ke Dasbor Pembelajaran <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Section 1: Capaian Pembelajaran (TP 1 - TP 5) -->
    <section id="capaian" class="py-16 bg-white border-b border-gray-100">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 space-y-10">
            <div class="text-center max-w-2xl mx-auto space-y-2">
                <span class="text-xs font-bold text-blue-600 uppercase tracking-wider">Capaian Pembelajaran</span>
                <h2 class="text-2xl sm:text-3xl font-bold text-gray-900">5 Tujuan Pembelajaran Bab 4</h2>
                <p class="text-sm text-gray-500">Dirancang sesuai capaian pembelajaran kurikulum matematika SMP kelas VII.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- TP 1 -->
                <div class="bg-gray-50 rounded-2xl p-6 border border-gray-200/80 space-y-3 hover:border-blue-300 transition">
                    <div class="w-10 h-10 rounded-xl bg-blue-100 text-blue-700 flex items-center justify-center font-bold text-sm">
                        TP 1
                    </div>
                    <h3 class="font-bold text-gray-900 text-base">Variabel & Nilai Berubah</h3>
                    <p class="text-xs text-gray-600 leading-relaxed">
                        Menyatakan kuantitas yang berubah-ubah dan kuantitas yang tidak diketahui dengan huruf variabel.
                    </p>
                </div>

                <!-- TP 2 -->
                <div class="bg-gray-50 rounded-2xl p-6 border border-gray-200/80 space-y-3 hover:border-blue-300 transition">
                    <div class="w-10 h-10 rounded-xl bg-blue-100 text-blue-700 flex items-center justify-center font-bold text-sm">
                        TP 2
                    </div>
                    <h3 class="font-bold text-gray-900 text-base">Unsur Bentuk Aljabar</h3>
                    <p class="text-xs text-gray-600 leading-relaxed">
                        Mengidentifikasi konstanta, koefisien, variabel, dan suku pada bentuk aljabar serta mengaitkannya dengan konteks.
                    </p>
                </div>

                <!-- TP 3 -->
                <div class="bg-gray-50 rounded-2xl p-6 border border-gray-200/80 space-y-3 hover:border-blue-300 transition">
                    <div class="w-10 h-10 rounded-xl bg-blue-100 text-blue-700 flex items-center justify-center font-bold text-sm">
                        TP 3
                    </div>
                    <h3 class="font-bold text-gray-900 text-base">Substitusi Nilai</h3>
                    <p class="text-xs text-gray-600 leading-relaxed">
                        Menginterpretasikan nilai dari suatu bentuk aljabar yang diperoleh dari substitusi suatu nilai ke variabel.
                    </p>
                </div>

                <!-- TP 4 -->
                <div class="bg-gray-50 rounded-2xl p-6 border border-gray-200/80 space-y-3 hover:border-blue-300 transition">
                    <div class="w-10 h-10 rounded-xl bg-blue-100 text-blue-700 flex items-center justify-center font-bold text-sm">
                        TP 4
                    </div>
                    <h3 class="font-bold text-gray-900 text-base">Bentuk Ekuivalen & Operasi</h3>
                    <p class="text-xs text-gray-600 leading-relaxed">
                        Mengubah bentuk aljabar ke bentuk ekuivalen menggunakan sifat komutatif, asosiatif, dan distributif.
                    </p>
                </div>

                <!-- TP 5 -->
                <div class="bg-gray-50 rounded-2xl p-6 border border-gray-200/80 space-y-3 hover:border-blue-300 transition sm:col-span-2 lg:col-span-2">
                    <div class="w-10 h-10 rounded-xl bg-blue-100 text-blue-700 flex items-center justify-center font-bold text-sm">
                        TP 5
                    </div>
                    <h3 class="font-bold text-gray-900 text-base">Pemodelan Masalah Nyata</h3>
                    <p class="text-xs text-gray-600 leading-relaxed">
                        Memodelkan suatu permasalahan sehari-hari menjadi bentuk aljabar dan menggunakannya untuk menyelesaikan permasalahan serta menguji kewajaran hasil.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 2: Fitur Interaktif & Simulasi -->
    <section id="fitur" class="py-16 bg-gray-50 border-b border-gray-100">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 space-y-10">
            <div class="text-center max-w-2xl mx-auto space-y-2">
                <span class="text-xs font-bold text-blue-600 uppercase tracking-wider">Metode Interaktif</span>
                <h2 class="text-2xl sm:text-3xl font-bold text-gray-900">Eksplorasi Langsung & Mandiri</h2>
                <p class="text-sm text-gray-500">Bukan sekadar membaca teks, siswa bereksplorasi dengan alat bantu visual.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Fitur 1 -->
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 space-y-3">
                    <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center text-xl">
                        <i class="fas fa-shapes"></i>
                    </div>
                    <h3 class="font-bold text-gray-900 text-base">Simulasi Pola Korek Api</h3>
                    <p class="text-xs text-gray-600 leading-relaxed">
                        Temukan pola pembentukan persegi batang korek api dari <span class="font-math">n = 1</span> hingga 20 dengan rumus aljabar <span class="font-math font-bold">1 + 3n</span>.
                    </p>
                </div>

                <!-- Fitur 2 -->
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 space-y-3">
                    <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center text-xl">
                        <i class="fas fa-water"></i>
                    </div>
                    <h3 class="font-bold text-gray-900 text-base">Penguji Ubin Kolam Renang</h3>
                    <p class="text-xs text-gray-600 leading-relaxed">
                        Bandingkan rumus Rani, Joko, Wisnu, Ayu, dan analisis kesalahan rumus Riska yang menghitung sudut kolam secara ganda.
                    </p>
                </div>

                <!-- Fitur 3 -->
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 space-y-3">
                    <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center text-xl">
                        <i class="fas fa-layer-group"></i>
                    </div>
                    <h3 class="font-bold text-gray-900 text-base">Line-by-Line & Hint AI</h3>
                    <p class="text-xs text-gray-600 leading-relaxed">
                        16 soal latihan baris demi baris dengan pemeriksa kesetaraan otomatis, bantuan petunjuk Socratic Hint AI, serta Evaluasi Akhir 7 soal berdurasi 20 menit bebas AI.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action Banner -->
    <section class="py-16 bg-blue-600 text-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 text-center space-y-6">
            <h2 class="text-3xl sm:text-4xl font-extrabold tracking-tight">
                Siap Memulai Petualangan Aljabar?
            </h2>
            <p class="text-sm sm:text-base text-blue-100 max-w-xl mx-auto leading-relaxed">
                Akses seluruh materi, laboratorium interaktif, dan evaluasi kuis secara langsung tanpa perlu registrasi akun.
            </p>
            <div class="pt-2">
                <a href="/dashboard" class="inline-flex items-center gap-2 bg-white text-blue-600 hover:bg-blue-50 px-8 py-3.5 rounded-full font-bold text-sm shadow-lg transition">
                    <span>Masuk ke Dasbor Sekarang</span>
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Footer Landing Page -->
    <footer class="bg-white border-t border-gray-200 py-8 text-center text-xs text-gray-500 space-y-2">
        <div class="flex items-center justify-center gap-2 font-bold text-gray-700 text-sm">
            <i class="fas fa-shapes text-blue-600"></i> AljabarLearn
        </div>
        <p>
            Sumber Materi: Buku Siswa <em>Matematika untuk SMP/MTs Kelas VII</em>, Bab 4: Bentuk Aljabar (Hal. 124–158).<br>
            Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi Republik Indonesia, 2022.
        </p>
    </footer>

</body>
</html>
