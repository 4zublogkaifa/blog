<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Swechat extends Model
{
    /*
     * 获取accesstoken
     *
     * */
    public static function getAccessToken()
    {
        $url="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=APPID&secret=APPSECRET";
        $res  =  file_get_contents($url);


    }
    /*
     * 微信群发 根据openid
     * */
    public static function groupSendAll()
    {
        $url="https://api.weixin.qq.com/cgi-bin/message/mass/send?access_token=";
    }
}
