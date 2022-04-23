<?php
/**
 * Main usage of this class is to handle
 * functionality related booking information
 *
 * @date       23/04/2022
 * @time       10:05 PM
 * @username   PC
 * @author     Ankit Patel
 */

namespace App\Controllers;

use Database;
use Exception;

/**
 * Class BookingInfoController
 *
 * @author  Ankit Patel
 * @package App\Controllers
 */
class BookingInfoController
{
    /**
     * @var Database
     */
    public $objConn;

    /**
     * BookingInfoController constructor.
     *
     * @throws Exception
     */
    public function __construct()
    {
        $this->objConn = new Database();
    }

    public function view() {

    }
}