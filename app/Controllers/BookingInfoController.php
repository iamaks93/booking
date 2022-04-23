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


use App\Models\BookingInfo;
use App\Models\Users;
use Exception;
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
     * @auhtor Ankit Patel
     * @return array
     */
    public function view(): array
    {
        $objConn = $this->objConn->connect();
        $vehicleList = Helper::makeDropdown((new VehiclesInfo($objConn))->getList(), 'vehicle');
        $userList = Helper::makeDropdown((new Users($objConn))->getList(), 'users');
        $slotType = Helper::makeDropdown(
            [
                ['id' => 'morning_half_day', 'val' => 'Half Day(Morning)'],
                ['id' => 'evening_half_day', 'val' => 'Half Day(Evening)'],
                ['id' => 'full_day', 'val' => 'Full Day'],
            ],
            'slot_type'
        );
        $objConn->close();
        return compact('vehicleList', 'userList', 'slotType');
    }

    /**
     * Store booking information
     *
     * @return int (Return 0 = Failed, 1 = Booking Success, 2 = Already Booked)
     * @auhtor Ankit Patel
     */
    public function store(): int
    {
        $objConn = $this->objConn->connect();
        try {
            $objBI = (new BookingInfo($objConn));

            $checkStatus = $objBI->isVehicleBooked(
                intval($_POST['ddlb_vehicle']),
                $_POST['txt_date'],
                trim($_POST['ddlb_slot_type'])
            );
            if($checkStatus > 0) {
                return 2;
            }

            $objBI->bi_u_id = intval($_POST['ddlb_users']);
            $objBI->bi_vi_id = intval($_POST['ddlb_vehicle']);
            $objBI->bi_type = trim($_POST['ddlb_slot_type']);
            $objBI->bi_booking_date = $_POST['txt_date'];
            $objBI->bi_created_at = date('Y-m-d H:i:s');
            $objBI->bi_user_agent = Helper::userAgent();
            $objBI->bi_from_user_ip = Helper::getClientIp();
            $objBI->insert();
            $objConn->close();
            return 1;
        } catch (\Throwable $e) {
            return 0;
        }
    }

    /**
     * Get booking list
     *
     * @auhtor Ankit Patel
     * @return array
     */
    public function list(): array
    {
        $objConn = $this->objConn->connect();
        $bookings = (new BookingInfo($objConn))->list();
        $objConn->close();
        return compact('bookings');
    }
}