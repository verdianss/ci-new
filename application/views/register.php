<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">

<link rel="stylesheet" href="<?=base_url()?>assets/js/jquery.min.js">
<link rel="stylesheet" href="<?=base_url()?>assets/js/bootstrap.js">

<form class="form col-md-4" method="post" action="">
  <h3>Register</h3>
  <?php
  if(!empty($success_msg)){
      echo '<h5>'.$success_msg.'</h5>';
  }elseif(!empty($error_msg)){
      echo '<h5>'.$error_msg.'</h5>';
  }
  ?>
  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" name="username" value="<?=@$username?>">
    <?php echo form_error('username','<span class="help-block">','</span>'); ?>
  </div>
  <div class="form-group">
    <label for="first_name">First Name</label>
    <input type="text" class="form-control" name="first_name" value="<?=@$first_name?>">
    <?php echo form_error('first_name','<span class="help-block">','</span>'); ?>
  </div>
  <div class="form-group">
    <label for="last_name">Last Name</label>
    <input type="text" class="form-control" name="last_name" value="<?=@$last_name?>">
    <?php echo form_error('last_name','<span class="help-block">','</span>'); ?>
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="text" class="form-control" name="email" value="<?=@$email?>">
    <?php echo form_error('email','<span class="help-block">','</span>'); ?>
  </div>
  <div class="form-group">
    <label for="email">Password</label>
    <input type="password" class="form-control" name="password">
    <?php echo form_error('password','<span class="help-block">','</span>'); ?>
  </div>
  <button type="submit" name="form_register" class="btn btn-primary" value="Submit">Submit</button>
</form>
<br>
Don't have an account? <a href="<?=base_url()?>login">Login here</a>
