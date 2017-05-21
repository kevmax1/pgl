<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTitreRequest;
use App\Http\Requests\UpdateTitreRequest;
use App\Repositories\TitreRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class TitreController extends AppBaseController
{
    /** @var  TitreRepository */
    private $titreRepository;

    public function __construct(TitreRepository $titreRepo)
    {
        $this->titreRepository = $titreRepo;
    }

    /**
     * Display a listing of the Titre.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->titreRepository->pushCriteria(new RequestCriteria($request));
        $titres = $this->titreRepository->all();

        return view('titres.index')
            ->with('titres', $titres);
    }

    /**
     * Show the form for creating a new Titre.
     *
     * @return Response
     */
    public function create()
    {
        return view('titres.create');
    }

    /**
     * Store a newly created Titre in storage.
     *
     * @param CreateTitreRequest $request
     *
     * @return Response
     */
    public function store(CreateTitreRequest $request)
    {
        $input = $request->all();

        $titre = $this->titreRepository->create($input);

        Flash::success('Titre saved successfully.');

        return redirect(route('titres.index'));
    }

    /**
     * Display the specified Titre.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $titre = $this->titreRepository->findWithoutFail($id);

        if (empty($titre)) {
            Flash::error('Titre not found');

            return redirect(route('titres.index'));
        }

        return view('titres.show')->with('titre', $titre);
    }

    /**
     * Show the form for editing the specified Titre.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $titre = $this->titreRepository->findWithoutFail($id);

        if (empty($titre)) {
            Flash::error('Titre not found');

            return redirect(route('titres.index'));
        }

        return view('titres.edit')->with('titre', $titre);
    }

    /**
     * Update the specified Titre in storage.
     *
     * @param  int              $id
     * @param UpdateTitreRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTitreRequest $request)
    {
        $titre = $this->titreRepository->findWithoutFail($id);

        if (empty($titre)) {
            Flash::error('Titre not found');

            return redirect(route('titres.index'));
        }

        $titre = $this->titreRepository->update($request->all(), $id);

        Flash::success('Titre updated successfully.');

        return redirect(route('titres.index'));
    }

    /**
     * Remove the specified Titre from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $titre = $this->titreRepository->findWithoutFail($id);

        if (empty($titre)) {
            Flash::error('Titre not found');

            return redirect(route('titres.index'));
        }

        $this->titreRepository->delete($id);

        Flash::success('Titre deleted successfully.');

        return redirect(route('titres.index'));
    }
}
