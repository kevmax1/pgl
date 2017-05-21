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

        return view('matiere_programmers.index')
            ->with('matiereProgrammers', $matiereProgrammers);
    }

    /**
     * Show the form for creating a new MatiereProgrammer.
     *
     * @return Response
     */
    public function create()
    {
        return view('matiere_programmers.create');
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

        return view('matiere_programmers.show')->with('matiereProgrammer', $matiereProgrammer);
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

        return view('matiere_programmers.edit')->with('matiereProgrammer', $matiereProgrammer);
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
}
