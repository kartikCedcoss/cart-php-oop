<?php
session_start();
include("header.php");
include("config.php");
//	 session_destroy();
?>


<!DOCTYPE html>
<html>

<head>
	<title>
		Products
	</title>
	<link href="style.css" type="text/css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>

	<div id="main">
		<div id="products">
			<?php


			foreach ($product as $item) {
				$des = "
				<div id=" . $item['id'] . " class = 'product'>
				<img src='images/" . $item['image'] . "'>
				<h3 class ='title'><a href='#'>Product" . $item['id'] . "</a></h3>
				<span>Price: $" . $item['price']."</span>
				<button class='add-to-cart' type='submit' name='Add To Cart' id='". $item['id']."'>Add To Cart</button><br>
				</div>";
				echo $des;
			}


			?>

		</div>
		<div id='disp' >
			
		</div>
	</div>
	
	<script>


var products = [
    { id: 101, name: "FootBall", image: "football.png", price: 120 },
    { id: 102, name: "Tennis", image: "tennis.png", price: 120 },
    { id: 103, name: "BasketBall", image: "basketball.png", price: 90 },
    { id: 104, name: "Table Tennis", image: "table-tennis.png", price: 110 },
    { id: 105, name: "Soccer", image: "soccer.png", price: 80 },
  ];

var jArr=[];

  
$(document).ready(function(){


	
$('#101').on('click',function(){
    var id=products[0]['id'];
    var n=products[0]['name'];
    var img=products[0]['image'];
    var price=products[0]['price'];
	
   $.ajax({
       url : 'functions.php',
       type : 'POST',
       datatype : 'JSON',
       data : {
           id:id,
           name: n,
           image : img,
           price : price,
           "action" : "add"
        }
   }).done(function(data){
    jArr = JSON.parse(data);
  
   displaycart(jArr);
}) 

});
$('#102').on('click',function(){
    var id=products[1]['id'];
    var n=products[1]['name'];
    var img=products[1]['image'];
    var price=products[1]['price'];
	
   $.ajax({
       url : 'functions.php',
       type : 'POST',
       datatype : 'JSON',
       data : {
           id:id,
           name: n,
           image : img,
           price : price,
           "action" : "add"
        }
   }).done(function(data){
    jArr = JSON.parse(data);
   
   displaycart(jArr);
}) 

});

$('#103').on('click',function(){
    var id=products[2]['id'];
    var n=products[2]['name'];
    var img=products[2]['image'];
    var price=products[2]['price'];
	
   $.ajax({
       url : 'functions.php',
       type : 'POST',
       datatype : 'JSON',
       data : {
           id:id,
           name: n,
           image : img,
           price : price,
           "action" : "add"
        }
   }).done(function(data){
    jArr = JSON.parse(data);
   
   displaycart(jArr);
}) 

});
$('#104').on('click',function(){
    var id=products[3]['id'];
    var n=products[3]['name'];
    var img=products[3]['image'];
    var price=products[3]['price'];
	
   $.ajax({
       url : 'functions.php',
       type : 'POST',
       datatype : 'JSON',
       data : {
           id:id,
           name: n,
           image : img,
           price : price,
           "action" : "add"
        }
   }).done(function(data){
    jArr = JSON.parse(data);
   
   displaycart(jArr);
}) 

});
$('#105').on('click',function(){
    var id=products[4]['id'];
    var n=products[4]['name'];
    var img=products[4]['image'];
    var price=products[4]['price'];
	
   $.ajax({
       url : 'functions.php',
       type : 'POST',
       datatype : 'JSON',
       data : {
           id:id,
           name: n,
           image : img,
           price : price,
           "action" : "add"
        }
   }).done(function(data){
    jArr = JSON.parse(data);
   
   displaycart(jArr);
})
 
});


})


function displaycart(pArr){

var html = "<table><tr><th>ID</th><th>Product</th><th>Price</th><th>Quantity</th></tr>";
for (let i = 0; i<pArr.length; i++){

    
  html += "<tr><td>"+pArr[i].id+"</td><td><img src='"+pArr[i].image+"'></td><td>$"+ pArr[i].price+"</td><td><input type='number' id='"+pArr[i].id+"' onclick = 'quantity("+i+")'   value='"+pArr[i].quantity+"'></td><td></td><td><button id='"+pArr[i].id+"' onclick='remove("+i+")' >Remove</button></td></tr><tr><td></td><td><button   id='"+pArr[i].id+"' onclick='addtobuy("+parseInt(pArr[i].id)+")' >Buy Now</button></td><td><button id='"+pArr[i].id+"' onclick='addtoWish("+parseInt(pArr[i].id)+")' >Add To WishList</button></td></tr>";
  }
  html += "</table>";
document.getElementById('disp').innerHTML= html;

}

function remove(id){
    $.ajax({
        url :"functions.php",
        type : "POST",
        datatype : "JSON",
        data:{
            rid:id ,
            "action" : "remove"
        }

    }).done(function(data){
        jArr = JSON.parse(data);
  
  displaycart(jArr);
    })
}






	</script>

	<?php include 'footer.php' ?>