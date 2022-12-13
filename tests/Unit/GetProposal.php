<?php

namespace Tests\Unit;

use App\Models\Proposal;
use PHPUnit\Framework\TestCase;

class GetProposal extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }

    public function test_get_proposal()
    {
        $proposal = Proposal::find(1);

        $this->assertNotNull($proposal);
    }

    public function test_get_proposal_by_id()
    {
        $proposal = Proposal::find(1);

        $this->assertEquals(1, $proposal->id);
    }
}
