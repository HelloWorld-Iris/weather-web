<?php 
namespace app\wx\model;

use think\Model;
use think\Db;

class InsCounty extends Model
{
    public function getNews($id = 1)
    {
        $res = Db::name('ins_county')->where('county_name', $id)->select();
        return $res;
    }

    public function getNewsList()
    {
        $res = Db::name('ins_county')->select();
        return $res;
    }
}