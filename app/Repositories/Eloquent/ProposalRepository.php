<?php

namespace App\Repositories\Eloquent;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Repositories\Interfaces\ProposalRepositoryInterface;
use App\Models\Proposal;

class ProposalRepository extends Eloquent implements ProposalRepositoryInterface{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    public function __construct(Proposal $model)
    {
        $this->model = $model;
    }

    /**
     * Get all proposals
     * @return mixed
     */
    public function getAllProposals()
    {
        return $this->model->all();
    }

    /**
     * Get proposal by id
     * @param $id
     * @return mixed
     */
    public function getProposalById($id)
    {
        return $this->model->
            where('id', $id)->
            first();
    }

    /**
     * Create new proposal
     * @param array $data
     * @return mixed
     */
    public function createProposal(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * Update proposal by id
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function updateProposal(array $data, $id)
    {
        return $this->model->
            where('id', $id)->
            update($data);
    }

    /**
     * Delete proposal by id
     * @param $id
     * @return mixed
     */
    public function deleteProposal($id)
    {
        return $this->model->
            where('id', $id)->
            delete();
    }
}
