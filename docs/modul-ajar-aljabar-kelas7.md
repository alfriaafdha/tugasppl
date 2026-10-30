# Modul Ajar AljabarLearn: Bab 4 Bentuk Aljabar (Kelas VII)

**Dipakai oleh:** `SubBabSeeder`, `KuisSeeder`, `SoalEvaluasiSeeder`, dan panel kamus istilah (lihat `STRUKTUR_FOLDER_AljabarLearn.md`)
**Target siswa:** kelas VII SMP/MTs yang **belum memahami aljabar** (baru berkenalan dengan huruf sebagai pengganti bilangan)
**Rujukan:** *Matematika untuk SMP/MTs Kelas VII*, Bab 4 "Bentuk Aljabar" (Kemendikbudristek, 2022). Alur tiga sub-bab mengikuti buku tersebut. Seluruh uraian di modul ini ditulis ulang untuk pemula; tidak ada teks atau gambar buku yang disalin, dan konteks bergambar diubah menjadi cerita teks.
**Status:** draf untuk diperiksa guru matematika. **Kunci jawaban sudah dicek otomatis** (setiap soal diverifikasi dengan perhitungan aljabar simbolik), tetapi kesesuaian bahasa dan tingkat kesulitan tetap perlu penilaian guru.
**Versi:** 2.0 (menggantikan versi lama yang masih menyebut 4 kuis per sub-bab)

---

## 0. Konvensi Penulisan

**Untuk siswa (juga berlaku di papan tombol):**

| Hal | Cara menulis | Contoh |
| --- | --- | --- |
| Angka dikali huruf | tulis berdempet; tanda × boleh dihilangkan | `3n` sama dengan `3 × n` |
| Kurung | tombol `(` dan `)` | `4(x+2)` |
| Pecahan | tombol pecahan atau garis miring | `(3/2)t` |
| Pangkat | tombol `^` (belum dipakai di soal v1.0) | `x^2` |
| Bilangan besar | **tanpa titik ribuan** | `5000`, bukan `5.000` |
| Urutan suku | bebas pada soal `model` dan `sederhanakan` | `t+3` dan `3+t` sama-sama benar |

**Untuk pengembang dan guru pemeriksa:**

- Satu soal selalu punya: `tipe`, `teks_soal`, `variabel`, `jawaban_akhir`, `subtopik`; soal kuis juga punya `hint_cadangan` dan `pembahasan`; soal yang memerlukannya punya `ekspresi_awal` dan `nilai_variabel`.
- `variabel` menentukan huruf yang tampil di papan tombol. Huruf lain ditolak.
- Pemeriksaan menurut jenis soal:

| Jenis (`tipe`) | Cara siswa menjawab | Cara memeriksa |
| --- | --- | --- |
| `unsur` | satu jawaban (bilangan atau huruf) | sama dengan kunci |
| `substitusi` | baris-baris berupa bilangan (tanpa huruf) | tiap baris bernilai sama dengan `ekspresi_awal` setelah `nilai_variabel` dimasukkan; baris akhir sama dengan kunci |
| `sederhanakan` | baris demi baris | tiap baris ekuivalen dengan baris sebelumnya; baris akhir ekuivalen dengan kunci **dan** sudah paling sederhana |
| `jabarkan` | baris demi baris | seperti `sederhanakan`; baris akhir tanpa kurung yang masih bisa dijabarkan |
| `faktorkan` | baris demi baris | tiap baris ekuivalen; baris akhir berbentuk perkalian dengan faktor persekutuan terbesar sudah dikeluarkan |
| `model` | menulis bentuk aljabar dari cerita | baris pertama ekuivalen dengan kunci; baris berikutnya ekuivalen dengan baris sebelumnya |

---

## 1. Prinsip Menulis untuk Pemula

1. **Konkret dulu, simbol kemudian.** Setiap konsep dimulai dari benda atau cerita (kantong berisi kubus, korek api, biaya ojek), baru ditulis dengan huruf.
2. **Satu gagasan per bagian.** Tiap bagian materi pendek dan diakhiri satu contoh.
3. **Istilah selalu diberi arti dan contoh** saat pertama muncul, lalu dimasukkan ke kamus istilah.
4. **Soal berjenjang.** Lima soal tiap kuis naik pelan-pelan: mengenali, menghitung, lalu menyusun sendiri.
5. **Kesalahan umum dibicarakan terang-terangan.** Salah paham yang biasa muncul pada pemula ditulis di setiap sub-bab.
6. **Pesan netral dan menyemangati.** Contoh: "Belum tepat, coba periksa lagi bagian yang ada tanda minusnya." Tidak ada kata yang menghakimi.
7. **Tanpa gambar.** Pola dan diagram dari buku diceritakan dengan kalimat.

---

## 2. Peta Materi

| Sub-bab | Tujuan belajar (bahasa siswa) | Subtopik | Asal di buku | Jenis soal |
| --- | --- | --- | --- | --- |
| **A. Unsur-Unsur Bentuk Aljabar** | Aku bisa memakai huruf untuk bilangan yang berubah atau belum diketahui, menyebut bagian-bagian bentuk aljabar, dan menghitung nilainya | variabel, koefisien, konstanta, suku, substitusi, pemodelan dasar | Eksplorasi 4.1; Latihan 4.1 | `unsur`, `substitusi`, `model` |
| **B. Sifat-Sifat dan Operasi Aljabar** | Aku bisa mengubah bentuk aljabar menjadi bentuk lain yang sama nilainya | ekuivalen, distributif, bentuk jabaran dan faktor, suku sejenis, kurung, koefisien pecahan | Eksplorasi 4.2 dan 4.3; Latihan 4.2 | `jabarkan`, `sederhanakan`, `faktorkan` |
| **C. Pemodelan dengan Bentuk Aljabar** | Aku bisa mengubah cerita menjadi bentuk aljabar dan memakainya untuk menghitung | kata kunci cerita, selisih, kelipatan, dua langkah, biaya tetap + per satuan, kuantitas berubah | Eksplorasi 4.4 dan 4.5; Latihan 4.3 | `model`, `substitusi` |

