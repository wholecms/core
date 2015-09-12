<?php
/**
 * Created by PhpStorm.
 * User: Furkan
 * Date: 3.9.2015
 * Time: 00:01
 */

namespace Whole\Core\Injections;

use Carbon\Carbon;
use Mockery\CountValidator\Exception;
use Spatie\LaravelAnalytics\LaravelAnalyticsFacade as LaravelAnalytics;

class AnalyticsInjection
{

    public function todayAndYesterday()
    {
        try {
            return LaravelAnalytics::getVisitorsAndPageViews(1);
        }catch (\Exception $e)
        {
            return false;
        }
    }

    public function lastWeek()
    {
        try {
            return LaravelAnalytics::getVisitorsAndPageViewsForPeriod(Carbon::today()->subWeeks(2)->addDays(1),Carbon::today()->subWeeks(1));
        }catch (\Exception $e)
        {
            return false;
        }
    }

    public function thisWeek()
    {
        try {
            return LaravelAnalytics::getVisitorsAndPageViewsForPeriod(Carbon::today()->subWeeks(1)->addDays(1),Carbon::today());
        }catch (\Exception $e)
        {
            return false;
        }
    }

}