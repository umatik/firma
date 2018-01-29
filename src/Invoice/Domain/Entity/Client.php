<?php
declare(strict_types = 1);

namespace App\Invoice\Domain\Entity;

use App\Contractor\Domain\Entity\Contractor;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="client")
 * @ORM\Entity()
 */
class Client extends Contractor
{
}
