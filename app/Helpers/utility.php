<?php

use App\Models\EmployeeProfile;

if (!function_exists('getEmployeeName')) {
	function getEmployeeName() {
		return EmployeeProfile::pluck('complete_name', 'complete_name')->toArray();
	}
}