<script src="/modules/mod_deadline/js/countdown.js" type="text/javascript"></script>
<link media="screen" href="/modules/mod_deadline/css/jquery.countdown.css" type="text/css" rel="stylesheet">

<div id="promotext"><h3><span class="color-mark">�������� �����!!!</span></h3><h4>������ 50% �� ������ ����� ������������</h4></div>
{* $action_actual - ����, ������������, ��� ����� ��������� (=1 - ����� ���������, =0 - ����� �����) - ��� ������� ������ ������ ������ *}

<div id="down_conter">
    <span class="action_title"><i>{if $action_actual}�� ����� ����� ��������: {else}����� ���������{/if}</i></span> 
    <span id="action_conter">
        <span id="deadline_conter{$module_id}" class="countdown"></span>
    </span>
</div>

{*������������� ��������*}
{literal}
<script type="text/javascript">
$(function(){
    $('#deadline_conter{/literal}{$module_id}{literal}').countdown({{/literal}
        current : {if $current==1}true{else}false{/if},
        timestamp : {$timestamp},{literal}
        callback : function(hours, minutes, seconds){}
    });
});
</script>
{/literal}