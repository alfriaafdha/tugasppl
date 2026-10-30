# Tahap Pembangunan (Build) AljabarLearn

**Sumber:** `PRD_AljabarLearn.md` v1.8, `plan-implementasi-aljabarlearn.md`, dan `modul-ajar-aljabar-kelas7.md` v2.0 (materi dan bank soal Bab 4)
**Stack:** Laravel, Blade + CSS biasa + JavaScript biasa, SQLite (satu-satunya basis data), Gemini API (paket gratis)
**Target siswa:** kelas VII SMP yang belum memahami aljabar; seluruh teks, pesan, dan hint harus ramah pemula
**Posisi tahap:** Plan (selesai, disetujui) → **Build (dokumen ini)** → Uji akhir dan rilis
**Tujuan dokumen:** aturan main dan panduan langkah demi langkah untuk membangun AljabarLearn bersama AI, dengan AI sebagai pembuat kode dan Anda sebagai pengarah (navigator). Dokumen ini tidak mengulang isi PRD atau Plan; ia mengatur *cara* menjalankannya.

---

## 1. Apa yang Terjadi di Tahap Build

Pada tahap Plan, keputusan desain dan urutan kerja sudah ditulis. Pada tahap Build, AI menulis kode, uji, dan seeder mengikuti rencana itu, satu paket kerja (WP) pada satu waktu. Anda tidak menulis kode; Anda mengarahkan, memutuskan hal yang belum pasti, dan memeriksa hasil di setiap gerbang.

| Peran | Tugas |
| --- | --- |
| **AI (pembangun)** | Membaca rencana, mengusulkan langkah, menulis kode dan uji, menjalankan uji, melapor jujur apa yang selesai dan apa yang belum |
| **Anda (navigator)** | Menyetujui rencana tiap WP, menjawab keputusan terbuka, mencoba hasil di browser, menyediakan konten dan kunci jawaban, memutuskan lanjut atau perbaiki |
| **Guru matematika** | Memeriksa materi, kunci jawaban, hint cadangan, pembahasan, dan kumpulan uji mesin ekspresi; menyetujui perubahan isi konten (bukan AI yang menentukan benar-salah matematika) |

Prinsip dasar: **AI mengerjakan, Anda memeriksa, dan tidak ada WP yang dianggap selesai sebelum bukti uji dan tinjauan Anda ada.**

---

## 2. Gerbang Masuk: Siapkan Ini Sebelum Memulai

Centang semuanya sebelum sesi build pertama.

- [ ] Plan dan PRD final sudah dipegang dalam satu folder proyek (misalnya `docs/PRD_AljabarLearn.md`, `docs/plan-implementasi-aljabarlearn.md`, dan `docs/modul-ajar-aljabar-kelas7.md`).
- [ ] Modul ajar (materi A–C, kamus istilah, 15 soal kuis, 30 soal Evaluasi) sudah diperiksa guru matematika: bahasa, tingkat kesulitan, dan kewajaran cerita. Kunci jawaban sudah diverifikasi otomatis, tetapi itu bukan pengganti pemeriksaan guru.
- [ ] Repositori git sudah ada, dengan cabang `main` yang bersih.
- [ ] PHP, Composer, dan Laravel dapat dijalankan lokal; ekstensi SQLite PHP aktif.
- [ ] Alat AI yang dipakai dapat membaca dan menulis berkas proyek serta menjalankan perintah terminal (`php artisan ...`, `composer ...`, git).
- [ ] Berkas konteks proyek sudah dibuat (isi usulan di bagian 9, template A).
- [ ] Kunci Gemini sudah Anda miliki, tetapi **belum** dikirim ke AI. Nanti dimasukkan sendiri ke `.env` (lihat WP7).
- [ ] Keputusan terbuka yang menghalangi WP pertama sudah dijawab (bagian 3).

### 3. Keputusan Terbuka dan Kapan Harus Dijawab

Daftar ini diambil dari bagian 5 Plan. Jangan biarkan AI menebak; jawab sebelum WP yang bersangkutan dimulai.

