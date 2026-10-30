<?php

namespace Tests\Feature;

use App\Models\EvaluasiAkhir;
use App\Models\Pengguna;
use App\Models\ProgresSiswa;
use App\Models\SubBab;
use Database\Seeders\GuruSeeder;
use Database\Seeders\KuisSeeder;
use Database\Seeders\SiswaUjiSeeder;
use Database\Seeders\SoalEvaluasiSeeder;
use Database\Seeders\SubBabSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed([
            SubBabSeeder::class,
            KuisSeeder::class,
            SoalEvaluasiSeeder::class,
            GuruSeeder::class,
            SiswaUjiSeeder::class,
        ]);
    }

    public function test_dasbor_siswa_menampilkan_progres_dan_kartu_subbab(): void
    {
        $siswa = Pengguna::where('peran', 'siswa')->first();
        $this->actingAs($siswa);

        $response = $this->get('/dashboard');
        $response->assertStatus(200);
        $response->assertSee($siswa->nama);
        $response->assertSee('Progres Bab 4');
        $response->assertSee('Sub-bab A');
        $response->assertSee('Sub-bab B');
        $response->assertSee('Sub-bab C');
        $response->assertSee('Evaluasi Akhir');
        $response->assertSee('Kamus Istilah');
    }

    public function test_dasbor_siswa_evaluasi_terkunci_bila_belum_100_persen(): void
    {
        $siswa = Pengguna::where('peran', 'siswa')->first();
        $this->actingAs($siswa);

        // Belum ada sub-bab tuntas
        $response = $this->get('/dashboard');
        $response->assertStatus(200);
        $response->assertSee('Terkunci');
        $response->assertSee('Selesaikan Sub-bab');
    }

    public function test_dasbor_siswa_evaluasi_terbuka_saat_100_persen(): void
    {
        $siswa = Pengguna::where('peran', 'siswa')->first();

        // Tandai ketiga sub-bab tuntas
        ProgresSiswa::where('pengguna_id', $siswa->id)->update([
            'status_tuntas' => true,
            'tanggal_tuntas' => now(),
        ]);

        $this->actingAs($siswa);

        $response = $this->get('/dashboard');
        $response->assertStatus(200);
        $response->assertSee('100%');
        $response->assertSee('Masuk Lembar Ujian');
    }

    public function test_dasbor_guru_menampilkan_metrik_kelas_dan_daftar_siswa(): void
    {
        $guru = Pengguna::where('peran', 'guru')->first();
        $this->actingAs($guru);

        $response = $this->get('/guru');
        $response->assertStatus(200);
        $response->assertSee('Selamat Datang, ' . $guru->nama);
        $response->assertSee('Total Siswa Terdaftar');
        $response->assertSee('Rata-rata Progres Kelas');
        $response->assertSee('Tuntas Seluruh Sub-bab');
        $response->assertSee('Lulus Evaluasi Akhir');

        // Pastikan nama-nama siswa tampil di tabel
        $siswaList = Pengguna::where('peran', 'siswa')->get();
        foreach ($siswaList as $s) {
            $response->assertSee($s->nama);
        }
    }

    public function test_siswa_tidak_bisa_mengakses_dasbor_guru(): void
    {
        $siswa = Pengguna::where('peran', 'siswa')->first();
        $this->actingAs($siswa);

        $response = $this->get('/guru');
        $response->assertStatus(403);
    }
}
