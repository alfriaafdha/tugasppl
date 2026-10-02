# Materi AljabarLearn: Bentuk Aljabar (Kelas VII)

Sumber isi: Matematika untuk SMP/MTs Kelas VII, Bab 4 Bentuk Aljabar (Kemendikbudristek, 2022). Penjelasan di bawah ditulis ulang dengan bahasa yang lebih sederhana; contoh dan soal mengikuti situasi di buku.

## Catatan untuk penulis halaman

- Satu sub-bab = satu unit di bawah. Urutannya mengikuti buku: A (Unit 1), B (Unit 2 dan 3), C (Unit 4). Jika daftar 4 sub-bab di website berbeda, cukup pindahkan unit-unit ini.
- Semua rumus ditulis tanpa LaTeX supaya tidak error saat dirender: x², 3x + 12, 1/2.
- Pola tiap unit: pertanyaan pembuka, ide utama dengan perumpamaan, contoh, kesalahan umum, cek pemahaman.
- Kolom "Pancingan" di bagian cek pemahaman adalah bahan untuk system prompt Hint AI. Bentuknya pertanyaan, bukan jawaban.

---

# Unit 1. Mengenal Huruf dalam Matematika

**Pertanyaan pembuka:** Kenapa di matematika ada huruf, padahal itu pelajaran angka?

## 1.1 Huruf sebagai "kotak kosong"

Bayangkan kamu mau menulis aturan: "banyak korek api sama dengan satu ditambah tiga kali banyak persegi". Panjang sekali. Matematika memotongnya menjadi:

**1 + 3n**

Huruf **n** di situ adalah kotak kosong untuk banyak persegi. Kamu boleh mengisinya dengan angka apa pun yang masuk akal.

Huruf seperti ini disebut **variabel**. Variabel dipakai untuk dua hal:

1. **Nilai yang berubah-ubah.** Contoh: banyak persegi bisa 1, 2, 3, dan seterusnya.
2. **Nilai yang belum diketahui.** Contoh: berat jeruk yang belum ditimbang, kita tulis t kg.

Kalimat yang memakai variabel seperti **1 + 3n** disebut **bentuk aljabar**.

Contoh nyata: perawat menghitung tetesan infus per menit dengan rumus D = dv / (60n). Satu rumus pendek itu bisa dipahami perawat di negara mana pun, apa pun bahasanya.

## 1.2 Contoh: pola korek api

Susun persegi berderet. Satu persegi butuh 4 korek. Setiap persegi tambahan hanya butuh 3 korek baru, karena satu sisinya menempel pada persegi sebelumnya.

| Banyak persegi | Cara menghitung | Banyak korek |
|---|---|---|
| 1 | 1 + (1 × 3) | 4 |
| 2 | 1 + (2 × 3) | 7 |
| 3 | 1 + (3 × 3) | 10 |
| n | 1 + (n × 3) = 1 + 3n | ... |

Angka 1 selalu ada (korek pertama). Angka 3 selalu sama (korek tambahan tiap persegi). Hanya banyak persegi yang berubah.

Pakai rumusnya:
- 5 persegi: 1 + 3 × 5 = 16 korek
- 10 persegi: 1 + 3 × 10 = 31 korek
- 33 persegi: 1 + 3 × 33 = 100 korek

Kamu tidak perlu menyusun 33 persegi satu per satu.

**Tentang cara menulis:** 3 × n cukup ditulis **3n**. Tanda kali dihilangkan dan angkanya di depan. Jadi 3n berarti "tiga kali n".

## 1.3 Empat istilah yang harus kamu kenal

Ambil bentuk aljabar **5x − 2y + 7**.

| Istilah | Artinya | Di contoh ini |
|---|---|---|
| Variabel | Huruf yang mewakili bilangan | x dan y |
| Suku | Potongan yang dipisah tanda + atau − | 5x, −2y, dan 7 |
| Koefisien | Angka yang mengalikan variabel | 5 (untuk x) dan −2 (untuk y) |
| Konstanta | Angka tanpa variabel, nilainya tetap | 7 |

Tiga hal yang sering bikin bingung:

- **Tanda ikut sukunya.** Pada 5x − 2y, suku keduanya adalah −2y, jadi koefisiennya −2, bukan 2.
- **Huruf tanpa angka tetap punya koefisien.** Pada x, koefisiennya 1. Pada −x − 3, koefisien x adalah −1.
- **Konstanta juga suku.** Angka 7 itu satu suku sendiri.

## 1.4 Mengartikan unsur dalam cerita