| # | Keputusan | Wajib dijawab sebelum | Usul sementara dari Plan |
| --- | --- | --- | --- |
| 9 | Pakai ulang website yang sudah ada atau mulai baru | WP0 (diputuskan setelah audit) | Putuskan setelah audit |
| 7 | Setujui tambahan kolom (`dikumpulkan`, `cocok_jawaban_akhir`, `hint_cadangan`, `status` evaluasi) | WP1 | Setujui tiga yang pertama |
| 8 | Revisi redaksi FR-30 di PRD | WP1 (ringan, boleh paralel) | Revisi seperti usulan |
| 3 | Ukuran bank soal Evaluasi | WP1 seeder, WP8 | **Terjawab:** 30 soal (9 A, 12 B, 9 C), komposisi 6/8/6 per percobaan |
| 10 | Isi akun siswa sementara saat belum ada login | WP2 | Email penampung otomatis + kata sandi acak |
| 2 | Format soal sub-bab C (banyak berujung angka) | WP4 | **Terjawab:** `model` dan `substitusi`; sub-bab A juga memakai `unsur` |
| 6 | Variabel selain x, y, a, b | WP4 | **Terjawab:** huruf mengikuti kolom `variabel` tiap soal |
| 1 | Model Gemini paket gratis dan batas kuotanya | WP7 | Dibaca dari `.env`; cek dokumentasi dulu |
| 4 | Format jawaban Evaluasi | WP8 | Hanya jawaban akhir |
| 5 | Tata letak soal Evaluasi | WP8 | Satu halaman dengan navigasi nomor |
| 11 | Jumlah siswa bersamaan saat uji lapangan | WP10 | Puluhan siswa; ukur dengan uji beban |
| 12 | Pembahasan setelah soal (FR-39c) dan umpan balik kesalahan umum (FR-35a), keduanya P1 | WP4, WP5, WP6 | Setujui; FR-35a dikerjakan setelah akurasi checker tercapai |
| 13 | Perkalian dua kurung dan pemfaktoran bentuk kuadrat sebagai pengayaan | WP4, konten | Tidak masuk bank v1.0 |

Cara menjawab: tulis keputusan di `docs/build-log.md` (bagian 11) dan minta AI membacanya di awal sesi. Keputusan yang hanya ada di percakapan akan hilang saat sesi berganti.

---

## 4. Dokumen Rujukan dan Siapa yang Menang Bila Berbeda

Urutan otoritas, dari tertinggi:

1. **PRD** (apa yang harus ada).
2. **Plan** (bagaimana dan dalam urutan apa).
3. **Keputusan di `build-log.md`** (jawaban atas pertanyaan terbuka dan revisi yang Anda setujui).
4. **Dokumen ini** (cara kerja).

Bila AI menemukan pertentangan (misalnya FR-30 dengan model data), AI **berhenti dan melapor**, bukan memilih sendiri. Anda memutuskan, lalu keputusan dicatat.

---

## 5. Mode Pengerjaan

| Tingkat | Cara kerja | Cocok untuk |
| --- | --- | --- |
| **1. Bertahap** | AI mengerjakan satu langkah kecil (satu migrasi, satu kelas), berhenti, menunggu Anda | Hal berisiko tinggi atau baru dimulai: mesin ekspresi, prompt Gemini, Evaluasi, autentikasi |
| **2. Per WP dengan gerbang** (**bawaan**) | AI membuat rencana WP, Anda setujui, AI mengerjakan sampai uji lulus, lalu berhenti dan melapor | Sebagian besar pekerjaan |
| **3. Otonom** | AI mengerjakan beberapa langkah sekaligus tanpa berhenti, hanya berhenti pada kondisi di bagian 6.3 | WP berspesifikasi jelas dengan uji kuat: WP3, WP9, sebagian WP6 |

Rekomendasi per WP:

| WP | Tingkat | Alasan |
| --- | --- | --- |
| WP0 Audit | 1 | Hasil audit menentukan arah; Anda perlu membacanya |
| WP1 Skema | 2 | Mengubah kolom SQLite sulit; periksa skema final sebelum data masuk |
| WP2 Gerbang masuk | 2 | Ada pagar keamanan yang harus terbukti |
| WP3 Penguncian | 2 → 3 | Spesifikasi jelas dan uji mudah |
| WP4 Mesin ekspresi | 1 | Seluruh kuis bergantung padanya; akurasi diukur bertahap |
| WP5 Alur kuis | 2 | Banyak aturan server yang saling terkait |
| WP6 Frontend | 2 → 3 | Hasil perlu dilihat di browser; sebagian bisa otonom |
| WP7 Socratic AI | 1 | Risiko kebocoran jawaban dan kunci API |
| WP8 Evaluasi | 1 → 2 | Timer, penilaian, dan sterilisasi AI harus tepat |
| WP9 Dasbor guru | 3 | Baca-saja, mudah diverifikasi dengan hitungan manual |
| WP10 Uji dan pengerasan | 2 | Berjalan sepanjang jalan |
| WP11 Login | 1 | Menyentuh keamanan dan harus membersihkan jejak gerbang sementara |

Naikkan tingkat otonomi hanya bila WP sebelumnya lulus tanpa kejutan. Turunkan bila AI mulai melenceng.

---

## 6. Aturan Kerja untuk AI

### 6.1 Siklus satu WP (wajib diikuti)

