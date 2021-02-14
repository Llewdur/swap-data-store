<?php

namespace App\Repository\Csv;

use App\Repository\CsvRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class BaseRepository implements CsvRepositoryInterface
{
    public function create(array $attributes)
    {
        $attributes['id'] = date('ymdHis');
        $attributes['created_at'] = Carbon::now()->format('Y-m-d H:i:s');

        Storage::disk('local')->append('users.txt', json_encode($attributes));
        return collect($attributes)->toArray();
    }
}