Rahmat membeli tiket taman bermain. Total bayarnya **3a + 2b**, dengan a = harga tiket anak dan b = harga tiket dewasa.

- Koefisien 3 pada a: ada **3 anak**.
- Koefisien 2 pada b: ada **2 orang dewasa**.
- Jadi koefisien menjawab "berapa banyak".

Kalau ada biaya parkir tetap Rp25.000, total menjadi **3a + 2b + 25.000**. Angka 25.000 adalah konstanta. Dia tidak ikut berubah walau harga tiket berubah.

Aturan praktis: **koefisien = jumlahnya, variabel = barangnya atau harganya, konstanta = biaya atau nilai tetap.**

## 1.5 Substitusi: mengisi kotak kosong

**Substitusi** artinya mengganti variabel dengan angka lalu menghitung.

Contoh: nilai 3m + 4 untuk m = 5.
- Ganti m dengan 5: 3 × 5 + 4
- Hitung: 15 + 4 = **19**

Contoh dengan tanda minus: nilai −2m + 7 untuk m = 3.
- Ganti m dengan 3: −2 × 3 + 7
- Hitung: −6 + 7 = **1**

Hasilnya harus diartikan sesuai ceritanya. Pada 1 + 3n dengan n = 5, angka 16 berarti "16 korek api". Dan tidak semua angka boleh dipakai: n = −2 persegi tidak masuk akal.

## 1.6 Kesalahan umum

- Menulis koefisien −2y sebagai 2.
- Mengira x tidak punya koefisien.
- Lupa memakai kurung saat mengganti variabel dengan bilangan negatif.

## 1.7 Cek pemahaman

| No | Soal | Kunci | Pancingan untuk Hint AI |
|---|---|---|---|
| 1 | Pada 4x − y + 9, sebutkan koefisien y dan konstantanya. | Koefisien y = −1; konstanta = 9 | "Kalau y ditulis lengkap dengan angkanya, bentuknya jadi apa? Tanda minus di depannya milik siapa?" |
| 2 | Hitung 2m − 5 untuk m = 4. | 3 | "Coba tulis dulu 2m − 5 dengan m diganti 4. Perkalian atau pengurangan yang kamu kerjakan lebih dulu?" |
| 3 | Total belanja Cakra 14.500x + 10.000y. Apa arti x dan y? | x = liter minyak goreng, y = kg beras | "Harga satu liter minyak adalah 14.500. Kalau beli x liter, apa yang berubah?" |
| 4 | Berapa korek api untuk 20 persegi? | 61 | "Rumusnya sudah ada di pola tadi. Apa yang kamu masukkan sebagai n?" |

---

# Unit 2. Menjumlahkan dan Mengurangkan Suku Sejenis

**Pertanyaan pembuka:** 2 apel + 3 apel = 5 apel. Tapi 2 apel + 3 jeruk, jadi berapa?

## 2.1 Suku sejenis

**Suku sejenis** adalah suku yang variabelnya sama. Angka tanpa variabel (konstanta) juga sejenis dengan sesama angka.

| Sejenis | Tidak sejenis |
|---|---|
| 3x dan 5x | 3x dan 5y |
| 7a dan −2a | 7a dan 7 |
| 4 dan 9 | 4x dan x² |

## 2.2 Ide utamanya: hitung yang sejenis saja

Anggap variabel sebagai nama barang.

- 2x + 3x = 5x ("2 apel tambah 3 apel jadi 5 apel").
- 7p − 4p = 3p ("punya 7 pensil, dipinjam 4, sisa 3 pensil").
- 2x + 3y **tidak bisa** dijadikan satu suku. Tidak ada nama barang bersama untuk "2 apel dan 3 jeruk" selain tetap ditulis 2x + 3y.

Caranya: **jumlahkan atau kurangkan koefisiennya, variabelnya tetap.**

- 5x + 7x = (5 + 7)x = **12x**
- 15n − 2n = (15 − 2)n = **13n**

Kenapa boleh begitu? Karena ini sebenarnya sifat distributif yang dibaca dari kanan ke kiri. Kita bahas di Unit 3.

## 2.3 Menyederhanakan banyak suku

Contoh: 7a + 2b − 3a

1. Tandai suku sejenis. Suku 7a dan −3a sejenis. Suku 2b sendirian.
2. Kumpulkan: 7a − 3a + 2b
3. Hitung koefisiennya: (7 − 3)a + 2b = **4a + 2b**

