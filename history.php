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


<section class="home" id="history">
        <h1 class="home-heading heading"> Transaction <span>History </span></h1>
        <div class="tbl_customers">
        <p>
            <span>
            <?php
                if (isset($_SESSION['transaction'])){      //add session message
                    echo $_SESSION['transaction'];      //display session message
                    unset($_SESSION['transaction']);    //removing the session
                        
                }?>
            </span>
        </p>

        <table class = "tbl_users">
            <tr class = "heading_col">
                <th><p>S.no</p></th>
                <th><p>To: </p></th>
                <th><p>Amount</p></th>
                <th><p>Transaction type</p></th>
                <th><p>Remaining amount</p></th>
                <th><p>Date and Time</p></th>
            </tr>
            <?php
                //create a query 
                $sql="SELECT * FROM tbl_transfer where sender='$name'";

                //execute the query
                $res=mysqli_query($conn,$sql);
        
                //check whether the query is executed or not
                if($res==TRUE){
                    //query is executed
                    //count no of rows to check whether there is data in database or not
                    $count = mysqli_num_rows($res);

                    //check if there is data in database
                    if($count>0){
                        //there is data in database

                        //for unique id
                        $sn = 1;
                        while($rows=mysqli_fetch_assoc($res)){

                            //using while loop to get all data from database
                            $sender = $rows['sender'];
                            $receiver = $rows['receiver'];
                            $amount = $rows['transferred_amount'];
                            $remaining = $rows['remaining'];
                            $type = $rows['type'];
                            $date = $rows['Date'];
                            ?>
                            <tr>
                                <td><?php echo $sn++; ?></td>
                                <td><?php echo $receiver;?></td>
                                <td><?php echo $amount;?> /-</td>
                                <td id="<?php echo $type;?>"><?php echo $type;?></td>
                                <td><?php echo $remaining?> /-</td>
                                <td><?php echo $date;?></td>
                            </tr>
                        <?php
                        }
                    }else{
                        ?>
                        <div><span>No transaction yet</span></div>
                        <?php
                    }
                }
            ?>
        </table>
        </div>
    
</section>

<?php
    include('partials/footer.php')
?>