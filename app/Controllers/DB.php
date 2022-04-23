<?php
/**
 * Main usage of this class is to handle
 * functionality related database
 *
 * @date       23/04/2022
 * @time       10:05 PM
 * @username   PC
 * @author     Ankit Patel
 */

namespace App\Controllers;

use mysqli;
use Database;
use Exception;

/**
 * Class Database
 *
 * @author  Ankit Patel
 * @package App\Controllers
 */
class DB
{
    protected $_dbUser = DB['USER'];
    protected $_dbPassword = DB['PASS'];
    protected $_host = DB['HOST'];
    protected $_database = DB['DB'];
    protected $_characterSet = DB['CHAR_SET'];
    protected $_connection;

    /**
     * @return mysqli
     */
    public function connect(): mysqli
    {
        $this->_connection = new mysqli($this->_host, $this->_dbUser, $this->_dbPassword, $this->_database);
        if ($this->_connection->connect_error) {
            exit('Failed to connect to MySQL - '.$this->_connection->connect_error);
        }
        $this->_connection->set_charset($this->_characterSet);
        return $this->_connection;
    }
    public function close()
    {
        return $this->_connection->close();
    }
}