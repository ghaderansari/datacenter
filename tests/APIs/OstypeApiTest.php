<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\Traits\MakeOstypeTrait;
use Tests\ApiTestTrait;

class OstypeApiTest extends TestCase
{
    use MakeOstypeTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_ostype()
    {
        $ostype = $this->fakeOstypeData();
        $this->response = $this->json('POST', '/api/ostypes', $ostype);

        $this->assertApiResponse($ostype);
    }

    /**
     * @test
     */
    public function test_read_ostype()
    {
        $ostype = $this->makeOstype();
        $this->response = $this->json('GET', '/api/ostypes/'.$ostype->id);

        $this->assertApiResponse($ostype->toArray());
    }

    /**
     * @test
     */
    public function test_update_ostype()
    {
        $ostype = $this->makeOstype();
        $editedOstype = $this->fakeOstypeData();

        $this->response = $this->json('PUT', '/api/ostypes/'.$ostype->id, $editedOstype);

        $this->assertApiResponse($editedOstype);
    }

    /**
     * @test
     */
    public function test_delete_ostype()
    {
        $ostype = $this->makeOstype();
        $this->response = $this->json('DELETE', '/api/ostypes/'.$ostype->id);

        $this->assertApiSuccess();
        $this->response = $this->json('GET', '/api/ostypes/'.$ostype->id);

        $this->response->assertStatus(404);
    }
}
