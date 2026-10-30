<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AljabarLearn — Belajar Bentuk Aljabar</title>
    <link rel="stylesheet" href="{{ asset('css/tema.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tata-letak.css') }}">
    <style>
        :root {
            --landing-ink: var(--teks-utama);
            --landing-blue: var(--biru-utama);
            --landing-muted: var(--teks-pudar);
            --landing-line: var(--abu-border);
            --landing-wash: var(--abu-latar);
            --landing-white: var(--putih);
            --landing-blue-hover: var(--biru-hover);
            --landing-rule: var(--abu-border);
            --landing-focus: var(--biru-terang);
            --landing-field: var(--abu-garis);
            --landing-error: var(--merah-salah);
            --landing-error-wash: var(--merah-bg);
            --landing-error-line: var(--merah-border);
            --landing-success: var(--hijau-benar);
            --landing-success-wash: var(--hijau-bg);
            --landing-success-line: var(--hijau-border);
            --landing-topic-line: var(--abu-border);
            --landing-disabled: var(--teks-halus);
        }
        body { background: var(--landing-white); color: var(--landing-ink); }
        .site-header { min-height: 56px; display: flex; align-items: center; justify-content: space-between; gap: 1rem; padding: 0 max(1.25rem, calc((100vw - 1080px) / 2)); border-bottom: 1px solid var(--landing-line); background: var(--putih); color: var(--landing-ink); }
        .brand { display: inline-flex; align-items: center; gap: .7rem; text-decoration: none; color: inherit; }
        .brand-mark { display: grid; place-items: center; width: 36px; height: 36px; background: var(--landing-blue); color: var(--landing-white); font: 700 1rem var(--font-matematika); }
        .brand-name { color: var(--landing-ink); font-size: 1rem; font-weight: 600; letter-spacing: -.03em; }
        .site-nav { display: flex; align-items: center; gap: 1.5rem; }
        .site-nav a { color: var(--landing-muted); font-size: 12px; font-weight: 400; text-decoration: none; }
        .site-nav a:hover { color: var(--landing-blue); }
        .page-width { width: min(1080px, calc(100% - 2.5rem)); margin-inline: auto; }
        .hero { padding-block: clamp(4rem, 10vw, 7.5rem); }
        .eyebrow { margin: 0 0 1rem; color: var(--landing-blue); font-size: .75rem; font-weight: 600; letter-spacing: .1em; text-transform: uppercase; }
        h1, h2, h3 { font-family: var(--font-display); color: var(--landing-ink); }
        .hero h1 { max-width: 620px; margin: 0 0 1.25rem; font-size: clamp(2.8rem, 6vw, 3.5rem); line-height: 1.07; letter-spacing: -.28px; }
        .hero-copy { max-width: 510px; margin: 0; color: var(--landing-muted); font-size: 1.05rem; line-height: 1.75; }
        .hero-actions { display: flex; flex-wrap: wrap; gap: .75rem; margin-top: 1.75rem; }
        .action { display: inline-flex; min-height: 44px; align-items: center; justify-content: center; padding: 11px 22px; border: 1px solid var(--landing-blue); border-radius: 9999px; background: var(--landing-blue); color: var(--landing-white); font-size: 1rem; font-weight: 400; text-decoration: none; }
        .action:hover { background: var(--landing-blue-hover); }
        .action-secondary { background: transparent; color: var(--landing-blue); }
        .action-secondary:hover { background: var(--landing-wash); }
        .action:active { transform: scale(.95); }
        .notice-wrap { padding-top: 1rem; }
        .notice { margin: 0 0 .75rem; padding: .8rem 1rem; border: 1px solid; font-size: .875rem; }
        .notice-error { color: var(--landing-error); background: var(--landing-error-wash); border-color: var(--landing-error-line); }
        .notice-success { color: var(--landing-success); background: var(--landing-success-wash); border-color: var(--landing-success-line); }
        .access-section { padding-block: 4rem; border-top: 1px solid var(--landing-line); }
        .section-heading { max-width: 650px; margin-bottom: 2rem; }
        .section-heading h2 { margin: 0 0 .5rem; font-size: clamp(1.7rem, 3vw, 2.2rem); letter-spacing: -.035em; }
        .section-heading p { margin: 0; color: var(--landing-muted); line-height: 1.65; }
        .access-grid { display: grid; grid-template-columns: 1.15fr .85fr; border: 1px solid var(--landing-line); }
        .access-panel { padding: clamp(1.25rem, 3vw, 2rem); }
        .access-panel + .access-panel { border-left: 1px solid var(--landing-line); background: var(--landing-white); }
        .access-panel h3 { margin: 0 0 .35rem; font-size: 1.2rem; }
        .access-panel > p { margin: 0 0 1.5rem; color: var(--landing-muted); font-size: .875rem; line-height: 1.6; }
        .form-block { padding-bottom: 1.25rem; margin-bottom: 1.25rem; border-bottom: 1px solid var(--landing-line); }
        .form-block:last-child { padding: 0; margin: 0; border: 0; }
        .form-block label { display: block; margin-bottom: .45rem; color: var(--landing-ink); font-size: .8rem; font-weight: 700; }
        .form-row { display: flex; gap: .5rem; }
        .form-row input, .form-row select { width: 100%; min-width: 0; min-height: 44px; padding: .65rem .75rem; border: 1px solid var(--landing-field); border-radius: 0; background: var(--landing-white); color: var(--landing-ink); font: inherit; font-size: .875rem; }
        .form-row input:focus, .form-row select:focus { outline: 2px solid var(--landing-focus); outline-offset: 1px; }
        .form-row button { flex: 0 0 auto; min-height: 44px; padding: .65rem .9rem; border: 0; background: var(--landing-blue); color: var(--landing-white); font: inherit; font-size: .85rem; font-weight: 700; cursor: pointer; }
        .form-row button:hover { background: var(--landing-blue-hover); }
        .form-row button:disabled { background: var(--landing-disabled); cursor: not-allowed; }
        .teacher-name { margin: 1.25rem 0; padding: .9rem 1rem; border-left: 2px solid var(--landing-blue); background: var(--landing-white); font-weight: 700; }
        .teacher-name small { display: block; margin-top: .25rem; color: var(--landing-muted); font-size: .8rem; font-weight: 400; line-height: 1.55; }
        .topics { padding-block: 3.5rem 4rem; background: var(--landing-wash); }
        .topic-list { border-top: 1px solid var(--landing-topic-line); }
        .topic { display: grid; grid-template-columns: 52px minmax(180px, .8fr) 1.2fr; gap: 1rem; align-items: baseline; padding: 1.1rem 0; border-bottom: 1px solid var(--landing-topic-line); }
        .topic-number { color: var(--landing-blue); font-size: .8rem; font-weight: 600; }
        .topic h3 { margin: 0; font-size: 1rem; }
        .topic p { margin: 0; color: var(--landing-muted); font-size: .875rem; line-height: 1.6; }
        .site-footer { padding: 1.5rem 0; border-top: 1px solid var(--landing-line); color: var(--landing-muted); font-size: .8rem; }
        @media (max-width: 760px) {
            .access-grid { grid-template-columns: 1fr; }
            .access-panel + .access-panel { border-top: 1px solid var(--landing-line); border-left: 0; }
        }
        @media (max-width: 520px) {
            .site-header { min-height: 56px; padding-inline: 1rem; }
            .site-nav { gap: .8rem; }
            .site-nav a { font-size: .75rem; }
            .site-nav a:last-child { display: none; }
            .page-width { width: calc(100% - 2rem); }
            .hero { padding-block: 3.25rem; }
            .hero h1 { font-size: 2.8rem; }
            .form-row { flex-wrap: wrap; }
            .form-row button { width: 100%; }
            .topic { grid-template-columns: 36px 1fr; gap: .5rem .75rem; }
            .topic p { grid-column: 2; }
        }
    </style>
