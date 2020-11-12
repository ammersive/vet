<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Owner;

class OwnerTest extends TestCase
{
    public function testOwnerAdded()
    {
        $owner = new Owner([
            "first_name" => "Dick",
            "last_name" => "Wittington",
            "telephone" => "0204895578",
            "email" => "mayor@london.gov",
            "address_1" => "1 City Hall",
            "address_2" => "Southwark",
            "town" => "London",
            "postcode" => "SE4 3RF",
        ]);

        $this->assertTrue($owner->first_name === "Dick");
        $this->assertTrue($owner->last_name === "Wittington");
        $this->assertTrue($owner->telephone === "0204895578");
        $this->assertTrue($owner->email === "mayor@london.gov");
        $this->assertTrue($owner->address_1 === "1 City Hall");
        $this->assertTrue($owner->address_2 === "Southwark");
        $this->assertTrue($owner->town === "London");
        $this->assertTrue($owner->postcode === "SE4 3RF");
    }
}
