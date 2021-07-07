<?php
    include('partials/navBar.php');
?>
<?php
    //check whether id is set or not
    if(isset($_GET['id']) and $_GET['pwd']){
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
            $email = $rows['email'];
            $balance = $rows['balance'];
            $password = $rows['password'];
        }
    }else{
        echo("<script>location.href = '".SITEURL."index.php';</script>");
    }
?>

<section class="home" id="user-details">
        <h1 class="home-heading heading"><span><?php echo $name;?></span></h1>
        <div class="box-container">
            <div class="box">
                <table class="tbl">
                    <tr>
                        <td><h1><i class="fas fa-id-card"></i>  Customer id:</h1></td>
                        <td><h1><span><?php echo $id;?></span></h1></td>
                    </tr>
                    <tr>
                        <td><h1><i class="fas fa-user"></i>  Name:</h1></td>
                        <td><h1><span><?php echo $name;?></span></h1></td>
                    </tr>
                    <tr>
                        <td><h1><i class="fas fa-envelope-open"></i>  Email:</h1></td>
                        <td><h1><span><?php echo $email;?></span></h1></td>
                    </tr>
                    <tr>
                        <td><h1><i class="fas fa-wallet"></i>  Balance:</h1></td>
                        <td><h1><span><?php echo $balance;?></span></h1></td>
                    </tr>
                </table> 
            </div>
            <div class="btn-container btn-data">
                <a href="<?php echo SITEURL;?>credit.php?id=<?php echo $id;?>"><button class="btn">Credit <i class="fas fa-plus-square"></i></button></a>
                <a href="<?php echo SITEURL;?>debit.php?id=<?php echo $id;?>"><button class="btn">Debit <i class="fas fa-minus-square"></i></button></a>
                <a href="<?php echo SITEURL;?>transfer.php?id=<?php echo $id;?>"><button class="btn">Transfer <i class="fas fa-paper-plane"></i></button></a>
                <a href="<?php echo SITEURL;?>history.php?id=<?php echo $id;?>"><button class="btn">History <i class="fas fa-history"></i></button></a>
            </div>
            <div class="btn-container display-icon">
                <a href="<?php echo SITEURL;?>credit.php?id=<?php echo $id;?>"><button class="btn"><i class="fas fa-plus-square"></i></button></a>
                <a href="<?php echo SITEURL;?>debit.php?id=<?php echo $id;?>"><button class="btn"><i class="fas fa-minus-square"></i></button></a>
                <a href="<?php echo SITEURL;?>transfer.php?id=<?php echo $id;?>"><button class="btn"><i class="fas fa-paper-plane"></i></button></a>
                <a href="<?php echo SITEURL;?>history.php?id=<?php echo $id;?>"><button class="btn"><i class="fas fa-history"></i></button></a>
            </div>
        </div>
    
</section>

<?php
    include('partials/footer.php')
?>

<!-- TODO: credit and debit section -->