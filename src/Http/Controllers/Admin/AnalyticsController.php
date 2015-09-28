<?php

namespace Whole\Core\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Spatie\LaravelAnalytics\LaravelAnalyticsFacade as LaravelAnalytics;
use Whole\Core\Logs\Facade\Logs;
class AnalyticsController extends Controller
{
    public function index()
    {
        try {
            $active_user = $this->getActiveUser();
            $today_visited_pages = LaravelAnalytics::getMostVisitedPages(1, 1000);
            $all_visited_pages = LaravelAnalytics::getMostVisitedPages();
            $referrers = LaravelAnalytics::getTopReferrers();
            $browsers = LaravelAnalytics::getTopBrowsers();
            $keywords = LaravelAnalytics::getTopKeywords();
            $today_and_yesterday = LaravelAnalytics::getVisitorsAndPageViews(1);
            $last_week = LaravelAnalytics::getVisitorsAndPageViewsForPeriod(Carbon::today()->subWeeks(2)->addDays(1), Carbon::today()->subWeeks(1));
            $this_week = LaravelAnalytics::getVisitorsAndPageViewsForPeriod(Carbon::today()->subWeeks(1)->addDays(1), Carbon::today());
            return view('backend::analytics.index',compact('this_week','last_week','today_and_yesterday','active_user','today_visited_pages','all_visited_pages','referrers','browsers','keywords'))->with('response',true);
        }catch (\Exception $e)
        {
            Logs::add('errors',trans("whole::http.controllers.analytics_log_errors_1"));
            return view('backend::analytics.index')->with('response',false);
        }
    }

    public function getActiveUser()
    {
        try{
            return is_numeric(LaravelAnalytics::getActiveUsers())?
                ['true',LaravelAnalytics::getActiveUsers()] :
                ['true',0];
        }
        catch (\Exception $e)
        {
            Logs::add('errors',trans("whole::http.controllers.analytics_log_errors_2"));
            return ['false',trans("whole::http.controllers.analytics_active_user_limit")];
        }
    }
}
