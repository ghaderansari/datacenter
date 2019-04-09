<?php namespace Tests\Repositories;

use App\Models\Logtype;
use App\Repositories\LogtypeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\Traits\MakeLogtypeTrait;
use Tests\ApiTestTrait;

class LogtypeRepositoryTest extends TestCase
{
    use MakeLogtypeTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var LogtypeRepository
     */
    protected $logtypeRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->logtypeRepo = \App::make(LogtypeRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_logtype()
    {
        $logtype = $this->fakeLogtypeData();
        $createdLogtype = $this->logtypeRepo->create($logtype);
        $createdLogtype = $createdLogtype->toArray();
        $this->assertArrayHasKey('id', $createdLogtype);
        $this->assertNotNull($createdLogtype['id'], 'Created Logtype must have id specified');
        $this->assertNotNull(Logtype::find($createdLogtype['id']), 'Logtype with given id must be in DB');
        $this->assertModelData($logtype, $createdLogtype);
    }

    /**
     * @test read
     */
    public function test_read_logtype()
    {
        $logtype = $this->makeLogtype();
        $dbLogtype = $this->logtypeRepo->find($logtype->id);
        $dbLogtype = $dbLogtype->toArray();
        $this->assertModelData($logtype->toArray(), $dbLogtype);
    }

    /**
     * @test update
     */
    public function test_update_logtype()
    {
        $logtype = $this->makeLogtype();
        $fakeLogtype = $this->fakeLogtypeData();
        $updatedLogtype = $this->logtypeRepo->update($fakeLogtype, $logtype->id);
        $this->assertModelData($fakeLogtype, $updatedLogtype->toArray());
        $dbLogtype = $this->logtypeRepo->find($logtype->id);
        $this->assertModelData($fakeLogtype, $dbLogtype->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_logtype()
    {
        $logtype = $this->makeLogtype();
        $resp = $this->logtypeRepo->delete($logtype->id);
        $this->assertTrue($resp);
        $this->assertNull(Logtype::find($logtype->id), 'Logtype should not exist in DB');
    }
}
