<?php

namespace App\Providers;

use App\Models\CompanySetting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $frontendViews = [
            'welcome',
            'about',
            'contact',
            'requisites',
            'legal.index',
            'legal.privacy',
            'legal.terms',
            'legal.personal-data',
            'components.layouts.app',
            'components.footer',
            'components.header',
            'components.top-bar',
            'components.phone-checker',
            'components.final-cta',
            'components.verify-license',
            'components.employee-checker',
        ];

        View::composer($frontendViews, function ($view): void {
            $view->with('settings', Cache::remember('company_settings', 3600, function () {
                return CompanySetting::first() ?? new CompanySetting;
            }));
        });
    }
}
