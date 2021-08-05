<?php

function loger($msg = 'test', $log = 'log.log', $limit = 100)
{
    if (!file_exists($log)) {
        file_put_contents($log, 'START');
    }
    $data = file_get_contents($log);
    $arr = explode(PHP_EOL, $data);
    array_unshift($arr, date('Y-m-d H:i:s') . "-" . $msg);
    if (count($arr) >= $limit) $arr = array_slice($arr, 0, $limit);
    $data = implode(PHP_EOL, $arr);
    file_put_contents($log, $data);
}
