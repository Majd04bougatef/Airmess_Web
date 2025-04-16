<?php
namespace App\Enum;

enum OffreStatus: string
{
    case EN_ATTENTE = 'En attente';
    case CONFIRME = 'Confirmé';
    case REJETE = 'Rejeté';
}