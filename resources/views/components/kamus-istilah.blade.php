@php
    $daftarKamus = $kamusIstilah ?? (file_exists(database_path('seeders/data/kamus-istilah.php')) ? require database_path('seeders/data/kamus-istilah.php') : []);
@endphp

<div id="modal-kamus" class="modal-overlay">
    <div class="modal-content">
        <div style="display: flex; align-items: center; justify-content: space-between; border-bottom: 1px solid var(--abu-border); padding-bottom: 1rem; margin-bottom: 1.25rem;">
            <div style="display: flex; align-items: center; gap: 0.65rem;">
                <div style="width: 32px; height: 32px; background-color: var(--biru-muda); color: var(--biru-utama); border-radius: var(--radius-sm); display: flex; align-items: center; justify-content: center; font-size: 1rem;">
                    <i class="fas fa-book-bookmark"></i>
                </div>
                <div>
                    <h3 style="font-size: 1.15rem; font-weight: 600; color: var(--biru-gelap);">Kamus Istilah Aljabar</h3>
                    <p style="font-size: 0.75rem; color: var(--teks-pudar);">Rujukan istilah dasar Bab 4 Bentuk Aljabar</p>
                </div>
            </div>
            <button type="button" class="btn-tutup-kamus" style="background: none; border: none; font-size: 1.25rem; color: var(--teks-pudar); cursor: pointer; padding: 0.25rem;">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <div style="display: flex; flex-direction: column; gap: 1rem;">
            @foreach($daftarKamus as $item)
                <div style="padding: 0.85rem 1rem; background-color: var(--abu-latar); border: 1px solid var(--abu-border); border-radius: var(--radius-md);">
                    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 0.35rem;">
                        <h4 style="font-size: 0.95rem; font-weight: 600; color: var(--biru-utama);">{{ $item['istilah'] }}</h4>
                    </div>
                    <p style="font-size: 0.875rem; color: var(--teks-utama); margin-bottom: 0.4rem;">
                        {{ $item['arti'] }}
                    </p>
                    <div style="font-size: 0.8rem; background-color: var(--putih); padding: 0.4rem 0.65rem; border-radius: var(--radius-sm); border: 1px solid var(--abu-border); color: var(--teks-pudar);">
                        <strong style="color: var(--teks-pudar);">Contoh:</strong> <span class="font-math">{{ $item['contoh'] }}</span>
                    </div>
                </div>
            @endforeach
        </div>

        <div style="margin-top: 1.5rem; text-align: right;">
            <button type="button" class="btn btn-secondary btn-tutup-kamus">Tutup Kamus</button>
        </div>
    </div>
</div>
