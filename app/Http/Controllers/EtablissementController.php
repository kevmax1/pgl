<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEtablissementRequest;
use App\Http\Requests\UpdateEtablissementRequest;
use App\Repositories\EtablissementRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class EtablissementController extends AppBaseController
{
    /** @var  EtablissementRepository */
    private $etablissementRepository;

    public function __construct(EtablissementRepository $etablissementRepo)
    {
        $this->etablissementRepository = $etablissementRepo;
    }

    /**
     * Display a listing of the Etablissement.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->etablissementRepository->pushCriteria(new RequestCriteria($request));
        $etablissements = $this->etablissementRepository->all();

        return view('etablissements.index')
            ->with('etablissements', $etablissements);
    }

    /**
     * Show the form for creating a new Etablissement.
     *
     * @return Response
     */
    public function create()
    {
        return view('etablissements.create');
    }

    /**
     * Store a newly created Etablissement in storage.
     *
     * @param CreateEtablissementRequest $request
     *
     * @return Response
     */
    public function store(CreateEtablissementRequest $request)
    {
        $input = $request->all();

        $etablissement = $this->etablissementRepository->create($input);

        Flash::success('Etablissement saved successfully.');

        return redirect(route('etablissements.index'));
    }

    /**
     * Display the specified Etablissement.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $etablissement = $this->etablissementRepository->findWithoutFail($id);

        if (empty($etablissement)) {
            Flash::error('Etablissement not found');

            return redirect(route('etablissements.index'));
        }

        return view('etablissements.show')->with('etablissement', $etablissement);
    }

    /**
     * Show the form for editing the specified Etablissement.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $etablissement = $this->etablissementRepository->findWithoutFail($id);

        if (empty($etablissement)) {
            Flash::error('Etablissement not found');

            return redirect(route('etablissements.index'));
        }

        return view('etablissements.edit')->with('etablissement', $etablissement);
    }

    /**
     * Update the specified Etablissement in storage.
     *
     * @param  int              $id
     * @param UpdateEtablissementRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEtablissementRequest $request)
    {
        $etablissement = $this->etablissementRepository->findWithoutFail($id);

        if (empty($etablissement)) {
            Flash::error('Etablissement not found');

            return redirect(route('etablissements.index'));
        }

        $etablissement = $this->etablissementRepository->update($request->all(), $id);

        Flash::success('Etablissement updated successfully.');

        return redirect(route('etablissements.index'));
    }

    /**
     * Remove the specified Etablissement from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $etablissement = $this->etablissementRepository->findWithoutFail($id);

        if (empty($etablissement)) {
            Flash::error('Etablissement not found');

            return redirect(route('etablissements.index'));
        }

        $this->etablissementRepository->delete($id);

        Flash::success('Etablissement deleted successfully.');

        return redirect(route('etablissements.index'));
    }
}
