<?php
namespace App\Services;

use GuzzleHttp\Client;

class SoundCloudService
{
    protected $client;
    protected $clientId;

    public function __construct()
    {
        $this->client = new Client();
        $this->clientId = env('SOUNDCLOUD_CLIENT_ID');
    }

    public function getAllTracks()
    {
        $response = $this->client->get('https://api.soundcloud.com/tracks', [
            'query' => [
                'client_id' => $this->clientId
            ]
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }
}
?>