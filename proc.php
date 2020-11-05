<?php
header('Content-Type: text/html; charset=UTF-8');


foreach($_POST['option_title'] as $key => $v){
    $querys[] = array(
        "option_no" => $_POST['option_info_no'][$key],
        "product_no = '1'",
        "option_title = '" . $v . "'",
        "option_value = '" . $_POST['option_value'][$key] . "'",
    );
}


foreach($_POST['option_info_value'] as $key => $v){
    $querys_option[] = array(
        "option_info_no" => $_POST['option_info_no'][$key],
        "product_no = '1'",
        "fulll_value = '" . $v . "'",
        "price = '" . $_POST['option_price'][$key] . "'",
        "stock = '" . $_POST['option_stock'][$key] . "'",
    );
}


// print_rr($querys);
// print_rr($querys_option);
//  exit;


foreach($querys as $key => $v){
    if($v['option_no']){
        $u_no = $v['option_no'];
        unset($v['option_no']);
        $q = 'update product_option SET ' . implode(',', $v) . " WHERE no = '" . $u_no . "'";
    }else{
        unset($v['option_no']);
        $q = 'insert into product_option SET ' . implode(",", $v);
    }
    
    echo $q . '<BR>';
     $mysqli->query($q);
}


foreach($querys_option as $key => $v){
    if ($v['option_info_no']) {
        $u_no = $v['option_info_no'];
        unset($v['option_info_no']);
        $q = 'update product_option_info SET ' . implode(',', $v) . " WHERE no = '" . $u_no . "'";
    }else{
        unset($v['option_info_no']);
        $q = 'insert into product_option_info SET ' . implode(",", $v);
    }    
        echo $q . "<BR>";

     $mysqli->query($q);
}
