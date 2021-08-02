<?php

$dir = __DIR__ . '/../public/assets';



function onlySvg($dir) {
    $files = array_diff(scandir($dir), array('..', '.'));

    foreach ($files as $key => $value) {
        $isSvg = strpos($value, '.svg');
        $hasLetter = preg_match("/[a-z]/i", substr($value, -4, 0));
        if ($isSvg === false) {
            unset($files[$key]);
        } else {
            $files[$key] = substr($files[$key], 0, $isSvg);
        }
    }
    return $files;
}

function formatData ($files) {
    $result = [];
    $temp = [];
    

    foreach ($files as $key => $value) {
        $oneFile = Array (
            'name' => '',
            'tags' => Array (),
            'visible' => true);
        $temp = explode('_', $value);
        $first_key=true;
        foreach ($temp as $k => $val) {
            if($first_key === true) {
                $oneFile['name'] = $val;
                $first_key = false;
            } else {
            //array_push($oneFile['tags'], $val);
            $oneFile['tags'][$val] = true; 
            }
        }
        
        array_push($result, $oneFile);
    }
    array_fill_keys($oneFile['tags'], true);
    return json_encode($result, JSON_PRETTY_PRINT);
}

function renameFiles ($dir) {
    
    $filesList = scandir($dir);
    foreach($filesList as $key => $value) {
        
        $findUscr = strpos($value, '_');
        
        if($findUscr !== false) {
            $value = substr($value, 0, $findUscr);
            echo ($value);
        }
    }
}
//print_r(onlySvg($dir));
$files = onlySvg($dir);
$json = (formatData($files));
renameFiles($dir);
if (file_put_contents("data.json", $json))
    echo "JSON file created successfully...";
else 
    echo "Oops! Error creating json file...";

//print_r(json_encode($json));
?>