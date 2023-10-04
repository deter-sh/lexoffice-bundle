<?php

namespace DeterConsulting\LexofficeBundle\Service;

use GuzzleHttp\Client;
use Symfony\Component\DependencyInjection\Attribute\Autowire;

class LexofficeService
{
    public function __construct(
        #[Autowire(env: 'LEXOFFICE_API_KEY')]
        private string $apiKey,
    )
    {

    }

    protected function getClient(): Client
    {
        return new Client([
            'base_uri' => 'https://api.lexoffice.io/v1/',
            'headers' => [
                'Authentication' => 'Bearer ' . $this->apiKey,
                'Accept' => 'application/json',
            ],
            ''
        ]);
    }

    public function get(string $path, array $query = []): array
    {
        $response = $this->getClient()->get($path, [
            'query' => $query,
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }

    public function post(string $path, array $data = []): array
    {
        $response = $this->getClient()->post($path, [
            'json' => $data,
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }
}
