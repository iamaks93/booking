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

namespace PharmaAppV2\FridgeLog;

use \Exception;

/**
 * Class Vehicles
 *
 * @author  Ankit Patel
 * @package App\Models
 */
class Vehicles
{
    /**
     * @var string
     */
    private $_table = 'vehicles';
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
}