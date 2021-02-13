<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Model;

/**
 * Interface EloquentRepositoryInterface.
 */
interface EloquentRepositoryInterface
{
    public function create(array $attributes): Model;

    public function find($id);

    public function store($attributes);
}
