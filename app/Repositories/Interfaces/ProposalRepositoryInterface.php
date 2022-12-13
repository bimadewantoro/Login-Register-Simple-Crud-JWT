<?php

namespace App\Repositories\Interfaces;

use LaravelEasyRepository\Repository;

interface ProposalRepositoryInterface extends Repository{

    /**
     * Get all proposals
     * @return mixed
     */
    public function getAllProposals();

    /**
     * Get proposal by id
     * @param $id
     * @return mixed
     */
    public function getProposalById($id);

    /**
     * Create new proposal
     * @param array $data
     * @return mixed
     */
    public function createProposal(array $data);

    /**
     * Update proposal by id
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function updateProposal(array $data, $id);

    /**
     * Delete proposal by id
     * @param $id
     * @return mixed
     */
    public function deleteProposal($id);
}
