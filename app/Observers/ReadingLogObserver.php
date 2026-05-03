<?php

namespace App\Observers;

use App\Models\ReadingLog;
use App\Models\ReadingProgress;

class ReadingLogObserver
{
    /**
     * Handle the ReadingLog "created" event.
     */
    public function created(ReadingLog $readingLog): void
    {
        //
    }

    /**
     * Handle the ReadingLog "updated" event.
     */
    public function updated(ReadingLog $readingLog): void
    {
        //
    }

    /**
     * Handle the ReadingLog "deleted" event.
     */
    public function deleted(ReadingLog $readingLog): void
    {
        //
    }

    /**
     * Handle the ReadingLog "restored" event.
     */
    public function restored(ReadingLog $readingLog): void
    {
        //
    }

    /**
     * Handle the ReadingLog "force deleted" event.
     */
    public function forceDeleted(ReadingLog $readingLog): void
    {
        //
    }

    public function syncProgress(int $progressId): void
    {
        $progress = ReadingProgress::find($progressId);

        if($progress){
            $lastLog = ReadingLog::where('reading_progress_id', $progress->id)
                                        ->orderBy('last_page_read', 'desc')
                                        ->first();
        }

        $newCurrentPage = $lastLog ? $lastLog->last_page_read : 0;
        $progress->updateProgress($newCurrentPage);
    }
}
