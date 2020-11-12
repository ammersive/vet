<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Owner;

class PhoneTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testPhone()
    {
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

        $pat = Owner::first();
        
        // Valid number tests
        // National number, no spaces
        $this->assertSame("01329805577", $pat->telephone);        
        $this->assertTrue($pat->validPhoneNumber());
        
        // National number, spaces
        $pat->telephone = "0117 333 4444";
        $this->assertSame("0117 333 4444", $pat->telephone);        
        $this->assertTrue($pat->validPhoneNumber());

        // International number, spaces
        $pat->telephone = "+44 1234 567 890";
        $this->assertSame("+44 1234 567 890", $pat->telephone);        
        $this->assertTrue($pat->validPhoneNumber());

        // International number, hyphens
        $pat->telephone = "+35-1234-567-890";
        $this->assertSame("+35-1234-567-890", $pat->telephone);        
        $this->assertTrue($pat->validPhoneNumber());

        // National number, hyphens    
        $pat->telephone = "0161-889-8008";
        $this->assertSame("0161-889-8008", $pat->telephone);        
        $this->assertTrue($pat->validPhoneNumber());
        
        // Invalid number tests
        // Too short
        $pat->telephone = "869";
        $this->assertSame("869", $pat->telephone); 
        $this->assertTrue($pat->validPhoneNumber() === false);

        // Too long   
        $pat->telephone = "09500495495748998";
        $this->assertSame("09500495495748998", $pat->telephone); 
        $this->assertTrue($pat->validPhoneNumber() === false);

        // Invalid characters    
        $pat->telephone = "0fh/j57bfhe";
        $this->assertSame("0fh/j57bfhe", $pat->telephone); 
        $this->assertTrue($pat->validPhoneNumber() === false);

        // Empty    
        $pat->telephone = "";
        $this->assertSame("", $pat->telephone); 
        $this->assertTrue($pat->validPhoneNumber() === false);

        // Invalid chars, too long    
        $pat->telephone = "ghyddgjhbhjfdruuiunj";
        $this->assertSame("ghyddgjhbhjfdruuiunj", $pat->telephone); 
        $this->assertTrue($pat->validPhoneNumber() === false);
    }
}
