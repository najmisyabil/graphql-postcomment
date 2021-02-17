<?php

namespace App\Console\Commands;

use Exception;
use App\Models\Post;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use App\Http\Repositories\PostRepository;

class DownloadPosts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'posts:download';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to get the latest posts from the third api';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(PostRepository $repo)
    {
        $posts = $repo->get();

        if (empty($posts))
            return 400;

        $extraId = count($posts) + 1;

        // Rename userId to be user_id before updating
        foreach ($posts as &$post) {
            $post['user_id'] = $post['userId'] ?? $extraId++;
            unset($post['userId']);

            try {
                Post::updateOrCreate(['id' => $post['id']], $post);
            } catch (Exception $e) {
                Log::error(
                    'Failed to update post during download',
                    ['message' => $e->getMessage()]
                );
            }
        }

        return 0;
    }
}
