<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class StoreFile implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $file;
    public $model;

    /**
     * Create a new job instance.
     */
    public function __construct($file, $model)
    {
        $this->file = $file;
        $this->model = $model;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $path = Storage::put('resumes', $this->file);
        $model->resume_file = $path;
        $model->update();
    }
}
