<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Blog;
use App\Models\Client;
use App\Models\ContactUs;
use App\Models\Payment;
use App\Models\Plan;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{

    /**
     * Show home in dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function showHome()
    {
        $plans = Plan::all();
        $numberOfAdmins = Admin::count();
        $numberOfClients = Client::count();
        $numberOfBlogs = Blog::count();
        $numberOfPlans = Plan::count();
        $numberOfPayments = Payment::count();
        $numberOfContactUss = ContactUs::count();
        
        $data = [
            'plans' => $plans,
            'numberOfAdmins' => $numberOfAdmins,
            'numberOfClients' => $numberOfClients,
            'numberOfBlogs' => $numberOfBlogs,
            'numberOfPlans' => $numberOfPlans,
            'numberOfPayments' => $numberOfPayments,
            'numberOfContactUss' => $numberOfContactUss,
        ];
        return response()->view('cms.admin.home', $data);
    }
}
