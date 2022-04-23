<?php
/**
 * Main usage of this class is to perform
 * database related operation of table
 * vehicles
 *
 *
 * @date       23/04/2022
 * @time       10:05 PM
 * @username   PC
 * @author     Ankit Patel
 */

namespace App\Models;

use \Exception;

/**
 * Class Vehicles
 *
 * @author  Ankit Patel
 * @package App\Models
 */
class VehiclesInfo
{
    /**
     * @var string
     */
    private $_table = 'vehicles_info';
    /**
     * @var
     */
    private $conn;

    /**
     * Vehicles constructor.
     *
     */
    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    /**
     * Get vehicle list
     *
     * @auhtor Ankit Patel
     * @return array
     */
    public function getList(): array
    {
        $sql = "SELECT 
                   vi_id AS `id`,
                   vi_name AS `val`   
                FROM
                  $this->_table      
                ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(1);
    }
}