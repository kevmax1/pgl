<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatemoduleRequest;
use App\Http\Requests\UpdatemoduleRequest;
use App\Repositories\moduleRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class moduleController extends AppBaseController
{
    /** @var  moduleRepository */
    private $moduleRepository;

    public function __construct(moduleRepository $moduleRepo)
    {
        $this->moduleRepository = $moduleRepo;
    }

    /**
     * Display a listing of the module.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->moduleRepository->pushCriteria(new RequestCriteria($request));
        $modules = $this->moduleRepository->all();

        return view('modules.index')
            ->with('modules', $modules);
    }

    /**
     * Show the form for creating a new module.
     *
     * @return Response
     */
    public function create()
    {
        return view('modules.create');
    }

    /**
     * Store a newly created module in storage.
     *
     * @param CreatemoduleRequest $request
     *
     * @return Response
     */
    public function store(CreatemoduleRequest $request)
    {
        $input = $request->all();

        $module = $this->moduleRepository->create($input);

        Flash::success('Module saved successfully.');

        return redirect(route('modules.index'));
    }

    /**
     * Display the specified module.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $module = $this->moduleRepository->findWithoutFail($id);

        if (empty($module)) {
            Flash::error('Module not found');

            return redirect(route('modules.index'));
        }

        return view('modules.show')->with('module', $module);
    }

    /**
     * Show the form for editing the specified module.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $module = $this->moduleRepository->findWithoutFail($id);

        if (empty($module)) {
            Flash::error('Module not found');

            return redirect(route('modules.index'));
        }

        return view('modules.edit')->with('module', $module);
    }

    /**
     * Update the specified module in storage.
     *
     * @param  int              $id
     * @param UpdatemoduleRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatemoduleRequest $request)
    {
        $module = $this->moduleRepository->findWithoutFail($id);

        if (empty($module)) {
            Flash::error('Module not found');

            return redirect(route('modules.index'));
        }

        $module = $this->moduleRepository->update($request->all(), $id);

        Flash::success('Module updated successfully.');

        return redirect(route('modules.index'));
    }

    /**
     * Remove the specified module from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $module = $this->moduleRepository->findWithoutFail($id);

        if (empty($module)) {
            Flash::error('Module not found');

            return redirect(route('modules.index'));
        }

        $this->moduleRepository->delete($id);

        Flash::success('Module deleted successfully.');

        return redirect(route('modules.index'));
    }
}
