<?php
namespace app\wx\controller;

use think\Controller;

class Getweather extends Controller
{
 public function index()
  {
    return $this->fetch();
  }
    public function read()
    {
        $id = input("id");
        $model = model('ins_county');
        $data = $model->getNews($id);
        if ($data) {
            $code = 200;
        } else {
            $code = 404;
        }
        $data = [
            'code' => $code,
            'data' => $data
        ];
        return json($data);
    }
}


?>