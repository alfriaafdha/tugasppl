# Struktur Folder dan Berkas AljabarLearn

**Sumber:** `PRD_AljabarLearn.md` v1.9, `plan-implementasi-aljabarlearn.md`, `BUILD_AljabarLearn.md`, `modul-ajar-aljabar-kelas7.md` v2.1
**Stack:** Laravel, Blade + CSS biasa + JavaScript biasa, SQLite, Gemini API
**Catatan:** ini struktur **target** untuk tahap Build. Keterangan `WPn` menunjukkan paket kerja yang membuat berkas itu. Bila WP0 memutuskan memakai ulang website lama, struktur disesuaikan dengan hasil audit, tetapi pembagian tanggung jawab di bawah tetap dipertahankan.

---

## 1. Pohon Folder Lengkap

```text
aljabarlearn/
├── CLAUDE.md                          # aturan kerja untuk AI (BUILD bagian 9, template A)
├── README.md                          # WP10: pemasangan, .env, SQLite, akun guru, penjadwal
├── .env.example                       # WP0: kunci Gemini kosong, KKM, durasi, MASUK_SEMENTARA
├── .gitignore                         # .env, database.sqlite, storage log, vendor, node_modules
├── artisan
├── composer.json
├── composer.lock
├── phpunit.xml                        # WP0: DB_DATABASE=:memory: untuk uji
├── pint.json                          # WP0: aturan gaya kode (opsional)
│
├── app/
│   ├── Console/
│   │   └── Commands/
│   │       ├── BuatGuru.php                   # WP1: php artisan guru:buat (FR-04)
│   │       └── TutupEvaluasiKedaluwarsa.php   # WP8: evaluasi:tutup-kedaluwarsa (tiap menit)
│   │
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Controller.php
│   │   │   ├── GerbangMasukController.php     # WP2 (SEMENTARA, dihapus di WP11)
│   │   │   ├── KeluarController.php           # WP2: tombol Keluar
│   │   │   ├── Auth/
│   │   │   │   ├── DaftarController.php       # WP11 (FR-01)
│   │   │   │   └── MasukController.php        # WP11 (FR-02)
│   │   │   ├── Siswa/
│   │   │   │   ├── DasborSiswaController.php  # WP3: sidebar, progres
│   │   │   │   ├── SubBabController.php       # WP3: materi + area kuis
│   │   │   │   ├── KuisController.php         # WP5: mulai, soal, cek-step, kumpul
│   │   │   │   ├── HintController.php         # WP7: hanya untuk sesi_kuis
│   │   │   │   └── EvaluasiController.php     # WP8: awal, mulai, kerja, jawaban, kumpul, hasil
│   │   │   └── Guru/
│   │   │       ├── DasborGuruController.php   # WP9: daftar siswa
│   │   │       ├── DetailSiswaController.php  # WP9: jawaban, durasi, Hint per percobaan
│   │   │       └── RingkasanMateriController.php  # WP9: bagian materi yang sulit
│   │   │
│   │   ├── Middleware/
│   │   │   ├── PeranMiddleware.php            # WP2: peran:siswa / peran:guru
│   │   │   ├── SubBabTerbuka.php              # WP3
│   │   │   └── EvaluasiTerbuka.php            # WP3 (dipakai WP8)
│   │   │
│   │   └── Requests/
│   │       ├── CekStepRequest.php             # WP5: batas panjang, karakter valid
│   │       ├── KumpulSoalRequest.php          # WP5
│   │       └── SimpanJawabanEvaluasiRequest.php  # WP8
│   │
│   ├── Models/
│   │   ├── Pengguna.php                       # WP1: $table = 'pengguna'; Auth memakai model ini
│   │   ├── SubBab.php                         # WP1
│   │   ├── Kuis.php                           # WP1
│   │   ├── SoalKuis.php                       # WP1
│   │   ├── ProgresSiswa.php                   # WP1
│   │   ├── SesiKuis.php                       # WP1: scope milikPengguna, selesai, berlangsung
│   │   ├── LangkahKuis.php                    # WP1
│   │   ├── SoalEvaluasi.php                   # WP1
│   │   ├── EvaluasiAkhir.php                  # WP1
│   │   └── JawabanEvaluasi.php                # WP1
│   │
│   ├── Observers/
│   │   └── PenggunaObserver.php               # WP2: buat 3 rekam progres_siswa (FR-03); dipakai ulang WP11
│   │
│   ├── Providers/
│   │   └── AppServiceProvider.php             # daftar observer, pagar MASUK_SEMENTARA vs production
│   │
│   └── Services/
│       ├── Aljabar/                           # WP4: mesin ekspresi (satu-satunya parser)
│       │   ├── Tokenizer.php
│       │   ├── Parser.php                     # perkalian tersirat, pangkat kecil
│       │   ├── Pecahan.php                    # pembilang/penyebut bilangan bulat (tanpa float)
│       │   ├── Polinom.php                    # peta monomial → koefisien (bentuk kanonik)
│       │   ├── Normalisasi.php                # menjabarkan dan menyederhanakan
│       │   ├── CekEkuivalen.php               # Cek Step dan pemeriksa jawaban
│       │   ├── BentukAkhir.php                # sederhanakan | jabarkan | faktorkan | substitusi | model | unsur
│       │   ├── NilaiSubstitusi.php            # jenis substitusi: masukkan nilai_variabel, hitung angka
│       │   ├── UmpanBalikKesalahan.php        # P1: petunjuk untuk kesalahan umum pemula (FR-35a)
│       │   ├── GalatRamah.php                 # pesan Bahasa Indonesia sederhana
│       │   └── Exceptions/
│       │       ├── EkspresiTidakValid.php
│       │       └── BelumDidukung.php          # mis. pembagian oleh variabel
│       ├── Progres/
│       │   └── ProgresService.php             # WP3: persenProgres, subBabTerbuka, tandaiTuntas, evaluasiTerbuka
│       ├── Kuis/
│       │   └── KuisService.php                # WP5: siklus sesi, soal aktif, kumpul, ulang
│       ├── Hint/                              # WP7: tidak boleh dijangkau dari Evaluasi
│       │   ├── GeminiClient.php               # HTTP + timeout + galat
│       │   ├── PromptSocratic.php             # system prompt dan pembentuk konteks (tanpa data identitas)
│       │   ├── HintService.php                # batasi frekuensi → cache → Gemini → saring → simpan
│       │   └── FilterKebocoran.php            # memakai mesin Aljabar untuk cek jawaban bocor
│       ├── Evaluasi/
│       │   ├── EvaluasiService.php            # WP8: mulai/lanjut, pilih 20 soal, timer server, tutup
│       │   └── PenilaianService.php           # WP8: nilai = benar ÷ 20 × 100, lulus_kkm
│       └── Dasbor/
│           └── AgregasiGuruService.php        # WP9: AVG durasi, percobaan, % langkah salah, rata-rata Hint
│
├── bootstrap/
│   └── app.php                        # alias middleware (peran, sub-bab.terbuka, evaluasi.terbuka); jadwal
│
├── config/
│   ├── aljabarlearn.php               # WP0: KKM, jumlah soal, durasi, gemini, masuk_sementara
│   ├── auth.php                       # provider memakai App\Models\Pengguna
│   └── database.php                   # SQLite: foreign_key_constraints, WAL, busy_timeout
│
├── database/
│   ├── database.sqlite                # pengembangan (TIDAK di git)
│   ├── migrations/                    # WP1: urutan sesuai kunci asing
│   │   ├── 0001_create_pengguna_table.php
│   │   ├── 0002_create_sub_bab_table.php
│   │   ├── 0003_create_kuis_table.php              # sub_bab_id unik
│   │   ├── 0004_create_soal_kuis_table.php         # + mode, variabel, ekspresi_awal, nilai_variabel, subtopik, pembahasan, hint_cadangan
│   │   ├── 0005_create_progres_siswa_table.php     # unik pengguna–sub_bab
│   │   ├── 0006_create_sesi_kuis_table.php         # unik pengguna–kuis–percobaan_ke
│   │   ├── 0007_create_langkah_kuis_table.php      # + dikumpulkan, cocok_jawaban_akhir; indeks dasbor
│   │   ├── 0008_create_soal_evaluasi_table.php     # + sub_bab_id, variabel, subtopik
│   │   ├── 0009_create_evaluasi_akhir_table.php    # + status; unik pengguna–percobaan_ke
│   │   └── 0010_create_jawaban_evaluasi_table.php  # unik evaluasi–soal
│   ├── factories/                     # WP1: untuk uji
│   │   ├── PenggunaFactory.php
│   │   ├── SesiKuisFactory.php
│   │   └── EvaluasiAkhirFactory.php
│   └── seeders/
│       ├── DatabaseSeeder.php
│       ├── SubBabSeeder.php           # 3 sub-bab, bobot 1/3
│       ├── KuisSeeder.php             # 3 kuis × 5 soal (15) + hint_cadangan + pembahasan
│       ├── SoalEvaluasiSeeder.php     # 30 soal dari modul ajar bagian 8 (9 A, 12 B, 9 C)
│       ├── GuruSeeder.php             # satu guru untuk gerbang sementara
│       ├── SiswaUjiSeeder.php        # opsional: 3 siswa contoh (HAPUS/BERSIHKAN di WP11)
│       └── data/
│           ├── materi-a.md            # Unsur-Unsur Bentuk Aljabar
│           ├── materi-b.md            # Sifat-Sifat dan Operasi Aljabar
│           ├── materi-c.md            # Pemodelan dengan Bentuk Aljabar
│           ├── soal-kuis.php          # 15 soal: teks, tipe, mode, variabel, ekspresi_awal, nilai_variabel, jawaban_akhir, subtopik, hint_cadangan, pembahasan
│           ├── soal-evaluasi.php      # 30 soal Evaluasi (9 A, 12 B, 9 C)
│           └── kamus-istilah.php      # 11 istilah untuk panel kamus (dibaca langsung oleh tampilan)
│
├── docs/
│   ├── PRD_AljabarLearn.md
│   ├── plan-implementasi-aljabarlearn.md
│   ├── BUILD_AljabarLearn.md
│   ├── STRUKTUR_FOLDER_AljabarLearn.md
│   ├── build-log.md                   # ingatan proyek lintas sesi (keputusan, status WP, penyimpangan)
│   ├── modul-ajar-aljabar-kelas7.md   # v2.1: materi A–C, kamus istilah, 15 soal kuis, 30 soal Evaluasi
│   ├── erd.md                         # WP10: ERD 10 entitas
│   ├── daftar-rute.md                 # WP10
│   └── panduan-konten.md              # WP10: cara menambah materi/soal lewat seeder
│
├── public/
│   ├── index.php
│   ├── css/                           # CSS biasa; warna lewat variabel CSS (biru-putih)
│   │   ├── tema.css                   # --biru-utama, --biru-muda, --putih, warna status
│   │   ├── tata-letak.css             # sidebar kiri, area utama, keyboard grid bawah
│   │   ├── kuis.css                   # lembar kerja, baris terkunci/salah/menunggu, kotak jawaban tunggal, gelembung AI
│   │   ├── evaluasi.css               # timer, navigasi nomor soal
│   │   └── guru.css                   # tabel dan ringkasan dasbor
│   └── js/                            # JavaScript biasa (tanpa framework)
│       ├── util-fetch.js              # fetch + token CSRF + penanganan galat
│       ├── keyboard-grid.js           # WP6: angka, huruf variabel sesuai soal, operator, ( ) pecahan, ^
│       ├── lembar-kerja.js            # WP6: baris demi baris (soal langkah): baris benar terkunci, kotak tunggal (soal langsung)
│       ├── kuis.js                    # WP6: Cek Step (hanya soal langkah), Kumpul, pembahasan, Soal Selanjutnya
│       ├── hint.js                    # WP7: tombol Hint AI dan gelembung dialog
│       ├── kamus-istilah.js           # WP6: buka/tutup panel kamus istilah (FR-10a)
│       ├── evaluasi.js                # WP8: hitung mundur dari sisa waktu server, simpan otomatis
│       └── tampilan-matematika.js     # opsional: pecahan/pangkat (× ÷ ^ hanya tampilan klien)
│
├── resources/
│   └── views/
│       ├── layouts/
│       │   ├── dasar.blade.php        # kerangka HTML, tema, CSRF meta
│       │   ├── siswa.blade.php        # sidebar + area utama
│       │   └── guru.blade.php
│       ├── components/
│       │   ├── progress-bar.blade.php
│       │   ├── sidebar-sub-bab.blade.php   # daftar sub-bab + gembok + menu Evaluasi
│       │   ├── keyboard-grid.blade.php
│       │   ├── lembar-kerja.blade.php
│       │   ├── gelembung-ai.blade.php      # TIDAK dipakai di Evaluasi
│       │   ├── navigasi-soal.blade.php     # "soal n dari 5" + Soal Selanjutnya
│       │   ├── kamus-istilah.blade.php     # panel kamus (data dari kamus-istilah.php)
│       │   ├── pembahasan.blade.php        # tampil setelah soal kuis dikumpulkan; TIDAK dipakai di Evaluasi
│       │   └── timer.blade.php
│       ├── gerbang/
│       │   └── index.blade.php        # WP2 (SEMENTARA, dihapus di WP11)
│       ├── auth/
│       │   ├── masuk.blade.php        # WP11
│       │   └── daftar.blade.php       # WP11
│       ├── siswa/
│       │   ├── dasbor.blade.php       # WP3
│       │   ├── sub-bab.blade.php      # WP3: materi bertahap + kamus + kuis di bawahnya
│       │   ├── kuis/
│       │   │   └── soal.blade.php     # WP5/WP6 (termasuk mode baca-saja)
│       │   └── evaluasi/
│       │       ├── awal.blade.php     # WP8: aturan, riwayat, tombol mulai/ulang
│       │       ├── kerja.blade.php    # WP8: 20 soal + navigasi nomor, tanpa Hint AI
│       │       └── hasil.blade.php    # WP8: nilai, lulus/belum, ulang
│       └── guru/
│           ├── dasbor.blade.php       # WP9
│           ├── detail-siswa.blade.php # WP9
│           └── ringkasan-materi.blade.php  # WP9
│
├── routes/
│   ├── web.php                        # rute siswa, guru, evaluasi (middleware auth + peran)
│   ├── gerbang.php                    # WP2: hanya dimuat bila MASUK_SEMENTARA=true (dihapus WP11)
│   ├── auth.php                       # WP11
│   └── console.php                    # jadwal evaluasi:tutup-kedaluwarsa
│
├── storage/                           # bawaan Laravel (log, cache); tidak di git
│
├── tests/
│   ├── TestCase.php
│   ├── data/
│   │   └── kasus-ekspresi.json        # WP4: ≥ 150 kasus (termasuk 45 soal modul ajar dan kesalahan umum pemula)
│   ├── Unit/
│   │   ├── Aljabar/                   # WP4
│   │   │   ├── TokenizerTest.php
│   │   │   ├── ParserTest.php
│   │   │   ├── PolinomTest.php
│   │   │   ├── NormalisasiTest.php
│   │   │   ├── CekEkuivalenTest.php
│   │   │   ├── BentukAkhirTest.php
│   │   │   ├── GalatRamahTest.php
│   │   │   ├── NilaiSubstitusiTest.php
│   │   │   ├── UmpanBalikKesalahanTest.php      # P1
│   │   │   └── KumpulanUjiAkurasiTest.php   # menjalankan kasus-ekspresi.json, lapor akurasi
│   │   └── Hint/
│   │       ├── FilterKebocoranTest.php      # WP7
│   │       └── PromptSocraticTest.php       # WP7: konteks tanpa nama/email/ID
│   └── Feature/
│       ├── RelasiModelTest.php              # WP1: relasi dan batas unik
│       ├── BankSoalSeederTest.php           # WP1: variabel mencakup kunci; 15 kuis; 30 Evaluasi (9/12/9)
│       ├── GerbangMasukTest.php             # WP2: gerbang, 403, pagar produksi
│       ├── PenguncianSubBabTest.php         # WP3: A saja, B via URL ditolak, 33/67/100
│       ├── AlurKuisTest.php                 # WP5: mulai, cek-step, kumpul, soal 5 menutup sesi
│       ├── SoalBerurutanTest.php            # WP5: soal 2 terkunci, termasuk via URL
│       ├── UlangKuisTest.php                # WP5: percobaan baru, progres tetap
│       ├── JenisSoalTest.php                # WP5: unsur, substitusi, model, sederhanakan, jabarkan, faktorkan; mode langkah dan langsung
│       ├── PembahasanTest.php               # WP5: tampil setelah kumpul, tidak sebelum
│       ├── KepemilikanSesiTest.php          # WP5/WP10: sesi milik siswa lain ditolak
│       ├── HintTest.php                     # WP7: Gemini disimulasikan, cadangan, p95
│       ├── HintAdversarialTest.php          # WP7: injeksi, minta jawaban, bahasa lain
│       ├── EvaluasiAksesTest.php            # WP8: terkunci sebelum 100%
│       ├── EvaluasiTimerTest.php            # WP8: Carbon::setTestNow, menit ke-60
│       ├── EvaluasiPenilaianTest.php        # WP8: 12 benar = 60, 13 benar = 65
│       ├── KomposisiEvaluasiTest.php        # WP8: 6 A, 8 B, 6 C tiap percobaan
│       ├── EvaluasiSterilTest.php           # WP8: Http::fake, nol permintaan keluar
│       ├── DasborGuruTest.php               # WP9: angka sesuai, siswa dapat 403
│       └── AutentikasiTest.php              # WP11: daftar, masuk, keluar
│
└── tools/
    └── uji-beban-sqlite.php           # WP10: ~30 siswa serentak, cek "database is locked"
```

