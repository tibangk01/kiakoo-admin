<?php

namespace App\Services;


class ActivityService
{
    /**
     * log
     *
     * @param string $logName
     * @param \Illuminate\Database\Eloquent\Model $sourceModel
     * @param \Illuminate\Database\Eloquent\Model $targetModel
     * @param string $event
     * @param mixed $data
     * @param string $log
     * @return void
     */
    public function log(
        $logName,
        $sourceModel,
        $targetModel,
        $event,
        $data,
        $log
    ) {
        activity()
            ->useLog($logName)
            ->causedBy($sourceModel)
            ->on($targetModel)
            ->event($event)
            ->withProperties(['attributes' => $data])
            ->log($log);
    }
}
