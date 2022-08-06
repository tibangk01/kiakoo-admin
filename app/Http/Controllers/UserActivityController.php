<?php

namespace App\Http\Controllers;

use App\Repositories\ActivityRepository;

class UserActivityController extends Controller
{
    protected $activityRepository;

    public function __construct()
    {
        $this->activityRepository = new ActivityRepository;
    }

    public function show($userId)
    {
        return view('dashboard.user-activities.show', [
            'activities' =>  $this->activityRepository
                ->findWhere($userId),
        ]);
    }
}
