<?php
if(!function_exists('date_time_format')){
    function date_time_format($date, string $format){
        switch ($format) {
            case 'diffForHumans':
                $date = \Carbon\Carbon::parse($date)->diffForHumans();
                break;
            case 'Y-m-d':
                $date = \Carbon\Carbon::parse($date)->format('Y-m-d');
                break;
            case 'd/m/Y':
                $date = \Carbon\Carbon::parse($date)->format('d/m/Y');
                break;
            default:
            $date = \Carbon\Carbon::parse($date)->toFormattedDateString();
                break;
        }
        return $date;
    }
}