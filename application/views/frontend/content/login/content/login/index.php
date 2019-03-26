<div class="d-flex align-items-center justify-content-center bg-gray-200 ht-100v">

<div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white rounded shadow-base">
  <div class="signin-logo tx-center tx-28 tx-bold tx-inverse"><span class="tx-normal">[</span> KOPI <span class="tx-info">UBER</span> <span class="tx-normal">]</span></div>
  <div class="tx-center mg-b-60">Alamat Kantor</div>

<form action="" method="POST"> 
    <?php
        if (isset($_SESSION['message'])) {
            echo "<div style='margin-top:20px' class='alert alert-".$_SESSION['message'][0]."'>
                 ".$_SESSION['message'][1]."
                 </div>";
        }
    ?> 
  <div class="form-group">
    <input type="email" class="form-control" name="username" placeholder="Email/NIM">
  </div><!-- form-group -->
  <div class="form-group">
    <input type="password" class="form-control" name="password" placeholder="Password">
    <!-- <a href="" class="tx-info tx-12 d-block mg-t-10">Forgot password?</a> -->
  </div><!-- form-group -->
  <button type="submit" class="btn btn-info btn-block">Sign In</button>

  <!-- <div class="mg-t-60 tx-center">Not yet a member? <a href="" class="tx-info">Sign Up</a></div> -->
</form>

</div><!-- login-wrapper -->
</div><!-- d-flex -->
