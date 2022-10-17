<?php

namespace App\Pipelines\Filter;

use Closure;
use Illuminate\Database\Eloquent\Builder;

class DateFilter
{
    public function handle(Builder $query, Closure $next)
    {
        if (request()->has('from_date') && request()->has('to_date')) {
            $from = date('Y-m-d' . ' 00:00:00', strtotime(request('from_date')));
            $to = date('Y-m-d' . ' 00:00:00', strtotime(request('to_date')));

            $query->whereBetween('created_at', [$from, $to]);
        }

        return $next($query);
    }
}