<?php

namespace App\Services;

abstract class BaseService
{
    //repository muốn tương tác
    protected $repository;

    //khởi tạo
    public function __construct()
    {
        $this->setRepository();
    }

    //lấy repository tương ứng
    abstract public function getRepository();

    /**
     * Set repository
     */
    public function setRepository()
    {
        $this->repository = app()->make(
            $this->getRepository()
        );
    }
    
    public function create($attributes = [])
    {
        return $this->repository->create($attributes);
    }

    public function getAll()
    {
        return $this->repository->getAll();
    }

    public function find($id)
    {
        return $this->repository->find($id);
    }
}