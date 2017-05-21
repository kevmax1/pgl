<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePlageHoraireRequest;
use App\Http\Requests\UpdatePlageHoraireRequest;
use App\Repositories\PlageHoraireRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PlageHoraireController extends AppBaseController
{
    /** @var  PlageHoraireRepository */
    private $plageHoraireRepository;

    public function __construct(PlageHoraireRepository $plageHoraireRepo)
    {
        $this->plageHoraireRepository = $plageHoraireRepo;
    }

    /**
     * Display a listing of the PlageHoraire.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->plageHoraireRepository->pushCriteria(new RequestCriteria($request));
        $plageHoraires = $this->plageHoraireRepository->all();

        return view('plage_horaires.index')
            ->with('plageHoraires', $plageHoraires);
    }

    /**
     * Show the form for creating a new PlageHoraire.
     *
     * @return Response
     */
    public function create()
    {
        return view('plage_horaires.create');
    }

    /**
     * Store a newly created PlageHoraire in storage.
     *
     * @param CreatePlageHoraireRequest $request
     *
     * @return Response
     */
    public function store(CreatePlageHoraireRequest $request)
    {
        $input = $request->all();

        $plageHoraire = $this->plageHoraireRepository->create($input);

        Flash::success('Plage Horaire saved successfully.');

        return redirect(route('plageHoraires.index'));
    }

    /**
     * Display the specified PlageHoraire.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $plageHoraire = $this->plageHoraireRepository->findWithoutFail($id);

        if (empty($plageHoraire)) {
            Flash::error('Plage Horaire not found');

            return redirect(route('plageHoraires.index'));
        }

        return view('plage_horaires.show')->with('plageHoraire', $plageHoraire);
    }

    /**
     * Show the form for editing the specified PlageHoraire.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $plageHoraire = $this->plageHoraireRepository->findWithoutFail($id);

        if (empty($plageHoraire)) {
            Flash::error('Plage Horaire not found');

            return redirect(route('plageHoraires.index'));
        }

        return view('plage_horaires.edit')->with('plageHoraire', $plageHoraire);
    }

    /**
     * Update the specified PlageHoraire in storage.
     *
     * @param  int              $id
     * @param UpdatePlageHoraireRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePlageHoraireRequest $request)
    {
        $plageHoraire = $this->plageHoraireRepository->findWithoutFail($id);

        if (empty($plageHoraire)) {
            Flash::error('Plage Horaire not found');

            return redirect(route('plageHoraires.index'));
        }

        $plageHoraire = $this->plageHoraireRepository->update($request->all(), $id);

        Flash::success('Plage Horaire updated successfully.');

        return redirect(route('plageHoraires.index'));
    }

    /**
     * Remove the specified PlageHoraire from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $plageHoraire = $this->plageHoraireRepository->findWithoutFail($id);

        if (empty($plageHoraire)) {
            Flash::error('Plage Horaire not found');

            return redirect(route('plageHoraires.index'));
        }

        $this->plageHoraireRepository->delete($id);

        Flash::success('Plage Horaire deleted successfully.');

        return redirect(route('plageHoraires.index'));
    }
}
