<?php

require_once __DIR__ . '/interfaces/ActiveRecord.php';
require_once __DIR__ . '/abstract/DB.php';
include_once __DIR__ . './../load.php';


class Address extends DB implements ActiveRecord, JsonSerializable
{

    private $id;
    private $city;
    private $code;
    private $street;
    private $flat;

    /**
     * Address constructor.
     */
    public function __construct()
    {


        $this->id = -1;

    }

    public function getId()
    {
        return $this->id;
    }


    public function setCity($city)
    {
        $this->city = $city;
    }

    public function setCode($code)
    {
        $this->code = $code;
    }

    public function setStreet($street)
    {
        $this->street = $street;
    }

    public function setFlat($flat)
    {
        $this->flat = $flat;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function getStreet()
    {
        return $this->street;
    }

    public function getFlat()
    {
        return $this->flat;
    }

    public function load($address_id)
    {

        $sql = "SELECT * FROM address WHERE id =:address_id";
        $params = ['address_id' => $address_id];

        if ($row = self::$conn->query($sql, $params)) {

            $this->id = $row[0]['id'];
            $this->city = $row[0]['city'];
            $this->code = $row[0]['code'];
            $this->street = $row[0]['street'];
            $this->flat = $row[0]['flat'];

            return $row;

        } else {

            return false;

        }
    }


    public function save()
    {
        if ($this->id == -1) {
            $params = ['city' => $this->city,
                'code' => $this->code,
                'street' => $this->street,
                'flat' => $this->flat
            ];

            $sql = "INSERT INTO address (city,code,street,flat) VALUES (:city,:code,:street,:flat)";
            $result = self::$conn->query($sql, $params);
            $this->id = self::$conn->lastId();
            return (bool)$result;
        } else {
       $this->update();
        }
        // TODO: Implement save() method.


    }

    public function update()
    {
        $params = ['id' => $this->id,
            'city' => $this->city,
            'code' => $this->code,
            'street' => $this->street,
            'flat' => $this->flat
        ];
        $sql = "UPDATE address SET city=:city,code=:code,street=:street,flat=:flat WHERE id=:id";
        $result = self::$conn->query($sql, $params);
        if ($result === true) {
            return true;
        }
        // TODO: Implement update() method.
    }

    public
    function delete()
    {
        // TODO: Implement delete() method.
    }

    function jsonSerialize()
    {
        // TODO: Implement jsonSerialize() method.
    }


    static public function loadAll()
    {
        $sql = "SELECT * FROM address";

        if ($result = Self::$conn->query($sql, null)) {

            foreach ($result as $key => $value) {
                $row[$key] = $value;
            }
            return $row;
        } else {
            return false;
        }
    }

}