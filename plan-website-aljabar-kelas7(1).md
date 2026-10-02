# Plan AljabarLearn: Media Pembelajaran Aljabar SMP Kelas VII

Materi: Matematika SMP/MTs Kelas VII, Bab 4 Bentuk Aljabar (hlm. 124-158)
Sumber materi: Matematika untuk SMP/MTs Kelas VII, Kemendikbudristek 2022 (Dicky Susanto dkk.)
Dokumen acuan: Proposal Penelitian dan Pengembangan AljabarLearn; tampilan website (landing dan dashboard)

Dokumen ini menggantikan versi lama yang berupa plan satu halaman HTML tanpa login. Versi lama tidak lagi cocok dengan proposal (Laravel, database, Gemini API) maupun dengan website yang sekarang (landing + dashboard + sidebar). Bagian "Hal yang Belum Selaras" di bawah mencatat apa saja yang masih harus diputuskan.

## 1. Tujuan

Siswa SMP belajar bentuk aljabar secara mandiri di laptop/PC, mengerjakan penyederhanaan langkah demi langkah, dan mendapat petunjuk (bukan jawaban) saat macet. Evaluasi akhir dikerjakan tanpa bantuan AI.

Rumusan dari proposal:
1. Membangun web dengan alur belajar berurutan (sequential lock).
2. Mengintegrasikan Gemini API sebagai Socratic Tutor yang hanya memberi petunjuk.
3. Menguji logika sistem: Line-by-Line Checker, pembatasan akses evaluasi akhir, integrasi API.

### Tujuan pembelajaran (dari buku)

| Kode | Tujuan Pembelajaran |
|------|---------------------|
| TP 1 | Menyatakan kuantitas yang berubah-ubah dan yang tidak diketahui dengan variabel |
| TP 2 | Mengidentifikasi konstanta, koefisien, variabel, dan suku, serta mengaitkannya dengan konteks |
| TP 3 | Menginterpretasikan nilai bentuk aljabar hasil substitusi |
| TP 4 | Mengubah bentuk aljabar ke bentuk ekuivalen dengan sifat dan operasi aljabar |
| TP 5 | Memodelkan permasalahan menjadi bentuk aljabar dan menyelesaikannya |

## 2. Ruang Lingkup

Masuk:
- Teks konseptual ringan, tanpa video atau animasi berat.
- Tampilan untuk laptop/PC. HP bukan target (berbeda dari versi lama yang menyebut HP siswa).
- Input jawaban lewat papan tombol matematika di layar (Custom Math Keyboard Grid).
- Tombol Hint AI hanya di halaman latihan.
- Pengujian fokus pada logika dan integrasi, bukan uji kegunaan skala besar.

Tidak masuk:
- Hint AI di Evaluasi Akhir.
- Materi di luar Bab 4.
- Pengujian efektivitas belajar pada siswa (bisa jadi tahap lanjutan, belum ada di proposal).

## 3. Peta Materi

Jumlah pertemuan adalah usulan dan menyesuaikan jam pelajaran sekolah. Nomor halaman merujuk ke buku.

```
Bab 4 Bentuk Aljabar
│   Pemantik: Mengapa ada penggunaan huruf di matematika?
│   Contoh pembuka: rumus tetesan infus D = dv/(60n)   (hlm. 125)
│
├── A. Unsur-unsur Bentuk Aljabar (usulan 2 pertemuan, hlm. 126-136)
│   ├── Variabel untuk nilai berubah dan tak diketahui   [TP 1]
│   │     Eksplorasi 4.1 pola korek api, 1 + 3n (hlm. 127)
│   ├── Suku, koefisien, konstanta                       [TP 2]
│   │     Latihan 4.1 no. 1 dan 3 (tiket taman bermain 3a + 2b)
│   └── Substitusi nilai                                 [TP 3]
│         Latihan 4.1 no. 2 dan 4 (belanja sembako)
│
├── B. Sifat dan Operasi Aljabar (usulan 3 pertemuan, hlm. 136-146)
│   ├── Bentuk ekuivalen                                 [TP 4]
│   │     Eksplorasi 4.2 ubin kolam, 4s + 4 = 4(s + 1) (hlm. 137)
│   ├── Sifat distributif: bentuk jabaran dan faktor     [TP 4]
│   │     Eksplorasi 4.3 luas kolam terbagi (hlm. 140)
│   ├── Suku sejenis, termasuk koefisien pecahan         [TP 4]
│   │     5x + 7x = 12x; 2x + 3y tidak dapat disatukan
│   └── Sifat komutatif dan asosiatif                    [TP 4]
│         Pembuktian ekuivalen dengan alasan tiap langkah (hlm. 142)
│
├── C. Pemodelan dengan Bentuk Aljabar (usulan 2 pertemuan, hlm. 146-153)
│   ├── Satu variabel                                    [TP 5]
│   │     Eksplorasi 4.4 jarak dan waktu ke sekolah, 5.000 - 15t (hlm. 147)
│   ├── Banyak variabel dan kewajaran hasil              [TP 5]
│   │     Eksplorasi 4.5 berat buah; tinggi badan keluarga Linda (hlm. 148)
│   └── Teka-teki dan literasi finansial                 [TP 5]
│         Rahasia bilangan, tarif ojek online, deposito (Latihan 4.3, hlm. 150-153)
│
└── Penutup (usulan 1 pertemuan, hlm. 153-158)
    └── Refleksi, Uji Kompetensi, Pengayaan (modal usaha Rp5.000.000)
```

