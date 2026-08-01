<?php

require 'vendor/autoload.php';

use App\Models\Tablero;
use App\Models\Columna;
use App\Models\Tarea;
use App\Models\TareaUrgente;
use App\Models\TareaRecurrente;
use App\Contracts\Notificable;

$tablero = new Tablero("Tablero Personal");

$porHacer = new Columna("Por hacer");
$enProgreso = new Columna("En progreso");
$hecho = new Columna("Hecho");

$t1 = new Tarea("Estudiar PHP");
$t2 = new TareaUrgente("Entregar Laboratorio", "2026-08-11");
$t3 = new TareaRecurrente("Respaldo semanal", "semanal");
$t4 = new Tarea("Repasar POO");

$t1->agregarComentario("Comenzar hoy mismo");

$porHacer->agregarTarea($t1);
$porHacer->agregarTarea($t3);

$enProgreso->agregarTarea($t2);

$hecho->agregarTarea($t4);

$tablero->agregarColumna($porHacer);
$tablero->agregarColumna($enProgreso);
$tablero->agregarColumna($hecho);

echo $tablero->resumenGeneral();

foreach ([$t1, $t2, $t3, $t4] as $tarea) {

    if ($tarea instanceof Notificable) {
        echo $tarea->notificar() . PHP_EOL;
    }

}