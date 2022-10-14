<?php

namespace App\Pipelines\Search;

use Illuminate\Database\Eloquent\Builder;
use Closure;

class SearchLeaveTable
{
    public function handle(Builder $query, Closure $next)
    {
        if (request()->has('search')) {
            $query->where(function($query){
                $query->orWhere('name', 'LIKE', "%".request('search')."%")
                    ->orWhere('designation', 'LIKE', "%".request('search')."%")
                    ->orWhere('nature_of_leave', 'LIKE', "%".request('search')."%");
            });
        }
        $next($query);
    }
}