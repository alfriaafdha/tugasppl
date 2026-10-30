# Product Requirements Document (PRD)

**Produk:** AljabarLearn — Media Pembelajaran Web Aljabar Berbasis Kemandirian Belajar dan Socratic AI Tutor untuk Siswa SMP

**Versi:** 1.9 (Draf)  |  **Status:** Untuk review  |  **Platform:** Web (Laptop/PC)

---

## 1. Ringkasan Produk

AljabarLearn adalah aplikasi web pembelajaran aljabar untuk siswa SMP yang menekankan pemahaman prosedural dan kemandirian belajar. Siswa belajar secara berurutan (*sequential*), mengerjakan soal langkah demi langkah dengan papan tombol matematika khusus, dan mendapat bantuan dari Socratic AI Tutor (Gemini API) yang hanya memberi petunjuk, bukan jawaban. Evaluasi Akhir dibuat steril dari AI agar penilaian tetap berintegritas.

Materi mengikuti Bab 4 *Bentuk Aljabar* pada buku *Matematika untuk SMP/MTs Kelas VII* (Kemendikbudristek, 2022), ditulis ulang secara bertahap untuk **siswa kelas VII yang belum memahami aljabar**. Isi materi dan bank soal berada di `modul-ajar-aljabar-kelas7.md`.

## 2. Latar Belakang dan Masalah

| Masalah | Dampak | Respons Produk |
| --- | --- | --- |
| Aljabar dianggap abstrak; siswa lemah dalam menyederhanakan ekspresi langkah demi langkah | Kesalahan prosedural, kehilangan kepercayaan diri | *Line-by-Line Checker* yang memvalidasi tiap baris |
| Perangkat laptop/PC di sekolah belum dimanfaatkan untuk media interaktif yang fokus | Pembelajaran kurang efisien | UI ringan berbasis teks konseptual, dioptimalkan untuk layar laptop/PC |
| AI instan memberi kunci jawaban | Masalah integritas akademis | Socratic Tutor (hanya hint) + Evaluasi Akhir tanpa AI |
| Siswa kelas VII baru berkenalan dengan huruf sebagai pengganti bilangan | Salah paham istilah dan simbol (mis. 3x dibaca 3 + x), cepat menyerah | Materi bertahap dari konteks konkret ke simbol, kamus istilah, soal berjenjang, pembahasan setelah soal dikumpulkan, hint yang memakai bahasa dan analogi sederhana |

## 3. Tujuan dan Metrik Keberhasilan

### 3.1 Tujuan Produk

1. Menyediakan alur belajar aljabar mandiri dan berurutan untuk Bab 4 Bentuk Aljabar (3 sub-bab, tiap sub-bab 1 kuis berisi 5 soal).
2. Melatih kemandirian berpikir melalui petunjuk Socratic, bukan jawaban langsung.
3. Menjamin keandalan logika sistem: checker, penguncian akses, dan integrasi API.
4. Menjaga integritas Evaluasi Akhir.
5. Menyediakan dasbor guru untuk memantau progres siswa, jawaban kuis, dan durasi pengerjaan tiap kuis, sehingga guru dapat mengetahui bagian materi yang sulit bagi siswa.
6. Membangun pemahaman dasar aljabar pada siswa pemula: mengenal variabel, koefisien, konstanta, dan suku; menghitung nilai bentuk aljabar; mengubah bentuk aljabar dengan sifat distributif dan suku sejenis; serta menerjemahkan cerita menjadi bentuk aljabar.

### 3.2 Metrik (Success Metrics)

| Metrik | Target Awal (usulan) | Cara Ukur |
| --- | --- | --- |
| Akurasi Line-by-Line Checker pada set uji | ≥ 95% sesuai kunci pakar | Pengujian logika dengan kumpulan kasus benar/salah |
| Kebocoran jawaban akhir oleh AI Hint | 0 kasus pada set uji prompt | Uji *system prompt* dengan variasi input, termasuk upaya memancing jawaban |
| Panggilan API Gemini pada Evaluasi Akhir | 0 panggilan | Log server dan uji middleware |
| Akses Evaluasi Akhir sebelum progres 100% | 0 berhasil | Uji middleware |
| Waktu respons Hint AI | ≤ 5 detik (p95) | Pencatatan latensi |
| Penyelesaian seluruh sub-bab oleh siswa uji | Dilaporkan (tanpa target tetap) | Data `progres_siswa` |
| Kelengkapan data dasbor guru | 100% sesi kuis selesai memiliki waktu mulai, waktu selesai, dan langkah jawaban | Pemeriksaan data sesi\_kuis dan langkah\_kuis |
| Kebenaran bank soal | 100% kunci jawaban sesuai hitungan aljabar dan diperiksa guru matematika | Verifikasi otomatis dan daftar periksa guru (modul ajar bagian 9) |

*Catatan: target angka adalah usulan dan perlu disepakati.*

## 4. Pengguna Target

**Persona utama: Siswa kelas VII SMP yang belum memahami aljabar.** Siswa sudah mengenal operasi bilangan dasar, urutan operasi, dan pecahan sederhana, tetapi baru pertama kali memakai huruf sebagai pengganti bilangan. Menggunakan laptop/PC di sekolah atau rumah. Kebutuhan: penjelasan pendek dengan contoh konkret, istilah yang diperkenalkan satu per satu, latihan bertahap dari mudah ke sulit, umpan balik langsung yang tidak menghakimi, dan bantuan tanpa dibocorkan jawabannya.

**Persona kedua: Guru.** Guru memantau progres siswa, jawaban kuis, dan durasi pengerjaan melalui dasbor untuk melihat bagian materi yang sulit. Guru tidak mengelola materi dan soal pada v1.0. Peneliti turut mengamati hasil pengujian.

### 4.1 Prinsip Desain Konten untuk Pemula

