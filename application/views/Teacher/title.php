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
                                <th>Subject</th>
                                <th>Title</th>
                                <th>Class</th>
                                <th>Status</th>
                            </tr>
                        </thead>
 
                        <tbody id="ListLocation">

                            <?php $count=0;foreach($papers as $p) { $count++; ?>
                            <tr>
                                <td><?php echo $count;?></td>
                                <td><?php echo $p->subject_name;?></td>
                                <td><?php echo $p->title;?></td>
                                <td><?php echo $p->class;?></td>
                                <td>
                                    <?php  if($p->status==0){ ?>
                                    <button class="btn btn-primary pending" data-id="<?php echo $p->id;?>">Pending</button>
                                    <?php } else { ?>
                                      <button class="btn btn-success">Complete</button>
                                       <button class="btn btn-info assign" data-id="<?php echo $p->id;?>" data-class="<?php echo $p->class;?>" data-subject="<?php echo $p->subject_id;?>">Assign Paper</button>
                                    <?php } ?>
                                </td>
                                
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
    $('.pending').on("click", function () {
        var id = $(this).data().id;
        $.post("<?php echo base_url('Teacher/store'); ?>", {"id": id}, function (d) {
            if (d.status == 200) {
              //  alert("me");
               window.location.href="<?php echo base_url('Teacher/objective'); ?>";
            }
        }, 'json');
    });
    
    $('.assign').on("click",function(){
     var id = $(this).data().id;
     var cls=$(this).data().class;
     var sub=$(this).data().subject;
        $.post("<?php echo base_url('Teacher/assign'); ?>", {"id": id,"cls":cls,"sub_id":sub}, function (d) {
           if(d.status==200){
               alert(d.msg);
           }else if(d.status==500){
              alert(d.msg); 
           }
        }, 'json');
      
    });
</script>