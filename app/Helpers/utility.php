<?php

use App\Models\EmployeeProfile;

if (!function_exists('getEmployeeName')) {
	function getEmployeeName() {
		return EmployeeProfile::pluck('complete_name', 'complete_name')->toArray();
	}
}

if (!function_exists('getNatureOfLeave')) {
	function getNatureOfLeave() {
		return [
			'Vacation Leave' => 'Vacation Leave',
			'Mandatory / Force Leave' => 'Mandatory / Force Leave',
			'Sick Leave' => 'Sick Leave',
			'Maternity Leave' => 'Maternity Leave',
			'Paternity Leave' => 'Paternity Leave',
			'Special Privilege Leave' => 'Special Privilege Leave',
			'Solo Parent Leave' => 'Solo Parent Leave',
			'Study Leave' => 'Study Leave',
			'10-Day VAWC Leave' => '10-Day VAWC Leave',
			'Rehabilitation Privilege' => 'Rehabilitation Privilege',
			'Special Emergency ( Calamity) Leave' => 'Special Emergency ( Calamity) Leave',
			'Special Leave Benefits for Women' => 'Special Leave Benefits for Women',
			'Adoption Leave' => 'Adoption Leave',
			'Specify Others' => 'Specify Others' 
		];
	}
}