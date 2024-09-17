<?php 
namespace MYAPP\Models;
use MYAPP\Models\dbQueries;

include_once 'dbQueries.php';
class productsModel extends dbQueries{
    private $_table = 'products';
    private $_columns = ['name_product', 'description_product', 'price_product', 'status_product'];
    public function __construct(){

        parent::__construct();
    }

    public function addProduct($values) {

        $colm= $this->_columns;
        $result = $this->insert($this->_table, $colm, $values); 
        return $result;
    }

    public function getProducts($values) {
        $result = $this->select($this->_table, $values); 
        return $result;
    }
    public function getProductById($id)
    {
        $result= $this->selectById($this->_table, $id);
        return $result;
    }

    public function updateProduct($expre, $where="") {

        $result = $this->update($this->_table, $expre, $where);
        return $result;
    }

    public function deleteProducts($where="") {

        $this->delete($this->_table, $where);
    }
    public function deleteProduct($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM products WHERE id = ?");
        $stmt->bind_param('i', $id);
        return $stmt->execute();
    }
}

?>