**Sengaja tidak dimasukkan ke v1.0 dan alasannya**

| Bagian buku | Alasan |
| --- | --- |
| Perkalian dua kurung (mis. (x+1)(x+3)) dan pemfaktoran bentuk kuadrat (mis. x²+5x+6) pada Latihan 4.2 | Terlalu berat untuk pemula; mesin ekspresi tetap mendukungnya dan dapat dipakai sebagai pengayaan nanti |
| Soal bergantung gambar (kantong kubus, ubin, pola titik) | Antarmuka v1.0 tanpa gambar; konteksnya diceritakan lewat teks |
| Teka-teki bilangan, Ayo Bekerja Sama, Ayo Berkomunikasi, proyek usaha (Pengayaan) | Aktivitas diskusi dan proyek tidak dapat diperiksa otomatis |
| Simulasi interaktif lewat tautan luar | Bergantung layanan pihak lain |

---

## 3. Kamus Istilah (untuk panel kamus)

| Istilah | Arti singkat | Contoh pada `4p − q + 8` |
| --- | --- | --- |
| Variabel | Huruf yang mewakili bilangan yang berubah-ubah atau belum diketahui | p dan q |
| Konstanta | Bilangan yang nilainya tetap | 8 |
| Koefisien | Bilangan yang mengalikan variabel, ditulis di depan huruf | 4 pada 4p; −1 pada −q |
| Suku | Bagian bentuk aljabar yang dipisahkan tanda + atau − | 4p, −q, dan 8 |
| Suku sejenis | Suku dengan huruf yang sama (konstanta dengan konstanta) | 2x dan 5x sejenis; 2x dan 5y tidak |
| Bentuk aljabar | Bentuk yang memuat huruf, bilangan, dan operasi | 4p − q + 8 |
| Substitusi | Mengganti huruf dengan bilangan tertentu | x = 2 pada 3x → 3 × 2 |
| Ekuivalen | Berbeda cara menulis, tetapi nilainya selalu sama | 2(x+1) dan 2x+2 |
| Bentuk jabaran | Bentuk tanpa kurung, berupa jumlah suku | 2x + 2 |
| Bentuk faktor | Bentuk perkalian dengan kurung | 2(x + 1) |
| Sifat distributif | Angka di luar kurung mengalikan semua suku di dalam | a(b + c) = ab + ac |

---

## 4. Materi Sub-bab A: Unsur-Unsur Bentuk Aljabar

### 4.1 Pengingat (sebelum mulai)

1. **Urutan operasi:** kerjakan kurung dulu, lalu kali dan bagi, terakhir tambah dan kurang. Contoh: 2 + 3 × 4 = 2 + 12 = 14.
2. **Bilangan boleh ditukar posisinya** saat dijumlah atau dikali: 3 + 5 = 5 + 3 dan 2 × 7 = 7 × 2.
3. **Nilai per satuan:** satu buku Rp4000, maka 3 buku = 3 × 4000 = Rp12000.

### 4.2 Dari bilangan ke huruf

Nyoman menyusun persegi berjajar memakai korek api. Satu persegi memakai 4 korek api. Setiap persegi tambahan hanya perlu 3 korek api baru. Arief menghitung seperti ini:

| Banyak persegi | Cara hitung Arief | Banyak korek api |
| --- | --- | --- |
| 1 | 1 + (1 × 3) | 4 |
| 2 | 1 + (2 × 3) | 7 |
| 3 | 1 + (3 × 3) | 10 |
| 4 | 1 + (4 × 3) | 13 |

Perhatikan: angka **1** dan angka **3** selalu sama. Hanya banyak persegi yang berubah-ubah. Kalau menulis "1 + (banyak persegi × 3)" terus-terusan, tentu melelahkan. Kita ganti "banyak persegi" dengan huruf **n**:

**1 + 3n**

Huruf n inilah yang disebut **variabel**. Kamu boleh memakai huruf apa saja (n, x, t, p), asalkan kamu tahu apa artinya. Di sini n artinya banyak persegi.

> **Ingat:** 3n berarti 3 × n. Bukan "tiga puluh sekian" dan bukan 3 + n.

### 4.3 Bagian-bagian bentuk aljabar

Ambil bentuk **1 + 3n**:

- **Suku:** bagian-bagian yang dipisahkan tanda + atau −. Ada dua suku: `1` dan `3n`.
- **Konstanta:** bilangan tetap tanpa huruf, yaitu `1`.
- **Koefisien:** bilangan yang mengalikan variabel, yaitu `3` (pada 3n).
- **Variabel:** huruf `n`.

Contoh lain: **4p − q + 8**

| Suku | Koefisien | Variabel | Konstanta? |
| --- | --- | --- | --- |
| 4p | 4 | p | bukan |
| −q | −1 | q | bukan |
| 8 | tidak ada | tidak ada | ya |

Dua catatan penting:

- Huruf yang berdiri sendiri, seperti q, berarti 1 × q, jadi koefisien q adalah **1**. Jika ada tanda minus di depannya, seperti −q, koefisiennya **−1**.
- Tanda + atau − ikut ke suku **di belakangnya**. Pada 4p − q, suku kedua adalah −q.

