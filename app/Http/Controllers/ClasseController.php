<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateClasseRequest;
use App\Http\Requests\UpdateClasseRequest;
use App\Repositories\ClasseRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ClasseController extends AppBaseController
{
    /** @var  ClasseRepository */
    private $classeRepository;

    public function __construct(ClasseRepository $classeRepo)
    {
        $this->classeRepository = $classeRepo;
    }

    /**
     * Display a listing of the Classe.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->classeRepository->pushCriteria(new RequestCriteria($request));
        $classes = $this->classeRepository->all();

        return view('classes.index')
            ->with('classes', $classes);
    }

    /**
     * Show the form for creating a new Classe.
     *
     * @return Response
     */
    public function create()
    {
        return view('classes.create');
    }

    /**
     * Store a newly created Classe in storage.
     *
     * @param CreateClasseRequest $request
     *
     * @return Response
     */
    public function store(CreateClasseRequest $request)
    {
        $input = $request->all();

        $classe = $this->classeRepository->create($input);

        Flash::success('Classe saved successfully.');

        return redirect(route('classes.index'));
    }

    /**
     * Display the specified Classe.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $classe = $this->classeRepository->findWithoutFail($id);

        if (empty($classe)) {
            Flash::error('Classe not found');

            return redirect(route('classes.index'));
        }

        return view('classes.show')->with('classe', $classe);
    }

    /**
     * Show the form for editing the specified Classe.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $classe = $this->classeRepository->findWithoutFail($id);

        if (empty($classe)) {
            Flash::error('Classe not found');

            return redirect(route('classes.index'));
        }

        return view('classes.edit')->with('classe', $classe);
    }

    /**
     * Update the specified Classe in storage.
     *
     * @param  int              $id
     * @param UpdateClasseRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateClasseRequest $request)
    {
        $classe = $this->classeRepository->findWithoutFail($id);

        if (empty($classe)) {
            Flash::error('Classe not found');

            return redirect(route('classes.index'));
        }

        $classe = $this->classeRepository->update($request->all(), $id);

        Flash::success('Classe updated successfully.');

        return redirect(route('classes.index'));
    }

    /**
     * Remove the specified Classe from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $classe = $this->classeRepository->findWithoutFail($id);

        if (empty($classe)) {
            Flash::error('Classe not found');

            return redirect(route('classes.index'));
        }

        $this->classeRepository->delete($id);

        Flash::success('Classe deleted successfully.');

        return redirect(route('classes.index'));
    }
}
