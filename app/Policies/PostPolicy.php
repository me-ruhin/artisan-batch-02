<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    public function view($user, $post): bool
    {
         return $user['id'] == $post['user_id'];
    }

    public function delete($user, $post): bool
    {
         return $user['id'] == $post['user_id'];
    }
}
