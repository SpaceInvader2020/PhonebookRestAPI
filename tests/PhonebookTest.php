<?php

namespace App\Tests;

use App\Entity\Phonebook;
use PHPUnit\Framework\TestCase;

class PhonebookTest extends TestCase
{
    /**
     * @var Phonebook
     */
    private $phonebook;

    public function setUp(): void
    {
        $this->phonebook = new Phonebook();
    }

    public function testGetFirstName()
    {
        $this->phonebook->setFirstName("John");
        $this->assertEquals("John", $this->phonebook->getFirstName());
    }

    public function testGetLastName()
    {
        $this->phonebook->setLastName("Smith");
        $this->assertEquals("Smith", $this->phonebook->getLastName());
    }


    public function testGetEmail()
    {
        $this->phonebook->setEmail("test@example.com");
        $this->assertEquals("test@example.com", $this->phonebook->getEmail());
    }


    public function testGetPhone()
    {
        $this->phonebook->setPhone("079797979979");
        $this->assertEquals("079797979979", $this->phonebook->getPhone());
    }

}
