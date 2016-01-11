<?php namespace App\Http\Controllers\Home;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class BaseController extends Controller {

    protected $client;

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
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
     * 空操作
     * @author lixiaoli
     * @since 2015/03/24
     */
    public function _empty() {
        header("HTTP/1.0 404 Not Found");
        //使HTTP返回404状态码
        $this->display("Public:404");
    }

    /**
     * 返回历史页面
     * @author lixiaoli
     * @since 2015/03/24
     */
    public function goHistory() {
        echo '<script>history.back();</script>';
        die ;
    }

    public function getClient($scope = '') {
        if ($this->client) return $this->client;
        
        //注册自动加载，在composer中加入"google/apiclient": "dev-master"，install一下就可以了
        //require_once (APP_PATH . 'common/google/google-api-php-client/src/Google/autoload.php');
        //默认日历
        $scope = $scope ? $scope : \Google_Service_Calendar::CALENDAR;
        
        $this->client = $client = new \Google_Client();
        
        $client->setAuthConfigFile(app('path') . '/Libs/google/client_secret.json');
        $client->addScope($scope);
        
        return $client;
    }
    
    /**
     * 设置认证
     */
    public function authCallback($client) {
        //已经认证
        if (\Session::has('access_token') && session('access_token')) {
            
            $client->setAccessToken(session('access_token'));
            return $client;
            
        } else {//尚未认证，跳转到认证页面
            
            $redirect_uri = url('/home/auth/oauth2callback');
            header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
            exit;
            
        }
    }
}
