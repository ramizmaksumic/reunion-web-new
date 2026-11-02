<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class CleanupInquiryUploads extends Command
{
    protected $signature = 'inquiry:cleanup-uploads';

    protected $description = 'Remove abandoned private Livewire uploads older than 24 hours';

    public function handle(): int
    {
        $disk = Storage::disk('inquiry-temporary');
        foreach ($disk->allFiles('livewire-tmp') as $path) {
            if ($disk->exists($path) && $disk->lastModified($path) < now()->subDay()->timestamp) {
                $disk->delete($path);
            }
        }

        return self::SUCCESS;
    }
}
