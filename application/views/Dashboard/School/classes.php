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
    </div>
</section>