1. **Baca.** AI membaca bagian WP itu di Plan, FR terkait di PRD, `build-log.md`, dan kode yang sudah ada. Ringkas pemahamannya dalam beberapa baris.
2. **Rencana singkat.** AI menuliskan daftar berkas yang akan dibuat atau diubah, uji yang akan ditulis, dan hal yang belum jelas. **Berhenti, tunggu persetujuan Anda.**
3. **Uji dulu bila memungkinkan.** Tulis uji dari kriteria "Selesai bila" di Plan, lihat gagal, baru tulis kode.
4. **Implementasi kecil-kecil.** Satu komit per satuan kerja yang utuh.
5. **Jalankan semuanya.** `php artisan test` dan `./vendor/bin/pint --test` harus hijau; uji lama tidak boleh rusak.
6. **Lapor.** Gunakan template C (bagian 9): yang selesai, yang diuji, bukti, yang belum, yang menyimpang dari rencana, dan pertanyaan.
7. **Tinjau.** Anda memeriksa (bagian 7), lalu menyetujui atau meminta perbaikan.
8. **Tutup.** Komit akhir, tag `wpN-selesai`, catat di `build-log.md`.

### 6.2 Kontrak (yang selalu berlaku)

- **Satu WP per sesi.** Jangan mengerjakan WP berikutnya "sekalian".
- **Tidak menebak.** Keputusan terbuka yang belum dijawab berarti berhenti dan bertanya.
- **Server sebagai sumber kebenaran.** Penguncian, urutan soal, timer, dan penilaian diputuskan di server; klien hanya menampilkan.
- **Satu mesin ekspresi.** Checker langkah, pemeriksa jawaban akhir, dan filter kebocoran Hint memakai modul WP4 yang sama; tidak membuat parser kedua.
- **Hint AI terpisah total dari Evaluasi.** Tidak ada jalur kode dari Evaluasi ke `GeminiClient`.
- **Kode tidak tahu beda gerbang masuk sementara dan login.** Selalu `Auth::user()`, middleware `auth` dan `peran:*`.
- **Tidak ada `eval`, SQL mentah, atau `enum` SQLite.** Pakai tipe bawaan Laravel dan validasi di aplikasi.
- **Tidak ada ketergantungan baru** (paket Composer atau npm, pustaka CSS/JS) tanpa izin. Plan menetapkan CSS biasa dan JavaScript biasa.
- **Jujur melapor.** Uji yang dilewati, dimatikan, atau disesuaikan agar lulus harus disebut. Mengubah uji supaya hijau tanpa alasan adalah pelanggaran.
- **Jangan mengerjakan di luar cakupan** (ekspor data, manajemen materi oleh guru, tampilan ponsel, basis data selain SQLite).
- **Bahasa:** antarmuka dan pesan galat dalam Bahasa Indonesia sederhana untuk siswa kelas VII pemula: kalimat pendek, istilah hanya yang ada di kamus, pesan netral dan menyemangati, tanpa gambar; nama tabel dan kolom mengikuti PRD.
- **Konten milik guru.** AI tidak menulis ulang, "memperbaiki", atau mengubah materi, soal, kunci jawaban, hint cadangan, dan pembahasan. AI hanya memindahkannya apa adanya dari `docs/modul-ajar-aljabar-kelas7.md` ke berkas data seeder, dan melapor bila menemukan kunci yang tidak cocok dengan mesin ekspresi atau kalimat yang tidak jelas.
- **Papan tombol mengikuti soal.** Huruf variabel yang tampil dan diterima berasal dari kolom `variabel` soal; jenis soal (`tipe`) menentukan cara memeriksa (PRD FR-30a).

### 6.3 AI harus berhenti dan bertanya bila

- Ada pertentangan antara PRD, Plan, dan kode yang ada.
- Dibutuhkan perubahan skema di luar yang disetujui, atau migrasi yang menghapus data.
- Dibutuhkan paket baru, kunci rahasia, atau akses jaringan di luar rencana.
- Uji tetap gagal setelah **tiga** upaya perbaikan yang berbeda (jangan berputar-putar; lapor penyebab yang dicurigai).
- Kriteria "Selesai bila" tidak dapat dipenuhi seperti tertulis.
- Konten soal atau kunci jawaban tampak salah secara matematis.

---

## 7. Peran Navigator: Apa yang Anda Lakukan di Setiap Gerbang

Di tiap gerbang, jangan hanya membaca laporan AI. Lakukan minimal ini:

