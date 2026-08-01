<?php

namespace App\Models;

class Columna
{
    private string $nombre;
    private int $limiteWip;
    private array $tareas = [];

    public function __construct(string $nombre, int $limiteWip = 5)
    {
        $this->nombre = $nombre;
        $this->limiteWip = $limiteWip;
    }

    public function agregarTarea(Tarea $tarea): void
    {
        if (!$this->estaLlena()) {
            $this->tareas[] = $tarea;
        }
    }

    public function contarTareas(): int
    {
        return count($this->tareas);
    }

    public function estaLlena(): bool
    {
        return count($this->tareas) >= $this->limiteWip;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }
}