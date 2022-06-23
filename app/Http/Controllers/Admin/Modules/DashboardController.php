<?php

// Controller namespacing.
namespace App\Http\Controllers\Admin\Modules;
use App\Http\Controllers\Controller;

// Facades.
use Analytics;
use Spatie\Analytics\Period;

// Models.
use App\Models\Post;

// Traits
use App\Traits\HasRightsTrait;

class DashboardController extends Controller
{
    /**
    * Traits
    *
    */
    use HasRightsTrait;

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        // Fetch the visitors per page per period.
        $visitorsDay = Analytics::fetchVisitorsAndPageViews(Period::days(1));
        $visitorsWeek = Analytics::fetchVisitorsAndPageViews(Period::days(7));
        $visitorsMonth = Analytics::fetchVisitorsAndPageViews(Period::days(30));

        // Fetcht the top 5 browsers.
        $browser = Analytics::fetchTopBrowsers(Period::days(30), 5);

        // Init view.
        return view('admin.modules.dashboard.index', compact('visitorsDay', 'visitorsWeek', 'visitorsMonth', 'browser'));
    }
}
