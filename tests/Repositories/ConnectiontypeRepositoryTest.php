<?php namespace Tests\Repositories;

use App\Models\Connectiontype;
use App\Repositories\ConnectiontypeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\Traits\MakeConnectiontypeTrait;
use Tests\ApiTestTrait;

class ConnectiontypeRepositoryTest extends TestCase
{
    use MakeConnectiontypeTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ConnectiontypeRepository
     */
    protected $connectiontypeRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->connectiontypeRepo = \App::make(ConnectiontypeRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_connectiontype()
    {
        $connectiontype = $this->fakeConnectiontypeData();
        $createdConnectiontype = $this->connectiontypeRepo->create($connectiontype);
        $createdConnectiontype = $createdConnectiontype->toArray();
        $this->assertArrayHasKey('id', $createdConnectiontype);
        $this->assertNotNull($createdConnectiontype['id'], 'Created Connectiontype must have id specified');
        $this->assertNotNull(Connectiontype::find($createdConnectiontype['id']), 'Connectiontype with given id must be in DB');
        $this->assertModelData($connectiontype, $createdConnectiontype);
    }

    /**
     * @test read
     */
    public function test_read_connectiontype()
    {
        $connectiontype = $this->makeConnectiontype();
        $dbConnectiontype = $this->connectiontypeRepo->find($connectiontype->id);
        $dbConnectiontype = $dbConnectiontype->toArray();
        $this->assertModelData($connectiontype->toArray(), $dbConnectiontype);
    }

    /**
     * @test update
     */
    public function test_update_connectiontype()
    {
        $connectiontype = $this->makeConnectiontype();
        $fakeConnectiontype = $this->fakeConnectiontypeData();
        $updatedConnectiontype = $this->connectiontypeRepo->update($fakeConnectiontype, $connectiontype->id);
        $this->assertModelData($fakeConnectiontype, $updatedConnectiontype->toArray());
        $dbConnectiontype = $this->connectiontypeRepo->find($connectiontype->id);
        $this->assertModelData($fakeConnectiontype, $dbConnectiontype->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_connectiontype()
    {
        $connectiontype = $this->makeConnectiontype();
        $resp = $this->connectiontypeRepo->delete($connectiontype->id);
        $this->assertTrue($resp);
        $this->assertNull(Connectiontype::find($connectiontype->id), 'Connectiontype should not exist in DB');
    }
}
