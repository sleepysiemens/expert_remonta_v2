<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\Sale;
use Spatie\Sitemap\SitemapGenerator;
use Illuminate\Support\Facades\Log;

class GenSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:gen-sitemap';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate sitemap';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $path = public_path() . '/sitemap.xml';
        //dd($path);
        $domain = 'astana.';
        $scheme = 'http';
        if(config('app.city') === 'Алматы') $domain = '';
        $domain .= 'expertremonta.kz';

        //SitemapGenerator::create("http://$domain")->writeToFile($path);

        $lastSaleMod = date('c', strtotime(\App\Models\Sale::max('updated_at')));
        $lastReviewMod = date('c', strtotime(\App\Models\Review::max('updated_at')));
        $lastVacancyMod = date('c', strtotime(\App\Models\Vacancy::max('updated_at')));
        //dd($lastReviewMod);

        $sitemapContent = "<urlset xmlns:xsi='http://www.w3.org/2001/XMLSchema-instance' xsi:schemaLocation='http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd' xmlns='http://www.sitemaps.org/schemas/sitemap/0.9'>	
        <url>
            <loc>$scheme://$domain</loc>
            <lastmod>$lastSaleMod</lastmod>
            <changefreq>monthly</changefreq>
            <priority>1</priority>
	    </url>
        <url>
            <loc>$scheme://$domain/uslugi</loc>
            <lastmod>2024-02-05T09:42:17+00:00</lastmod>
            <changefreq>monthly</changefreq>
            <priority>0.8</priority>
	    </url>";

        foreach(\App\Models\service::all() as $i) {
            $date = date('c', strtotime($i->updated_at));
            $sitemapContent .= "<url>
            <loc>$scheme://$domain/uslugi/$i->url</loc>
            <lastmod>$date</lastmod>
            <changefreq>monthly</changefreq>
            <priority>0.8</priority>
	    </url>";
        }

        foreach(\App\Models\category::active()->with('service')->get() as $i) {
            $date = date('c', strtotime($i->updated_at));
            if(!$i->service) continue;
            $sUrl = $i->service->url;
            $sitemapContent .= "<url>
            <loc>$scheme://$domain/uslugi/$sUrl/$i->url</loc>
            <lastmod>$date</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.6</priority>
	    </url>";
        }

        foreach(\App\Models\Vacancy::all() as $i) {
            $date = date('c', strtotime($i->updated_at));
            $sitemapContent .= "<url>
            <loc>$scheme://$domain/vacancy/$i->url</loc>
            <lastmod>$date</lastmod>
            <changefreq>monthly</changefreq>
            <priority>0.6</priority>
	    </url>";
        }

        foreach(\App\Models\VacancyCategory::all() as $i) {
            $date = date('c', strtotime($i->updated_at));
            $sitemapContent .= "<url>
            <loc>$scheme://$domain/vacancies/category/$i->url</loc>
            <lastmod>$date</lastmod>
            <changefreq>monthly</changefreq>
            <priority>0.4</priority>
	    </url>";
        }

        $sitemapContent .= "<url>
        <loc>$scheme://$domain/price</loc>
        <lastmod>2024-02-05T09:42:17+00:00</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.6</priority>
        </url>
        <url>
        <loc>$scheme://$domain/gallery</loc>
        <lastmod>2024-02-05T09:42:17+00:00</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
        </url>
        <url>
        <loc>$scheme://$domain/reviews</loc>
        <lastmod>2024-02-05T09:42:17+00:00</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
        </url>
        <url>
        <loc>$scheme://$domain/contact</loc>
        <lastmod>2024-02-05T09:42:17+00:00</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
        </url>
        <url>
        <loc>$scheme://$domain/franchise</loc>
        <lastmod>2024-02-05T09:42:17+00:00</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
        </url>
        <url>
        <loc>$scheme://$domain/vacancies-office</loc>
        <lastmod>2024-02-05T09:42:17+00:00</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
        </url>
        <url>
        <loc>$scheme://$domain/vacancies-landing</loc>
        <lastmod>2024-02-05T09:42:17+00:00</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
        </url>
        <url>
        <loc>$scheme://$domain/vacancies</loc>
        <lastmod>$lastVacancyMod</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
        </url>
        ";
    
        $sitemapContent .= "</urlset>";

        file_put_contents($path, $sitemapContent);

        // лог делать в другой файл, для крон действий
        Log::debug('Sitemap are successfully generated');
        
        
    }
}
