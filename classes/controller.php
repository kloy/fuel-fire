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

        $model = Model::forge();
        $data['years'] = $model->get_years();
        $view = \View::forge(__DIR__.'/../views/index.php', $data);

        return $this->response(\View::forge(__DIR__.'/../views/index.php', $data));
    }

    function get_years()
    {
		$model = Model::forge();
		$data = $model->get_years();

        if (count($data) === 0) $data = array(null);

        return $this->response($data);
    }

    function get_months($year)
    {
        if ($year === null)
            return $this->response(array($year . " not found"), 404);

		$model = Model::forge();
		$data = $model->get_months($year);

        if (count($data) === 0) $data = array(null);

        return $this->response($data);
    }

    function get_logs($year_month = null)
    {
        if ($year_month === null)
            return $this->response(array($year_month . " not found"), 404);

		$model = Model::forge();
		$data = call_user_func_array(array($model, 'get_logs'), explode('_', $year_month));

        if (count($data) === 0) $data = array(null);

        return $this->response($data);
    }

    protected function _get_log_action($method, $year_month_day = null)
    {
        if ($year_month_day === null)
            return $this->response(array($year_month_day . " not found"), 404);

        $split = explode('_', $year_month_day);
        $model = Model::forge();
        $data = call_user_func_array(array($model, "get_$method"), explode('_', $year_month_day));

        if (count($data) === 0) $data = array(null);

        return $this->response($data);
    }

    function get_log($year_month_day = null)
    {
        return $this->_get_log_action('log', $year_month_day);
    }

    function get_errors($year_month_day = null)
    {
		return $this->_get_log_action('errors', $year_month_day);
    }

    function get_warnings($year_month_day = null)
    {
        return $this->_get_log_action('warnings', $year_month_day);
    }

    function get_infos($year_month_day)
    {
        return $this->_get_log_action('infos', $year_month_day);
    }
}