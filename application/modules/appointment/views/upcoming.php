
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                <i class="fa fa-user"></i>  <?php echo lang('upcoming'); ?>
            </header>
            <div class="panel-body">
                <div class="adv-table editable-table ">
                    <div class="clearfix">
                        <!--<a data-toggle="modal" href="#myModal">
                            <div class="btn-group">
                                <button id="" class="btn green">
                                    <i class="fa fa-plus-circle"></i>   <?php echo lang('add_appointment'); ?> 
                                </button>
                            </div>
                        </a>-->
                        <button class="export" onclick="javascript:window.print();">Print</button>  
                    </div>
                    <form class="form-horizontal">
                      <div class="rows form-group has-success has-feedback">                       
                        <div class="col-sm-2">
                            <?php if ($this->ion_auth->in_group(array('admin', 'Laboratorist', 'Receptionist'))) { ?>
                            <a data-toggle="modal" href="#myModal">
                                <button id="" class="btn green" style="display: none;">
                                    <i class="fa fa-plus-circle"></i>   Adicionar agend. 
                                </button>
                            </a>
                            <?php } ?>
                        </div>
                        <div class="col-sm-2">
                            <a href="appointment/todays" class="btn card-cor-laranja"><i class="fa fa-list-alt"></i> <?php echo lang('todays'); ?></a>
                        </div>
                        <div class="col-sm-2">
                            <a href="appointment" class="btn card-cor-verde"><i class="fa fa-list-alt"></i> <?php echo lang('all'); ?></a>
                        </div>
                        <div class="col-sm-2">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i> </span>
                            <input type="text" class="light-table-filter form-control" id="inputGroupSuccess2" aria-describedby="inputGroupSuccess2Status" data-table="order-table">
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i> Data</span>
                            <input type="date" class="light-table-filter form-control" data-table="order-table" placeholder="Filtrer" />
                        </div>
                    </div>
                </div>
            </form>
            <div class="space15"></div>
            <table class="table table-striped table-hover table-bordered order-table">
                <thead>
                    <tr>
                        <th> Cód.</th>
                        <th> <?php echo lang('patient'); ?></th>
                        <?php if ($this->ion_auth->in_group(array('admin', 'Laboratorist', 'Receptionist'))) { ?>
                        <th> <?php echo lang('doctor'); ?></th>
                        <?php } ?>
                        <th> <?php echo lang('date-time'); ?></th>
                        <th> <?php echo lang('remarks'); ?></th>
                        <th> <?php echo lang('status_appointment'); ?></th>
                        <?php if ($this->ion_auth->in_group(array('admin', 'Laboratorist'))) { ?>
                        <th> <?php echo lang('options'); ?></th>
                        <?php } ?>
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

                </style>

                <?php
                foreach ($appointments as $appointment) {
                    if ($appointment->date > strtotime(date('Y-m-d'))) {
                        ?>
                        <!--verificar se tem algum agendamento sem paciente e exclui.-->
                        <?php if(!empty($this->db->get_where('patient', array('id' => $appointment->patient))->row()->name)) { ?>
                        <tr class="">
                            <td style="width: 5%;"><?php echo $appointment->id; ?></td>
                            <td>
                                <a class="historico-padding" href="patient/medicalHistory?id=<?php echo $this->db->get_where('patient', array('id' => $appointment->patient))->row()->id; ?>">
                                    <strong><?php echo $this->db->get_where('patient', array('id' => $appointment->patient))->row()->name; ?></strong><small style="font-size: 0.1px;"><?php echo date('Y-m-d', $appointment->date); ?></small>
                                </a>
                            </td>
                            <?php if ($this->ion_auth->in_group(array('admin', 'Laboratorist', 'Receptionist'))) { ?>
                            <td><?php
                            if (!empty($appointment->doctor)) {
                                echo $this->db->get_where('doctor', array('id' => $appointment->doctor))->row()->name;
                            }?> 
                        </td>
                        <?php } ?> 
                        <td class="center" style="width: 25%;">
                            <a class="historico-padding" href="patient/medicalHistory?id=<?php echo $this->db->get_where('patient', array('id' => $appointment->patient))->row()->id; ?>">
                                <strong><?php echo date('d/m/Y', $appointment->date); ?> </strong> : <?php echo $appointment->s_time; ?> - <?php echo $appointment->e_time; ?> 
                            </a>
                        </td>
                        <td>
                            <a class="historico-padding" href="patient/medicalHistory?id=<?php echo $this->db->get_where('patient', array('id' => $appointment->patient))->row()->id; ?>">
                                <strong><?php echo $appointment->remarks; ?></strong>
                            </a>
                        </td>
                        <td style="width: 15%;">
                            <a class="historico-padding" href="patient/medicalHistory?id=<?php echo $this->db->get_where('patient', array('id' => $appointment->patient))->row()->id; ?>">
                                <strong><?php echo $appointment->status_appointment; ?></strong>
                            </a>
                            <?php if ($appointment->status_appointment == "AGENDADO") { ?>
                            <button type="button" class="editbutton2 btn btn-xs" data-toggle="modal" data-id="<?php echo $appointment->id; ?>" style="float: right;"><i class="fa fa-warning" style="font-size:18px;color:#d1ae02;float: right;"></i></button>
                            <?php } ?>
                            <?php if ($appointment->status_appointment == "CONFIRMADO") { ?>
                            <button type="button" class="editbutton2 btn btn-xs" data-toggle="modal" data-id="<?php echo $appointment->id; ?>" style="float: right;"><i class="fa fa-thumbs-up" style="font-size:18px;color:#0288d1;float: right;"></i></button>
                            <?php } ?>
                            <?php if ($appointment->status_appointment == "ATENDIDO") { ?>
                            <i class="fa fa-check" style="font-size:18px;color:#36d227;float: right;"></i>
                            <?php } ?>
                            <?php if ($appointment->status_appointment == "CANCELADO") { ?>
                            <i class="fa fa-ban" style="font-size:18px;color:red;float: right;"></i>
                            <?php } ?>
                        </td>
                        <?php if ($this->ion_auth->in_group(array('admin', 'Laboratorist'))) { ?>
                        <td>  
                            <a class="btn green btn-xs" href="patient/medicalHistory?id=<?php echo $this->db->get_where('patient', array('id' => $appointment->patient))->row()->id; ?>"><i class="fa fa-book"> </i> Histórico</a>
                            <?php } ?>
                            <?php if ($this->ion_auth->in_group(array('admin', 'Laboratorist'))) { ?>
                            <button type="button" class="btn btn-info btn-xs btn_width editbutton" data-toggle="    modal" data-id="<?php echo $appointment->id; ?>"><i class="fa fa-edit"> <?php echo lang('edit'); ?></i></button>                       
                            <a class="btn btn-info btn-xs btn_width delete_button" href="appointment/delete?id=<?php echo $appointment->id; ?>" <?php echo lang('delete'); ?> onclick="return confirm('Tem certeza de que deseja excluir este item?');"><i class="fa fa-trash-o"> </i></a>                                   
                        </td>
                        <?php } ?>
                    </tr>
                    <?php } ?>
                    <?php
                }
            }
            ?>




        </tbody>
    </table>
