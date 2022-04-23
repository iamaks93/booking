<?php
/**
 * Main usage of this class is to perform
 * database related operation of table
 * booking_info
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
 * Class BookingInfo
 *
 * @author  Ankit Patel
 * @package App\Models
 */
class BookingInfo
{
    /**
     * @var string
     */
    private $_table = 'booking_info';

    /**
     * @var
     */
    private $conn;

    /**
     * BookingInfo constructor.
     *
     */
    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getBooking()
    {
        $sql = "SELECT 
                `bi_type`,
                `bi_start_date`,
                `bi_end_date`,
                `u_name`,
                `vi_name`,
                `bi_created_at`     
                FROM
                  $this->_table      
                LEFT JOIN users ON u.u_id = bi_u_id 
                LEFT JOIN vehicles_info ON vi_id = bi_vi_id               
                WHERE bi_u_id = ?
                ";
        if (!$stmt = $this->conn->prepare($sql)) {
            throw new Exception($this->conn->error);
        }
        $stmt->bind_param('i', $this->bi_u_id);
        if (!$stmt->execute()) {
            throw new Exception($stmt->error);
        }
        $fetchedData = $stmt->get_result()->fetch_all(1);
        return $fetchedData;
    }
}