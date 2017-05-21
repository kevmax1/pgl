<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateChapitreRequest;
use App\Http\Requests\UpdateChapitreRequest;
use App\Repositories\ChapitreRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ChapitreController extends AppBaseController
{
    /** @var  ChapitreRepository */
    private $chapitreRepository;

    public function __construct(ChapitreRepository $chapitreRepo)
    {
        $this->chapitreRepository = $chapitreRepo;
    }

    /**
     * Display a listing of the Chapitre.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->chapitreRepository->pushCriteria(new RequestCriteria($request));
        $chapitres = $this->chapitreRepository->all();

        return view('chapitres.index')
            ->with('chapitres', $chapitres);
    }

    /**
     * Show the form for creating a new Chapitre.
     *
     * @return Response
     */
    public function create()
    {
        return view('chapitres.create');
    }

    /**
     * Store a newly created Chapitre in storage.
     *
     * @param CreateChapitreRequest $request
     *
     * @return Response
     */
    public function store(CreateChapitreRequest $request)
    {
        $input = $request->all();

        $chapitre = $this->chapitreRepository->create($input);

        Flash::success('Chapitre saved successfully.');

        return redirect(route('chapitres.index'));
    }

    /**
     * Display the specified Chapitre.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $chapitre = $this->chapitreRepository->findWithoutFail($id);

        if (empty($chapitre)) {
            Flash::error('Chapitre not found');

            return redirect(route('chapitres.index'));
        }

        return view('chapitres.show')->with('chapitre', $chapitre);
    }

    /**
     * Show the form for editing the specified Chapitre.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $chapitre = $this->chapitreRepository->findWithoutFail($id);

        if (empty($chapitre)) {
            Flash::error('Chapitre not found');

            return redirect(route('chapitres.index'));
        }

        return view('chapitres.edit')->with('chapitre', $chapitre);
    }

    /**
     * Update the specified Chapitre in storage.
     *
     * @param  int              $id
     * @param UpdateChapitreRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateChapitreRequest $request)
    {
        $chapitre = $this->chapitreRepository->findWithoutFail($id);

        if (empty($chapitre)) {
            Flash::error('Chapitre not found');

            return redirect(route('chapitres.index'));
        }

        $chapitre = $this->chapitreRepository->update($request->all(), $id);

        Flash::success('Chapitre updated successfully.');

        return redirect(route('chapitres.index'));
    }

    /**
     * Remove the specified Chapitre from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $chapitre = $this->chapitreRepository->findWithoutFail($id);

        if (empty($chapitre)) {
            Flash::error('Chapitre not found');

            return redirect(route('chapitres.index'));
        }

        $this->chapitreRepository->delete($id);

        Flash::success('Chapitre deleted successfully.');

        return redirect(route('chapitres.index'));
    }
}