1. **Jalankan sendiri** `php artisan test` dan lihat hasilnya. Laporan tanpa bukti yang bisa dijalankan ulang tidak cukup.
2. **Coba di browser** untuk WP yang punya tampilan (WP2, WP3, WP6, WP7, WP8, WP9). Klik sebagai siswa dan sebagai guru.
3. **Coba menembus aturan:** buka URL sub-bab yang terkunci, loncati soal lewat URL, ubah ID sesi milik siswa lain, akses `/guru` sebagai siswa.
4. **Baca diff yang berisiko:** migrasi, middleware, kode yang menyentuh `.env`, panggilan HTTP keluar.
5. **Periksa catatan penyimpangan** di laporan; setujui atau tolak satu per satu.
6. **Putuskan:** setujui (tag `wpN-selesai`), minta perbaikan (sebut yang spesifik), atau hentikan dan ubah rencana.

Pegangan cepat bila bingung memeriksa: *bila AI bilang selesai, minta ia menunjukkan satu perintah yang membuktikannya.*

---

## 8. Panduan Per Paket Kerja

Urutan dan ketergantungan mengikuti bagian 2 Plan. Jalur kritis: WP1 → WP4 → WP5 → WP8. WP4 dimulai segera setelah WP1, paralel dengan WP2–WP3. WP11 paling akhir.

### WP0. Audit dan Persiapan (S, tingkat 1)

