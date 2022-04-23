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


use App\Models\Users;
use Exception;
use App\Controllers\DB;
use App\Helpers\Helper;
use App\Models\VehiclesInfo;

/**
 * Class BookingInfoController
 *
 * @author  Ankit Patel
 * @package App\Controllers
 */
class BookingInfoController
{
    /**
     * @var DB
     */
    public $objConn;

    /**
     * BookingInfoController constructor.
     *
     * @throws Exception
     */
    public function __construct()
    {
        $this->objConn = new DB();
    }

    /**
     * Get view information
     *
     * @auhtor Akshay Mahajan
     * @return array
     */
    public function view(): array
    {
        $objConn = $this->objConn->connect();
        $vehicleList = Helper::makeDropdown((new VehiclesInfo($objConn))->getList(),'vehicle');
        $userList = Helper::makeDropdown((new Users($objConn))->getList(),'users');
        $objConn->close();
        return compact('vehicleList', 'userList');
    }
}