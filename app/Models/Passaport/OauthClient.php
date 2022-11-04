<?php
namespace App\Models\Passaport;

use Laravel\Passport\Client as BaseClient;

class OauthClient extends BaseClient
{
	/**
	 * Skips the Authorization to OAuth
	 */
	public function skipsAuthorization()
	{
		return true;
	}
}
