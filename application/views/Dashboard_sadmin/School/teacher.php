<section class="main-content container">
<?php
$getSchoolId = $this->input->get('sid', TRUE);
?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-heading card-default">Add New Teacher</div>
                <div class="card-block">
                    <form role="form" method="post" action="<?php echo base_url('dashboard_sadmin/add_teacher'); ?>" enctype="multipart/form-data">
                        <input type="hidden" name="role" value="3">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group ">
                                    <label>Teacher Name</label>
									<input type="text" name="username" placeholder="Name" class="form-control" id="shool_name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group ">
                                    <label>Teacher Email</label>
                                    <input type="text" name="email" placeholder="Email" class="form-control" id="shool_name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group ">
                                    <label>Teacher Password</label>
                                    <input type="text" name="password" placeholder="Password" class="form-control" id="shool_name">
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group ">
                                    <label>Teacher Mobile No</label>
                                    <input type="text" name="mobile" placeholder="Mobile" class="form-control" id="shool_name">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label>Upload Teacher image</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                        </div>
						<input type="hidden" name="school_id" value="<?php echo $getSchoolId;?>" id="shool_name">
                        <button type="submit" class="btn btn-sm btn-primary AddSchool float-right">Add School</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-heading card-default">
                   <?php echo $getSchoolId;?> Teacher List
                </div>
                <div class="card-block">
                    <table id="datatable" class="table table-striped dt-responsive nowrap">
                        <thead>
                            <tr>
                                <th>Sr.</th>
                                <th>School Name</th>
                                <th>Teacher Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Created On</th>
                            </tr>
                        </thead>

                        <tbody id="ListLocation">
							<?php
                            $count = 1;
                            foreach ($techer_list as $sch) {
                                ?>
                                <tr>
                                    <td><?php echo $count++; ?></td>
                                    <td><?php echo $sch->school_name; ?></td>
                                    <td><?php echo $sch->username; ?></td>
                                    <td><?php echo $sch->email; ?></td>
                                    <td><?php echo $sch->mobile; ?></td>
                                    <td><?php echo $sch->join_date; ?></td>
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
        $.post("<?php echo base_url('dashboard_sadmin/add_teacher'); ?>", {"name": name}, function (d) {
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