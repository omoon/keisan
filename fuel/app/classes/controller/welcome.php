<?php

/**
 * The Welcome Controller.
 *
 * A basic controller example.  Has examples of how to set the
 * response body and status.
 * 
 * @package  app
 * @extends  Controller
 */
class Controller_Welcome extends Controller
{

    public function before()
    {
        parent::before();
        Config::set('language', Session::get('language'));
        Lang::load('app');
    }

	/**
	 * The basic welcome message
	 * 
	 * @access  public
	 * @return  Response
	 */
	public function action_index()
	{
        Session::set('value_1', rand(1, 10));
        Session::set('value_2', rand(1, 10));
        $data['kekka'] = Session::get_flash('kekka');
		return Response::forge(View::forge('welcome/index', $data));
	}

	/**
	 * The basic welcome message
	 * 
	 * @access  public
	 * @return  Response
	 */
	public function action_calc()
	{
        if (Session::get('value_1') + Session::get('value_2') == Input::post('answer')) {
            Session::set_flash('kekka', 'OK');
        } else {
            Session::set_flash('kekka', 'NG');
        }

		return Response::redirect('/');
	}

	/**
	 * The basic welcome message
	 * 
	 * @access  public
	 * @return  Response
	 */
	public function action_lang()
	{
        Session::set('language', $this->param('lang'));
		return Response::redirect('/');
	}

	/**
	 * A typical "Hello, Bob!" type example.  This uses a ViewModel to
	 * show how to use them.
	 * 
	 * @access  public
	 * @return  Response
	 */
	public function action_hello()
	{
		return Response::forge(ViewModel::forge('welcome/hello'));
	}

	/**
	 * The 404 action for the application.
	 * 
	 * @access  public
	 * @return  Response
	 */
	public function action_404()
	{
		return Response::forge(ViewModel::forge('welcome/404'), 404);
	}
}
