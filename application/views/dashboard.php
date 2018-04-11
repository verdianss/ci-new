<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">

<script src="<?=base_url()?>assets/js/jquery.min.js"></script>

<h3>Dashboard</h3>
<a href="<?=base_url()?>dashboard/links_page"><h5>Show all links...</h5></a>
<hr>
<form class="form col-md-4" id="form_generate">
  <div class="form-group">
    <input type="text" class="form-control" id="link" name="link" placeholder="Input Link">
    <?php echo form_error('link','<span class="help-block">','</span>'); ?>
  </div>
  <button type="submit" class="btn btn-primary">Generate</button>
</form>
<span id="generatedlink"></span>

<script type="text/javascript">
    $(document).ready(function() {
        $('#form_generate').on('submit',function(e) {
            e.preventDefault();
            var form_data = { link: $('#link').val() };
            $.ajax({
                url   : '<?=base_url()?>dashboard/generate',
                type  : 'post',
                data  : form_data,
                success : function(html) {
                    $('#generatedlink').html(html);
                }
            });
        });
    });
</script>
