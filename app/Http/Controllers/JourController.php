<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateJourRequest;
use App\Http\Requests\UpdateJourRequest;
use App\Repositories\JourRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class JourController extends AppBaseController
{
    /** @var  JourRepository */
    private $jourRepository;

    public function __construct(JourRepository $jourRepo)
    {
        $this->jourRepository = $jourRepo;
    }

    /**
     * Display a listing of the Jour.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->jourRepository->pushCriteria(new RequestCriteria($request));
        $jours = $this->jourRepository->all();

        return view('jours.index')
            ->with('jours', $jours);
    }

    /**
     * Show the form for creating a new Jour.
     *
     * @return Response
     */
    public function create()
    {
        return view('jours.create');
    }

    /**
     * Store a newly created Jour in storage.
     *
     * @param CreateJourRequest $request
     *
     * @return Response
     */
    public function store(CreateJourRequest $request)
    {
        $input = $request->all();

        $jour = $this->jourRepository->create($input);

        Flash::success('Jour saved successfully.');

        return redirect(route('jours.index'));
    }

    /**
     * Display the specified Jour.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $jour = $this->jourRepository->findWithoutFail($id);

        if (empty($jour)) {
            Flash::error('Jour not found');

            return redirect(route('jours.index'));
        }

        return view('jours.show')->with('jour', $jour);
    }

    /**
     * Show the form for editing the specified Jour.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $jour = $this->jourRepository->findWithoutFail($id);

        if (empty($jour)) {
            Flash::error('Jour not found');

            return redirect(route('jours.index'));
        }

        return view('jours.edit')->with('jour', $jour);
    }

    /**
     * Update the specified Jour in storage.
     *
     * @param  int              $id
     * @param UpdateJourRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateJourRequest $request)
    {
        $jour = $this->jourRepository->findWithoutFail($id);

        if (empty($jour)) {
            Flash::error('Jour not found');

            return redirect(route('jours.index'));
        }

        $jour = $this->jourRepository->update($request->all(), $id);

        Flash::success('Jour updated successfully.');

        return redirect(route('jours.index'));
    }

    /**
     * Remove the specified Jour from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $jour = $this->jourRepository->findWithoutFail($id);

        if (empty($jour)) {
            Flash::error('Jour not found');

            return redirect(route('jours.index'));
        }

        $this->jourRepository->delete($id);

        Flash::success('Jour deleted successfully.');

        return redirect(route('jours.index'));
    }
}
