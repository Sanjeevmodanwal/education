<section class="main-content container">
    <div class="row">

        <div class="col-md-4">
            <div class="widget bg-light padding-0">
                <div class="row row-table">
                    <div class="col-xs-4 text-center padding-15 bg-success">
                        <i class="fa fa-university" aria-hidden="true"></i>
                    </div>
                    <div class="col-xs-8 padding-15 text-right">
                        <a href="<?php echo base_url('/Dashboard_sadmin/lists'); ?>">
                            <h2 class="mv-0"><?php echo $school_count; ?></h2>
                            <div class="margin-b-0 text-muted">Total School List</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="widget bg-light padding-0">
                <div class="row row-table">
                    <div class="col-xs-4 text-center padding-15 bg-success">
                        <em class="icon-users fa-3x"></em>
                    </div>
                    <div class="col-xs-8 padding-15 text-right">
                        <a href="<?php echo base_url('/Dashboard_sadmin/total_teacher'); ?>">
                            <h2 class="mv-0"><?php echo $teacher_count; ?></h2>
                            <div class="margin-b-0 text-muted">Total Teacher List</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="widget bg-light padding-0">
                <div class="row row-table">
                    <div class="col-xs-4 text-center padding-15 bg-success">
                        <em class="icon-users fa-3x"></em>
                    </div>
                    <div class="col-xs-8 padding-15 text-right">
                        <a href="<?php echo base_url('/Dashboard_sadmin/total_class'); ?>">
                            <h2 class="mv-0"><?php echo $class_count; ?></h2>
                            <div class="margin-b-0 text-muted">Total Class List</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="widget bg-light padding-0">
                <div class="row row-table">
                    <div class="col-xs-4 text-center padding-15 bg-success">
                        <em class="icon-users fa-3x"></em>
                    </div>
                    <div class="col-xs-8 padding-15 text-right">
                        <a href="<?php echo base_url('/Dashboard_sadmin/total_student'); ?>">
                            <h2 class="mv-0"><?php echo $class_student; ?></h2>
                            <div class="margin-b-0 text-muted">Total Student List</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
