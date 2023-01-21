<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('get_percentage')) {
	function get_percentage($value, $total_value)
	{
		if ($total_value)
			return round(($value / $total_value) * 100, 2);

		return round(0, 2);
	}
}