Boleh memindah urutan suku karena penjumlahan tidak peduli urutan: a + b = b + a (sifat komutatif). **Tapi tanda minus ikut pindah bersama suku di belakangnya.** Suku −3a pindah sebagai −3a, bukan 3a.

Contoh dengan angka: 3x + 5 − x + 2
- Sejenis: 3x dan −x; 5 dan 2.
- Hasil: (3 − 1)x + (5 + 2) = **2x + 7**

## 2.4 Koefisien pecahan

Caranya sama. Hanya penjumlahan pecahannya yang perlu disamakan penyebutnya.

- 1/2 x + 1/2 x = (1/2 + 1/2)x = 1x = **x**
- 2/3 a + 1/4 a: samakan penyebut 12 → (8/12 + 3/12)a = **11/12 a**
- 1/3 m − 1/2 m: samakan penyebut 6 → (2/6 − 3/6)m = **−1/6 m**

## 2.5 Kesalahan umum

| Salah | Kenapa salah | Benar |
|---|---|---|
| 2x + 3y = 5xy | x dan y bukan barang yang sama | 2x + 3y (tidak bisa disederhanakan) |
| 3x + 4 = 7x | 3x dan 4 tidak sejenis | 3x + 4 |
| x + x = x² | Menjumlah, bukan mengalikan | x + x = 2x |
| 7a − 3a = 4 | Variabel ikut hilang | 4a |

Cara cepat mengecek: coba satu angka. Untuk x + x dengan x = 3, hasilnya 6. Sedangkan x² = 9. Tidak sama, berarti x + x = x² salah. (Ingat: satu angka yang cocok belum tentu bukti, tapi satu angka yang tidak cocok sudah cukup membuktikan salah.)

## 2.6 Cek pemahaman

| No | Soal | Kunci | Pancingan untuk Hint AI |
|---|---|---|---|
| 1 | Sederhanakan 6x + 2y − 4x. | 2x + 2y | "Suku mana saja yang punya variabel sama? Apa yang terjadi pada koefisiennya?" |
| 2 | Sederhanakan 3a + 5 − a + 2. | 2a + 7 | "Ada berapa kelompok suku sejenis? Tulis tiap kelompok dulu." |
| 3 | Sederhanakan 1/2 x + 1/4 x. | 3/4 x | "Kalau dua pecahan itu dijumlahkan tanpa x, penyebut yang sama berapa?" |
| 4 | Bisakah 4p + 3q disederhanakan? | Tidak | "Kalau p = pensil dan q = buku, apakah 4 pensil + 3 buku bisa jadi satu jenis barang?" |

---

# Unit 3. Sifat Distributif dan Bentuk yang Sama Nilainya

**Pertanyaan pembuka:** Ada banyak cara menulis jumlah ubin di tepi kolam. Mana yang benar?

## 3.1 Cerita ubin kolam

Kolam persegi bersisi **s** meter dikelilingi ubin 1 m × 1 m. Rani membaginya jadi 4 sisi (masing-masing s ubin) dan 4 ubin di pojok.

Banyak ubin Rani: **4s + 4**

Teman-teman Rani menghitung dengan cara lain:

| Nama | Bentuk | Cara berpikirnya |
|---|---|---|
| Joko | 4(s + 1) | 4 bagian sama, tiap bagian s ubin ditambah 1 ubin pojok |
| Wisnu | s + s + s + s + 4 | Empat sisi ditulis satu per satu, lalu 4 pojok |
| Ayu | 2(s + 2) + 2s | Dua sisi panjang (termasuk pojok) ditambah dua sisi pendek |
| Riska | 4(s + 2) | Tiap bagian s + 2 ubin |

Cek untuk s = 10:
- Rani: 4 × 10 + 4 = 44
- Joko: 4 × 11 = 44
- Wisnu: 10 + 10 + 10 + 10 + 4 = 44
- Ayu: 2 × 12 + 20 = 44
- Riska: 4 × 12 = **48**

Riska beda sendiri. Setelah digambar, bagian 2 pada s + 2 menghitung pojok dua kali. Jadi rumus Riska keliru.

## 3.2 Bentuk ekuivalen

Dua bentuk aljabar **ekuivalen** kalau nilainya selalu sama, **berapa pun** angka yang dimasukkan ke variabelnya.

Mencoba beberapa angka (substitusi) berguna untuk menemukan yang tidak ekuivalen. Tapi ada jebakannya: dua bentuk bisa kebetulan sama di satu angka.

