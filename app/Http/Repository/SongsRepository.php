<?php
namespace App\Http\Repository;

use App\Model\SongsModel;

class SongsRepository
{
    /**
     * @var SongsModel
     */
    protected $model;

    /**
     * SongsRepository constructor.
     */
    public function __construct()
    {
        $this->model = app(SongsModel::class);
    }

    /**
     * @param $filter
     * @return mixed
     */
    public function all($filter)
    {
        $query = $this->model;

        if (isset($filter['ordered']) && $filter['ordered'] == 'asc') {
            $query = $query->orderBy('id');
        }

        if (isset($filter['ordered']) && $filter['ordered'] == 'desc') {
            $query = $query->orderBy('id', 'desc');
        }

        if (isset($filter['limit']) && (int)$filter['limit']) {
            $query = $query->limit($filter['limit']);
        }

        return $query->get();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        return $this->model->where('id', $id)->first();
    }

    /**
     * @param $data
     * @return mixed
     */
    public function create($data)
    {
        return $this->model->create($data);
    }

    /**
     * @param $id
     * @param $data
     * @return mixed
     */
    public function update($id, $data)
    {
        return $this->show($id)->update($data);
    }
}