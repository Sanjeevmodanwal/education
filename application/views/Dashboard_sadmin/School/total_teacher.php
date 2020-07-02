<section class="main-content container">
<?php
$getSchoolId = $this->input->get('sid', TRUE);
?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-heading card-default">
                  All Teacher List
                </div>
                <div class="card-block">
                    <table id="datatable" class="table table-striped dt-responsive nowrap">
                        <thead>
                            <tr>
                                <th>Sr.</th>
                                <th>School Name</th>
                                <th>Teacher Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Created On</th>
                            </tr>
                        </thead>

                        <tbody id="ListLocation">
							<?php
                            $count = 1;
                            foreach ($techer_list as $sch) {
                                ?>
                                <tr>
                                    <td><?php echo $count++; ?></td>
                                    <td><?php echo $sch->school_name; ?></td>
                                    <td><?php echo $sch->username; ?></td>
                                    <td><?php echo $sch->email; ?></td>
                                    <td><?php echo $sch->mobile; ?></td>
                                    <td><?php echo $sch->join_date; ?></td>
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
        $.post("<?php echo base_url('dashboard_sadmin/add_teacher'); ?>", {"name": name}, function (d) {
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