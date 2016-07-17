<?php
/**
 * Created by PhpStorm.
 * User: wr
 * Date: 2016/7/14
 * Time: 7:36
 */

function execl(){
    ini_set('auto_detect_line_endings', true);
    $i=0;
    $k=0;
    $chart=[];
    $result=[];
    $file = fopen(APPPATH."/file/chart.csv","r");
    while(! feof($file))
    {
        $chart[$i] = fgetcsv($file);
        $i++;
    }
    fclose($file);
    for($i=1; $i<count($chart);$i++) {
        $k=0;
        foreach ($chart[0] as $title) {
            if($title=='date'){
                $chart[$i][$k] = date('Y-m-d', strtotime($chart[$i][$k]));
            }
            $result[$i - 1][$title] = $chart[$i][$k];
            $k++;
        }
    }

    return $result;
}