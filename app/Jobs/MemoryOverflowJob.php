<?php

declare(strict_types=1);

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class MemoryOverflowJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $timeout = 10;
    public int $tries = 0;
    public int $maxExceptions = 1;

    public function handle(): void
    {
        ini_set('memory_limit', '35M');

        $leak = [];
        $ticks = 0;
        while(true){
            $leak[$ticks] = file_get_contents(__FILE__);
            $ticks++;
            unset($leak[$ticks]);
        }
    }
}