1. **Konkret dulu, simbol kemudian:** setiap konsep dimulai dari benda atau cerita (kantong berisi kubus, korek api, biaya ojek), lalu ditulis dengan huruf.
2. **Satu gagasan per bagian** dan satu contoh per bagian.
3. **Istilah diberi arti dan contoh saat pertama muncul**, lalu tersedia di kamus istilah.
4. **Soal berjenjang:** dalam satu kuis, soal bergerak dari mengenali, menghitung, lalu menyusun sendiri.
5. **Kesalahan umum dibahas terbuka** pada setiap sub-bab.
6. **Pesan umpan balik netral dan menyemangati**, tanpa kata yang menghakimi.
7. **Tanpa gambar:** pola dan diagram pada buku diceritakan dengan teks.

## 5. Ruang Lingkup

### 5.1 Dalam Cakupan (In Scope)

- Registrasi dan login siswa (dikerjakan paling akhir; selama pengembangan siswa dan guru masuk lewat gerbang masuk sementara tanpa login).
- Akun guru dan dasbor guru (baca-saja) untuk memantau progres, jawaban kuis, dan durasi pengerjaan siswa.
- Bab 4 Bentuk Aljabar dengan 3 sub-bab materi. Setiap sub-bab diikuti 1 kuis (5 soal) yang diletakkan di bawah materinya:
  - **A. Unsur-Unsur Bentuk Aljabar:** variabel, koefisien, konstanta, suku, substitusi nilai, dan pemodelan dasar.
  - **B. Sifat-Sifat dan Operasi Aljabar:** bentuk ekuivalen, sifat distributif (bentuk jabaran dan bentuk faktor dengan faktor persekutuan), suku sejenis, kurung (termasuk tanda minus di depan kurung), dan koefisien pecahan.
  - **C. Pemodelan dengan Bentuk Aljabar:** menerjemahkan cerita menjadi bentuk aljabar (selisih, kelipatan, dua langkah, biaya tetap + per satuan, kuantitas yang berubah) dan menghitung dengan substitusi.
- Materi berbasis teks konseptual (tanpa video/animasi/gambar), disusun dalam bagian pendek: pengingat prasyarat, konsep, contoh bertahap, kesalahan umum, dan ringkasan.
- Kamus istilah dan pembahasan singkat setelah soal kuis dikumpulkan.
- Kuis latihan (5 soal per kuis, berjenjang) dengan *Custom Math Keyboard Grid*; soal bermode `langkah` dikerjakan baris demi baris dengan *Line-by-Line Checker*, soal bermode `langsung` dijawab dalam satu kotak; jenis soal: menyebut unsur, menghitung nilai (substitusi), menulis bentuk aljabar dari cerita, menyederhanakan, menjabarkan, dan memfaktorkan; kuis boleh diulang tanpa batas.
- Socratic AI Hint via Gemini API (paket gratis).
- Penguncian berurutan antar sub-bab serta progres otomatis per sub-bab (1/3 per sub-bab).
- Evaluasi Akhir (20 soal dipilih acak dari bank soal yang mencakup ketiga sub-bab, timer 1 jam, KKM 65), steril dari AI, boleh diulang sampai memenuhi KKM.
- Antarmuka untuk layar laptop/PC.

### 5.2 Di Luar Cakupan (Out of Scope)

- Aplikasi mobile/tablet dan antarmuka responsif ponsel.
- Konten video atau gambar animasi.
- Manajemen materi, soal, dan akun oleh guru/admin, serta manajemen kelas (guru hanya memakai dasbor pemantauan).
- Ekspor data dasbor guru (misalnya CSV); belum direncanakan pada v1.0.
- Pengujian pengguna/efektivitas pedagogis skala besar (pengujian difokuskan pada *Integration & Logic Testing*).
- Materi di luar Bab 4 Bentuk Aljabar.
- Perkalian dua kurung (mis. (x+1)(x+3)) dan pemfaktoran bentuk kuadrat (mis. x²+5x+6) tidak dipakai pada bank soal v1.0 karena terlalu berat bagi pemula (mesin ekspresi tetap mendukungnya untuk pengayaan di masa depan).
- Soal yang bergantung pada gambar atau diagram, teka-teki bilangan, aktivitas diskusi kelompok, proyek usaha, dan simulasi di tautan luar.

## 6. Alur Pengguna Utama

1. Siswa mendaftar/masuk, melihat dasbor dengan sidebar: profil, *progress bar*, 3 sub-bab A–C (terkunci 🔒 kecuali yang pertama), dan menu Evaluasi Akhir (terkunci).
2. Siswa membuka sub-bab A dan membaca materi bertahap (pengingat, konsep, contoh, kesalahan umum, ringkasan) dengan bantuan kamus istilah; kuis sub-bab tersebut muncul di bawah materi.
3. Siswa mengerjakan 5 soal kuis satu per satu dengan keyboard grid. Soal bermode `langkah` (menghitung nilai atau menyederhanakan, menjabarkan, memfaktorkan yang berlangkah) dikerjakan baris demi baris: siswa mengisi satu baris dan menekan `↵ Cek Step`; bila benar, baris itu terkunci sebagai langkah ke-n dan baris baru muncul, bila salah, baris tidak terkunci dan dapat diperbaiki. Soal bermode `langsung` (menyebut unsur, menulis bentuk aljabar dari cerita, dan soal satu langkah) dijawab dalam satu kotak tanpa Cek Step. Setelah selesai, siswa menekan `Kumpulkan` dan jawaban terkirim.
4. Jika buntu, siswa menekan `💡 Hint AI` dan menerima pertanyaan pemicu/petunjuk konseptual.
5. Kuis latihan tidak punya nilai minimum: setiap soal yang dikumpulkan menampilkan pembahasan singkat dan memunculkan tombol `Soal Selanjutnya` untuk membuka soal berikutnya. Setelah soal kelima dikumpulkan, kuis selesai (jawaban salah tidak menghalangi, dan siswa boleh mengulang kuis kapan pun).
6. Setelah kuis selesai, sub-bab tuntas, progres naik sepertiga (33%), dan sub-bab berikutnya terbuka. Alur yang sama berulang di sub-bab B (67%) dan C (100%).
7. Pada progres 100%, Evaluasi Akhir terbuka; siswa mengerjakan dalam batas waktu tanpa tombol Hint AI.
8. Nilai disimpan dan ditampilkan; bila belum memenuhi KKM, siswa dapat mengulang Evaluasi Akhir.

