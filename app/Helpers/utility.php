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
			0 => 'Vacation Leave',
			1 => 'Mandatory / Force Leave',
			2 => 'Sick Leave',
			3 => 'Maternity Leave',
			4 => 'Paternity Leave',
			5 => 'Special Privilege Leave',
			6 => 'Solo Parent Leave',
			7 => 'Study Leave',
			8 => '10-Day VAWC Leave',
			9 => 'Rehabilitation Privilege',
			10 => 'Special Emergency ( Calamity) Leave',
			11 => 'Special Leave Benefits for Women',
			12 => 'Adoption Leave'
		];
	}
}