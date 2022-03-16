<?php

class customers extends controller
{
    public function read()
    {
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        $this->model = $this->model('customer');
        $customer = $this->model->getALLcustomer();
        if ($customer != NULL) {
            echo json_encode($customer);
        } else {
            http_response_code(404);
            echo json_encode(
                array("message" => "No record found.")
            );
        }
    }

    public function readone()
    {
        require_once '../app/controllers/headers.php';

        if (isset($_GET['id'])) {
            $customer_id = $_GET['id'];
            // echo "hello world";
            $this->model = $this->model('customer');
            $customer = $this->model->getcustomer($customer_id);
            if ($customer != null) {
                http_response_code(200);
                echo json_encode($customer);
            } else {
                http_response_code(404);
                echo json_encode("customer not found.");
            }
        }
    }

    public function create()
    {
        require_once '../app/controllers/headers.php';

        // $data = json_decode(file_get_contents("php://input"));
        $data = $_POST;
        if ($data != NULL) {
            $customer_name = $data['customer_name'];
            $customer_email = $data['customer_email'];
            $customer_contact = $data['customer_contact'];
            $customer_address = $data['customer_address'];
            $country = $data['country'];
            $this->model = $this->model('customer');
            $this->model->insertcustomer($customer_name, $customer_email, $customer_contact, $customer_address, $country);

            echo json_encode(['meesage' => 'Employee created successfully.']);
        } else {
            echo json_encode(['meesage' => 'Employee could not be created.']);
        }
    }
    public function edit()
    {
        require_once '../app/controllers/headers.php';

        // $data = json_decode(file_get_contents("php://input"));
        
        // print_r($_POST);
        // die;
        $data =$_POST ;
        if (!empty($data)) {
            $customer_id = $data['customer_id'];
            $customer_name = $data['customer_name'];
            $customer_email = $data['customer_email'];
            $customer_contact = $data['customer_contact'];
            $customer_address = $data['customer_address'];
            $country = $data['country'];
            $this->model = $this->model('customer');
            $this->model->update($customer_name, $customer_email, $customer_contact, $customer_address, $country, $customer_id);
            echo json_encode(['meesage' => 'Customer data updated.']);
        }
        else {
            echo json_encode(['meesage' => 'Employee could not be updated.']);
        }
    }
    public function delete()
    {
        require_once '../app/controllers/headers.php';
        $customer_id = $_GET['id'];
        if ($customer_id != NULL) {
            $this->model = $this->model('customer');
            $this->model->delete($customer_id);
            echo json_encode(['meesage' => 'Customer deleted.']);
        }
    }
}
