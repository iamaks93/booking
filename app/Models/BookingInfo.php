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

namespace PharmaAppV2\FridgeLog;

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
}