### 4.4 Menghitung nilai bentuk aljabar (substitusi)

**Substitusi** artinya mengganti huruf dengan bilangan. Berapa korek api untuk n = 5 persegi?

1 + 3n → 1 + 3 × 5 → 1 + 15 → 16

Jadi 5 persegi butuh 16 korek api. Hasilnya punya arti, bukan sekadar angka.

> **Hati-hati:** untuk n = 5, 3n menjadi 3 × 5 = 15, bukan 35.

### 4.5 Menyatakan cerita dengan huruf (pengenalan)

Tiket anak harganya a rupiah dan tiket dewasa b rupiah. Keluarga Dewi membeli 2 tiket anak dan 1 tiket dewasa. Total harganya:

2 tiket anak → 2 × a = 2a
1 tiket dewasa → 1 × b = b
Total: **2a + b**

Di sub-bab C kamu akan banyak berlatih seperti ini.

### 4.6 Coba dulu (tidak dinilai)

1. Pada 4k + 7, apa koefisien k? Apa konstantanya?
2. Hitung nilai 2m + 5 untuk m = 3.
3. Satu pensil harganya p rupiah. Tulis harga 6 pensil.

*Jawaban:* (1) 4 dan 7; (2) 2 × 3 + 5 = 11; (3) 6p.

### 4.7 Kesalahan yang sering terjadi

| Kesalahan | Yang benar |
| --- | --- |
| Membaca 3n sebagai "3 ditambah n" atau "tiga puluh n" | 3n artinya 3 × n |
| Mengira konstanta adalah koefisien | Koefisien menempel di depan huruf; konstanta berdiri sendiri tanpa huruf |
| Lupa tanda minus: koefisien q pada 4p − q dianggap 1 | Koefisiennya −1 |
| Memasukkan nilai tanpa tanda kali: n = 5 pada 3n ditulis 35 | Tulis 3 × 5 |

### 4.8 Ringkasan

- Variabel = huruf pengganti bilangan yang berubah atau belum diketahui.
- Suku, koefisien, konstanta, dan variabel adalah bagian-bagian bentuk aljabar.
- Substitusi = mengganti huruf dengan bilangan lalu menghitung.

---

## 5. Materi Sub-bab B: Sifat-Sifat dan Operasi Aljabar

### 5.1 Pengingat (sebelum mulai)

1. **Sifat distributif pada bilangan:** 3 × (4 + 5) = 3 × 4 + 3 × 5 = 12 + 15 = 27. Angka di luar kurung mengalikan **semua** yang ada di dalam.
2. **Urutan operasi:** kurung lebih dulu.
3. **Pecahan:** 1/2 + 1/2 = 1.

### 5.2 Satu hal, banyak cara menulis

Sebuah kolam renang persegi dengan panjang sisi s meter dikelilingi ubin 1 m × 1 m. Rani menghitung: empat sisi masing-masing s ubin, ditambah 4 ubin di pojok. Banyak ubin: **4s + 4**.

Teman-temannya menulis dengan cara lain:

| Nama | Bentuk aljabar |
| --- | --- |
| Joko | 4(s + 1) |
| Wisnu | s + s + s + s + 4 |
| Ayu | 2(s + 2) + 2s |
| Riska | 4(s + 2) |

Coba substitusi s = 10: Rani 4 × 10 + 4 = 44, Joko 4 × 11 = 44, Wisnu 44, Ayu 2 × 12 + 20 = 44, tetapi Riska 4 × 12 = **48**. Jadi bentuk Rani, Joko, Wisnu, dan Ayu **ekuivalen** (nilainya selalu sama), sedangkan Riska tidak.

> **Peringatan:** substitusi hanya cara "mencoba". Satu nilai bisa kebetulan sama. Contoh: 2x dan x + 2 sama-sama 4 saat x = 2, tetapi saat x = 3 hasilnya 6 dan 5. Untuk yakin, kita pakai sifat-sifat di bawah ini.

### 5.3 Sifat distributif: kantong dan kubus

Bayangkan **4 kantong**. Setiap kantong berisi **x kubus** dan ditambah **3 kubus lepas**. Banyak kubus seluruhnya:

4(x + 3) = 4 × x + 4 × 3 = **4x + 12**

Aturannya: **a(b + c) = ab + ac** dan **a(b − c) = ab − ac**.

- **4(x + 3)** disebut **bentuk faktor** (berupa perkalian dengan kurung).
- **4x + 12** disebut **bentuk jabaran** (berupa jumlah suku).

Sifat ini bisa dibalik. **4s + 4**: kedua suku bisa dibagi 4, maka 4s + 4 = **4(s + 1)**. Mencari bilangan yang bisa membagi semua suku disebut mencari faktor persekutuan.

> **Hati-hati:** 4(x + 3) bukan 4x + 3. Angka 4 mengalikan **kedua** suku.

### 5.4 Suku sejenis

Bayangkan 5 kantong berisi kubus, lalu ditambah 7 kantong lagi yang isinya sama. Jadinya 12 kantong:

5x + 7x = (5 + 7)x = **12x**

Begitu juga pengurangan: 11n − 4n = (11 − 4)n = **7n**.

Tetapi **2 kantong apel + 3 kantong jeruk** tidak bisa disebut "5 kantong" apa pun. Begitu pula **2x + 3y** tidak bisa digabung. Hanya **suku sejenis** (huruf sama) yang boleh digabung. Bilangan tanpa huruf hanya boleh digabung dengan bilangan tanpa huruf.

