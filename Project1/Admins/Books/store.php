<?php
$id = $_POST['id'];
$name = $_POST['name'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];
$description = $_POST['description'];
$category_id = $_POST['category_id'];
$publisher_id = $_POST['publisher_id'];
$image = $_FILES['image']['name'];
$author_id = $_POST['author_id'];
include_once '../../Connects/open.php';
$sql = "INSERT INTO books(name,quantity,price,description,category_id,publisher_id,image,author_id) VALUES ('$name','$quantity','$price','$description','$category_id','$publisher_id','$image','$author_id')";
mysqli_query($connect, $sql);
mysqli_close($connect);
//Lưu ảnh từ vị trí hiện tại của ảnh vào thư mục image
//Kiểm tra ảnh đã tồn tại hay chưa
if(!file_exists("../../image/" . $image)){
    //Lấy được đường dẫn hiện tại của ảnh
    $path = $_FILES['image']['tmp_name'];
    //Lưu ảnh từ đường dẫn hiện tại vào folder
    move_uploaded_file($path, "../../image/" . $image);
}
header('Location:index.php');
?>