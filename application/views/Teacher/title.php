<section class="main-content container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-heading card-default">Add Class</div>
                <div class="card-block">
                    <form role="form" method="post" action="<?php echo base_url('Teacher/add_title'); ?>" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Select Subject</label>
                                    <select name="subject_id" class="form-control m-b">
                                        <option value="1">English</option>
                                        <option value="2">Hindi</option>
                                        <option value="3">Math</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
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
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group ">
                                    <label>Title</label>
                                    <input type="text" name="title" placeholder="Enter title" class="form-control" id="shool_name">
                                </div>
                            </div>
                        </div>


                        <button type="submit" class="btn btn-sm btn-primary AddSchool float-right">Next</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>