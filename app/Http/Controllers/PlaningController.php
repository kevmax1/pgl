<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePlaningRequest;
use App\Http\Requests\UpdatePlaningRequest;
use App\Repositories\PlaningRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PlaningController extends AppBaseController
{
    /** @var  PlaningRepository */
    private $planingRepository;

    public function __construct(PlaningRepository $planingRepo)
    {
        $this->planingRepository = $planingRepo;
    }

    /**
     * Display a listing of the Planing.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->planingRepository->pushCriteria(new RequestCriteria($request));
        $planings = $this->planingRepository->all();

        return view('planings.index')
            ->with('planings', $planings);
    }

    /**
     * Show the form for creating a new Planing.
     *
     * @return Response
     */
    public function create()
    {
        return view('planings.create');
    }

    /**
     * Store a newly created Planing in storage.
     *
     * @param CreatePlaningRequest $request
     *
     * @return Response
     */
    public function store(CreatePlaningRequest $request)
    {
        $input = $request->all();

        $planing = $this->planingRepository->create($input);

        Flash::success('Planing saved successfully.');

        return redirect(route('planings.index'));
    }

    /**
     * Display the specified Planing.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $planing = $this->planingRepository->findWithoutFail($id);

        if (empty($planing)) {
            Flash::error('Planing not found');

            return redirect(route('planings.index'));
        }

        return view('planings.show')->with('planing', $planing);
    }

    /**
     * Show the form for editing the specified Planing.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $planing = $this->planingRepository->findWithoutFail($id);

        if (empty($planing)) {
            Flash::error('Planing not found');

            return redirect(route('planings.index'));
        }

        return view('planings.edit')->with('planing', $planing);
    }

    /**
     * Update the specified Planing in storage.
     *
     * @param  int              $id
     * @param UpdatePlaningRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePlaningRequest $request)
    {
        $planing = $this->planingRepository->findWithoutFail($id);

        if (empty($planing)) {
            Flash::error('Planing not found');

            return redirect(route('planings.index'));
        }

        $planing = $this->planingRepository->update($request->all(), $id);

        Flash::success('Planing updated successfully.');

        return redirect(route('planings.index'));
    }

    /**
     * Remove the specified Planing from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $planing = $this->planingRepository->findWithoutFail($id);

        if (empty($planing)) {
            Flash::error('Planing not found');

            return redirect(route('planings.index'));
        }

        $this->planingRepository->delete($id);

        Flash::success('Planing deleted successfully.');

        return redirect(route('planings.index'));
    }
}