---

## 2. Berkas yang Sengaja Dihapus di WP11

Berkas ini hanya ada selama gerbang masuk sementara dipakai. Setelah login sungguhan jadi, semuanya harus hilang dari kode rilis.

| Berkas | Tindakan di WP11 |
| --- | --- |
| `app/Http/Controllers/GerbangMasukController.php` | hapus |
| `routes/gerbang.php` | hapus |
| `resources/views/gerbang/index.blade.php` | hapus |
| `tests/Feature/GerbangMasukTest.php` | hapus atau ganti dengan uji yang membuktikan rute gerbang tidak ada |
| `database/seeders/SiswaUjiSeeder.php` dan akun email `siswa-<id>@lokal.test` | hapus atau bersihkan datanya |
| Kunci `MASUK_SEMENTARA` di `.env.example` dan `config/aljabarlearn.php` | hapus, atau pastikan nilainya `false` |

Berkas yang **tidak** berubah di WP11 (bukti prinsip "kode tidak tahu bedanya"): semua controller siswa dan guru, middleware, kebijakan, dan tampilan selain `auth/`.

---

## 3. Peta Paket Kerja ke Folder

| WP | Folder dan berkas utama yang dibuat |
| --- | --- |
| WP0 | `.env.example`, `config/aljabarlearn.php`, `phpunit.xml`, `pint.json`, `public/css/tema.css`, `CLAUDE.md`, `docs/build-log.md` |
| WP1 | `database/migrations/*`, `database/seeders/*`, `database/factories/*`, `app/Models/*`, `app/Console/Commands/BuatGuru.php`, `database/seeders/data/*`, `tests/Feature/RelasiModelTest.php`, `tests/Feature/BankSoalSeederTest.php` |
| WP2 | `GerbangMasukController`, `routes/gerbang.php`, `PeranMiddleware`, `PenggunaObserver`, `KeluarController`, `views/gerbang`, `GerbangMasukTest` |
| WP3 | `ProgresService`, `SubBabTerbuka`, `EvaluasiTerbuka`, `DasborSiswaController`, `SubBabController`, `views/siswa/dasbor` dan `sub-bab`, `PenguncianSubBabTest` |
| WP4 | `app/Services/Aljabar/*`, `tests/Unit/Aljabar/*`, `tests/data/kasus-ekspresi.json` |
| WP5 | `KuisService`, `KuisController`, `CekStepRequest`, `KumpulSoalRequest`, uji alur kuis |
| WP6 | `public/js/*` (selain `hint.js` dan `evaluasi.js`), `public/css/*`, `views/components/*` (termasuk kamus dan pembahasan), `views/siswa/kuis/soal.blade.php` |
| WP7 | `app/Services/Hint/*`, `HintController`, `public/js/hint.js`, `views/components/gelembung-ai.blade.php`, uji Hint |
| WP8 | `app/Services/Evaluasi/*`, `EvaluasiController`, `TutupEvaluasiKedaluwarsa`, `views/siswa/evaluasi/*`, `public/js/evaluasi.js`, `public/css/evaluasi.css`, uji Evaluasi |
| WP9 | `AgregasiGuruService`, `Controllers/Guru/*`, `views/guru/*`, `public/css/guru.css`, `DasborGuruTest` |
| WP10 | `README.md`, `docs/erd.md`, `docs/daftar-rute.md`, `docs/panduan-konten.md`, `tools/uji-beban-sqlite.php` |
| WP11 | `Controllers/Auth/*`, `routes/auth.php`, `views/auth/*`, `AutentikasiTest`; penghapusan berkas gerbang |

