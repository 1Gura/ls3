<?php


namespace App\Service;


class PushAll
{
    private string $apiKey;
    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }
}
