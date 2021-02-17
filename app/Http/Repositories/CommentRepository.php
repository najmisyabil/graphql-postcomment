<?php

namespace App\Http\Repositories;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class CommentRepository
{
    protected $url;

    /**
     * Initialize main url
     */
    public function __construct()
    {
        $this->url = 'https://jsonplaceholder.typicode.com/comments';
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

            Log::error('Failed to fetch Comments', ['message' => $e->getMessage()]);
        }

        return $response;
    }
}
