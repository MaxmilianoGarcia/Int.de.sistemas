<?php

namespace App\Models;

class Tablero
{
    private string $nombre;
    private array $columnas = [];

    public function __construct(string $nombre)
    {
        $this->nombre = $nombre;
    }

    public function agregarColumna(Columna $columna): void
    {
        $this->columnas[] = $columna;
    }

    public function contarTareasTotales(): int
    {
        $total = 0;

        foreach ($this->columnas as $columna) {
            $total += $columna->contarTareas();
        }

        return $total;
    }

    public function resumenGeneral(): string
    {
        $texto = "Tablero: {$this->nombre}" . PHP_EOL;

        foreach ($this->columnas as $columna) {
            $texto .= "- {$columna->getNombre()}: {$columna->contarTareas()} tarea(s)" . PHP_EOL;
        }

        return $texto;
    }
}