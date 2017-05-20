<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSequenceRequest;
use App\Http\Requests\UpdateSequenceRequest;
use App\Repositories\SequenceRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class SequenceController extends AppBaseController
{
    /** @var  SequenceRepository */
    private $sequenceRepository;

    public function __construct(SequenceRepository $sequenceRepo)
    {
        $this->sequenceRepository = $sequenceRepo;
    }

    /**
     * Display a listing of the Sequence.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->sequenceRepository->pushCriteria(new RequestCriteria($request));
        $sequences = $this->sequenceRepository->all();

        return view('sequences.index')
            ->with('sequences', $sequences);
    }

    /**
     * Show the form for creating a new Sequence.
     *
     * @return Response
     */
    public function create()
    {
        return view('sequences.create');
    }

    /**
     * Store a newly created Sequence in storage.
     *
     * @param CreateSequenceRequest $request
     *
     * @return Response
     */
    public function store(CreateSequenceRequest $request)
    {
        $input = $request->all();

        $sequence = $this->sequenceRepository->create($input);

        Flash::success('Sequence saved successfully.');

        return redirect(route('sequences.index'));
    }

    /**
     * Display the specified Sequence.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $sequence = $this->sequenceRepository->findWithoutFail($id);

        if (empty($sequence)) {
            Flash::error('Sequence not found');

            return redirect(route('sequences.index'));
        }

        return view('sequences.show')->with('sequence', $sequence);
    }

    /**
     * Show the form for editing the specified Sequence.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $sequence = $this->sequenceRepository->findWithoutFail($id);

        if (empty($sequence)) {
            Flash::error('Sequence not found');

            return redirect(route('sequences.index'));
        }

        return view('sequences.edit')->with('sequence', $sequence);
    }

    /**
     * Update the specified Sequence in storage.
     *
     * @param  int              $id
     * @param UpdateSequenceRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSequenceRequest $request)
    {
        $sequence = $this->sequenceRepository->findWithoutFail($id);

        if (empty($sequence)) {
            Flash::error('Sequence not found');

            return redirect(route('sequences.index'));
        }

        $sequence = $this->sequenceRepository->update($request->all(), $id);

        Flash::success('Sequence updated successfully.');

        return redirect(route('sequences.index'));
    }

    /**
     * Remove the specified Sequence from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $sequence = $this->sequenceRepository->findWithoutFail($id);

        if (empty($sequence)) {
            Flash::error('Sequence not found');

            return redirect(route('sequences.index'));
        }

        $this->sequenceRepository->delete($id);

        Flash::success('Sequence deleted successfully.');

        return redirect(route('sequences.index'));
    }
}
