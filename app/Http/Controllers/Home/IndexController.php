<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;
use App\Model\Home\User;
use Hash;
use DB;
use SESSION;
use App\Model\Home\Friend;
use App\Model\Home\Advertising;

class IndexController extends Controller
{
    /**
     * 前台首页
     * @return $data
     */
    public function index(Request $request)
    {   
        /* 导航分类->查找顶级分类传入视图参数 */
        $acm_data_0 = DB::table('article_categories_manage')->where('acm_pid',0)->get();

        /*文章推荐内容*/
        $am_data = DB::table('article_manage')->where('am_status',1)->orderBy('am_id', 'desc')->limit(4)->get();

        /*连接广告数据表*/
        $advertising_data = Advertising::where('ad_status',1)->limit(4)->get();
        
        /* 获取第一个id */
        $first_id = $advertising_data[0]->ad_id;
        /*接收信息*/
        return view('home.index.index',[
            'acm_data_0'=>$acm_data_0,
            'am_data'=>$am_data,
            'advertising_data'=>$advertising_data,
            'first_id'=>$first_id
        ]);
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
        //表单输入判断
        $this->validate($request ,[
            'us_name' => 'required|regex:/^[a-zA-Z]{1}[\w]{5,16}$/',
            'us_password' => 'required|regex:/^[\w]{6,18}$/',
            'reus_password' => 'required|same:us_password',
            'us_tel' => 'required|regex:/^1{1}[3456789]{1}[0-9]{9}$/',
            'us_email' => 'required|email',
            'code' => 'required',
        ],[
            'us_name.required'=>'用户名必填',
            'us_name.regex'=>'输入正确的用户名,6-16位,不以数字开头',
            'us_password.required'=>'密码必填',
            'us_password.regex'=>'输入正确的密码,6-18位,不含空格',
            'reus_password.required'=>'重复密码必填',
            'reus_password.same'=>'重复密码必须和密码输入一致',
            'us_tel.required'=>'手机必填',
            'us_tel.regex'=>'请输入正确的手机号码!',
            'us_email.required'=>'电子邮箱必填',
            'us_email.regex'=>'输入正确的邮箱',
            'code.required'=>'验证码必填',
        ]);
        $data = $request->except(['_token','code','reus_password']);
        $code = $request->get('code');
        //密码加密
        $data['us_password'] = Hash::make($data['us_password']);
        //存入数据库
        $res = User::create($data);
        if ($res) {
            echo "<script>alert('注册成功!');location='/login';</script>";
        }else{
            echo "<script>alert('注册失败!');location='/login';</script>";
        }
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

    public function login()
    {
        return view('home.index.login');
    }

    public function dologin(Request $request)
    {
        //表单判断
        $this->validate($request ,[
            'us_name' => 'required',
            'us_password' => 'required',
            'code' => 'required'
        ],[
            'us_name.required'=>'用户名必填',
            'us_password.required'=>'密码必填',
            'code.required'=>'验证码必填',
        ]);
        session_start();
        $data = $request->all();
        //判断验证码是否正确
        if(strtolower($_POST['code']) !== strtolower($_SESSION['code'])){
            return redirect()->back()->withInput()->with('msg','验证码错误');
        }else{
            //干掉session中的验证码
            unset($_SESSION['code']);

            //查询数据库
            $res = DB::table('users')->where('us_name', $data['us_name'])->first();
            if ($res) {
                if (Hash::check($_POST['us_password'],$res->us_password)) {
                    
                    echo "<script>alert('登录成功!');location='/';</script>";
                    //登录成功把用户名写入session
                    session(['us_name' => $res->us_name]);
                    session(['uid' => $res->uid]);
                }else{
                    return back()->with('msg','密码错误');
                }
            }else{
                return redirect()-> back()->withInput()->with('msg','用户不存在');
            }
        }
        
    }

    public function send()
    {
        session_start();
        $code = mt_rand(000000,999999);
        $_SESSION['code'] = $code;
        $codes = Mail::raw($code,function($message){
            $us_email = $_GET['us_email'];
            $message->subject('激活提示信息,以下是您的验证码');
            $message->to($us_email);
        });
        return 1;
    }

    public function check()
    {
        session_start();
        $code = $_SESSION['code'];
        $us_code = $_GET['code'];
        if ($code == $us_code) {
            return 1;
        }else{
            return 0;
        }
    }

    public function namecheck()
    {
        $us_name = $_GET['us_name'];
        $res = DB::table('users')->where('us_name', $us_name)->first();
        if ($res) {
            return 1;
        }else{
            return 0;
        }
    }

    public function logout()
    {
        session()->pull('us_name');
        session()->pull('uid');
        return redirect('/');
    }

}
