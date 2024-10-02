<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once './vendor/midtrans/midtrans-php/Midtrans.php';

class Api extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Product_model');
        $this->load->model('Service_model');
        $this->load->model('Coupon_model');
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

    public function add_cart_item()
    {
        $input = json_decode(file_get_contents('php://input'), true);
        $user_id = $this->session->userdata('id');

        if (!$this->session->userdata('id')) {
            $this->response([
                'status' => ApiResponseStatus::ERROR,
                'message' => 'Unauthorized. Please log in.'
            ], ApiResponseStatus::HTTP_UNAUTHORIZED);
            return;
        }

        if (!$input || !isset($input['product_id']) || !isset($input['quantity'])) {
            $this->response([
                'status' => ApiResponseStatus::ERROR,
                'message' => 'Product ID or quantity is missing'
            ], ApiResponseStatus::HTTP_BAD_REQUEST);
            return;
        }

        $product_id = $input['product_id'];
        $quantity = $input['quantity'];

        $result = $this->Product_model->insert_cart_item($user_id, $product_id, $quantity);

        if ($result) {
            $this->response([
                'status' => ApiResponseStatus::SUCCESS,
                'message' => 'Cart updated successfully.'
            ], ApiResponseStatus::HTTP_OK);
        } else {
            $this->response([
                'status' => ApiResponseStatus::ERROR,
                'message' => 'Failed to update product cart.'
            ], ApiResponseStatus::HTTP_BAD_REQUEST);
        }
    }

    public function get_cart_items()
    {
        $user_id = $this->session->userdata('id');

        if (!$user_id) {
            $this->response([
                'status' => ApiResponseStatus::ERROR,
                'message' => 'Unauthorized. Please log in.'
            ], ApiResponseStatus::HTTP_UNAUTHORIZED);
            return;
        }

        $cart_items = $this->Product_model->get_cart_items($user_id);

        if ($cart_items) {
            $this->response([
                'status' => ApiResponseStatus::SUCCESS,
                'data' => $cart_items
            ], ApiResponseStatus::HTTP_OK);
        } else {
            $this->response([
                'status' => ApiResponseStatus::ERROR,
                'message' => 'Cart is empty.'
            ], ApiResponseStatus::HTTP_OK);
        }
    }

    public function save_order()
    {
        $user_id = $this->session->userdata('id');

        // Check if the user is authenticated
        if (!$user_id) {
            $this->response([
                'status' => ApiResponseStatus::ERROR,
                'message' => 'Unauthorized. Please log in.'
            ], ApiResponseStatus::HTTP_UNAUTHORIZED);
            return;
        }

        $jsonData = json_decode(file_get_contents('php://input'), true);

        if (!isset($jsonData['cartItems']) || empty($jsonData['cartItems']) || !isset($jsonData['grandTotal'])) {
            $this->response([
                'status' => ApiResponseStatus::ERROR,
                'message' => 'Cart or total amount is missing.'
            ], ApiResponseStatus::HTTP_OK);
            return;
        }

        // Generate a new transaction code
        $this->db->select('transaction_code');
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        $lastOrder = $this->db->get('product_orders')->row();

        $newCodeNumber = ($lastOrder) ? (int) substr($lastOrder->transaction_code, 8) + 1 : 1;
        $newTransactionCode = 'TRSC2024' . str_pad($newCodeNumber, 3, '0', STR_PAD_LEFT);

        // Insert order data into the database
        $orderData = [
            'user_id' => $user_id,
            'transaction_code' => $newTransactionCode,
            'total_amount' => $jsonData['grandTotal'],
            'status' => 'pending',
            'created_at' => date('Y-m-d H:i:s')
        ];

        $this->db->insert('product_orders', $orderData);
        $orderId = $this->db->insert_id();

        // Prepare Midtrans payload
        $midtransParams = [
            'transaction_details' => [
                'order_id' => $newTransactionCode,
                'gross_amount' => $jsonData['grandTotal']
            ],
            'customer_details' => [
                'user_id' => $user_id,
                'email' => $this->session->userdata('email'),
            ],
            'item_details' => array_map(function ($item) {
                return [
                    'id' => $item['productId'],
                    'price' => $item['price'],
                    'quantity' => $item['quantity'],
                    'name' => $item['name']
                ];
            }, $jsonData['cartItems']),
        ];

        // Call Midtrans Snap API to get the payment token
        \Midtrans\Config::$serverKey = 'SB-Mid-server-42qia_wNgVhj4srRuYmijIBX';
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        try {
            $snapToken = \Midtrans\Snap::getSnapToken($midtransParams);
            $this->response([
                'status' => 'success',
                'snap_token' => $snapToken
            ], ApiResponseStatus::HTTP_OK);
        } catch (Exception $e) {
            $this->response([
                'status' => ApiResponseStatus::ERROR,
                'message' => $e->getMessage()
            ], ApiResponseStatus::HTTP_OK);
        }
    }

    private function clear_cart($user_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->delete('cart');
    }

    public function remove_cart()
    {
        $input = json_decode(file_get_contents('php://input'), true);
        $user_id = $this->session->userdata('id');

        if (!$this->session->userdata('id')) {
            $this->response([
                'status' => ApiResponseStatus::ERROR,
                'message' => 'Unauthorized. Please log in.'
            ], ApiResponseStatus::HTTP_UNAUTHORIZED);
            return;
        }

        if (!$input || !isset($input['product_id'])) {
            $this->response([
                'status' => ApiResponseStatus::ERROR,
                'message' => 'Product ID is missing'
            ], ApiResponseStatus::HTTP_BAD_REQUEST);
            return;
        }

        $product_id = $input['product_id'];

        $result = $this->Product_model->delete_cart_item($user_id, $product_id);

        if ($result) {
            $this->response([
                'status' => ApiResponseStatus::SUCCESS,
                'message' => 'Item removed from cart successfully.'
            ], ApiResponseStatus::HTTP_OK);
        } else {
            $this->response([
                'status' => ApiResponseStatus::ERROR,
                'message' => 'Failed to remove item from cart.'
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

    public function create_cart_order()
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

        $json = $this->input->raw_input_stream;
        $data = json_decode($json, true);

        // Validate cart data
        if (empty($data['cartItems'])) {
            $this->response([
                'status' => ApiResponseStatus::ERROR,
                'message' => 'Cart items are required.'
            ], ApiResponseStatus::HTTP_BAD_REQUEST);
            return;
        }

        // Calculate total
        $total = 0;
        foreach ($data['cartItems'] as $item) {
            $total += $item['quantity'] * $this->get_product_price($item['product_id']);
        }

        // Check if total is zero
        if ($total <= 0) {
            $this->response([
                'status' => ApiResponseStatus::ERROR,
                'message' => 'Total must be greater than zero.'
            ], ApiResponseStatus::HTTP_BAD_REQUEST);
            return;
        }

        // Create order
        $order_data = [
            'user_id' => $user_id,
            'total' => $total,
            'created_at' => date('Y-m-d H:i:s'),
        ];

        $this->db->insert('orders', $order_data);
        $order_id = $this->db->insert_id();

        // Insert cart items into order_items table
        foreach ($data['cart_items'] as $item) {
            $order_item_data = [
                'order_id' => $order_id,
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
                'price' => $this->get_product_price($item['product_id']),
            ];
            $this->db->insert('order_items', $order_item_data);
        }

        $this->response([
            'status' => ApiResponseStatus::SUCCESS,
            'message' => 'Order created successfully.',
            'data' => [
                'order_id' => $order_id,
                'total' => $total,
            ]
        ], ApiResponseStatus::HTTP_OK);
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

    public function get_coupons()
    {
        $coupons = $this->Coupon_model->get_all_active_coupons();

        if (!empty($coupons)) {
            $this->response([
                'status' => ApiResponseStatus::SUCCESS,
                'data' => $coupons
            ], ApiResponseStatus::HTTP_OK);
        } else {
            $this->response([
                'status' => ApiResponseStatus::ERROR,
                'message' => 'No coupons found.'
            ], ApiResponseStatus::HTTP_NOT_FOUND);
        }
    }

    public function get_coupons_by_user_id($user_id)
    {
        if (empty($user_id)) {
            $this->response([
                'status' => ApiResponseStatus::ERROR,
                'message' => 'User ID is required.'
            ], ApiResponseStatus::HTTP_BAD_REQUEST);
            return;
        }

        $coupons = $this->Coupon_model->get_coupons_by_user_id($user_id);

        if (!empty($coupons)) {
            $this->response([
                'status' => ApiResponseStatus::SUCCESS,
                'data' => $coupons
            ], ApiResponseStatus::HTTP_OK);
        } else {
            $this->response([
                'status' => ApiResponseStatus::ERROR,
                'message' => 'No coupons found for the given user.'
            ], ApiResponseStatus::HTTP_NOT_FOUND);
        }
    }

    public function create_coupon()
    {
        $json = $this->input->raw_input_stream;
        $data = json_decode($json, true);

        $coupon_code = isset($data['coupon_code']) ? trim($data['coupon_code']) : null;
        $description = isset($data['description']) ? trim($data['description']) : null;
        $discount_type = isset($data['discount_type']) ? trim($data['discount_type']) : null;
        $discount_value = isset($data['discount_value']) ? floatval($data['discount_value']) : null;
        $max_discount_value = isset($data['max_discount_value']) ? floatval($data['max_discount_value']) : null;
        $min_purchase_value = isset($data['min_purchase_value']) ? floatval($data['min_purchase_value']) : null;
        $usage_limit = isset($data['usage_limit']) ? intval($data['usage_limit']) : 1;
        $valid_from = isset($data['valid_from']) ? $data['valid_from'] : null;
        $valid_until = isset($data['valid_until']) ? $data['valid_until'] : null;
        $status = isset($data['status']) ? $data['status'] : 'active';

        // Menerima array user_ids (bisa berupa array atau null)
        $user_ids = isset($data['user_ids']) ? $data['user_ids'] : null;

        // Validasi input kupon
        if (empty($coupon_code) || empty($discount_type) || empty($discount_value) || empty($valid_from) || empty($valid_until)) {
            $this->response([
                'status' => ApiResponseStatus::ERROR,
                'message' => 'Coupon Code, Discount Type, Discount Value, Valid From, and Valid Until are required.'
            ], ApiResponseStatus::HTTP_BAD_REQUEST);
            return;
        }

        // Cek apakah kupon sudah ada
        $existing_coupon = $this->Coupon_model->get_coupon_by_code($coupon_code);
        if ($existing_coupon) {
            $this->response([
                'status' => ApiResponseStatus::ERROR,
                'message' => 'Coupon Code already exists. Please use a different code.'
            ], ApiResponseStatus::HTTP_CONFLICT);
            return;
        }

        // Validasi tanggal
        if (strtotime($valid_from) > strtotime($valid_until)) {
            $this->response([
                'status' => ApiResponseStatus::ERROR,
                'message' => 'Valid From date cannot be later than Valid Until date.'
            ], ApiResponseStatus::HTTP_BAD_REQUEST);
            return;
        }

        // Validasi nilai diskon
        if ($discount_value <= 0) {
            $this->response([
                'status' => ApiResponseStatus::ERROR,
                'message' => 'Discount Value must be greater than zero.'
            ], ApiResponseStatus::HTTP_BAD_REQUEST);
            return;
        }

        $coupon_data = [
            'coupon_code' => $coupon_code,
            'description' => $description,
            'discount_type' => $discount_type,
            'discount_value' => $discount_value,
            'max_discount_value' => $max_discount_value,
            'min_purchase_value' => $min_purchase_value,
            'usage_limit' => $usage_limit,
            'valid_from' => $valid_from,
            'valid_until' => $valid_until,
            'status' => $status,
            'created_at' => date('Y-m-d H:i:s')
        ];

        if (empty($user_ids)) {
            $coupon_data['user_id'] = null;
        } else {
            foreach ($user_ids as $user_id) {
                $coupon_data['user_id'] = $user_id;
                $this->Coupon_model->create_coupon($coupon_data);
            }

            $this->response([
                'status' => ApiResponseStatus::SUCCESS,
                'message' => 'Coupon created successfully for selected users.',
                'data' => $coupon_data
            ], ApiResponseStatus::HTTP_OK);
            return;
        }

        if ($this->Coupon_model->create_coupon($coupon_data)) {
            $this->response([
                'status' => ApiResponseStatus::SUCCESS,
                'message' => 'Coupon created successfully for all users.',
                'data' => $coupon_data
            ], ApiResponseStatus::HTTP_OK);
        } else {
            $this->response([
                'status' => ApiResponseStatus::ERROR,
                'message' => 'Failed to create coupon.'
            ], ApiResponseStatus::HTTP_BAD_REQUEST);
        }
    }

    public function update_coupon($id)
    {
        $json = $this->input->raw_input_stream;
        $data = json_decode($json, true);

        $coupon = $this->Coupon_model->get_coupon_by_id($id);

        if (empty($coupon)) {
            $this->response([
                'status' => ApiResponseStatus::ERROR,
                'message' => 'Coupon not found.'
            ], ApiResponseStatus::HTTP_NOT_FOUND);
            return;
        }

        $update_data = [
            'coupon_code' => isset($data['coupon_code']) ? trim($data['coupon_code']) : $coupon->coupon_code,
            'description' => isset($data['description']) ? trim($data['description']) : $coupon->description,
            'discount_type' => isset($data['discount_type']) ? trim($data['discount_type']) : $coupon->discount_type,
            'discount_value' => isset($data['discount_value']) ? floatval($data['discount_value']) : $coupon->discount_value,
            'max_discount' => isset($data['max_discount']) ? floatval($data['max_discount']) : $coupon->max_discount,
            'min_purchase' => isset($data['min_purchase']) ? floatval($data['min_purchase']) : $coupon->min_purchase,
            'usage_limit' => isset($data['usage_limit']) ? intval($data['usage_limit']) : $coupon->usage_limit,
            'valid_from' => isset($data['valid_from']) ? $data['valid_from'] : $coupon->valid_from,
            'valid_until' => isset($data['valid_until']) ? $data['valid_until'] : $coupon->valid_until,
            'status' => isset($data['status']) ? $data['status'] : $coupon->status,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        if ($this->Coupon_model->update_coupon($id, $update_data)) {
            $this->response([
                'status' => ApiResponseStatus::SUCCESS,
                'message' => 'Coupon updated successfully.',
                'data' => $update_data
            ], ApiResponseStatus::HTTP_OK);
        } else {
            $this->response([
                'status' => ApiResponseStatus::ERROR,
                'message' => 'Failed to update coupon.'
            ], ApiResponseStatus::HTTP_BAD_REQUEST);
        }
    }

    public function delete_coupon($id)
    {
        $coupon = $this->Coupon_model->get_coupon_by_id($id);

        if (empty($coupon)) {
            $this->response([
                'status' => ApiResponseStatus::ERROR,
                'message' => 'Coupon not found.'
            ], ApiResponseStatus::HTTP_NOT_FOUND);
            return;
        }

        $delete_data = [
            'deleted_at' => date('Y-m-d H:i:s')
        ];

        if ($this->Coupon_model->soft_delete_coupon($id, $delete_data)) {
            $this->response([
                'status' => ApiResponseStatus::SUCCESS,
                'message' => 'Coupon deleted successfully.'
            ], ApiResponseStatus::HTTP_OK);
        } else {
            $this->response([
                'status' => ApiResponseStatus::ERROR,
                'message' => 'Failed to delete coupon.'
            ], ApiResponseStatus::HTTP_BAD_REQUEST);
        }
    }
}