**Alur guru:** guru login dan membuka dasbor, melihat progres tiap siswa, memilih siswa untuk melihat jawaban dan durasi per kuis, lalu membaca ringkasan per sub-bab dan per soal untuk menemukan bagian materi yang paling sulit.

## 7. Kebutuhan Fungsional

Prioritas: **P0** = wajib v1.0, **P1** = penting, **P2** = opsional.

### 7.1 Autentikasi dan Profil

| ID | Kebutuhan | Prioritas |
| --- | --- | --- |
| FR-01 | Siswa dapat mendaftar dengan nama, email, dan kata sandi. Dikerjakan pada fase akhir; sebelumnya siswa masuk lewat gerbang masuk sementara. | P0 |
| FR-02 | Siswa dapat login/logout; kata sandi disimpan ter-*hash*. Dikerjakan pada fase akhir. | P0 |
| FR-03 | Setelah registrasi, sistem otomatis membuat rekam `progres_siswa` untuk ketiga sub-bab (sub-bab A terbuka, lainnya terkunci). | P0 |
| FR-04 | Akun guru memiliki peran guru dan dibuat secara manual oleh pengembang (tanpa halaman manajemen pengguna pada v1.0). | P0 |

### 7.2 Materi, Kuis Berurutan, dan Progres

| ID | Kebutuhan | Prioritas |
| --- | --- | --- |
| FR-10 | Sistem menampilkan teks materi per sub-bab sesuai `urutan`, disusun dalam bagian pendek: pengingat prasyarat, konsep, contoh bertahap, kesalahan umum, dan ringkasan. | P0 |
| FR-10a | Kamus istilah (variabel, koefisien, konstanta, suku, suku sejenis, ekuivalen, bentuk jabaran, bentuk faktor, substitusi, sifat distributif) dapat dibuka dari halaman materi dan kuis. | P1 |
| FR-11 | Sub-bab N+1 hanya dapat diakses bila sub-bab N berstatus tuntas; akses langsung via URL harus ditolak di sisi server. | P0 |
| FR-12 | Sub-bab dinyatakan tuntas setelah kuisnya selesai; progres bertambah 1/3 per sub-bab (33% → 67% → 100%). | P0 |
| FR-13 | *Progress bar* di sidebar diperbarui otomatis; sub-bab terkunci ditandai ikon gembok. | P0 |
| FR-14 | Siswa dapat membaca ulang sub-bab yang sudah tuntas. | P1 |
| FR-15 | Setiap sub-bab memuat 1 kuis (5 soal) yang diletakkan di bawah teks materi sub-bab tersebut. | P0 |
| FR-16 | Kuis sub-bab hanya dapat dikerjakan bila sub-bab tersebut sudah terbuka; aturan ditegakkan di server. | P0 |
| FR-17 | Setelah kuis selesai, muncul penanda sub-bab tuntas dan tombol menuju sub-bab berikutnya; setelah sub-bab C, tombol menuju Evaluasi Akhir. | P0 |
| FR-18 | Sub-bab berikutnya (B atau C) terbuka hanya setelah kuis sub-bab sebelumnya selesai. | P0 |
| FR-19 | Kuis yang sudah selesai dapat dibuka kembali (baca-saja) dan kemajuan kuis tersimpan bila siswa keluar lalu kembali. | P1 |

### 7.3 Custom Math Keyboard Grid

| ID | Kebutuhan | Prioritas |
| --- | --- | --- |
| FR-20 | Papan tombol visual berisi angka 0–9, huruf variabel sesuai soal (default x dan y; huruf lain seperti n, t, p, m, k, L, a, b hanya muncul bila dipakai soal tersebut), dan operator +, −, ×, ÷, serta tombol hapus. | P0 |
| FR-21 | Tombol `💡 Hint AI` dan `↵ Cek Step` berada pada keyboard grid. | P0 `↵ Cek Step` hanya tampil pada soal bermode `langkah`; pada soal `langsung` tombol disembunyikan. |
| FR-22 | Input ekspresi melalui klik tombol; input keyboard fisik dibatasi pada karakter yang valid. | P1 |
| FR-23 | Tombol tanda kurung ( ) dan pecahan (garis pecahan atau /), karena dipakai pada soal sub-bab B. | P0 |
| FR-23a | Tombol pangkat (^) disediakan; soal bank v1.0 belum memakainya. | P1 |

### 7.4 Kuis dan Line-by-Line Checker

