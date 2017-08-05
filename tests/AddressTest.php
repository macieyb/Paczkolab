<?php

require_once "./../class/Address.php";
require_once "./../load.php";

use PHPUnit\DbUnit\TestCase;

class AddressTest extends TestCase
{
    private $address;
    private $conn;
    private $pdo;



    protected function getConnection()
    {
        $this->pdo = new PDO(
            $GLOBALS['DB_DSN'],
            $GLOBALS['DB_USER'],
            $GLOBALS['DB_PASSWD']
        );

//        $this->conn = $this->createDefaultDBConnection($this->pdo, $GLOBALS['DB_DBNAME']);
        return $this->createDefaultDBConnection($this->pdo, $GLOBALS['DB_DBNAME']);

    }

    protected function getDataSet()
    {
        $dataMysql = $this->createMySQLXMLDataSet('./Paczkolab.xml');
        return $dataMysql;
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
        $address = new Address();
        $address->setCity('Krakow');
        $address->setCode('30-112');
        $address->setStreet('Syrokomli');
        $address->setFlat(20);
        $address->save();
        $this->assertNotEquals(-1, $address->getId());
        $address->setFlat(25);
        $id1=$address->getId();
       $address->save();
        $id2 = $address->getId();
        $this->assertEquals($id1,$id2);
        $address = new Address();
        $address->load($id2);
        $this->assertEquals(25,$address->getFlat());

    }
    function testloadAll()
    {
        $result = Address::loadAll();
        $this->assertNotEmpty($result);
        $this->assertEquals(4,count($result));
    }
}
