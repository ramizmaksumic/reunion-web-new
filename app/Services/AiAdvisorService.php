<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Exception;

class AiAdvisorService
{
    public function getAdvice(array $data): array
    {
        try {
            $response = Http::timeout(config('ai.openai.timeout'))
                ->withToken(config('ai.openai.key'))
                ->post('https://api.openai.com/v1/chat/completions', [
                    'model' => config('ai.openai.model'),
                    'messages' => [
                        ['role' => 'system', 'content' => $this->systemPrompt()],
                        ['role' => 'user', 'content' => $this->userContext($data)],
                    ],
                    'temperature' => 0.4,
                ]);

            if (!$response->successful()) {
                throw new Exception('OpenAI API error');
            }

            $content = $response->json('choices.0.message.content');

            $decoded = json_decode($content, true);

            if (!$this->isValidResponse($decoded)) {
                throw new Exception('Invalid AI response format');
            }

            return $decoded;
        } catch (Exception $e) {

            // Fallback – nikad ne ruši UI
            return [
                'diagnosis' => 'Nismo mogli generisati automatski savjet.',
                'issues' => 'Potrebno je dodatno razjasniti Vašu situaciju.',
                'solution' => 'Preporučujemo kratak razgovor kako bismo dali tačan savjet.',
                'reunion' => 'Reunion pristupa svakom projektu individualno i bez generičkih rješenja.',
                'next_step' => 'Kontaktirajte nas za besplatan inicijalni razgovor.',
            ];
        }
    }

    private function isValidResponse(?array $data): bool
    {
        if (!$data) return false;

        $required = ['diagnosis', 'issues', 'solution', 'reunion', 'next_step'];

        foreach ($required as $key) {
            if (!array_key_exists($key, $data)) {
                return false;
            }
        }

        return true;
    }

    private function systemPrompt(): string
    {
        return <<<PROMPT
Ti si digitalni savjetnik za web i marketing u Bosni i Hercegovini.

Radiš isključivo sa malim i srednjim firmama.
Govoriš jasno, konkretno i bez marketinških fraza.
Ne preporučuješ skupa ili nerealna rješenja.
Ako korisnik ima pogrešnu pretpostavku to jasno kažeš.

NE KORISTI sljedeće izraze:
- "u današnjem digitalnom dobu"
- "ključ uspjeha"
- "inovativno rješenje"

Odgovor MORAŠ vratiti ISKLJUČIVO kao validan JSON:

{
  "diagnosis": "",
  "issues": "",
  "solution": "",
  "reunion": "",
  "next_step": ""
}
PROMPT;
    }

    private function userContext(array $data): string
    {
        // ⬅️ OVDJE rješavamo array
        $problems = is_array($data['problems'])
            ? implode(', ', $data['problems'])
            : (string) $data['problems'];

        return <<<TEXT
Podaci o firmi:
- Tip biznisa: {$data['businessType']}
- Grad / tržište: {$data['city']}
- Ima web stranicu: {$data['hasWebsite']}
- Budžet: {$data['budget']}
- Problemi: {$problems}

Pitanje korisnika:
{$data['question']}
TEXT;
    }
}
