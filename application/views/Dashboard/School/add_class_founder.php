<section class="main-content container">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-heading card-default">Add New Class</div>
                <div class="card-block">
                    <form role="form" method="post" action="<?php echo base_url('Dashboard/add_class_founder_insert'); ?>" enctype="multipart/form-data">
                        <div class="form-group ">
                            <label>Class Name</label>
                            <input type="text" name="class_name" placeholder="Enter Class Name" class="form-control" id="class_div" required="true">
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary AddClassFounder float-right">Submit</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-heading card-default">
                    Class List
                </div>
                <div class="card-block">
                    <table id="datatable" class="table table-striped dt-responsive nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Class Name</th>
                                <th>Created Date</th>
                            </tr>
                        </thead>

                        <tbody id="ListLocation">

                            <?php
                            $count = 1;
                            foreach ($get_classes as $sub) {
                                ?>
                                <tr>
                                    <td><?php echo $count++; ?></td>
                                    <td><?php echo $sub->class_name; ?></td>
                                    <td><?php echo $sub->created_date; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody> 
                    </table>
                </div>
            </div>
        </div>

    </div>
</section>

<script>
   $('.AddClassFounder').on("click", function () {
       var name = $('#class_div').val();
       $.post("<?php echo base_url('school/add_class_founder_insert'); ?>", {"name": name}, function (d) {
           if (d.status == 200) {
               $.toast({
                   heading: 'Success !',
                   text: 'School Add Successfully !',
                   position: 'top-right',
                   loaderBg: '#fff',
                   icon: 'success',
                   hideAfter: 3000,
                   stack: 1
               });
               $('<tr><td>#</td><td>' + name + '</td><tr>').appendTo('#ListLocation');
           }
       }, 'json');
   });

</script>