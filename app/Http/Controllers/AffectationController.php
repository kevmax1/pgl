<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAffectationRequest;
use App\Http\Requests\UpdateAffectationRequest;
use App\Repositories\AffectationRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class AffectationController extends AppBaseController
{
    /** @var  AffectationRepository */
    private $affectationRepository;

    public function __construct(AffectationRepository $affectationRepo)
    {
        $this->affectationRepository = $affectationRepo;
    }

    /**
     * Display a listing of the Affectation.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->affectationRepository->pushCriteria(new RequestCriteria($request));
        $affectations = $this->affectationRepository->all();

        return view('affectations.index')
            ->with('affectations', $affectations);
    }

    /**
     * Show the form for creating a new Affectation.
     *
     * @return Response
     */
    public function create()
    {
        return view('affectations.create');
    }

    /**
     * Store a newly created Affectation in storage.
     *
     * @param CreateAffectationRequest $request
     *
     * @return Response
     */
    public function store(CreateAffectationRequest $request)
    {
        $input = $request->all();

        $affectation = $this->affectationRepository->create($input);

        Flash::success('Affectation saved successfully.');

        return redirect(route('affectations.index'));
    }

    /**
     * Display the specified Affectation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $affectation = $this->affectationRepository->findWithoutFail($id);

        if (empty($affectation)) {
            Flash::error('Affectation not found');

            return redirect(route('affectations.index'));
        }

        return view('affectations.show')->with('affectation', $affectation);
    }

    /**
     * Show the form for editing the specified Affectation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $affectation = $this->affectationRepository->findWithoutFail($id);

        if (empty($affectation)) {
            Flash::error('Affectation not found');

            return redirect(route('affectations.index'));
        }

        return view('affectations.edit')->with('affectation', $affectation);
    }

    /**
     * Update the specified Affectation in storage.
     *
     * @param  int              $id
     * @param UpdateAffectationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAffectationRequest $request)
    {
        $affectation = $this->affectationRepository->findWithoutFail($id);

        if (empty($affectation)) {
            Flash::error('Affectation not found');

            return redirect(route('affectations.index'));
        }

        $affectation = $this->affectationRepository->update($request->all(), $id);

        Flash::success('Affectation updated successfully.');

        return redirect(route('affectations.index'));
    }

    /**
     * Remove the specified Affectation from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $affectation = $this->affectationRepository->findWithoutFail($id);

        if (empty($affectation)) {
            Flash::error('Affectation not found');

            return redirect(route('affectations.index'));
        }

        $this->affectationRepository->delete($id);

        Flash::success('Affectation deleted successfully.');

        return redirect(route('affectations.index'));
    }
}
