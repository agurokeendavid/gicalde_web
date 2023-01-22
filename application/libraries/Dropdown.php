<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dropdown
{
	private static $cache = array();

	public static function get_static($name, $value = false, $action = "form")
	{
		if (isset(self::$cache['static' . $name])) {
			$array = self::$cache['static' . $name];
			if (($value) || ($action != "form")) {
				return @$array[$value];
			}
			return $array;
		}
		switch ($name) {
			case 'bool':
				$array = array(
					'' => 'Select Value',
					0 => 'No',
					1 => 'Yes'
				);
				break;
			case 'roles':
				$array = array(
					'' => 'Select Value',
					1 => 'ADMINISTRATOR',
					2 => 'STAFF',
					3 => 'CLIENT'
				);
				break;
			case 'gender':
				$array = array(
					'' => 'Select Value',
					'MALE' => 'MALE',
					'FEMALE' => 'FEMALE',
				);
				break;
			case 'days':
				$array = array('' => 'Select Day', '1' => 'Monday', '2' => 'Tuesday', '3' => 'Wednesday', '4' => 'Thursday', '5' => 'Friday', '6' => 'Saturday', '7' => 'Sunday');
				break;
			case 'civil_status':
				$array = array(
					'' => 'Select Civil Status',
					1 => 'Single',
					2 => 'Married',
					3 => 'Widow/Widower',
					4 => 'Divorced',
					5 => 'Separated'
				);
				break;
			case 'payment_status':
				$array = array(
					'' => 'Select Value',
					1 => 'PENDING',
					2 => 'PARTIAL',
					3 => 'FULL',
					4 => 'LATE'
				);
				break;
			case 'reservation_status':
				$array = array(
					'' => 'Select Value',
					1 => 'PENDING',
					2 => 'ONGOING',
					3 => 'COMPLETED',
					4 => 'CANCELLED',
				);
				break;
			case 'mode_of_payment_walk_in':
				$array = array(
					'' => 'Select Value',
					'GCASH' => 'GCASH',
					'BANK TRANSFER' => 'BANK TRANSFER',
					'CASH' => 'CASH',
				);
				break;
			case 'discount_type':
				$array = array(
					'' => 'Select Value',
					'PWD/SENIOR CITIZEN' => 'PWD/SENIOR CITIZEN',
					'OTHERS' => 'OTHERS'
				);
				break;
			case 'mode_of_payment_online':
				$array = array(
					'' => 'Select Value',
					'GCASH' => 'GCASH',
					'BANK TRANSFER' => 'BANK TRANSFER'
				);
				break;
			case 'reservation_type':
				$array = array(
					'' => 'Select Value',
					1 => 'ONLINE',
					2 => 'WALK IN'
				);
				break;
			default:
				$array = array();
				break;
		}

		// set variable cache
		self::$cache['static' . $name] = $array;

		if (($value) || ($action != "form")) {
			return @$array[$value];
		}

		return $array;
	}
}