---

## 4. Rute dan Berkas yang Melayaninya

| Rute | Controller | Middleware utama | WP |
| --- | --- | --- | --- |
| `GET /` | `GerbangMasukController` (sementara) lalu `MasukController` | , | WP2 → WP11 |
| `GET /dasbor` | `DasborSiswaController` | `auth`, `peran:siswa` | WP3 |
| `GET /sub-bab/{subBab}` | `SubBabController` | + `SubBabTerbuka` | WP3 |
| `POST /sub-bab/{subBab}/kuis/mulai` | `KuisController` | + `SubBabTerbuka` | WP5 |
| `GET /sesi/{sesi}/soal/{nomor}` | `KuisController` | + kepemilikan sesi | WP5 |
| `POST /sesi/{sesi}/soal/{nomor}/cek-step` | `KuisController` | + kepemilikan sesi | WP5 |
| `POST /sesi/{sesi}/soal/{nomor}/kumpul` | `KuisController` | + kepemilikan sesi | WP5 |
| `POST /sesi/{sesi}/soal/{nomor}/hint` | `HintController` | + kepemilikan sesi | WP7 |
| `GET /evaluasi` | `EvaluasiController` | `EvaluasiTerbuka` | WP8 |
| `POST /evaluasi/mulai` | `EvaluasiController` | `EvaluasiTerbuka` | WP8 |
| `GET /evaluasi/{evaluasi}` | `EvaluasiController` | `EvaluasiTerbuka` + kepemilikan | WP8 |
| `PUT /evaluasi/{evaluasi}/jawaban/{soal}` | `EvaluasiController` | `EvaluasiTerbuka` + kepemilikan | WP8 |
| `POST /evaluasi/{evaluasi}/kumpul` | `EvaluasiController` | `EvaluasiTerbuka` + kepemilikan | WP8 |
| `GET /evaluasi/{evaluasi}/hasil` | `EvaluasiController` | `EvaluasiTerbuka` + kepemilikan | WP8 |
| `GET /guru/*` | `Controllers/Guru/*` | `auth`, `peran:guru` (baca-saja) | WP9 |

