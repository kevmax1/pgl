<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSerieRequest;
use App\Http\Requests\UpdateSerieRequest;
use App\Models\Serie;
use App\Repositories\SerieRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Nivau;
use App\Models\Cycle;
use App\Models\section;

class SerieController extends AppBaseController
{
    /** @var  SerieRepository */
    private $serieRepository;

    public function __construct(SerieRepository $serieRepo)
    {
        $this->serieRepository = $serieRepo;
    }

    /**
     * Display a listing of the Serie.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->serieRepository->pushCriteria(new RequestCriteria($request));
        $series = $this->serieRepository->all();

        $sections = section::all();
        $cycles = Cycle::all();
        $niveaux = Nivau::all();
        return view('modules.principal.series.index',compact('sections','cycles','niveaux'))
            ->with('series', $series);
    }

    public function find($id)
    {
        $series = Serie::where('niveau_id',$id)->get();
        return view('modules.principal.series.table')
            ->with('series', $series);
    }


    /**
     * Show the form for creating a new Serie.
     *
     * @return Response
     */
    public function create()
    {
        $sections = section::all();
        $cycles = Cycle::all();
        $niveaux = Nivau::all();
        return view('modules.principal.series.create',compact('sections','cycles','niveaux'));
    }

    /**
     * Store a newly created Serie in storage.
     *
     * @param CreateSerieRequest $request
     *
     * @return Response
     */
    public function store(CreateSerieRequest $request)
    {
        $input = $request->all();

        $serie = $this->serieRepository->create($input);

        Flash::success('Serie saved successfully.');

        return redirect(route('series.index'));
    }

    /**
     * Display the specified Serie.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $serie = $this->serieRepository->findWithoutFail($id);

        if (empty($serie)) {
            Flash::error('Serie not found');

            return redirect(route('series.index'));
        }

        return view('modules.principal.series.show')->with('serie', $serie);
    }

    /**
     * Show the form for editing the specified Serie.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $serie = $this->serieRepository->findWithoutFail($id);

        if (empty($serie)) {
            Flash::error('Serie not found');

            return redirect(route('series.index'));
        }
        $sections = section::all();
        $cycles = Cycle::all();
        $niveaux = Nivau::all();
        return view('modules.principal.series.edit',compact('sections','cycles','niveaux'))->with('serie', $serie);
    }

    /**
     * Update the specified Serie in storage.
     *
     * @param  int              $id
     * @param UpdateSerieRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSerieRequest $request)
    {
        $serie = $this->serieRepository->findWithoutFail($id);

        if (empty($serie)) {
            Flash::error('Serie not found');

            return redirect(route('series.index'));
        }

        $serie = $this->serieRepository->update($request->all(), $id);

        Flash::success('Serie updated successfully.');

        return redirect(route('series.index'));
    }

    /**
     * Remove the specified Serie from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $serie = $this->serieRepository->findWithoutFail($id);

        if (empty($serie)) {
            Flash::error('Serie not found');

            return redirect(route('series.index'));
        }

        $this->serieRepository->delete($id);

        Flash::success('Serie deleted successfully.');

        return redirect(route('series.index'));
    }
}
