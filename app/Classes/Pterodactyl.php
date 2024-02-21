<?php

namespace App\Classes;


use Exception;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use App\Models\Settings;

class Pterodactyl
{

    /**
     * @return PendingRequest
     */
    public static function client()
    {
        return Http::withHeaders([
            'Authorization' => 'Bearer ' . Settings::getSetting('PterodactylAPIKey'),
            'Content-type' => 'application/json',
            'Accept' => 'Application/vnd.pterodactyl.v1+json',
        ])->baseUrl(Settings::getSetting('PterodactylURL') . '/api');
    }

    /**
     * @return Exception
     */
    private static function getException(string $message = '', int $status = 0): Exception
    {
        if ($status == 404) {
            return new Exception('Ressource does not exist on pterodactyl - ' . $message, 404);
        }

        if ($status == 403) {
            return new Exception('No permission on pterodactyl, check pterodactyl token and permissions - ' . $message, 403);
        }

        if ($status == 401) {
            return new Exception('No pterodactyl token set - ' . $message, 401);
        }

        if ($status == 500) {
            return new Exception('Pterodactyl server error - ' . $message, 500);
        }

        return new Exception('Request Failed, is pterodactyl set-up correctly? - ' . $message);
    }

}