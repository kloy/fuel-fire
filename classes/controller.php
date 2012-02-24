<?php

/**
 * Request logic for Fire
 *
 * @class      Controller
 * @package    Fire
 * @version    0.1
 * @author     Keith Loy
 * @license    MIT License
 * @copyright  2011 - 2012 Keith Loy
 * @link       http://keithloy.me
 */

namespace Fire;

class Controller extends \Controller_Rest
{
    protected $rest_format = 'json';

    function get_index()
    {
        $this->format = 'html';

        $data = array();
        $view = \View::forge(__DIR__.'/../views/index.php', $data);

        return $this->response(\View::forge(__DIR__.'/../views/index.php', $data));
    }

    function get_years()
    {
		$model = Model::forge();
		$data = $model->get_years();

        return $this->response($data);
    }

    function get_months($year)
    {
		$model = Model::forge();
		$data = $model->get_months($year);

        return $this->response($data);
    }

    function get_logs($year_month)
    {
		$split = explode('_', $year_month);
		$model = Model::forge();
		$data = $model->get_logs($split[0], $split[1]);

        return $this->response($data);;
    }

    function get_log($year_month_day)
    {
		$split = explode('_', $year_month_day);
		$model = Model::forge();
		$data = $model->get_log($split[0], $split[1], $split[2]);

		return $this->response($data);
    }

    function get_errors($year_month_day)
    {
		$split = explode('_', $year_month_day);
		$model = Model::forge();
		$data = $model->get_errors($split[0], $split[1], $split[2]);

		return $this->response($data);
    }

    function get_warnings($year_month_day)
    {
        $split = explode('_', $year_month_day);
        $model = Model::forge();
        $data = $model->get_warnings($split[0], $split[1], $split[2]);

        return $this->response($data);
    }
}