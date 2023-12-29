@php
    public function db_translate($var_ru, $var_kz)
    {
        if(isset($_COOKIE['locale']) AND $_COOKIE['locale']=='kz')
        {
            if($var_kz!=NULL)
                echo $var_kz;
            else
                echo $var_ru;
        }
        else
            echo $var_ru;
    }
public function translate($var)
{
    if(isset($_COOKIE['locale']) AND $_COOKIE['locale']=='kz')
    {
        switch ($var)
        {
            case 'Главная':
                echo 'үй';
                break;
            case 'Услуги':
                echo 'Қызметтер';
                break;
            case 'Расценки':
                echo 'Бағалар';
                break;
            case 'Галерея':
                echo 'Галерея';
                break;
            case 'Отзывы':
                echo 'Пікірлер';
                break;
            case 'Контакты':
                echo 'Контактілер';
                break;
            case 'Астана':
                echo 'Астана';
                break;
            case 'Заказать услугу':
                echo 'Тапсырыс беру қызметі';
                break;
            case 'О нас':
                echo 'Біз туралы';
                break;
            case 'Категории':
                echo 'Санаттар';
                break;
            case 'Подробнее':
                echo 'Толығырақ';
                break;
            case 'Частые вопросы':
                echo 'Жиі қойылатын сұрақтар';
                break;
            case 'Оставьте ваши контакты':
                echo 'Контактілеріңізді қалдырыңыз';
                break;
            case 'Мы с вами свяжемся':
                echo 'Біз сізге хабарласамыз';
                break;
            case 'Отправить':
                echo 'Жіберу';
                break;
            case 'Наши услуги':
                echo 'Біздің қызметтеріміз';
                break;
            case 'Смотреть все':
                echo 'Барлығын көру';
                break;
            case 'Популярные услуги':
                echo 'Танымал қызметтер';
                break;
            case 'Участвовать':
                echo 'Қатысу';
                break;
            case 'Специальные предложения':
                echo 'Арнайы ұсыныстар';
                break;
            case 'Почему мы?':
                echo 'Неге біз?';
                break;

            default:
                echo $var;
                break;
        }
    }
    else
        echo $var;
}
@endphp
