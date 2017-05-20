<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSeanceCourRequest;
use App\Http\Requests\UpdateSeanceCourRequest;
use App\Repositories\SeanceCourRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class SeanceCourController extends AppBaseController
{
    /** @var  SeanceCourRepository */
    private $seanceCourRepository;

    public function __construct(SeanceCourRepository $seanceCourRepo)
    {
        $this->seanceCourRepository = $seanceCourRepo;
    }

    /**
     * Display a listing of the SeanceCour.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->seanceCourRepository->pushCriteria(new RequestCriteria($request));
        $seanceCours = $this->seanceCourRepository->all();

        return view('seance_cours.index')
            ->with('seanceCours', $seanceCours);
    }

    /**
     * Show the form for creating a new SeanceCour.
     *
     * @return Response
     */
    public function create()
    {
        return view('seance_cours.create');
    }

    /**
     * Store a newly created SeanceCour in storage.
     *
     * @param CreateSeanceCourRequest $request
     *
     * @return Response
     */
    public function store(CreateSeanceCourRequest $request)
    {
        $input = $request->all();

        $seanceCour = $this->seanceCourRepository->create($input);

        Flash::success('Seance Cour saved successfully.');

        return redirect(route('seanceCours.index'));
    }

    /**
     * Display the specified SeanceCour.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $seanceCour = $this->seanceCourRepository->findWithoutFail($id);

        if (empty($seanceCour)) {
            Flash::error('Seance Cour not found');

            return redirect(route('seanceCours.index'));
        }

        return view('seance_cours.show')->with('seanceCour', $seanceCour);
    }

    /**
     * Show the form for editing the specified SeanceCour.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $seanceCour = $this->seanceCourRepository->findWithoutFail($id);

        if (empty($seanceCour)) {
            Flash::error('Seance Cour not found');

            return redirect(route('seanceCours.index'));
        }

        return view('seance_cours.edit')->with('seanceCour', $seanceCour);
    }

    /**
     * Update the specified SeanceCour in storage.
     *
     * @param  int              $id
     * @param UpdateSeanceCourRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSeanceCourRequest $request)
    {
        $seanceCour = $this->seanceCourRepository->findWithoutFail($id);

        if (empty($seanceCour)) {
            Flash::error('Seance Cour not found');

            return redirect(route('seanceCours.index'));
        }

        $seanceCour = $this->seanceCourRepository->update($request->all(), $id);

        Flash::success('Seance Cour updated successfully.');

        return redirect(route('seanceCours.index'));
    }

    /**
     * Remove the specified SeanceCour from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $seanceCour = $this->seanceCourRepository->findWithoutFail($id);

        if (empty($seanceCour)) {
            Flash::error('Seance Cour not found');

            return redirect(route('seanceCours.index'));
        }

        $this->seanceCourRepository->delete($id);

        Flash::success('Seance Cour deleted successfully.');

        return redirect(route('seanceCours.index'));
    }
}
