<?php

namespace App\Providers;

use App\Models\Passaport\OauthClient;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
	/**
	 * The policy mappings for the application.
	 *
	 * @var array
	 */
	protected $policies = [
		// 'App\Models\Model' => 'App\Policies\ModelPolicy',
	];

	/**
	 * Register any authentication / authorization services.
	 *
	 * @return void
	 */
	public function boot()
	{
        // What?
		$this->registerPolicies();

        /**
         * We need to config some changes on default passport behavior
         */
        // Set the prefix for the v1 routes
		Passport::routes(null, [
			'prefix' => 'api/oauth'
		]);
        // Set the client model (to skip the Authorization)
		Passport::useClientModel(OauthClient::class);
        // Set the Token Expiration to One Hour
		Passport::tokensExpireIn(now()->addHour(8));
        // Set the Refresh Token to Expire in 1 Day
		Passport::refreshTokensExpireIn(now()->addDays(1));
		// Set the Personal Tokens to Expire in 1 Hour
        Passport::personalAccessTokensExpireIn(now()->addHour(1));

	}
}