> **Hati-hati:** 5x + 2x + 4 = 7x + 4. Angka 4 tidak ikut digabung dengan 7x.

### 5.5 Boleh menukar dan mengelompokkan

- **Menukar (komutatif):** a + b = b + a dan a × b = b × a.
- **Mengelompokkan (asosiatif):** (a + b) + c = a + (b + c) dan (ab)c = a(bc).

Gunanya: menyusun ulang agar suku sejenis berdekatan. Contoh: 2x + 3 + 4x = 2x + 4x + 3 = 6x + 3.

### 5.6 Kurung dengan tanda minus

(6x − 2) − (x + 5): tanda minus di depan kurung **membalik tanda semua isi kurung**.

(6x − 2) − (x + 5) = 6x − 2 − x − 5 = (6x − x) + (−2 − 5) = **5x − 7**

Kalau di depan kurung ada tanda plus, tanda isinya tidak berubah: (4x + 1) + (2x − 3) = 4x + 1 + 2x − 3 = **6x − 2**.

### 5.7 Koefisien pecahan

Caranya sama dengan bilangan bulat: (1/2)x + (1/2)x = (1/2 + 1/2)x = **x**.

### 5.8 Langkah menyederhanakan (jadikan kebiasaan)

1. Hilangkan kurung dengan sifat distributif (ingat tanda minus).
2. Tandai suku yang sejenis.
3. Gabungkan koefisien suku sejenis.
4. Tulis hasilnya; cek dengan satu nilai (misalnya x = 2) di bentuk awal dan bentuk akhir.

### 5.9 Coba dulu (tidak dinilai)

1. Jabarkan 2(x + 5).
2. Sederhanakan 6a + 2a.
3. Tulis 3x + 9 dalam bentuk faktor.

*Jawaban:* (1) 2x + 10; (2) 8a; (3) 3(x + 3).

### 5.10 Kesalahan yang sering terjadi

| Kesalahan | Yang benar |
| --- | --- |
| 4(x + 3) = 4x + 3 | 4x + 12 (semua suku dikali 4) |
| 5x + 2x + 4 = 11x | 7x + 4 (konstanta tidak digabung dengan x) |
| 2x + 3y = 5xy atau 5x | Tidak bisa digabung (bukan suku sejenis) |
| (6x − 2) − (x + 5) = 5x + 3 | 5x − 7 (tanda minus membalik tanda semua isi kurung) |
| x + x = x² | x + x = 2x |

### 5.11 Ringkasan

- Dua bentuk aljabar ekuivalen bila nilainya selalu sama; substitusi hanya untuk menguji.
- Distributif: a(b + c) = ab + ac, bisa dipakai maju (menjabarkan) dan mundur (memfaktorkan).
- Hanya suku sejenis yang digabung: jumlahkan atau kurangkan koefisiennya.
- Minus di depan kurung membalik semua tanda di dalamnya.

---

## 6. Materi Sub-bab C: Pemodelan dengan Bentuk Aljabar

### 6.1 Pengingat (sebelum mulai)

1. Sub-bab A: variabel mewakili bilangan yang berubah atau belum diketahui.
2. Sub-bab B: menyederhanakan dan menjabarkan bentuk aljabar.
3. Satu satuan dan banyak satuan: tarif Rp1500 per km, maka 4 km = 4 × 1500.

### 6.2 Menerjemahkan cerita menjadi bentuk aljabar

**Pemodelan** adalah mengubah cerita menjadi bentuk aljabar. Ikuti empat langkah:

1. **Pilih huruf** untuk bilangan yang belum diketahui atau yang berubah, dan catat artinya.
2. **Ubah kata kunci** menjadi operasi:

| Kata kunci | Operasi | Contoh (dengan a = umur adik) |
| --- | --- | --- |
| lebih dari, lebih banyak, lebih berat, lebih tua, ditambah | tambah (+) | 5 tahun lebih tua: a + 5 |
| kurang dari, lebih sedikit, lebih ringan, lebih muda, sisa | kurang (−) | 3 tahun lebih muda: a − 3 |
| 2 kali, 3 kali, setiap, per | kali (×) | 4 kali umur adik: 4a |
| total, gabungan, seluruhnya | jumlahkan (+) | umur adik dan kakak: a + (a + 5) |

3. **Susun** bentuk aljabarnya; bila cerita bertahap, kerjakan satu tahap demi satu tahap.
4. **Periksa** dengan memasukkan satu bilangan: apakah hasilnya masuk akal?

### 6.3 Contoh bertahap

Umur adik **a** tahun.

- Kakak 5 tahun lebih tua dari adik → **a + 5**.
- Ayah umurnya 4 kali umur adik → **4a**.
- Ibu 3 tahun lebih muda dari ayah → mulai dari umur ayah (4a), lalu dikurangi 3 → **4a − 3**.

Periksa dengan a = 10: kakak 15, ayah 40, ibu 37. Masuk akal.

### 6.4 Biaya tetap + biaya per satuan, dan jumlah yang berubah

Ani punya tabungan 20000 rupiah dan menambah 5000 rupiah setiap minggu. Setelah w minggu:

20000 + 5000 × w = **20000 + 5000w**

Biaya tetap (20000) ditulis sekali. Tambahan per minggu (5000) dikalikan banyaknya minggu (w).

Untuk jumlah yang **berkurang**, pakai pengurangan. Pita sepanjang 100 cm dipotong 8 cm setiap kali. Setelah p kali dipotong, sisa pita: **100 − 8p**.

### 6.5 Kapan hasilnya tidak masuk akal?

