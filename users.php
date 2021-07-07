<?php
    include('partials/navBar.php');
?>

<section class="home" id="users">
        <h1 class="home-heading heading"> Our <span> Customers </span></h1>
        <p class = "session_msg">
            <?php
            if (isset($_SESSION['add_user'])){   //add session message
                echo $_SESSION['add_user'];      //display session message
                unset($_SESSION['add_user']);    //removing the session
            }?>
        </p>
        <div class="tbl_customers">
        <?php
            if(isset($_GET['id'])){
                $id=$_GET['id'];
                if($id == "error"){
                    ?>
                        <p class="error-msg"><span> Please select the Customer first!</span></p>
                    <?php
                }
            }
        ?>
            <table class = "tbl_users">
                <tr class = "heading_col">
                    <th><p>S.no</p></th>
                    <th><p>Name</p></th>
                    <th><p>Email</p></th>
                    <th><p>Operation</p></th>
                </tr>
                <?php
                    //create a query 
                    $sql="SELECT * FROM tbl_users";

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
                                $id = $rows['id'];
                                $name=$rows['name'];
                                $email = $rows['email'];
                                $balance = $rows['balance'];
                                
                                ?><tr>
                                    <td><?php echo $sn++ ?></td>
                                    <td><?php echo $name?></td>
                                    <td><?php echo $email?></td>
                                    <td><a href="<?php echo SITEURL;?>check_password.php?id=<?php echo $id;?>" class="btn details">Details</a></td>
                                </tr>
                            <?php
                            }
                        }else{
                            ?>
                            <div><span>No user added</span></div>
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