<?php namespace App\Http\Controllers\Home;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AuthController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
	    $client = $this->getClient();
        $client = $this->authCallback($client);return 123;
        return '<script>window.close();</script>';
        /*$drive_service = new \Google_Service_Calendar($client);
        $calendarList = $drive_service->calendarList->listCalendarList();
        return json_encode($calendarList);*/
		return view('home.list.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
    /**
     * 重定向到此，验证是否认证
     */
    public function oauth2callback() {
        $client = $this->getClient();
        
        $client->setRedirectUri(url('/home/auth/oauth2callback'));

        //如果尚未认证，生成认证URL
        if (!isset($_GET['code'])) {
            
            $auth_url = $client->createAuthUrl();
            header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
            exit;
            
        } else {//保存认证信息
            
            $client->authenticate($_GET['code']);
            $_SESSION['access_token'] = $client->getAccessToken();
            return '<script>window.close();</script>';
        }
    }

    /**
     * 设置认证
     */
    public function authCallback($client) {

        if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
            $client->setAccessToken($_SESSION['access_token']);
            return $client;
        } else {
            $redirect_uri = url('/home/auth/oauth2callback');
            header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
            exit;
        }
    }

}
