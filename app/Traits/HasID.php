<?php

namespace App\Traits;

trait HasID
{
    public function getID($rawURL): ?string
    {
        $parsedUrl = parse_url($rawURL);
        if(array_key_exists('query', $parsedUrl) == false) return null;
        parse_str($parsedUrl['query'], $params);

        return $params['v'];
    }
}
