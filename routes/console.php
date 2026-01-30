<?php

use App\Services\SitemapService;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('sitemap:generate', function (): void {
    $sitemap = SitemapService::createSitemap();
    $path = public_path('sitemap.xml');
    $sitemap->writeToFile($path);
    $this->info('Sitemap written to ' . $path);
})->purpose('Generate sitemap.xml for search engines');

Schedule::command('sitemap:generate')->daily();
