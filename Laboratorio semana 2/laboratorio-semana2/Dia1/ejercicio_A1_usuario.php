<?php

class Usuario
{
    public string $nombre;
    public bool $activo = true;

    public function desactivar(): void
    {
        $this->activo = false;
    }
}