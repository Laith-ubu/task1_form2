<?php 

namespace MYAPP\Controllers;
use MYAPP\Models\productsModel;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


include_once 'controller.php';
include_once 'models/productsModel.php';

class ProductController extends \controller{
    
    protected $conn;
        
    public function home() {
        $this->render('index');
    }
    public function profile() {
        $this->render('profile');
    }
    public function index() {
        $products = $this->getAll(); 
        $this->render('products', ['products' => $products]);
    }
    public function addProduct(){
        $this->render('addNew');
    }
    public function contact(){
        $this->render('contactUs');
    }
    public function form(){
        $this->render('addNew');
    }
    public function render($view, $data = []) {
        extract($data); 
        include __DIR__ . "/../views/$view.php"; 
    }
    public function add(){
        
        try{

            $test=[];
            if($_SERVER["REQUEST_METHOD"]=="POST"){
                    
                foreach ($_POST as $key => $value) {

                       echo "<br>$key = $value<br>";
                    $test[]="$value";
                }

                if(count($test)==3){$test[]='Not Available';}
                
                $objModel= new productsModel();
             
                $result=$objModel->addProduct($test);
                if(!$result){throw new \Exception("Error adding product: " . $this->conn->conn->error);}
               
                header("Location: /products/");
                exit();
            }else{
                    echo"Form NOT Submitted";
                }
            }catch(\Exception $e)
            {
                echo $e->getMessage();
            }
    }
    public function getAll(){
        try{
            $objModel= new productsModel();
            $result=$objModel->getProducts('*');

            $products = [];
            while ($row = $result->fetch_assoc()) {
            $products[] = $row; 
        }
            return $products;
            

        }catch(\Exception $e){
        
            return $e->getMessage();
        }
    }
    public function edit($id = null)
    {
        if ($id === null) {
            $id = $_GET['id'] ?? null;
        }

        $objModel = new productsModel();
        $result = $objModel->getProductById($id);

        $products = [];
        while ($row = $result->fetch_assoc()) {
        $products[] = $row; 
    }
        if ($result) {
            $this->render('editData', ['product' => $products]);
        } else {
            echo "Product not found.";
        }
    }
    public function update($id = null)
    {
        if ($id === null) {
            $id = $_GET['id'] ?? null;
        }

        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $id = $_GET['id'] ?? null;
            $name = $_GET['name'] ?? '';
            $description = $_GET['Desc'] ?? '';
            $price = $_GET['price'] ?? '';
            $status = isset($_GET['check']) ? 'Available' : 'Not Available';
    
            if ($id) {
                $objModel = new productsModel();
                $result = $objModel->updateProduct(
                    "name_product = '$name',
                     description_product = '$description',
                      price_product = '$price' ,
                      status_product = '$status' " , "id = '$id'");
    
                if ($result) {
                    header("Location: /products/");
                    exit();
                } else {
                    throw new \Exception("Error updating product.");
                }
            } else {
                echo "Product ID is missing.";
            }
        } else {
            throw new \Exception("Invalid request method.");
        }
    }
    

    public function delete($id = null)
    {
        try {
            if ($id === null) {
                $id = $_GET['id'] ?? null;
            }
            if ($_SERVER["REQUEST_METHOD"] == "GET") {
                $id = $_GET['id'];
        
                $objModel = new productsModel();
                $result = $objModel->deleteProduct($id);
        
                if ($result) {
                    header("Location: /products/");
                    exit();
                } else {
                    throw new \Exception("Error deleting product.");
                }
            } else {
                throw new \Exception("Invalid request method.");
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
        
}
?>