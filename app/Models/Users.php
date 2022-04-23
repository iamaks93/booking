<?php
/**
 * Main usage of this class is to perform
 * database related operation of table
 * users
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
 * Class Users
 *
 * @author  Ankit Patel
 * @package App\Models
 */
class Users
{
    /**
     * @var string
     */
    private $_table = 'users';

    /**
     * @var
     */
    private $conn;

    /**
     * Users constructor.
     *
     */
    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    /**
     * Get users list
     *
     * @auhtor Ankit Patel
     * @return array
     */
    public function getList(): array
    {
        $sql = "SELECT 
                   u_id AS `id`,
                   u_name AS `val`   
                FROM
                  $this->_table      
                ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(1);
    }
}