<section class="main-content container">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-heading card-default">Add subject</div>
                <div class="card-block">
                    <form role="form" method="post" action="<?php echo base_url('Dashboard/add_subject'); ?>" enctype="multipart/form-data">
                        <div class="form-group ">
                            <label>Subject Name</label>
                            <input type="text" name="subject_name" placeholder="Enter Subject Name" class="form-control" id="shool_name" required="true">
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary AddSchool float-right">Add Subject</button>
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
                                <th>Create Date</th>
                            </tr>
                        </thead>

                        <tbody id="ListLocation">

                            <?php
                            $count = 1;
                            foreach ($subjects as $sub) {
                                ?>
                                <tr>
                                    <td><?php echo $count++; ?></td>
                                    <td class="lname<?php echo $sub->id; ?>"><?php echo $sub->subject_name; ?></td>
                                    <td class="lname<?php echo $sub->id; ?>"><?php echo $sub->create_date; ?></td>
                                    <td><button class="btn btn-primary edit-btn" data-id="<?php echo $sub->id; ?>">Edit</button></td>
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
//    $('.AddSchool').on("click", function () {
//        var name = $('#shool_name').val();
//        $.post("<?php echo base_url('school/add_school'); ?>", {"name": name}, function (d) {
//            if (d.status == 200) {
//                $.toast({
//                    heading: 'Success !',
//                    text: 'School Add Successfully !',
//                    position: 'top-right',
//                    loaderBg: '#fff',
//                    icon: 'success',
//                    hideAfter: 3000,
//                    stack: 1
//                });
//                $('<tr><td>#</td><td>' + name + '</td><tr>').appendTo('#ListLocation');
//            }
//        }, 'json');
//    });

</script>