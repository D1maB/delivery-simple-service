<?php

namespace App\Repositories;

abstract class BaseRepository{

    protected $model;

    /* TODO */

    ///// READ /////

    /**
     * @return mixed
     */
    public function all() {
        return $this->model->all();
    }

    public function find($id)
    {
        return $this->model::findOrFail($id);
    }

    public function findOneBy($data)
    {
        return $this->model::where($data)->firstOrFail();
    }

    public function get($fields = ['*'])
    {
        return $this->model::select($fields)->paginate();
    }

    ///// WRITE /////

    public function create($data)
    {
        $model = new $this->model();

        return $model->create($data);
    }

    public function update($id, $data)
    {
        $model = $this->find($id);

        return $model->update($data);
    }

    public function delete($id)
    {
        $model = $this->find($id);

        return $model->delete();
    }

}
