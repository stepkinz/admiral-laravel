<?php

declare(strict_types=1);

namespace App\Services;

use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

final class SitemapService
{
    public static function createSitemap(): Sitemap
    {
        $baseUrl = rtrim(config('app.url'), '/');
        return Sitemap::create()
            ->add(Url::create($baseUrl)->setPriority(1.0)->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY))
            ->add(Url::create($baseUrl . '/about')->setPriority(0.8)->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY))
            ->add(Url::create($baseUrl . '/contact')->setPriority(0.8)->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY))
            ->add(Url::create($baseUrl . '/requisites')->setPriority(0.6)->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY))
            ->add(Url::create($baseUrl . '/legal')->setPriority(0.5)->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY))
            ->add(Url::create($baseUrl . '/legal/privacy')->setPriority(0.5)->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY))
            ->add(Url::create($baseUrl . '/legal/terms')->setPriority(0.5)->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY))
            ->add(Url::create($baseUrl . '/legal/personal-data')->setPriority(0.5)->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY));
    }
}
