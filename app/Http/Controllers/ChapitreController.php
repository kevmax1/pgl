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
use App\Models\Classe;
use App\Models\Matiere;
use App\Models\Chapitre;
use App\Models\Nivau;
use App\Models\Serie;
use App\Models\Section;
use App\Models\AnneeAcademique;
use App\Models\GroupeMatiere;
use App\Models\MatiereProgrammer;

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
        $annees = AnneeAcademique::all();
        $groupes = GroupeMatiere::all();
        $niveaux = Nivau::all();
        $series = Serie::all();
        $matieres = Matiere::all();
        $sections = Section::all();
        return view('modules.principal.chapitres.index',compact('annees','sections','groupes','niveaux','series','matieres'))
            ->with('chapitres', $chapitres);
    }

    /**
     * Show the form for creating a new Chapitre.
     *
     * @return Response
     */
    public function create()
    {
        return view('modules.principal.chapitres.create');
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

        return view('modules.principal.chapitres.show')->with('chapitre', $chapitre);
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

        return view('modules.principal.chapitres.edit')->with('chapitre', $chapitre);
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

    public function chapitre(Request $req){
        $prog = MatiereProgrammer::find($req->id);
        $list = '';
        if(!is_null($prog->ordre_chapitres) && $prog->ordre_chapitres != ''){
            $ordres = json_decode($prog->ordre_chapitres);
            //dd($ordres);
            $prog->set_chap($ordres);
            $prog->set_chap_del($ordres);
        }
        return view('modules.principal.chapitres.table_chapitres')->with(['chaps'=> $prog,'id'=>$req->id]); 
    }

    

    public function add_chap(Request $req){
        $chap = Chapitre::create($req->all());
        return response()->json($chap);
    }
    public function edit_order(Request $req){
        $rep = MatiereProgrammer::find($req->id);
        $rep->ordre_chapitres = $req->newO;
        $rep->save();
        return response()->json($rep);
    }
    public function delete_chapitre(Request $req){
        $chap = Chapitre::find($req->id);
        $prog = MatiereProgrammer::find($chap->matiere_programmer_id);
        $ordres = json_decode($prog->ordre_chapitres);
        $prog->delet_chapitre($chap->id, $ordres);
        $prog->ordre_chapitres = $prog->new_ordre;
        $prog->save();
        return response()->json(['id'=>$prog->id]);
    }
}
