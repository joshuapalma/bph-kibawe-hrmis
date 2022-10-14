<?php

namespace App\Pipelines\Search;

use Illuminate\Database\Eloquent\Builder;
use Closure;

class SearchEmployeeProfileTable
{
    public function handle(Builder $query, Closure $next)
    {
        if (request()->has('search')) {
            $query->where(function($query){
                $query->orWhere('complete_name', 'LIKE', "%".request('search')."%")
                    ->orWhere('first_name', 'LIKE', "%".request('search')."%")
                    ->orWhere('middle_name', 'LIKE', "%".request('search')."%")
                    ->orWhere('last_name', 'LIKE', "%".request('search')."%")
                    ->orWhere('address', 'LIKE', "%".request('search')."%")
                    ->orWhere('designation', 'LIKE', "%".request('search')."%");
            });
        }
        $next($query);
    }
}