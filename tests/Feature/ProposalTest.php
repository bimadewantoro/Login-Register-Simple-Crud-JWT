<?php

namespace Tests\Feature;

use App\Models\Proposal;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProposalTest extends TestCase
{
    private function authorize()
    {
        $user = User::factory()->create();
        $token = auth()->login($user);

        $this->withHeader('Authorization', 'Bearer ' . $token);
    }

    public function testCreateProposal ()
    {
        $this->authorize();

        $proposal = Proposal::factory()->create();

        $response = $this->post('/api/proposal/create', [
            'judul' => $proposal->judul,
            'deskripsi' => $proposal->deskripsi,
            'kategori' => $proposal->kategori,
        ]);

        $response->assertStatus(200);
    }

    public function testGetProposal ()
    {
        $this->authorize();

        $response = $this->get('/api/proposal');

        $response->assertStatus(200);
    }

    public function testGetProposalbyId ()
    {
        $this->authorize();

        $proposal = Proposal::factory()->create();

        $response = $this->get('/api/proposal/' . $proposal->id);

        $response->assertStatus(200);
    }
}
