<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use App\Helpers\GoogleDrive;


class StoreBackup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:store-backup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Store backup to Google Drive';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $backupFiles = Storage::files(config('app.name'));
        $mostRecentBackup = $backupFiles[count($backupFiles) - 1];
        //$mostRecentBackup = $backupFiles[0];
        $driveFileName = "backup-" . str_replace(config('app.name') . "/", '', $mostRecentBackup);
        //dd($driveFileName);

        $googleDrive = new GoogleDrive();
        // по хорошему нужен будет тип загрузки resumable, просто еще не разобрался с ним
        // а также смотреть сколько бэкапов уже в папке, старые удалять
        $fileId = $googleDrive->uploadToFolder('1qxC1Ka9nX2XdySqxGJV09u-fmooBrXx3', [
            'drive_name' => $driveFileName,
            'mime' => 'application/zip',
            'content' => file_get_contents(
                base_path() . "/storage/app/$mostRecentBackup"
                )
        ]);
        if($fileId) {
            //уведомление о бэкапе, например
        }
        
    }
}
