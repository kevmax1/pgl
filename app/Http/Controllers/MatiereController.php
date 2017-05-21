<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMatiereRequest;
use App\Http\Requests\UpdateMatiereRequest;
use App\Repositories\MatiereRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class MatiereController extends AppBaseController
{
    /** @var  MatiereRepository */
    private $matiereRepository;

    public function __construct(MatiereRepository $matiereRepo)
    {
        $this->matiereRepository = $matiereRepo;
    }

    /**
     * Display a listing of the Matiere.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->matiereRepository->pushCriteria(new RequestCriteria($request));
        $matieres = $this->matiereRepository->all();

        return view('matieres.index')
            ->with('matieres', $matieres);
    }

    /**
     * Show the form for creating a new Matiere.
     *
     * @return Response
     */
    public function create()
    {
        return view('matieres.create');
    }

    /**
     * Store a newly created Matiere in storage.
     *
     * @param CreateMatiereRequest $request
     *
     * @return Response
     */
    public function store(CreateMatiereRequest $request)
    {
        $input = $request->all();

        $matiere = $this->matiereRepository->create($input);

        Flash::success('Matiere saved successfully.');

        return redirect(route('matieres.index'));
    }

    /**
     * Display the specified Matiere.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $matiere = $this->matiereRepository->findWithoutFail($id);

        if (empty($matiere)) {
            Flash::error('Matiere not found');

            return redirect(route('matieres.index'));
        }

        return view('matieres.show')->with('matiere', $matiere);
    }

    /**
     * Show the form for editing the specified Matiere.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $matiere = $this->matiereRepository->findWithoutFail($id);

        if (empty($matiere)) {
            Flash::error('Matiere not found');

            return redirect(route('matieres.index'));
        }

        return view('matieres.edit')->with('matiere', $matiere);
    }

    /**
     * Update the specified Matiere in storage.
     *
     * @param  int              $id
     * @param UpdateMatiereRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMatiereRequest $request)
    {
        $matiere = $this->matiereRepository->findWithoutFail($id);

        if (empty($matiere)) {
            Flash::error('Matiere not found');

            return redirect(route('matieres.index'));
        }

        $matiere = $this->matiereRepository->update($request->all(), $id);

        Flash::success('Matiere updated successfully.');

        return redirect(route('matieres.index'));
    }

    /**
     * Remove the specified Matiere from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $matiere = $this->matiereRepository->findWithoutFail($id);

        if (empty($matiere)) {
            Flash::error('Matiere not found');

            return redirect(route('matieres.index'));
        }

        $this->matiereRepository->delete($id);

        Flash::success('Matiere deleted successfully.');

        return redirect(route('matieres.index'));
    }
}
