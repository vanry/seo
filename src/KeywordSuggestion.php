<?php

namespace Vanry\Seo;

use GuzzleHttp\Exception\GuzzleException;

class KeywordSuggestion extends Seo
{
    const API = 'https://suggestion.baidu.com/su';

    public function suggest($keyword)
    {
        try {
            $response = $this->client->get(static::API, [
                'query' => [
                    'wd' => $keyword,
                    'ie' => 'utf-8',
                    'json' => 1,
                ],
            ]);

            $json = mb_substr((string) $response->getBody(), 17, -2);

            return [
                'keywords' => json_decode($json, true)['s'] ?? [],
            ];
        } catch (GuzzleException $e) {
            return [
                'error' => [
                    'code' => $e->getCode(),
                    'message' => $e->getMessage(),
                ],
            ];
        }
    }
}