Contoh: 2x dan x + 2.
- Untuk x = 2: 4 dan 4. Sama!
- Untuk x = 3: 6 dan 5. Beda.

Jadi untuk **membuktikan** ekuivalen, kita pakai sifat-sifat aljabar, bukan sekadar mencoba.

## 3.3 Sifat distributif

Bayangkan persegi panjang dengan lebar a dan panjang (b + c). Luasnya bisa dihitung dua cara:

- Sekaligus: a × (b + c)
- Dipotong jadi dua bagian lalu dijumlah: a × b + a × c

Hasilnya harus sama, maka:

**a(b + c) = ab + ac** dan **a(b − c) = ab − ac**

Contoh angka: 3(x + 4). Persegi panjang berlebar 3 dan berpanjang x + 4 terbagi jadi bagian 3 × x dan bagian 3 × 4.

3(x + 4) = 3x + 12

Cara bacanya: **pengali di luar kurung membagikan dirinya ke semua suku di dalam.**

## 3.4 Bentuk jabaran dan bentuk faktor

| Bentuk faktor (ada kurung) | Bentuk jabaran (tanpa kurung) |
|---|---|
| 4(s + 1) | 4s + 4 |
| 3(x + 4) | 3x + 12 |
| a(b + c) | ab + ac |

- **Menjabarkan** = dari kiri ke kanan (membuka kurung).
- **Memfaktorkan** = dari kanan ke kiri (membentuk kurung).

Langkah memfaktorkan: cari angka (atau huruf) yang bisa membagi semua suku, tarik keluar kurung.

Contoh: 6x + 9
- 6 dan 9 sama-sama habis dibagi 3.
- 6x + 9 = 3 × 2x + 3 × 3 = **3(2x + 3)**

Contoh lain: 12x + 6 = 6(2x + 1).

Cek hasil memfaktorkan dengan menjabarkan kembali. Kalau kembali ke bentuk awal, berarti benar.

## 3.5 Menjabarkan dengan tanda minus

- 8(2x − 5) = 16x − 40 (8 mengalikan 2x dan mengalikan −5)
- Tanda minus di depan kurung membalik tanda semua isi kurung, karena sama dengan dikali −1:

(5x − 1) − (2x + 3)
= 5x − 1 − 2x − 3
= (5 − 2)x + (−1 − 3)
= **3x − 4**

Kesalahan yang paling sering: menulis 5x − 1 − 2x + 3 (hanya suku pertama yang tandanya dibalik).

## 3.6 Jabarkan lalu sederhanakan

3(x + 10) + 4(3x − 2)
= 3x + 30 + 12x − 8 (distributif)
= (3x + 12x) + (30 − 8) (kelompokkan suku sejenis)
= **15x + 22**

## 3.7 Membuktikan dengan alasan tiap langkah

Buktikan 2(y + 3) + y = 3y + 6:

| Langkah | Alasan |
|---|---|
| 2(y + 3) + y = 2y + 6 + y | Sifat distributif |
| = 2y + y + 6 | Sifat komutatif penjumlahan |
| = (2 + 1)y + 6 | Sifat distributif (menjumlah suku sejenis) |
| = 3y + 6 | Hitung 2 + 1 |

Dua sifat lain yang dipakai diam-diam:
- **Komutatif:** a + b = b + a dan ab = ba (urutan boleh ditukar).
- **Asosiatif:** (a + b) + c = a + (b + c) dan (ab)c = a(bc) (cara mengelompokkan boleh diganti).

## 3.8 Tantangan: kurung dikali kurung

(x + 1)(x + 3): bagikan satu kurung ke kurung lainnya.

= x(x + 3) + 1(x + 3)
= x² + 3x + x + 3
= **x² + 4x + 3**

Catatan: x² artinya x × x (seperti luas persegi bersisi x).

## 3.9 Cek pemahaman

| No | Soal | Kunci | Pancingan untuk Hint AI |
|---|---|---|---|
| 1 | Jabarkan 5(x + 2). | 5x + 10 | "Pengali 5 harus bertemu dengan suku apa saja di dalam kurung?" |
| 2 | Faktorkan 8x + 12. | 4(2x + 3) | "Angka terbesar berapa yang bisa membagi 8 dan 12 sekaligus?" |
| 3 | Sederhanakan 2(x + 3) + x. | 3x + 6 | "Buka kurungnya dulu. Setelah itu suku apa yang sejenis?" |
| 4 | Apakah 3(x + 2) ekuivalen dengan 3x + 2? | Tidak | "Coba masukkan x = 1 ke kedua bentuk. Hasilnya sama?" |
| 5 | Sederhanakan (4x + 1) − (x + 5). | 3x − 4 | "Tanda minus di depan kurung kedua mempengaruhi suku apa saja di dalamnya?" |

