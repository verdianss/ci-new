<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">
<link rel="stylesheet" href="<?=base_url()?>assets/css/jquery.dataTables.min.css">

<script src="<?=base_url()?>assets/js/jquery.min.js"></script>
<script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>assets/js/jquery.dataTables.min.js"></script>

<h3>List of Links</h3>
<a href="<?=base_url()?>dashboard">Back to Dashboard</a>
<hr>
<table id="table_list" class="display" style="width:100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Url Code</th>
            <th>Original Link</th>
            <th>Action</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>ID</th>
            <th>Url Code</th>
            <th>Original Link</th>
            <th>Action</th>
        </tr>
    </tfoot>
</table>

<script>
    $(document).ready(function() {
      $('#table_list').DataTable({
        "ajax": {
          url : "<?=base_url()?>dashboard/get_links",
            type : 'GET'
        },
      });
    });
</script>
