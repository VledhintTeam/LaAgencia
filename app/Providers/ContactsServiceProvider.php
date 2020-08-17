<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\ContactsService\ContactsService;

class ContactsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
	public function register()
	{
		$this->app->bind('App\Services\ContactsService\IContactsService', function(){
			return new ContactsService();
		});
	}

	public function provides()
	{
		return ['App\Services\ContactsService\IContactsService'];
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
