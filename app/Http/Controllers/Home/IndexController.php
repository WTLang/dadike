<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;
use App\Model\Home\Friend;
use App\Model\Home\Advertising;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*连接友情链接数据表*/
        $friend_data = Friend::get();
        /*连接广告数据表*/
        $advertising_data = Advertising::all();
        /* 获取第一个id */
        $first_id = $advertising_data[0]->ad_id;
        /*接收信息*/
        return view('home.index.index',['friend_data'=>$friend_data,'advertising_data'=>$advertising_data,'first_id'=>$first_id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('home.index.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dump($request->all());
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

    public function login(){
        return view('home.index.login');
    }

    public function dologin(Request $request){
        session_start();
        dump($_SESSION);
        dump($request->all());
        // if(strtolower($_POST['verify']) !== strtolower($_SESSION['code'])){
        //     echo "验证失败";
        // }else{
        //     echo "验证成功,查询数据库，验证账号密码";
        // }
    }

    public function send(){
        session_start();
        $code = mt_rand(000000,999999);
        $_SESSION['code'] = $code;
        Mail::raw($code,function($message){
            $message->subject('激活提示信息,以下是您的验证码');
            $message->to('760811659@qq.com');
        });
    }
}
