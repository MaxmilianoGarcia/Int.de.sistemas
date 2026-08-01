<?php

class Libro
{
    private string $titulo;

    public function __construct(string $titulo)
    {
        $this->titulo = $titulo;
    }

    public function getTitulo(): string
    {
        return $this->titulo;
    }
}

$libro = new Libro("Clean Code");

echo $libro->getTitulo() . PHP_EOL;