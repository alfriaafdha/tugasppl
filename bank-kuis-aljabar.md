# Bank Kuis AljabarLearn

Dasar: Proposal AljabarLearn (bagian 2.1 sampai 2.3, ERD tabel `kuis`, `sesi_kuis`, `langkah_kuis`, dan rencana pengujian 4.1) serta materi di `materi-aljabar-kelas7.md`.

Isi: 16 soal latihan (4 per sub-bab) dan 7 soal Evaluasi Akhir.

## 1. Aturan kuis

### Yang sudah ada di proposal

| Aturan | Sumber |
|---|---|
| Kuis latihan ada di tiap sub-bab. Sub-bab berikutnya terbuka setelah materi dan kuis sub-bab itu tuntas. | 2.1 |
| Jawaban dimasukkan lewat papan tombol di layar, baris demi baris. Tiap baris dicek urut oleh Line-by-Line Checker. | 2.3 |
| Tombol Hint AI hanya memberi petunjuk atau pertanyaan pemicu, tidak pernah jawaban akhir. Jumlah pemakaian dicatat (`jumlah_hint_ai`). | 2.2, ERD |
| Evaluasi Akhir terkunci sampai progres 100%, bebas dari panggilan API Gemini, dan punya waktu mulai dan selesai. | 2.1, 2.2, ERD |
| Tombol di papan: angka 0-9, variabel x, y, a, b, simbol + − × ÷, tombol Hint AI, tombol Cek Step. | 3.3 |

### Yang proposal belum tentukan (usulan saya, perlu Anda setujui)

| Hal | Usulan |
|---|---|
| Syarat tuntas latihan | Benar minimal 3 dari 4 soal. Soal dihitung benar bila baris terakhir benar. Boleh mengulang. Pemakaian hint tidak mengurangi status tuntas. |
| Batas hint | Maksimal 3 hint per soal. |
| Durasi Evaluasi Akhir | 20 menit untuk 7 soal. Saat waktu habis, jawaban yang ada dikumpulkan otomatis. |
| Nilai Evaluasi Akhir | Jumlah benar ÷ 7 × 100. Kategori: 6-7 benar sangat baik; 4-5 cukup baik; di bawah 4 diminta mengulang konsep inti. |
| Boleh mengulang Evaluasi Akhir | Boleh; yang disimpan tiap percobaan (tabel `evaluasi_akhir` sudah 1:N). |
| Aturan Cek Step | Sebuah baris benar jika ekuivalen dengan baris sebelumnya. Baris pertama dibandingkan dengan soal. Baris terakhir juga harus memenuhi `bentuk_akhir` dan sama dengan `jawaban_akhir`. |

## 2. Pemetaan ke database

Tabel `kuis` di proposal punya kolom `sub_bab_id`, `tipe`, `teks_soal`, `jawaban_akhir`. Soal di bawah mengisi kolom itu. Dua tambahan yang saya usulkan:

- `bentuk_akhir`: syarat bentuk jawaban. Perlu karena soal "faktorkan 6x + 9" akan menerima 6x + 9 sendiri kalau checker hanya memeriksa ekuivalen. Nilainya: `nilai`, `sederhana`, `jabaran`, `faktor`.
- `kunci_langkah` (teks atau JSON): contoh langkah acuan untuk bahan Hint AI. Hint AI diberi kunci ini sebagai konteks tapi dilarang mengutipnya.

Nilai kolom `tipe`:
- `isian`: satu jawaban (angka atau ekspresi).
- `langkah`: pengerjaan beberapa baris dengan Line-by-Line.

Untuk Evaluasi Akhir, `sub_bab_id` kosong atau diberi penanda `evaluasi` karena soalnya tidak milik satu sub-bab.

## 3. Syarat papan tombol

Soal di bawah sengaja hanya memakai variabel x, y, a, b agar cocok dengan papan tombol di proposal. Tetapi ada tombol yang masih kurang untuk soal ini:

| Tombol | Dipakai di soal |
|---|---|
| Kurung ( dan ) | 3.2, 3.3, 3.4, Evaluasi no. 3 dan 5 |
| Pecahan atau garis miring / | 2.4 |
| Tanda minus untuk bilangan negatif (terpisah dari pengurangan, atau dibaca otomatis) | 1.2, 1.3, 2.3, 4.4 |
| Hapus satu karakter dan hapus baris | semua |

Untuk jawaban uang (mis. 120000), checker membuang titik pemisah ribuan. Siswa boleh mengetik 120000 atau 120.000.

Perbedaan dengan 7 soal lama di website: variabel pada soal 2, 6, dan 7 diganti ke x, a, dan b (sebelumnya m, p/b, dan L). Jika Anda ingin mempertahankan huruf lama, papan tombol perlu ditambah m, p, L.

