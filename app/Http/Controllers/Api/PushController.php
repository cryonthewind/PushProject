<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\PushLog;
use App\TPushDev;
use App\TPushInfo;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use  Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class PushController extends Controller
{
    public function getPush(Request $request){
        $push_id = $request->input('push_id');
//        $push = null;
//        if ($request->isMethod('post') && $request->has('push_id')) {
//
//            $push_id = $request->input('push_id');
//            $push = TPushInfo::all()->where('PUSH_ID', $push_id)->first();
//        }
//
//        $collection = collect(['product_id' => 1, 'name' => 'Desk', 'price' => 100, 'discount' => false]);
//
//        $filtered = $collection->only(['product_id', 'name']);
//
//        $filtered->all();
//
//        return $push;
        $push = DB::table('t_push_info')->select('TITLE as title', 'BODY as body')->where('PUSH_ID', $push_id)->first();
        $statusCode = 200;
        return response()->json($push, $statusCode);
    }

    public function registerDevice(Request $request) {
        $device_id = $request->get('device_id');
        $endpoint_id = $request->get('endpoint_id');

        $device = null;

        if (isset($endpoint_id) && isset($device_id)) {
            $member_id = $request->get('member_id');
            $sex = $request->get('sex');
            $birthday = $request->get('birthday');
            $postal_cd = $request->get('postal_cd');
            $latitude = $request->get('latitude');
            $longitude = $request->get('longitude');
            $user_id = $request->get('user_id');

            $device = TPushDev::where('DEVICE_ID', $device_id)->get()->first();

            if (isset($device)) {

                $device->update([
                    'DEVICE_ID' => $device_id,
                    'ENDPOINT_ID' => $endpoint_id,
                    'MEMBER_ID' => $member_id,
                    'SEX' => $sex,
                    'BIRTHDAY' => $birthday,
                    'POSTAL_CD' => $postal_cd,
                    'LATITUDE' => $latitude,
                    'LONGITUDE' => $longitude,
                    'UPDATE_USER_ID' => $user_id]);

                $device = [
                    "id" => $device->ID,
                    'device_id' => $device->DEVICE_ID,
                    'endpoint_id' => $device->ENDPOINT_ID,
                    'member_id' => $device->MEMBER_ID,
                    'sex' => $device->SEX,
                    'birthday' => $device->BIRTHDAY,
                    'postal_cd' => $device->POSTAL_CD,
                    'latitude' => $device->LATITUDE,
                    "longitude" => $device->LONGITUDE
                ];


            } else {
                $device = TPushDev::create([
                    'DEVICE_ID' => $device_id,
                    'ENDPOINT_ID' => $endpoint_id,
                    'MEMBER_ID' => $member_id,
                    'SEX' => $sex,
                    'BIRTHDAY' => $birthday,
                    'POSTAL_CD' => $postal_cd,
                    'LATITUDE' => $latitude,
                    'LONGITUDE' => $longitude,
                    'INSERT_USER_ID' => $user_id
                ]);

                $device = [
                    "id" => $device->id,
                    'device_id' => $device->DEVICE_ID,
                    'endpoint_id' => $device->ENDPOINT_ID,
                    'member_id' => $device->MEMBER_ID,
                    'sex' => $device->SEX,
                    'birthday' => $device->BIRTHDAY,
                    'postal_cd' => $device->POSTAL_CD,
                    'latitude' => $device->LATITUDE,
                    "longitude" => $device->LONGITUDE
                ];
            }
        }

        $statusCode = 201;
        return response()->json($device, $statusCode);
    }
}
