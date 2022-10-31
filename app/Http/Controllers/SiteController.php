<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Client;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Plan;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    /**
     * Show the home in site.
     *
     * @return \Illuminate\Http\Response
     */
    public function showHome(Request $request)
    {
        $referrer = null;
        if ($request->has('ref')) {
            $referrer = Client::find($request->query('ref'));
        }

        $client = Client::count() + 10000 ;
        $orders = Order::all();
        $order_count = $orders->pluck('price')->sum();
		

        $plans = Plan::all();
        $blogs = Blog::latest()->take(3)->get();
        $payments = Payment::latest()->take(4)->get();


        $data = [
            'order_count' => $order_count,
            'client' => $client,
            'plans' => $plans,
            'blogs' => $blogs,
            'payments' => $payments,
            'ref' => $referrer
        ];
        return response()->view('site.home', $data);
    }

    /**
     * Show the plan in site.
     *
     * @return \Illuminate\Http\Response
     */
    public function showPlan(Request $request)
    {
        $referrer = null;
        if ($request->has('ref')) {
            $referrer = Client::find($request->query('ref'));
        }

        $plans = Plan::all();
        return response()->view('site.plan', [
            'plans' => $plans,
            'ref' => $referrer
        ]);
    }
    /**
     * Show the blog in site.
     *
     * @return \Illuminate\Http\Response
     */
    public function showBlog(Request $request)
    {
        $referrer = null;
        if ($request->has('ref')) {
            $referrer = Client::find($request->query('ref'));
        }


        $blogs = Blog::all();
        return response()->view('site.blog.blog', [
            'blogs' => $blogs,
            'ref' => $referrer
        ]);
    }

    /**
     * Show the blog details in site.
     *
     * @return \Illuminate\Http\Response
     */
    public function showBlogDetails(Blog $blog, Request $request)
    {
        $referrer = null;
        if ($request->has('ref')) {
            $referrer = Client::find($request->query('ref'));
        }


        $blogs = Blog::latest()->take(3)->get();
        return response()->view('site.blog.details', [
            'blogs' => $blogs, 'blog' => $blog,
            'ref' => $referrer
        ]);
    }

    /**
     * Show the aboute us in site.
     *
     * @return \Illuminate\Http\Response
     */
    public function showAboutUs(Request $request)
    {
        $referrer = null;
        if ($request->has('ref')) {
            $referrer = Client::find($request->query('ref'));
        }


        return response()->view('site.about', [
            'ref' => $referrer
        ]);
    }

    /**
     * Show the aboute us in site.
     *
     * @return \Illuminate\Http\Response
     */
    public function showContactUs(Request $request)
    {
        $referrer = null;
        if ($request->has('ref')) {
            $referrer = Client::find($request->query('ref'));
        }


        return response()->view('site.contact', [
            'ref' => $referrer
        ]);
    }

    /**
     * Show the FAQ in site.
     *
     * @return \Illuminate\Http\Response
     */
    public function showFaq(Request $request)
    {
        $referrer = null;
        if ($request->has('ref')) {
            $referrer = Client::find($request->query('ref'));
        }


        return response()->view('site.faq', [
            'ref' => $referrer
        ]);
    }

    /**
     * Show the Term & Conditions in site.
     *
     * @return \Illuminate\Http\Response
     */
    public function showTerm(Request $request)
    {
        $referrer = null;
        if ($request->has('ref')) {
            $referrer = Client::find($request->query('ref'));
        }


        return response()->view('site.term', [
            'ref' => $referrer
        ]);
    }

    /**
     * Show the Privacy Policy in site.
     *
     * @return \Illuminate\Http\Response
     */
    public function showPrivacy(Request $request)
    {
        $referrer = null;
        if ($request->has('ref')) {
            $referrer = Client::find($request->query('ref'));
        }

        return response()->view('site.privacy', [
            'ref' => $referrer
        ]);
    }
}
