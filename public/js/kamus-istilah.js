/**
 * Kamus Istilah Modal Controller
 */
document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('modal-kamus');
    if (!modal) return;

    document.querySelectorAll('.btn-buka-kamus').forEach(btn => {
        btn.addEventListener('click', function (e) {
            e.preventDefault();
            modal.classList.add('buka');
        });
    });

    document.querySelectorAll('.btn-tutup-kamus').forEach(btn => {
        btn.addEventListener('click', function (e) {
            e.preventDefault();
            modal.classList.remove('buka');
        });
    });

    modal.addEventListener('click', function (e) {
        if (e.target === modal) {
            modal.classList.remove('buka');
        }
    });
});
