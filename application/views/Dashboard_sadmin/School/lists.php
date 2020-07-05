<section class="main-content container">
    <div class="row">

         <div class="col-md-12">
            <div class="card">
                <div class="card-heading card-default">
                    School List
                </div>
                <div class="card-block">
                    <table id="datatable" class="table table-striped dt-responsive nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Session</th>
                                <th>Image</th>
                                <th>Create Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody id="ListLocation">
                            <?php
                            $count = 1;
                            foreach ($school_list as $sch) {
                                ?>
                                <tr>
                                    <td><?php echo $count++; ?></td>
                                    <td><?php echo $sch->school_name; ?></td>
                                    <td><?php echo $sch->school_session; ?></td>
                                    <td><img src="<?php echo base_url('images') . "/" . $sch->image; ?>" height="50" width="50"></td>
									<td><?php echo $sch->date; ?></td>
                                    <td>
									<a href="<?php echo base_url('/dashboard_sadmin/teacher');?>?sid=<?php echo $sch->id; ?>">Add Teacher</a> | 
									<a href="<?php echo base_url('/dashboard_sadmin/classes');?>?sid=<?php echo $sch->id; ?>">Add Class</a> | 
									<a href="<?php echo base_url('/dashboard_sadmin/student');?>?sid=<?php echo $sch->id; ?>">Add Student</a>
									</td>
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
    $('.AddSchool').on("click", function () {
        var name = $('#shool_name').val();
        $.post("<?php echo base_url('school/add_school'); ?>", {"name": name}, function (d) {
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