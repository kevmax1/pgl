<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCompositionRequest;
use App\Http\Requests\UpdateCompositionRequest;
use App\Repositories\CompositionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CompositionController extends AppBaseController
{
    /** @var  CompositionRepository */
    private $compositionRepository;

    public function __construct(CompositionRepository $compositionRepo)
    {
        $this->compositionRepository = $compositionRepo;
    }

    /**
     * Display a listing of the Composition.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->compositionRepository->pushCriteria(new RequestCriteria($request));
        $compositions = $this->compositionRepository->all();

        return view('compositions.index')
            ->with('compositions', $compositions);
    }

    /**
     * Show the form for creating a new Composition.
     *
     * @return Response
     */
    public function create()
    {
        return view('compositions.create');
    }

    /**
     * Store a newly created Composition in storage.
     *
     * @param CreateCompositionRequest $request
     *
     * @return Response
     */
    public function store(CreateCompositionRequest $request)
    {
        $input = $request->all();

        $composition = $this->compositionRepository->create($input);

        Flash::success('Composition saved successfully.');

        return redirect(route('compositions.index'));
    }

    /**
     * Display the specified Composition.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $composition = $this->compositionRepository->findWithoutFail($id);

        if (empty($composition)) {
            Flash::error('Composition not found');

            return redirect(route('compositions.index'));
        }

        return view('compositions.show')->with('composition', $composition);
    }

    /**
     * Show the form for editing the specified Composition.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $composition = $this->compositionRepository->findWithoutFail($id);

        if (empty($composition)) {
            Flash::error('Composition not found');

            return redirect(route('compositions.index'));
        }

        return view('compositions.edit')->with('composition', $composition);
    }

    /**
     * Update the specified Composition in storage.
     *
     * @param  int              $id
     * @param UpdateCompositionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCompositionRequest $request)
    {
        $composition = $this->compositionRepository->findWithoutFail($id);

        if (empty($composition)) {
            Flash::error('Composition not found');

            return redirect(route('compositions.index'));
        }

        $composition = $this->compositionRepository->update($request->all(), $id);

        Flash::success('Composition updated successfully.');

        return redirect(route('compositions.index'));
    }

    /**
     * Remove the specified Composition from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $composition = $this->compositionRepository->findWithoutFail($id);

        if (empty($composition)) {
            Flash::error('Composition not found');

            return redirect(route('compositions.index'));
        }

        $this->compositionRepository->delete($id);

        Flash::success('Composition deleted successfully.');

        return redirect(route('compositions.index'));
    }
}
