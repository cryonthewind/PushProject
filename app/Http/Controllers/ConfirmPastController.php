<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\TPushInfo;
//use Maatwebsite\Excel\Excel;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class ConfirmPastController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

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
            return view('push.confirmpast',['data'=>$data,'start'=>$start,'end'=>$end]);
        }else{
            return view('push.confirmpast');
        }
    }

    /**
     * @param Request $request
     */
    public function exportConfirmpast(Request $request){
        $start = $request->start;
        $end = $request->end;
        $body = TPushInfo::whereBetween('PUSH_RESERVATION_DATE',[$start,$end])->get();
        $name = $start.'-'.$end.' Reports';
        Excel::create($name, function($excel) use($body) {

            $excel->sheet('Sheetname', function($sheet) use($body) {
                $sheet->fromArray($body);
                $sheet->row(1,array(
                    'ID', 'タイトル/本文','ユーザー名','配信日時','登録日時'
                ));

            });

        })->export('csv');
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