| ID | Kebutuhan | Prioritas |
| --- | --- | --- |
| FR-30 | Setiap soal membuka `sesi_kuis`. Siswa mengerjakan soal bermode `langkah` baris demi baris, dan soal bermode `langsung` dalam satu kotak jawaban. | P0 |
| FR-30a | Tiap soal memiliki jenis (`tipe`) yang menentukan cara memeriksa: `unsur` (satu jawaban berupa bilangan atau huruf), `substitusi` (setiap baris berupa bilangan yang bernilai sama dengan ekspresi awal setelah nilai variabel dimasukkan), `sederhanakan`, `jabarkan`, dan `faktorkan` (setiap baris ekuivalen dengan baris sebelumnya), serta `model` (menulis bentuk aljabar dari cerita). | P0 Aturan baris di sini berlaku pada mode `langkah`; pada mode `langsung` jawaban tunggal dinilai saat dikumpulkan (FR-33a). |
| FR-30b | Tiap soal kuis memiliki `mode`: `langkah` (baris demi baris dengan Cek Step) atau `langsung` (satu jawaban, dinilai saat dikumpulkan). Mode `langkah` hanya untuk tipe `substitusi`, `sederhanakan`, `jabarkan`, dan `faktorkan`; tipe `unsur` dan `model` selalu `langsung`. Seluruh soal Evaluasi Akhir bersifat `langsung`. | P0 |
| FR-31 | Pada soal bermode `langkah`, saat `↵ Cek Step`, sistem memvalidasi apakah baris saat ini **ekuivalen secara matematis** dengan baris sebelumnya (atau `ekspresi_awal` soal untuk baris pertama; cara memeriksa mengikuti jenis soal, lihat FR-30a). | P0 |
| FR-32 | Hasil validasi (benar/salah) ditampilkan seketika per baris. Baris yang benar **terkunci** (tidak dapat diubah) sebagai langkah ke-n dan baris baru muncul; baris yang salah tidak terkunci dan tetap di kotak input untuk diperbaiki. Setiap percobaan Cek Step, benar maupun salah, disimpan di `langkah_kuis` dengan `nomor_baris`, `input_ekspresi`, `status_benar` agar guru dapat melihat kesalahan siswa; baris terkunci adalah rekam dengan `status_benar` benar. | P0 |
| FR-33 | Pada soal `langkah`, soal dianggap selesai bila baris terkunci terakhir cocok dengan `jawaban_akhir` dalam bentuk paling sederhana; antarmuka lalu mengarahkan siswa menekan `Kumpulkan`. | P0 |
| FR-33a | Pada soal `langsung` tidak ada Cek Step. Jawaban tunggal dinilai server saat `Kumpulkan` terhadap `jawaban_akhir` menurut `tipe`, lalu disimpan sebagai satu rekam `langkah_kuis` (`nomor_baris` = 1, `dikumpulkan` = benar) sehingga dasbor guru tetap membaca data dari tabel yang sama. | P0 |
| FR-34 | Parser menangani ekspresi tidak valid (sintaks salah) dengan pesan kesalahan ramah, tanpa menghentikan sesi. | P0 |
| FR-35 | Pada soal `langkah`, siswa dapat memperbaiki baris yang salah dan mengulang pengecekan; baris yang sudah terkunci tidak dapat diubah. | P0 |
| FR-35a | Bila baris salah, sistem menampilkan pesan netral; untuk kesalahan umum yang dapat dikenali (mis. angka di luar kurung tidak mengalikan semua suku, suku tidak sejenis dijumlahkan, tanda minus di depan kurung tidak membalik tanda) pesan memberi petunjuk umum tanpa menyebutkan jawaban. | P1 |
| FR-36 | Satu kuis berisi 5 soal. Kuis dinyatakan selesai setelah siswa mengumpulkan kelima soal; tidak ada nilai minimum, sehingga jawaban salah tidak menghalangi kemajuan. | P0 |
| FR-37 | Siswa dapat mengulang kuis tanpa batas; tiap pengulangan membuat sesi\_kuis baru (percobaan\_ke bertambah) dan tidak mengurangi progres. | P0 |
| FR-38 | Sistem mencatat waktu\_mulai, waktu\_selesai, dan durasi tiap percobaan kuis, serta seluruh langkah jawaban, sebagai sumber data dasbor guru. | P0 |
| FR-39 | Siswa dapat mengumpulkan soal meski jawaban akhir belum benar; soal tercatat salah dan kuis tetap dapat diselesaikan. | P0 Pada soal `langkah`, penilaian memakai baris terkunci terakhir (tanpa baris terkunci dinilai salah); tombol `Kumpulkan` tetap tersedia. |
| FR-39a | Soal dikerjakan satu per satu. Setelah sebuah soal dikumpulkan (benar maupun salah), tombol `Soal Selanjutnya` muncul untuk membuka soal berikutnya; soal n+1 terkunci sampai soal n dikumpulkan, dan aturan ini ditegakkan di server. | P0 |
| FR-39b | Pada soal kelima, tombol `Soal Selanjutnya` tidak ditampilkan; setelah soal dikumpulkan, kuis dinyatakan selesai dan muncul penanda sub-bab tuntas (FR-17). | P0 |
| FR-39c | Setelah sebuah soal kuis dikumpulkan (benar maupun salah), sistem menampilkan pembahasan singkat dari data soal (bukan dari AI). Pembahasan tidak tersedia pada Evaluasi Akhir. | P1 |

### 7.5 Socratic AI Tutor (Gemini API)

| ID | Kebutuhan | Prioritas |
| --- | --- | --- |
| FR-40 | Tombol `💡 Hint AI` mengirim konteks (soal, langkah terakhir siswa) ke Gemini API melalui backend Laravel; kunci API tidak pernah terekspos ke klien. | P0 |
| FR-41 | *System prompt* mewajibkan AI memberi pertanyaan pemicu atau petunjuk konseptual, **tidak menyebutkan jawaban akhir** atau hasil lengkap langkah berikutnya. Bahasa dan analogi sederhana untuk siswa kelas VII, hanya memakai istilah yang sudah dipelajari sampai sub-bab yang sedang dikerjakan; permintaan hint berikutnya pada soal yang sama boleh makin konkret (misalnya contoh dengan angka lain) tanpa menyebutkan jawaban akhir. | P0 |
| FR-42 | Respons ditampilkan dalam gelembung dialog di area utama, dalam Bahasa Indonesia. | P0 |
| FR-43 | Setiap penggunaan hint menambah `jumlah_hint_ai` pada `sesi_kuis`. | P0 |
| FR-44 | Backend menyaring respons: bila respons mengandung `jawaban_akhir`, respons diganti hint cadangan atau diminta ulang. | P1 |
| FR-45 | Penanganan galat API (timeout, kuota, kegagalan): pesan ramah dan tombol tetap dapat dipakai ulang; kuis tidak terblokir. | P0 |
| FR-46 | Pembatasan frekuensi (*rate limit*) teknis berupa jeda singkat antar permintaan untuk menjaga kuota paket gratis Gemini; tidak ada batas jumlah Hint AI per soal. | P1 |

