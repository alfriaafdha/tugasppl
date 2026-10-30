<?php

namespace App\Services\Hint;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Throwable;

class GeminiClient
{
    protected string $apiKey;
    protected string $model;
    protected int $timeout;

    public function __construct()
    {
        $this->apiKey = config('aljabarlearn.gemini.api_key', '');
        $this->model = config('aljabarlearn.gemini.model', 'gemini-1.5-flash');
        $this->timeout = config('aljabarlearn.gemini.timeout', 6);
    }

    public function isAvailable(): bool
    {
        return ! empty($this->apiKey);
    }

    /**
     * Memanggil Gemini API untuk menghasilkan hint Socratic
     */
    public function generateHint(string $systemPrompt, string $userContext): ?string
    {
        if (! $this->isAvailable()) {
            return null;
        }

        $url = "https://generativelanguage.googleapis.com/v1beta/models/{$this->model}:generateContent?key={$this->apiKey}";

        try {
            $response = Http::timeout($this->timeout)->post($url, [
                'system_instruction' => [
                    'parts' => [
                        ['text' => $systemPrompt],
                    ],
                ],
                'contents' => [
                    [
                        'role' => 'user',
                        'parts' => [
                            ['text' => $userContext],
                        ],
                    ],
                ],
                'generationConfig' => [
                    'temperature' => 0.5,
                    'maxOutputTokens' => 200,
                ],
            ]);

            if ($response->successful()) {
                $data = $response->json();
                return $data['candidates'][0]['content']['parts'][0]['text'] ?? null;
            }

            Log::warning('Gemini API returned error: ' . $response->status() . ' - ' . $response->body());
            return null;
        } catch (Throwable $e) {
            Log::warning('Gemini API call failed: ' . $e->getMessage());
            return null;
        }
    }
}
