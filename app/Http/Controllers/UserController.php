<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use anlutro\cURL;
use App\PushLog;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class UserController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct(){
//        $this->middleware('auth');
//    }
//
//    public function index(){
//        return view('user.login');
//    }
    public function getLogin()
    {
        if(Auth::check()){
            return redirect()->route('confirmpast');
        }
        return view('push.loginapi');
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'groupId' => 'required|min:8|max:15',
            'password' => 'required|min:8|max:20'
        ], [
            'groupId.required' => 'Can not blank field',
            'groupId.min' => 'Can not less than 8 character',
            'groundId.max' => 'Can not more than 15 character',
            'password.required' => 'Can not blank field',
            'password.min' => 'Can not less than 8 character',
            'password.max' => 'Can not more than 15 character'
        ]);
        $curl = new cURL\cURL();
        $url = 'https://yyasuda.mbtn.sbmgs.info/api/x/push_admin/group/auth.json';
        $data = ['group_id' => $request->groupId, 'password' => $request->password];
        $res = $curl->newRequest('post', $url, $data)
            ->setOption(CURLOPT_SSL_VERIFYPEER, false)
            ->setUser('testgroup')->setPass('1234abcd');
        $response = $res->send();
        $result = json_decode($response->body, true);
        if (isset($result['result']) && $result['result'] == 'ok') {
//            PushLog::updateOrCreate(['OPERATION_USER_ID'=>$result['request']['group_id'],'OPERATION_DATE'=>$result['logined_at'],'OPERATION_KIND'=>'01','OPERATION_FUNCTION'=>'login']);
            User::updateOrCreate(['group_id' => $request->groupId], ['password' => bcrypt($request->password), 'remember_token' => $request->_token]);
            if (Auth::attempt($data)) {
                Session::put('user_info',Auth::user());
                return redirect()->route('doLogin');
            }
        } else {
            session()->flash('status', $result['error']['code']);
            session()->flash('message', $result['error']['message']);
            return Redirect('push/login');
        }
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('getLogin');
    }


}
