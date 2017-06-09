<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMatiereProgrammerRequest;
use App\Http\Requests\UpdateMatiereProgrammerRequest;
use App\Repositories\MatiereProgrammerRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Classe;
use App\Models\Matiere;
use App\Models\Nivau;
use App\Models\Serie;
use App\Models\AnneeAcademique;
use App\Models\GroupeMatiere;
use App\Models\MatiereProgrammer;

class MatiereProgrammerController extends AppBaseController
{
    /** @var  MatiereProgrammerRepository */
    private $matiereProgrammerRepository;

    public function __construct(MatiereProgrammerRepository $matiereProgrammerRepo)
    {
        $this->matiereProgrammerRepository = $matiereProgrammerRepo;
    }

    /**
     * Display a listing of the MatiereProgrammer.
     *
     * @param Request $request
     * @return Response
     */
    
    public function index(Request $request)
    {
        $this->matiereProgrammerRepository->pushCriteria(new RequestCriteria($request));
        $matiereProgrammers = $this->matiereProgrammerRepository->all();
        $annees = AnneeAcademique::all();
        $groupes = GroupeMatiere::all();
        $niveaux = Nivau::all();
        $series = Serie::all();
        $matieres = Matiere::all();
        return view('modules.principal.matiere_programmers.index',compact('annees','groupes','niveaux','series','matieres'))
            ->with('matiereProgrammers', $matiereProgrammers);
    }

    /**
     * Show the form for creating a new MatiereProgrammer.
     *
     * @return Response
     */
    public function create()
    {
        return view('modules.principal.matiere_programmers.create');
    }

    /**
     * Store a newly created MatiereProgrammer in storage.
     *
     * @param CreateMatiereProgrammerRequest $request
     *
     * @return Response
     */
    public function store(CreateMatiereProgrammerRequest $request)
    {
        $input = $request->all();

        $matiereProgrammer = $this->matiereProgrammerRepository->create($input);

        Flash::success('Matiere Programmer saved successfully.');

        return redirect(route('matiereProgrammers.index'));
    }

    /**
     * Display the specified MatiereProgrammer.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $matiereProgrammer = $this->matiereProgrammerRepository->findWithoutFail($id);

        if (empty($matiereProgrammer)) {
            Flash::error('Matiere Programmer not found');

            return redirect(route('matiereProgrammers.index'));
        }

        return view('modules.principal.matiere_programmers.show')->with('matiereProgrammer', $matiereProgrammer);
    }

    /**
     * Show the form for editing the specified MatiereProgrammer.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $matiereProgrammer = $this->matiereProgrammerRepository->findWithoutFail($id);

        if (empty($matiereProgrammer)) {
            Flash::error('Matiere Programmer not found');

            return redirect(route('matiereProgrammers.index'));
        }

        return view('modules.principal.matiere_programmers.edit')->with('matiereProgrammer', $matiereProgrammer);
    }

    /**
     * Update the specified MatiereProgrammer in storage.
     *
     * @param  int              $id
     * @param UpdateMatiereProgrammerRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMatiereProgrammerRequest $request)
    {
        $matiereProgrammer = $this->matiereProgrammerRepository->findWithoutFail($id);

        if (empty($matiereProgrammer)) {
            Flash::error('Matiere Programmer not found');

            return redirect(route('matiereProgrammers.index'));
        }

        $matiereProgrammer = $this->matiereProgrammerRepository->update($request->all(), $id);

        Flash::success('Matiere Programmer updated successfully.');

        return redirect(route('matiereProgrammers.index'));
    }

    /**
     * Remove the specified MatiereProgrammer from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $matiereProgrammer = $this->matiereProgrammerRepository->findWithoutFail($id);

        if (empty($matiereProgrammer)) {
            Flash::error('Matiere Programmer not found');

            return redirect(route('matiereProgrammers.index'));
        }

        $this->matiereProgrammerRepository->delete($id);

        Flash::success('Matiere Programmer deleted successfully.');

        return redirect(route('matiereProgrammers.index'));
    }

    public function get_all(Request $req){
        $allp = MatiereProgrammer::where([
                'serie_id'=>$req->idserie,
                'annee_academique_id'=>$req->idanne,
                'groupe_matiere_id'=>$req->idgroupe,
            ])->get();
        return view('modules.principal.chapitres.table_programme')->with(['progs'=> $allp]);

    }

    public function matiere(Request $req){
        $matiere = new Matiere();
        $res = $matiere->otherProgramme($req);
        return view('modules.principal.matiere_programmers.table_matiere')->with(['matieres'=> $res,'req'=>$req]);
    }

    public function matiere2(Request $req){
        $matiere_p = new MatiereProgrammer();
        $res = $matiere_p->otherProgrammeIn($req);
        return view('modules.principal.matiere_programmers.table_matiere2')->with(['matieres'=> $res,'req'=>$req]);
    }

    public function save(Request $req){
        $rep = MatiereProgrammer::create($req->all());
        return response()->json($req);
    }
    public function delete(Request $req){
        $mp = MatiereProgrammer::find($req->id);
        $mp->destroy($req->id);
        return response()->json($mp);
    }
}