Sisa pita 100 − 8p. Bila p = 20, hasilnya 100 − 160 = −60. Panjang pita tidak mungkin negatif, jadi p = 20 tidak masuk akal. **Setiap bentuk aljabar punya arti, jadi tidak semua bilangan cocok untuk dimasukkan.**

### 6.6 Dari bentuk aljabar ke angka

Setelah model jadi, kamu bisa menghitung keadaan tertentu dengan substitusi. Tabungan Ani setelah 4 minggu: 20000 + 5000 × 4 = 20000 + 20000 = 40000 rupiah.

### 6.7 Coba dulu (tidak dinilai)

1. Banyak kelereng Rina adalah k. Dina punya 6 kelereng lebih banyak dari Rina. Tulis banyak kelereng Dina.
2. Satu roti harganya r rupiah. Tulis harga 3 roti.
3. Uang Budi u rupiah, lalu ia membeli buku seharga 8000 rupiah. Tulis sisa uang Budi.

*Jawaban:* (1) k + 6; (2) 3r; (3) u − 8000.

### 6.8 Kesalahan yang sering terjadi

| Kesalahan | Yang benar |
| --- | --- |
| "5 kurang dari n" ditulis 5 − n | n − 5 (mulai dari n, lalu dikurangi 5) |
| "3 lebih berat dari t" ditulis 3t | t + 3 (bukan kali, tapi tambah) |
| Biaya tetap ikut dikali: 5000k | Biaya tetap ditulis sekali: 5000 + 1500k |
| Hanya menulis angka hasil, bukan bentuk aljabar | Soal "tulis bentuk aljabar" meminta ekspresi dengan huruf |

### 6.9 Ringkasan

- Pilih huruf, terjemahkan kata kunci, susun tahap demi tahap, lalu periksa.
- Biaya tetap ditulis sekali; biaya per satuan dikalikan banyaknya.
- Bentuk aljabar punya arti, sehingga hasil substitusi perlu dicek masuk akal atau tidak.

---

## 7. Bank Soal Kuis Latihan (15 soal)

Setiap kuis berisi 5 soal berjenjang (mengenali → menghitung → menyusun). Soal dibuka berurutan; setelah soal dikumpulkan, siswa melihat pembahasan.

### 7.1 Kuis Sub-bab A: Unsur-Unsur Bentuk Aljabar

#### Soal A1 · jenis `unsur` · subtopik `variabel`

- **Soal:** Pada bentuk aljabar 5n + 2, huruf yang menjadi variabel adalah ....
- **Variabel di papan tombol:** `n`
- **Ekspresi awal:** `5n+2`
- **Jawaban akhir (kunci):** `n`
- **Hint cadangan:** Variabel adalah huruf yang mewakili bilangan yang bisa berubah atau belum diketahui. Pada 5n + 2, mana yang berupa huruf?
- **Pembahasan:** Huruf n adalah variabel. Angka 5 adalah koefisien dan angka 2 adalah konstanta.

#### Soal A2 · jenis `unsur` · subtopik `koefisien`

- **Soal:** Pada bentuk aljabar 2x + 1, berapakah koefisien dari x?
- **Variabel di papan tombol:** `x`
- **Ekspresi awal:** `2x+1`
- **Jawaban akhir (kunci):** `2`
- **Hint cadangan:** Koefisien adalah angka yang mengalikan variabel dan ditulis tepat di depan hurufnya. Lihat angka yang menempel di depan x.
- **Pembahasan:** 2x berarti 2 × x, jadi koefisien dari x adalah 2.

#### Soal A3 · jenis `unsur` · subtopik `konstanta`

- **Soal:** Pada bentuk aljabar 3x − y + 10, berapakah konstantanya?
- **Variabel di papan tombol:** `x,y`
- **Ekspresi awal:** `3x-y+10`
- **Jawaban akhir (kunci):** `10`
- **Hint cadangan:** Konstanta adalah bilangan yang nilainya tetap, tanpa huruf. Suku mana yang tidak punya huruf?
- **Pembahasan:** Suku-sukunya adalah 3x, −y, dan 10. Hanya 10 yang tidak memiliki variabel, jadi konstantanya 10.

#### Soal A4 · jenis `substitusi` · subtopik `substitusi`

- **Soal:** Hitunglah nilai 3p + 1 untuk p = 4.
- **Variabel di papan tombol:** `p`
- **Ekspresi awal:** `3p+1`
- **Nilai variabel:** `p=4`
- **Jawaban akhir (kunci):** `13`
- **Hint cadangan:** Ganti huruf p dengan 4. Ingat, 3p artinya 3 × p. Kerjakan perkaliannya dulu, baru ditambah 1.
- **Pembahasan:** 3p + 1 dengan p = 4 menjadi 3 × 4 + 1 = 12 + 1 = 13.

#### Soal A5 · jenis `model` · subtopik `pemodelan-dasar`

- **Soal:** Harga satu tiket anak adalah a rupiah dan harga satu tiket dewasa adalah b rupiah. Rahmat membeli 3 tiket anak dan 2 tiket dewasa. Tulislah bentuk aljabar untuk total harga tiket yang dibayar Rahmat.
- **Variabel di papan tombol:** `a,b`
- **Jawaban akhir (kunci):** `3a+2b`
- **Hint cadangan:** 3 tiket anak berarti 3 kali harga satu tiket anak. Bagaimana cara menulis '3 kali a'? Setelah itu jumlahkan dengan bagian tiket dewasa.
- **Pembahasan:** 3 tiket anak = 3a dan 2 tiket dewasa = 2b, sehingga total harga = 3a + 2b.

