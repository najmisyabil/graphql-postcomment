<?php

namespace App\Http\Repositories;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PostRepository
{
    protected $url;

    /**
     * Initialize main url
     */
    public function __construct()
    {
        $this->url = 'https://jsonplaceholder.typicode.com/posts';
    }

    public function get()
    {
        return $this->tryGet($this->url);
    }

    private function tryGet(string $url)
    {
        try {
            $response = Http::get($url)->json();
        } catch (\Exception $e) {
            $response = [];

            Log::error('Failed to fetch Posts', ['message' => $e->getMessage()]);
        }

        return $response;
    }
}
