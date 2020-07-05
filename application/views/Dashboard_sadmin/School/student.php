<section class="main-content container">
<?php
$getSchoolId = $this->input->get('sid', TRUE);
?>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-heading card-default">Add New Student</div>
                <div class="card-block">
                    <form role="form" method="post" action="<?php echo base_url('dashboard_sadmin/add_student'); ?>" enctype="multipart/form-data">
						
						<div class="form-group">
                            <label>Class Name</label>
                            <select name="class_id" class="form-control" id="shool_name">
								<option value="">Select Option</option>
								<?php foreach ($get_class_list as $sch) { ?>
									<option value="<?php echo $sch->id; ?>"><?php echo $sch->class_name; ?></option>
								<?php } ?>
							</select>
                        </div>
						
						<div class="form-group">
                            <label>Teacher Name</label>
                            <select name="teacher_id" class="form-control" id="shool_name">
								<option value="">Select Option</option>
								<?php foreach ($techer_list as $sch2) { ?>
									<option value="<?php echo $sch2->id; ?>"><?php echo $sch2->username; ?></option>
								<?php } ?>
							</select>
                        </div>
					
                        <div class="form-group ">
                            <label>Student Name</label>
                            <input type="text" name="student_name" placeholder="Name" class="form-control" id="shool_name">
                        </div>						

						<input type="hidden" name="school_id" value="<?php echo $getSchoolId;?>" id="shool_name">
                        <button type="submit" class="btn btn-sm btn-primary AddStudent float-right">Add Student</button>
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
                                <th>School Name</th>
                                <th>Class Name</th>
                                <th>Teacher Name</th>
                                <th>Student Name</th>
                                <th>Create Date</th>
                            </tr>
                        </thead>

                        <tbody id="ListLocation">
						<?php
                            $count = 1;
                            foreach ($get_student_list as $sch3) {
                        ?>
							<tr>
                                    <td><?php echo $count++; ?></td>
                                    <td><?php echo $sch3->school_name; ?></td>
                                    <td><?php echo $sch3->class_name; ?></td>
                                    <td><?php echo $sch3->username; ?></td>
                                    <td><?php echo $sch3->student_name; ?></td>
                                    <td><?php echo $sch3->created_at; ?></td>
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
    $('.AddStudent').on("click", function () {
        var name = $('#shool_name').val();
        $.post("<?php echo base_url('dashboard_sadmin/add_student'); ?>", {"name": name}, function (d) {
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