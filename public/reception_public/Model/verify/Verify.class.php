<?php
class Verify{
	public function showVerify($m=1,$n=4){
		header("Content-type: image/png");    //告诉浏览器，当前输出的内容是PNG
		$im = imagecreatetruecolor(320,80);  //创建一个画布
		//生成一个颜色
		$bgcolor = imagecolorallocate($im,rand(200,255),rand(200,255),rand(200,255));   
		imagefill ( $im,0,0,$bgcolor);   //填充画布
		//逐个产生随机字符，以及随机颜色，将字符写入到画布里。
		$x=20;
		$string= '';
		for($i=1;$i<=$n;$i++){
			//产生随机颜色
			$textcolor = imagecolorallocate($im,rand(0,100),rand(0,100),rand(0,100));
			//产生一个随机字符
			if($m==1){
				//0123456789asdfgh....jklZXCVNM....,
			 $str=join('',array_merge(range(0,9),range('a','z'),range('A','Z')));
			 $one_font=substr(str_shuffle($str),0,1);
			 $string .=$one_font;
			}else if($m==2){
			//0123456789
			 $str=join('',array_merge(range(0,9)));
			 $one_font=substr(str_shuffle($str),0,1);
			 $string .=$one_font;
			}else if($m==3){
			 $arr=array("阿","斯","顿","发","生","发","的","科","技","日","哦","个");
			 $one_font=$arr[rand(0,count($arr)-1)];
			  $string .=$one_font;
			}
			//将字符写入图片中
			$font='./WRYH.ttf';//字体存放路径
			imagettftext($im,60,0,$x,90,$textcolor,$font,$one_font); 
			$x=$x+65;
		}
		for($i=0;$i<80;$i++)  //加入干扰象素
		{
			 $randcolor = imagecolorallocate($im,rand(0,100),rand(0,100),rand(0,100));
			 imagesetpixel($im, rand(0,320), rand(0,80), $randcolor);    //加入点状干扰素
		}
		for($i=0;$i<5;$i++)  //加入干扰象素
		{
			 $randcolor = imagecolorallocate($im,rand(0,100),rand(0,100),rand(0,100));
			 imageline($im, 0, rand(0,80), 320, rand(0,80), $randcolor);    //加入线条状干扰素
		}
		session_start();

		$_SESSION['code'] = $string;
		imagepng($im);   //把画好的图输出到浏览器
		imagedestroy($im);//销毁画布
		}
}	
?>