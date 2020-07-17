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
                                    <label>School Name</label>
                                    <select name="school_id" class="form-control m-b" id="teach_name">
                                        <?php foreach ($schools as $sch) { ?>
                                        <option value="<?php echo $sch->id; ?>"><?php echo $sch->school_name; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
							
							<div class="col-md-4">
                                 <div class="form-group">
                                    <label>Class Name</label>
                                    <select name="class_id" class="form-control m-b" id="teach_name">
										<option value="">Select Option</option>
                                        <?php foreach ($get_classes_founder as $sch2) { ?>
                                        <option value="<?php echo $sch2->id; ?>"><?php echo $sch2->class_name; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
							
							<div class="col-md-4">
                                 <div class="form-group">
                                    <label>Subject Name</label>
                                    <select name="subject_id" class="form-control m-b" id="teach_name">
										<option value="">Select Option</option>
                                        <?php foreach ($get_subject_founder as $sch3) { ?>
                                        <option value="<?php echo $sch3->id; ?>"><?php echo $sch3->subject_name; ?></option>
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
							<div class="col-md-4">
                            <div class="form-group ">
                                <label>Upload Teacher image</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                            </div>
                        </div>
						
                        <button type="submit" class="btn btn-sm btn-primary AddTeacher float-right">Submit</button>
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
                                <th>School Name</th>
                                <th>Class Name</th>
                                <th>Subject Name</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Image</th>
                                <th>Created Date</th>
                            </tr>
                        </thead>

                        <tbody id="ListLocation">
                            <?php
                            $count = 1;
                            foreach ($teachers as $sch4) {
                                ?>
                                <tr>
                                    <td><?php echo $count++; ?></td>
                                    <td><?php echo $sch4->school_name; ?></td>
                                    <td><?php echo $sch4->class_name; ?></td>
                                    <td><?php echo $sch4->subject_name; ?></td>
                                    <td><?php echo $sch4->username; ?></td>
                                     <td><?php echo $sch4->email; ?></td>
                                     <td><?php echo $sch4->mobile; ?></td>
                                    <td><img src="<?php echo base_url('images') . "/" . $sch4->image; ?>" height="50" width="50"></td>
                                    <td><?php echo $sch4->join_date; ?></td>
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