<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNivauRequest;
use App\Http\Requests\UpdateNivauRequest;
use App\Models\Cycle;
use App\Models\section;
use App\Repositories\NivauRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class NivauController extends AppBaseController
{
    /** @var  NivauRepository */
    private $nivauRepository;

    public function __construct(NivauRepository $nivauRepo)
    {
        $this->nivauRepository = $nivauRepo;
    }

    /**
     * Display a listing of the Nivau.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->nivauRepository->pushCriteria(new RequestCriteria($request));
        $nivaus = $this->nivauRepository->all();

        return view('modules.principal.nivaus.index')
            ->with('nivaus', $nivaus);
    }

    /**
     * Show the form for creating a new Nivau.
     *
     * @return Response
     */
    public function create()
    {
        $sections = section::all();
        $cycles = Cycle::all();
        return view('modules.principal.nivaus.create',compact('sections','cycles'));
    }

    /**
     * Store a newly created Nivau in storage.
     *
     * @param CreateNivauRequest $request
     *
     * @return Response
     */
    public function store(CreateNivauRequest $request)
    {
        $input = $request->all();

        $nivau = $this->nivauRepository->create($input);

        Flash::success('Nivau saved successfully.');

        return redirect(route('niveaux.index'));
    }

    /**
     * Display the specified Nivau.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $nivau = $this->nivauRepository->findWithoutFail($id);

        if (empty($nivau)) {
            Flash::error('Nivau not found');

            return redirect(route('niveaux.index'));
        }

        return view('modules.principal.nivaus.show')->with('nivau', $nivau);
    }

    /**
     * Show the form for editing the specified Nivau.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $nivau = $this->nivauRepository->findWithoutFail($id);

        if (empty($nivau)) {
            Flash::error('Nivau not found');

            return redirect(route('niveaux.index'));
        }
        $sections = section::all();
        $cycles = Cycle::all();

        return view('modules.principal.nivaus.edit',compact('sections','cycles'))->with('nivau', $nivau);
    }

    /**
     * Update the specified Nivau in storage.
     *
     * @param  int              $id
     * @param UpdateNivauRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNivauRequest $request)
    {
        $nivau = $this->nivauRepository->findWithoutFail($id);

        if (empty($nivau)) {
            Flash::error('Nivau not found');

            return redirect(route('niveaux.index'));
        }

        $nivau = $this->nivauRepository->update($request->all(), $id);

        Flash::success('Nivau updated successfully.');

        return redirect(route('niveaux.index'));
    }

    /**
     * Remove the specified Nivau from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $nivau = $this->nivauRepository->findWithoutFail($id);

        if (empty($nivau)) {
            Flash::error('Nivau not found');

            return redirect(route('niveaux.index'));
        }

        $this->nivauRepository->delete($id);

        Flash::success('Nivau deleted successfully.');

        return redirect(route('niveaux.index'));
    }
}
