<?php
    include('partials/navBar.php');
?>
    <section class="home" id="home">
        <h1 class="home-heading heading"><span>Bank </span>Of <span>India</span></h1>
        <div class="box-container">
            <div class="box">
                <img src="img/new_entry.png" alt="">
                <div class="home-data">
                    <a href="<?php echo SITEURL;?>new_user.php" class="home-link"><i class="fas fa-link"></i></a>
                    <h3 class="home-title">Create a new user</h3>
                </div>
            </div>
            <div class="box">
                <img src="img/user.png" alt="">
                <div class="home-data">
                    <a href="<?php echo SITEURL;?>users.php" class="home-link"><i class="fas fa-link"></i></a>
                    <h3 class="home-title">View all users</h3>
                </div>
            </div>
            <div class="box">
                <img src="img/contact.png" alt="">
                <div class="home-data">
                    <a href="<?php echo SITEURL;?>contact.php" class="home-link"><i class="fas fa-link"></i></a>
                    <h3 class="home-title">Contact Us</h3>
                </div>
            </div>
            <div class="box">
                <img src="img/withdraw.png" alt="">
                <div class="home-data">
                    <a href="<?php echo SITEURL;?>debit.php" class="home-link"><i class="fas fa-link"></i></a>
                    <h3 class="home-title">Withdraw Money</h3>
                </div>
            </div>
            <div class="box">
                <img src="img/transaction.png" alt="">
                <div class="home-data">
                    <a href="<?php echo SITEURL;?>transfer.php" class="home-link"><i class="fas fa-link"></i></a>
                    <h3 class="home-title">Transfer Money</h3>
                </div>
            </div>
            <div class="box">
                <img src="img/deposit.png" alt="">
                <div class="home-data">
                    <a href="<?php echo SITEURL;?>credit.php" class="home-link"><i class="fas fa-link"></i></a>
                    <h3 class="home-title">Deposit Money</h3>
                </div>
            </div>
        </div>
    </section>

<?php
    include('partials/footer.php')
?>