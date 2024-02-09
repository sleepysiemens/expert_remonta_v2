<?php
// utils functions for db, data

// transfer from cache to db
function transferData() {
   //dd(\App\Models\Service::all());
        /*foreach(Cache::get('services') as $s) {
            $new = $s->replicate();
            $new->save();
        }
        dd(\App\Models\Service::all());
        dd(Cache::get('services'));*/
        //Cache::add('key', '123', now()->addHours(4));
        //Cache::add('services', \App\Models\Service::all(), now()->addHours(4));
}