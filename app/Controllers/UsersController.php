<?php
/**
 * Main usage of this class is to handle
 * functionality related users
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
 * Class UsersController
 *
 * @author  Ankit Patel
 * @package App\Controllers
 */
class UsersController
{
    /**
     * @var Database
     */
    public $objConn;

    /**
     * UsersController constructor.
     *
     * @throws Exception
     */
    public function __construct()
    {
        $this->objConn = new Database();
    }

}