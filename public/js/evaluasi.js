/**
 * Evaluasi Akhir Client Controller
 */
window.initEvaluasiClient = function (config) {
    const evaluasiId = config.evaluasiId;
    let sisaDetik = config.sisaDetik;
    const formKumpul = document.getElementById('form-kumpul-evaluasi');
    const timerDisplay = document.getElementById('timer-display');

    // 1. Timer Hitung Mundur Sisi Klien Berdasarkan Server
    const timerInterval = setInterval(function () {
        sisaDetik--;

        if (sisaDetik <= 0) {
            clearInterval(timerInterval);
            if (timerDisplay) timerDisplay.innerText = '00:00:00 (Waktu Habis)';
            alert('Waktu ujian telah habis! Jawaban Anda akan otomatis dikumpulkan.');
            if (formKumpul) formKumpul.submit();
            return;
        }

        const jam = Math.floor(sisaDetik / 3600);
        const menit = Math.floor((sisaDetik % 3600) / 60);
        const detik = sisaDetik % 60;

        const pad = (n) => String(n).padStart(2, '0');
        if (timerDisplay) {
            timerDisplay.innerText = `${pad(jam)}:${pad(menit)}:${pad(detik)}`;
        }
    }, 1000);

    // 2. Navigasi Pindah Soal
    const buttonsNomor = document.querySelectorAll('.nomor-soal-btn');
    const cardsSoal = document.querySelectorAll('.evaluasi-soal-card');

    buttonsNomor.forEach(btn => {
        btn.addEventListener('click', function () {
            const index = this.getAttribute('data-index');

            buttonsNomor.forEach(b => b.classList.remove('aktif'));
            this.classList.add('aktif');

            cardsSoal.forEach(c => c.style.display = 'none');
            const targetCard = document.getElementById(`soal-card-${index}`);
            if (targetCard) targetCard.style.display = 'block';
        });
    });

    // 3. Autosave Jawaban saat mengetik (Debounced)
    document.querySelectorAll('.input-jawaban-evaluasi').forEach(input => {
        let timeout = null;

        input.addEventListener('input', function () {
            const soalId = this.getAttribute('data-soal-id');
            const val = this.value;
            const index = this.getAttribute('data-index');
            const navBtn = document.querySelector(`.nomor-soal-btn[data-index="${index}"]`);

            if (navBtn) {
                if (val.trim() !== '') {
                    navBtn.classList.add('sudah-isi');
                } else {
                    navBtn.classList.remove('sudah-isi');
                }
            }

            clearTimeout(timeout);
            timeout = setTimeout(async function () {
                try {
                    await AljabarFetch.put(`/evaluasi/${evaluasiId}/jawaban/${soalId}`, {
                        jawaban: val
                    });
                } catch (e) {
                    console.warn('Gagal menyimpan otomatis:', e);
                }
            }, 600);
        });
    });
};
