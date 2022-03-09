<?php

require_once '../app/core/connection.php';

class customer extends Connection
{

    public function getcustomer($customer_id)
    {

        $sql = "SELECT * FROM customers where `customer_id`= $customer_id ";
        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;
        $customer = [];
        if ($numRows > 0) {
            while ($row = $result->fetch_assoc()) {
                $customer[] = $row;
            }
        }
        return $customer;
    }
    public function getALLcustomer()
    {

        $sql = "SELECT * FROM customers ";
        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;
        $customers = [];
        if ($numRows > 0) {
            while ($row = $result->fetch_assoc()) {
                $customers[] = $row;
            }
        }
        return $customers;
    }

    public function insertcustomer($customer_name,  $customer_email, $customer_contact, $customer_address, $country)
    {
        $this->connect()->query("INSERT INTO `customers` ( `customer_name`, `customer_email`, `customer_contact`, `customer_address`, `country`) VALUES ( '$customer_name','$customer_email', '$customer_contact', '$customer_address','$country')");
    }


    public function delete($customer_id)
    {
        $this->connect()->query("DELETE FROM `customers` WHERE `customer_id`= $customer_id");
    }
    public function update($customer_id, $customer_name,  $customer_email, $customer_contact, $customer_address, $country)
    {
        $this->connect()->query("UPDATE `customers` SET `customer_name` = '$customer_name', `customer_email` = '$customer_email' ,`customer_contact` = '$customer_contact',`customer_address` = '$customer_address',`country` = '$country' WHERE `customers`.`customer_id`='$customer_id'");
    }
}
