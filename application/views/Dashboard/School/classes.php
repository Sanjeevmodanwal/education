<section class="main-content container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-heading card-default">Add Class</div>
                <div class="card-block">
                    <form role="form" method="post" action="<?php echo base_url('Dashboard/add_class'); ?>" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Select School</label>
                                    <select name="school_id" class="form-control m-b">
                                        <?php foreach ($school as $sch) { ?>
                                        <option value="<?php echo $sch->id; ?>"><?php echo $sch->school_name; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Select Class</label>
                                    <select name="class_name" class="form-control m-b">
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

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Select Subject</label>
                                    <select name="subject_id" class="form-control m-b">
                                        <?php foreach ($subjects as $sub) { ?>
                                            <option value="<?php echo $sub->id; ?>"><?php echo $sub->subject_name; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Select Teacher</label>
                                    <select name="teacher_id" class="form-control m-b">
                                        <?php foreach ($teachers as $tec) { ?>
                                        <option value="<?php echo $tec->teacher_id;?>"><?php echo $tec->username;?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                            </div>
                        </div>


                        <button type="submit" class="btn btn-sm btn-primary AddSchool float-right">Add Class</button>
                    </form>
                </div>
            </div>
        </div>
        
          <div class="col-md-12">
            <div class="card">
                <div class="card-heading card-default">
                    Class
                </div>
                <div class="card-block">
                    <table id="datatable" class="table table-striped dt-responsive nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>School name</th>
                                <th>Class</th>
                                <th>Subject</th>
                                <th>Teacher</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody id="ListLocation">
                            <?php
                            $count = 1;
                            foreach ($class as $cls) {
                                ?>
                                <tr>
                                    <td><?php echo $count++; ?></td>
                                    <td class="lname<?php echo $cls['id']; ?>"><?php echo $cls['school_name']; ?></td>
                                    <td class="lname<?php echo $cls['id']; ?>"><?php echo $cls['class_name']; ?></td>
                                    <td class="lname<?php echo $cls['id']; ?>"><?php echo $cls['subject']; ?></td>
                                    <td class="lname<?php echo $cls['id']; ?>"><?php echo $cls['teacher_name']; ?></td>
                                    <td><button class="btn btn-primary edit-btn" data-id="<?php echo $cls['id']; ?>">Edit</button></td>
                                </tr>
                            <?php } ?>

                        </tbody> 
                    </table>
                </div>
            </div>
        </div>

    </div>
</section>