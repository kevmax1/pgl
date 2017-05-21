<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateaccesRequest;
use App\Http\Requests\UpdateaccesRequest;
use App\Repositories\accesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class accesController extends AppBaseController
{
    /** @var  accesRepository */
    private $accesRepository;

    public function __construct(accesRepository $accesRepo)
    {
        $this->accesRepository = $accesRepo;
    }

    /**
     * Display a listing of the acces.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->accesRepository->pushCriteria(new RequestCriteria($request));
        $acces = $this->accesRepository->all();

        return view('acces.index')
            ->with('acces', $acces);
    }

    /**
     * Show the form for creating a new acces.
     *
     * @return Response
     */
    public function create()
    {
        return view('acces.create');
    }

    /**
     * Store a newly created acces in storage.
     *
     * @param CreateaccesRequest $request
     *
     * @return Response
     */
    public function store(CreateaccesRequest $request)
    {
        $input = $request->all();

        $acces = $this->accesRepository->create($input);

        Flash::success('Acces saved successfully.');

        return redirect(route('acces.index'));
    }

    /**
     * Display the specified acces.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $acces = $this->accesRepository->findWithoutFail($id);

        if (empty($acces)) {
            Flash::error('Acces not found');

            return redirect(route('acces.index'));
        }

        return view('acces.show')->with('acces', $acces);
    }

    /**
     * Show the form for editing the specified acces.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $acces = $this->accesRepository->findWithoutFail($id);

        if (empty($acces)) {
            Flash::error('Acces not found');

            return redirect(route('acces.index'));
        }

        return view('acces.edit')->with('acces', $acces);
    }

    /**
     * Update the specified acces in storage.
     *
     * @param  int              $id
     * @param UpdateaccesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateaccesRequest $request)
    {
        $acces = $this->accesRepository->findWithoutFail($id);

        if (empty($acces)) {
            Flash::error('Acces not found');

            return redirect(route('acces.index'));
        }

        $acces = $this->accesRepository->update($request->all(), $id);

        Flash::success('Acces updated successfully.');

        return redirect(route('acces.index'));
    }

    /**
     * Remove the specified acces from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $acces = $this->accesRepository->findWithoutFail($id);

        if (empty($acces)) {
            Flash::error('Acces not found');

            return redirect(route('acces.index'));
        }

        $this->accesRepository->delete($id);

        Flash::success('Acces deleted successfully.');

        return redirect(route('acces.index'));
    }
}
