<?php

namespace App\Services\Admin;

use App\Models\Barrow;
use App\Models\User;
use Exception;

class HomeService
{
    /**
     * Return dashboard data.
     *
     * @return array
     * @throws Exception
     */
    public function index()
    {
        $pending_requests = Barrow::where('status', 'pending')->orderBy('created_at', 'asc');
        $total_requests = Barrow::all()->count();
        $total_user = User::where('is_admin', '0')->count();
        $success_requests = Barrow::where('status', 'successful')->count();
        return  [
            'total_users_count' => $total_user,
            'pending_requests' => $pending_requests->count(),
            'success_requests' => $success_requests,
            'total_requests' => $total_requests,
            'header' => 'Anasayfa'
        ];
    }


}
