<?php
// src/Enum/PaymentMode.php
namespace App\Enum;

enum PaymentMode: string
{
    case Carte = 'carte';
    case Espece = 'espece';
}