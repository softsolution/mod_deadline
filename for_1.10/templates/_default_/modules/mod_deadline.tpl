<script src="/modules/mod_deadline/js/countdown.js" type="text/javascript"></script>
<link media="screen" href="/modules/mod_deadline/css/jquery.countdown.css" type="text/css" rel="stylesheet">

{* $action_actual - флаг, показывающий, что акция завершена (=1 - акция актуальна, =0 - время вышло) - для второго режима работы модуля *}
<div id="down_conter">
    <div class="action_title"><i>{if $action_actual}До конца акции осталось: {else}Акция завершена{/if}</i></div>
    <span id="action_conter">
        <span id="deadline_conter{$module_id}" class="countdown"></span>
    </span>
</div>

{*инициализация счетчика*}
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