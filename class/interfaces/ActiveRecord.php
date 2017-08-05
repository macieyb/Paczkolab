<?php

/**
 * Interface ActiveRecord
 */
interface ActiveRecord{

    /**
     * @param $id
     * @param $conn
     * @return object
     */
    function load($id);

    /**
     * @return Array of Objects / Exception on error
     */

    static function loadAll();

    /**
     * @return mixed
     */
    function update();

    /**
     * @return Inserted Object / Exception on error
     */
    function save();

    /**
     * @return true / Exception on error
     */
    function delete();
}