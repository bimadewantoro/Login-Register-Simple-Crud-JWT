<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use App\Repositories\Eloquent\ProposalRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProposalController extends Controller
{
    /**
     * @var ProposalRepository
     */
    private $proposalRepository;

    /**
     * ProposalController constructor.
     * @param ProposalRepository $proposalRepository
     */
    public function __construct(ProposalRepository $proposalRepository)
    {
        $this->proposalRepository = $proposalRepository;
    }

    /**
     * Get all proposals
     * @method GET
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $proposals = $this->proposalRepository->getAllProposals();
        return response()->json([
            'success' => true,
            'message' => 'Daftar Semua Proposal',
            'data' => $proposals
        ], 200);
    }

    /**
     * Get proposal by id
     * @param $id
     * @method GET
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $proposal = $this->proposalRepository->getProposalById($id);
        if (!$proposal) {
            return response()->json([
                'success' => false,
                'message' => 'Proposal tidak ditemukan',
            ], 400);
        }
        return response()->json([
            'success' => true,
            'message' => 'Detail Proposal',
            'data' => $proposal
        ], 200);
    }

    /**
     * Create new proposal
     * @param Request $request
     * @method POST
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'judul' => 'required',
            'deskripsi' => 'required',
            'kategori' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first(),
            ], 400);
        }
        $user_id = auth()->user()->id;

        request()->merge(['user_id' => $user_id]);
        
        $proposal = $this->proposalRepository->createProposal(request()->all());
        return response()->json([
            'success' => true,
            'message' => 'Proposal berhasil dibuat',
            'data' => $proposal
        ], 200);
    }

    /**
     * Update proposal
     * @param Request $request
     * @param $id
     * @method PUT
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $proposal = $this->proposalRepository->getProposalById($id);
        if (!$proposal) {
            return response()->json([
                'success' => false,
                'message' => 'Proposal tidak ditemukan',
            ], 400);
        }

        $validator = Validator::make(request()->all(), [
            'judul' => 'required',
            'deskripsi' => 'required',
            'kategori' => 'required',
            'user_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first(),
            ], 400);
        }

        $proposal = $this->proposalRepository->updateProposal(request()->all(), $id);
        return response()->json([
            'success' => true,
            'message' => 'Proposal berhasil diupdate',
            'data' => $proposal
        ], 200);
    }

    /**
     * Delete proposal
     * @param $id
     * @method DELETE
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $proposal = $this->proposalRepository->getProposalById($id);
        if (!$proposal) {
            return response()->json([
                'success' => false,
                'message' => 'Proposal tidak ditemukan',
            ], 400);
        }

        $this->proposalRepository->deleteProposal($id);
        return response()->json([
            'success' => true,
            'message' => 'Proposal berhasil dihapus',
        ], 200);
    }
}
