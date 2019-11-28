<?php
    namespace controllers\modules;
    use core\engine\Controller;
    use core\lib\Pagination;

    class Products extends Controller
    {
        public function getList($limit = false, $pagination = false)
        {
            $data = array();
            $products_model = $this->load->model('modules/products');
            $products = $products_model->getList($limit);

            if($pagination){
                $totalProducts = $products_model->getTotalProducts()['count'];
                $pagination = new Pagination($limit, $totalProducts, $this->request->getUriWithoutParams());
                $data['total_pages'] = $pagination->totalPages;
                $products = $products_model->getList(['from' => $pagination->from, 'notes' => $limit]);
            }

            $data['products'] = array();

            if($products){
                foreach($products as $key => $product){
                    $data['products'][$key]['id'] = $product['product_id'];
                    $data['products'][$key]['name'] = $product['product_name'];
                    $data['products'][$key]['image'] = $product['product_image'];
                    $data['products'][$key]['short_desc'] = $product['product_short_desc'];
                    $data['products'][$key]['type'] = $product['product_type'];
                }
            }

            return $this->load->view('modules/products/product-list', $data);
        }

        public function ShowOneProduct()
        {
            $data = array();
            $products_model = $this->load->model('modules/products');
            $product_id = $this->getProductId();

            if((int)$product_id >0 && $products_model->hasProduct($product_id)){
                $product_info = $products_model->getProductMainInfo($product_id);
                $product_options = $products_model->getProductOptions($product_id);
                $product_packages = $products_model->getProductPackages($product_id);
                $data['product_main_info'] = array();
                $data['product_options'] = array();
                $data['product_packages'] = array();

                if($product_info){
                    foreach($product_info as $key => $product) {
                        $data['product_main_info'][$key]['id'] = $product['product_id'];
                        $data['product_main_info'][$key]['name'] = $product['product_name'];
                        $data['product_main_info'][$key]['image'] = $product['product_image'];
                        $data['product_main_info'][$key]['desc'] = $product['product_desc'];
                        $data['product_main_info'][$key]['type'] = $product['product_type'];
                    }
                }

                if($product_options){
                    foreach($product_options as $key => $option) {
                        $data['product_options'][$key]['id'] = $option['option_id'];
                        $data['product_options'][$key]['name'] = $option['option_name'];
                        $data['product_options'][$key]['value'] = $products_model->getProductOptionValues($product_id, $option['option_id'])['option_value'];
                    }
                }

                if($product_packages){
                    foreach($product_packages as $key => $package){
                        $data['product_packages'][$key]['id'] = $package['package_id'];
                        $data['product_packages'][$key]['name'] = $package['package_name'];
                        $data['product_packages'][$key]['values'] = $products_model->getProductPackageValues($product_id, $package['package_id']);
                    }
                }
            }
            else{
                $data['message'] = 'Такого продукта нет в наличии!';
            }

            return $this->load->view('modules/products/product', $data);
        }

        public function getProductMetaInfo()
        {
            $product_id = $this->getProductId();
            if($product_id){
                $products_model = $this->load->model('modules/products');
                return $products_model->getProductMetaInfo($product_id);
            }
        }

        private function getProductId()
        {
            $arr = explode('/', $this->request->getUriWithoutParams());
            $needle = array_search('flour', $arr);

            if($needle){
                return $arr[$needle + 1];
            }
            return false;
        }
    }