<?php

/**
 * Reads log directory and files
 *
 * @class      Model
 * @package    Fire
 * @version    0.1
 * @author     Keith Loy
 * @license    MIT License
 * @copyright  2011 - 2012 Keith Loy
 * @link       http://keithloy.me
 */

namespace Fire;

class Model
{
	protected $_log_path = '';
	protected $_log_dir = array();
	protected $_months = array();
	protected $_month_names = array(
		'01' => 'January',
		'02' => 'February',
		'03' => 'March',
		'04' => 'April',
		'05' => 'May',
		'06' => 'June',
		'07' => 'July',
		'08' => 'August',
		'09' => 'September',
		'10' => 'October',
		'11' => 'November',
		'12' => 'December',
	);

	static function forge()
	{
		return new static(\Config::get('log_path'));
	}

	function __construct($log_path)
	{
		$this->_log_path = $log_path;
	}

	function get_log_path()
	{
		return $this->_log_path;
	}

	function get_log_dir()
	{
		$logs = $this->_log_dir;
		if (count($logs) === 0)
		{
			$logs = \File::read_dir($this->_log_path);
			$this->_log_dir = $logs;
		}

		return $logs;
	}

	// returns all years
	function get_years()
	{
		$path = $this->get_log_path();
		$logs = array_keys($this->get_log_dir());
		$years = array();

		foreach($logs as $year)
		{
			if (is_dir($path.$year))
			{
				$years[] = array(
					'val' => str_replace('/', '', $year),
					'link' => \Uri::create("logs/months/".str_replace('/', '', $year)),
					'ymd' => null,
				);
			}
		}

		return $years;
	}

	// given a year, returns all months
	function get_months($year)
	{
		$path = $this->get_log_path();
		$logs = $this->get_log_dir();
		$months = array();

		foreach($logs[$year.'/'] as $month => $log_files)
		{
			$full_path = $path.$year.'/'.$month;
			if (is_dir($full_path))
			{
				$month_name = $this->_month_names[str_replace('/', '', $month)];
				$months[] = array(
					'val' => $month_name,
					'link' => \Uri::create("logs/days/{$year}_".str_replace('/', '', $month)),
					'ymd' => 'year',
				);
			}
		}

		return $months;
	}

	// given a year and month, returns all days
	function get_days($year, $month)
	{
		$contents = $this->get_log_dir();
		$month_dir_contents = $contents[$year.'/'][$month.'/'];
		$path = $this->get_log_path().$year.'/'.$month.'/';
		$logs = array();

		foreach($month_dir_contents as $log)
		{
			if (is_file($path.$log))
			{
				$d = str_replace('.php', '', $log);
				$logs[] = array(
					'val' => $d,
					'link' => \Uri::create("logs/errors/{$year}_{$month}_{$d}"),
					'ymd' => 'month',
				);
			}
		}

		return $logs;
	}

	// given log path, returns log contents
	function get_log($year, $month, $day)
	{
		$log_path = $this->get_log_path().$year.'/'.$month.'/'.$day.'.php';
		$log = file($log_path);
		$filter_callback = function ($val) {
			if (trim($val) === '') return false;
			else if (strpos($val, '<?php') !== false) return false;
			else return true;
		};
		$log = array_filter($log, $filter_callback);
		return $log;
	}

	// given log path, returns log error contents
	function get_errors($year, $month, $day)
	{
		$log = $this->get_log($year, $month, $day);

		$filter_callback = function ($val) {
			return strpos($val, 'Error - ') === false ? false : true;
		};
		$errors = array_filter($log, $filter_callback);

		return $errors;
	}

	// given log path, returns log warning contents
	function get_warnings($year, $month, $day)
	{
		$log = $this->get_log($year, $month, $day);

		$filter_callback = function ($val) {
			return strpos($val, 'Warning - ') === false ? false : true;
		};
		$errors = array_filter($log, $filter_callback);

		return $errors;
	}

	// given log path, returns log info contents
	function get_infos($year, $month, $day)
	{
		$log = $this->get_log($year, $month, $day);

		$filter_callback = function ($val) {
			return strpos($val, 'Info - ') === false ? false : true;
		};
		$errors = array_filter($log, $filter_callback);

		return $errors;
	}
}