### 7.2 Kuis Sub-bab B: Sifat-Sifat dan Operasi Aljabar

#### Soal B1 · jenis `jabarkan` · subtopik `sifat-distributif`

- **Soal:** Jabarkan bentuk aljabar 3(x + 2).
- **Variabel di papan tombol:** `x`
- **Ekspresi awal:** `3(x+2)`
- **Jawaban akhir (kunci):** `3x+6`
- **Hint cadangan:** Sifat distributif: angka di luar kurung mengalikan setiap suku di dalam kurung. Kalikan 3 dengan x, lalu kalikan 3 dengan 2.
- **Pembahasan:** 3(x + 2) = 3 × x + 3 × 2 = 3x + 6.

#### Soal B2 · jenis `sederhanakan` · subtopik `suku-sejenis`

- **Soal:** Sederhanakan bentuk aljabar 4x + 3x + 2.
- **Variabel di papan tombol:** `x`
- **Ekspresi awal:** `4x+3x+2`
- **Jawaban akhir (kunci):** `7x+2`
- **Hint cadangan:** Suku sejenis punya huruf yang sama, jadi koefisiennya bisa dijumlahkan. Suku mana yang punya x? Bilangan tanpa huruf tidak ikut digabung dengan x.
- **Pembahasan:** 4x + 3x = (4 + 3)x = 7x, sedangkan 2 tetap. Hasilnya 7x + 2.

#### Soal B3 · jenis `sederhanakan` · subtopik `suku-sejenis`

- **Soal:** Sederhanakan bentuk aljabar 9n − 4n + 5.
- **Variabel di papan tombol:** `n`
- **Ekspresi awal:** `9n-4n+5`
- **Jawaban akhir (kunci):** `5n+5`
- **Hint cadangan:** Gabungkan dulu suku yang memiliki n. Kurangkan koefisiennya. Suku tanpa huruf tetap ditulis apa adanya.
- **Pembahasan:** 9n − 4n = 5n, lalu ditambah 5. Hasilnya 5n + 5.

#### Soal B4 · jenis `sederhanakan` · subtopik `distributif-dan-suku-sejenis`

- **Soal:** Jabarkan dan sederhanakan bentuk aljabar 2(x + 4) + x.
- **Variabel di papan tombol:** `x`
- **Ekspresi awal:** `2(x+4)+x`
- **Jawaban akhir (kunci):** `3x+8`
- **Hint cadangan:** Mulai dari kurung: angka 2 mengalikan semua isi kurung. Setelah itu cari suku-suku yang sejenis dan gabungkan.
- **Pembahasan:** 2(x + 4) = 2x + 8. Lalu 2x + 8 + x = 3x + 8.

#### Soal B5 · jenis `faktorkan` · subtopik `bentuk-faktor`

- **Soal:** Tulislah 4x + 8 dalam bentuk faktor.
- **Variabel di papan tombol:** `x`
- **Ekspresi awal:** `4x+8`
- **Jawaban akhir (kunci):** `4(x+2)`
- **Hint cadangan:** Cari bilangan terbesar yang bisa membagi 4x dan 8 sekaligus. Keluarkan bilangan itu di depan kurung.
- **Pembahasan:** 4 dapat membagi 4x dan 8. Maka 4x + 8 = 4(x + 2).

### 7.3 Kuis Sub-bab C: Pemodelan dengan Bentuk Aljabar

#### Soal C1 · jenis `model` · subtopik `pemodelan-selisih`

- **Soal:** Berat buah jeruk adalah t kg. Berat buah apel 3 kg lebih berat dari berat jeruk. Tulislah bentuk aljabar untuk berat buah apel.
- **Variabel di papan tombol:** `t`
- **Jawaban akhir (kunci):** `t+3`
- **Hint cadangan:** '3 kg lebih berat' berarti berat jeruk ditambah 3. Berat jeruk dilambangkan dengan t.
- **Pembahasan:** Berat apel = berat jeruk + 3 = t + 3.

#### Soal C2 · jenis `model` · subtopik `pemodelan-kelipatan`

- **Soal:** Tinggi badan Linda adalah L cm. Tinggi badan Endah, kakak Linda, adalah 2 kali tinggi badan Linda. Tulislah bentuk aljabar untuk tinggi badan Endah.
- **Variabel di papan tombol:** `L`
- **Jawaban akhir (kunci):** `2L`
- **Hint cadangan:** '2 kali' berarti dikalikan 2. Tinggi Linda dilambangkan dengan L.
- **Pembahasan:** Tinggi Endah = 2 × L = 2L.

#### Soal C3 · jenis `model` · subtopik `pemodelan-dua-langkah`

- **Soal:** Tinggi badan Linda adalah L cm. Tinggi badan ibunya 30 cm lebih pendek dari 4 kali tinggi badan Linda. Tulislah bentuk aljabar untuk tinggi badan ibu.
- **Variabel di papan tombol:** `L`
- **Jawaban akhir (kunci):** `4L-30`
- **Hint cadangan:** Ada dua langkah. Pertama, '4 kali tinggi Linda'. Kedua, '30 cm lebih pendek' berarti hasil langkah pertama dikurangi 30.
- **Pembahasan:** 4 kali tinggi Linda = 4L. Lalu 30 cm lebih pendek berarti dikurangi 30, sehingga hasilnya 4L − 30.

#### Soal C4 · jenis `model` · subtopik `pemodelan-kuantitas-berubah`

