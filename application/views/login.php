<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">

<link rel="stylesheet" href="<?=base_url()?>assets/js/jquery.min.js">
<link rel="stylesheet" href="<?=base_url()?>assets/js/bootstrap.js">

<form class="form col-md-4" method="post" action="">
  <h3>Login</h3>
  <div class="form-group">
    <label for="username">username</label>
    <input type="text" class="form-control" name="username" value="<?=@$username?>">
    <?php echo form_error('username','<span class="help-block">','</span>'); ?>
  </div>
  <div class="form-group">
    <label for="email">Password</label>
    <input type="password" class="form-control" name="password">
    <?php echo form_error('password','<span class="help-block">','</span>'); ?>
  </div>
  <button type="submit" name="form_submit" class="btn btn-primary" value="Submit">Submit</button>
</form>
<br>
Don't have an account? <a href="<?=base_url()?>register">Register here</a>
