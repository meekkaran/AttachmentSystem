<div class="tables">
              <div class="last-appointments">
                  <div class="heading">
                      <h2>orders</h2>
                      <button onclick="window.print();" class="btn">Print</button>
                </div>
                <form action="#" method="post">
                <div class="options">
                <select name="filterChoice">
                    <option selected="selected">select month</option>
                    <option value ='01'> JANUARY </option>
                    <option value ='02'> FEBRUARY </option>
                    <option value ='03'> MARCH </option>
                    <option value ='04'> APRIL </option>
                    <option value ='05'> MAY </option>
                    <option value ='06'> JUNE </option>
                    <option value ='07'> JULY </option>
                    <option value ='08'> AUGUST </option>
                    <option value ='09'> SEPTEMBER </option>
                    <option value ='10'> OCTOBER </option>
                    <option value ='11'> NOVEMBER </option>
                    <option value ='12'> DECEMBER </option>
                </select>
                <select name="year" id="year">
                    <option select="selected">select year</option>
                    <?php 
                    for($i = 2018 ; $i <= date('Y'); $i++){
                        echo "<option>$i</option>";
                    //given that variable i which has the year 2000
                    //if i variable is less and equal to the current Year
                    //echo the number with option output
                    //++ is an increment operator and the loop will end at the current year
                        }
                    ?>
            </select>
            <select name="status" id="status">
                <option select="selected">status</option>
                <option value="delivered">delivered</option>
                <option value="not delivered">not deleivered</option>
            </select>

            <select name="shop" id="shop">
                <option select="selected">shop name</option>
                <option value="aliya">aliya</option>
                <option value="eve">eve</option>
                <option value="derm">derm</option>
                <option value="urembo">urembo</option>
            </select>

                 <input type="submit" value="filter" name="choice" class="bton">
                 <input type="submit" value="reset" name="reset" class="bton"> 
                </div>
            </form>
                <table class="appointments">
                    <thead>
                        <td>order date</td>
                        <td>email</td>
                        <td>product name</td>                       
                        <td>total amount</td>
                        <td>payment</td>
                        <td>shop name</td>
                        <td>product id</td>
                        <td>status</td>
                        <td>Actions</td>
                    </thead>

                    <?php
                   if(!isset($_POST['choice'])){
                       $query = "SELECT * FROM tbl_orders";
                       getData($query);
                   }
                   elseif(isset($_POST['choice'])){
                    $month = $_POST['filterChoice'];
                       $year = $_POST['year'];
                       $status = $_POST['status'];
                       $shop = $_POST['shop'];

                       $sql = "SELECT * FROM tbl_orders WHERE YEAR(Order_date)='$year' AND MONTH(Order_date)='$month' AND statuses='$status' AND shop_name = '$shop'";
                       getData($sql);
                   }
                   elseif(isset($_POST['reset'])){
                       $query = "SELECT * FROM tbl_orders";
                       getData($query);
                   
                   }
                ?>

<?php 
    function getData($sql){
           $conn = new mysqli('localhost', 'ndinda', 'dnyamai.dn', 'skincare');
           $data = mysqli_query($conn, $sql) ;
        if(mysqli_num_rows($data) > 0){
           while($row = mysqli_fetch_array($data)){
               $id = $row['order_id'];
               $orderdate = $row['Order_date'];
               $orderdate = strtotime($orderdate);
               $Ordate = date("d/m/y", $orderdate);
               $email = $row['email'];
               $product_name = $row['product_name'];
               $tamount = $row['tamount'];
               $payment = $row['payment'];
               $sname = $row['shop_name'];
               $pid = $row['product_id'];
               $statuses = $row['statuses'];
              
               ?>
    
                <tr>
                        <td><?php echo $Ordate;?></td>
                        <td><?php echo $email;?></td>
                        <td><?php echo $product_name;?></td>
                        <td><?php echo $tamount;?></td>
                        <td><?php echo $payment;?></td>
                        <td><?php echo $sname;?></td>
                        <td><?php echo $pid;?></td>
                        <td><?php echo $statuses;?></td>
                        <td>
                        <?php echo "
                        <a title='edit/update' href='./updateorders.php?id=$id'>
                        <i class='fa fa-edit'></i></a>
                         <a title='delete' href='./deleteorder.php?id=$id'><input type='submit' class='btn' value='delete' /></a> 
                        ";?>
                        </td>
                    </tr>
          <?php     
           }
           }
           else { ?>

              <tr><td>No data found!</td></tr>
              <?php
           }
          
       }  ?>
    <!-- closes the function -->
                   
                    
                    
                </table>
              </div>