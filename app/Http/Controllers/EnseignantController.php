<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEnseignantRequest;
use App\Http\Requests\UpdateEnseignantRequest;
use App\Repositories\EnseignantRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class EnseignantController extends AppBaseController
{
    /** @var  EnseignantRepository */
    private $enseignantRepository;

    public function __construct(EnseignantRepository $enseignantRepo)
    {
        $this->enseignantRepository = $enseignantRepo;
    }

    /**
     * Display a listing of the Enseignant.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->enseignantRepository->pushCriteria(new RequestCriteria($request));
        $enseignants = $this->enseignantRepository->all();

        return view('enseignants.index')
            ->with('enseignants', $enseignants);
    }

    /**
     * Show the form for creating a new Enseignant.
     *
     * @return Response
     */
    public function create()
    {
        return view('enseignants.create');
    }

    /**
     * Store a newly created Enseignant in storage.
     *
     * @param CreateEnseignantRequest $request
     *
     * @return Response
     */
    public function store(CreateEnseignantRequest $request)
    {
        $input = $request->all();

        $enseignant = $this->enseignantRepository->create($input);

        Flash::success('Enseignant saved successfully.');

        return redirect(route('enseignants.index'));
    }

    /**
     * Display the specified Enseignant.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $enseignant = $this->enseignantRepository->findWithoutFail($id);

        if (empty($enseignant)) {
            Flash::error('Enseignant not found');

            return redirect(route('enseignants.index'));
        }

        return view('enseignants.show')->with('enseignant', $enseignant);
    }

    /**
     * Show the form for editing the specified Enseignant.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $enseignant = $this->enseignantRepository->findWithoutFail($id);

        if (empty($enseignant)) {
            Flash::error('Enseignant not found');

            return redirect(route('enseignants.index'));
        }

        return view('enseignants.edit')->with('enseignant', $enseignant);
    }

    /**
     * Update the specified Enseignant in storage.
     *
     * @param  int              $id
     * @param UpdateEnseignantRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEnseignantRequest $request)
    {
        $enseignant = $this->enseignantRepository->findWithoutFail($id);

        if (empty($enseignant)) {
            Flash::error('Enseignant not found');

            return redirect(route('enseignants.index'));
        }

        $enseignant = $this->enseignantRepository->update($request->all(), $id);

        Flash::success('Enseignant updated successfully.');

        return redirect(route('enseignants.index'));
    }

    /**
     * Remove the specified Enseignant from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $enseignant = $this->enseignantRepository->findWithoutFail($id);

        if (empty($enseignant)) {
            Flash::error('Enseignant not found');

            return redirect(route('enseignants.index'));
        }

        $this->enseignantRepository->delete($id);

        Flash::success('Enseignant deleted successfully.');

        return redirect(route('enseignants.index'));
    }
}
