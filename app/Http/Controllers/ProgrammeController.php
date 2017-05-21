<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProgrammeRequest;
use App\Http\Requests\UpdateProgrammeRequest;
use App\Repositories\ProgrammeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ProgrammeController extends AppBaseController
{
    /** @var  ProgrammeRepository */
    private $programmeRepository;

    public function __construct(ProgrammeRepository $programmeRepo)
    {
        $this->programmeRepository = $programmeRepo;
    }

    /**
     * Display a listing of the Programme.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->programmeRepository->pushCriteria(new RequestCriteria($request));
        $programmes = $this->programmeRepository->all();

        return view('programmes.index')
            ->with('programmes', $programmes);
    }

    /**
     * Show the form for creating a new Programme.
     *
     * @return Response
     */
    public function create()
    {
        return view('programmes.create');
    }

    /**
     * Store a newly created Programme in storage.
     *
     * @param CreateProgrammeRequest $request
     *
     * @return Response
     */
    public function store(CreateProgrammeRequest $request)
    {
        $input = $request->all();

        $programme = $this->programmeRepository->create($input);

        Flash::success('Programme saved successfully.');

        return redirect(route('programmes.index'));
    }

    /**
     * Display the specified Programme.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $programme = $this->programmeRepository->findWithoutFail($id);

        if (empty($programme)) {
            Flash::error('Programme not found');

            return redirect(route('programmes.index'));
        }

        return view('programmes.show')->with('programme', $programme);
    }

    /**
     * Show the form for editing the specified Programme.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $programme = $this->programmeRepository->findWithoutFail($id);

        if (empty($programme)) {
            Flash::error('Programme not found');

            return redirect(route('programmes.index'));
        }

        return view('programmes.edit')->with('programme', $programme);
    }

    /**
     * Update the specified Programme in storage.
     *
     * @param  int              $id
     * @param UpdateProgrammeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProgrammeRequest $request)
    {
        $programme = $this->programmeRepository->findWithoutFail($id);

        if (empty($programme)) {
            Flash::error('Programme not found');

            return redirect(route('programmes.index'));
        }

        $programme = $this->programmeRepository->update($request->all(), $id);

        Flash::success('Programme updated successfully.');

        return redirect(route('programmes.index'));
    }

    /**
     * Remove the specified Programme from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $programme = $this->programmeRepository->findWithoutFail($id);

        if (empty($programme)) {
            Flash::error('Programme not found');

            return redirect(route('programmes.index'));
        }

        $this->programmeRepository->delete($id);

        Flash::success('Programme deleted successfully.');

        return redirect(route('programmes.index'));
    }
}
