<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAnneeAcademiqueRequest;
use App\Http\Requests\UpdateAnneeAcademiqueRequest;
use App\Repositories\AnneeAcademiqueRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class AnneeAcademiqueController extends AppBaseController
{
    /** @var  AnneeAcademiqueRepository */
    private $anneeAcademiqueRepository;

    public function __construct(AnneeAcademiqueRepository $anneeAcademiqueRepo)
    {
        $this->anneeAcademiqueRepository = $anneeAcademiqueRepo;
    }

    /**
     * Display a listing of the AnneeAcademique.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->anneeAcademiqueRepository->pushCriteria(new RequestCriteria($request));
        $anneeAcademiques = $this->anneeAcademiqueRepository->all();

        return view('annee_academiques.index')
            ->with('anneeAcademiques', $anneeAcademiques);
    }

    /**
     * Show the form for creating a new AnneeAcademique.
     *
     * @return Response
     */
    public function create()
    {
        return view('annee_academiques.create');
    }

    /**
     * Store a newly created AnneeAcademique in storage.
     *
     * @param CreateAnneeAcademiqueRequest $request
     *
     * @return Response
     */
    public function store(CreateAnneeAcademiqueRequest $request)
    {
        $input = $request->all();

        $anneeAcademique = $this->anneeAcademiqueRepository->create($input);

        Flash::success('Annee Academique saved successfully.');

        return redirect(route('anneeAcademiques.index'));
    }

    /**
     * Display the specified AnneeAcademique.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $anneeAcademique = $this->anneeAcademiqueRepository->findWithoutFail($id);

        if (empty($anneeAcademique)) {
            Flash::error('Annee Academique not found');

            return redirect(route('anneeAcademiques.index'));
        }

        return view('annee_academiques.show')->with('anneeAcademique', $anneeAcademique);
    }

    /**
     * Show the form for editing the specified AnneeAcademique.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $anneeAcademique = $this->anneeAcademiqueRepository->findWithoutFail($id);

        if (empty($anneeAcademique)) {
            Flash::error('Annee Academique not found');

            return redirect(route('anneeAcademiques.index'));
        }

        return view('annee_academiques.edit')->with('anneeAcademique', $anneeAcademique);
    }

    /**
     * Update the specified AnneeAcademique in storage.
     *
     * @param  int              $id
     * @param UpdateAnneeAcademiqueRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAnneeAcademiqueRequest $request)
    {
        $anneeAcademique = $this->anneeAcademiqueRepository->findWithoutFail($id);

        if (empty($anneeAcademique)) {
            Flash::error('Annee Academique not found');

            return redirect(route('anneeAcademiques.index'));
        }

        $anneeAcademique = $this->anneeAcademiqueRepository->update($request->all(), $id);

        Flash::success('Annee Academique updated successfully.');

        return redirect(route('anneeAcademiques.index'));
    }

    /**
     * Remove the specified AnneeAcademique from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $anneeAcademique = $this->anneeAcademiqueRepository->findWithoutFail($id);

        if (empty($anneeAcademique)) {
            Flash::error('Annee Academique not found');

            return redirect(route('anneeAcademiques.index'));
        }

        $this->anneeAcademiqueRepository->delete($id);

        Flash::success('Annee Academique deleted successfully.');

        return redirect(route('anneeAcademiques.index'));
    }
}
