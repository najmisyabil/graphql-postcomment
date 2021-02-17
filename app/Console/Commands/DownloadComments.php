<?php

namespace App\Console\Commands;

use Exception;
use App\Models\Comment;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use App\Http\Repositories\CommentRepository;

class DownloadComments extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'comments:download';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to get the latest comments from the third api';

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
    public function handle(CommentRepository $repo)
    {
        $comments = $repo->get();

        if (empty($comments))
            return 400;

        $extraId = count($comments) + 1;

        // Rename postId to be post_id before updating
        foreach ($comments as &$comment) {
            $comment['post_id'] = $comment['postId'] ?? $extraId++;
            unset($comment['postId']);

            try {
                Comment::updateOrCreate(['id' => $comment['id']], $comment);
            } catch (Exception $e) {
                Log::error(
                    'Failed to update comment during download',
                    ['message' => $e->getMessage()]
                );
            }
        }

        return 0;
    }
}
