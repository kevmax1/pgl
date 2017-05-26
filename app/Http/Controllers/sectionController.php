<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatesectionRequest;
use App\Http\Requests\UpdatesectionRequest;
use App\Repositories\sectionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class sectionController extends AppBaseController
{
    /** @var  sectionRepository */
    private $sectionRepository;

    public function __construct(sectionRepository $sectionRepo)
    {
        $this->sectionRepository = $sectionRepo;
    }

    /**
     * Display a listing of the section.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->sectionRepository->pushCriteria(new RequestCriteria($request));
        $sections = $this->sectionRepository->all();

        return view('modules.principal.sections.index')
            ->with('sections', $sections);
    }

    /**
     * Show the form for creating a new section.
     *
     * @return Response
     */
    public function create()
    {
        return view('modules.principal.sections.create');
    }

    /**
     * Store a newly created section in storage.
     *
     * @param CreatesectionRequest $request
     *
     * @return Response
     */
    public function store(CreatesectionRequest $request)
    {
        $input = $request->all();

        $section = $this->sectionRepository->create($input);

        Flash::success('Section saved successfully.');

        return redirect(route('sections.index'));
    }

    /**
     * Display the specified section.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $section = $this->sectionRepository->findWithoutFail($id);

        if (empty($section)) {
            Flash::error('Section not found');

            return redirect(route('sections.index'));
        }

        return view('sections.show')->with('section', $section);
    }

    /**
     * Show the form for editing the specified section.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $section = $this->sectionRepository->findWithoutFail($id);

        if (empty($section)) {
            Flash::error('Section not found');

            return redirect(route('sections.index'));
        }

        return view('modules.principal.sections.edit')->with('section', $section);
    }

    /**
     * Update the specified section in storage.
     *
     * @param  int              $id
     * @param UpdatesectionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatesectionRequest $request)
    {
        $section = $this->sectionRepository->findWithoutFail($id);

        if (empty($section)) {
            Flash::error('Section not found');

            return redirect(route('sections.index'));
        }

        $section = $this->sectionRepository->update($request->all(), $id);

        Flash::success('Section updated successfully.');

        return redirect(route('sections.index'));
    }

    /**
     * Remove the specified section from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $section = $this->sectionRepository->findWithoutFail($id);

        if (empty($section)) {
            Flash::error('Section not found');

            return redirect(route('sections.index'));
        }

        $this->sectionRepository->delete($id);

        Flash::success('Section deleted successfully.');

        return redirect(route('sections.index'));
    }
}
