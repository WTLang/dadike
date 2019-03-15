<?php

namespace App\Http\Middleware\Admin;

use Closure;

class RbacMiddleware
{
    /**
     * @return array
     * 获取控制器和方法名
     */
    public static function getControllerAndFunction()
    {
        $action = \Route::current()->getActionName();
        list($class, $method) = explode('@', $action);
        $class = substr(strrchr($class,'\\'),1);
        return ['controller' => $class, 'method' => $method];
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //获取用户当前的权限
        // $admin_node_type = session('admin_node_type');
        // //获取当前的网页的控制器名和方法名
        // $cname_aname = self::getControllerAndFunction();
        // //获取用户可以访问的控制器
        // $keys = array_keys($admin_node_type);

        // $cname = strtolower($cname_aname['controller']);
        // $aname = strtolower($cname_aname['method']);
        // //检查权限
        // if (in_array($cname, $keys)) {
        //     if (in_array($aname, $admin_node_type[$cname])) {
        //         return $next($request);
        //     }
        // }
        // dd('没有权限');
        return $next($request);
    }
}
