<?php

namespace Vanry\Seo;

use GuzzleHttp\Client;

class Seo
{
    protected $client;

    public function __construct(Client $client = null)
    {
        $this->client = $client ?: new Client;
    }

    public function getClient()
    {
        return $this->client;
    }

    public function setClient(Client $client)
    {
        $this->client = $client;

        return $this;
    }
}
