<?php

namespace App\Helpers;
class Util {
    public static function fecha($fecha)
    {

        return \Carbon\Carbon::parse($fecha)
            ->locale('es')
            ->translatedFormat('l, d \d\e F \d\e\l Y \a \l\a\s g:i A');
    }

    public static function colorNota($nota)
    {
        $color = $nota > 10.5 ? 'bg-green-100 text-success' : 'bg-red-100 text-danger';
        return '<span class="px-2 py-1 text-xs font-semibold rounded-full ' . $color . '">' . $nota . '</span>';

    }

    public static function tiempoHumano($fecha)
    {
        $fecha = \Carbon\Carbon::parse($fecha);
        $ahora = \Carbon\Carbon::now();

        $minutos = (int)$fecha->diffInMinutes($ahora);
        $horas   = (int)$fecha->diffInHours($ahora);
        $dias    = (int)$fecha->diffInDays($ahora);
        $semanas = $fecha->diffInWeeks($ahora);
        $meses   = $fecha->diffInMonths($ahora);

        if ($fecha->greaterThan($ahora)) {
//            return 'en el futuro'; // opcional
            dd(777);
        }

        $data = [
            'minutos' => $minutos,
            'horas'    => $horas,
            'dias' => $dias,
            'semanas' => $semanas,
            'meses' => $meses
        ];
        if ($minutos <= 3) {
            return 'ahora';
        } elseif ($minutos < 60) {
            return "hace $minutos minuto" . ($minutos === 1 ? '' : 's');
        } elseif ($horas < 24) {
            return "hace $horas hora" . ($horas === 1 ? '' : 's');
        } elseif ($dias === 1) {
            return 'ayer';
        } elseif ($dias < 7) {
            return "hace $dias día" . ($dias === 1 ? '' : 's');
        } elseif ($dias < 30) {
            $semanas = round($dias / 7);
            return "hace $semanas semana" . ($semanas === 1 ? '' : 's');
        } else {
            $meses = round($dias / 30);
            return "hace $meses mes" . ($meses === 1 ? '' : 'es');
        }
    }
}
