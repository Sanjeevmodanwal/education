<section class="main-content container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-heading card-default">Add Student</div>
                <div class="card-block">
                    <form role="form" method="post" action="<?php echo base_url('school/add_teacher'); ?>" enctype="multipart/form-data">
                        <input type="hidden" name="role" value="1">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group ">
                                    <label>Name</label>
                                    <input type="text" name="username" placeholder="Name" class="form-control" id="shool_name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group ">
                                    <label>Email</label>
                                    <input type="text" name="email" placeholder="Email" class="form-control" id="shool_name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group ">
                                    <label>Password</label>
                                    <input type="text" name="password" placeholder="Password" class="form-control" id="shool_name">
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group ">
                                    <label>Mobile No</label>
                                    <input type="text" name="mobile" placeholder="Mobile" class="form-control" id="shool_name">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label>Upload image</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary AddSchool float-right">Add Student</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-12">
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