<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateParentRequest;
use App\Http\Requests\UpdateParentRequest;
use App\Repositories\ParentRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ParentController extends AppBaseController
{
    /** @var  ParentRepository */
    private $parentRepository;

    public function __construct(ParentRepository $parentRepo)
    {
        $this->parentRepository = $parentRepo;
    }

    /**
     * Display a listing of the Parent.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->parentRepository->pushCriteria(new RequestCriteria($request));
        $parents = $this->parentRepository->all();

        return view('parents.index')
            ->with('parents', $parents);
    }

    /**
     * Show the form for creating a new Parent.
     *
     * @return Response
     */
    public function create()
    {
        return view('parents.create');
    }

    /**
     * Store a newly created Parent in storage.
     *
     * @param CreateParentRequest $request
     *
     * @return Response
     */
    public function store(CreateParentRequest $request)
    {
        $input = $request->all();

        $parent = $this->parentRepository->create($input);

        Flash::success('Parent saved successfully.');

        return redirect(route('parents.index'));
    }

    /**
     * Display the specified Parent.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $parent = $this->parentRepository->findWithoutFail($id);

        if (empty($parent)) {
            Flash::error('Parent not found');

            return redirect(route('parents.index'));
        }

        return view('parents.show')->with('parent', $parent);
    }

    /**
     * Show the form for editing the specified Parent.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $parent = $this->parentRepository->findWithoutFail($id);

        if (empty($parent)) {
            Flash::error('Parent not found');

            return redirect(route('parents.index'));
        }

        return view('parents.edit')->with('parent', $parent);
    }

    /**
     * Update the specified Parent in storage.
     *
     * @param  int              $id
     * @param UpdateParentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateParentRequest $request)
    {
        $parent = $this->parentRepository->findWithoutFail($id);

        if (empty($parent)) {
            Flash::error('Parent not found');

            return redirect(route('parents.index'));
        }

        $parent = $this->parentRepository->update($request->all(), $id);

        Flash::success('Parent updated successfully.');

        return redirect(route('parents.index'));
    }

    /**
     * Remove the specified Parent from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $parent = $this->parentRepository->findWithoutFail($id);

        if (empty($parent)) {
            Flash::error('Parent not found');

            return redirect(route('parents.index'));
        }

        $this->parentRepository->delete($id);

        Flash::success('Parent deleted successfully.');

        return redirect(route('parents.index'));
    }
}
