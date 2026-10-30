/**
 * Kuis Worksheet & Checker Controller
 */
window.initKuisWorksheet = function (config) {
    const sesiId = config.sesiId;
    const nomorSoal = config.nomorSoal;
    const isReadOnly = config.isReadOnly;

    const inputField = document.getElementById('input-ekspresi');
    const btnCekStep = document.getElementById('btn-cek-step');
    const btnKumpul = document.getElementById('btn-kumpul');
    const btnHint = document.getElementById('btn-hint');
    const umpanBalikBox = document.getElementById('umpan-balik-box');
    const umpanBalikTeks = document.getElementById('umpan-balik-teks');
    const gelembungAi = document.getElementById('gelembung-ai');
    const teksAi = document.getElementById('teks-ai');
    const boxPembahasan = document.getElementById('box-pembahasan');
    const isiPembahasan = document.getElementById('isi-pembahasan');
    const navigasiSelanjutnya = document.getElementById('navigasi-selanjutnya');
    const boxSelesaiKuis = document.getElementById('box-selesai-kuis');
    const hasilKumpulan = document.getElementById('hasil-kumpulan');
    const daftarBaris = document.getElementById('daftar-baris-langkah');
    const labelInputLangkah = document.getElementById('label-input-langkah');

    const bacaEkspresi = () => inputField
        ? inputField.getValue('ascii-math').trim().replace(/[×·]/g, '*').replace(/[÷]/g, '/').replace(/[−–—]/g, '-')
        : '';
    let ekspresiBenarTerakhir = inputField?.dataset.lastCorrect || '';
    let langkahSelesai = btnCekStep?.dataset.langkahSelesai === 'true';

    if (isReadOnly) {
        if (inputField) inputField.readOnly = true;
        if (btnCekStep) btnCekStep.disabled = true;
        if (btnKumpul) btnKumpul.disabled = true;
        if (btnHint) btnHint.disabled = true;
        return;
    }

    // 1. Aksi ↵ Cek Step
    if (btnCekStep) {
        btnCekStep.addEventListener('click', async function () {
            if (langkahSelesai) return;
            const ekspresi = bacaEkspresi();
            if (!ekspresi) {
                tampilkanUmpanBalik(false, 'Ketik atau klik ekspresi matematika terlebih dahulu.');
                return;
            }

            btnCekStep.disabled = true;
            btnCekStep.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Memeriksa...';

            try {
                const res = await AljabarFetch.post(`/sesi/${sesiId}/soal/${nomorSoal}/cek-step`, {
                    ekspresi: ekspresi
                });

                tampilkanUmpanBalik(res.benar, res.pesan);

                if (daftarBaris) {
                    const baris = document.createElement('div');
                    baris.className = `baris-langkah-item ${res.benar ? 'benar' : 'salah'}`;
                    const nomor = document.createElement('span');
                    nomor.className = 'baris-nomor';
                    nomor.textContent = res.benar
                        ? String(daftarBaris.querySelectorAll('.baris-langkah-item.benar:not(.dikumpulkan)').length + 1)
                        : '↻';
                    const ekspresiTeks = document.createElement('span');
                    ekspresiTeks.className = 'baris-ekspresi font-math';
                    ekspresiTeks.textContent = ekspresi;
                    const status = document.createElement('span');
                    status.className = 'baris-status-icon';
                    status.textContent = res.benar ? '✓' : '×';
                    baris.append(nomor, ekspresiTeks, status);
                    daftarBaris.append(baris);
                }

                if (res.benar) {
                    ekspresiBenarTerakhir = ekspresi;
                    inputField.setValue('');
                    langkahSelesai = Boolean(res.langkah_selesai);
                    if (labelInputLangkah && !langkahSelesai) {
                        const nomorLangkah = Number(labelInputLangkah.dataset.langkahBerikutnya || '1') + 1;
                        labelInputLangkah.dataset.langkahBerikutnya = String(nomorLangkah);
                        labelInputLangkah.textContent = `Ketik langkah ${nomorLangkah} dari ${btnCekStep.dataset.jumlahLangkah}:`;
                    } else if (langkahSelesai && labelInputLangkah) {
                        labelInputLangkah.textContent = 'Semua langkah benar. Kumpulkan jawaban akhir.';
                    }
                }
            } catch (err) {
                tampilkanUmpanBalik(false, err.message);
            } finally {
                btnCekStep.disabled = langkahSelesai;
                btnCekStep.innerHTML = langkahSelesai
                    ? '<span>Semua langkah diperiksa</span>'
                    : '<span>↵ Cek Step</span>';
            }
        });
    }

    // 2. Aksi Bantuan Petunjuk Sokratik
    if (btnHint) {
        btnHint.addEventListener('click', async function () {
            btnHint.disabled = true;
            btnHint.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Memuat...';

            if (gelembungAi) gelembungAi.style.display = 'flex';
            if (teksAi) teksAi.innerHTML = '<em>Sedang menyiapkan petunjuk...</em>';

            try {
                const res = await AljabarFetch.post(`/sesi/${sesiId}/soal/${nomorSoal}/hint`, {});
                if (teksAi) {
                    teksAi.innerText = res.hint;
                }
            } catch (err) {
                if (teksAi) {
                    teksAi.innerText = 'Coba baca kembali konsep pada materi di atas atau periksa Kamus Istilah.';
                }
            } finally {
                btnHint.disabled = false;
                btnHint.innerHTML = '<span><i class="fas fa-circle-question" style="margin-right: 0.35rem;"></i> Petunjuk</span>';
            }
        });
    }

    // 3. Aksi Kumpulkan Jawaban
    if (btnKumpul) {
        btnKumpul.addEventListener('click', async function () {
            // Ambil ekspresi terakhir dari input atau dari baris langkah terakhir
            let ekspresiAkhir = bacaEkspresi();
            if (!ekspresiAkhir) {
                ekspresiAkhir = ekspresiBenarTerakhir;
            }

            if (!ekspresiAkhir) {
                tampilkanUmpanBalik(false, 'Tuliskan jawaban terlebih dahulu sebelum mengumpulkan.');
                return;
            }

            if (!confirm('Yakin ingin mengumpulkan jawaban soal ini?')) {
                return;
            }

            btnKumpul.disabled = true;
            btnKumpul.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Mengumpulkan...';

            try {
                const res = await AljabarFetch.post(`/sesi/${sesiId}/soal/${nomorSoal}/kumpul`, {
                    jawaban_akhir: ekspresiAkhir
                });

                if (hasilKumpulan) {
                    hasilKumpulan.className = 'umpan-balik-box ' + (res.cocok ? 'benar' : 'salah');
                    hasilKumpulan.textContent = res.cocok
                        ? 'Jawaban akhir kamu benar.'
                        : 'Jawaban akhir belum tepat. Baca pembahasan untuk melihat cara menyelesaikannya.';
                    hasilKumpulan.style.display = 'flex';
                }

                // Tampilkan pembahasan
                if (boxPembahasan && isiPembahasan) {
                    isiPembahasan.innerText = res.pembahasan || 'Pembahasan telah dicatat.';
                    boxPembahasan.style.display = 'block';
                }

                // Kunci input
                inputField.readOnly = true;
                if (btnCekStep) btnCekStep.disabled = true;
                btnKumpul.style.display = 'none';
                if (btnHint) btnHint.style.display = 'none';

                // Tampilkan navigasi berikutnya
                if (res.kuis_selesai) {
                    if (boxSelesaiKuis) boxSelesaiKuis.style.display = 'block';
                } else if (navigasiSelanjutnya) {
                    navigasiSelanjutnya.style.display = 'flex';
                }
            } catch (err) {
                tampilkanUmpanBalik(false, err.message);
                btnKumpul.disabled = false;
                btnKumpul.innerHTML = '<i class="fas fa-check-circle"></i> Kumpulkan Jawaban';
            }
        });
    }

    function tampilkanUmpanBalik(benar, pesan) {
        if (!umpanBalikBox || !umpanBalikTeks) return;
        umpanBalikBox.style.display = 'flex';
        umpanBalikBox.className = 'umpan-balik-box ' + (benar ? 'benar' : 'salah');
        umpanBalikTeks.innerText = pesan;
    }

};
