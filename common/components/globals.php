<?php

use LDAP\Result;

const ACTIVE = 2;
const PASSIVE = 2;
function pr($variable)
{
    echo '<pre>';
    print_r($variable);
    echo '</pre>';
}

/**
 * <pre>$var</pre>;die();
 */
function prd($variable)
{
    echo '<pre>';
    print_r($variable);
    echo '</pre>';
    die();
}

function pul($value, $fixed)
{
    return number_format($value, $fixed, '.', ' ');
}

function pul2($value, $fixed)
{
    return number_format($value, $fixed, ',', ' ');
}

// view da 12.04.2018 shaklida chiqarish uchu
function dateView($date)
{
    return Yii::$app->formatter->asDate($date, 'php:d.m.Y');
}

// bazaga saqlash uchun 2018-04-12 shaklida
function dateBase($date)
{
    return Yii::$app->formatter->asDate($date, 'php:Y-m-d');
}


// data ni vaqti bilan korsatish uchun
function datetimeView($date)
{
    return date('d.m.Y H:i', strtotime($date));
}

function timeView($date)
{
    return date('H:i', strtotime($date));
}

function url($route, $params = array(), $ampersand = '&')
{
    return Yii::$app->getUrlManager()->createUrl($route, $params, $ampersand);
    // return Yii::app()->createUrl($route,$params,$ampersand);
}

function getAnswerQuestion(){
    $result =[
        1 => 'A',
        2 => 'B',
        3 => 'C',
        4 => 'D',
    ];

    return $result;
}

function getJoinedStatus(){
    $result = [
        -1 => 'Ro\'yxatdan o`tilmaganlar',
        1 => 'Ro\'yxatdan o\'tilganlar',
        2 => 'Ishtirok etilayotganlar',
        3 => 'Qatnashilganlar',
        4 => 'Qatnashilmaganlar'
    ];

    return $result;
}
function getStatus()
{
    $result =[
        1 => 'Passive',
        2 => 'Active',
    ];
    return $result;
}

function alertTypes()
{
    
    $alertTypes = [
        'error'   => 'alert-danger',
        'danger'  => 'alert-danger',
        'success' => 'alert-success',
        'info'    => 'alert-info',
        'warning' => 'alert-warning'
    ];
    return $alertTypes;
}

function alertIcon()
{
    
    $alertIcon = [
        'error'   => 'fas fa-times-circle',
        'danger'  => 'fas fa-times-circle',
        'success' => 'fas fa-check-circle',
        'info'    => 'fas fa-info-circle',
        'warning' => 'fas fa-exclamation-circle'
    ];
    return $alertIcon;
}

function alertTitle()
{
    
    $alertTitle = [
        'error'   => 'Xavfli!',
        'danger'  => 'Xavfli!',
        'success' => 'Ajoyib!',
        'info'    => 'Diqqat qiling!',
        'warning' => 'Shubhali!'
    ];
    return $alertTitle;
}


function Years() : array {
    return [
        2024 => 2024,
        2023 => 2023,
        2022 => 2022,
    ];
}

?>