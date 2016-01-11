<?php namespace App\Http\Controllers\Home;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ListController extends BaseController {

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
	    $result = array('success' => false, 'msg' => '授权失败');
	    if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
	        $client = $this->getClient();
            $client = $this->authCallback($client);
            
            $drive_service = new \Google_Service_Calendar($client);
            $calendarList = $drive_service->calendarList->listCalendarList();
            $result = array('success' => true, 'msg' => '取得成功', 'cList' => $calendarList);
	    }
        return json_encode($result);
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
    public function checkAuthed(){
        $authed = false;
        if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
            $authed = true;
        }
        return json_encode(array('authed' => $authed, 'ss' => $_SESSION));
    }
}
