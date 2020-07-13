<section class="main-content container">
    <?php
    $getSchoolId = $this->input->get('sid', TRUE);
    ?>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-heading card-default">Add School Founder</div>
                <div class="card-block">
                    <form role="form" method="post" action="<?php echo base_url('Dashboard_sadmin/add_founder'); ?>" enctype="multipart/form-data">




                        <div class="form-group ">
                            <label>Founder Name</label>
                            <input type="text" name="username" placeholder="username" class="form-control" id="shool_name">
                        </div>

                        <div class="form-group ">
                            <label>Email id</label>
                            <input type="text" name="email" placeholder="email" class="form-control" id="shool_name">
                        </div>	

                        <div class="form-group ">
                            <label>Mobile No</label>
                            <input type="text" name="mobile" placeholder="mobile" class="form-control" id="shool_name">
                        </div>	

                        <div class="form-group ">
                            <label>Password</label>
                            <input type="password" name="password" placeholder=">" class="form-control" id="shool_name">
                        </div>	

                        <input type="hidden" name="school_id" value="<?php echo $getSchoolId; ?>" id="shool_name">
                        <button type="submit" class="btn btn-sm btn-primary AddStudent float-right">Add Founder</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-heading card-default">
                    Founder List
                </div>
                <div class="card-block">
                    <table id="datatable" class="table table-striped dt-responsive nowrap">
                        <thead>						
                            <tr>
                                <th>School Name</th>
                                <th>Founder Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Create Date</th>
                            </tr>
                        </thead>

                        <tbody id="ListLocation">
                            <tr>
                                <td><?php echo $founders->school_name; ?></td>
                                <td><?php echo $founders->username; ?></td>
                                <td><?php echo $founders->email; ?></td>
                                <td><?php echo $founders->mobile; ?></td>
                                <td><?php echo $founders->join_date; ?></td>

                            </tr>

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