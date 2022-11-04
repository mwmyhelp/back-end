<?php

namespace App\Http\Repositories;


abstract class BaseRepository
//    implements RepositoryInterface
{

    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    /**
     * @inheritDoc
     */
    function all()
    {
        return $this->model->all();
    }

    /**
     * @inheritDoc
     */
    function get($id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * @inheritDoc
     */
    function create($data, array $extra = [])
    {
        $model = $this->model->create($data);

        if ($extra) {
            foreach ($extra as $key => $value) {
                $model->$key = $value;
            }
            $model->save();
        }

        return $model;
    }

    /**
     * @inheritDoc
     */
    function update($data, $id)
    {
        return $this->model->findOrFail($id)->update($data);
    }

    /**
     * @inheritDoc
     */
    function delete($id)
    {
        return $this->model->findOrFail($id)->delete();
    }

    /**
     * @inheritDoc
     */
    function search($filter, $paginate = false, $offset = 10)
    {
        if ($paginate) {
            return $this->model->where($filter)->paginate($offset);
        }

        return $this->model->where($filter)->get();

    }
}
