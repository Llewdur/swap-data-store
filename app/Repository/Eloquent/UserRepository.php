<?php

namespace App\Repository\Eloquent;

class UserRepository extends BaseRepository
{
    public const RESPONSE_ARRAY = [
        'created_at',
        'email',
        'id',
        'name',
    ];
}
