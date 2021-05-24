<?php

namespace App\Services\Crud;

abstract class CrudServiceBase
{
    protected $repository;

    public function __construct()
    {
        /*TODO*/

        $this->repository = $this->getRepository();
    }

    public function get(array $fields = ['*'])
    {
        return $this->repository->get($fields);
    }

    public function find($id)
    {
        return $this->repository->find($id);
    }

    public function create($data)
    {
        return $this->repository->create($data);
    }

    public function update($id, $data)
    {
        $model = $this->repository->find($id);

        $model->update($data);

        return $model;
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }

    abstract function repository();

    private function getRepository(){

        return resolve($this->repository());
    }
}
