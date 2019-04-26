<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading no-print">
              <i class="fa fa-money"></i>   <?php  echo lang('treatment_history'); ?>
          </header>
          <div class="space15"></div>
          <div class="">
            <div class="col-md-12 panel-body">
                <section>
                    <form role="form" class="f_report" action="appointment/treatmentReport" method="post" enctype="multipart/form-data">
                        <div class="form-group no-print">

                            <!--     <label class="control-label col-md-3">Date Range</label> -->
                            <div class="col-md-4">
                                <div id="formulario-data-inicio-final" class="input-group input-large" data-date="31/12/2018" data-date-format="dd/mm/yyyy">
                                    <span class="input-group-addon">Início</span>
                                    <input type="text" class="form-control dpd1" name="date_from" value="<?php
                                    if (!empty($from)) {
                                        echo $from;
                                    }
                                    ?>" placeholder=" <?php  echo lang('date_from'); ?>">
                                    <span class="input-group-addon">Fim</span>
                                    <input type="text" class="form-control dpd2" name="date_to" value="<?php
                                    if (!empty($to)) {
                                        echo $to;
                                    }
                                    ?>" placeholder=" <?php  echo lang('date_to'); ?>">
                                </div>
                                <div class="row"></div>
                                <span class="help-block"></span> 
                            </div>
                            <div class="col-md-4">
                                <button type="submit" name="submit" class="btn btn-info range_submit"> Filtrar data</button>
                            </div>
                            <div class="col-md-4">
                                <select class="light-table-filter form-control" id="inputGroupSuccess2" aria-describedby="inputGroupSuccess2Status" data-table="order-table" name="doctor">  
                                    <option value="">Selecionar o médico .....</option>
                                    <?php foreach ($doctors as $doctor) { ?>
                                    <option value="<?php echo $doctor->id; ?>"<?php
                                    if (!empty($payment->doctor)) {
                                        if ($payment->doctor == $doctor->id) {
                                            echo 'selected';
                                        }
                                    }
                                    ?>><?php echo $doctor->name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                    </form>
                </section>
            </div>
        </div>



        <div class="panel-body">
            <div class="adv-table editable-table ">
                <div class="clearfix">
                    <button class="export" onclick="javascript:window.print();">Print</button>     
                </div>
                <div class="space15">
                    <?php
                    if (!empty($from) && !empty($to)) {
                        echo "Início $from Fim $to";
                    }
                    ?> 
                </div>
                <div class="container">

                  <ul class="nav nav-tabs col-md-11 no-print">
                    <li class="active"><a data-toggle="tab" href="#home">Atendidos</a></li>
                    <li><a data-toggle="tab" href="#menu1">Confirmados</a></li>
                    <li><a data-toggle="tab" href="#menu2">Agendados</a></li>
                    <li><a data-toggle="tab" href="#menu3">Cancelados</a></li>
                    <li><a data-toggle="tab" href="#menu4">Geral</a></li>
                    <button type="submit" name="submit" class="btn btn-info btn-xs btn_width no-print" onclick="javascript:window.print();" style="float: right;">Imprimir</button>
                </ul>

                <div class="tab-content">
                    <div id="home" class="tab-pane fade in active col-md-11">
                      <h3>Histórico de Atendidos Sintético</h3>
                      
                      <table class="table table-striped table-hover table-bordered order-table">
                        <thead>
                            <tr>
                                <th> <?php  echo lang('doctor_id'); ?></th>
                                <th> <?php  echo lang('doctor'); ?></th>
                                <th> Atendidos <i class="fa fa-check" style="font-size:18px;color:#36d227;float: right;"></i></th>
                                <th class="no-print"> Opções</th>
                            </tr>
                        </thead>
                        <tbody>

                            <style>

                            .img_url{
                                height:20px;
                                width:20px;
                                background-size: contain; 
                                max-height:20px;
                                border-radius: 100px;
                            }
                            .option_th{
                                width:18%;
                            }

                        </style>

                        <?php foreach ($doctors as $doctor) { ?>

                        <tr class="">
                            <td><?php echo $doctor->id; ?></td>
                            <td><?php echo $doctor->name; ?></td>

                            <td>
                                <?php
                                foreach ($appointments as $appointmentAntedido) {
                                    if ($appointmentAntedido->doctor == $doctor->id && $appointmentAntedido->status_appointment == "ATENDIDO") {
                                         //   if ($payment->status == 'paid'|| $payment->status == 'paid-last') {
                                        $appointment_numberAntedido[] = 1;
                                         //   }
                                    }
                                }
                                if (!empty($appointment_numberAntedido)) {
                                    $appointment_totalAntedido = array_sum($appointment_numberAntedido);
                                    echo $appointment_totalAntedido;
                                } else {
                                    $appointment_totalAntedido = 0;
                                    echo $appointment_totalAntedido;
                                }
                                ?>
                                <?php $appointment_numberAntedido = NULL; ?>
                                <?php $appointment_totalAntedido = NULL; ?>
                            </td>

                            <td class="no-print"> <a class="btn btn-info btn-xs btn_width add_payment_button" style="width: 100px;" href="appointment/getAppointmentByDoctorIdAtendidos?id=<?php echo $doctor->id; ?>"><i class="fa fa-money"></i>  <?php  echo lang('details'); ?></a></td>
                            
                            
                        </tr>
                        
                        <?php } ?>



                    </tbody>
                </table>

            </div>
            <div id="menu1" class="tab-pane fade col-md-11">
              <h3>Histórico de Confirmados Sintético</h3>
              
              <table class="table table-striped table-hover table-bordered order-table" id="editable-sample">
                <thead>
                    <tr>
                        <th> <?php  echo lang('doctor_id'); ?></th>
                        <th> <?php  echo lang('doctor'); ?></th>
                        <th> Confirmados <i class="fa fa-thumbs-up" style="font-size:18px;color:#0288d1;float: right;"></i></th>
                        <th class="no-print"> Opções</th>
                    </tr>
                </thead>
                <tbody>

                    <style>

                    .img_url{
                        height:20px;
                        width:20px;
                        background-size: contain; 
                        max-height:20px;
                        border-radius: 100px;
                    }
                    .option_th{
                        width:18%;
                    }

                </style>

                <?php foreach ($doctors as $doctor) { ?>

                <tr class="">
                    <td><?php echo $doctor->id; ?></td>
                    <td><?php echo $doctor->name; ?></td>

                    <td>
                        <?php
                        foreach ($appointments as $appointmentAntedido) {
                            if ($appointmentAntedido->doctor == $doctor->id && $appointmentAntedido->status_appointment == "CONFIRMADO") {
                                         //   if ($payment->status == 'paid'|| $payment->status == 'paid-last') {
                                $appointment_numberAntedido[] = 1;
                                         //   }
                            }
                        }
                        if (!empty($appointment_numberAntedido)) {
                            $appointment_totalAntedido = array_sum($appointment_numberAntedido);
                            echo $appointment_totalAntedido;
                        } else {
                            $appointment_totalAntedido = 0;
                            echo $appointment_totalAntedido;
                        }
                        ?>
                        <?php $appointment_numberAntedido = NULL; ?>
                        <?php $appointment_totalAntedido = NULL; ?>
                    </td>

                    <td class="no-print"> <a class="btn btn-info btn-xs btn_width add_payment_button" style="width: 100px;" href="appointment/getAppointmentByDoctorIdConfirmados?id=<?php echo $doctor->id; ?>"><i class="fa fa-money"></i>  <?php  echo lang('details'); ?></a></td>
                    
                    
                </tr>
                
                <?php } ?>



            </tbody>
        </table>

    </div>
    <div id="menu2" class="tab-pane fade col-md-11">
      <h3>Histórico de Agendados Sintético</h3>
      
      <table class="table table-striped table-hover table-bordered order-table" id="editable-sample">
        <thead>
            <tr>
                <th> <?php  echo lang('doctor_id'); ?></th>
                <th> <?php  echo lang('doctor'); ?></th>
                <th> Agendados <i class="fa fa-warning" style="font-size:18px;color:#d1ae02;float: right;"></i></th>
                <th class="no-print"> Opções</th>
            </tr>
        </thead>
        <tbody>

            <style>

            .img_url{
                height:20px;
                width:20px;
                background-size: contain; 
                max-height:20px;
                border-radius: 100px;
            }
            .option_th{
                width:18%;
            }

        </style>

        <?php foreach ($doctors as $doctor) { ?>

        <tr class="">
            <td><?php echo $doctor->id; ?></td>
            <td><?php echo $doctor->name; ?></td>

            <td>
                <?php
                foreach ($appointments as $appointmentAntedido) {
                    if ($appointmentAntedido->doctor == $doctor->id && $appointmentAntedido->status_appointment == "AGENDADO") {
                                         //   if ($payment->status == 'paid'|| $payment->status == 'paid-last') {
                        $appointment_numberAntedido[] = 1;
                                         //   }
                    }
                }
                if (!empty($appointment_numberAntedido)) {
                    $appointment_totalAntedido = array_sum($appointment_numberAntedido);
                    echo $appointment_totalAntedido;
                } else {
                    $appointment_totalAntedido = 0;
                    echo $appointment_totalAntedido;
                }
                ?>
                <?php $appointment_numberAntedido = NULL; ?>
                <?php $appointment_totalAntedido = NULL; ?>
            </td>

            <td class="no-print"> <a class="btn btn-info btn-xs btn_width add_payment_button" style="width: 100px;" href="appointment/getAppointmentByDoctorIdAgendados?id=<?php echo $doctor->id; ?>"><i class="fa fa-money"></i>  <?php  echo lang('details'); ?></a></td>
            
            
        </tr>
        
        <?php } ?>



    </tbody>
</table>

</div>
<div id="menu3" class="tab-pane fade col-md-11">
  <h3>Histórico de Cancelados Sintético</h3>
  
  <table class="table table-striped table-hover table-bordered order-table" id="editable-sample">
    <thead>
        <tr>
            <th> <?php  echo lang('doctor_id'); ?></th>
            <th> <?php  echo lang('doctor'); ?></th>
            <th> Cancelados <i class="fa fa-ban" style="font-size:18px;color:red;float: right;"></i></th>
            <th class="no-print"> Opções</th>
        </tr>
    </thead>
    <tbody>

        <style>

        .img_url{
            height:20px;
            width:20px;
            background-size: contain; 
            max-height:20px;
            border-radius: 100px;
        }
        .option_th{
            width:18%;
        }

    </style>

    <?php foreach ($doctors as $doctor) { ?>

    <tr class="">
        <td><?php echo $doctor->id; ?></td>
        <td><?php echo $doctor->name; ?></td>

        <td>
            <?php
            foreach ($appointments as $appointmentAntedido) {
                if ($appointmentAntedido->doctor == $doctor->id && $appointmentAntedido->status_appointment == "CANCELADO") {
                                         //   if ($payment->status == 'paid'|| $payment->status == 'paid-last') {
                    $appointment_numberAntedido[] = 1;
                                         //   }
                }
            }
            if (!empty($appointment_numberAntedido)) {
                $appointment_totalAntedido = array_sum($appointment_numberAntedido);
                echo $appointment_totalAntedido;
            } else {
                $appointment_totalAntedido = 0;
                echo $appointment_totalAntedido;
            }
            ?>
            <?php $appointment_numberAntedido = NULL; ?>
            <?php $appointment_totalAntedido = NULL; ?>
        </td>

        <td class="no-print"> <a class="btn btn-info btn-xs btn_width add_payment_button" style="width: 100px;" href="appointment/getAppointmentByDoctorIdCancelados?id=<?php echo $doctor->id; ?>"><i class="fa fa-money"></i>  <?php  echo lang('details'); ?></a></td>
        
        
    </tr>
    
    <?php } ?>



</tbody>
</table>

</div>
<div id="menu4" class="tab-pane fade col-md-11">
  <h3>Histórico Geral Sintético</h3>
  
  <table class="table table-striped table-hover table-bordered order-table" id="editable-sample">
    <thead>
        <tr>
            <th> <?php  echo lang('doctor_id'); ?></th>
            <th> <?php  echo lang('doctor'); ?></th>
            <th> Atendidos <i class="fa fa-check" style="font-size:18px;color:#36d227;float: right;"></i></th>
            <th> Confirmados <i class="fa fa-thumbs-up" style="font-size:18px;color:#0288d1;float: right;"></i></th>
            <th> Agendados <i class="fa fa-warning" style="font-size:18px;color:#d1ae02;float: right;"></i></th>
            <th> Cancelados <i class="fa fa-ban" style="font-size:18px;color:red;float: right;"></i></th>
            <th> Total</th>
            <th class="no-print"> Opções </th>
        </tr>
    </thead>
    <tbody>

        <style>

        .img_url{
            height:20px;
            width:20px;
            background-size: contain; 
            max-height:20px;
            border-radius: 100px;
        }
        .option_th{
            width:18%;
        }

    </style>

    <?php foreach ($doctors as $doctor) { ?>

    <tr class="">
        <td><?php echo $doctor->id; ?></td>
        <td><?php echo $doctor->name; ?></td>

        <td>
            <?php
            foreach ($appointments as $appointmentAntedido) {
                if ($appointmentAntedido->doctor == $doctor->id && $appointmentAntedido->status_appointment == "ATENDIDO") {
                                         //   if ($payment->status == 'paid'|| $payment->status == 'paid-last') {
                    $appointment_numberAntedido[] = 1;
                                         //   }
                }
            }
            if (!empty($appointment_numberAntedido)) {
                $appointment_totalAntedido = array_sum($appointment_numberAntedido);
                echo $appointment_totalAntedido;
            } else {
                $appointment_totalAntedido = 0;
                echo $appointment_totalAntedido;
            }
            ?>
            <?php $appointment_numberAntedido = NULL; ?>
            <?php $appointment_totalAntedido = NULL; ?>
        </td>

        <td>
            <?php
            foreach ($appointments as $appointmentAntedido) {
                if ($appointmentAntedido->doctor == $doctor->id && $appointmentAntedido->status_appointment == "CONFIRMADO") {
                                         //   if ($payment->status == 'paid'|| $payment->status == 'paid-last') {
                    $appointment_numberAntedido[] = 1;
                                         //   }
                }
            }
            if (!empty($appointment_numberAntedido)) {
                $appointment_totalAntedido = array_sum($appointment_numberAntedido);
                echo $appointment_totalAntedido;
            } else {
                $appointment_totalAntedido = 0;
                echo $appointment_totalAntedido;
            }
            ?>
            <?php $appointment_numberAntedido = NULL; ?>
            <?php $appointment_totalAntedido = NULL; ?>
        </td>

        <td>
            <?php
            foreach ($appointments as $appointmentAntedido) {
                if ($appointmentAntedido->doctor == $doctor->id && $appointmentAntedido->status_appointment == "AGENDADO") {
                                         //   if ($payment->status == 'paid'|| $payment->status == 'paid-last') {
                    $appointment_numberAntedido[] = 1;
                                         //   }
                }
            }
            if (!empty($appointment_numberAntedido)) {
                $appointment_totalAntedido = array_sum($appointment_numberAntedido);
                echo $appointment_totalAntedido;
            } else {
                $appointment_totalAntedido = 0;
                echo $appointment_totalAntedido;
            }
            ?>
            <?php $appointment_numberAntedido = NULL; ?>
            <?php $appointment_totalAntedido = NULL; ?>
        </td>

        <td>
            <?php
            foreach ($appointments as $appointmentAntedido) {
                if ($appointmentAntedido->doctor == $doctor->id && $appointmentAntedido->status_appointment == "CANCELADO") {
                                         //   if ($payment->status == 'paid'|| $payment->status == 'paid-last') {
                    $appointment_numberAntedido[] = 1;
                                         //   }
                }
            }
            if (!empty($appointment_numberAntedido)) {
                $appointment_totalAntedido = array_sum($appointment_numberAntedido);
                echo $appointment_totalAntedido;
            } else {
                $appointment_totalAntedido = 0;
                echo $appointment_totalAntedido;
            }
            ?>
            <?php $appointment_numberAntedido = NULL; ?>
            <?php $appointment_totalAntedido = NULL; ?>
        </td>

        <td>
            <?php
            foreach ($appointments as $appointment) {
                if ($appointment->doctor == $doctor->id) {
                                         //   if ($payment->status == 'paid'|| $payment->status == 'paid-last') {
                    $appointment_number[] = 1;
                                         //   }
                }
            }
            if (!empty($appointment_number)) {
                $appointment_total = array_sum($appointment_number);
                echo $appointment_total;
            } else {
                $appointment_total = 0;
                echo $appointment_total;
            }
            ?>
            <?php $appointment_number = NULL; ?>
            <?php $appointment_total = NULL; ?>
        </td>
        <td class="no-print"> <a class="btn btn-info btn-xs btn_width add_payment_button" style="width: 100px;" href="appointment/getAppointmentByDoctorId?id=<?php echo $doctor->id; ?>"><i class="fa fa-money"></i>  <?php  echo lang('details'); ?></a></td>
        
        
    </tr>
    
    <?php } ?>



</tbody>
</table>

</div>
</div>
</div>   


</div>
</div>
</section>
<!-- page end-->
</section>
</section>
<!--main content end-->
<!--footer start-->
<script>
    (function(document) {
        'use strict';

        var LightTableFilter = (function(Arr) {

            var _input;

            function _onInputEvent(e) {
                _input = e.target;
                var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
                Arr.forEach.call(tables, function(table) {
                    Arr.forEach.call(table.tBodies, function(tbody) {
                        Arr.forEach.call(tbody.rows, _filter);
                    });
                });
            }

            function _filter(row) {
                var text = row.textContent.toLowerCase(), val = _input.value.toLowerCase();
                row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
            }

            return {
                init: function() {
                    var inputs = document.getElementsByClassName('light-table-filter');
                    Arr.forEach.call(inputs, function(input) {
                        input.oninput = _onInputEvent;
                    });
                }
            };
        })(Array.prototype);

        document.addEventListener('readystatechange', function() {
            if (document.readyState === 'complete') {
                LightTableFilter.init();
            }
        });

    })(document);


    function mascara(t, mask){
     var i = t.value.length;
     var saida = mask.substring(1,0);
     var texto = mask.substring(i)
     if (texto.substring(0,1) != saida){
         t.value += texto.substring(0,1);
     }
 }
</script>