## 4. Sub-bab di Aplikasi dan Aturan Progres

Aplikasi punya 4 sub-bab. Nama pada sidebar website saat ini:

| Sub-bab | Nama di sidebar | Dasar di buku |
|---------|-----------------|---------------|
| 1 | Suku & Koefisien | Bagian A |
| 2 | Operasi Aljabar | Bagian B |
| 3 | Pemodelan Aljabar | Bagian C |
| 4 | Sifat & Persamaan | Tidak ada padanan langsung (lihat bagian 9) |

Aturan dari proposal:
- Sub-bab berikutnya terkunci sampai materi dan kuis sub-bab sebelumnya tuntas.
- Progres naik 25% per sub-bab tuntas: 25, 50, 75, 100.
- Evaluasi Akhir terkunci sampai progres 100%.
- Di dashboard, status ujian tampil "Terkunci" atau "Terbuka" mengikuti progres (screenshot menunjukkan kondisi 4/4 selesai, 100%, Terbuka).

## 5. Struktur Halaman

### Landing
- Navbar: Tentang Materi, Capaian Belajar, Fitur Interaktif, Peta Belajar, tombol Masuk ke Pembelajaran.
- Hero: judul, deskripsi, tombol Mulai Belajar Sekarang dan Buka Materi Langsung. Kartu pratinjau di kanan menampilkan pola korek api, Penguji Ubin Kolam, Model Jarak Wisnu, dan Evaluasi Mandiri (7 soal).
- Capaian Pembelajaran: 5 kartu TP.
- (bagian bawah belum terlihat di screenshot)

### Dashboard
- Sidebar kiri: profil, menu Dashboard, 4 sub-bab dengan tanda centang atau gembok, Evaluasi Akhir, tautan kembali ke landing.
- Banner sambutan dengan dua tombol: Mulai Belajar Materi dan Mulai Evaluasi Akhir.
- Tiga kartu status: sub-bab selesai, progres total, status ujian.
- Pertanyaan pemantik dan contoh infus.
- Planning Tree dengan tombol Buka Semua dan Tutup Semua.

### Halaman latihan (dari proposal, belum ada di screenshot)
- Area tengah: teks konsep, lembar kerja baris demi baris, gelembung Hint AI.
- Bawah: papan tombol (angka 0-9, x, y, a, b, operator), tombol Hint AI, tombol Cek Step.

## 6. Komponen Interaktif

| Komponen | Cara kerja | Status |
|----------|-----------|--------|
| Pola korek api | Geseran n 1-20, tampil jumlah korek dan rumus 1 + 3n | Ada di rencana sebelumnya; muncul di kartu landing |
| Penguji ubin kolam | Geseran sisi s, hitung 5 bentuk sekaligus, yang nilainya berbeda ditandai merah (4(s + 2) tidak ekuivalen) | Muncul di landing |
| Model jarak Wisnu | Jarak tempuh 15t dan sisa 5.000 - 15t | Muncul di landing; cek apakah simulasinya sudah jalan |
| Planning tree | Buka semua / tutup semua | Terlihat di dashboard |
| Line-by-Line Checker | Tiap baris pengerjaan dicek terhadap baris sebelumnya | Dari proposal; belum terverifikasi |
| Hint AI (Gemini) | Mengembalikan pertanyaan pemicu, tidak pernah jawaban akhir | Dari proposal; belum terverifikasi |
| Kuis / Evaluasi Akhir | 7 soal, bebas AI | Ada |

### Catatan teknis untuk Line-by-Line Checker

Buku sendiri (hlm. 138) mencatat bahwa substitusi hanyalah uji coba, bukan bukti ekuivalen. Kalau checker hanya mensubstitusi beberapa nilai x lalu membandingkan hasil, ia punya kelemahan yang sama: dua bentuk berbeda bisa kebetulan sama di nilai yang diuji. Pilihan yang lebih aman adalah menormalkan kedua ekspresi ke bentuk polinomial standar (kumpulkan suku sejenis, urutkan, bandingkan koefisien). Untuk Bab 4, yang hanya memuat polinomial derajat kecil, ini cukup dan tidak berat.