- **Anda sediakan:** akses ke kode website yang sudah ada (bila ada).
- **AI mengerjakan:** pemetaan kode lama, `.env` dan `config/aljabarlearn.php` (KKM 65, 20 soal, 3.600 detik, `MASUK_SEMENTARA`), alat uji dan Pint, konfigurasi SQLite (`:memory:` untuk uji), token warna biru-putih.
- **Bukti selesai:** proyek berjalan lokal; `php artisan test` hijau (kosong); laporan audit memuat rekomendasi pakai ulang atau mulai baru.
- **Anda putuskan:** pakai ulang atau mulai baru (#9). Catat di `build-log.md`.

### WP1. Skema Data dan Seeder (M, tingkat 2)

- **Anda sediakan:** persetujuan kolom tambahan (#7); `docs/modul-ajar-aljabar-kelas7.md` v2.0 sebagai sumber teks materi, 15 soal kuis, 30 soal Evaluasi, dan kamus istilah.
- **AI mengerjakan:** 10 migrasi sesuai urutan kunci asing, batas unik, indeks dasbor, model dan relasi, seeder (3 sub-bab, 3 kuis, 15 soal, 30 soal Evaluasi, satu guru, siswa uji opsional) yang memakai berkas data `database/seeders/data/*` disalin dari modul ajar tanpa mengubah isi, WAL dan `busy_timeout`, kunci asing aktif.
- **Bukti selesai:** `php artisan migrate:fresh --seed` berhasil; uji relasi dan batas unik lulus; uji seeder memastikan `variabel` tiap soal mencakup semua huruf pada kunci dan `ekspresi_awal`.
- **Tinjau:** lihat skema akhir sebelum data banyak masuk (mengubah kolom di SQLite sulit).

### WP2. Pengguna, Peran, dan Gerbang Masuk Sementara (M, tingkat 2)

- **AI mengerjakan:** gerbang masuk siswa/guru, observer pembuat tiga rekam `progres_siswa`, middleware `peran:*`, tombol Keluar, pagar produksi.
- **Bukti selesai:** uji fitur sesuai kriteria Plan, termasuk aplikasi menolak berjalan bila `APP_ENV=production` dan `MASUK_SEMENTARA=true`.
- **Tinjau di browser:** masuk sebagai siswa baru dan guru; siswa ke `/guru` mendapat 403.

### WP3. Penguncian dan Rute Materi (M, tingkat 2 → 3)

- **AI mengerjakan:** `ProgresService`, middleware `SubBabTerbuka` dan `EvaluasiTerbuka`, dasbor siswa dengan sidebar dan gembok, halaman sub-bab (materi bertahap dan tautan kamus istilah).
- **Bukti selesai:** siswa baru hanya bisa membuka A; B lewat URL ditolak; setelah A tuntas, B terbuka dan progres 33%.
- **Tinjau di browser:** ketik URL sub-bab B langsung.

### WP4. Mesin Ekspresi (L, tingkat 1)

- **Anda sediakan:** kumpulan uji minimal 150 kasus beserta kunci dari guru atau pakar (45 kasus pertama berasal dari modul ajar bagian 7–8; sisanya variasi bentuk ekuivalen dan kesalahan umum pemula).
- **AI mengerjakan bertahap:** `Tokenizer` → `Parser` → `Polinom` (pecahan eksak) → `Normalisasi` → `CekEkuivalen` → `BentukAkhir` → `NilaiSubstitusi` → `GalatRamah`, masing-masing dengan uji unit sebelum lanjut. Enam jenis soal harus berjalan: `unsur`, `substitusi`, `model`, `sederhanakan`, `jabarkan`, `faktorkan`. `UmpanBalikKesalahan` (P1) dikerjakan setelah akurasi tercapai.
- **Bukti selesai:** laporan akurasi ≥ 95% pada kumpulan uji; semua kasus sintaks rusak memberi pesan ramah tanpa pengecualian; waktu validasi ≤ 1 detik; tidak ada `eval`.
- **Tinjau:** ambil 20 kasus acak dan periksa hasilnya sendiri; pastikan kasus "ekuivalen tetapi belum sederhana" lolos Cek Step tetapi gagal sebagai jawaban akhir; pastikan `2x` vs `x+2` dinyatakan tidak ekuivalen; pastikan kesalahan khas pemula (`3(x+2)` → `3x+2`, `2x+3y` → `5xy`, minus di depan kurung tidak membalik tanda) ditolak.

### WP5. Alur Kuis di Server (L, tingkat 2)

- **Anda sediakan:** 15 soal kuis dari modul ajar bagian 7 (dengan `tipe`, `variabel`, `ekspresi_awal`, `nilai_variabel`, kunci, `hint_cadangan`, `pembahasan`), sudah diperiksa guru.
- **AI mengerjakan:** siklus sesi (mulai/lanjut, soal aktif, Cek Step, perbaiki baris, kumpulkan, soal 1–4 dan soal 5, ulang kuis, baca-saja), pemeriksaan menurut `tipe` soal, pengiriman `pembahasan` hanya setelah soal dikumpulkan, dan keempat rute kuis.
- **Bukti selesai:** soal 2 tidak bisa dibuka sebelum soal 1 dikumpulkan (termasuk lewat URL); mengumpulkan jawaban salah tetap menaikkan hitungan; soal 5 menutup sesi dan menandai sub-bab tuntas; mengulang membuat percobaan baru dan progres tidak turun.
- **Tinjau:** coba mengakses sesi milik siswa lain.

### WP6. Frontend Kuis (L, tingkat 2 → 3)

- **AI mengerjakan:** tata letak tiga area, tema biru-putih (hijau/merah hanya untuk status), keyboard grid dengan huruf variabel sesuai soal (termasuk kurung dan pecahan; pangkat P1), lembar kerja baris demi baris dan kolom tunggal untuk jenis `unsur`, panel kamus istilah, kotak pembahasan, pesan umpan balik netral, navigasi soal, keadaan beban dan galat, JavaScript dan CSS biasa.
- **Bukti selesai:** satu kuis penuh dapat dikerjakan hanya dengan keyboard grid sampai penanda sub-bab tuntas.
- **Tinjau di browser:** wajib di Chrome, Edge, dan Firefox pada layar laptop. Minta satu siswa kelas VII (atau guru) mencoba kuis A tanpa penjelasan, dan catat bagian yang membingungkan.

### WP7. Socratic AI Tutor (L, tingkat 1)

- **Anda sediakan:** kunci Gemini, **dimasukkan sendiri ke `.env`** (jangan ditempel di percakapan); keputusan #1 (model dan kuota).
- **AI mengerjakan:** `GeminiClient` (timeout), `PromptSocratic` (bahasa dan analogi untuk pemula, hint bertahap yang makin konkret tanpa jawaban), `HintService`, `FilterKebocoran`, hint cadangan, `RateLimiter`, cache, pencatatan latensi, rute hint khusus `sesi_kuis`.
- **Bukti selesai:** uji adversarial (minta jawaban langsung, injeksi prompt, bahasa lain) menghasilkan 0 kebocoran; Gemini dimatikan atau kuota habis → kuis tetap jalan dengan hint cadangan; kunci tidak muncul di respons maupun log.
- **Tinjau:** baca teks *system prompt* sendiri; coba memancing jawaban dengan Gemini asli sebelum menyetujui; pastikan bahasa hint sederhana, memakai analogi, dan hanya memakai istilah yang sudah dipelajari di sub-bab itu.

### WP8. Evaluasi Akhir (L, tingkat 1 → 2)

- **Anda sediakan:** keputusan #4 dan #5; bank 30 soal Evaluasi dari modul ajar bagian 8 yang sudah diperiksa guru.
- **AI mengerjakan:** halaman awal dan riwayat, mulai/lanjut, pemilihan 20 soal dengan komposisi 6 A / 8 B / 6 C dan pengacakan, timer server (3.600 detik), simpan otomatis, pengumpulan manual dan otomatis, penutupan paksa (`evaluasi:tutup-kedaluwarsa`), penilaian, hasil, sterilisasi AI.
- **Bukti selesai:** dengan `Carbon::setTestNow`: akses sebelum 100% ditolak; jawaban setelah menit ke-60 ditolak; 12 benar = 60 (belum lulus), 13 benar = 65 (lulus); `Http::fake()` membuktikan nol permintaan keluar selama alur Evaluasi; setiap percobaan memuat 6 soal A, 8 soal B, dan 6 soal C.
- **Tinjau di browser:** tidak ada tombol atau gelembung AI di halaman Evaluasi.

### WP9. Dasbor Guru (M, tingkat 3)

- **AI mengerjakan:** rute `/guru` baca-saja, daftar siswa, detail siswa, ringkasan materi sulit per sub-bab, subtopik, dan soal (agregasi SQL), riwayat Evaluasi.
- **Bukti selesai:** dengan data uji, angka dasbor sama dengan hitungan manual; siswa ke `/guru` mendapat 403.
- **Tinjau:** hitung sendiri satu siswa dan satu kuis, bandingkan dengan dasbor.

### WP10. Pengujian, Pengerasan, dan Dokumentasi (M, tingkat 2, sepanjang jalan)

- **AI mengerjakan:** memetakan uji ke PRD bagian 12, uji beban SQLite (sekitar 30 siswa bersamaan), pengerasan (CSRF, otorisasi kepemilikan, validasi masukan, rate limit, log), README, ERD 10 entitas, daftar rute.
- **Bukti selesai:** tidak ada galat "database is locked" pada uji beban; Hint AI tidak menahan transaksi.

### WP11. Registrasi dan Login (M, tingkat 1, paling akhir)

- **AI mengerjakan:** registrasi, login, logout, validasi, rate limit login, **mematikan gerbang masuk**, membersihkan data uji, akun guru asli lewat Artisan.
- **Bukti selesai:** semua uji lama tetap lulus tanpa mengubah controller atau kebijakan; tidak ada jejak gerbang masuk di kode rilis.
- **Tinjau:** cari di kode kata `MASUK_SEMENTARA` dan rute gerbang; pastikan hilang.

---

## 9. Template Prompt

Salin, isi bagian dalam `[ ]`, dan tempel.

### A. Berkas konteks proyek (taruh di akar proyek sebagai `CLAUDE.md` atau `AGENTS.md`)

```text
# AljabarLearn: aturan untuk AI

Dokumen rujukan (urutan otoritas): docs/PRD_AljabarLearn.md > docs/plan-implementasi-aljabarlearn.md > docs/build-log.md.
Konten (materi, soal, kunci, kamus): docs/modul-ajar-aljabar-kelas7.md.
Stack: Laravel, Blade, CSS biasa, JavaScript biasa (tanpa framework/Tailwind), SQLite saja, Gemini API (paket gratis).

Aturan tetap:
- Kerjakan satu paket kerja (WP) per sesi; jangan lompat ke WP lain.
- Sebelum menulis kode: ringkas pemahaman, daftar berkas yang akan diubah, uji yang akan ditulis. Berhenti dan tunggu persetujuan.
- Server adalah sumber kebenaran (penguncian, urutan soal, timer, penilaian).
- Satu mesin ekspresi (app/Services/Aljabar) untuk checker, jawaban akhir, dan filter kebocoran Hint.
- Evaluasi Akhir tidak boleh memanggil Gemini; tidak ada rute atau service Gemini yang dapat dijangkau dari Evaluasi.
- Selalu pakai Auth::user() dan middleware auth/peran; jangan menulis logika khusus gerbang masuk sementara.
- Dilarang: eval, SQL mentah, enum, paket baru tanpa izin, menyentuh .env selain contoh, menampilkan kunci API.
- Jangan menebak keputusan terbuka. Bila bertentangan atau tidak jelas, berhenti dan tanya.
- Semua uji harus hijau (php artisan test) dan Pint bersih sebelum melapor selesai.
- Lapor jujur: apa yang diuji, apa yang tidak, apa yang menyimpang dari rencana.
- Target siswa: kelas VII yang belum memahami aljabar. Kalimat pendek, istilah hanya yang ada di kamus, pesan netral dan menyemangati, tanpa gambar.
- Konten (materi, soal, kunci, hint cadangan, pembahasan) milik guru: salin apa adanya dari docs/modul-ajar-aljabar-kelas7.md; jangan diubah. Bila kunci tidak cocok dengan mesin ekspresi, laporkan.
- Huruf di papan tombol mengikuti kolom `variabel` soal; cara memeriksa mengikuti kolom `tipe`.
- Antarmuka dalam Bahasa Indonesia sederhana untuk siswa kelas VII.
```

### B. Memulai sebuah WP

```text
Kita mulai WP[nomor]: [nama WP].

1. Baca bagian WP[nomor] di docs/plan-implementasi-aljabarlearn.md, FR terkait di PRD, dan docs/build-log.md.
2. Tulis ringkasan pemahamanmu (maksimal 8 baris), daftar berkas yang akan dibuat/diubah, uji yang akan ditulis, dan pertanyaan yang masih terbuka.
3. JANGAN menulis kode dulu. Berhenti setelah langkah 2 dan tunggu persetujuanku.

Mode: [bertahap / per WP dengan gerbang / otonom sampai kriteria selesai].
Keputusan yang sudah kujawab: [tempel atau "lihat build-log.md"].
```

### C. Laporan selesai (minta AI memakai format ini)

```text
Laporkan WP[nomor] dengan format:
1. Selesai: [daftar singkat].
2. Bukti: perintah yang kujalankan sendiri + hasil yang diharapkan.
3. Uji: yang ditulis, yang lulus, yang dilewati (sebut alasannya).
4. Menyimpang dari rencana: [daftar, atau "tidak ada"].
5. Belum selesai / risiko: [daftar].
6. Pertanyaan untukku: [daftar].
7. Berkas yang diubah: [daftar].
```

### D. Memperbaiki masalah

```text
Masalah di WP[nomor]: [gejala yang kulihat, langkah mengulangnya, hasil yang kuharapkan vs yang terjadi].

Jangan langsung mengubah kode. Pertama: tulis uji yang mereproduksi masalah dan tunjukkan bahwa uji itu gagal. Lalu jelaskan penyebab yang kamu duga. Setelah kusetujui, perbaiki dengan perubahan sekecil mungkin dan jalankan seluruh uji.
```

### E. Meminta tinjauan kritis

```text
Tinjau WP[nomor] terhadap bagian "Selesai bila" di Plan dan FR terkait di PRD. Untuk tiap kriteria: terpenuhi / tidak / tidak terbukti, dengan rujukan berkas dan uji. Cari juga: jalan pintas yang melewati penguncian di server, akses ke data milik siswa lain, dan tempat Gemini bisa terjangkau dari Evaluasi. Jangan mengubah kode; hanya laporkan.
```

### F. Melanjutkan di sesi baru

```text
Sesi baru. Baca CLAUDE.md, docs/build-log.md, dan `git log --oneline -20`. Terakhir kita menyelesaikan WP[nomor] (tag wp[nomor]-selesai). Ringkas status dalam 5 baris dan usulkan langkah berikutnya sesuai urutan di bagian 2 Plan. Jangan menulis kode sampai kusetujui.
```

---

## 10. Git dan Jejak Kerja

- **Cabang:** satu cabang per WP, misalnya `wp04-mesin-ekspresi`. Gabungkan ke `main` hanya setelah Anda menyetujui WP.
- **Komit:** kecil dan bermakna, format `wpN: [apa yang berubah]`. Satu komit tidak mencampur migrasi, logika, dan tampilan yang tidak berhubungan.
- **Tag:** `wpN-selesai` setelah gerbang lulus. Bila perlu kembali, `git checkout wpN-selesai` memberi titik aman.
- **Jangan masuk repositori:** `.env`, `database/database.sqlite`, kunci API, berkas log.
- **Sebelum eksperimen berisiko** (mengubah skema, merombak mesin ekspresi), minta AI membuat cabang percobaan.

---

## 11. Log Build (`docs/build-log.md`)

Berkas ini adalah ingatan proyek lintas sesi. Perbarui di setiap gerbang.

```markdown
# Log Build AljabarLearn

## Keputusan
| Tanggal | # | Keputusan | Dampak ke WP |
| --- | --- | --- | --- |
| [tgl] | 9 | [pakai ulang / mulai baru] | WP0, WP1 |

## Status WP
| WP | Status | Tag | Catatan |
| --- | --- | --- | --- |
| WP0 | belum / berjalan / selesai | wp0-selesai | |

## Penyimpangan dari Plan yang disetujui
- [tgl] WP[n]: [apa, alasan, disetujui oleh]

## Masalah terbuka
- [WP, gejala, dugaan penyebab]

## Metrik yang sudah terukur
- Akurasi checker: [..]% pada [..] kasus
- Kebocoran Hint pada set uji adversarial: [..]
- Panggilan Gemini saat Evaluasi: [..]
- Hint AI p95: [..] detik
```

---

## 12. Masalah yang Sering Muncul dan Tindakan

| Gejala | Kemungkinan penyebab | Tindakan |
| --- | --- | --- |
| AI mengubah uji supaya lulus | Uji dianggap penghalang | Minta kembalikan uji; minta alasan tertulis untuk setiap perubahan uji; tolak bila tidak sah |
| AI mengerjakan WP berikutnya sendiri | Instruksi kurang tegas | Ulangi aturan "satu WP per sesi"; kembalikan komit berlebih |
| Perbaikan berputar tanpa hasil | Penyebab sebenarnya belum ketemu | Aturan tiga upaya; minta AI menulis uji reproduksi dan hipotesis, atau turunkan ke tingkat 1 |
| AI menambah paket atau pustaka | Mengambil jalan pintas | Tolak; ingatkan CSS dan JavaScript biasa; minta solusi tanpa paket |
| "Database is locked" | Transaksi panjang, WAL belum aktif, Hint menahan transaksi | Periksa `busy_timeout` dan WAL; pendekkan transaksi; jangan panggil Gemini di dalam transaksi |
| Akurasi checker < 95% | Kasus uji tidak tercakup, normalisasi salah | Kelompokkan kegagalan per jenis kasus; perbaiki per kelompok; jangan menambal satu kasus |
| Hint membocorkan jawaban | Prompt kurang ketat atau filter lemah | Tambah kasus ke set uji adversarial; perketat prompt; pastikan filter memakai mesin WP4 |
| Gemini timeout atau kuota habis | Batas paket gratis | Pastikan hint cadangan tampil; perbesar cache; perpanjang jeda antar permintaan |
| Soal tidak bisa diselesaikan di keyboard grid | Tombol atau variabel kurang | Tambah tombol sesuai keputusan #6; jangan longgarkan validasi server |
| Sesi AI terasa lupa konteks | Percakapan terlalu panjang | Perbarui `build-log.md`, mulai sesi baru dengan template F |
| Kode lama bentrok dengan skema baru | Hasil audit WP0 belum ditindaklanjuti | Kembali ke WP0; putuskan rencana migrasi atau mulai baru |
| Kunci jawaban soal tidak cocok dengan hasil mesin ekspresi | Salah ketik kunci, bentuk akhir belum diatur, atau bug mesin | Jangan mengubah kunci sendiri; laporkan ke guru dan periksa uji mesin; perbaiki mesin bila memang bug, perbaiki modul bila kunci salah |
| Siswa uji bingung dengan istilah atau soal | Bahasa materi terlalu padat atau urutan kurang bertahap | Catat bagian yang membingungkan; guru merevisi modul ajar (bukan AI), lalu seeder diperbarui dari modul |

---

## 13. Yang Tidak Boleh Dilakukan AI Tanpa Izin Eksplisit Anda

- Menghapus data, menjalankan `migrate:fresh` pada data yang bukan data uji, atau mengubah skema di luar yang disetujui.
- Membaca, mencetak, atau mengomit kunci rahasia dan isi `.env`.
- Menambah paket Composer atau npm.
- Mengaktifkan `MASUK_SEMENTARA` di luar lingkungan lokal/uji.
- Menghubungkan Evaluasi Akhir ke Gemini dengan alasan apa pun.
- Mengubah kriteria "Selesai bila", target metrik, KKM, jumlah soal, atau durasi timer.
- Mengubah isi materi, soal, kunci jawaban, hint cadangan, atau pembahasan.
- Mengirim data identitas siswa (nama, email, ID) ke Gemini.
- Mengerjakan fitur di luar cakupan v1.0.

---

## 14. Definisi Selesai Tahap Build dan Serah Terima

Tahap Build selesai bila semuanya benar:

- [ ] WP0–WP11 berstatus selesai dengan tag `wpN-selesai` dan tinjauan Anda tercatat.
- [ ] Semua FR berprioritas P0 terpenuhi dan lulus uji; kurung dan pecahan (P0) serta pangkat (P1) tersedia di keyboard grid; keputusan #12 (FR-39c dan FR-35a) sudah diputuskan dan, bila disetujui, terpenuhi.
- [ ] Metrik PRD terukur dan tercapai: akurasi checker ≥ 95%; 0 kebocoran jawaban pada set uji prompt; 0 panggilan Gemini saat Evaluasi; 0 akses Evaluasi sebelum 100%; Hint AI p95 ≤ 5 detik; data dasbor 100% lengkap.
- [ ] Satu siswa uji menyelesaikan alur penuh: daftar dan login → A → B → C → Evaluasi (gagal, ulang, lulus), dan satu guru melihat seluruh datanya di dasbor.
- [ ] Gerbang masuk sementara sudah hilang dari kode; `MASUK_SEMENTARA` tidak aktif.
- [ ] README, ERD 10 entitas, daftar rute, dan panduan menambah materi/soal tersedia.
- [ ] Materi, 15 soal kuis, dan 30 soal Evaluasi sudah diperiksa guru matematika dan sesuai dengan Bab 4 serta tingkat siswa pemula; satu siswa kelas VII (atau guru) sudah mencoba alur kuis A tanpa bantuan dan hasilnya dicatat.
- [ ] `docs/build-log.md` mutakhir, termasuk seluruh penyimpangan dari Plan beserta persetujuannya.

**Serah terima ke tahap berikutnya (uji akhir dan rilis):** kirim `main` pada tag terakhir, `build-log.md`, hasil `php artisan test`, dan laporan metrik. Penyimpangan yang belum diputuskan menjadi daftar awal tahap berikutnya.
