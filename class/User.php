<?php

require_once './interfaces/ActiveRecord.php';


class User extends DB implements ActiveRecord, JsonSerializable {

    private $id,$name, $surname, $address_id, $credits, $password;

    function __construct($id,$name, $surname, $address_id, $credits, $password)
    {

    }

    static function load($id)
    {
        // TODO: Implement load() method.
        $sql = "";
        $params = [];
        return self::$conn->getData($sql, $params);

    }

    static function loadAll()
    {
        // TODO: Implement loadAll() method.
    }

    function save()
    {
        // TODO: Implement save() method.
    }

    function update()
    {
        // TODO: Implement update() method.
    }

    function delete()
    {
        // TODO: Implement delete() method.
    }

    function jsonSerialize()
    {
        // TODO: Implement jsonSerialize() method.
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    private function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @param mixed $surname
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;
    }

    /**
     * @return mixed
     */
    public function getAddressId()
    {
        return $this->address_id;
    }

    /**
     * @param mixed $address_id
     */
    public function setAddressId($address_id)
    {
        $this->address_id = $address_id;
    }

    /**
     * @return mixed
     */
    public function getCredits()
    {
        return $this->credits;
    }

    /**
     * @param mixed $credits
     */
    public function setCredits($credits)
    {
        $this->credits = $credits;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    private function setPassword($password)
    {
        $this->password = $password;
    }





}