Aturan penilaian per baris perlu ditetapkan: baris dinilai benar jika ekuivalen dengan baris sebelumnya, bukan hanya jika sama dengan jawaban akhir. Ini yang membedakannya dari pencocokan jawaban biasa.

## 7. Bank Soal Evaluasi Akhir (7 soal)

| No | Soal | Jawaban | Konsep |
|----|------|---------|--------|
| 1 | Koefisien y pada 5x − 2y + 7 | −2 | TP 2 |
| 2 | Nilai 3m + 4 untuk m = 5 | 19 | TP 3 |
| 3 | Jabaran 3(x + 4) | 3x + 12 | TP 4 |
| 4 | Hasil 7a + 2b − 3a | 4a + 2b | TP 4 |
| 5 | Faktor dari 6x + 9 | 3(2x + 3) | TP 4 |
| 6 | 4 pensil (p) dan 3 buku (b) | 4p + 3b | TP 5 |
| 7 | Ibu 30 cm lebih pendek dari 4 kali tinggi Linda (L) | 4L − 30 | TP 5 |

Skor: 6-7 sangat baik; 4-5 cukup baik; di bawah 4 ulangi konsep inti.

Soal 1 dan 2 berjawaban satu nilai, jadi tidak memakai Line-by-Line. Soal 3 sampai 5 cocok untuk checker. Soal 6 dan 7 berjawaban satu ekspresi. Perlu diputuskan apakah Evaluasi Akhir memakai papan tombol, pilihan ganda, atau campuran.

Soal latihan yang paling cocok untuk checker (dari buku): Latihan 4.2 no. 1 (jabaran), no. 2 (faktor), no. 9 (jabarkan lalu sederhanakan), dan Uji Kompetensi no. 3, 4, 7.

## 8. Arsitektur dan Data (ringkasan proposal)

- Backend: Laravel, tampilan Blade.
- AI: Gemini API dengan system prompt Socratic. Aturan prompt: boleh bertanya balik dan menunjuk konsep (mis. sifat distributif, suku sejenis); dilarang menulis jawaban akhir atau langkah yang langsung memberi jawaban.
- Desain: Figma sebelum implementasi.
- Tujuh tabel: pengguna, sub_bab, progres_siswa, kuis, sesi_kuis, langkah_kuis, evaluasi_akhir.
- Middleware: menolak akses ke Evaluasi Akhir bila progres < 100%; rute Evaluasi Akhir tidak memanggil Gemini sama sekali.

## 9. Hal yang Belum Selaras

Ini hasil membandingkan versi lama plan, proposal, dan website. Perlu satu keputusan untuk tiap baris sebelum proposal atau skripsi dikirim.

| # | Masalah | Rekomendasi |
|---|---------|-------------|
| 1 | Proposal menyebut sub-bab: Suku & Koefisien, Penjumlahan & Pengurangan, Perkalian, Pecahan Aljabar. Website: Suku & Koefisien, Operasi Aljabar, Pemodelan Aljabar, Sifat & Persamaan. Buku Bab 4 hanya punya tiga bagian (A, B, C). | Pilih satu daftar dan samakan di proposal, website, dan plan ini. Paling mudah dipertanggungjawabkan: ikuti buku. |
| 2 | "Pecahan Aljabar" (proposal) dan "Persamaan" (website) tidak dibahas di Bab 4. Buku hanya memuat koefisien pecahan pada suku sejenis (Latihan 4.2 no. 5, 9g, 9h). Persamaan datang di bab berikutnya. | Hapus kedua judul itu, atau ganti dengan judul yang ada di buku. Contoh: sub-bab 2 Suku Sejenis, sub-bab 3 Distributif dan Bentuk Faktor, sub-bab 4 Pemodelan. Koefisien pecahan masuk ke sub-bab 2. |
| 3 | Pemodelan (TP 5, seperempat isi bab) tidak ada di daftar proposal. | Wajib masuk agar kelima TP tercakup. |
| 4 | Landing menulis "Langsung masuk tanpa login atau registrasi", sedangkan proposal punya tabel pengguna, progres_siswa, dan evaluasi_akhir yang menyimpan data per siswa. Dashboard menyapa nama pengguna. | Putuskan: login sederhana (nama + email) atau mode tamu. Jika mode tamu, progres hanya di browser dan ERD perlu disesuaikan. |
| 5 | Versi lama plan menyatakan skor tidak disimpan. Proposal menyimpan nilai. | Ikuti keputusan nomor 4. |
| 6 | Proposal dan ERD memuat timer Evaluasi Akhir (waktu_mulai, waktu_selesai). Di dashboard tidak ada keterangan durasi. | Tentukan durasi dan perilaku saat waktu habis (otomatis kumpul atau tidak). |
| 7 | Rumus infus di dashboard tampil sebagai teks mentah `\frac{dv}{60n}`; seharusnya tampil D = dv/60n. | Perbaiki render rumus (pustaka KaTeX/MathJax belum aktif untuk elemen itu) atau tulis rumus tanpa LaTeX. |
| 8 | Versi lama menyebut cocok untuk proyektor atau HP siswa; proposal membatasi pada laptop/PC. | Gunakan batasan proposal. Ubah kalimat tujuan bila HP tidak didukung. |
| 9 | Proposal menyebut "pembuktian kebenaran sistem" tetapi tidak ada kriteria lulus uji. | Tambahkan kasus uji (bagian 10). |

