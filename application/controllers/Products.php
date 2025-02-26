<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

	
	public function __construct() {
        parent::__construct();
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

		//loads the model
        $this->load->model('first_model'); 

		// Load session library
		$this->load->library('session');

		// Load other necessary libraries or helpers
		$this->load->helper('url');

		// Load database library
		$this->load->database();
    }
	
	// LOADS THE VIEW
	public function index()
	{
		$this->load->view('products');
	}


	//displays the products
    public function displayProducts() {
		try {
			$data['products'] = $this->first_model->getProducts();
			if (empty($data['products'])) {
				$data['error'] = 'No products found.';
			}
			
			// Add this line to set the image URL
			$data['image_url'] = base_url('application/assets/images/'); // Adjust path as per your directory structure
			
			$this->load->view('products', $data);
		} catch (Exception $e) {
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
	}


	//display products app
	public function displayProductsApp() {
		log_message('debug', 'displayProductsApp method called');
		try {
			$products = $this->first_model->getProducts();
			
			if (empty($products)) {
				$response = array(
					'status' => 'error',
					'message' => 'No products found.',
					'data' => array()
				);
			} else {
				// Add image URL to each product
				$image_base_url = base_url('application/assets/images/');
				foreach ($products as &$product) {
					if (isset($product['product_image'])) {
						$product['image_url'] = $image_base_url . $product['product_image'];
					}
				}
	
				$response = array(
					'status' => 'success',
					'message' => 'Products retrieved successfully.',
					'data' => $products
				);
			}
		} catch (Exception $e) {
			$response = array(
				'status' => 'error',
				'message' => 'An error occurred: ' . $e->getMessage(),
				'data' => array()
			);
		}
	
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($response));
	}


	//add to cart
	public function addToCart()
{
    if ($this->input->is_ajax_request()) {
        $product_id = $this->input->post('product_id');
        $product_name = $this->input->post('product_name');
        $product_price = $this->input->post('product_price');
        $product_image = $this->input->post('product_image');

        // Validate the price
        if ($product_price === null || $product_price === '') {
            echo json_encode(['status' => 'error', 'message' => 'Invalid price']);
            return;
        }

        $cart_data = array(
            'id' => $product_id,
            'name' => $product_name,
            'price' => floatval($product_price),  // Convert to float
            'product_image' => $product_image,
            'quantity' => 1
        );

        $result = $this->first_model->add_to_cart($cart_data);

        echo json_encode($result);
    } else {
        show_404();
    }
}
	

}