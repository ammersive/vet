<?php

namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Owner;

class EmailTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testEmail()
    {
        // $this->assertTrue(true);
        Owner::create([
            "first_name" => "Pat",
            "last_name" => "Postman",
            "telephone" => "01329805577",
            "email" => "happyman@royal.mail",
            "address_1" => "1 Letter Way",
            "address_2" => "Greendale",
            "town" => "Cumbria",
            "postcode" => "CU4 5FJ",    
        ]);

        $ownerFromDB = Owner::first();

        $this->assertSame("happyman@royal.mail", $ownerFromDB->email);
        
        $this->assertTrue(Owner::checkByEmail("happyman@royal.mail"));

        $this->assertTrue((Owner::checkByEmail("not@in.db")) === false);

    }
}
