<?php

// ========================================================================== //

    function info_module_mod_deadline(){

        //
        // Описание модуля
        //

        //Заголовок (на сайте)
        $_module['title']        = 'Обратный отсчет';

        //Название (в админке)
        $_module['name']         = 'Обратный отсчет';

        //описание
        $_module['description']  = 'Модуль создает счетчик обратного отсчета для более быстрого принятия решения посетителем в условиях дефицита товара или услуги.';

        //ссылка (идентификатор)
        $_module['link']         = 'mod_deadline';

        //позиция
        $_module['position']     = 'sidebar';

        //автор
        $_module['author']       = 'soft-solution.ru';

        //текущая версия
        $_module['version']      = '1.0';

        //
        // Настройки по-умолчанию
        //
        $_module['config'] = array();
        $_module['config']['mode'] = '24';
        $_module['config']['end_date_value'] = '00.00.0000';
        $_module['config']['period'] = 1;
        $_module['config']['start_date_value'] = date("d.m.Y");
        $_module['config']['diff'] = 0;

        return $_module;

    }

// ========================================================================== //

    function install_module_mod_deadline(){

        return true;

    }

// ========================================================================== //

    function upgrade_module_mod_deadline(){

        return true;

    }

// ========================================================================== //

?>