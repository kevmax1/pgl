<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEleveRequest;
use App\Http\Requests\UpdateEleveRequest;
use App\Repositories\EleveRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
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
        $this->eleveRepository->pushCriteria(new RequestCriteria($request));
        $eleves = $this->eleveRepository->all();

        return view('eleves.index')
            ->with('eleves', $eleves);
    }

    /**
     * Show the form for creating a new Eleve.
     *
     * @return Response
     */
    public function create()
    {
        return view('eleves.create');
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

        $eleve = $this->eleveRepository->create($input);

        Flash::success('Eleve saved successfully.');

        return redirect(route('eleves.index'));
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

        return view('eleves.show')->with('eleve', $eleve);
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

        return view('eleves.edit')->with('eleve', $eleve);
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

        $eleve = $this->eleveRepository->update($request->all(), $id);

        Flash::success('Eleve updated successfully.');

        return redirect(route('eleves.index'));
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