</div>
</div>
</section>
<!-- page end-->
</section>
</section>
<!--main content end-->
<!--footer start-->



<!-- Add Appointment Modal-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><i class="fa fa-plus-circle"></i>  <?php echo lang('add_appointment'); ?></h4>
            </div>
            <div class="modal-body">
                <form role="form" action="appointment/addNew" method="post" enctype="multipart/form-data">
                    <div class="col-md-12 panel">
                        <div class="col-md-3 payment_label"> 
                            <label for="exampleInputEmail1"> <?php echo lang('patient'); ?></label>
                        </div>
                        <div class="col-md-9"> 
                            <select class="form-control m-bot15 js-example-basic-single pos_select" id="pos_select" name="patient" value=''> 
                                <option value="">Selecionar .....</option>
                                <!--<option value="add_new" style="color: #41cac0 !important;"><?php echo lang('add_new'); ?></option>-->
                                <?php foreach ($patients as $patient) { ?>
                                <option value="<?php echo $patient->id; ?>" <?php
                                if (!empty($payment->patient)) {
                                    if ($payment->patient == $patient->id) {
                                        echo 'selected';
                                    }
                                }
                                ?> ><?php echo $patient->name; ?> </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="pos_client clearfix">
                        <div class="col-md-8 payment pad_bot pull-right">
                            <div class="col-md-3 payment_label"> 
                                <label for="exampleInputEmail1"> <?php echo lang('patient'); ?> <?php echo lang('name'); ?></label>
                            </div>
                            <div class="col-md-9"> 
                                <input type="text" class="form-control pay_in" name="p_name" value='<?php
                                if (!empty($payment->p_name)) {
                                    echo $payment->p_name;
                                }
                                ?>' placeholder="">
                            </div>
                        </div>
                        <div class="col-md-8 payment pad_bot pull-right">
                            <div class="col-md-3 payment_label"> 
                                <label for="exampleInputEmail1"> <?php echo lang('patient'); ?> <?php echo lang('email'); ?></label>
                            </div>
                            <div class="col-md-9"> 
                                <input type="text" class="form-control pay_in" name="p_email" value='<?php
                                if (!empty($payment->p_email)) {
                                    echo $payment->p_email;
                                }
                                ?>' placeholder="">
                            </div>
                        </div>
                        <div class="col-md-8 payment pad_bot pull-right">
                            <div class="col-md-3 payment_label"> 
                                <label for="exampleInputEmail1"> <?php echo lang('patient'); ?> <?php echo lang('phone'); ?></label>
                            </div>
                            <div class="col-md-9"> 
                                <input type="text" class="form-control pay_in" name="p_phone" value='<?php
                                if (!empty($payment->p_phone)) {
                                    echo $payment->p_phone;
                                }
                                ?>' placeholder="">
                            </div>
                        </div>
                        <div class="col-md-8 payment pad_bot pull-right">
                            <div class="col-md-3 payment_label"> 
                                <label for="exampleInputEmail1"> <?php echo lang('patient'); ?> <?php echo lang('age'); ?></label>
                            </div>
                            <div class="col-md-9"> 
                                <input type="text" class="form-control pay_in" name="p_age" value='<?php
                                if (!empty($payment->p_age)) {
                                    echo $payment->p_age;
                                }
                                ?>' placeholder="">
                            </div>
                        </div> 
                        <div class="col-md-8 payment pad_bot pull-right">
                            <div class="col-md-3 payment_label"> 
                                <label for="exampleInputEmail1"> <?php echo lang('patient'); ?> <?php echo lang('gender'); ?></label>
                            </div>
                            <div class="col-md-9"> 
                                <select class="form-control m-bot15" name="p_gender" value=''>

                                    <option value="Masculino" <?php
                                    if (!empty($patient->sex)) {
                                        if ($patient->sex == 'Masculino') {
                                            echo 'selected';
                                        }
                                    }
                                    ?> > Masculino </option>
                                    <option value="Feminino" <?php
                                    if (!empty($patient->sex)) {
                                        if ($patient->sex == 'Feminino') {
                                            echo 'selected';
                                        }
                                    }
                                    ?> > Feminino </option>
                                    <option value="Outros" <?php
                                    if (!empty($patient->sex)) {
                                        if ($patient->sex == 'Outros') {
                                            echo 'selected';
                                        }
                                    }
                                    ?> > Outros </option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 panel">
                        <div class="col-md-3 payment_label"> 
                            <label for="exampleInputEmail1">  <?php echo lang('doctor'); ?></label>
                        </div>
                        <div class="col-md-9"> 
                            <select class="form-control m-bot15 js-example-basic-single" name="doctor" value=''>  
                                <option value="">Selecionar .....</option>
                                <?php foreach ($doctors as $doctor) { ?>
                                <option value="<?php echo $doctor->id; ?>"<?php
                                if (!empty($payment->doctor)) {
                                    if ($payment->doctor == $doctor->id) {
                                        echo 'selected';
                                    }
                                }
                                ?>><?php echo $doctor->name; ?> </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>


                    <div class="col-md-12 panel">
                        <div class="col-md-3 payment_label"> 
                            <label for="exampleInputEmail1"> <?php echo lang('date'); ?></label>
                        </div>
                        <div class="col-md-9"> 
                            <input type="text" class="form-control default-date-picker" readonly="" name="date" id="exampleInputEmail1" value='' placeholder="">
                        </div>
                    </div>




                    <div class="col-md-12 panel">
                        <div class="col-md-3 payment_label"> 
                            <label for="exampleInputEmail1"> <?php echo lang('start_time'); ?></label>
                        </div>
                        <div class="col-md-4"> 
                            <div class="">
                                <div class="input-group bootstrap-timepicker">
                                    <input type="text" class="form-control timepicker-default" name="s_time" id="exampleInputEmail1" value="" readonly>
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button"><i class="fa fa-clock-o"></i></button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 panel">
                        <div class="col-md-3 payment_label"> 
                            <label for="exampleInputEmail1"> <?php echo lang('end_time'); ?></label>
                        </div>
                        <div class="col-md-4"> 
                            <div class="">
                                <div class="input-group bootstrap-timepicker">
                                    <input type="text" class="form-control timepicker-default" name="e_time" id="exampleInputEmail1" value="" readonly>
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button"><i class="fa fa-clock-o"></i></button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="col-md-12 panel">
                        <div class="col-md-3 payment_label"> 
                            <label for="exampleInputEmail1"> <?php echo lang('remarks'); ?></label>
                        </div>
                        <div class="col-md-9"> 
                            <input type="text" class="form-control" name="remarks" id="exampleInputEmail1" value='<?php
                            if (!empty($appointment->address)) {
                                echo $appointment->address;
                            }
                            ?>' placeholder="">
                        </div>
                    </div>

                    <div class="col-md-12 panel">
                        <label for="exampleInputEmail1"><?php echo lang('status_appointment'); ?></label>
                        <select class="form-control m-bot15" name="status_appointment" value=''>

                            <option value="AGENDADO" <?php
                            if (!empty($appointment->status_appointment)) {
                                if ($appointment->status_appointment == 'AGENDADO') {
                                    echo 'selected';
                                }
                            }
                            ?> > AGENDADO </option>
                            <option value="CONFIRMADO" <?php
                            if (!empty($appointment->status_appointment)) {
                                if ($appointment->status_appointment == 'CONFIRMADO') {
                                    echo 'selected';
                                }
                            }
                            ?> > CONFIRMADO </option>

                            <option value="ATENDIDO" <?php
                            if (!empty($appointment->status_appointment)) {
                                if ($appointment->status_appointment == 'ATENDIDO') {
                                    echo 'selected';
                                }
                            }
                            ?> > ATENDIDO </option>

                            <option value="CANCELADO" <?php
                            if (!empty($appointment->status_appointment)) {
                                if ($appointment->status_appointment == 'CANCELADO') {
                                    echo 'selected';
                                }
                            }
                            ?> > CANCELADO </option>
                        </select>
                    </div>

                    <div class="col-md-12 panel">
                        <div class="col-md-3 payment_label"> 
                        </div>
                        <div class="col-md-9"> 
                            <!--<input type="checkbox" name="sms" value="sms"> <?php echo lang('send_sms') ?><br>-->
                        </div>
                    </div>

                    <input type="hidden" name="id" value=''>
                    <button type="submit" name="submit" class="btn btn-info"> <?php echo lang('submit'); ?></button>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- Add Appointment Modal-->






<!-- Edit Event Modal-->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><i class="fa fa-edit"></i>  <?php echo lang('edit_appointment'); ?></h4>
            </div>
            <div class="modal-body">
                <form role="form" id="editAppointmentForm" action="appointment/addNew" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="col-md-3"> 
                            <label for="exampleInputEmail1"> <?php echo lang('patient'); ?></label>
                        </div>
                        <div class="col-md-9"> 
                            <select class="form-control m-bot15" name="patient" value=''> 
                                <option value="">Selecionar .....</option>
                                <?php foreach ($patients as $patient) { ?>
                                <option value="<?php echo $patient->id; ?>" <?php
                                if (!empty($payment->patient)) {
                                    if ($payment->patient == $patient->id) {
                                        echo 'selected';
                                    }
                                }
                                ?> ><?php echo $patient->name; ?> </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-3"> 
                            <label for="exampleInputEmail1">  <?php echo lang('doctor'); ?></label>
                        </div>
                        <div class="col-md-9"> 
                            <select class="form-control m-bot15" name="doctor" value=''>  
                                <option value="">Selecionar .....</option>
                                <?php foreach ($doctors as $doctor) { ?>
                                <option value="<?php echo $doctor->id; ?>"<?php
                                if (!empty($payment->doctor)) {
                                    if ($payment->doctor == $doctor->id) {
                                        echo 'selected';
                                    }
                                }
                                ?>><?php echo $doctor->name; ?> </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"> <?php echo lang('date'); ?></label>

                        <input type="text" class="form-control default-date-picker" readonly="" name="date" id="exampleInputEmail1" value='' placeholder="">

                    </div>
                    <div class="form-group col-md-12">
                        <label for="exampleInputEmail1"> <?php echo lang('start_time'); ?></label>
                        <div class="col-md-4">
                            <div class="input-group bootstrap-timepicker">
                                <input type="text" class="form-control timepicker-default" name="s_time" id="exampleInputEmail1" value="">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button"><i class="fa fa-clock-o"></i></button>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-12">
                        <label for="exampleInputEmail1"> <?php echo lang('end_time'); ?></label>
                        <div class="col-md-4">
                            <div class="input-group bootstrap-timepicker">
                                <input type="text" class="form-control timepicker-default" name="e_time" id="exampleInputEmail1" value="">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button"><i class="fa fa-clock-o"></i></button>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1"> <?php echo lang('remarks'); ?></label>
                        <input type="text" class="form-control" name="remarks" id="exampleInputEmail1" value='' placeholder="">
                    </div>

                    <div class="col-md-12 panel">
                        <label for="exampleInputEmail1"><?php echo lang('status_appointment'); ?></label>
                        <select class="form-control m-bot15" name="status_appointment" value=''>

                            <option value="AGENDADO" <?php
                            if (!empty($appointment->status_appointment)) {
                                if ($appointment->status_appointment == 'AGENDADO') {
                                    echo 'selected';
                                }
                            }
                            ?> > AGENDADO </option>
                            <option value="CONFIRMADO" <?php
                            if (!empty($appointment->status_appointment)) {
                                if ($appointment->status_appointment == 'CONFIRMADO') {
                                    echo 'selected';
                                }
                            }
                            ?> > CONFIRMADO </option>

                            <option value="ATENDIDO" <?php
                            if (!empty($appointment->status_appointment)) {
                                if ($appointment->status_appointment == 'ATENDIDO') {
                                    echo 'selected';
                                }
                            }
                            ?> > ATENDIDO </option>

                            <option value="CANCELADO" <?php
                            if (!empty($appointment->status_appointment)) {
                                if ($appointment->status_appointment == 'CANCELADO') {
                                    echo 'selected';
                                }
                            }
                            ?> > CANCELADO </option>
                        </select>
                    </div>


                    <input type="hidden" name="id" value=''>


                    <button type="submit" name="submit" class="btn btn-info"> <?php echo lang('submit'); ?></button>
                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- Edit Event Modal-->

<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><i class="fa fa-location-arrow"></i> <?php echo lang('send_sms_to_patient'); ?></h4>
            </div>
            <div class="modal-body">
                <form role="form" id="sendSmsToVolunteer" action="sms/appointmentReminder" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <p><?php echo lang('reminder_message'); ?></p>
                    </div>
                    <input type="hidden" id="id" value="" name="id">
                    <button type="submit" name="submit" class="btn btn-info submit_button"><?php echo lang('yes'); ?></button>
                    <button type="submit" name="submit" class="btn btn-info invoicebutton" data-dismiss="modal" aria-hidden="true"><?php echo lang('cancel'); ?></button>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<script src="common/js/codearistos.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $(".editbutton").click(function (e) {
            e.preventDefault(e);
                                            // Get the record's ID via attribute  
                                            var iid = $(this).attr('data-id');
                                            $('#editAppointmentForm').trigger("reset");
                                            $('#myModal2').modal('show');
                                            $.ajax({
                                                url: 'appointment/editAppointmentByJason?id=' + iid,
                                                method: 'GET',
                                                data: '',
                                                dataType: 'json',
                                            }).success(function (response) {
                                                var de = response.appointment.date;
                                                var d = new Date(de);
                                                var da = d.getDate() + '-' + (d.getMonth() + 1) + '-' + d.getFullYear();
                                                // Populate the form fields with the data returned from server
                                                $('#editAppointmentForm').find('[name="id"]').val(response.appointment.id).end()
                                                $('#editAppointmentForm').find('[name="patient"]').val(response.appointment.patient).end()
                                                $('#editAppointmentForm').find('[name="doctor"]').val(response.appointment.doctor).end()
                                                $('#editAppointmentForm').find('[name="date"]').val(da).end()
                                                $('#editAppointmentForm').find('[name="s_time"]').val(response.appointment.s_time).end()
                                                $('#editAppointmentForm').find('[name="e_time"]').val(response.appointment.e_time).end()
                                                $('#editAppointmentForm').find('[name="remarks"]').val(response.appointment.remarks).end()
                                            });
                                        });
    });
</script>




<script>
    $(document).ready(function () {
        $('.pos_client').hide();
        $(document.body).on('change', '#pos_select', function () {

            var v = $("select.pos_select option:selected").val()
            if (v == 'add_new') {
                $('.pos_client').show();
            } else {
                $('.pos_client').hide();
            }
        });

    });


</script>



<script type="text/javascript">
    $(document).ready(function () {
        $(".sms").click(function (e) {
            e.preventDefault(e);
            // Get the record's ID via attribute  
            var iid = $(this).attr('data-id');
            $('#myModal4').modal('show');
            $.ajax({
                url: 'appointment/editAppointmentByJason?id=' + iid,
                method: 'GET',
                data: '',
                dataType: 'json',
            }).success(function (response) {
                $('#sendSmsToVolunteer').find('[name="id"]').val(iid).end()
            });

        });
    });

</script>



<script>
    $(document).ready(function () {
        $(".flashmessage").delay(3000).fadeOut(100);
    });
</script>

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