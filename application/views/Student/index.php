<section class="main-content container">
 	<div class="row">
       
	   <?php foreach ($get_assign_list as $cls){ ?>
          <div class="col-md-4">
                    <div class="widget bg-light padding-0">
                        <div class="row row-table">
                            <div class="col-xs-4 text-center padding-15 bg-success">
                                <em class="icon-users fa-3x"></em>
                            </div>
                            <div class="col-xs-8 padding-15 text-right">
							<a href="<?php echo base_url('/Student/assign_work?tpid='.$cls->paper_id.'&subjectName='.$cls->subject_name.'');?>">
                                <h2 class="mv-0"><?php //echo $teacher_count;?></h2>
                                <div class="margin-b-0 text-muted"><?php echo $cls->subject_name; ?></div>
							</a>
                            </div>
                        </div>
                    </div>
                </div>
	   <?php } ?>		
				
               
            </div>
</section>
