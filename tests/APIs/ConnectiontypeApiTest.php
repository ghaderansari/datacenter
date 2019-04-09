<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\Traits\MakeConnectiontypeTrait;
use Tests\ApiTestTrait;

class ConnectiontypeApiTest extends TestCase
{
    use MakeConnectiontypeTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_connectiontype()
    {
        $connectiontype = $this->fakeConnectiontypeData();
        $this->response = $this->json('POST', '/api/connectiontypes', $connectiontype);

        $this->assertApiResponse($connectiontype);
    }

    /**
     * @test
     */
    public function test_read_connectiontype()
    {
        $connectiontype = $this->makeConnectiontype();
        $this->response = $this->json('GET', '/api/connectiontypes/'.$connectiontype->id);

        $this->assertApiResponse($connectiontype->toArray());
    }

    /**
     * @test
     */
    public function test_update_connectiontype()
    {
        $connectiontype = $this->makeConnectiontype();
        $editedConnectiontype = $this->fakeConnectiontypeData();

        $this->response = $this->json('PUT', '/api/connectiontypes/'.$connectiontype->id, $editedConnectiontype);

        $this->assertApiResponse($editedConnectiontype);
    }

    /**
     * @test
     */
    public function test_delete_connectiontype()
    {
        $connectiontype = $this->makeConnectiontype();
        $this->response = $this->json('DELETE', '/api/connectiontypes/'.$connectiontype->id);

        $this->assertApiSuccess();
        $this->response = $this->json('GET', '/api/connectiontypes/'.$connectiontype->id);

        $this->response->assertStatus(404);
    }
}
