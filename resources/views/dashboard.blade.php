<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AljabarLearn</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50 flex min-h-screen font-sans text-gray-800">

    <aside class="w-64 bg-white border-r border-gray-200 flex flex-col justify-between">
        <div class="p-6">
            <div class="flex items-center gap-3 mb-8">
                <div class="w-10 h-10 bg-blue-600 rounded-xl flex items-center justify-center text-white">
                    <i class="fas fa-robot text-xl"></i>
                </div>
                <div>
                    <h1 class="text-lg font-bold text-blue-900 leading-tight">AljabarLearn</h1>
                    <p class="text-xs text-gray-500">Aljabar SMP</p>
                </div>
            </div>

            <div class="flex items-center gap-3 mb-6">
                <div class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center text-white font-bold text-sm">
                    MA
                </div>
                <div>
                    <h2 class="text-sm font-bold truncate w-32">Muhammad Alfria Afdha</h2>
                    <span class="text-xs bg-blue-100 text-blue-700 px-2 py-0.5 rounded-md font-semibold mt-1 inline-block">Kelas 8A</span>
                </div>
            </div>

            <div class="mb-8">
                <div class="flex justify-between text-xs mb-2">
                    <span class="text-gray-500 font-medium">Progres Materi</span>
                    <span class="font-bold text-blue-600">100%</span>
                </div>
                <div class="w-full bg-gray-100 rounded-full h-2 mb-2">
                    <div class="bg-blue-600 h-2 rounded-full" style="width: 100%"></div>
                </div>
                <p class="text-xs text-gray-400">4/4 Sub-Bab selesai</p>
            </div>

            <div class="mb-6">
                <h3 class="text-xs font-bold text-gray-400 mb-3 tracking-wider">MATERI</h3>
                <div class="space-y-2">
                    <a href="/materi" class="flex items-center justify-between bg-blue-50 text-blue-700 px-3 py-2.5 rounded-xl border border-blue-100 cursor-pointer block">
                        <div>
                            <div class="font-bold text-sm">Sub-Bab 1</div>
                            <div class="text-xs opacity-75">Suku & Koefisien</div>
                        </div>
                        <i class="fas fa-check text-sm"></i>
                    </a>
                    <a href="/materi" class="flex items-center justify-between bg-blue-50 text-blue-700 px-3 py-2.5 rounded-xl border border-blue-100 cursor-pointer block">
                        <div>
                            <div class="font-bold text-sm">Sub-Bab 2</div>
                            <div class="text-xs opacity-75">Operasi Aljabar</div>
                        </div>
                        <i class="fas fa-check text-sm"></i>
                    </a>
                    <a href="/materi" class="flex items-center justify-between bg-blue-50 text-blue-700 px-3 py-2.5 rounded-xl border border-blue-100 cursor-pointer block">
                        <div>
                            <div class="font-bold text-sm">Sub-Bab 3</div>
                            <div class="text-xs opacity-75">Faktorisasi</div>
                        </div>
                        <i class="fas fa-check text-sm"></i>
                    </a>
                    <a href="/materi" class="flex items-center justify-between bg-blue-50 text-blue-700 px-3 py-2.5 rounded-xl border border-blue-100 cursor-pointer block">
                        <div>
                            <div class="font-bold text-sm">Sub-Bab 4</div>
                            <div class="text-xs opacity-75">Persamaan Linear</div>
                        </div>
                        <i class="fas fa-check text-sm"></i>
                    </a>
                </div>
            </div>

            <div>
                <h3 class="text-xs font-bold text-gray-400 mb-3 tracking-wider">UJIAN</h3>
                <div class="bg-teal-500 text-white px-3 py-3 rounded-xl cursor-pointer hover:bg-teal-600 transition">
                    <div class="font-bold text-sm">Evaluasi Akhir</div>
                    <div class="text-xs opacity-90 mt-0.5">Siap! Timer 30 menit</div>
                </div>
            </div>
        </div>

        <div class="p-6">
            <button class="flex items-center text-gray-400 hover:text-red-500 text-sm font-medium transition">
                <div class="w-3 h-4 bg-red-400 rounded-sm mr-3"></div>
                Keluar
            </button>
        </div>
    </aside>

    <main class="flex-1 p-8 overflow-y-auto">
        <div class="bg-blue-600 rounded-3xl p-8 text-white mb-8 relative overflow-hidden shadow-sm">
            <div class="relative z-10">
                <p class="text-blue-100 text-sm mb-1">Selamat datang kembali!</p>
                <h2 class="text-3xl font-bold mb-3">Halo, Muhammad Alfria Afdha!</h2>
                <p class="text-blue-100 mb-6 text-sm">Semua materi selesai! Saatnya Evaluasi Akhir!</p>
                <button class="bg-white text-blue-600 px-6 py-2.5 rounded-full font-bold text-sm shadow-sm hover:bg-gray-50 transition">
                    Mulai Evaluasi Akhir
                </button>
            </div>
            <div class="absolute right-12 top-1/2 transform -translate-y-1/2 opacity-10 pointer-events-none">
                <i class="fas fa-robot text-9xl"></i>
            </div>
        </div>

        <div class="grid grid-cols-3 gap-6 mb-8">
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <h3 class="text-2xl font-bold text-gray-800 mb-1">4/4</h3>
                <p class="text-gray-400 text-sm">Sub-Bab Selesai</p>
            </div>
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <h3 class="text-2xl font-bold text-gray-800 mb-1">100%</h3>
                <p class="text-gray-400 text-sm">Progres Total</p>
            </div>
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <h3 class="text-2xl font-bold text-gray-800 mb-1">Terbuka</h3>
                <p class="text-gray-400 text-sm">Status Ujian</p>
            </div>
        </div>

        <h3 class="text-lg font-bold text-gray-800 mb-5">Sub-Bab Materi</h3>

        <div class="grid grid-cols-2 gap-6">
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 border-t-4 border-t-blue-500">
                <div class="flex items-center text-xs text-blue-600 bg-blue-50 px-2.5 py-1 rounded-md w-max mb-4 font-semibold">
                    <i class="fas fa-check mr-1.5 text-[10px]"></i> Selesai
                </div>
                <p class="text-gray-400 text-xs mb-1 font-medium">Sub-Bab 1</p>
                <h4 class="text-lg font-bold text-gray-800 mb-6">Suku & Koefisien</h4>
                <a href="/materi" class="text-xs font-semibold text-gray-500 hover:text-blue-600 transition flex items-center">
                    Ulangi Materi <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 border-t-4 border-t-purple-500">
                <div class="flex items-center text-xs text-purple-600 bg-purple-50 px-2.5 py-1 rounded-md w-max mb-4 font-semibold">
                    <i class="fas fa-check mr-1.5 text-[10px]"></i> Selesai
                </div>
                <p class="text-gray-400 text-xs mb-1 font-medium">Sub-Bab 2</p>
                <h4 class="text-lg font-bold text-gray-800 mb-6">Operasi Aljabar</h4>
                <a href="/materi" class="text-xs font-semibold text-gray-500 hover:text-purple-600 transition flex items-center">
                    Ulangi Materi <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 border-t-4 border-t-teal-500">
                <div class="flex items-center text-xs text-teal-600 bg-teal-50 px-2.5 py-1 rounded-md w-max mb-4 font-semibold">
                    <i class="fas fa-check mr-1.5 text-[10px]"></i> Selesai
                </div>
                <p class="text-gray-400 text-xs mb-1 font-medium">Sub-Bab 3</p>
                <h4 class="text-lg font-bold text-gray-800 mb-6">Faktorisasi</h4>
                <a href="/materi" class="text-xs font-semibold text-gray-500 hover:text-teal-600 transition flex items-center">
                    Ulangi Materi <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 border-t-4 border-t-pink-500">
                <div class="flex items-center text-xs text-pink-600 bg-pink-50 px-2.5 py-1 rounded-md w-max mb-4 font-semibold">
                    <i class="fas fa-check mr-1.5 text-[10px]"></i> Selesai
                </div>
                <p class="text-gray-400 text-xs mb-1 font-medium">Sub-Bab 4</p>
                <h4 class="text-lg font-bold text-gray-800 mb-6">Persamaan Linear</h4>
                <a href="/materi" class="text-xs font-semibold text-gray-500 hover:text-pink-600 transition flex items-center">
                    Ulangi Materi <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>
        </div>
    </main>

</body>
</html>