### 7.6 Evaluasi Akhir (Steril AI)

| ID | Kebutuhan | Prioritas |
| --- | --- | --- |
| FR-50 | Evaluasi Akhir terkunci total sampai progres 100%; penguncian ditegakkan oleh *middleware* sisi server. | P0 |
| FR-51 | Halaman dan endpoint Evaluasi Akhir tidak menampilkan tombol Hint AI dan menolak/menonaktifkan seluruh panggilan ke Gemini API. | P0 |
| FR-52 | Evaluasi Akhir berisi 20 soal (dipilih acak dari bank soal yang mencakup ketiga sub-bab) dengan batas waktu 1 jam. Timer berjalan sejak `waktu_mulai`; saat waktu habis, jawaban otomatis dikumpulkan dan `waktu_selesai` dicatat. | P0 |
| FR-53 | Nilai dihitung dan disimpan di `evaluasi_akhir`; hasil ditampilkan setelah pengumpulan. | P0 |
| FR-54 | Timer divalidasi di server (bukan hanya klien) agar tidak dapat dimanipulasi. | P0 |
| FR-55 | Evaluasi Akhir dapat diulang tanpa batas sampai nilai memenuhi KKM; tiap percobaan tersimpan sebagai rekam baru dengan percobaan\_ke bertambah. | P0 |
| FR-56 | Soal Evaluasi Akhir disimpan di tabel terpisah (soal\_evaluasi), bukan di tabel soal kuis latihan. | P0 |
| FR-57 | Siswa dinyatakan lulus bila nilai memenuhi KKM; KKM ditetapkan 65 dan disimpan sebagai nilai yang dapat dikonfigurasi di sistem. | P0 |

### 7.7 Dasbor Guru

Dasbor guru bersifat baca-saja dan memakai data yang sudah dicatat sistem.

| ID | Kebutuhan | Prioritas |
| --- | --- | --- |
| FR-60 | Guru dapat login dan membuka dasbor; hanya peran guru yang dapat mengakses dasbor (ditegakkan middleware di server). | P0 |
| FR-61 | Dasbor menampilkan daftar siswa beserta progres (33% / 67% / 100%), serta sub-bab terakhir yang dikerjakan. | P0 |
| FR-62 | Guru dapat membuka detail siswa untuk melihat jawaban kuis (langkah per baris, status benar/salah, jumlah Hint AI) pada setiap percobaan. | P0 |
| FR-63 | Dasbor menampilkan waktu mulai, waktu selesai, durasi, dan jumlah percobaan tiap kuis per siswa. | P0 |
| FR-64 | Dasbor merangkum per sub-bab (satu kuis), per subtopik, dan per soal: rata-rata durasi, rata-rata jumlah percobaan, persentase langkah salah, dan penggunaan Hint AI, agar guru dapat melihat bagian materi yang sulit. | P0 |
| FR-65 | Dasbor menampilkan riwayat Evaluasi Akhir tiap siswa (nilai, percobaan, status KKM). | P1 |
| FR-66 | Guru tidak dapat mengubah materi, soal, atau data siswa lewat dasbor. | P0 |

## 8. Aturan Bisnis Utama

1. Progres = jumlah sub-bab tuntas × 1/3 (33%, 67%, 100%).
2. Sub-bab terbuka hanya jika sub-bab sebelumnya tuntas; tiap sub-bab memiliki 1 kuis, dan sub-bab tuntas setelah kuisnya selesai.
3. Kuis latihan tidak punya nilai minimum dan boleh diulang tanpa batas; kuis selesai setelah kelima soalnya dikumpulkan.
4. Evaluasi Akhir (20 soal, 1 jam) hanya terbuka pada progres 100%; lulus bila nilai ≥ KKM (65), dan boleh diulang sampai lulus.
5. Hint AI dan pembahasan soal tersedia hanya pada kuis latihan (hint tanpa batas jumlah per soal), tidak pada Evaluasi Akhir.
6. AI tidak boleh membocorkan jawaban akhir.
7. Satu langkah dinilai benar bila ekuivalen secara matematis dengan langkah sebelumnya. Hanya langkah yang benar yang terkunci sebagai langkah jawaban; percobaan yang salah tetap dicatat untuk dasbor guru.
8. Hanya peran guru yang dapat membuka dasbor guru; dasbor bersifat baca-saja.
9. Soal kuis bermode `langkah` dikerjakan baris demi baris, sedangkan soal bermode `langsung` dijawab dalam satu kotak dan dinilai saat dikumpulkan. Semua soal Evaluasi Akhir bermode `langsung`.

## 9. Kebutuhan Non-Fungsional

| Kategori | Kebutuhan |
| --- | --- |
| Performa | Halaman dimuat ringan (tanpa media berat); validasi langkah ≤ 1 detik; Hint AI ≤ 5 detik (p95). |
| Keamanan | Kata sandi di-*hash*; proteksi CSRF; kunci Gemini API hanya di server (`.env`); otorisasi sisi server untuk semua rute terkunci dan dasbor guru (hanya peran guru); validasi dan sanitasi input ekspresi. Gerbang masuk sementara (tanpa login) hanya untuk pengembangan dan wajib dihapus sebelum rilis. |
| Privasi | Data siswa minimal (nama, email); konteks yang dikirim ke Gemini tidak memuat data identitas siswa. |
| Kompatibilitas | Browser modern (Chrome, Edge, Firefox) pada layar laptop/PC. |
| Keandalan | Kegagalan API Gemini tidak mengganggu fungsi inti (materi, checker, progres). |
| Kegunaan | Bahasa Indonesia sederhana untuk siswa kelas VII (kalimat pendek, istilah mengikuti kamus); pesan umpan balik netral dan menyemangati; tata letak konsisten; ukuran tombol grid nyaman diklik. |
| Pemeliharaan | Struktur kode Laravel modular; konten materi dan soal dapat ditambah lewat seeder/basis data. |

