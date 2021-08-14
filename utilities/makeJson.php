<?php

$dir = __DIR__ . '/../public/assets';
$jsonFile = 'data.json';



function onlySvg($dir) {
    $files = array_diff(scandir($dir), array('..', '.'));
    print_r($files);
    foreach ($files as $key => $value) {
        $isSvg = strpos($value, '.svg');
        //$hasLetter = preg_match("/[_a-z]/i", substr($value, -4, 0));
        $isValid = strpos($value, '_');
        if ($isSvg === false || $isValid === false) {
            unset($files[$key]);
        } else {
            $files[$key] = substr($files[$key], 0, $isSvg);
        }
    }
    if (empty($files) === true) {
        exit('Nothing to add');
    } else {
    return $files;
    }
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
    //array_fill_keys($oneFile['tags'], true);
    return $result;
}

function renameFiles ($dir) {
    
    $filesList = scandir($dir);
    foreach($filesList as $key => $value) {
        
        $findUscr = strpos($value, '_');
        
        if($findUscr !== false) {
            $newName = $dir . '/' . substr($value, 0, $findUscr) . '.svg';
            echo ($value);
            rename ($dir . '/' . $value, $newName);
        }
    }
}


//print_r(onlySvg($dir));
$files = onlySvg($dir);
$newJson = (formatData($files));
$oldJson = json_decode(file_get_contents($jsonFile));
$json = array_merge($oldJson, $newJson);

$json = json_encode($json, JSON_PRETTY_PRINT);
if (file_put_contents($jsonFile, $json)) {
    echo "JSON file created successfully...";
    renameFiles ($dir);
} else {
    echo "Error creating JSON";
}
?>