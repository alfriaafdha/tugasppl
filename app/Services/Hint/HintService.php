<?php

namespace App\Services\Hint;

use App\Models\SesiKuis;
use App\Models\SoalKuis;
use Illuminate\Support\Facades\Cache;

class HintService
{
    public function __construct(protected GeminiClient $geminiClient)
    {
    }

    /**
     * Mengambil petunjuk Socratic untuk soal kuis latihan
     */
    public function mintaHint(SesiKuis $sesi, SoalKuis $soal, ?string $langkahTerakhir = null): string
    {
        // 1. Tambah pencatatan penggunaan hint AI pada sesi
        $sesi->increment('jumlah_hint_ai');

        $cacheKey = "hint_{$sesi->id}_{$soal->id}_" . md5((string) $langkahTerakhir);
        if (Cache::has($cacheKey)) {
            return Cache::get($cacheKey);
        }

        $hint = null;

        if ($this->geminiClient->isAvailable()) {
            $systemPrompt = PromptSocratic::getSystemPrompt();
            $userContext = PromptSocratic::buildUserContext($soal, $langkahTerakhir, $sesi->jumlah_hint_ai);

            $responsAi = $this->geminiClient->generateHint($systemPrompt, $userContext);

            if ($responsAi !== null) {
                // Saring respons: jika bocor, batalkan dan pakai hint cadangan
                if (! FilterKebocoran::apakahBocor($responsAi, $soal)) {
                    $hint = trim($responsAi);
                }
            }
        }

        // Jika API tidak tersedia atau respons bocor, gunakan hint cadangan dari database
        if (empty($hint)) {
            $hint = $soal->hint_cadangan ?: 'Coba baca kembali penjelasan konsep materi di bagian atas atau periksa istilah terkait di Kamus Istilah.';
        }

        // Cache hasil selama 15 menit
        Cache::put($cacheKey, $hint, 900);

        return $hint;
    }
}
