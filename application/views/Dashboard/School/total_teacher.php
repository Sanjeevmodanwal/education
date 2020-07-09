<section class="main-content container">
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