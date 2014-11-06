<?php
date_default_timezone_set('Europe/Helsinki');
$date = date('Y-m-d h:i:s');

include_once 'config/CrudClass.php';
$crud = new CrudClass();

$channelList = array_unique($crud->getNames());

function getStatusTiwtch($channelName)
{
    $clientId = 'j8x9ah5yysierms570iretr8fgwu44e';
    $json_array = json_decode(file_get_contents('https://api.twitch.tv/kraken/streams/'.strtolower($channelName).'?client_id='.$clientId), true);
    if ($json_array['stream'] != NULL) {
        return $data = array(
            'status'=>'1',
            'display_name'=>$channelName,
            'stream_title'=>$json_array['stream']['channel']['status'],
            'game'=>$json_array['stream']['channel']['game']
        );
    } else {
        return $data = array(
            'status'=>'0',
            'display_name'=>$channelName,
            'stream_title'=>'-',
            'game'=>' '
        );
    }   
}

foreach ($channelList as $c)
{
    $tmp = $crud->statusByName($c);
    $data = getStatusTiwtch($c);
           
    if ($tmp['game'] != $data['game'])
    {
        $crud->updateStatus($c, $data['status'], $data['game'], $date);
        echo "changed: ".$c." ".$date."\n";
    }    
}

