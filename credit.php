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
        <h1 class="transfer-money-heading heading"><span>Deposit </span>Money</h1>
        <div class="transfer-money-row">
            <form action="" id="transfer-money-form" method="POST" enctype="multipart/form-data">
                <input type="submit" class="box" id="sender" name="sender" value="<?php echo $name?>">
                <input type="number" class="box" name="amount" placeholder="Amount to be depositted" id="amt" required>
                <button type="submit" class="btn transfer" name="submit">Deposit <i class="fas fa-paper-plane"></i></button>
            </form>
        </div>
    </section>

<?php
//check if submit buttton is clicked or not
if(isset($_POST['submit'])){
    
    $amount = $_POST['amount'];
    $remaining = $initial_bal + $amount;
    date_default_timezone_set('Asia/Kolkata');
    $date = date('m/d/Y h:i:s a', time());
        
    //create sql query to update admin
    $sql3="INSERT INTO tbl_transfer SET 
    sender='$name',
    receiver='$name',
    type='credit',
    transferred_amount='$amount',
    remaining = '$remaining',
    Date='$date'";

    //execue the query
    $res3=mysqli_query($conn, $sql3);
    if($res3==TRUE){

        //create the query 
        $sql2 = "UPDATE `tbl_users` SET `balance`= '$remaining' WHERE `name` = '$name'";                 
        //execute the query
        $res2 = mysqli_query($conn,$sql2);
        ?>
        <script>
            alert("Money credited successfully!!");
        </script>
        <?php
        echo("<script>location.href = '".SITEURL."user_details.php?id=$id&pwd=true';</script>");
    }else{
        ?>
        <script>
            alert("Credit failed. Try again later!!");
        </script>
        <?php
        echo("<script>location.href = '".SITEURL."transfer.php';</script>");
    }
}
 
?>

<?php
    include('partials/footer.php')
?>
