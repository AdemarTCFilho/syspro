<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!--state overview start-->
        <div>
            <p>
                <i class="fa fa-ban" style="font-size:16px;color:red;float: right;"> CANCELADO </i>
                <i class="fa fa-check" style="font-size:16px;color:#36d227;float: right;"> ATENDIDO |&nbsp;&nbsp;</i>
                <i class="fa fa-thumbs-up" style="font-size:16px;color:#0288d1;float: right;"> CONFIRMADO |&nbsp;&nbsp;</i>
                <i class="fa fa-warning" style="font-size:16px;color:#d1ae02;float: right;"> AGENDADO |&nbsp;&nbsp;</i>
            </p>
        </div>
        <?php if ($this->ion_auth->in_group('admin')) { ?>
        <div class="row state-overview" style="padding: 23px 19px;">
            <!--<div class="col-lg-3 col-sm-6">
                <?php if ($this->ion_auth->in_group('admin')) { ?>
                    <a href="doctor">
                    <?php } ?>
                    <section class="panel card-cor-verde">
                        <div class="symbol terques">
                            <i class="fa fa-stethoscope"></i>
                        </div>
                        <div class="value"> 
                            <h1 class="">
                                <strong><?php echo $this->db->count_all('doctor'); ?></strong>
                            </h1>
                            <strong><p><?php echo lang('doctor'); ?></p></strong>
                        </div>
                    </section>
                    <?php if (!$this->ion_auth->in_group('admin')) { ?>
                    </a>
                <?php } ?>
            </div>
            <div class="col-lg-3 col-sm-6">
                <?php if ($this->ion_auth->in_group('admin')) { ?>
                    <a href="patient">
                    <?php } ?>
                    <section class="panel card-cor-aluz">
                        <div class="symbol blue">
                            <i class="fa fa-users"></i>
                        </div>
                        <div class="value">
                            <h1 class="">
                                <strong><?php echo $this->db->count_all('patient'); ?></strong>
                            </h1>
                            <strong><p><?php echo lang('patient'); ?></p></strong>
                        </div>
                    </section>
                    <?php if ($this->ion_auth->in_group('admin')) { ?>
                    </a>
                <?php } ?>
            </div>
            <div class="col-lg-3 col-sm-6">
                <?php if ($this->ion_auth->in_group('admin')) { ?>
                    <a href="nurse">
                    <?php } ?>
                    <section class="panel card-cor-laranja">
                        <div class="symbol yellow">
                            <i class="fa fa-female"></i>
                        </div>
                        <div class="value">
                            <h1 class="">
                                <strong><?php echo $this->db->count_all('nurse'); ?></strong>
                            </h1>
                            <strong><p><?php echo lang('nurse'); ?></p></strong>
                        </div>
                    </section>
                    <?php if ($this->ion_auth->in_group('admin')) { ?>
                    </a>
                <?php } ?>
            </div>
            <div class="col-lg-3 col-sm-6">
                <?php if ($this->ion_auth->in_group('admin')) { ?>
                    <a href="pharmacist">
                    <?php } ?>
                    <section class="panel card-cor-verde">
                        <div class="symbol terques">
                            <i class="fa  fa-medkit"></i>
                        </div>
                        <div class="value">
                            <h1 class="">
                                <strong><?php echo $this->db->count_all('pharmacist'); ?></strong>
                            </h1>
                            <strong><p><?php echo lang('pharmacist'); ?></p></strong>
                        </div>
                    </section>
                    <?php if ($this->ion_auth->in_group('admin')) { ?>
                    </a>
                <?php } ?>
            </div>
            <div class="col-lg-3 col-sm-6">
                <?php if ($this->ion_auth->in_group('admin')) { ?>
                    <a href="patient/caseList">
                    <?php } ?>
                    <section class="panel card-cor-aluz">
                        <div class="symbol blue">
                            <i class="fa fa-list-alt"></i>
                        </div>
                        <div class="value">
                            <h1 class="">
                                <strong><?php echo $this->db->count_all('medical_history'); ?></strong>
                            </h1>
                            <strong><p><?php echo lang('case_history'); ?></p></strong>
                        </div>
                    </section>
                    <?php if ($this->ion_auth->in_group('admin')) { ?>
                    </a>
                <?php } ?>
            </div>
            <div class="col-lg-3 col-sm-6">
                <?php if ($this->ion_auth->in_group('admin')) { ?>
                    <a href="patient/documents">
                    <?php } ?>
                    <section class="panel card-cor-laranja">
                        <div class="symbol yellow">
                            <i class="fa fa-file"></i>
                        </div>
                        <div class="value">
                            <h1 class="">
                                <strong><?php echo $this->db->count_all('patient_material'); ?></strong>
                            </h1>
                            <strong><p><?php echo lang('documents'); ?></p></strong>
                        </div>
                    </section>
                    <?php if ($this->ion_auth->in_group('admin')) { ?>
                    </a>
                <?php } ?>
            </div>
            <div class="col-lg-3 col-sm-6">
                <?php if ($this->ion_auth->in_group('admin')) { ?>
                    <a href="department">
                    <?php } ?>
                    <section class="panel card-cor-aluz">
                        <div class="symbol blue">
                            <i class="fa fa-sitemap"></i>
                        </div>
                        <div class="value">
                            <h1 class="">
                                <strong><?php echo $this->db->count_all('department'); ?></strong>
                            </h1>
                            <strong><p><?php echo lang('departments'); ?></p></strong>
                        </div>
                    </section>
                    <?php if ($this->ion_auth->in_group('admin')) { ?>
                    </a>
                <?php } ?>
            </div>
            
            <div class="col-lg-3 col-sm-6">
                <?php if ($this->ion_auth->in_group('admin')) { ?>
                    <a href="appointment">
                    <?php } ?>
                    <section class="panel card-cor-laranja">
                        <div class="symbol yellow">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <div class="value">
                            <h1 class="">
                                <strong><?php echo $this->db->count_all('appointment'); ?></strong>
                            </h1>
                            <strong><p><?php echo lang('appointment'); ?></p></strong>
                        </div>
                    </section>
                    <?php if ($this->ion_auth->in_group('admin')) { ?>
                    </a>
                <?php } ?>
            </div>
            <div class="col-lg-3 col-sm-6">
                <?php if ($this->ion_auth->in_group('admin')) { ?>
                    <a href="finance/payment">
                    <?php } ?>
                    <section class="panel card-cor-cinza">
                        <div class="symbol grey">
                            <i class="fa fa-money"></i>
                        </div>
                        <div class="value">
                            <h1 class="">
                                <strong><?php echo $this->db->count_all('payment'); ?></strong>
                            </h1>
                            <strong><p><?php echo lang('payment'); ?> <?php echo lang('invoice'); ?></p></strong>
                        </div>
                    </section>
                    <?php if ($this->ion_auth->in_group('admin')) { ?>
                    </a>
                <?php } ?>
            </div>-->
            <!--
            <div class="col-lg-3 col-sm-6">
                <?php if ($this->ion_auth->in_group('admin')) { ?>
                    <a href="report/operation">
                    <?php } ?>
                    <section class="panel card-cor-verde">
                        <div class="symbol terques">
                            <i class="fa  fa-wheelchair"></i>
                        </div>
                        <div class="value">
                            <h1 class="">
                            <strong>
                                <?php
                                echo $this->db
                                        ->where('report_type', 'operation')
                                        ->count_all_results('report');
                                ?></strong>
                            </h1>
                            <strong><p><?php echo lang('operation_report'); ?></p></strong>
                        </div>
                    </section>
                    <?php if ($this->ion_auth->in_group('admin')) { ?>
                    </a>
                <?php } ?>
            </div>
            <div class="col-lg-3 col-sm-6">
                <?php if ($this->ion_auth->in_group('admin')) { ?>
                    <a href="report/birth">
                    <?php } ?>
                    <section class="panel card-cor-aluz">
                        <div class="symbol blue">
                            <i class="fa fa-smile-o"></i>
                        </div>
                        <div class="value">
                            <h1 class="">
                            <strong>
                                <?php
                                echo $this->db
                                        ->where('report_type', 'birth')
                                        ->count_all_results('report');
                                ?>
                            </strong>
                            </h1>
                            <strong><p><?php echo lang('birth_report'); ?></p></strong>
                        </div>
                    </section>
                    <?php if ($this->ion_auth->in_group('admin')) { ?>
                    </a>
                <?php } ?>
            </div>
            <div class="col-lg-3 col-sm-6">
                <?php if ($this->ion_auth->in_group('admin')) { ?>
                    <a href="donor">
                    <?php } ?>
                    <section class="panel card-cor-laranja">
                        <div class="symbol yellow">
                            <i class="fa fa-briefcase"></i>
                        </div>
                        <div class="value">
                            <h1 class="">
                                <strong><?php echo $z = $this->db->count_all('donor'); ?></strong>
                            </h1>
                            <strong><p><?php echo lang('donor'); ?></p></strong>
                        </div>
                    </section>
                    <?php if ($this->ion_auth->in_group('admin')) { ?>
                    </a>
                <?php } ?>
            </div>
            <div class="col-lg-3 col-sm-6">
                <?php if ($this->ion_auth->in_group('admin')) { ?>
                    <a href="bed">
                    <?php } ?>
                    <section class="panel card-cor-verde">
                        <div class="symbol terques">
                            <i class="fa fa-bed"></i>
                        </div>
                        <div class="value">
                            <h1 class=" count13">
                                <strong><?php echo $z = $this->db->count_all('bed'); ?></strong>
                            </h1>
                            <strong><p><?php echo lang('total_bed'); ?></p></strong>
                        </div>
                    </section>
                    <?php if ($this->ion_auth->in_group('admin')) { ?>
                    </a>
                <?php } ?>
            </div>
            <div class="col-lg-3 col-sm-6">
                <?php if ($this->ion_auth->in_group('admin')) { ?>
                    <a href="medicine">
                    <?php } ?>
                    <section class="panel card-cor-aluz">
                        <div class="symbol blue">
                            <i class="fa fa-eyedropper"></i>
                        </div>
                        <div class="value">
                            <h1 class="">
                                <strong><?php echo $this->db->count_all('medicine'); ?></strong>
                            </h1>
                            <strong><p><?php echo lang('medicine'); ?></p></strong>
                        </div>
                    </section>
                    <?php if ($this->ion_auth->in_group('admin')) { ?>
                    </a>
                <?php } ?>
            </div>
            <?php if ($this->ion_auth->in_group('admin')) { ?>
                <div class="col-lg-6 col-sm-6">    
                    <a href="finance/payment">
                        <section class="panel card-cor-cinza">
                            <div class="symbol grey">
                                <i class="fa fa-bar-chart-o"></i>
                            </div>
                            <div class="value">
                                <h1 class=" count14">
                                    <strong><?php echo $settings->currency; ?> <?php echo number_format($sum[0]->gross_total, 2); ?></strong>
                                </h1>
                                <strong><p><?php echo lang('total_payment'); ?></p></strong>
                            </div>
                        </section>         
                    </a>     
                </div>-->
            <?php } ?>
            
        </div>
<?php } ?>
        <aside class="calendar_ui">
            <section class="">
                <div class="">
                    <div id="calendar" class="has-toolbar calendar_view"></div>
                </div>
            </section>
        </aside>

        <style>

            table{
                box-shadow: none;
            }

            .fc-head{

                box-shadow: 0 2px 5px 0 rgba(0, 0, 0, .16), 0 2px 10px 0 rgba(0, 0, 0, .12);

            }

            .panel-body{
                background: #fff;
            }

            thead{
                background: #fff;
            }

            .panel-body {
                background: #fff;
            }

        </style>


        <!--state overview end-->
    </section>
</section>
<!--main content end-->
<!--footer start-->
<!--footer end-->
</section>

<!-- js placed at the end of the document so the pages load faster -->

<script src="common/js/jquery.sparkline.js" type="text/javascript"></script>
<script src="common/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
<script src="common/js/owl.carousel.js" ></script>
<script src="common/js/jquery.customSelect.min.js" ></script>
<script src="common/js/respond.min.js" ></script>

<!--common script for all pages-->
<script src="common/js/common-scripts.js"></script>

<!--script for this page-->
<script src="common/js/sparkline-chart.js"></script>
<script src="common/js/easy-pie-chart.js"></script>
<script src="common/js/count.js"></script>

<script>

    //owl carousel

    $(document).ready(function () {
        $("#owl-demo").owlCarousel({
            navigation: true,
            slideSpeed: 300,
            paginationSpeed: 400,
            singleItem: true,
            autoPlay: true

        });
    });

    //custom select box

    $(function () {
        $('select.styled').customSelect();
    });

</script>

</body>
</html>
