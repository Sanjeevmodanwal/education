<section class="main-content container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-heading card-default">
                    Student List
                </div>
                <div class="card-block">
                    <table id="datatable" class="table table-striped dt-responsive nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>image</th>
                            </tr>
                        </thead>

                        <tbody id="ListLocation">

                            <?php foreach($students as $stu) { ?>
                            <tr>
                                <td>1</td>
                                <td><?php echo $stu->username;?></td>
                                <td><?php echo $stu->email;?></td>
                                <td><img src="<?php echo base_url('images') . "/" . '688561.jpg'; ?>" height="150" width="150"></td>
                            </tr>
                            <?php } ?>
                        </tbody> 
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