## 10. Rencana Pengujian

Tiga kelompok dari proposal, dengan contoh kasus agar bisa dijalankan.

**A. Line-by-Line Checker**

| Kasus | Baris sebelumnya | Input | Hasil diharapkan |
|-------|------------------|-------|------------------|
| Langkah benar | 3(x + 4) | 3x + 12 | Benar |
| Langkah salah | 3(x + 4) | 3x + 4 | Salah |
| Urutan suku beda | 7a + 2b − 3a | 2b + 4a | Benar |
| Suku tak sejenis dijumlah | 2x + 3y | 5xy | Salah |
| Substitusi kebetulan sama | x² | 2x − 1 diuji di x = 1 | Salah (substitusi saja akan lolos) |
| Format tanda kali | 3x | 3*x, 3·x, 3×x | Benar |
| Input tidak valid | apa saja | ++x, kurung tidak seimbang | Pesan format, bukan "salah" |

**B. System prompt Gemini**
- Jalankan paling tidak 20 pertanyaan pancingan per sub-bab, termasuk "kasih jawabannya saja", "langkah terakhirnya apa", dan pertanyaan dalam bahasa campuran.
- Kriteria lulus: nol respons yang memuat jawaban akhir atau baris pengerjaan lengkap.
- Catat jumlah hint per sesi_kuis (kolom jumlah_hint_ai) dan cek batas pemakaian bila ada.
- Cek perilaku saat API gagal atau lambat: tombol tidak membuat halaman macet.

**C. Middleware dan sterilisasi AI**
- Progres 0, 25, 50, 75: akses ke Evaluasi Akhir ditolak, termasuk lewat URL langsung.
- Progres 100: akses terbuka.
- Di halaman Evaluasi Akhir: tombol Hint AI tidak ada, dan tidak ada permintaan jaringan ke endpoint Gemini (periksa lewat log server dan tab Network).
- Sub-bab 3 tidak bisa dibuka lewat URL sebelum sub-bab 2 tuntas.

## 11. Daftar Pekerjaan

Status "terlihat" berarti ada di screenshot; sisanya belum bisa saya pastikan dari materi yang ada.

Sudah terlihat:
- [x] Landing page dengan hero, kartu pratinjau, dan 5 TP
- [x] Dashboard dengan sidebar, status progres, pemantik, planning tree
- [x] Kartu Evaluasi Akhir (7 soal) dan status ujian

Perlu diverifikasi atau dikerjakan:
- [ ] Putuskan daftar 4 sub-bab final (bagian 9 no. 1-3)
- [ ] Putuskan login atau mode tamu (no. 4-5)
- [ ] Perbaiki render rumus infus (no. 7)
- [ ] Halaman materi tiap sub-bab dengan teks konsep dari buku
- [ ] Papan tombol matematika dan Line-by-Line Checker
- [ ] Integrasi Hint AI dan uji system prompt
- [ ] Middleware kunci sub-bab dan Evaluasi Akhir
- [ ] Timer Evaluasi Akhir
- [ ] Penjabaran Eksplorasi 4.3: diagram luas kolam dengan sifat distributif
- [ ] Simulasi jarak-waktu (Eksplorasi 4.4)
- [ ] Teka-teki bilangan yang bisa dicoba langsung
- [ ] Tambahan soal dari Latihan 4.1-4.3 dan Uji Kompetensi
- [ ] Halaman guru: kunci jawaban dan rubrik
- [ ] Soal pengayaan literasi finansial (modal usaha Rp5.000.000)
- [ ] Jalankan pengujian bagian 10 dan catat hasilnya untuk Bab IV proposal

## 12. Catatan

- Konten mengikuti urutan buku. Jika kurikulum atau jam sekolah berbeda, ubah jumlah pertemuan di peta materi.
- Atribusi sumber ditaruh di footer: buku siswa Kemendikbudristek 2022. Jangan menyalin teks buku panjang ke halaman; ringkas dengan kalimat sendiri dan rujuk nomor halaman.
- Gambar tokoh Al-Khawarizmi di buku bersumber dari Wikimedia Commons; periksa lisensinya sebelum dipakai di website.
