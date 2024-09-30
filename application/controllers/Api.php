<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Product_model');
        $this->load->model('Service_model');
        $this->load->library('ApiResponseStatus');
        $this->load->library('session');
    }

    private function response($data, $http_code)
    {
        $this->output
            ->set_content_type('application/json')
            ->set_status_header($http_code)
            ->set_output(json_encode($data));
    }

    public function login()
    {
        $json = $this->input->raw_input_stream;
        $data = json_decode($json, true);

        $email = isset($data['email']) ? trim($data['email']) : null;
        $password = isset($data['password']) ? trim($data['password']) : null;

        if (empty($email) || empty($password)) {
            $missingFields = [];
            if (empty($email)) $missingFields[] = 'email';
            if (empty($password)) $missingFields[] = 'password';

            $this->response([
                'status' => ApiResponseStatus::ERROR,
                'message' => 'The following fields are required: ' . implode(', ', $missingFields)
            ], ApiResponseStatus::HTTP_BAD_REQUEST);
            return;
        }

        $user = $this->User_model->get_user($email);

        // Check if user exists
        if (!$user) {
            $this->response([
                'status' => ApiResponseStatus::ERROR,
                'message' => 'User not found.'
            ], ApiResponseStatus::HTTP_NOT_FOUND);
            return;
        }

        // Verify the password
        if (password_verify($password, $user['password'])) {
            $this->session->set_userdata('id', $user['id']);
            $this->session->set_userdata('email', $user['email']);
            $this->session->set_userdata('username', $user['username']);

            $this->response([
                'status' => ApiResponseStatus::SUCCESS,
                'message' => 'Login successful',
                'data' => $user
            ], ApiResponseStatus::HTTP_OK);
        } else {
            $this->response([
                'status' => ApiResponseStatus::ERROR,
                'message' => 'Invalid username or password'
            ], ApiResponseStatus::HTTP_UNAUTHORIZED);
        }
    }

    public function register()
    {
        $json = $this->input->raw_input_stream;
        $data = json_decode($json, true);

        $password = isset($data['password']) ? trim($data['password']) : null;
        $name = isset($data['name']) ? trim($data['name']) : null;
        $email = isset($data['email']) ? trim($data['email']) : null;

        if (empty($email) || empty($password)) {
            $this->response([
                'status' => ApiResponseStatus::ERROR,
                'message' => 'Email and Password are required.'
            ], ApiResponseStatus::HTTP_BAD_REQUEST);
            return;
        }

        // Check if user already exists
        $existing_user = $this->User_model->get_user($email);
        if ($existing_user) {
            $this->response([
                'status' => ApiResponseStatus::ERROR,
                'message' => 'Email already exists. Please choose another one.'
            ], ApiResponseStatus::HTTP_CONFLICT);
            return;
        }

        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $user_data = [
            'email' => $email,
            'password' => $hashed_password,
            'name' => $name,
            'created_at' => date('Y-m-d H:i:s'),
        ];

        // Save new user
        if ($this->User_model->create_user($user_data)) {
            $new_user = $this->User_model->get_user($email);

            $this->session->set_userdata('id', $new_user['id']);
            $this->session->set_userdata('email', $new_user['email']);
            $this->session->set_userdata('username', $new_user['name']);

            $this->response([
                'status' => ApiResponseStatus::SUCCESS,
                'message' => 'User registered successfully',
                'data' => $new_user
            ], ApiResponseStatus::HTTP_OK);
        } else {
            $this->response([
                'status' => ApiResponseStatus::ERROR,
                'message' => 'Failed to register user'
            ], ApiResponseStatus::HTTP_BAD_REQUEST);
        }
    }

    public function get_users()
    {
        if (!$this->session->userdata('id')) {
            $this->response([
                'status' => ApiResponseStatus::ERROR,
                'message' => 'Unauthorized. Please log in.'
            ], ApiResponseStatus::HTTP_UNAUTHORIZED);
            return;
        }

        $user_id = $this->session->userdata('id');
        $user = $this->User_model->get_user_by_id($user_id);

        if ($user) {
            $this->response([
                'status' => ApiResponseStatus::SUCCESS,
                'message' => 'User retrieved successfully',
                'data' => $user
            ], ApiResponseStatus::HTTP_OK);
        } else {
            $this->response([
                'status' => ApiResponseStatus::ERROR,
                'message' => 'User not found'
            ], ApiResponseStatus::HTTP_NOT_FOUND);
        }
    }

    public function edit_user($username)
    {
        $json = $this->input->raw_input_stream;
        $data = json_decode($json, true);

        if (empty($data['password'])) {
            $this->response([
                'status' => ApiResponseStatus::ERROR,
                'message' => 'Password is required.'
            ], ApiResponseStatus::HTTP_BAD_REQUEST);
            return;
        }

        // encrypt password
        $hashed_password = password_hash($data['password'], PASSWORD_DEFAULT);

        $user_data = [
            'password' => $hashed_password
        ];

        if ($this->User_model->update_user($username, $user_data)) {
            $this->response([
                'status' => ApiResponseStatus::SUCCESS,
                'message' => 'User updated successfully'
            ], ApiResponseStatus::HTTP_OK);
        } else {
            $this->response([
                'status' => ApiResponseStatus::ERROR,
                'message' => 'Failed to update user'
            ], ApiResponseStatus::HTTP_BAD_REQUEST);
        }
    }

    public function delete_user($username)
    {
        $user = $this->User_model->get_user($username);

        if (!$user) {
            $this->response([
                'status' => ApiResponseStatus::ERROR,
                'message' => 'User not found or already deleted'
            ], ApiResponseStatus::HTTP_NOT_FOUND);
            return;
        }

        // Proceed with soft deletion
        if ($this->User_model->soft_delete_user($username)) {
            $this->response([
                'status' => ApiResponseStatus::SUCCESS,
                'message' => 'User deleted successfully'
            ], ApiResponseStatus::HTTP_OK);
        } else {
            $this->response([
                'status' => ApiResponseStatus::ERROR,
                'message' => 'Failed to delete user'
            ], ApiResponseStatus::HTTP_BAD_REQUEST);
        }
    }

    public function get_produk_oil()
    {
        if (!$this->session->userdata('id')) {
            $this->response([
                'status' => ApiResponseStatus::ERROR,
                'message' => 'Unauthorized. Please log in.'
            ], ApiResponseStatus::HTTP_UNAUTHORIZED);
            return;
        }

        $produk = $this->Product_model->get_products_category_oil();

        if ($produk) {
            $this->response([
                'status' => ApiResponseStatus::SUCCESS,
                'message' => 'Produk retrieved successfully',
                'data' => $produk
            ], ApiResponseStatus::HTTP_OK);
        } else {
            $this->response([
                'status' => ApiResponseStatus::ERROR,
                'message' => 'No products found'
            ], ApiResponseStatus::HTTP_NOT_FOUND);
        }
    }

    public function get_produk_engine()
    {
        if (!$this->session->userdata('id')) {
            $this->response([
                'status' => ApiResponseStatus::ERROR,
                'message' => 'Unauthorized. Please log in.'
            ], ApiResponseStatus::HTTP_UNAUTHORIZED);
            return;
        }

        $produk = $this->Product_model->get_products_category_engine();

        if ($produk) {
            $this->response([
                'status' => ApiResponseStatus::SUCCESS,
                'message' => 'Produk retrieved successfully',
                'data' => $produk
            ], ApiResponseStatus::HTTP_OK);
        } else {
            $this->response([
                'status' => ApiResponseStatus::ERROR,
                'message' => 'No products found'
            ], ApiResponseStatus::HTTP_NOT_FOUND);
        }
    }

    public function create_product()
    {
        $json = $this->input->raw_input_stream;
        $data = json_decode($json, true);

        $name = isset($data['name']) ? trim($data['name']) : null;
        $price = isset($data['price']) ? trim($data['price']) : null;
        $description = isset($data['description']) ? trim($data['description']) : null;
        $category = isset($data['category']) ? trim($data['category']) : null;
        $image_url = isset($data['image_url']) ? trim($data['image_url']) : null;

        if (empty($name) || empty($price) || empty($image_url)) {
            $this->response([
                'status' => ApiResponseStatus::ERROR,
                'message' => 'Name, Price, and Image URL are required.'
            ], ApiResponseStatus::HTTP_BAD_REQUEST);
            return;
        }

        $product_data = [
            'name' => $name,
            'price' => $price,
            'description' => $description,
            'category' => $category,
            'image_url' => $image_url,
            'created_at' => date('Y-m-d H:i:s')
        ];

        if ($this->Product_model->create_product($product_data)) {
            $this->response([
                'status' => ApiResponseStatus::SUCCESS,
                'message' => 'Product created successfully.',
                'data' => $product_data
            ], ApiResponseStatus::HTTP_OK);
        } else {
            $this->response([
                'status' => ApiResponseStatus::ERROR,
                'message' => 'Failed to create product.'
            ], ApiResponseStatus::HTTP_BAD_REQUEST);
        }
    }

    public function edit_product($id)
    {
        $json = $this->input->raw_input_stream;
        $data = json_decode($json, true);

        $name = isset($data['name']) ? trim($data['name']) : null;
        $price = isset($data['price']) ? trim($data['price']) : null;
        $description = isset($data['description']) ? trim($data['description']) : null;

        if (empty($name) || empty($price)) {
            $this->response([
                'status' => ApiResponseStatus::ERROR,
                'message' => 'Name and Price are required.'
            ], ApiResponseStatus::HTTP_BAD_REQUEST);
            return;
        }

        $product_data = [
            'name' => $name,
            'price' => $price,
            'description' => $description
        ];

        if ($this->Product_model->update_product($id, $product_data)) {
            $this->response([
                'status' => ApiResponseStatus::SUCCESS,
                'message' => 'Product updated successfully.'
            ], ApiResponseStatus::HTTP_OK);
        } else {
            $this->response([
                'status' => ApiResponseStatus::ERROR,
                'message' => 'Failed to update product.'
            ], ApiResponseStatus::HTTP_BAD_REQUEST);
        }
    }

    public function delete_product($id)
    {
        $product = $this->Product_model->get_product_by_id($id);

        if (!$product) {
            $this->response([
                'status' => ApiResponseStatus::ERROR,
                'message' => 'Product not found.'
            ], ApiResponseStatus::HTTP_NOT_FOUND);
            return;
        }

        if ($this->Product_model->delete_product($id)) {
            $this->response([
                'status' => ApiResponseStatus::SUCCESS,
                'message' => 'Product deleted successfully.'
            ], ApiResponseStatus::HTTP_OK);
        } else {
            $this->response([
                'status' => ApiResponseStatus::ERROR,
                'message' => 'Failed to delete product.'
            ], ApiResponseStatus::HTTP_BAD_REQUEST);
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('id');
        $this->session->sess_destroy();

        $this->response([
            'status' => ApiResponseStatus::SUCCESS,
            'message' => 'Logout successful'
        ], ApiResponseStatus::HTTP_OK);
    }

    public function get_all_orders()
    {
        // Fetch all orders
        $orders = $this->Service_model->get_all_orders();

        if (!empty($orders)) {
            $this->response([
                'status' => ApiResponseStatus::SUCCESS,
                'data' => $orders
            ], ApiResponseStatus::HTTP_OK);
        } else {
            $this->response([
                'status' => ApiResponseStatus::ERROR,
                'message' => 'No orders found.'
            ], ApiResponseStatus::HTTP_NOT_FOUND);
        }
    }

    public function get_orders_by_user_id()
    {
        $user_id = $this->session->userdata('id');

        // Check if the user is logged in
        if (empty($user_id)) {
            $this->response([
                'status' => ApiResponseStatus::ERROR,
                'message' => 'Unauthorized: Please log in to continue.'
            ], ApiResponseStatus::HTTP_UNAUTHORIZED);
            return;
        }

        // Fetch orders by user_id
        $orders = $this->Service_model->get_orders_by_user_id($user_id);

        if (!empty($orders)) {
            $this->response([
                'status' => ApiResponseStatus::SUCCESS,
                'data' => $orders
            ], ApiResponseStatus::HTTP_OK);
        } else {
            $this->response([
                'status' => ApiResponseStatus::ERROR,
                'message' => 'No orders found for this user.'
            ], ApiResponseStatus::HTTP_NOT_FOUND);
        }
    }

    public function create_service_order()
    {
        $user_id = $this->session->userdata('id');

        // check the user is logged in
        if (empty($user_id)) {
            $this->response([
                'status' => ApiResponseStatus::ERROR,
                'message' => 'Unauthorized: Please log in to continue.'
            ], ApiResponseStatus::HTTP_UNAUTHORIZED);
            return;
        }

        $json = $this->input->raw_input_stream;
        $data = json_decode($json, true);

        $service_location = isset($data['service_location']) ? trim($data['service_location']) : null;
        $ahass_location = isset($data['ahass_location']) ? trim($data['ahass_location']) : null;
        $schedule = isset($data['schedule']) ? trim($data['schedule']) : null;
        $service_type = isset($data['service_type']) ? trim($data['service_type']) : null;
        $complaint = isset($data['complaint']) ? trim($data['complaint']) : null;
        $service_warranty = isset($data['service_warranty']) ? trim($data['service_warranty']) : null;
        $price = isset($data['price']) ? trim($data['price']) : null;

        if (empty($service_location) || empty($schedule) || empty($service_type)) {
            $this->response([
                'status' => ApiResponseStatus::ERROR,
                'message' => 'Service Location, Schedule, and Service Type are required.'
            ], ApiResponseStatus::HTTP_BAD_REQUEST);
            return;
        }

        $order_data = [
            'user_id' => $user_id,
            'service_location' => 'Bengkel',
            'ahass_location' => $ahass_location,
            'schedule' => $schedule,
            'service_type' => $service_type,
            'complaint' => $complaint,
            'service_warranty' => $service_warranty,
            'price' => $price,
            'created_at' => date('Y-m-d H:i:s')
        ];

        if ($this->Service_model->create_order($order_data)) {
            $this->response([
                'status' => ApiResponseStatus::SUCCESS,
                'message' => 'Service order created successfully.',
                'data' => $order_data
            ], ApiResponseStatus::HTTP_OK);
        } else {
            $this->response([
                'status' => ApiResponseStatus::ERROR,
                'message' => 'Failed to create service order.'
            ], ApiResponseStatus::HTTP_BAD_REQUEST);
        }
    }

    public function get_orders_product_by_user_id()
    {
        $user_id = $this->session->userdata('id');

        if (empty($user_id)) {
            $this->response([
                'status' => ApiResponseStatus::ERROR,
                'message' => 'Unauthorized: Please log in to continue.'
            ], ApiResponseStatus::HTTP_UNAUTHORIZED);
            return;
        }

        $orders = $this->Service_model->get_orders_product_by_user_id($user_id);

        if (!empty($orders)) {
            $this->response([
                'status' => ApiResponseStatus::SUCCESS,
                'data' => $orders
            ], ApiResponseStatus::HTTP_OK);
        } else {
            $this->response([
                'status' => ApiResponseStatus::ERROR,
                'message' => 'No orders found for this user.'
            ], ApiResponseStatus::HTTP_NOT_FOUND);
        }
    }
}
