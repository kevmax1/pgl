<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateGroupeMatiereRequest;
use App\Http\Requests\UpdateGroupeMatiereRequest;
use App\Repositories\GroupeMatiereRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class GroupeMatiereController extends AppBaseController
{
    /** @var  GroupeMatiereRepository */
    private $groupeMatiereRepository;

    public function __construct(GroupeMatiereRepository $groupeMatiereRepo)
    {
        $this->groupeMatiereRepository = $groupeMatiereRepo;
    }

    /**
     * Display a listing of the GroupeMatiere.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->groupeMatiereRepository->pushCriteria(new RequestCriteria($request));
        $groupeMatieres = $this->groupeMatiereRepository->all();

        return view('modules.principal.groupe_matieres.index')
            ->with('groupeMatieres', $groupeMatieres);
    }

    /**
     * Show the form for creating a new GroupeMatiere.
     *
     * @return Response
     */
    public function create()
    {
        return view('modules.principal.groupe_matieres.create');
    }

    /**
     * Store a newly created GroupeMatiere in storage.
     *
     * @param CreateGroupeMatiereRequest $request
     *
     * @return Response
     */
    public function store(CreateGroupeMatiereRequest $request)
    {
        $input = $request->all();

        $groupeMatiere = $this->groupeMatiereRepository->create($input);

        Flash::success('Groupe Matiere saved successfully.');

        return redirect(route('groupeMatieres.index'));
    }

    /**
     * Display the specified GroupeMatiere.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $groupeMatiere = $this->groupeMatiereRepository->findWithoutFail($id);

        if (empty($groupeMatiere)) {
            Flash::error('Groupe Matiere not found');

            return redirect(route('groupeMatieres.index'));
        }

        return view('modules.principal.groupe_matieres.show')->with('groupeMatiere', $groupeMatiere);
    }

    /**
     * Show the form for editing the specified GroupeMatiere.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $groupeMatiere = $this->groupeMatiereRepository->findWithoutFail($id);

        if (empty($groupeMatiere)) {
            Flash::error('Groupe Matiere not found');

            return redirect(route('groupeMatieres.index'));
        }

        return view('modules.principal.groupe_matieres.edit')->with('groupeMatiere', $groupeMatiere);
    }

    /**
     * Update the specified GroupeMatiere in storage.
     *
     * @param  int              $id
     * @param UpdateGroupeMatiereRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateGroupeMatiereRequest $request)
    {
        $groupeMatiere = $this->groupeMatiereRepository->findWithoutFail($id);

        if (empty($groupeMatiere)) {
            Flash::error('Groupe Matiere not found');

            return redirect(route('groupeMatieres.index'));
        }

        $groupeMatiere = $this->groupeMatiereRepository->update($request->all(), $id);

        Flash::success('Groupe Matiere updated successfully.');

        return redirect(route('groupeMatieres.index'));
    }

    /**
     * Remove the specified GroupeMatiere from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $groupeMatiere = $this->groupeMatiereRepository->findWithoutFail($id);

        if (empty($groupeMatiere)) {
            Flash::error('Groupe Matiere not found');

            return redirect(route('groupeMatieres.index'));
        }

        $this->groupeMatiereRepository->delete($id);

        Flash::success('Groupe Matiere deleted successfully.');

        return redirect(route('groupeMatieres.index'));
    }
}
