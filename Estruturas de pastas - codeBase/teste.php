<?php
foreach(scandir('models') as $k)
    if(($k != '.') && ($k != '..')){
        $obj = json_decode(file_get_contents('models/'.$k.'/manifest.json'), true);

        if ($obj['dad'] == "this"){
            $masters[$obj['dadsName']] = $obj;
        }else{
            $subs[$obj['dad']] = $obj;
        }
    }

foreach ($subs as $sub){
    foreach($sub['submenu'] as $s)
        $masters[$sub['dad']]['submenu'][] = $s;
}

var_dump($masters);