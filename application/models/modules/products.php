<?php
    namespace models\modules;
    use core\engine\Model;

    class Products extends Model
    {
        public function getProductMetaInfo($product_id)
        {
            $sql = "SELECT "
                . DB_PREFIX . "product.name AS product_name, "
                . DB_PREFIX . "product_description.short_desc AS product_short_desc 
                FROM " . DB_PREFIX . "product 
                LEFT JOIN " . DB_PREFIX . "product_description 
                ON " . DB_PREFIX . "product.id = " . DB_PREFIX . "product_description.product_id 
                WHERE " . DB_PREFIX . "product.id = " . (int)$product_id;

            return $this->db->getAllRows($sql);
        }

        public function getList($limit = false)
        {
            $sql = "SELECT "
                . DB_PREFIX . "product.id AS product_id, "
                . DB_PREFIX . "product.name AS product_name, "
                . DB_PREFIX . "product.image AS product_image, "
                . DB_PREFIX . "product_description.short_desc AS product_short_desc, "
                . DB_PREFIX . "product_type.name AS product_type 
                FROM " . DB_PREFIX . "product 
                LEFT JOIN " . DB_PREFIX . "product_description 
                ON " . DB_PREFIX . "product.id = " . DB_PREFIX . "product_description.product_id 
                LEFT JOIN " . DB_PREFIX . "type_to_product 
                ON " . DB_PREFIX . "type_to_product.product_id = " . DB_PREFIX . "product.id 
                LEFT JOIN " . DB_PREFIX . "product_type 
                ON " . DB_PREFIX . "type_to_product.type_id = " . DB_PREFIX . "product_type.id 
                ";

            if(isset($limit['from']) && isset($limit['notes'])){
                $sql .= "LIMIT " . $limit['from'] . ", " . $limit['notes'];
            }
            else if((int)$limit){
                $sql .= "LIMIT " . $limit;
            }

            return $this->db->getAllRows($sql);
        }

        public function getTotalProducts()
        {
            $sql = "SELECT COUNT(*) AS count FROM " . DB_PREFIX . "product";
            return $this->db->getRow($sql);
        }

        public function getProductMainInfo($product_id)
        {
            $sql = "SELECT "
            . DB_PREFIX . "product.id AS product_id, "
            . DB_PREFIX . "product.name AS product_name, "
            . DB_PREFIX . "product.image AS product_image, "
            . DB_PREFIX . "product_description.full_desc AS product_desc, "
            . DB_PREFIX . "product_type.name AS product_type 
            FROM " . DB_PREFIX . "product 
            LEFT JOIN " . DB_PREFIX . "product_description 
            ON " . DB_PREFIX . "product_description.product_id = " . DB_PREFIX . "product.id 
            LEFT JOIN " . DB_PREFIX . "type_to_product 
            ON " . DB_PREFIX . "type_to_product.product_id = " . DB_PREFIX . "product.id 
            LEFT JOIN " . DB_PREFIX . "product_type 
            ON " . DB_PREFIX . "product_type.id = " . DB_PREFIX . "type_to_product.type_id 
            WHERE " . DB_PREFIX . "product.id = " . (int)$product_id;

            return $this->db->getAllRows($sql);
        }

        public function getProductOptions($product_id)
        {
            $sql = "SELECT "
                . DB_PREFIX . "product_option.id AS option_id, "
                . DB_PREFIX . "product_option.name AS option_name 
                FROM " . DB_PREFIX . "product_option 
                 LEFT JOIN " . DB_PREFIX . "product_option_value 
                 ON " . DB_PREFIX . "product_option_value.option_id = " . DB_PREFIX . "product_option.id 
                 WHERE " . DB_PREFIX . "product_option_value.product_id = " . (int)$product_id;

            return $this->db->getAllRows($sql);
        }

        public function getProductOptionValues($product_id, $option_id)
        {
            $sql = "SELECT value AS option_value FROM " . DB_PREFIX . "product_option_value WHERE product_id = " . (int)$product_id . " AND option_id = " . (int)$option_id;
            return $this->db->getRow($sql);
        }

        public function getProductPackages($product_id)
        {
            $sql = "SELECT DISTINCT "
                . DB_PREFIX . "package.id AS package_id, "
                . DB_PREFIX . "package.name AS package_name 
                FROM " . DB_PREFIX . "package 
                LEFT JOIN " . DB_PREFIX . "package_to_product 
                ON " . DB_PREFIX . "package.id = " . DB_PREFIX . "package_to_product.package_id 
                WHERE " . DB_PREFIX . "package_to_product.product_id = " . (int)$product_id;

            return $this->db->getAllRows($sql);
        }

        public function getProductPackageValues($product_id, $package_id)
        {
            $sql = "SELECT "
                . DB_PREFIX . "package_value.name AS package_value 
                FROM " . DB_PREFIX . "package_value 
                LEFT JOIN " . DB_PREFIX . "package_to_product 
                ON " . DB_PREFIX . "package_value.id = " . DB_PREFIX . "package_to_product.package_value_id
                WHERE " . DB_PREFIX . "package_to_product.product_id = " . (int)$product_id . " 
                AND " . DB_PREFIX . "package_to_product.package_id = " . (int)$package_id;

            return $this->db->getAllRows($sql);
        }

        public function hasProduct($product_id)
        {
            $sql = "SELECT COUNT(*) AS count FROM " . DB_PREFIX . "product WHERE id = '" . (int)$product_id . "'";
            return $this->db->getRow($sql);
        }
    }