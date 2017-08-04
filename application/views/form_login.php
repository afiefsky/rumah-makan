<footer>
    <div class="row text-center">
        <div class="col-lg-15 col-lg-offset-1">
<?php
 echo form_open('auth/login');
?>
<div class="container">
  <div class="top">
    <h2 id="title" class="hidden"><span id="logo"></span></h2>
  </div>

  <div class="login-box animated fadeInUp">
    <div class="box-header">
      <h2>Log In</h2>
    </div>
    <label for="username">Username</label>
    <br/>
    <input type="text" name="username">
    <br/>
    <label for="password">Password</label>
    <br/>
    <input type="password" name="password">                     
    <br/>
    <button type="submit" name="submit">Sign In</button>
    <br/>     
  </div>
  
</div>
<?php echo form_close(); ?>