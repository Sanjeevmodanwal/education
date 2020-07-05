<section class="main-content container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-heading card-default">Add New School</div>
                <div class="card-block">
                    <form role="form" method="post" action="<?php echo base_url('dashboard_sadmin/add_school'); ?>" enctype="multipart/form-data">
                        <div class="form-group ">
                            <label>School Name</label>
                            <input type="text" name="school_name" placeholder="Name" class="form-control" id="shool_name">
                        </div>
						
						
						 <div class="form-group">
                            <label>Session Year</label>
                            <select name="school_session" class="form-control" id="shool_name">
								<option value="">Select Option</option>
								<option value="2020-21">2020-21</option>
								<option value="2021-22">2021-22</option>
								<option value="2022-23">2022-23</option>
								<option value="2023-24">2023-24</option>
								<option value="2024-25">2024-25</option>
								<option value="2025-26">2025-26</option>
								<option value="2026-27">2026-27</option>
								<option value="2027-28">2027-28</option>
							</select>
                        </div>

                        <div class="form-group ">
                            <label>Upload image</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary AddSchool float-right">Submit</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</section>

<script>
    $('.AddSchool').on("click", function () {
        var name = $('#shool_name').val();
        $.post("<?php echo base_url('dashboard_sadmin/add_school'); ?>", {"name": name}, function (d) {
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