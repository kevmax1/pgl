<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateInscriptionRequest;
use App\Http\Requests\UpdateInscriptionRequest;
use App\Repositories\InscriptionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class InscriptionController extends AppBaseController
{
    /** @var  InscriptionRepository */
    private $inscriptionRepository;

    public function __construct(InscriptionRepository $inscriptionRepo)
    {
        $this->inscriptionRepository = $inscriptionRepo;
    }

    /**
     * Display a listing of the Inscription.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->inscriptionRepository->pushCriteria(new RequestCriteria($request));
        $inscriptions = $this->inscriptionRepository->all();

        return view('inscriptions.index')
            ->with('inscriptions', $inscriptions);
    }

    /**
     * Show the form for creating a new Inscription.
     *
     * @return Response
     */
    public function create()
    {
        return view('inscriptions.create');
    }

    /**
     * Store a newly created Inscription in storage.
     *
     * @param CreateInscriptionRequest $request
     *
     * @return Response
     */
    public function store(CreateInscriptionRequest $request)
    {
        $input = $request->all();

        $inscription = $this->inscriptionRepository->create($input);

        Flash::success('Inscription saved successfully.');

        return redirect(route('inscriptions.index'));
    }

    /**
     * Display the specified Inscription.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $inscription = $this->inscriptionRepository->findWithoutFail($id);

        if (empty($inscription)) {
            Flash::error('Inscription not found');

            return redirect(route('inscriptions.index'));
        }

        return view('inscriptions.show')->with('inscription', $inscription);
    }

    /**
     * Show the form for editing the specified Inscription.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $inscription = $this->inscriptionRepository->findWithoutFail($id);

        if (empty($inscription)) {
            Flash::error('Inscription not found');

            return redirect(route('inscriptions.index'));
        }

        return view('inscriptions.edit')->with('inscription', $inscription);
    }

    /**
     * Update the specified Inscription in storage.
     *
     * @param  int              $id
     * @param UpdateInscriptionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateInscriptionRequest $request)
    {
        $inscription = $this->inscriptionRepository->findWithoutFail($id);

        if (empty($inscription)) {
            Flash::error('Inscription not found');

            return redirect(route('inscriptions.index'));
        }

        $inscription = $this->inscriptionRepository->update($request->all(), $id);

        Flash::success('Inscription updated successfully.');

        return redirect(route('inscriptions.index'));
    }

    /**
     * Remove the specified Inscription from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $inscription = $this->inscriptionRepository->findWithoutFail($id);

        if (empty($inscription)) {
            Flash::error('Inscription not found');

            return redirect(route('inscriptions.index'));
        }

        $this->inscriptionRepository->delete($id);

        Flash::success('Inscription deleted successfully.');

        return redirect(route('inscriptions.index'));
    }
}