## 10. Arsitektur dan Teknologi

- **Backend:** Laravel (routing, middleware, Eloquent ORM).
- **Frontend:** Blade + CSS biasa + JavaScript biasa (tanpa framework); *Custom Math Keyboard Grid* dan Line-by-Line Checker (antarmuka); halaman dasbor guru dengan Blade.
- **Basis data:** SQLite (satu-satunya basis data).
- **AI:** Gemini API (paket gratis) dipanggil dari service class di backend dengan *system prompt* Socratic.
- **Desain:** wireframe dan prototipe di Figma.
- **Parser ekspresi:** modul buatan sendiri di Laravel untuk menguji ekuivalensi aljabar.

### 10.1 Model Data (10 Entitas)

| Entitas | Field Utama | Keterangan |
| --- | --- | --- |
| `pengguna` | id, nama, email, kata\_sandi, peran (siswa/guru), dibuat\_pada, diperbarui\_pada | Akun siswa dan guru |
| `sub_bab` | id, judul, urutan, teks\_materi, bobot\_progres | 3 sub-bab (A–C); bobot progres 1/3 |
| `progres_siswa` | id, pengguna\_id, sub\_bab\_id, status\_tuntas, tanggal\_tuntas | Relasi pengguna–sub\_bab |
| `kuis` | id, sub\_bab\_id (unik), judul | 1 kuis per sub-bab |
| `soal_kuis` | id, kuis\_id, nomor (1–5), tipe, mode, teks\_soal, variabel, ekspresi\_awal, nilai\_variabel, jawaban\_akhir, subtopik, pembahasan | 5 soal per kuis (15 soal latihan); soal dibuka berurutan; `mode` (`langkah` atau `langsung`) menentukan lembar baris demi baris atau satu kotak jawaban; `variabel` menentukan huruf di papan tombol; `ekspresi_awal` dan `nilai_variabel` dipakai bila jenis soal memerlukannya |
| `sesi_kuis` | id, pengguna\_id, kuis\_id, percobaan\_ke, status, waktu\_mulai, waktu\_selesai, durasi\_detik, jumlah\_hint\_ai, jumlah\_soal\_dikumpulkan | Satu percobaan mengerjakan satu kuis; boleh diulang; sumber data durasi untuk dasbor guru |
| `langkah_kuis` | id, sesi\_kuis\_id, soal\_kuis\_id, nomor\_baris, input\_ekspresi, status\_benar, dibuat\_pada | Tiap percobaan Cek Step pada soal `langkah` (benar dan salah) dan satu rekam jawaban pada soal `langsung` |
| `soal_evaluasi` | id, sub\_bab\_id, tipe, teks\_soal, variabel, jawaban\_akhir, subtopik | Bank soal Evaluasi Akhir (minimal 30 soal), terpisah dari soal kuis; `sub_bab_id` untuk komposisi per percobaan |
| `evaluasi_akhir` | id, pengguna\_id, percobaan\_ke, nilai, lulus\_kkm, waktu\_mulai, waktu\_selesai | Ujian akhir berbatas waktu; boleh diulang sampai memenuhi KKM |
| `jawaban_evaluasi` | id, evaluasi\_akhir\_id, soal\_evaluasi\_id, jawaban, status\_benar | Jawaban siswa per soal pada tiap percobaan |

**Relasi:** pengguna 1–N progres\_siswa; sub\_bab 1–N progres\_siswa; sub\_bab 1–1 kuis; sub\_bab 1–N soal\_evaluasi; kuis 1–N soal\_kuis; pengguna & kuis 1–N sesi\_kuis; sesi\_kuis 1–N langkah\_kuis; soal\_kuis 1–N langkah\_kuis; pengguna 1–N evaluasi\_akhir; evaluasi\_akhir 1–N jawaban\_evaluasi; soal\_evaluasi 1–N jawaban\_evaluasi.

*Catatan: dasbor guru memakai data sesi\_kuis, langkah\_kuis, dan progres\_siswa; tidak ada tabel tambahan khusus dasbor.*

## 11. Spesifikasi UI/UX

- **Palet warna:** biru dan putih sebagai warna utama (latar putih, biru untuk sidebar, tombol, dan penekanan). Hijau dan merah hanya dipakai sebagai warna status benar/salah pada baris jawaban.
- **Sidebar kiri:** profil, *progress bar*, daftar 3 sub-bab (A–C) dengan gembok, menu Evaluasi Akhir.
- **Area utama (tengah):** teks materi, kuis sub-bab di bawah materi (tombol menuju sub-bab berikutnya muncul setelah kuis selesai), lembar kerja *line-by-line* (soal `langkah`) atau kotak jawaban tunggal (soal `langsung`), gelembung dialog Socratic AI.
- **Navigasi soal:** setelah soal dikumpulkan, tombol `Soal Selanjutnya` muncul di bawah lembar kerja; pada soal terakhir diganti penanda kuis selesai. Indikator posisi soal (misalnya 2 dari 5) ditampilkan.
- **Keyboard grid (bawah):** angka, huruf variabel sesuai soal, operator (+ − × ÷), kurung, pecahan, `💡 Hint AI`, `↵ Cek Step` (hanya pada soal `langkah`).
- **Status visual:** baris benar (hijau, terkunci), salah (merah), menunggu (netral); timer jelas terlihat di Evaluasi Akhir.
- **Kamus istilah:** panel kecil yang dapat dibuka dari halaman materi dan kuis.
- **Pembahasan:** kotak pembahasan singkat muncul setelah soal kuis dikumpulkan (tidak ada di Evaluasi Akhir).
- **Bahasa pesan:** kalimat pendek dan netral, misalnya "Belum tepat, coba periksa lagi bagian yang ada tanda minusnya."; tidak ada kata yang menghakimi.
- **Evaluasi Akhir:** tampilan terpisah tanpa gelembung AI maupun tombol Hint AI.

