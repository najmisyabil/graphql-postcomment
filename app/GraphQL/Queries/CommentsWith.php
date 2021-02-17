<?php

namespace App\GraphQL\Queries;

use App\Models\Comment;

class CommentsWith
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        return Comment::where('body', 'LIKE', '%'.$args['search'].'%')->get();
    }
}