- **Soal:** Jarak rumah Wisnu ke sekolah adalah 5000 meter. Wisnu diantar sepeda motor dengan kecepatan 15 meter per detik. Tulislah bentuk aljabar untuk jarak yang masih tersisa setelah t detik.
- **Variabel di papan tombol:** `t`
- **Jawaban akhir (kunci):** `5000-15t`
- **Hint cadangan:** Jarak yang sudah ditempuh setelah t detik adalah 15 × t. Jarak tersisa = jarak seluruhnya dikurangi jarak yang sudah ditempuh.
- **Pembahasan:** Jarak ditempuh = 15t. Jarak tersisa = 5000 − 15t.

#### Soal C5 · jenis `model` · subtopik `pemodelan-biaya`

- **Soal:** Sebuah ojek online menetapkan biaya administrasi tetap 5000 rupiah dan tarif 1500 rupiah per kilometer. Tulislah bentuk aljabar untuk biaya perjalanan sejauh k kilometer.
- **Variabel di papan tombol:** `k`
- **Jawaban akhir (kunci):** `5000+1500k`
- **Hint cadangan:** Biaya tetap dibayar satu kali saja. Biaya per kilometer dikalikan dengan banyak kilometer (k). Jumlahkan keduanya.
- **Pembahasan:** Biaya per kilometer seluruhnya = 1500 × k = 1500k. Ditambah biaya tetap, totalnya 5000 + 1500k.

---

## 8. Bank Soal Evaluasi Akhir (30 soal)

- **Per percobaan:** 20 soal diacak dari bank ini dengan komposisi **6 soal sub-bab A, 8 soal sub-bab B, 6 soal sub-bab C**.
- **Format:** hanya jawaban akhir (tanpa lembar langkah); diperiksa dengan mesin ekspresi yang sama.
- **Tidak ada** hint AI, hint cadangan, atau pembahasan pada Evaluasi Akhir.
- Soal Evaluasi tidak mengulang soal kuis latihan (angka dan konteks dibuat berbeda).
- KKM 65 berarti minimal 13 dari 20 soal benar.

### 8.1 Bank Sub-bab A (9 soal): Unsur-Unsur Bentuk Aljabar

| Kode | Jenis | Soal | Variabel | Ekspresi awal | Nilai variabel | Kunci | Subtopik |
| --- | --- | --- | --- | --- | --- | --- | --- |
| EA1 | `unsur` | Pada bentuk aljabar 7y − 3, berapakah koefisien dari y? | `y` | `7y-3` | - | `7` | koefisien |
| EA2 | `unsur` | Pada bentuk aljabar 6a + 4b + 9, berapakah konstantanya? | `a,b` | `6a+4b+9` | - | `9` | konstanta |
| EA3 | `unsur` | Berapa banyak suku pada bentuk aljabar 6a + 4b + 9? | `a,b` | `6a+4b+9` | - | `3` | suku |
| EA4 | `unsur` | Pada bentuk aljabar 8k + 5, huruf yang menjadi variabel adalah .... | `k` | `8k+5` | - | `k` | variabel |
| EA5 | `substitusi` | Hitunglah nilai 5m − 4 untuk m = 6. | `m` | `5m-4` | `m=6` | `26` | substitusi |
| EA6 | `substitusi` | Hitunglah nilai 20 − 3k untuk k = 4. | `k` | `20-3k` | `k=4` | `8` | substitusi |
| EA7 | `substitusi` | Hitunglah nilai 2x + 3y untuk x = 5 dan y = 2. | `x,y` | `2x+3y` | `x=5,y=2` | `16` | substitusi-dua-variabel |
| EA8 | `model` | Harga satu buku adalah b rupiah dan harga satu pensil adalah p rupiah. Tulislah bentuk aljabar untuk total harga 4 buku dan 5 pensil. | `b,p` | - | - | `4b+5p` | pemodelan-dasar |
| EA9 | `substitusi` | Banyak korek api untuk menyusun n persegi berjajar adalah 1 + 3n. Berapa banyak korek api yang dibutuhkan untuk 20 persegi? | `n` | `1+3n` | `n=20` | `61` | substitusi |

### 8.2 Bank Sub-bab B (12 soal): Sifat-Sifat dan Operasi Aljabar

| Kode | Jenis | Soal | Variabel | Ekspresi awal | Nilai variabel | Kunci | Subtopik |
| --- | --- | --- | --- | --- | --- | --- | --- |
| EB1 | `sederhanakan` | Sederhanakan bentuk aljabar 6x + 5x. | `x` | `6x+5x` | - | `11x` | suku-sejenis |
| EB2 | `sederhanakan` | Sederhanakan bentuk aljabar 15n − 2n. | `n` | `15n-2n` | - | `13n` | suku-sejenis |
| EB3 | `sederhanakan` | Sederhanakan bentuk aljabar 8a + 3 + 2a. | `a` | `8a+3+2a` | - | `10a+3` | suku-sejenis |
| EB4 | `sederhanakan` | Sederhanakan bentuk aljabar 7p − 4p + 9. | `p` | `7p-4p+9` | - | `3p+9` | suku-sejenis |
| EB5 | `jabarkan` | Jabarkan bentuk aljabar 5(x + 4). | `x` | `5(x+4)` | - | `5x+20` | sifat-distributif |
| EB6 | `jabarkan` | Jabarkan bentuk aljabar 8(2x − 5). | `x` | `8(2x-5)` | - | `16x-40` | sifat-distributif |
| EB7 | `sederhanakan` | Sederhanakan bentuk aljabar (3/2)t − (1/2)t. | `t` | `(3/2)t-(1/2)t` | - | `t` | koefisien-pecahan |
| EB8 | `sederhanakan` | Jabarkan, lalu sederhanakan bentuk aljabar (7x − 2) + (−3x + 5). | `x` | `(7x-2)+(-3x+5)` | - | `4x+3` | menjabarkan-kurung |
| EB9 | `sederhanakan` | Jabarkan, lalu sederhanakan bentuk aljabar (5x − 1) − (2x + 3). | `x` | `(5x-1)-(2x+3)` | - | `3x-4` | menjabarkan-kurung |
| EB10 | `faktorkan` | Tulislah 12x + 6 dalam bentuk faktor. | `x` | `12x+6` | - | `6(2x+1)` | bentuk-faktor |
| EB11 | `faktorkan` | Tulislah 9n − 3 dalam bentuk faktor. | `n` | `9n-3` | - | `3(3n-1)` | bentuk-faktor |
| EB12 | `sederhanakan` | Jabarkan dan sederhanakan bentuk aljabar 3(x + 10) + 4(3x − 2). | `x` | `3(x+10)+4(3x-2)` | - | `15x+22` | distributif-dan-suku-sejenis |

