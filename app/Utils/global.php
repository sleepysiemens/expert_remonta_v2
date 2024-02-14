<?php

// глобальные функции для Laravel приложения

function db_translate($var_ru, $var_kz) {
        if(isset($_COOKIE['locale']) AND $_COOKIE['locale']=='kz')
        {
            if($var_kz!=NULL)
                echo($var_kz);
            else
                echo($var_ru);
        }
        else
            echo($var_ru);
}

/*function translate($var)
    {
        if(isset($_COOKIE['locale']) AND $_COOKIE['locale']=='kz')
        {
            switch ($var)
            {
                case 'Заказать услугу':
                    echo 'Пікір қалдыру';
                    break;

                default:
                    echo $var;
                    break;
            }
        }
        else
            echo $var;
    }*/