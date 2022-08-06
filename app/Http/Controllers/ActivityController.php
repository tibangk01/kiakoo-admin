<?php

namespace App\Http\Controllers;

use Spatie\Activitylog\Models\Activity;
use App\Repositories\ActivityRepository;

class ActivityController extends Controller
{
    protected $repository;

    public function __construct()
    {
        $this->middleware(['role:administrateur','permission:gerer_journal_d_activites']);

        $this->repository = new ActivityRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.activities.index', [
            'activities' => $this->repository->withIndexRelation(),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Activity $activity)
    {
        return view('dashboard.activities.show', [
            'activity' => $this->repository->withShowRelation($activity->id),
        ]);
    }
}
