<?php

function validate_NIC($nic){
    // res = [true, error_msg]
    $res = ['success' => false, 'error_msg' => ''];
    
    if(!empty($nic)){
        $pattern = "/^[0-9]{3,5}[A-Z]{0,1}$/";
        $matches = [];
        preg_match($pattern, $nic, $matches);
        if(sizeof($matches) > 0){
            $res['success'] = true;
        }else {
            $res['error_msg'] = 'Not in correct format';
        }
    }
    else {
        $res['error_msg'] = 'NIC is empty';
    }
    return $res;
}