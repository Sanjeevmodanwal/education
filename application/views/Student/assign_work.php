<section class="main-content container">
    <div class="row">
<?php
$get_testpId = $this->input->get('tpid', TRUE);
$get_subjectName = $this->input->get('subjectName', TRUE);
?>                
          <div class="col-md-12">
            <div class="card">
                <div class="card-heading card-default">
                    <?php echo $get_subjectName; ?> Paper Lists
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
                                <th>Ans</th>
                            </tr>
                        </thead>

                        <tbody id="ListLocation">
                            <?php
                            $count = 1;
                            foreach ($test_paper_id_list as $cls){
                                ?>
                                <tr>
                                    <td><?php echo $count++; ?></td>
                                    <td><?php echo $cls->question; ?></td>
                                    <td><?php echo $cls->opt_a; ?></td>
                                    <td><?php echo $cls->opt_b; ?></td>
                                    <td><?php echo $cls->opt_c; ?></td>
                                    <td><?php echo $cls->opt_d; ?></td>
                                    <td><?php echo $cls->ans; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody> 
                    </table>
                </div>
            </div>
        </div>

    </div>
</section>