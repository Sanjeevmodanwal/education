<section class="main-content container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-heading card-default">Add New Student</div>
                <div class="card-block">
                    <form role="form" method="post" action="<?php echo base_url('dashboard/add_student'); ?>" enctype="multipart/form-data">
                        <input type="hidden" name="role" value="3">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group ">
                                    <label>Student Name</label>
									<input type="text" name="username" placeholder="Name" class="form-control" id="teach_name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group ">
                                    <label>Student Email</label>
                                    <input type="text" name="email" placeholder="Email" class="form-control" id="teach_name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group ">
                                    <label>Student Password</label>
                                    <input type="text" name="password" placeholder="Password" class="form-control" id="teach_name">
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group ">
                                    <label>Student Mobile No</label>
                                    <input type="text" name="mobile" placeholder="Mobile" class="form-control" id="teach_name">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label>Upload Student image</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                        </div>
						<input type="hidden" name="school_id" value="<?php echo $getSchoolId;?>" id="teach_name">
                        <button type="submit" class="btn btn-sm btn-primary AddTeacher float-right">Add Student</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</section>

<script>
    $('.AddTeacher').on("click", function () {
        var name = $('#teach_name').val();
        $.post("<?php echo base_url('dashboard/add_student'); ?>", {"name": name}, function (d) {
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