<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\Traits\MakeVmtypeTrait;
use Tests\ApiTestTrait;

class VmtypeApiTest extends TestCase
{
    use MakeVmtypeTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_vmtype()
    {
        $vmtype = $this->fakeVmtypeData();
        $this->response = $this->json('POST', '/api/vmtypes', $vmtype);

        $this->assertApiResponse($vmtype);
    }

    /**
     * @test
     */
    public function test_read_vmtype()
    {
        $vmtype = $this->makeVmtype();
        $this->response = $this->json('GET', '/api/vmtypes/'.$vmtype->id);

        $this->assertApiResponse($vmtype->toArray());
    }

    /**
     * @test
     */
    public function test_update_vmtype()
    {
        $vmtype = $this->makeVmtype();
        $editedVmtype = $this->fakeVmtypeData();

        $this->response = $this->json('PUT', '/api/vmtypes/'.$vmtype->id, $editedVmtype);

        $this->assertApiResponse($editedVmtype);
    }

    /**
     * @test
     */
    public function test_delete_vmtype()
    {
        $vmtype = $this->makeVmtype();
        $this->response = $this->json('DELETE', '/api/vmtypes/'.$vmtype->id);

        $this->assertApiSuccess();
        $this->response = $this->json('GET', '/api/vmtypes/'.$vmtype->id);

        $this->response->assertStatus(404);
    }
}
