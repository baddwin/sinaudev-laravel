<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kurt\Google\Analytics\Analytics as GoogleAnalytics;

class AnalyticsController extends Controller
{
    private $ga;

    public function __construct(GoogleAnalytics $ga) {
        $this->ga = $ga;
        $this->middleware('auth');
    }

    public function index()
    {
        $results = $this->ga->getUsersAndPageviewsOverTime();

        return $results;
    }
}
