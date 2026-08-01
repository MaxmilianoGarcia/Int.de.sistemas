<?php

require __DIR__ . '/vendor/autoload.php';

use App\Models\Tarea;
use App\Models\TareaUrgente;
use App\Models\TareaRecurrente;
use App\Models\Columna;
use App\Models\Tablero;
use App\Contracts\Notificable;
use App\Contracts\Comentable;

echo "=== PRUEBA DE VERIFICACIÓN: Tarea Semana 2 ===" . PHP_EOL;

$pasadas = 0;
$total = 0;

function verificar(string $d, bool $c): void
{
    global $pasadas, $total;

    $total++;

    if ($c) {
        $pasadas++;
        echo "PASÓ: $d" . PHP_EOL;
    } else {
        echo "FALLÓ: $d" . PHP_EOL;
    }
}

$urgente = new TareaUrgente("Prueba", "2026-12-01");
$recurrente = new TareaRecurrente("Prueba 2", "diaria");

verificar("TareaUrgente ES-UNA Tarea", $urgente instanceof Tarea);
verificar("TareaRecurrente ES-UNA Tarea", $recurrente instanceof Tarea);

verificar("TareaUrgente implementa Notificable", $urgente instanceof Notificable);
verificar("TareaRecurrente implementa Notificable", $recurrente instanceof Notificable);

verificar("Tarea implementa Comentable", $urgente instanceof Comentable);

verificar(
    "Polimorfismo correcto",
    $urgente->notificar() !== $recurrente->notificar()
);

$urgente->agregarComentario("Comentario de prueba");

verificar(
    "Comentario agregado correctamente",
    count($urgente->getComentarios()) === 1
);

$columna = new Columna("Por hacer", 2);

$columna->agregarTarea(new Tarea("A"));
$columna->agregarTarea(new Tarea("B"));

verificar(
    "Columna llena correctamente",
    $columna->estaLlena() === true
);

$tablero = new Tablero("Tablero");

$tablero->agregarColumna($columna);

verificar(
    "Tablero cuenta tareas",
    $tablero->contarTareasTotales() === 2
);

echo PHP_EOL;
echo "Resultado: $pasadas de $total pruebas aprobadas." . PHP_EOL;