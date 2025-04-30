<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActivityLogService
{
    public function postlog(Request $request, string $activity)
    {
        $activityData = [
            'user_id'   => Auth::id(),
            'activity'   => $activity,
            'url'        => $request->fullUrl(),
            'method'     => $request->method(),
            'source_ip'  => $request->ip(),
            'device'     => $request->header('User-Agent'),
            'timestamp'  => now(),
        ];
        $this->store($activityData);
    }
    public function getlog(string $activity)
    {
        $request = request(); // Automatically get the current request
        
        $activityData = [
            'user_id'     => Auth::id(),
            'activity'    => $activity,
            'url'         => $request->fullUrl(),
            'method'      => $request->method(),
            'source_ip'   => $request->ip(),
            'device'      => $request->header('User-Agent'),
            'timestamp'   => now(),
        ];
        
        $this->store($activityData);
    }
    public function store(array $data)
    {
        \App\Models\ActivityLog::create($data);
    }

}
