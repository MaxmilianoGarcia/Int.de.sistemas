<?php

namespace App\Http\Controllers;

class TransaccionController extends Controller
{
    public function index()
    {
        $transacciones = [
            [
                'id' => 1,
                'comercio' => 'Café Amanecer',
                'monto' => 25.50,
                'estado' => 'Iniciada',
            ],
            [
                'id' => 2,
                'comercio' => 'Ferretería San José',
                'monto' => 75.00,
                'estado' => 'Procesando',
            ],
            [
                'id' => 3,
                'comercio' => 'Pupusería El Buen Sabor',
                'monto' => 15.00,
                'estado' => 'Completada',
            ],
        ];

        return $transacciones;
    }
}