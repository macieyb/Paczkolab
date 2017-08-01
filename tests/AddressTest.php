<?php

require_once "./../class/Address.php";
require_once "./../load.php";

use PHPUnit\DbUnit\TestCase;

class AddressTest extends TestCase
{
    private $address;
    private $conn;
    private $pdo;

    function __construct()
    {
        parent::__construct();
        $this->pdo = new Database(
            $GLOBALS['DB_DSN'],
            $GLOBALS['DB_USER'],
            $GLOBALS['DB_PASSWD']
        );

    }

    protected function getConnection()
    {
        return $this->createDefaultDBConnection($this->pdo->pdo, $GLOBALS['DB_DBNAME']);

    }

    protected function getDataSet()
    {
        $dataMysql = $this->createMySQLXMLDataSet('./Paczkolab.xml');
        return $dataMysql;
    }

    protected function setUp()
    {
        parent::SetUp();
        DB::$conn=$this->pdo;
        $this->address = new Address();
        $this->address->setCity('Krakow');
        $this->address->setCode('30-112');
        $this->address->setStreet('Syrokomli');
        $this->address->setFlat(20);
        

    }


    function testLoad()
    {
        $address = new Address();
        $this->assertEquals(-1, $address->getId());
        $address->load(2);
        $this->assertEquals(2, $address->getId());
        $this->assertEquals("Warszawa", $address->getCity());
        $this->assertEquals("00-999", $address->getCode());
        $this->assertEquals('Jerozolimskie', $address->getStreet());
        $this->assertEquals(200, $address->getFlat());
    }

    function testSave()
    {
       
        $this->address->save();
        $this->assertNotEquals(13, $this->address->getId());
        $this->assertEquals(13, $this->address->getId());
    }
}
