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
/*
|--------------------------------------------------------------------------
|           大迪克控制器->前台->前台控制器(处理用户问题)
|--------------------------------------------------------------------------
 */
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
        /*文章左侧内容*/
        $am_data = DB::table('article_manage')->where('am_status',1)->orderBy('am_id', 'desc')->limit(4)->get();

        /*连接广告数据表*/
        $advertising_data = Advertising::where('ad_status',1)->limit(4)->get(); 
        // exit;
        /* 获取第一个id */
        if(empty($advertising_data)){
            dump($advertising_data);
            $first_id = $advertising_data[0]->ad_id;
        }else{
            $advertising_data = false;
            $first_id = false;
        }

        /*告示内容*/
        $web_data = (DB::table('web')->where('web_id',1)->get())[0]->web_bulletin;
        /*文章最新内容*/
        $am_data_1 = DB::table('article_manage')->where('am_status',1)->orderBy('am_create_time', 'desc')->limit(5)->get();
        /*文章随机内容*/
        $am_data_2 = DB::table('article_manage')->orderBy(DB::raw('rand()'))->limit(5)->get();
        /*接收信息*/
        return view('home.index.index',[
            'acm_data_0'=>$acm_data_0,
            'am_data'=>$am_data,
            'advertising_data'=>$advertising_data,
            'first_id'=>$first_id,
            'web_data'=>$web_data,
            'am_data_1'=>$am_data_1,
            'am_data_2'=>$am_data_2
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return view
     */
    public function create(Request $request)
    {
        return view('home.index.register');
    }

    /**
     * 用户注册逻辑
     *
     * @param  \Illuminate\Http\Request  $request
     * @return view
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
     * 用户登录页面
     *
     * @param  \Illuminate\Http\Request  $request
     * @return view
     */
    public function login()
    {
        return view('home.index.login');
    }
    /**
     * 用户登录逻辑
     *
     * @param  \Illuminate\Http\Request  $request
     * @return view
     */
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
            //查询账号是否被封禁
            if ($res->identify == 1) {
                return redirect()->back()->withInput()->with('msg','账户已经被封禁,请联系管理员');
            }
            //查询结果
            if ($res) {
                //查询密码是否正确
                if (Hash::check($_POST['us_password'],$res->us_password)) {
                    echo "<script>alert('登录成功!');location='/';</script>";
                    //登录成功把用户名写入session
                    session(['us_name' => $res->us_name]);
                    session(['uid' => $res->uid]);
                }else{
                    return back()->with('msg','密码错误');
                }
            }else{
                return redirect()->back()->withInput()->with('msg','用户不存在');
            }
        }
        
    }

    
    /**
     * 发送验证码
     * @return [type] [description]
     */
    public function send()
    {
        session_start();
        //随机一个6位数的数字作为用户的验证码
        $code = mt_rand(000000,999999);
        //存入session
        $_SESSION['code'] = $code;
        //发送
        $codes = Mail::raw($code,function($message){
            $us_email = $_GET['us_email'];
            $message->subject('激活提示信息,以下是您的验证码');
            $message->to($us_email);
        });
        return 1;
    }

    /**
     * 检测验证码是否正确
     * @return [type] [bool]
     */
    public function check()
    {
        session_start();
        $code = $_SESSION['code'];
        $us_code = $_GET['code'];
        if ($code == $us_code) {
            //如果一样,清除掉session
            session()->pull('code');
            return 1;
        }else{
            return 0;
        }
    }

    /**
     * 检测名字是否有与数据库重复
     * @return [num] [description]
     */
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

    /**
     * 退出登录
     * @return [type] [description]
     */
    public function logout()
    {
        session()->pull('us_name');
        session()->pull('uid');
        return redirect('/');
    }
}
