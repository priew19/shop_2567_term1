<!DOCTYPE html>
<html lang = "en">
    <meta charset = "uft-8">
    <title>Home</title>
    <body>
        <?php
        include "connect.php";
        ?>
        <table width ="100% border = "1">
            <tr colspan="4">
                <td>
                    <center><h2>ร้านอัญชลี shop</h2></center>
                </tb>
            </tr>
            <tr>
                <td><a href="index.php">Home</a></td>
                <td><a href="./manageproduct.php">Manage Products</a></td>
                <td><a href="./addform.php">Create a new product</a></td>
                <td>Link</td>
            </tr>
            <tr height = "300px">
                <td colspan = "4">
                    <?php
                        $search = "";
                        if($_SERVER["REQUEST_METHOD"] == "POST"){
                            $search = $_POST['search'];
                        }

                        $sql ="SELECT * FROM product WHERE ProductName Like '%$search%' OR Category LIKE '%$search%' ";
                        $result = mysqli_query($conn, $sql) or die("ไม่มีข้อมูลค้นหา"); 
                        
                        ?> 
                            <form metod= "post" action = "">
                                <input type = "text" name = "serch" size = "100">
                                <input type = "submit" name= "submit" value = "ค้นหา">
                            </form>
                            <table width ="100" border = "1">
                            <tr>
                                <th>ลำดับ</th>
                                <th>รูป</th>
                                <th>ชื่อสินค้า</th>
                                <th>ประเภทสินค้า</th>
                                <th>รายละเอียดสินค้า</th>
                                <th>ราคา</th>
                                <th>จำนวน</th>
                            </tr>
                                <?php
                                    if($result->num_rows>0){
                                        $count = 1;
                                        while($row = $result-> fetch_assoc()){
                                            echo "<tr>
                                                <td><center>" . $count . "<center></td>
                                                <td><img src = 'images/" .$row["Picture"] . "' width = '100px' height = '80px' ></td>
                                                <td>" . $row["ProductName"] . "</td>
                                                <td>" . $row["Category"] . "</td>
                                                <td>" . $row["ProductDescription"] . "</td>
                                                <td>" . $row["Price"] . "</td>
                                                <td>" . $row["Quantity Stock"] . "</td>
                                               $count++;
                                            </tr>";
                                        }
                                    }
                                ?>
                                
                            </<table>
                </td>
            </tr>
        </table>
    </body>
</html>    
