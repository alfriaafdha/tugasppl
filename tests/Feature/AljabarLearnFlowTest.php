<?php

namespace Tests\Feature;

use App\Models\Kuis;
use App\Models\Pengguna;
use App\Models\SoalKuis;
use App\Models\SubBab;
use Database\Seeders\GuruSeeder;
use Database\Seeders\KuisSeeder;
use Database\Seeders\SiswaUjiSeeder;
use Database\Seeders\SoalEvaluasiSeeder;
use Database\Seeders\SubBabSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AljabarLearnFlowTest extends TestCase
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

    public function test_landing_page_can_be_accessed(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('AljabarLearn');
        $response->assertSee('Masuk sebagai Siswa');
        $response->assertSee('Masuk sebagai Guru');
    }

    public function test_masuk_siswa_dengan_siswa_terdaftar(): void
    {
        $siswa = Pengguna::where('peran', 'siswa')->first();
        $response = $this->post('/masuk/siswa', ['siswa_id' => $siswa->id]);
        $response->assertRedirect('/dashboard');
        $this->assertAuthenticatedAs($siswa);

        $dashResponse = $this->get('/dashboard');
        $dashResponse->assertStatus(200);
        $dashResponse->assertSee($siswa->nama);
    }

    public function test_masuk_siswa_baru(): void
    {
        $response = $this->post('/masuk/siswa', ['nama_baru' => 'Budi Santoso']);
        $response->assertRedirect('/dashboard');
        $this->assertDatabaseHas('pengguna', ['nama' => 'Budi Santoso', 'peran' => 'siswa']);

        $dashResponse = $this->get('/dashboard');
        $dashResponse->assertStatus(200);
        $dashResponse->assertSee('Budi Santoso');
    }

    public function test_siswa_bisa_membuka_subbab_a_dan_memulai_kuis(): void
    {
        $siswa = Pengguna::where('peran', 'siswa')->first();
        $this->actingAs($siswa);

        $subBabA = SubBab::where('urutan', 1)->first();
        $response = $this->get("/sub-bab/{$subBabA->id}");
        $response->assertStatus(200);
        $response->assertSee($subBabA->judul);

        // Mulai kuis
        $kuisResponse = $this->post("/sub-bab/{$subBabA->id}/kuis/mulai");
        $kuisResponse->assertRedirect();

        // Ikuti redirect ke soal 1
        $targetUrl = $kuisResponse->headers->get('Location');
        $soalResponse = $this->get($targetUrl);
        $soalResponse->assertStatus(200);
        $soalResponse->assertSee('Papan Tombol Aljabar Cepat');
    }

    public function test_guru_bisa_masuk_dan_melihat_dasbor_serta_analisis(): void
    {
        $response = $this->post('/masuk/guru');
        $response->assertRedirect('/guru');

        $guru = Pengguna::where('peran', 'guru')->first();
        $this->assertAuthenticatedAs($guru);

        $dasbor = $this->get('/guru');
        $dasbor->assertStatus(200);
        $dasbor->assertSee('Dasbor Pemantauan Progres Siswa');

        $ringkasan = $this->get('/guru/ringkasan-materi');
        $ringkasan->assertStatus(200);
        $ringkasan->assertSee('Analisis Materi Sulit');

        $siswa = Pengguna::where('peran', 'siswa')->first();
        $detail = $this->get("/guru/siswa/{$siswa->id}");
        $detail->assertStatus(200);
        $detail->assertSee($siswa->nama);
    }
}
