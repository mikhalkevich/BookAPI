<?php
namespace App\Parse;
Interface ParseContract {
    public function getParse($url = null, $catalog_id = null);
    //public function text($obj, $val=null);
    //public function html($obj, $val=null);
}
