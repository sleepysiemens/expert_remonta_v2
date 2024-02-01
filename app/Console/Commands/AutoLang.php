<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class AutoLang extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:auto-lang';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Auto wrap texts in @lang directive';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $content = file_get_contents(dirname(__FILE__) . "/../../../resources/views/main/vacanciesLandingCopy.blade.php");
        // есть контакт
        //dd($content);
        preg_match_all("/([а-яА-Яa-zA-Z0-9,: \"«»-]*)<\//u", $content, $matches);
        $strings = array_filter($matches[1], function($i) {
            return mb_strlen($i) > 10;
        });

        foreach($strings as $s) {
            $content = preg_replace("/$s/u", "@lang('$s')", $content);
        }

        file_put_contents(dirname(__FILE__) . "/../../../resources/views/main/vacanciesLandingCopy.blade.php", $content);
    }
}
