<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kurt\Google\Analytics\Analytics as GoogleAnalytics;
use Kurt\Google\Analytics\Exceptions;
use Carbon\Carbon;

class AnalyticsController extends Controller
{
    private $ga;

    public function __construct(GoogleAnalytics $ga) {
        $this->ga = $ga;
        $this->middleware('auth');
    }

    public function index()
    {
        $results = $this->ga->getPageViewsByDate();
        $data = collect($results['rows']);
        // return dd($results);
        return view('admin.analytics')->with('analytics', $data);
    }
}
