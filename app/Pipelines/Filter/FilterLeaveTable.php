<?php

namespace App\Pipelines\Filter;

use Illuminate\Database\Eloquent\Builder;
use Closure;

class FilterLeaveTable
{
    public function handle(Builder $query, Closure $next)
    {
        if (request()->has('nature_of_leave')) {
            $query->where('nature_of_leave', request('nature_of_leave'));
        }
        $next($query);
    }
}