<?php

namespace App\Repository\Csv;

use App\Repository\UserRepositoryInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function all(): Collection
    {
        $users = Storage::disk('local')->get('users.txt');
        $usersArray = explode(PHP_EOL, $users);

        return collect($usersArray)
            ->map(function ($row) {
                return json_decode($row, true);
            });
    }
}