Tidak ada rute Hint di bawah `/evaluasi`. Itu disengaja (FR-51).

---

## 5. Aturan Penamaan dan Penempatan

- **Nama tabel, kolom, dan model** memakai Bahasa Indonesia mengikuti PRD bagian 10.1 (`pengguna`, `sesi_kuis`, `langkah_kuis`, dan seterusnya). Model `Pengguna` memakai `$table = 'pengguna'` dan menggantikan model `User` bawaan Laravel di `config/auth.php`; migrasi `users` bawaan dihapus.
- **Satu tanggung jawab per folder `Services/`.** Controller tipis: validasi, panggil service, kembalikan respons. Logika penguncian, urutan soal, timer, dan penilaian ada di service dan middleware, bukan di controller atau JavaScript.
- **Mesin ekspresi hanya di `app/Services/Aljabar/`.** Tidak ada parser kedua di tempat lain, termasuk di JavaScript. JavaScript hanya merapikan tampilan (`× ÷ ^`); server selalu mem-parse ulang.
- **Folder `Services/Hint/` tidak boleh di-`use` dari kode Evaluasi** (`EvaluasiController`, `Services/Evaluasi/*`). Pelanggaran aturan ini dijaga oleh `EvaluasiSterilTest`.
- **Aset:** CSS dan JavaScript biasa di `public/css` dan `public/js`, tanpa proses build dan tanpa Tailwind. Warna hanya lewat variabel di `tema.css`.
- **Konten** (materi, soal, kamus) hanya lewat `database/seeders/data/`; tidak ada halaman penyuntingan konten pada v1.0. Isinya disalin dari `docs/modul-ajar-aljabar-kelas7.md` tanpa diubah; perubahan isi hanya lewat revisi modul oleh guru.
- **Papan tombol mengikuti soal:** huruf variabel yang tampil dan diterima berasal dari kolom `variabel` soal; cara memeriksa mengikuti kolom `tipe` (`unsur`, `substitusi`, `model`, `sederhanakan`, `jabarkan`, `faktorkan`), dan bentuk lembar kerja mengikuti kolom `mode` (`langkah`: baris demi baris dengan Cek Step; `langsung`: satu kotak jawaban tanpa Cek Step).
- **`pembahasan.blade.php` hanya dipakai pada kuis**, tidak boleh ditampilkan di halaman Evaluasi.

---

## 6. Yang Tidak Dikomit ke Git

```text
.env
database/database.sqlite
storage/logs/*
vendor/
node_modules/
```

`.env.example` tetap dikomit, dengan `GEMINI_API_KEY=` dikosongkan dan `MASUK_SEMENTARA=false` sebagai nilai bawaan aman (nilai `true` hanya di `.env` lokal).

---

## 7. Catatan Penyesuaian dengan Versi Laravel

Struktur di atas mengikuti Laravel versi baru (alias middleware dan jadwal di `bootstrap/app.php` dan `routes/console.php`, perintah Artisan di `app/Console/Commands` terdaftar otomatis). Bila audit WP0 menemukan Laravel versi lama:

- alias middleware dipindah ke `app/Http/Kernel.php`;
- jadwal `evaluasi:tutup-kedaluwarsa` dipindah ke `app/Console/Kernel.php`;
- pengaturan WAL dan `busy_timeout` SQLite dipasang manual di `config/database.php`.

Pembagian folder lainnya tidak berubah.
