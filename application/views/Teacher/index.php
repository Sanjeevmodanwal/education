<section class="main-content container">
    <div class="row">

       <?php foreach($classs as $cls){ ?>
         <div class="col-md-3">
            <div class="widget  bg-light">
                <div class="row row-table ">
                    <div class="margin-b-30">
                        <h2 class="margin-b-5"><?php echo $cls->subject_name;?></h2>
                        <p class="text-muted">Class</p>
                        <span class="pull-right text-primary widget-r-m"><a href="<?php echo base_url('home/view_student');?>"><?php echo $cls->class_name;?></a></span>
                    </div>
                </div>
            </div>
        </div>
       <?php } ?>

        


        
    </div>
</section>