**Dasbor guru (halaman terpisah):** tabel siswa dengan progres, detail jawaban per kuis dan percobaan, durasi pengerjaan, serta ringkasan per sub-bab dan kuis untuk melihat bagian materi yang sulit.

## 12. Rencana Pengujian (Integration & Logic Testing)

| Area | Skenario Uji | Hasil yang Diharapkan |
| --- | --- | --- |
| Line-by-Line Checker | Baris ekuivalen, baris salah, sintaks tidak valid, bentuk belum sederhana | Validasi tepat; pesan galat ramah |
| Mode soal | Soal `langkah`: baris benar, lalu salah, lalu benar; kirim Cek Step ke soal `langsung` | Baris benar terkunci dan baris baru muncul; baris salah tidak terkunci tetapi tercatat; Cek Step pada soal `langsung` ditolak |
| System Prompt Gemini | Hint normal, upaya siswa meminta jawaban langsung, injeksi prompt | AI hanya memberi petunjuk; tidak membocorkan jawaban |
| Middleware sequential | Akses URL sub-bab/Evaluasi terkunci secara langsung | Ditolak (redirect/403) |
| Sterilisasi Evaluasi | Cek halaman dan jaringan selama Evaluasi Akhir | Tanpa tombol Hint dan 0 panggilan Gemini |
| Timer | Manipulasi waktu di klien, waktu habis pada 1 jam | Server tetap menjadi acuan; pengumpulan otomatis |
| KKM dan ulang Evaluasi | Nilai < 65 lalu mengulang; nilai ≥ 65 | Percobaan baru tercatat bila < 65; status lulus bila ≥ 65 |
| Progres | Selesaikan kuis tiap sub-bab secara berurutan | 33% → 67% → 100% |
| Ketahanan API | Timeout/kuota habis | Kuis tetap berjalan; pesan ramah |
| Soal berurutan | Membuka soal 2 sebelum soal 1 dikumpulkan (termasuk lewat URL); lalu mengumpulkan soal 1 dengan jawaban salah | Akses soal 2 ditolak; setelah soal 1 dikumpulkan, tombol Soal Selanjutnya muncul dan soal 1 tercatat salah |
| Soal terakhir | Mengumpulkan soal 5 | Tombol Soal Selanjutnya tidak muncul; kuis selesai dan sub-bab tuntas |
| Penguncian sub-bab | Membuka sub-bab B atau kuisnya sebelum kuis sub-bab A selesai; lalu menyelesaikan kuis A | Akses ditolak; sub-bab B terbuka setelah kuis A selesai |
| Ulang kuis | Mengerjakan kuis berulang dengan jawaban salah, lalu mengumpulkan kelima soal | Percobaan baru tercatat; kuis selesai dan sub-bab berikutnya dapat terbuka |
| Dasbor guru | Akses dasbor sebagai siswa; sebagai guru setelah beberapa percobaan kuis | Siswa ditolak; guru melihat progres, jawaban, dan durasi per kuis dengan benar |
| Jenis soal | Mengerjakan satu soal tiap jenis (`unsur`, `substitusi`, `sederhanakan`, `jabarkan`, `faktorkan`, `model`) dengan jawaban benar dan salah | Pemeriksaan mengikuti jenis soal; `model` menerima semua bentuk ekuivalen (mis. t+3 dan 3+t) |
| Variabel per soal | Memakai huruf di luar variabel soal; membuka soal dengan huruf berbeda (n, t, L) | Huruf lain ditolak dengan pesan ramah; papan tombol hanya menampilkan huruf soal |
| Pembahasan | Mengumpulkan soal kuis benar dan salah; membuka Evaluasi Akhir | Pembahasan tampil setelah kumpul pada kuis; tidak ada di Evaluasi Akhir |
| Kesalahan umum pemula | Memasukkan jawaban khas pemula (3(x+2)→3x+2, 2x+3y→5xy, tanda minus tidak dibalik) | Dinyatakan tidak ekuivalen dengan pesan netral (petunjuk umum bila dikenali) |

## 13. Rencana Rilis (Milestone Usulan)

| Fase | Cakupan |
| --- | --- |
| 1. Analisis & Desain | Kebutuhan final, wireframe dan prototipe Figma, ERD |
| 2. Backend | Autentikasi, model data, middleware sequential, API progres |
| 3. Integrasi AI | Service Gemini, system prompt Socratic, filter respons |
| 4. Frontend | Slicing Blade, Custom Keyboard Grid, Line-by-Line Checker |
| 5. Evaluasi Akhir & Dasbor Guru | Timer, sterilisasi AI, penilaian, ulang sampai KKM, dasbor guru (progres, jawaban, durasi kuis) |
| 6. Autentikasi | Registrasi dan login siswa/guru; penghapusan gerbang masuk sementara (dikerjakan paling akhir) |
| 7. Pengujian & Perbaikan | Integration & Logic Testing, perbaikan, dokumentasi |

## 14. Risiko, Asumsi, dan Pertanyaan Terbuka

### 14.1 Risiko

