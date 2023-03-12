<?php

namespace App\Models\Authentication;

use Laravel\Passport\Client as PassportClient;

class BaseClient extends PassportClient
{
    /**
     * Determine if the client should skip the authorization prompt.
     */
    public function skipsAuthorization(): bool
    {
        return $this->firstParty();
    }
}