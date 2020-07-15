<section class="main-content container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-heading card-default">Add Objective Question</div>
                <div class="card-block">
                    <form role="form" method="post" action="<?php echo base_url('Teacher/add_objective'); ?>" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group ">
                                    <label>Question</label>
                                    <input type="text" name="question" placeholder="Enter Question" class="form-control" id="shool_name">
                                </div>  
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label>Option A</label>
                                    <input type="text" name="opt_a" placeholder="Enter Option" class="form-control" id="shool_name">
                                </div>  
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label>Option B</label>
                                    <input type="text" name="opt_b" placeholder="Enter Option" class="form-control" id="shool_name">
                                </div>  
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label>Option C</label>
                                    <input type="text" name="opt_c" placeholder="Enter Option" class="form-control" id="shool_name">
                                </div>  
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label>Option D</label>
                                    <input type="text" name="opt_d" placeholder="Enter Option" class="form-control" id="shool_name">
                                </div>  
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label>Answer C</label>
                                    <input type="text" name="ans" placeholder="Enter Answer" class="form-control" id="shool_name">
                                </div>  
                            </div>
                        </div>

                        <!--                        <div class="form-group ">
                                                    <label>Upload image</label>
                                                    <input type="file" name="image" class="form-control">
                                                </div>-->
                        <button type="submit" class="btn btn-sm btn-primary AddSchool float-right">Add Question</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-heading card-default">
                    Question  Paper
                    <button class="btn btn-success float-right rel">Release</button>
                </div>
                <div class="card-block">
                    <table id="datatable" class="table table-striped dt-responsive nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Question</th>
                                <th>Option A</th>
                                <th>Option B</th>
                                <th>Option C</th>
                                <th>Option D</th>
                                <th>Answer</th>
                            </tr>
                        </thead>

                        <tbody id="ListLocation">

                            <?php $count=0;foreach($objective as $obj) { $count++ ?>
                            <tr>
                                <td><?php echo $count;?></td>
                                <td><?php echo $obj->question;?></td>
                                <td><?php echo $obj->opt_a;?></td>
                                <td><?php echo $obj->opt_b;?></td>
                                <td><?php echo $obj->opt_c;?></td>
                                <td><?php echo $obj->opt_d;?></td>
                                 <td><?php echo $obj->ans;?></td>

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
    $('.rel').on("click", function () {
        $.get("<?php echo base_url('Teacher/release'); ?>",function (d) {
            if (d.status == 200) {
               window.location.href="<?php echo base_url('Teacher/objective'); ?>";
            }
        }, 'json');
    });
</script>