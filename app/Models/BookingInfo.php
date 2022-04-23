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

    /**
     * Get list of booking
     *
     * @auhtor Ankit Patel
     * @return array
     */
    public function list(): array
    {
        $sql = "SELECT
                  (
                    CASE WHEN bi_type = 'morning_half_day' THEN 'Half Day(Morning)' WHEN bi_type = 'evening_half_day' THEN 'Half Day(Evening)' ELSE 'Full Day'
                  END
                ) slot_type,
                DATE_FORMAT(bi_booking_date,
                '%d-%m-%Y') AS booking_date,
                u_name,
                vi_name
                FROM
                  $this->_table
                JOIN
                  users ON u_id = bi_u_id
                JOIN
                  vehicles_info ON vi_id = bi_vi_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(1);
    }

    /**
     * Insert booking information
     *
     * @auhtor Ankit Patel
     * @return int
     */
    public function insert(): int
    {
        $sql = "INSERT INTO  $this->_table (      
        `bi_u_id`,
        `bi_vi_id`,
        `bi_type`,
        `bi_booking_date`,
        `bi_created_at`,
        `bi_user_agent`,
        `bi_from_user_ip`
        ) VALUES (?,?,?,?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('iisssss',
            $this->bi_u_id,
            $this->bi_vi_id,
            $this->bi_type,
            $this->bi_booking_date,
            $this->bi_created_at,
            $this->bi_user_agent,
            $this->bi_from_user_ip);
        $stmt->execute();
        return $stmt->insert_id;
    }

    /**
     * Insert booking information
     *
     * @auhtor Ankit Patel
     * @param  int     $vehicleId
     * @param  string  $date
     * @param  string  $slotType
     * @return int
     */
    public function isVehicleBooked(int $vehicleId,string $date,string $slotType): int
    {
        $sql = "SELECT 
                 COUNT(*) AS bookedCount 
                FROM
                  $this->_table
                WHERE bi_vi_id = ?
                AND bi_booking_date = ?
                AND bi_type = ?
                ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('iss',
            $vehicleId,
            $date,
            $slotType
        );
        $stmt->execute();
        return $stmt->get_result()->fetch_object()->bookedCount;
    }
}