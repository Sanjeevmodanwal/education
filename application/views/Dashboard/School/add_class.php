<section class="main-content container">
    <div class="row">
        <div class="col-sm-5">
            <div class="card">
                <div class="card-heading card-default">Add Class</div>
                <div class="card-block">
                    <form role="form">
                        <div class="form-group ">
                            <label>Name</label>
                            <input type="text" placeholder="Name" class="form-control" id="name">
                        </div>
                        <!--                        <div class="form-group ">
                                                    <label>Address</label>
                                                    <input type="text" placeholder="Address" class="form-control" id="address">
                                                </div>-->

                        <button type="button" class="btn btn-sm btn-primary AddLocation">Add Class</button>
                    </form>
                </div>
            </div>
        </div>



        <div class="col-sm-7">
            <div class="card">
                <div class="card-heading card-default">
                    Class
                </div>
                <div class="card-block">
                    <table id="datatable" class="table table-striped dt-responsive nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="ClassList">
                            <?php $count=1; foreach ($class as $cal) { ?>
                                <tr>
                                    <td><?php echo $count++;?></td>
                                    <td class="cls<?php echo $cal['id'];?>"><?php echo $cal['class_name']; ?></td>
                                    <td><?php $data= explode("-",$cal['date']); echo $data[2]."-".$data[1]."-".$data[0]; ?></td>
                                    <td><button class="btn btn-primary edit-btn" data-id="<?php echo $cal['id']; ?>">Edit</button> &nbsp;&nbsp;|&nbsp;&nbsp;<button class="btn btn-danger" data-id="<?php echo $cal['id']; ?>">DELETE</button></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="classModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="fa fa-times"></span></button>
                <h5 class="modal-title" id="exampleModalLabel">Edit Class</h5>
            </div>
            <div class="modal-body">
                <form role="form">
                    <div class="form-group">
                        <input type="text" class="form-control class-name" value="">
                    </div>
                    <div class="clearfix">
                        <button type="button" class="btn  btn-primary pull-right save-change">Save Change</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $('.AddLocation').on("click", function () {
        var name = $('#name').val();
        $.post("<?php echo base_url('Admin/dashboard/add_class'); ?>", {"name": name}, function (d) {
            if (d.status == 200) {
                $.toast({
                    heading: 'Success !',
                    text: 'Class Add Successfully !',
                    position: 'top-right',
                    loaderBg: '#fff',
                    icon: 'success',
                    hideAfter: 3000,
                    stack: 1
                });
                $('<tr><td>#</td><td>' + name + '</td><td>' + d.date + '</td><tr>').appendTo('#ClassList');
            } else {

            }
        }, 'json');
    });
    
    var id;
    $('.edit-btn').on("click", function () {
        $('#classModal').modal('show');
        id = $(this).data().id;
        var name = $('.cls' + id).html();
        $('.class-name').val(name);
    });

    $('.save-change').on("click", function () {
        var cname= $('.class-name').val();
        $.post("<?php echo base_url('Admin/dashboard/update_class'); ?>", {"id": id, "cname": cname}, function (d) {
            if (d.status == 200) {
                $('.cls' + id).html(cname);
                $('#classModal').modal('hide');
                $.toast({
                    heading: 'Success !',
                    text: d.msg,
                    position: 'top-right',
                    loaderBg: '#fff',
                    icon: 'success',
                    hideAfter: 3000,
                    stack: 1
                });
            }
        }, 'json');
    });

    $('.btn-danger').on("click", function () {
        var id = $(this).data().id;
        var th = $(this).closest('tr');
        var r = confirm("Are you want to delete this ?");
        if (r == true) {
            $.post("<?php echo base_url('Admin/dashboard/delete_class'); ?>", {"id": id}, function (d) {
                if(d.status==200){
                    th.hide('1000');
                }
            },'json');
        } else {
            txt = "Cancel!";
        }
    });

</script>