<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EstadisticasRepository")
 * @ORM\Entity(readOnly=true)
 * @ORM\Table(name="almuerzos_view")
 */
class Estadisticas
{
   private function __construct() {}
}