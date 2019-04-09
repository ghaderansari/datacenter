<?php namespace Tests\Repositories;

use App\Models\Ostype;
use App\Repositories\OstypeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\Traits\MakeOstypeTrait;
use Tests\ApiTestTrait;

class OstypeRepositoryTest extends TestCase
{
    use MakeOstypeTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var OstypeRepository
     */
    protected $ostypeRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->ostypeRepo = \App::make(OstypeRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_ostype()
    {
        $ostype = $this->fakeOstypeData();
        $createdOstype = $this->ostypeRepo->create($ostype);
        $createdOstype = $createdOstype->toArray();
        $this->assertArrayHasKey('id', $createdOstype);
        $this->assertNotNull($createdOstype['id'], 'Created Ostype must have id specified');
        $this->assertNotNull(Ostype::find($createdOstype['id']), 'Ostype with given id must be in DB');
        $this->assertModelData($ostype, $createdOstype);
    }

    /**
     * @test read
     */
    public function test_read_ostype()
    {
        $ostype = $this->makeOstype();
        $dbOstype = $this->ostypeRepo->find($ostype->id);
        $dbOstype = $dbOstype->toArray();
        $this->assertModelData($ostype->toArray(), $dbOstype);
    }

    /**
     * @test update
     */
    public function test_update_ostype()
    {
        $ostype = $this->makeOstype();
        $fakeOstype = $this->fakeOstypeData();
        $updatedOstype = $this->ostypeRepo->update($fakeOstype, $ostype->id);
        $this->assertModelData($fakeOstype, $updatedOstype->toArray());
        $dbOstype = $this->ostypeRepo->find($ostype->id);
        $this->assertModelData($fakeOstype, $dbOstype->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_ostype()
    {
        $ostype = $this->makeOstype();
        $resp = $this->ostypeRepo->delete($ostype->id);
        $this->assertTrue($resp);
        $this->assertNull(Ostype::find($ostype->id), 'Ostype should not exist in DB');
    }
}
