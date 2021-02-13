<?php

namespace App\Repository\Eloquent;

use App\Repository\EloquentRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements EloquentRepositoryInterface
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function paginate()
    {
        return $this->model->paginate();
    }

    public function create(array $attributes): Model
    {
        return $this->model->create($attributes);
    }

    public function find($id): ?Model
    {
        return $this->model->find($id);
    }

    public function findOrFail($id): ?Model
    {
        return $this->model->findOrFail($id);
    }

    public function store($attributes): Model
    {
        $this->model = $attributes;

        return $this->model->save();
    }
}
