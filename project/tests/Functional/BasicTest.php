<?php

declare(strict_types=1);

namespace App\tests\Unit;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class BasicTest extends KernelTestCase
{
    public function testUnitEnvironnementIsOk(): void
    {
        $this->assertTrue(true);
    }
}
