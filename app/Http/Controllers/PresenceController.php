<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePresenceRequest;
use App\Http\Requests\UpdatePresenceRequest;
use App\Repositories\PresenceRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PresenceController extends AppBaseController
{
    /** @var  PresenceRepository */
    private $presenceRepository;

    public function __construct(PresenceRepository $presenceRepo)
    {
        $this->presenceRepository = $presenceRepo;
    }

    /**
     * Display a listing of the Presence.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->presenceRepository->pushCriteria(new RequestCriteria($request));
        $presences = $this->presenceRepository->all();

        return view('presences.index')
            ->with('presences', $presences);
    }

    /**
     * Show the form for creating a new Presence.
     *
     * @return Response
     */
    public function create()
    {
        return view('presences.create');
    }

    /**
     * Store a newly created Presence in storage.
     *
     * @param CreatePresenceRequest $request
     *
     * @return Response
     */
    public function store(CreatePresenceRequest $request)
    {
        $input = $request->all();

        $presence = $this->presenceRepository->create($input);

        Flash::success('Presence saved successfully.');

        return redirect(route('presences.index'));
    }

    /**
     * Display the specified Presence.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $presence = $this->presenceRepository->findWithoutFail($id);

        if (empty($presence)) {
            Flash::error('Presence not found');

            return redirect(route('presences.index'));
        }

        return view('presences.show')->with('presence', $presence);
    }

    /**
     * Show the form for editing the specified Presence.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $presence = $this->presenceRepository->findWithoutFail($id);

        if (empty($presence)) {
            Flash::error('Presence not found');

            return redirect(route('presences.index'));
        }

        return view('presences.edit')->with('presence', $presence);
    }

    /**
     * Update the specified Presence in storage.
     *
     * @param  int              $id
     * @param UpdatePresenceRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePresenceRequest $request)
    {
        $presence = $this->presenceRepository->findWithoutFail($id);

        if (empty($presence)) {
            Flash::error('Presence not found');

            return redirect(route('presences.index'));
        }

        $presence = $this->presenceRepository->update($request->all(), $id);

        Flash::success('Presence updated successfully.');

        return redirect(route('presences.index'));
    }

    /**
     * Remove the specified Presence from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $presence = $this->presenceRepository->findWithoutFail($id);

        if (empty($presence)) {
            Flash::error('Presence not found');

            return redirect(route('presences.index'));
        }

        $this->presenceRepository->delete($id);

        Flash::success('Presence deleted successfully.');

        return redirect(route('presences.index'));
    }
}
