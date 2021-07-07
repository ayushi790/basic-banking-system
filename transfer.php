<?php
    include('partials/navBar.php');
?>
<?php
    //check whether id is set or not
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        
        //create sql query to get alll other details
        $sql="SELECT * FROM tbl_users WHERE id=$id";
        
        //execute the query
        $res=mysqli_query($conn,$sql);
        
        $count = mysqli_num_rows($res);
        if($count==1){
            //get the data
            $rows=mysqli_fetch_assoc($res);
            $name = $rows['name'];
            $initial_bal = $rows['balance'];
        }
    }else{
        header('location:'.SITEURL.'users.php?id=error');
    }
?>
 
<section class="transfer-money" id="transfer-money">
        <h1 class="transfer-money-heading heading">Make a <span>transfer-money</span></h1>
        <div class="transfer-money-row">
            <form action="" id="transfer-money-form" method="POST" enctype="multipart/form-data">
                <input type="submit" class="box" id="sender" name="sender" value="<?php echo $name?>">
                <select name="receiver" class="box options" id="receiver">
                    <?php

                        //create sql query to get alll other details
                        $sql2="SELECT * FROM tbl_users WHERE id != $id";

                        //execute the query
                        $res2=mysqli_query($conn,$sql2);

                        //count no of rows to check whether there is data in database or not
                        $count2 = mysqli_num_rows($res2);
                        
                        //check if there is data in database
                        if($count2>0){
                            //there is data in database
                            while($rows2=mysqli_fetch_assoc($res2)){
                                $name_opt = $rows2['name'];
                                ?>
                                <option value="<?php echo $name_opt;?>"><?php echo $name_opt;?></option>
                                <?php
                            }
                        }else{
                            //category not  available
                            ?>
                            <option value="0"><h3>No other user available</h3></option>
                            <?php
                        }
                    ?>
                </select>
                <input type="number" class="box" name="amount" placeholder="Amount to transfer" id="amt" required>
                <button type="submit" class="btn transfer" name="submit">Transfer <i class="fas fa-paper-plane"></i></button>
            </form>
        </div>
    </section>

<?php
//check if submit buttton is clicked or not
if(isset($_POST['submit'])){
    
    $sender = $name;
    $receiver = $_POST['receiver'];
    $amount = $_POST['amount'];
    $remaining = $initial_bal - $amount;
    date_default_timezone_set('Asia/Kolkata');
    $date = date('m/d/Y h:i:s a', time());
    
    // check if amount entered is less than the sender's initial balance
    if($amount <= $initial_bal){
        
        //create sql query to update admin
        $sql3="INSERT INTO tbl_transfer SET 
        sender='$sender',
        receiver='$receiver',
        transferred_amount='$amount',
        type='transfer',
        remaining = '$remaining',
        Date='$date'";
    
        //execue the query
        $res3=mysqli_query($conn, $sql3);
        if($res3==TRUE){

            // update sender's balance in users table
            //create the query $
            $sql2 = "UPDATE `tbl_users` SET `balance`= '$remaining' WHERE `name` = '$sender'";                 
            //execute the query
            $res2 = mysqli_query($conn,$sql2);
 
            // update receiver's balance in users table 
            $sql3 = "UPDATE `tbl_users` SET `balance`= `balance`+'$amount' WHERE `name` = '$receiver'";                 
            //execute the query
            $res3 = mysqli_query($conn,$sql3);
            ?>
            <script>
                alert("Transfer completed successfully!!");
            </script>
            <?php
            
            echo("<script>location.href = '".SITEURL."user_details.php?id=$id&pwd=true';</script>");
        }else{
            ?>
            <script>
                alert("Transfer failed. Try again later!!");
            </script>
            <?php

            echo("<script>location.href = '".SITEURL."transfer.php';</script>");
        }

    }else{
            // display error message
            ?>
                <script>
                    alert("Current balance of <?php echo $sender?> = <?php echo $initial_bal?>. Kindly enter amount upto <?php echo $initial_bal?> /-");
                </script>
            <?php
    }
}
?>

<?php
    include('partials/footer.php')
?>
