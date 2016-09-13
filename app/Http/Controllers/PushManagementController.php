<?php

namespace App\Http\Controllers;

use App\TPushInfo;
use Illuminate\Http\Request;
use App\Http\Requests;


class PushManagementController extends Controller
{

    public function pushmanagement(){
        return view('push.pushmanagement');
    }

    public function confirmlog(){
        return view('push.confirmlog');
    }

    public function confirmpast(Request $request){
        if(isset($request->statistic) && $request->statistic == 1){
            $this->validate($request,[
                'daystart' =>'date_format:Y/m/d H:i|required',
                'dayend' =>'date_format:Y/m/d H:i|required',
            ],[
                'daystart.required'=>'Không được để trống ngày bắt đầu',
                'dayend.required'=>'Không được để trống ngày kết thúc',
                'daystart.date_format'=>'Sai định dạng ngày tháng',
                'dayend.date_format' =>'Sai định dạng ngày tháng',
            ]);
            $start = $request->daystart;
            $end = $request->dayend;
            $data = TPushInfo::whereBetween('PUSH_RESERVATION_DATE',[$start,$end])->paginate(10);
            if($data == '') $data = 'not found';
            return view('push.confirmpast',compact('data'));
        }else{
            return view('push.confirmpast');
        }
    }

    public function pushManagementRegister(){
        return view('push.push_management_register');
    }

    public function pushManagementRegisterImmediately(){
        return view('push.push_management_register_immediately');
    }

    public function pushManagementConfirmImmediately(){
        return view('push.push_management_confirm_immediately');
    }

    public function pushManagementConfirm(){
        return view('push.push_management_confirm');
    }

    public function pushManagementUpdate(){
        return view('push.push_management_update');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
