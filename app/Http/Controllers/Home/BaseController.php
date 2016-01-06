<?php namespace App\Http\Controllers\Home;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ListController extends Controller {

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
    protected $client;

    public function _initialize() {
        $loginname = cookie('loginname');
        if (!isset($loginname)) {
            //$this->redirect(U('Home/Login/login'));
        } else {
            if (cookie('remember')) {
                cookie('worker_no', cookie('worker_no'));
                cookie('loginname', cookie('loginname'));
                cookie('password', cookie('password'));
                cookie('remember', cookie('remember'));
            } else {
                cookie('worker_no', cookie('worker_no'), 0);
                cookie('loginname', cookie('loginname'), 0);
                cookie('password', cookie('password'), 0);
            }

            $worker_no = cookie('worker_no');
            $this->worker_no = $worker_no;
            //工程师工号
            $this->workerInfo = M('JobsWorkers')->where("worker_no = $worker_no")->find(); ;//工程师信息
            $this->username = $this->workerInfo['true_name'];
            //当前登录名
        }
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
        
        //注册自动加载
        require_once (APP_PATH . 'common/google/google-api-php-client/src/Google/autoload.php');
        //默认日历
        $scope = $scope ? $scope : \Google_Service_Calendar::CALENDAR;
        
        $this->client = $client = new \Google_Client();
        
        $client->setAuthConfigFile(APP_PATH . 'common/google/client_secret.json');
        $client->addScope($scope);
        
        return $client;
    }
}
