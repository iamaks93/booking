<?php
/**
 * Main usage of this class is to handle
 * functionality related vehicle
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
 * Class VehicleController
 *
 * @author  Ankit Patel
 * @package App\Controllers
 */
class VehicleController
{
    /**
     * @var Database
     */
    public $objConn;

    /**
     * VehicleController constructor.
     *
     * @throws Exception
     */
    public function __construct()
    {
        $this->objConn = new Database();
    }
}