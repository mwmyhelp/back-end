<?php

namespace App\Providers;

use App\Models\Empresa\Cargo;
use App\Models\Empresa\Departamento;
use App\Models\File;
use App\Models\Hive\BeeConta;
use App\Observers\BeeContaObserver;
use App\Observers\CargoObserver;
use App\Observers\DepartamentoObserver;
use App\Observers\FileObserver;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\UrlGenerator;

class AppServiceProvider extends ServiceProvider
{
	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot(UrlGenerator $url)
	{
		Schema::defaultStringLength(190);
		BeeConta::observe(BeeContaObserver::class);
		File::observe(FileObserver::class);
        Departamento::observe(DepartamentoObserver::class);
        Cargo::observe(CargoObserver::class);

        if (config('app.env') !== 'local') {
            $url->forceScheme('https');
        }

        /**
         * Defaults HTTP Data Request
         */
        Http::withDefaultOptions(['verify' => false]); // Set verify default as false;

	}
}
