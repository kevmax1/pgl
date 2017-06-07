<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAnneeAcademiqueRequest;
use App\Http\Requests\UpdateAnneeAcademiqueRequest;
use App\Models\acces;
use App\Models\AnneeAcademique;
use App\Models\menu;
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

        /*$parent = menu::create([
            "libelle"=>"Classes",
            "libelle_en"=>"Classes",
            "icon"=>"icon mdi mdi-balance",
            "parent_id"=>0,
            "route"=>"#",
            "route_name"=>"#",
            "module_id"=>"1",
        ]);
        acces::create(["role_id"=>1,"menu_id"=>$parent->id]);
        $menu = menu::create([
            "libelle"=>"Liste des classes",
            "libelle_en"=>"List of classes",
            "icon"=>"#",
            "parent_id"=>$parent->id,
            "route"=>"/classes",
            "route_name"=>"classes.index",
            "module_id"=>"1",
        ]);
        acces::create(["role_id"=>1,"menu_id"=>$menu->id]);
        $menu = menu::create([
            "libelle"=>"Ajouter une classe",
            "libelle_en"=>"Add a classe",
            "icon"=>"#",
            "parent_id"=>$parent->id,
            "route"=>"/classes/create",
            "route_name"=>"classes.create",
            "module_id"=>"1",
        ]);
        acces::create(["role_id"=>1,"menu_id"=>$menu->id]);
        die();*/
        $this->anneeAcademiqueRepository->pushCriteria(new RequestCriteria($request));
        $anneeAcademiques = $this->anneeAcademiqueRepository->all();

        return view('modules.principal.annee_academiques.index')
            ->with('anneeAcademiques', $anneeAcademiques);
    }

    /**
     * Show the form for creating a new AnneeAcademique.
     *
     * @return Response
     */
    public function create()
    {
        return view('modules.principal.annee_academiques.create');
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
        $input['encours'] = 0;
        $anneeAcademique = $this->anneeAcademiqueRepository->create($input);
        AnneeAcademique::where('id','>',0)->update(['encours'=>0]);
        $anneeAcademique->encours = 1;
        $anneeAcademique->save();
        Flash::success('Annee Academique saved successfully.');
        return redirect(route('anneeAcademiques.index'));
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
        $anneeAcademiques = $this->anneeAcademiqueRepository->all();
        return view('modules.principal.annee_academiques.edit')->with('anneeAcademique', $anneeAcademique) ->with('anneeAcademiques', $anneeAcademiques);
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
