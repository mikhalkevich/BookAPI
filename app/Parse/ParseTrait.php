<?php
namespace App\Parse;
trait ParseTrait{
    public function text($obj, $val=null){
        $risk = $obj->filter($val)->count();
        if($risk == 0){
            $answer = '';
        }else{
            $answer = $obj->filter($val)->text();
        }
        return $answer;
    }
    public function html($obj, $val=null){
        $risk = $obj->filter($val)->count();
        if($risk == 0){
            $answer = '';
        }else{
            $answer = $obj->filter($val)->html();
        }
        return $answer;
    }
    public function attr($obj, $val=null, $attr=null){
        $risk = $obj->filter($val)->count();
        if($risk == 0){
            $answer = '';
        }else{
            $answer = $obj->filter($val)->attr($attr);
        }
        return $answer;
    }
}
