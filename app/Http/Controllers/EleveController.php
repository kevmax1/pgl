<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEleveRequest;
use App\Http\Requests\UpdateEleveRequest;
use App\Models\AnneeAcademique;
use App\Models\Classe;
use App\Models\Cycle;
use App\Models\Inscription;
use App\Models\Nivau;
use App\Models\Parent2;
use App\Models\section;
use App\Models\Serie;
use App\Models\Sexe;
use App\Repositories\EleveRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\DB;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

    class EleveController extends AppBaseController
    {
        /** @var  EleveRepository */
        private $eleveRepository;

        public function __construct(EleveRepository $eleveRepo)
        {
            $this->eleveRepository = $eleveRepo;
        }

        /**
         * Display a listing of the Eleve.
         *
         * @param Request $request
         * @return Response
         */
        public function index(Request $request)
        {
            $annees = AnneeAcademique::all();
            $sections = section::all();
            $cycles = Cycle::all();
            $niveaux = Nivau::all();
            $series = Serie::all();
            $classes = Classe::all();
            return view('modules.principal.eleves.index',compact('annees','sections','cycles','niveaux','series','classes'));
        }

        public function findIndex(Request $request){

            $inscriptions = Inscription::where('classe_id',$request->get('classe'))
                ->where('annee_academique_id',$request->get('annee'))
                ->get();
            return view('modules.principal.eleves.table')
                ->with('inscriptions', $inscriptions);
        }

        public function affecter(){
            if (AnneeAcademique::where('encours',1)->count()==0){
                Flash::error('Aucune année academiques en cours');
                return redirect(route('anneeAcademiques.index'));
            }
            $sections = section::all();
            $cycles = Cycle::all();
            $niveaux = Nivau::all();
            $series = Serie::all();
            $classes = Classe::all();
            return view('modules.principal.eleves.affecter',compact('sections','cycles','niveaux','series','classes'));
        }

        public function affecterStore(Request $request){
            $data = $request->all();
            $inscription = Inscription::where('id',$data['inscription'])
                ->where('niveau_id',$data['niveau'])
                ->first();
            if($inscription !=null){
                if ($inscription->classe_id == null){
                    $inscription->classe_id = $data['classe'];
                    $inscription->save();
                    return response()->json(['msg'=>'Elève ajoutée à cette classe avec succès'],200);
                }else{
                    $inscription->classe_id = null;
                    $inscription->save();
                    return response()->json(['msg'=>'Elève retirer de cette classe avec succès'],200);
                }
            }else{
                return response()->json(['msg'=>'Aucune inscription ne correspondant à votre requête n\' a été trouvé'],500);
            }
        }

        public function find($id=0)
        {
            $niveau = Classe::find($id)->serie->niveau;
            $inscriptions = Inscription::where('niveau_id',$niveau->id)
                    ->where(['classe_id'=>null,'classe_id'=>$id])
                    ->where('annee_academique_id',AnneeAcademique::where('encours',1)->first()->id)
                    ->get();
            return view('modules.principal.eleves.affecterTable')
                ->with('inscriptions', $inscriptions)->with('classe',$id);
        }

        /**
         * Show the form for creating a new Eleve.
         *
         * @return Response
         */
        public function create()
        {
            $sexes = Sexe::all();
            $sections = section::all();
            $cycles = Cycle::all();
            $niveaux = Nivau::all();
            return view('modules.principal.eleves.create',compact("sexes",'sections','cycles','niveaux'));
        }

        /**
         * Store a newly created Eleve in storage.
         *
         * @param CreateEleveRequest $request
         *
         * @return Response
         */
        public function store(CreateEleveRequest $request)
        {
            $input = $request->all();
            $data = $request->all();
            DB::beginTransaction();
            try{
                $input['matricule']="0";
                $input['date_naissance']=Carbon::parse($input['date_naissance'])->format('Y-m-d');
                $eleve = $this->eleveRepository->create($input);
                $eleve->matricule = "LY-".Carbon::today()->format('Y')."-".$eleve->id;
                $eleve->date_naissance =Carbon::parse($eleve->date_naissance)->format('Y-m-d');;
                $eleve->save();
                $parent1 = Parent2::create([
                    'nom'=>$data["nom_parent_1"],
                    'prenom'=>$data["prenom_parent_1"],
                    'adresse'=>$data["adresse_parent_1"],
                    'telphone'=>$data["telephone_parent_1"],
                    'eleve_id'=>$eleve->id
                ]);
                $parent2 = true;
                if ($data["nom_parent_2"] != null && $data["prenom_parent_2"] != null && $data["telephone_parent_2"] != null && $data["adresse_parent_2"] != null){
                    $parent2 = Parent2::create([
                        'nom'=>$data["nom_parent_2"],
                        'prenom'=>$data["prenom_parent_2"],
                        'adresse'=>$data["adresse_parent_2"],
                        'telphone'=>$data["telephone_parent_2"],
                        'eleve_id'=>$eleve->id
                    ]);
                }
                $inscription = Inscription::create([
                    'date_inscription'=>Carbon::today()->format('Y-m-d'),
                    'annee_academique_id'=>AnneeAcademique::where('encours',1)->first()->id,
                    'niveau_id'=>$data["niveau_id"],
                    'eleve_id'=>$eleve->id
                ]);
                DB::commit();
                Flash::success('Eleve saved successfully.');
                return redirect(route('eleves.index'));
            }catch (\Exception $e){
                dd($request->all());
                Flash::error('Erreur lors de l\'ajout de l\'élève.');
                DB::rollback();
                return redirect(route('eleves.create'));
            }
        }

        /**
         * Display the specified Eleve.
         *
         * @param  int $id
         *
         * @return Response
         */
        public function show($id)
        {
            $eleve = $this->eleveRepository->findWithoutFail($id);

            if (empty($eleve)) {
                Flash::error('Eleve not found');

                return redirect(route('eleves.index'));
            }

            return view('modules.principal.eleves.show')->with('eleve', $eleve);
        }

        /**
         * Show the form for editing the specified Eleve.
         *
         * @param  int $id
         *
         * @return Response
         */
        public function edit($id)
        {
            $eleve = $this->eleveRepository->findWithoutFail($id);
            if (empty($eleve)) {
                Flash::error('Eleve not found');
                return redirect(route('eleves.index'));
            }
            $i =1;
            foreach ($eleve->parents as $parent){
                $text = "nom_parent_"."$i";
                $eleve->$text = $parent->nom;
                $text = "prenom_parent_"."$i";
                $eleve->$text = $parent->prenom;
                $text = "telephone_parent_"."$i";
                $eleve->$text = $parent->telphone;
                $text = "adresse_parent_"."$i";
                $eleve->$text = $parent->adresse;
                $i++;
            }
            $sexes = Sexe::all();
            $sections = section::all();
            $cycles = Cycle::all();
            $niveaux = Nivau::all();
            return view('modules.principal.eleves.edit',compact("sexes",'sections','cycles','niveaux'))->with('eleve', $eleve);
        }

        /**
         * Update the specified Eleve in storage.
         *
         * @param  int              $id
         * @param UpdateEleveRequest $request
         *
         * @return Response
         */
        public function update($id, UpdateEleveRequest $request)
        {
            $eleve = $this->eleveRepository->findWithoutFail($id);
            if (empty($eleve)) {
                Flash::error('Eleve not found');
                return redirect(route('eleves.index'));
            }
            DB::beginTransaction();
            try{
                $eleve = $this->eleveRepository->update($request->all(), $id);
                $data = $request->all();
                $parent = [
                    'nom'=>$data["nom_parent_1"],
                    'prenom'=>$data["prenom_parent_1"],
                    'adresse'=>$data["adresse_parent_1"],
                    'telphone'=>$data["telephone_parent_1"]
                ];
                $eleve->parents()->first()->update($parent);
                if ($data["nom_parent_2"] != null && $data["prenom_parent_2"] != null && $data["telephone_parent_2"] != null && $data["adresse_parent_2"] != null){
                    $parent = [
                        'nom'=>$data["nom_parent_2"],
                        'prenom'=>$data["prenom_parent_2"],
                        'adresse'=>$data["adresse_parent_2"],
                        'telphone'=>$data["telephone_parent_2"]
                    ];
                    if ($eleve->parents()->count() == 1){
                        $eleve->parents()->create($parent);
                    }else{
                        $eleve->parents()->orderBy('id', 'desc')->first()->update($parent);
                    }

                }
                $eleve->inscriptions()->orderBy('id', 'desc')->first()->update([
                    'annee_academique_id'=>AnneeAcademique::where('encours',1)->first()->id,
                    'niveau_id'=>$data["niveau_id"]
                ]);
                DB::commit();
                Flash::success('Eleve updated successfully.');
                return redirect(route('eleves.index'));
            }catch (\Exception $e){
                dd($request->all());
                Flash::error('Erreur lors de la mise à jour de l\'élève.');
                DB::rollback();
                return redirect(route('eleves.edit',$id));
            }
        }

        /**
         * Remove the specified Eleve from storage.
         *
         * @param  int $id
         *
         * @return Response
         */
        public function destroy($id)
        {
            $eleve = $this->eleveRepository->findWithoutFail($id);

            if (empty($eleve)) {
                Flash::error('Eleve not found');

                return redirect(route('eleves.index'));
            }

            $this->eleveRepository->delete($id);

            Flash::success('Eleve deleted successfully.');

            return redirect(route('eleves.index'));
        }
    }
