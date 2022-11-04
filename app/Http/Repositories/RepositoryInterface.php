<?php

namespace App\Http\Repositories;

interface RepositoryInterface
{
    /**
     * @return mixed
     */
    function all();

    /**
     * @param $id
     * @return mixed
     */
    function get($id);

    /**
     * @param $request
     * @return mixed
     */
    function create($data, array $extra);

    /**
     * @param array $data
     * @param $id
     * @return mixed
     */
    function update($data, $id);

    /**
     * @param $id
     * @return mixed
     */
    function delete($id);

    /**
     * @param array $filter
     * @return mixed
     */
    function search($filter);
}
