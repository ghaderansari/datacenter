<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateLogtypeAPIRequest;
use App\Http\Requests\API\UpdateLogtypeAPIRequest;
use App\Models\Logtype;
use App\Repositories\LogtypeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class LogtypeController
 * @package App\Http\Controllers\API
 */

class LogtypeAPIController extends AppBaseController
{
    /** @var  LogtypeRepository */
    private $logtypeRepository;

    public function __construct(LogtypeRepository $logtypeRepo)
    {
        $this->logtypeRepository = $logtypeRepo;
    }

    /**
     * Display a listing of the Logtype.
     * GET|HEAD /logtypes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $logtypes = $this->logtypeRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($logtypes->toArray(), 'Logtypes retrieved successfully');
    }

    /**
     * Store a newly created Logtype in storage.
     * POST /logtypes
     *
     * @param CreateLogtypeAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateLogtypeAPIRequest $request)
    {
        $input = $request->all();

        $logtype = $this->logtypeRepository->create($input);

        return $this->sendResponse($logtype->toArray(), 'Logtype saved successfully');
    }

    /**
     * Display the specified Logtype.
     * GET|HEAD /logtypes/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Logtype $logtype */
        $logtype = $this->logtypeRepository->find($id);

        if (empty($logtype)) {
            return $this->sendError('Logtype not found');
        }

        return $this->sendResponse($logtype->toArray(), 'Logtype retrieved successfully');
    }

    /**
     * Update the specified Logtype in storage.
     * PUT/PATCH /logtypes/{id}
     *
     * @param int $id
     * @param UpdateLogtypeAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLogtypeAPIRequest $request)
    {
        $input = $request->all();

        /** @var Logtype $logtype */
        $logtype = $this->logtypeRepository->find($id);

        if (empty($logtype)) {
            return $this->sendError('Logtype not found');
        }

        $logtype = $this->logtypeRepository->update($input, $id);

        return $this->sendResponse($logtype->toArray(), 'Logtype updated successfully');
    }

    /**
     * Remove the specified Logtype from storage.
     * DELETE /logtypes/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Logtype $logtype */
        $logtype = $this->logtypeRepository->find($id);

        if (empty($logtype)) {
            return $this->sendError('Logtype not found');
        }

        $logtype->delete();

        return $this->sendResponse($id, 'Logtype deleted successfully');
    }
}
