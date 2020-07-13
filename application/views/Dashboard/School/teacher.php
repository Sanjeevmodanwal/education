<section class="main-content container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-heading card-default">Add New Teacher</div>
                <div class="card-block">
                    <form role="form" method="post" action="<?php echo base_url('Dashboard/add_teacher'); ?>" enctype="multipart/form-data">
                        <input type="hidden" name="role" value="3">
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
                                    <label>Teacher Name</label>
									<input type="text" name="username" placeholder="Name" class="form-control" id="teach_name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group ">
                                    <label>Teacher Email</label>
                                    <input type="text" name="email" placeholder="Email" class="form-control" id="teach_name">
                                </div>
                            </div>
                            

                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group ">
                                    <label>Teacher Password</label>
                                    <input type="text" name="password" placeholder="Password" class="form-control" id="teach_name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group ">
                                    <label>Teacher Mobile No</label>
                                    <input type="text" name="mobile" placeholder="Mobile" class="form-control" id="teach_name">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label>Upload Teacher image</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                        </div>
						
                        <button type="submit" class="btn btn-sm btn-primary AddTeacher float-right">Add Teacher</button>
                    </form>
                </div>
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
                            </tr>
                        </thead>

                        <tbody id="ListLocation">
                            <?php
                            $count = 1;
                            foreach ($teachers as $sch) {
                                ?>
                                <tr>
                                    <td><?php echo $count++; ?></td>
                                    <td><?php echo $sch->username; ?></td>
                                     <td><?php echo $sch->email; ?></td>
                                     <td><?php echo $sch->mobile; ?></td>
                                    <td><img src="<?php echo base_url('images') . "/" . $sch->image; ?>" height="150" width="150"></td>
                                    <td><?php echo $sch->date; ?></td>
                                    <td><button class="btn btn-primary edit-btn" data-id="<?php echo $sch->id; ?>">Edit</button></td>
                                </tr>
                            <?php } ?>

                        </tbody> 
                    </table>
                </div>
            </div>
        </div>
</section>

<script>
    $('.AddTeacher').on("click", function () {
        var name = $('#teach_name').val();
        $.post("<?php echo base_url('dashboard/add_teacher'); ?>", {"name": name}, function (d) {
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