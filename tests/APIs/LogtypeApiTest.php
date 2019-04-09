<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\Traits\MakeLogtypeTrait;
use Tests\ApiTestTrait;

class LogtypeApiTest extends TestCase
{
    use MakeLogtypeTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_logtype()
    {
        $logtype = $this->fakeLogtypeData();
        $this->response = $this->json('POST', '/api/logtypes', $logtype);

        $this->assertApiResponse($logtype);
    }

    /**
     * @test
     */
    public function test_read_logtype()
    {
        $logtype = $this->makeLogtype();
        $this->response = $this->json('GET', '/api/logtypes/'.$logtype->id);

        $this->assertApiResponse($logtype->toArray());
    }

    /**
     * @test
     */
    public function test_update_logtype()
    {
        $logtype = $this->makeLogtype();
        $editedLogtype = $this->fakeLogtypeData();

        $this->response = $this->json('PUT', '/api/logtypes/'.$logtype->id, $editedLogtype);

        $this->assertApiResponse($editedLogtype);
    }

    /**
     * @test
     */
    public function test_delete_logtype()
    {
        $logtype = $this->makeLogtype();
        $this->response = $this->json('DELETE', '/api/logtypes/'.$logtype->id);

        $this->assertApiSuccess();
        $this->response = $this->json('GET', '/api/logtypes/'.$logtype->id);

        $this->response->assertStatus(404);
    }
}