### 8.3 Bank Sub-bab C (9 soal): Pemodelan dengan Bentuk Aljabar

| Kode | Jenis | Soal | Variabel | Ekspresi awal | Nilai variabel | Kunci | Subtopik |
| --- | --- | --- | --- | --- | --- | --- | --- |
| EC1 | `model` | Berat buah apel adalah t kg. Berat buah mangga 4 kg lebih berat dari berat apel. Tulislah bentuk aljabar untuk berat buah mangga. | `t` | - | - | `t+4` | pemodelan-selisih |
| EC2 | `model` | Uang Dani adalah u rupiah. Uang Eka 3000 rupiah lebih sedikit dari uang Dani. Tulislah bentuk aljabar untuk uang Eka. | `u` | - | - | `u-3000` | pemodelan-selisih |
| EC3 | `model` | Tinggi badan Linda adalah L cm. Tinggi Endah adalah 2 kali tinggi Linda. Tinggi Rizki 13 cm lebih tinggi dari tinggi Endah. Tulislah bentuk aljabar untuk tinggi Rizki. | `L` | - | - | `2L+13` | pemodelan-dua-langkah |
| EC4 | `model` | Berat badan Ayu adalah p kg. Berat badan Kevin 3 kg lebih ringan dari 2 kali berat badan Ayu. Tulislah bentuk aljabar untuk berat badan Kevin. | `p` | - | - | `2p-3` | pemodelan-dua-langkah |
| EC5 | `model` | Malik naik bus ke sekolah dan pulang ke rumah setiap hari. Biaya satu kali naik bus adalah n rupiah. Tulislah bentuk aljabar untuk biaya bus Malik dalam satu hari. | `n` | - | - | `2n` | pemodelan-kelipatan |
| EC6 | `model` | Biaya satu kali naik bus adalah n rupiah. Malik naik bus pergi dan pulang setiap hari selama 5 hari sekolah dalam seminggu. Tulislah bentuk aljabar untuk biaya bus Malik dalam satu minggu. | `n` | - | - | `10n` | pemodelan-kelipatan |
| EC7 | `model` | Malik diberi uang 50000 rupiah per minggu untuk biaya bus. Biaya bus Malik selama satu minggu adalah 10n rupiah. Tulislah bentuk aljabar untuk sisa uang Malik pada akhir minggu. | `n` | - | - | `50000-10n` | pemodelan-kuantitas-berubah |
| EC8 | `substitusi` | Biaya perjalanan sebuah ojek online dinyatakan dengan bentuk aljabar 3000 + 1800k rupiah, dengan k adalah jarak dalam kilometer. Berapa rupiah biaya untuk perjalanan sejauh 5 kilometer? | `k` | `3000+1800k` | `k=5` | `12000` | pemodelan-lalu-substitusi |
| EC9 | `substitusi` | Banyak air yang masih tersisa dalam sebuah tangki dinyatakan dengan bentuk aljabar 600 − 20m liter, dengan m adalah waktu dalam menit. Berapa liter air yang tersisa setelah 12 menit? | `m` | `600-20m` | `m=12` | `360` | pemodelan-lalu-substitusi |

---

## 9. Daftar Periksa untuk Guru Pemeriksa

- [ ] Bahasa pada materi mudah dipahami siswa kelas VII yang baru mengenal aljabar; tidak ada istilah yang dipakai sebelum diperkenalkan.
- [ ] Setiap contoh dan hasil hitung benar (kunci kuis dan evaluasi sudah diverifikasi otomatis; periksa kewajaran cerita dan satuan).
- [ ] Tingkat kesulitan 5 soal tiap kuis naik bertahap; tidak ada soal yang menuntut materi dari sub-bab berikutnya.
- [ ] Soal `model` hanya meminta bentuk aljabar, dan semua bentuk ekuivalen yang wajar diterima (mis. `t+3` dan `3+t`).
- [ ] Hint cadangan membantu **tanpa** menyebutkan jawaban akhir.
- [ ] Pembahasan jelas, singkat, dan konsisten dengan materi.
- [ ] Tidak ada soal yang jawabannya hanya bisa diketahui dari gambar.
- [ ] Bank Evaluasi tidak mengulang soal kuis dan komposisi 6/8/6 dapat dipenuhi (A ≥ 6, B ≥ 8, C ≥ 6).
- [ ] Keputusan pengayaan: apakah perkalian dua kurung dan pemfaktoran bentuk kuadrat dijadikan soal opsional pada versi berikutnya.
