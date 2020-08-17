<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\UploadService\UploadService;

class UploadServiceProvider extends ServiceProvider
{
	/**
	 * Register services.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind('App\Services\UploadService\IUploadService', function(){
			return new UploadService();
		});
	}

	public function provides()
	{
		return ['App\Services\UploadService\IUploadService'];
	}


	/**
	 * Bootstrap services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}
}