</head>
<body>
    <header class="site-header" data-od-id="header">
        <a class="brand" href="{{ route('landing') }}" aria-label="AljabarLearn, beranda">
            <span class="brand-mark" aria-hidden="true">x²</span>
            <span class="brand-name">AljabarLearn</span>
        </a>
        <nav class="site-nav" aria-label="Navigasi utama">
            <a href="#materi">Materi</a>
            <a href="#akses">Akses belajar</a>
        </nav>
    </header>

    @if(session('error') || session('success'))
        <div class="page-width notice-wrap" role="status">
            @if(session('error'))<p class="notice notice-error">{{ session('error') }}</p>@endif
            @if(session('success'))<p class="notice notice-success">{{ session('success') }}</p>@endif
        </div>
    @endif

    <main>
        <section class="hero page-width" data-od-id="hero">
            <div>
                <p class="eyebrow">Matematika · Kelas VII · Bab 4</p>
                <h1>Pahami bentuk aljabar, satu langkah demi satu.</h1>
                <p class="hero-copy">Pelajari konsep, susun langkah penyelesaian, lalu periksa apakah setiap bentuk tetap setara. Materi dan kuis dapat dibuka untuk latihan.</p>
                <div class="hero-actions">
                    <a class="action" href="#akses">Mulai belajar</a>
                    <a class="action action-secondary" href="#materi">Lihat materi</a>
                </div>
            </div>
        </section>

        <section id="akses" class="access-section" data-od-id="akses-belajar">
            <div class="page-width">
                <div class="section-heading">
                    <p class="eyebrow">Akses belajar</p>
                    <h2>Pilih cara masuk</h2>
                    <p>Siswa dapat melanjutkan dengan akun yang tersedia atau mulai dengan nama baru. Guru masuk ke dasbor pemantauan kelas.</p>
                </div>

                <div class="access-grid">
                    <div class="access-panel">
                        <h3>Siswa</h3>
                        <p>Buka materi, latihan kuis, dan pantau progres belajar.</p>
                        <form class="form-block" action="{{ route('masuk.siswa') }}" method="POST">
                            @csrf
                            <label for="siswa_id">Lanjutkan dengan akun siswa</label>
                            <div class="form-row">
                                <select id="siswa_id" name="siswa_id" {{ $siswaList->isEmpty() ? 'disabled' : '' }}>
                                    @forelse($siswaList as $siswa)
                                        <option value="{{ $siswa->id }}">{{ $siswa->nama }}</option>
                                    @empty
                                        <option value="">Belum ada akun siswa</option>
                                    @endforelse
                                </select>
                                <button type="submit" {{ $siswaList->isEmpty() ? 'disabled' : '' }}>Masuk</button>
                            </div>
                        </form>
                        <form class="form-block" action="{{ route('masuk.siswa') }}" method="POST">
                            @csrf
                            <label for="nama_baru">Mulai dengan nama baru</label>
                            <div class="form-row">
                                <input id="nama_baru" type="text" name="nama_baru" placeholder="Nama lengkap" minlength="2" maxlength="100" required>
                                <button type="submit">Mulai</button>
                            </div>
                        </form>
                    </div>

                    <div class="access-panel">
                        <h3>Guru</h3>
                        <p>Lihat progres kelas, riwayat pengerjaan kuis, dan ringkasan materi.</p>
                        <div class="teacher-name">
                            {{ $guru->nama ?? 'Akun Guru' }}
                            <small>Dasbor pemantauan bersifat baca-saja.</small>
                        </div>
                        <form action="{{ route('masuk.guru') }}" method="POST">
                            @csrf
                            <div class="form-row"><button type="submit" style="width:100%">Buka dasbor guru</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <section id="materi" class="topics" data-od-id="cakupan-materi">
            <div class="page-width">
                <div class="section-heading">
                    <p class="eyebrow">Bab 4</p>
                    <h2>Bentuk aljabar</h2>
                    <p>Tiga pokok bahasan dari mengenali unsur aljabar hingga menggunakannya untuk memodelkan situasi.</p>
                </div>
                <div class="topic-list">
                    <article class="topic">
                        <span class="topic-number">01</span>
                        <h3>Unsur bentuk aljabar</h3>
                        <p>Variabel, koefisien, konstanta, dan suku.</p>
                    </article>
                    <article class="topic">
                        <span class="topic-number">02</span>
                        <h3>Sifat dan operasi aljabar</h3>
                        <p>Sifat distributif serta operasi pada suku sejenis.</p>
                    </article>
                    <article class="topic">
                        <span class="topic-number">03</span>
                        <h3>Pemodelan aljabar</h3>
                        <p>Menerjemahkan situasi dan soal cerita ke bentuk aljabar.</p>
                    </article>
                </div>
            </div>
        </section>
    </main>

    <footer class="site-footer">
        <div class="page-width">AljabarLearn · Media belajar Matematika Kelas VII</div>
    </footer>
</body>
</html>
