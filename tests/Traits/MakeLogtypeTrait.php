<?php namespace Tests\Traits;

use Faker\Factory as Faker;
use App\Models\Logtype;
use App\Repositories\LogtypeRepository;

trait MakeLogtypeTrait
{
    /**
     * Create fake instance of Logtype and save it in database
     *
     * @param array $logtypeFields
     * @return Logtype
     */
    public function makeLogtype($logtypeFields = [])
    {
        /** @var LogtypeRepository $logtypeRepo */
        $logtypeRepo = \App::make(LogtypeRepository::class);
        $theme = $this->fakeLogtypeData($logtypeFields);
        return $logtypeRepo->create($theme);
    }

    /**
     * Get fake instance of Logtype
     *
     * @param array $logtypeFields
     * @return Logtype
     */
    public function fakeLogtype($logtypeFields = [])
    {
        return new Logtype($this->fakeLogtypeData($logtypeFields));
    }

    /**
     * Get fake data of Logtype
     *
     * @param array $logtypeFields
     * @return array
     */
    public function fakeLogtypeData($logtypeFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'title' => $fake->word,
            'status' => $fake->word,
            'desc' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s')
        ], $logtypeFields);
    }
}