---

## 4. Kuis Latihan

### Sub-bab 1. Variabel, Suku, Koefisien, Konstanta (TP 1-3)

**K1.1** · tipe `isian` · bentuk_akhir `nilai`
- Soal: Berapa banyak suku pada bentuk aljabar 3x − y + 10?
- Jawaban akhir: 3
- Kesalahan umum: menjawab 2 (hanya menghitung yang berhuruf) atau 4 (menghitung tanda).
- Pancingan hint: "Suku dipisahkan oleh tanda + atau −. Coba lingkari tiap potongan. Apakah angka 10 juga potongan sendiri?"

**K1.2** · tipe `isian` · bentuk_akhir `nilai`
- Soal: Tentukan koefisien x pada bentuk aljabar −x − 3.
- Jawaban akhir: −1
- Kesalahan umum: menjawab 1 (tanda terlewat) atau 0 (mengira x tidak punya angka).
- Pancingan hint: "Kalau x ditulis lengkap dengan angka pengalinya, bentuknya jadi apa? Tanda minus di depannya milik siapa?"

**K1.3** · tipe `langkah` · bentuk_akhir `nilai`
- Soal: Hitung nilai 10 − 5x untuk x = 3.
- Jawaban akhir: −5
- Langkah acuan: 10 − 5 × 3 → 10 − 15 → −5
- Kesalahan umum: (10 − 5) × 3 = 15, yaitu mengerjakan pengurangan sebelum perkalian.
- Pancingan hint: "Setelah x diganti 3, operasi mana yang harus dikerjakan lebih dulu, pengurangan atau perkalian?"

**K1.4** · tipe `langkah` · bentuk_akhir `nilai`
- Soal: Total harga tiket di taman bermain adalah 3a + 2b, dengan a = harga tiket anak dan b = harga tiket dewasa. Berapa total yang dibayar jika a = 20000 dan b = 30000?
- Jawaban akhir: 120000
- Langkah acuan: 3 × 20000 + 2 × 30000 → 60000 + 60000 → 120000
- Kesalahan umum: menukar harga anak dan dewasa; menulis 3a sebagai 3 + a.
- Pancingan hint: "Angka 3 di depan a artinya apa dalam cerita ini? Berapa harga untuk kelompok itu saja?"

### Sub-bab 2. Suku Sejenis (TP 4)

**K2.1** · tipe `isian` · bentuk_akhir `sederhana`
- Soal: Sederhanakan 5x + 7x.
- Jawaban akhir: 12x
- Kesalahan umum: 12x² (menganggap dikali) atau 35x.
- Pancingan hint: "Kedua suku punya variabel sama. Yang dijumlahkan koefisiennya atau variabelnya?"

**K2.2** · tipe `langkah` · bentuk_akhir `sederhana`
- Soal: Sederhanakan 9a + 4b − 5a − b.
- Jawaban akhir: 4a + 3b
- Langkah acuan: 9a − 5a + 4b − b → (9 − 5)a + (4 − 1)b → 4a + 3b
- Kesalahan umum: 4a + 5b (lupa bahwa −b sama dengan −1b); 13a + 3b (tanda −5a hilang).
- Pancingan hint: "Suku apa saja yang bersaudara dengan 9a? Dan koefisien dari −b itu berapa?"

**K2.3** · tipe `langkah` · bentuk_akhir `sederhana`
- Soal: Sederhanakan 2x + 8 − 5x + 1.
- Jawaban akhir: −3x + 9 (juga diterima 9 − 3x)
- Langkah acuan: 2x − 5x + 8 + 1 → (2 − 5)x + 9 → −3x + 9
- Kesalahan umum: 3x + 9 (tanda hasil 2 − 5 terbalik); 11x (semua digabung).
- Pancingan hint: "Berapa hasil 2 − 5? Perhatikan tandanya. Lalu angka 8 dan 1 digabung dengan siapa?"

**K2.4** · tipe `isian` · bentuk_akhir `sederhana`
- Soal: Sederhanakan 2/3 a + 1/4 a.
- Jawaban akhir: 11/12 a (diterima: 11/12a, (11/12)a)
- Langkah acuan: (8/12 + 3/12)a → 11/12 a
- Kesalahan umum: 3/7 a (menjumlah pembilang dan penyebut).
- Pancingan hint: "Sebelum dijumlah, pecahan harus punya penyebut yang sama. Berapa KPK dari 3 dan 4?"

### Sub-bab 3. Distributif, Jabaran, Faktor (TP 4)