| Risiko | Mitigasi |
| --- | --- |
| AI tetap membocorkan jawaban | System prompt ketat, filter respons terhadap `jawaban_akhir`, uji adversarial |
| Ekuivalensi aljabar sulit untuk pecahan dan perkalian | Normalisasi ekspresi (CAS/library), batasi bentuk soal yang didukung |
| Kuota paket gratis dan latensi API Gemini | *Rate limit*, *caching* hint, hint cadangan |
| Siswa membuka akses terkunci lewat URL | Otorisasi di server, bukan hanya UI |
| Penulisan serentak pada SQLite (banyak siswa menyimpan jawaban bersamaan) | Mode WAL dan `busy_timeout`, transaksi singkat, uji beban ringan; pemakaian dibatasi pada kelas uji |
| Keyboard grid kurang nyaman untuk ekspresi kompleks | Uji kegunaan awal; tambah tombol sesuai materi |
| Siswa pemula kewalahan atau salah paham istilah | Materi pendek bertahap, kamus istilah, soal berjenjang, pembahasan, hint yang makin konkret; uji coba materi dengan guru |
| Soal cerita sulit dibaca bagi siswa yang lemah membaca | Kalimat pendek, satu informasi per kalimat, konteks sehari-hari; diperiksa guru |
| Salah kunci jawaban pada bank soal | Verifikasi otomatis dengan perhitungan aljabar dan pemeriksaan guru matematika sebelum seeder dijalankan |

### 14.2 Asumsi

- Siswa memakai laptop/PC dengan koneksi internet stabil.
- Konten materi dan bank soal (`modul-ajar-aljabar-kelas7.md`) disiapkan dan diperiksa guru sebelum pengujian.
- Siswa sudah mengenal operasi bilangan, urutan operasi, sifat distributif pada bilangan, dan pecahan sederhana (prasyarat Bab 4 pada buku).

### 14.3 Keputusan dan Pertanyaan Terbuka

**Keputusan yang sudah diambil**

1. Parser ekuivalensi: modul buatan sendiri.
2. Kuis latihan: tanpa nilai minimum dan boleh diulang tanpa batas; setelah kelima soal dikumpulkan, siswa dapat melanjutkan.
3. Jumlah soal: 1 kuis per sub-bab dengan 5 soal (3 kuis, 15 soal latihan).
4. Evaluasi Akhir: boleh diulang sampai nilai memenuhi KKM.
5. Hint AI: tidak ada batas jumlah per soal.
6. Peran guru/admin: tidak mengelola materi dan soal; guru hanya memakai dasbor pemantauan (progres, jawaban kuis, durasi).
7. Gemini: paket gratis.
8. Soal Evaluasi Akhir: disimpan di tabel terpisah (`soal_evaluasi`).
9. KKM Evaluasi Akhir: 65.
10. Evaluasi Akhir: 20 soal dengan timer 1 jam.
11. Progres dihitung per sub-bab (33% / 67% / 100%), bukan per kuis.
12. Pengumpulan soal: siswa boleh mengumpulkan walau jawaban belum benar (tercatat salah); Evaluasi Akhir boleh diulang bila belum memenuhi KKM.
13. Akun guru dibuat manual oleh pengembang; ekspor data dasbor (CSV) belum direncanakan.
14. Struktur kuis: tiap sub-bab hanya 1 kuis berisi 5 soal (sebelumnya 4 kuis per sub-bab).
15. Navigasi soal: setelah soal dikumpulkan muncul tombol Soal Selanjutnya; soal dibuka berurutan.
16. Basis data: SQLite saja.
17. Autentikasi: halaman registrasi dan login dikerjakan paling akhir. Selama pengembangan, siswa dan guru masuk langsung lewat gerbang masuk sementara tanpa login, yang wajib dihapus sebelum rilis.
18. Rujukan materi: Bab 4 *Bentuk Aljabar*, buku *Matematika untuk SMP/MTs Kelas VII* (Kemendikbudristek, 2022); uraian ditulis ulang untuk pemula, tanpa gambar.
19. Persona utama: siswa kelas VII yang belum memahami aljabar; materi dan soal berjenjang dari konkret ke simbol.
20. Huruf variabel mengikuti soal (menggantikan batasan x, y, a, b); papan tombol hanya menampilkan huruf soal yang sedang dikerjakan.
21. Perkalian dua kurung dan pemfaktoran bentuk kuadrat tidak dipakai pada bank soal v1.0 (pengayaan di masa depan).
22. Bank soal: 15 soal kuis (3 × 5) dan 30 soal Evaluasi Akhir (9 sub-bab A, 12 sub-bab B, 9 sub-bab C); tiap percobaan Evaluasi memuat 6 soal A, 8 soal B, dan 6 soal C.
23. Bilangan pada soal ditulis tanpa pemisah ribuan (mis. 5000).

**Pertanyaan yang masih terbuka**

1. Model Gemini apa yang dipakai pada paket gratis, dan berapa batas kuotanya? (Belum diketahui; perlu dicek di dokumentasi Gemini API sebelum fase Integrasi AI. Sementara, FR-46 dan *caching* hint menjadi mitigasi.)
2. Apakah pembahasan setelah soal dikumpulkan (FR-39c) dan umpan balik kesalahan umum (FR-35a) disetujui sebagai bagian v1.0 (keduanya prioritas P1)?
3. Apakah perkalian dua kurung dan pemfaktoran bentuk kuadrat perlu dijadikan soal pengayaan opsional pada versi berikutnya?

## 15. Lampiran: Rujukan

Dokumen ini disusun berdasarkan Proposal Penelitian dan Pengembangan AljabarLearn (Bab I–V), termasuk flowchart perancangan sistem dan ERD 7 entitas yang pada PRD ini diperluas menjadi 10 entitas.

Rujukan materi dan konten: *Matematika untuk SMP/MTs Kelas VII*, Bab 4 "Bentuk Aljabar" (Kemendikbudristek, 2022); `modul-ajar-aljabar-kelas7.md` (materi tiga sub-bab, kamus istilah, bank soal kuis dan Evaluasi Akhir).
