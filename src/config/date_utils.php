<?php

function getDateAsDateTime($date)
{
    return is_string($date) ? new DateTime($date) : $date;
}

function isWeekend($date)
{
    $inputDate = getDateAsDateTime($date);
    return $inputDate->format('N') >= 6;
}

function isBefore($date1, $date2)
{
    $inputDate1 = getDateAsDateTime($date1);
    $inputDate2 = getDateAsDateTime($date2);

    return $inputDate1 <= $inputDate2;
}

function getNextDay($date)
{
    $inputDate = getDateAsDateTime($date);
    $inputDate->modify('+1 day');

    return $inputDate;
}

function sumIntervals($interval1, $interval2)
{
    $date = new DateTime('00:00:00');
    $date->add($interval1);
    $date->add($interval2);
    return (new DateTime('00:00:00'))->diff($date);
}

function subtractIntervals($interval1, $interval2)
{
    $date = new DateTime('00:00:00');
    $date->add($interval1);
    $date->sub($interval2);
    return (new DateTime('00:00:00'))->diff($date);
}

function getDateFromInterval($interval)
{
    return new DateTimeImmutable($interval->format('%H:%i:%s'));
}

function getDateFromString($str)
{
    return DateTimeImmutable::createFromFormat('H:i:s', $str);
}

function getFirstDayOfMonth($date)
{
    $time = getDateAsDateTime($date)->getTimestamp();
    return new DateTime(date('Y-m-1', $time));
}

function getLastDayOfMonth($date)
{
    $time = getDateAsDateTime($date)->getTimestamp();
    return new DateTime(date('Y-m-t', $time));
}

function getSecondsFromDateInterval($interval)
{
    $d1 = new DateTimeImmutable;
    $d2 = $d1->add($interval);
    return ($d2->getTimestamp() - $d1->getTimestamp());
}

function isPastWorkd($date)
{
    return !isWeekend($date) && isBefore($date, new DateTime());
}

function getTimeStringFromSeconds($seconds)
{
    $h = intdiv($seconds, 3600);
    $m = intdiv($seconds % 3600, 60);
    $s = $seconds - ($h * 3600) - ($m * 60);

    return sprintf('%02d:%02d:%02d', $h, $m, $s);
}

// function formatDateWithLocale($date, $pattern)
// {
//     $time = getDateAsDateTime($date)->getTimespamp();

//     return strftime($pattern, $time);

// }

function formatDateWithLocale($date, $pattern)
{
    $dateTime = getDateAsDateTime($date); // Verifique se getDateAsDateTime está retornando um objeto DateTime válido.
    
    // Convertendo o padrão para um formato compatível com DateTime::format()
    $formattedDate = $dateTime->format('l, d \d\e F \d\e Y'); // Exemplo de formato padrão para 'Segunda-feira, 01 de Março de 2025'

    // Traduzir o nome do mês e o dia da semana, se necessário.
    setlocale(LC_TIME, 'pt_BR.UTF-8'); // Define o local para português brasileiro.
    return $formattedDate; // Aplica a tradução se necessário.
}


// function formatDateWithLocale($date, $pattern)
// {
//     $f = new IntlDateFormatter('pt-BR',IntlDateFormatter::LONG,IntlDateFormatter::NONE);
//     // Locate::getDefault
//     // Convertendo a data para um objeto DateTime
//     $dateTime = getDateAsDateTime($date); 

//     // Formato compatível com DateTime::format() para dia da semana, mês e ano
//     $formattedDate = $dateTime->format('l, d \d\e F \d\e Y'); // Exemplo: "Segunda-feira, 01 de Março de 2025"
    
//     // Usando a função setlocale para garantir que o nome do dia e do mês sejam exibidos em português
//     setlocale(LC_TIME, 'pt_BR.UTF-8');
    
//     return $formattedDate;
// }