---

# Unit 4. Mengubah Cerita Menjadi Bentuk Aljabar

**Pertanyaan pembuka:** Bagaimana caranya supaya satu rumus bisa menjawab banyak soal cerita?

## 4.1 Lima langkah memodelkan

1. **Baca ceritanya.** Tentukan apa yang ditanyakan.
2. **Pilih huruf** untuk nilai yang berubah atau belum diketahui. Tulis artinya (mis. t = waktu dalam detik).
3. **Terjemahkan kata-kata** menjadi operasi (tabel di bawah).
4. **Tulis bentuk aljabarnya**, lalu sederhanakan kalau perlu.
5. **Substitusi angka** dan **cek apakah hasilnya masuk akal.**

| Kata di cerita | Operasi |
|---|---|
| lebih, ditambah, bertambah | + |
| kurang, lebih ringan, lebih pendek, dikurangi | − |
| 2 kali, 3 kali | × |
| setengah dari | × 1/2 (atau dibagi 2) |
| dibagi rata untuk 6 orang | dibagi 6 |

## 4.2 Jarak dan waktu ke sekolah

Rumah Wisnu ke sekolah 5.000 m. Ayahnya mengantar dengan motor berkecepatan 15 m per detik. Setelah t detik:

- Jarak yang sudah ditempuh: **15t** m
- Jarak yang tersisa: **5.000 − 15t** m

Setelah 2 menit. Ingat: kecepatannya dalam meter per **detik**, jadi ubah dulu 2 menit = 120 detik.
- Sudah ditempuh: 15 × 120 = 1.800 m
- Tersisa: 5.000 − 1.800 = 3.200 m

Setelah 3 menit (180 detik):
- Sudah ditempuh: 15 × 180 = 2.700 m
- Tersisa: 5.000 − 2.700 = 2.300 m

Jebakan: kalau kamu mengganti t dengan 2 (menit) langsung, hasilnya salah karena satuannya tidak cocok.

## 4.3 Membandingkan berat buah

Berat jeruk = t kg. Terjemahkan satu per satu:

| Buah | Cerita | Bentuk aljabar |
|---|---|---|
| Jeruk | acuan | t |
| Apel | 3 kg lebih berat dari jeruk | t + 3 |
| Belimbing | 2 kg lebih ringan dari jeruk | t − 2 |
| Anggur | 5 kg lebih ringan dari belimbing | (t − 2) − 5 = t − 7 |
| Rambutan | 3 kg lebih berat dari anggur | (t − 7) + 3 = t − 4 |

Urutan dari paling ringan: anggur (t − 7), rambutan (t − 4), belimbing (t − 2), jeruk (t), apel (t + 3). Urutan ini berlaku berapa pun nilai t, karena selisihnya tetap.

Sekarang uji kewajaran. Kalau jeruk 3 kg, berat anggur = 3 − 7 = **−4 kg**. Berat tidak mungkin negatif. Jadi nilai t = 3 **tidak boleh dipakai**; agar semua berat positif, t harus lebih dari 7.

Ini pelajaran penting: rumus bisa benar, tapi angka yang dimasukkan harus sesuai ceritanya.

## 4.4 Cerita dengan banyak orang: tinggi keluarga Linda

Tinggi Linda = L cm.

- Endah (kakak): 2 kali tinggi Linda = **2L**
- Rizki (kakak): 13 cm lebih tinggi dari Endah = **2L + 13**
- Ibu: 30 cm lebih pendek dari 4 kali Linda = **4L − 30**
- Ayah: 30 cm lebih pendek dari 2 kali Rizki = 2(2L + 13) − 30 = 4L + 26 − 30 = **4L − 4**

Kalau Linda 48 cm: Endah 96 cm, Rizki 109 cm, Ibu 162 cm, Ayah 188 cm.

Perhatikan bahwa langkah ayah memakai sifat distributif dari Unit 3.

## 4.5 Teka-teki bilangan: kenapa hasilnya selalu sama?

Ikuti perintah ini dengan bilangan apa saja:

1. Pilih sebuah bilangan.
2. Kalikan 2.
3. Tambah 6.
4. Bagi 2.
5. Kurangi bilangan pilihan awalmu.

Hasilnya selalu **3**. Alasannya terlihat kalau bilangan awal ditulis n:

