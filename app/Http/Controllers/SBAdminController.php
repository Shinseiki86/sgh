<?php

namespace SGH\Http\Controllers;

class SBAdminController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function home()
	{
		return view('sbadmin.home');
	}

	public function mcharts()
	{
		return view('sbadmin.mcharts');
	}

	public function table()
	{
		return view('sbadmin.table');
	}

	public function form()
	{
		return view('sbadmin.form');
	}

	public function buttons()
	{
		return view('sbadmin.buttons');
	}

	public function icons()
	{
		return view('sbadmin.icons');
	}

	public function panel()
	{
		return view('sbadmin.panel');
	}

	public function typography()
	{
		return view('sbadmin.typography');
	}

	public function notifications()
	{
		return view('sbadmin.notifications');
	}

	public function blank()
	{
		return view('sbadmin.blank');
	}
	public function documentation()
	{
		return view('sbadmin.documentation');
	}

}
