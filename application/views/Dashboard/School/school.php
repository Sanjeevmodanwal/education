<section class="main-content container">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-heading card-default">Add Class</div>
                <div class="card-block">
                    <form role="form" method="post" action="<?php echo base_url('school/add_school'); ?>" enctype="multipart/form-data">
                        <div class="form-group ">
                            <label>Name</label>
                            <input type="text" name="school_name" placeholder="Name" class="form-control" id="shool_name">
                        </div>

                        <div class="form-group ">
                            <label>Upload image</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary AddSchool float-right">Add School</button>
                    </form>
                </div>
            </div>
        </div>

         <div class="col-md-8">
            <div class="card">
                <div class="card-heading card-default">
                    Category
                </div>
                <div class="card-block">
                    <table id="datatable" class="table table-striped dt-responsive nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Create Date</th>
                            </tr>
                        </thead>

                        <tbody id="ListLocation">
                            <?php
                            $count = 1;
                            foreach ($schools as $sch) {
                                ?>
                                <tr>
                                    <td><?php echo $count++; ?></td>
                                    <td class="lname<?php echo $sch['id']; ?>"><?php echo $sch['school_name']; ?></td>
                                    <td class="ladd<?php echo $sch['id']; ?>"><img src="<?php echo base_url('images') . "/" . $sch['image']; ?>" height="150" width="150"></td>
                                    <td><button class="btn btn-primary edit-btn" data-id="<?php echo $sch['id']; ?>">Edit</button></td>
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