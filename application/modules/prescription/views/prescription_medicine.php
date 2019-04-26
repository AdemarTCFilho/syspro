<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- invoice start-->
        <section>
            <header class="panel-heading no-print">
             <a class="btn btn-primary" href="JavaScript: window.history.back();"><i class="fa fa-mail-reply"> </i> Voltar</a>   <i class="fa fa-book"></i>  Receituário Médico
            </header>

            
            <div class="panel-body-rec col-md-5 panel-primary">
                <!--<div class="panel-heading navyblue"> INVOICE</div>-->
                <div class="">
                    <div class="invoice-list">
                        
                        <style type="text/css" media="print">
    @page 
    {
        size: auto;   /* auto is the initial value */
        margin: 0mm;  /* this affects the margin in the printer settings */
    }
</style>

                        <style>

                            .panel-body-rec {
                                padding: 15px;
                                background: #fff;
                                margin-left: 5%;
                            }

                            table{
                                box-shadow: none;
                            }

                            .table thead > tr > th, .table tbody > tr > th, .table tfoot > tr > th, .table thead > tr > td, .table tbody > tr > td, .table tfoot > tr > td {
                                padding: 10px;
                                height: 100px;
                            }

                        </style>

                        <?php $patient = $this->patient_model->getPatientById($prescription->patient); ?>



                        <?php $doctor = $this->doctor_model->getDoctorById($prescription->doctor); ?>
                        <img alt="" src="uploads/img_login.png" width="100" height="70">
                        <div class="text-center">           
                            <h4><strong>Receituário</strong></h4>
                        </div>
                        <hr>
                        <div class="col-lg-6 col-sm-6" style="float: left;">
                            <p>
                                <?php
                                echo lang('name'). ': '; echo $patient->name . ' <br>';
                                //echo lang('age'). ': '; echo $patient->age . '<br>';
                                //echo lang('phone'). ': '; echo $patient->phone . '<br>';
                                //echo 'Cartão Nacional de Saúde'. ': '; echo $patient->sus . '<br>';
                                 
                                ?>
                            </p>
                        </div>
                        <div class="col-lg-2 col-sm-2" style="float: left;">
                        </div>
                        <!--<div class="col-lg-4 col-sm-4" style="float: left;">
                            <h4><?php echo lang('doctor'); ?>:</h4>
                            <p>
                                <?php
                                echo $doctor->name . ' <br>';
                                echo $doctor->profile . '  <br/>';
                                echo $doctor->phone;
                                ?>
                            </p>
                        </div>-->
                        <div class="col-lg-4 col-sm-4" style="float: left;">
                            
                            <ul class="unstyled">
                                <li>Cód. Histórico      : <strong>000<?php echo $prescription->id; ?></strong></li>
                                <li></li>
                            </ul>
                        </div>

                    </div>

                    <table class="table table-striped table-hover">

                        <tbody>
                            <tr>
                                <td class=""><p><?php echo $prescription->receita; ?></p> </td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="text-center invoice-btn no-print">
                        <a class="btn btn-info btn-lg invoice_button" onclick="javascript:window.print();"><i class="fa fa-print"></i> <?php echo lang('print'); ?> </a>
                    </div>
                </div>
            </div>
        </section>
        <!-- invoice end-->
    </section>
</section>
<footer>
    <div class="text-center">
        <p>Garanhuns      <?php echo date('d/m/Y', $prescription->date); ?></p>
        <p style="text-transform: uppercase;"><?php echo $doctor->name . ' - CRM - ';?><?php echo $doctor->crm . ' - ';?><?php echo $doctor->profile;?></p>
    </div>
</footer>
<!--main content end-->
<!--footer start-->

