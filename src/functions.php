<?php
session_start();
include('config.php');
if(!isset($_SESSION['add'])){
    $_SESSION['add'] = array();
}

?>


<?php
 
    $id= $_POST['id'];
    $name= $_POST['name'];
    $image= $_POST['image'];
    $price= $_POST['price'];
    $rid = $_POST['rid'];
    $qid = $_POST['qid'];
    $action= $_POST['action'];

    

class cart{
 public $id,$name,$image,$price;
 public function addTocart($id,$name,$image,$price){
         $this->id = $id;
         $this->name = $name;
         $this->image = $image;
         $this->price = $price;

foreach ($_SESSION['add'] as $k => $v ){

     if($this->id == $v['id']){
      $_SESSION['add'][$k]['quantity'] += 1;
      return json_encode($_SESSION['add']);
}
}
         
      $data = array("id"=>$this->id, "name"=> $this->name , "image"=>$this->image ,"price" =>$this->price, "quantity" => 1  );
      array_push($_SESSION['add'],$data);
        
      return  json_encode($_SESSION['add']);
    
}
public function remove ($rid){
    $this->id = $rid;
    for($i = 0 ; $i <count($_SESSION['add']); $i++)
    {
        if($i == $this->id){
        array_splice($_SESSION['add'],$i,1);
        }
    }
     
    
}



}






switch($action){
    case 'add':
    {
        $obj = new cart();
     echo   $obj-> addTocart($id,$name,$image,$price);
      
    }
    break;
    case 'remove':
        {
            $obj = new cart();
             $obj-> remove($rid);
            echo  json_encode($_SESSION['add']);
          
        }
        break;

       
    
}







  
?>