**K3.1** · tipe `isian` · bentuk_akhir `jabaran`
- Soal: Jabarkan 2(3x − 5).
- Jawaban akhir: 6x − 10
- Kesalahan umum: 6x − 5 (pengali hanya ke suku pertama).
- Pancingan hint: "Angka 2 di luar kurung harus bertemu dengan berapa suku di dalam?"

**K3.2** · tipe `isian` · bentuk_akhir `faktor`
- Soal: Tulis 10x + 15 dalam bentuk faktor.
- Jawaban akhir: 5(2x + 3) (juga diterima 5(3 + 2x))
- Kesalahan umum: 10x + 15 (bentuk awal diulang); 5(2x + 15) (hanya satu suku dibagi); 2(5x + 7,5) (bukan faktor bilangan bulat terbesar).
- Pancingan hint: "Angka terbesar berapa yang bisa membagi 10 dan 15 sekaligus? Setelah dibagi, apa yang tersisa di dalam kurung?"

**K3.3** · tipe `langkah` · bentuk_akhir `sederhana`
- Soal: Jabarkan dan sederhanakan 3(x + 2) + 2(x − 1).
- Jawaban akhir: 5x + 4
- Langkah acuan: 3x + 6 + 2x − 2 → (3 + 2)x + (6 − 2) → 5x + 4
- Kesalahan umum: 5x + 8 (angka −2 dari 2 × (−1) terlewat); 5x + 3 (hanya mengalikan sebagian).
- Pancingan hint: "Buka kurung satu per satu. Apa hasil 2 × (−1)? Setelah itu, suku mana yang sejenis?"

**K3.4** · tipe `langkah` · bentuk_akhir `sederhana`
- Soal: Sederhanakan (6x − 2) − (2x + 5).
- Jawaban akhir: 4x − 7
- Langkah acuan: 6x − 2 − 2x − 5 → (6 − 2)x + (−2 − 5) → 4x − 7
- Kesalahan umum: 4x + 3 (tanda +5 tidak dibalik).
- Pancingan hint: "Tanda minus di depan kurung kedua mempengaruhi suku apa saja di dalamnya?"

### Sub-bab 4. Pemodelan (TP 5)

**K4.1** · tipe `isian` · bentuk_akhir `sederhana`
- Soal: Dika punya x kelereng. Raka punya 4 kali kelereng Dika, dikurangi 6. Tulis bentuk aljabar untuk banyak kelereng Raka.
- Jawaban akhir: 4x − 6
- Kesalahan umum: 4x + 6 (kata "dikurangi" salah dibaca); 4(x − 6) (acuan pengurang salah tempat).
- Pancingan hint: "Mulai dari 'empat kali kelereng Dika' dulu. Lalu kata 'dikurangi 6' dikenakan pada bagian mana?"

**K4.2** · tipe `isian` · bentuk_akhir `sederhana`
- Soal: Tarif sebuah ojek online adalah biaya admin Rp4.000 ditambah Rp2.000 per km. Tulis bentuk aljabar biaya untuk perjalanan x km.
- Jawaban akhir: 4000 + 2000x (diterima: 2000x + 4000)
- Kesalahan umum: 6000x (semua dikalikan x); 4000x + 2000.
- Pancingan hint: "Mana biaya yang selalu sama berapa pun jaraknya, dan mana yang berubah mengikuti jarak?"

**K4.3** · tipe `langkah` · bentuk_akhir `nilai`
- Soal: Biaya ojek pada soal sebelumnya adalah 4000 + 2000x. Berapa biaya untuk perjalanan 7 km?
- Jawaban akhir: 18000
- Langkah acuan: 4000 + 2000 × 7 → 4000 + 14000 → 18000
- Kesalahan umum: (4000 + 2000) × 7 = 42000.
- Pancingan hint: "Setelah x diganti 7, kamu kerjakan penjumlahan atau perkalian lebih dulu?"

**K4.4** · tipe `langkah` · bentuk_akhir `nilai`
- Soal: Sinta berjalan dari rumah ke taman sejauh 600 m dengan kecepatan 2 m per detik. Setelah x detik, jarak yang tersisa adalah 600 − 2x meter. Berapa meter jarak tersisa setelah 1 menit?
- Jawaban akhir: 480
- Langkah acuan: 1 menit = 60 detik → 600 − 2 × 60 → 600 − 120 → 480
- Kesalahan umum: memasukkan x = 1 langsung (satuan menit tidak diubah) sehingga hasil 598.
- Pancingan hint: "Rumus itu memakai x dalam detik. Satu menit sama dengan berapa detik?"

---

## 5. Evaluasi Akhir

Semua soal di bawah **tanpa Hint AI**. Halaman ini tidak boleh memuat tombol Hint AI maupun memanggil endpoint Gemini. Tombol Cek Step boleh ada jika pengujian logikanya (bukan AI) tetap dipakai; atau dinonaktifkan jika ujian dimaksudkan hanya menilai jawaban akhir. Ini perlu diputuskan.

