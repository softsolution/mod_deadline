<?php
error_reporting(E_ALL | E_STRICT) ;
ini_set('display_errors', 'On');

function mod_deadline($module_id){

    $inCore     = cmsCore::getInstance();
    $cfg        = $inCore->loadModuleConfig($module_id);

    if (!isset($cfg['mode'])) { $cfg['mode'] = '24'; }
    if (!isset($cfg['end_date_value'])) { $cfg['end_date_value'] = '00.00.0000'; }
    if (!isset($cfg['period'])) { $cfg['period'] = 1; }
    if (!isset($cfg['start_date_value'])) { $cfg['start_date_value'] = date("d.m.Y"); }
    if (!isset($cfg['diff'])) { $cfg['diff'] = 0; }

    $current = 0;//время до конца текущего дня
    $timestamp = 0;//время до конца акции в формате unix 
    $action_actual = 1;//флаг актуальность акции
    
    //коррекция (разница с сервером), секунд
    $correct = $cfg['diff']*60*60;
    
    if($cfg['mode']=='24'){
        $current = 1;
    } elseif($cfg['mode']=='end_date'){
        
        //получаем время в unix формате
        $dayend_unix = strtotime($cfg['end_date_value']);
        
        //проверяем закончилась ли акция
        if($dayend_unix < time()){
            //время акции закончилось
            $action_actual = 0;
            $timestamp = 0;
        } else {
            $timestamp = ($dayend_unix - $correct)*1000;
        }
        
    } else {

        //сравниваем даты
        $daystart_unix = strtotime($cfg['start_date_value']);
       
        //определяем наступила ли дата старта
        if($daystart_unix > time()){
            $timestamp = ($daystart_unix + $cfg['period']*24*60*60 - $correct)*1000;
        } else {
            //дата в прошлом
            //определяем сколько циклов прошло с даты старта
            $cur_num = floor((time() - $daystart_unix + $correct)/($cfg['period']*24*60*60));
            $timestamp = ($daystart_unix + $cfg['period']*($cur_num + 1)*24*60*60 - $correct)*1000;
        }
    }
    
    //приводим к стандарту
    $timestamp = number_format($timestamp, '', '.', '');

    $smarty = $inCore->initSmarty('modules', 'mod_deadline.tpl');
    $smarty->assign('cfg', $cfg);
    $smarty->assign('module_id', $module_id);
    $smarty->assign('action_actual', $action_actual);
    $smarty->assign('current', $current);
    $smarty->assign('timestamp', $timestamp);
    $smarty->display('mod_deadline.tpl');

    return true;

}
?>
