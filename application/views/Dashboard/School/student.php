<section class="main-content container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-heading card-default">Add New Student</div>
                <div class="card-block">
                    <form role="form" method="post" action="<?php echo base_url('Dashboard/add_student'); ?>" enctype="multipart/form-data">
                      
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Select School</label>
                                    <select name="school_id" class="form-control m-b">
                                        <?php foreach ($schools as $sch) { ?>
                                            <option value="<?php echo $sch->id; ?>"><?php echo $sch->school_name; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
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


                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group ">
                                    <label>Student Password</label>
                                    <input type="text" name="password" placeholder="Password" class="form-control" id="teach_name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group ">
                                    <label>Student Mobile No</label>
                                    <input type="text" name="mobile" placeholder="Mobile" class="form-control" id="teach_name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Select Class</label>
                                    <select name="class" class="form-control m-b">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label>Upload Student image</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary AddTeacher float-right">Add Student</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-heading card-default">
                    Teacher lists
                </div>
                <div class="card-block">
                    <table id="datatable" class="table table-striped dt-responsive nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Image</th>
                                <th>Create Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody id="ListLocation">
                            <?php
                            $count = 1;
                            foreach ($students as $stu) {
                                ?>
                                <tr>
                                    <td><?php echo $count++; ?></td>
                                    <td><?php echo $stu->username; ?></td>
                                    <td><?php echo $stu->email; ?></td>
                                    <td><?php echo $stu->mobile; ?></td>
                                    <td><img src="<?php echo base_url('images') . "/" . $stu->image; ?>" height="150" width="150"></td>
                                    <td><?php echo $stu->join_date; ?></td>
                                    <td><button class="btn btn-primary edit-btn" data-id="<?php echo $stu->id; ?>">Edit</button></td>
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