| Langkah | Bentuk aljabar |
|---|---|
| Pilih bilangan | n |
| Kali 2 | 2n |
| Tambah 6 | 2n + 6 |
| Bagi 2 | n + 3 |
| Kurangi n | 3 |

n hilang di akhir, jadi hasilnya tidak bergantung pada pilihanmu. Itu kekuatan aljabar: satu penjelasan berlaku untuk semua bilangan.

## 4.6 Membandingkan pilihan: ojek online

Tarif menurut jarak k km:

| Layanan | Bentuk aljabar |
|---|---|
| Gogo (admin Rp5.000 + Rp1.500/km) | 5.000 + 1.500k |
| Gaga (Rp2.000/km, tanpa admin) | 2.000k |
| Gugu (admin Rp3.000 + Rp1.800/km) | 3.000 + 1.800k |

| Jarak | Gogo | Gaga | Gugu | Termurah |
|---|---|---|---|---|
| 5 km | 12.500 | 10.000 | 12.000 | Gaga |
| 20 km | 35.000 | 40.000 | 39.000 | Gogo |

Pilihan termurah ikut berubah menurut jarak. Satu bentuk aljabar per layanan memudahkan kita membandingkan pada jarak berapa pun.

## 4.7 Uang bertambah: deposito

Retno menabung P rupiah dengan bunga 4% per tahun. Uang di akhir tahun:

P + 0,04P = (1 + 0,04)P = **1,04P**

Untuk P = 10.000.000: 1,04 × 10.000.000 = **Rp10.400.000**. Bentuk P(1 + 0,04) adalah bentuk faktor dari P + 0,04P.

## 4.8 Kesalahan umum

- Memasukkan angka tanpa memeriksa satuan (menit ke detik).
- Menerjemahkan "5 kg lebih ringan dari belimbing" menjadi t − 5, padahal acuannya belimbing (t − 2), jadi (t − 2) − 5.
- Tidak mengecek hasil negatif atau tidak masuk akal.

## 4.9 Cek pemahaman

| No | Soal | Kunci | Pancingan untuk Hint AI |
|---|---|---|---|
| 1 | Ani punya k kelereng. Budi punya 5 lebih banyak dari Ani. Cici punya 3 lebih sedikit dari Ani. Tulis bentuk aljabar untuk Budi, Cici, dan total ketiganya. | Budi k + 5; Cici k − 3; total 3k + 2 | "Siapa yang jadi acuan? Kata 'lebih banyak' dan 'lebih sedikit' artinya tambah atau kurang?" |
| 2 | Untuk k = 10, berapa total kelereng mereka? | 32 | "Ganti k di bentuk yang sudah disederhanakan, lalu cek dengan menghitung satu per satu orang." |
| 3 | Malik naik bus pulang-pergi 5 hari seminggu, tiap sekali naik n rupiah. Tulis biaya per minggu dan sisa dari uang Rp50.000. | 10n; 50.000 − 10n | "Berapa kali naik bus dalam sehari? Lalu dalam lima hari?" |
| 4 | Pada soal 3, apa yang terjadi jika n = 6.000? | Biaya 60.000, uang kurang 10.000 (sisa −10.000) | "Hitung 10n lebih dulu. Dibandingkan 50.000, besar atau kecil?" |
| 5 | Ayu berat p kg. Kevin 3 kg lebih ringan dari 2 kali berat Ayu. Tulis berat Kevin. | 2p − 3 | "Mulai dari 'dua kali berat Ayu' dulu. Setelah itu, bagian 'lebih ringan 3 kg' diapakan?" |

---

# Ringkasan satu halaman

| Topik | Yang perlu diingat |
|---|---|
| Variabel | Huruf pengganti nilai yang berubah atau belum diketahui |
| Suku, koefisien, konstanta | Suku dipisah + atau −; koefisien = pengali variabel; konstanta = angka tetap |
| Substitusi | Ganti huruf dengan angka, hitung, lalu artikan hasilnya |
| Suku sejenis | Variabel sama; jumlahkan atau kurangkan koefisiennya |
| Distributif | a(b + c) = ab + ac; a(b − c) = ab − ac |
| Jabaran dan faktor | Jabaran = tanpa kurung; faktor = dengan kurung; keduanya ekuivalen |
| Ekuivalen | Sama untuk semua nilai variabel; membuktikannya pakai sifat, bukan hanya mencoba |
| Pemodelan | Pilih huruf, terjemahkan kata, tulis, substitusi, cek kewajaran |