| No | Soal | tipe | bentuk_akhir | jawaban_akhir | TP |
|---|---|---|---|---|---|
| E1 | Tentukan koefisien y pada 5x − 2y + 7. | isian | nilai | −2 | TP 2 |
| E2 | Hitung nilai 3x + 4 untuk x = 5. | isian | nilai | 19 | TP 3 |
| E3 | Jabarkan 3(x + 4). | isian | jabaran | 3x + 12 | TP 4 |
| E4 | Sederhanakan 7a + 2b − 3a. | isian | sederhana | 4a + 2b | TP 4 |
| E5 | Tulis 6x + 9 dalam bentuk faktor. | isian | faktor | 3(2x + 3) | TP 4 |
| E6 | Seorang siswa membeli 4 pensil seharga a rupiah per buah dan 3 buku seharga b rupiah per buah. Tulis bentuk aljabar total harga. | isian | sederhana | 4a + 3b | TP 5 |
| E7 | Tinggi Linda adalah a cm. Tinggi ibunya 30 cm lebih pendek dari 4 kali tinggi Linda. Tulis bentuk aljabar tinggi ibu. | isian | sederhana | 4a − 30 | TP 5 |

Catatan penilaian:
- Jawaban simbolik diterima dalam bentuk ekuivalen apa pun yang memenuhi `bentuk_akhir` (E4: 2b + 4a juga benar; E7: −30 + 4a juga benar).
- E5 hanya menerima bentuk faktor. 6x + 9 tidak diterima walau ekuivalen. 3(2x + 3) dan 3(3 + 2x) diterima; 6(x + 1,5) tidak (bukan faktor bilangan bulat terbesar).
- Jumlah soal per TP: TP 2 satu, TP 3 satu, TP 4 tiga, TP 5 dua. TP 1 tidak punya soal sendiri di evaluasi; ia diuji tidak langsung lewat E6 dan E7 (memilih huruf untuk besaran). Jika Anda ingin TP 1 terwakili, ganti salah satu soal.

---

## 6. Kasus uji untuk Line-by-Line Checker

Dipakai untuk bagian 4.1 poin 1 proposal. Dibuat dari soal di atas.

| Soal | Baris sebelumnya | Input siswa | Seharusnya |
|---|---|---|---|
| K3.1 | 2(3x − 5) | 6x − 10 | Benar |
| K3.1 | 2(3x − 5) | 6x − 5 | Salah |
| K3.2 | 10x + 15 | 10x + 15 | Ditolak (belum berbentuk faktor) |
| K3.2 | 10x + 15 | 5(2x + 3) | Benar |
| K3.2 | 10x + 15 | 5(2x + 15) | Salah (tidak ekuivalen) |
| K3.3 | 3(x + 2) + 2(x − 1) | 3x + 6 + 2x − 2 | Benar |
| K3.3 | 3x + 6 + 2x − 2 | 5x + 8 | Salah |
| K3.4 | (6x − 2) − (2x + 5) | 6x − 2 − 2x + 5 | Salah (tanda belum dibalik) |
| K3.4 | (6x − 2) − (2x + 5) | 4x − 7 | Benar |
| K2.3 | 2x + 8 − 5x + 1 | 9 − 3x | Benar (urutan suku bebas) |
| K2.4 | 2/3 a + 1/4 a | 11/12a | Benar |
| K2.4 | 2/3 a + 1/4 a | 3/7a | Salah |
| K1.3 | 10 − 5 × 3 | 15 | Salah |
| K1.3 | 10 − 5 × 3 | 10 − 15 | Benar |
| K4.4 | 600 − 2 × 60 | 598 | Salah |
| Semua | apa saja | ++x atau (x + 1 | Pesan "format tidak valid", tidak dihitung sebagai salah |
| Semua | apa saja | 3*x, 3·x, 3×x, 3x | Dianggap sama |
| Jebakan | x² | 2x − 1 | Salah, walau cocok pada x = 1. Checker tidak boleh hanya mencoba satu atau dua nilai. |

## 7. Hal yang perlu diputuskan

1. Syarat tuntas, batas hint, durasi, dan tingkat pengulangan (bagian 1, usulan) disetujui atau diubah.
2. Papan tombol ditambah kurung, garis miring, tanda negatif, dan tombol hapus, atau soal diubah (bagian 3).
3. Cek Step aktif di Evaluasi Akhir atau tidak.
4. TP 1 perlu soal sendiri di Evaluasi Akhir atau cukup tidak langsung.
5. Kolom `bentuk_akhir` dan `kunci_langkah` ditambahkan ke tabel `kuis` (bagian 2).
