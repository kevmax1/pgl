<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateGrandTitreRequest;
use App\Http\Requests\UpdateGrandTitreRequest;
use App\Repositories\GrandTitreRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class GrandTitreController extends AppBaseController
{
    /** @var  GrandTitreRepository */
    private $grandTitreRepository;

    public function __construct(GrandTitreRepository $grandTitreRepo)
    {
        $this->grandTitreRepository = $grandTitreRepo;
    }

    /**
     * Display a listing of the GrandTitre.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->grandTitreRepository->pushCriteria(new RequestCriteria($request));
        $grandTitres = $this->grandTitreRepository->all();

        return view('grand_titres.index')
            ->with('grandTitres', $grandTitres);
    }

    /**
     * Show the form for creating a new GrandTitre.
     *
     * @return Response
     */
    public function create()
    {
        return view('grand_titres.create');
    }

    /**
     * Store a newly created GrandTitre in storage.
     *
     * @param CreateGrandTitreRequest $request
     *
     * @return Response
     */
    public function store(CreateGrandTitreRequest $request)
    {
        $input = $request->all();

        $grandTitre = $this->grandTitreRepository->create($input);

        Flash::success('Grand Titre saved successfully.');

        return redirect(route('grandTitres.index'));
    }

    /**
     * Display the specified GrandTitre.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $grandTitre = $this->grandTitreRepository->findWithoutFail($id);

        if (empty($grandTitre)) {
            Flash::error('Grand Titre not found');

            return redirect(route('grandTitres.index'));
        }

        return view('grand_titres.show')->with('grandTitre', $grandTitre);
    }

    /**
     * Show the form for editing the specified GrandTitre.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $grandTitre = $this->grandTitreRepository->findWithoutFail($id);

        if (empty($grandTitre)) {
            Flash::error('Grand Titre not found');

            return redirect(route('grandTitres.index'));
        }

        return view('grand_titres.edit')->with('grandTitre', $grandTitre);
    }

    /**
     * Update the specified GrandTitre in storage.
     *
     * @param  int              $id
     * @param UpdateGrandTitreRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateGrandTitreRequest $request)
    {
        $grandTitre = $this->grandTitreRepository->findWithoutFail($id);

        if (empty($grandTitre)) {
            Flash::error('Grand Titre not found');

            return redirect(route('grandTitres.index'));
        }

        $grandTitre = $this->grandTitreRepository->update($request->all(), $id);

        Flash::success('Grand Titre updated successfully.');

        return redirect(route('grandTitres.index'));
    }

    /**
     * Remove the specified GrandTitre from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $grandTitre = $this->grandTitreRepository->findWithoutFail($id);

        if (empty($grandTitre)) {
            Flash::error('Grand Titre not found');

            return redirect(route('grandTitres.index'));
        }

        $this->grandTitreRepository->delete($id);

        Flash::success('Grand Titre deleted successfully.');

        return redirect(route('grandTitres.index'));
    }
}
