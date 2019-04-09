<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLogtypeRequest;
use App\Http\Requests\UpdateLogtypeRequest;
use App\Repositories\LogtypeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class LogtypeController extends AppBaseController
{
    /** @var  LogtypeRepository */
    private $logtypeRepository;

    public function __construct(LogtypeRepository $logtypeRepo)
    {
        $this->logtypeRepository = $logtypeRepo;
    }

    /**
     * Display a listing of the Logtype.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $logtypes = $this->logtypeRepository->paginate(10);

        return view('logtypes.index')
            ->with('logtypes', $logtypes);
    }

    /**
     * Show the form for creating a new Logtype.
     *
     * @return Response
     */
    public function create()
    {
        return view('logtypes.create');
    }

    /**
     * Store a newly created Logtype in storage.
     *
     * @param CreateLogtypeRequest $request
     *
     * @return Response
     */
    public function store(CreateLogtypeRequest $request)
    {
        $input = $request->all();

        $logtype = $this->logtypeRepository->create($input);

        Flash::success('Logtype saved successfully.');

        return redirect(route('logtypes.index'));
    }

    /**
     * Display the specified Logtype.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $logtype = $this->logtypeRepository->find($id);

        if (empty($logtype)) {
            Flash::error('Logtype not found');

            return redirect(route('logtypes.index'));
        }

        return view('logtypes.show')->with('logtype', $logtype);
    }

    /**
     * Show the form for editing the specified Logtype.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $logtype = $this->logtypeRepository->find($id);

        if (empty($logtype)) {
            Flash::error('Logtype not found');

            return redirect(route('logtypes.index'));
        }

        return view('logtypes.edit')->with('logtype', $logtype);
    }

    /**
     * Update the specified Logtype in storage.
     *
     * @param int $id
     * @param UpdateLogtypeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLogtypeRequest $request)
    {
        $logtype = $this->logtypeRepository->find($id);

        if (empty($logtype)) {
            Flash::error('Logtype not found');

            return redirect(route('logtypes.index'));
        }

        $logtype = $this->logtypeRepository->update($request->all(), $id);

        Flash::success('Logtype updated successfully.');

        return redirect(route('logtypes.index'));
    }

    /**
     * Remove the specified Logtype from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $logtype = $this->logtypeRepository->find($id);

        if (empty($logtype)) {
            Flash::error('Logtype not found');

            return redirect(route('logtypes.index'));
        }

        $this->logtypeRepository->delete($id);

        Flash::success('Logtype deleted successfully.');

        return redirect(route('logtypes.index'));
    }
}
