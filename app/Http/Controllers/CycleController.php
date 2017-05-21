<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCycleRequest;
use App\Http\Requests\UpdateCycleRequest;
use App\Repositories\CycleRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CycleController extends AppBaseController
{
    /** @var  CycleRepository */
    private $cycleRepository;

    public function __construct(CycleRepository $cycleRepo)
    {
        $this->cycleRepository = $cycleRepo;
    }

    /**
     * Display a listing of the Cycle.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->cycleRepository->pushCriteria(new RequestCriteria($request));
        $cycles = $this->cycleRepository->all();

        return view('cycles.index')
            ->with('cycles', $cycles);
    }

    /**
     * Show the form for creating a new Cycle.
     *
     * @return Response
     */
    public function create()
    {
        return view('cycles.create');
    }

    /**
     * Store a newly created Cycle in storage.
     *
     * @param CreateCycleRequest $request
     *
     * @return Response
     */
    public function store(CreateCycleRequest $request)
    {
        $input = $request->all();

        $cycle = $this->cycleRepository->create($input);

        Flash::success('Cycle saved successfully.');

        return redirect(route('cycles.index'));
    }

    /**
     * Display the specified Cycle.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cycle = $this->cycleRepository->findWithoutFail($id);

        if (empty($cycle)) {
            Flash::error('Cycle not found');

            return redirect(route('cycles.index'));
        }

        return view('cycles.show')->with('cycle', $cycle);
    }

    /**
     * Show the form for editing the specified Cycle.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cycle = $this->cycleRepository->findWithoutFail($id);

        if (empty($cycle)) {
            Flash::error('Cycle not found');

            return redirect(route('cycles.index'));
        }

        return view('cycles.edit')->with('cycle', $cycle);
    }

    /**
     * Update the specified Cycle in storage.
     *
     * @param  int              $id
     * @param UpdateCycleRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCycleRequest $request)
    {
        $cycle = $this->cycleRepository->findWithoutFail($id);

        if (empty($cycle)) {
            Flash::error('Cycle not found');

            return redirect(route('cycles.index'));
        }

        $cycle = $this->cycleRepository->update($request->all(), $id);

        Flash::success('Cycle updated successfully.');

        return redirect(route('cycles.index'));
    }

    /**
     * Remove the specified Cycle from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cycle = $this->cycleRepository->findWithoutFail($id);

        if (empty($cycle)) {
            Flash::error('Cycle not found');

            return redirect(route('cycles.index'));
        }

        $this->cycleRepository->delete($id);

        Flash::success('Cycle deleted successfully.');

        return redirect(route('cycles.index'));
    }
}
