<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTrimestreRequest;
use App\Http\Requests\UpdateTrimestreRequest;
use App\Repositories\TrimestreRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class TrimestreController extends AppBaseController
{
    /** @var  TrimestreRepository */
    private $trimestreRepository;

    public function __construct(TrimestreRepository $trimestreRepo)
    {
        $this->trimestreRepository = $trimestreRepo;
    }

    /**
     * Display a listing of the Trimestre.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->trimestreRepository->pushCriteria(new RequestCriteria($request));
        $trimestres = $this->trimestreRepository->all();

        return view('trimestres.index')
            ->with('trimestres', $trimestres);
    }

    /**
     * Show the form for creating a new Trimestre.
     *
     * @return Response
     */
    public function create()
    {
        return view('trimestres.create');
    }

    /**
     * Store a newly created Trimestre in storage.
     *
     * @param CreateTrimestreRequest $request
     *
     * @return Response
     */
    public function store(CreateTrimestreRequest $request)
    {
        $input = $request->all();

        $trimestre = $this->trimestreRepository->create($input);

        Flash::success('Trimestre saved successfully.');

        return redirect(route('trimestres.index'));
    }

    /**
     * Display the specified Trimestre.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $trimestre = $this->trimestreRepository->findWithoutFail($id);

        if (empty($trimestre)) {
            Flash::error('Trimestre not found');

            return redirect(route('trimestres.index'));
        }

        return view('trimestres.show')->with('trimestre', $trimestre);
    }

    /**
     * Show the form for editing the specified Trimestre.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $trimestre = $this->trimestreRepository->findWithoutFail($id);

        if (empty($trimestre)) {
            Flash::error('Trimestre not found');

            return redirect(route('trimestres.index'));
        }

        return view('trimestres.edit')->with('trimestre', $trimestre);
    }

    /**
     * Update the specified Trimestre in storage.
     *
     * @param  int              $id
     * @param UpdateTrimestreRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTrimestreRequest $request)
    {
        $trimestre = $this->trimestreRepository->findWithoutFail($id);

        if (empty($trimestre)) {
            Flash::error('Trimestre not found');

            return redirect(route('trimestres.index'));
        }

        $trimestre = $this->trimestreRepository->update($request->all(), $id);

        Flash::success('Trimestre updated successfully.');

        return redirect(route('trimestres.index'));
    }

    /**
     * Remove the specified Trimestre from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $trimestre = $this->trimestreRepository->findWithoutFail($id);

        if (empty($trimestre)) {
            Flash::error('Trimestre not found');

            return redirect(route('trimestres.index'));
        }

        $this->trimestreRepository->delete($id);

        Flash::success('Trimestre deleted successfully.');

        return redirect(route('trimestres.index'));
    }
}
