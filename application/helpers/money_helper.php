<?php if (!defined('BASEPATH'))
	exit('No direct script access allowed');


if (!function_exists('remove_money_php')) {
	function remove_money_php($money = null)
	{
		return str_replace('&#8369;', '', $money);
	}
}

if (!function_exists('money_php')) {

	function money_php($_string = FALSE, $_sign = FALSE)
	{

		$_return = '';

		// if ( $_string != '' ) {

		$_string = number_format($_string, 2, '.', ',');

		if ($_sign) {

			$_return = $_sign . ' ' . $_string;
		} else {

			$_return = '&#8369;  ' . $_string;
		}
		// }

		return $_return;
	}
}
