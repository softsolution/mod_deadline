<?php

// ========================================================================== //

    function info_module_mod_deadline(){

        //
        // �������� ������
        //

        //��������� (�� �����)
        $_module['title']        = '�������� ������';

        //�������� (� �������)
        $_module['name']         = '�������� ������';

        //��������
        $_module['description']  = '������ ������� ������� ��������� ������� ��� ����� �������� �������� ������� ����������� � �������� �������� ������ ��� ������.';

        //������ (�������������)
        $_module['link']         = 'mod_deadline';

        //�������
        $_module['position']     = 'sidebar';

        //�����
        $_module['author']       = 'soft-solution.ru';

        //������� ������
        $_module['version']      = '1.0';

        //
        // ��������� ��-���������
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