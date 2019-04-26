
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                <a class="btn btn-primary btn-xs no-print" href="JavaScript: window.history.back();"><i class="fa fa-mail-reply"> </i> Voltar</a> <i class="fa fa-user"></i>  Agend. Confirmados | <?php echo $mmrdoctor->name; ?> | 
                        <?php echo $mmrdoctor->profile; ?>
            </header>
            <div class="panel-body col-md-12">
                <div class="adv-table editable-table ">
                    <div class="clearfix">
                        <h4>Histórico Analítico</h4>
                        <button type="submit" name="submit" class="btn btn-info btn-xs btn_width no-print" onclick="javascript:window.print();" style="float: right;">Imprimir</button>  
                    </div>
                    <br>
                    <div class="space15"></div>                  
                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th> <?php echo lang('id'); ?></th>
                                <th> <?php echo lang('patient'); ?></th>
                                <th> <?php echo lang('date-time'); ?></th>
                                <!--<th> <?php echo lang('remarks'); ?></th>-->
                                <th> <?php echo lang('status_appointment'); ?></th>
                                <!--<th> <?php echo lang('options'); ?></th>-->
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
                            if ($appointment->doctor == $doctor_id && $appointment->status_appointment == "CONFIRMADO") {
                                ?>
                                <tr class="">
                                    <td ><?php echo $appointment->id; ?></td>
                                    <td> <?php echo $this->db->get_where('patient', array('id' => $appointment->patient))->row()->name; ?></td>
                                    <td class="center"><?php echo date('d-m-Y', $appointment->date); ?> => <?php echo $appointment->time_slot; ?></td>
                                    <!--<td>
                                        <?php echo $appointment->remarks; ?>
                                    </td>-->
                                    <td style="width: 15%;">
                                        <a class="historico-padding" href="patient/medicalHistory?id=<?php echo $this->db->get_where('patient', array('id' => $appointment->patient))->row()->id; ?>">
                                            <strong><?php echo $appointment->status_appointment; ?></strong>
                                        </a>
                                        <?php if ($appointment->status_appointment == "CONFIRMADO") { ?>
                                        <i class="fa fa-thumbs-up" style="font-size:18px;color:#0288d1;float: right;"></i>
                                        <?php } ?>
                                    </td>
                                    <!--<td>
                                        
                                        <button type="button" class="btn btn-info btn-xs btn_width editbutton" data-toggle="modal" data-id="<?php echo $appointment->id; ?>"><i class="fa fa-edit"> <?php echo lang('edit'); ?></i></button>   
                                        
                                        <a class="btn btn-info btn-xs btn_width delete_button" href="appointment/delete?id=<?php echo $appointment->id; ?>&doctor_id=<?php echo $appointment->doctor; ?>" onclick="return confirm('Tem certeza de que deseja excluir este item?');"><i class="fa fa-trash-o"> </i></a>
                                    </td>-->
                                </tr>
                                <?php
                            }
                        }
                        ?>




                        </tbody>
                    </table>
                </div>
            </div>

            <style>

                .panel{background: #f1f1f1;}
                .profile{
                    background: #f9f9f9;
                }

            </style>

            <!--<section class="panel col-md-4 m_t">
                <div class="panel-body profile">
                    <a href="#" class="task-thumb">
                        <img src="<?php if(!empty($mmrdoctor->img_url)){echo $mmrdoctor->img_url;}else{echo 'uploads/favicon.png';} ?>">
                    </a>
                    <div class="task-thumb-details">
                        <h1><a href="#"><?php echo $mmrdoctor->name; ?></a></h1>
                        <p><?php echo $mmrdoctor->profile; ?></p>
                    </div>
                </div>
                <table class="table table-hover personal-task">
                    <tbody>
                        <tr>
                            <td>
                                <i class=" fa fa-envelope"></i>
                            </td>
                            <td><?php echo $mmrdoctor->email; ?></td>

                        </tr>
                        <tr>
                            <td>
                                <i class="fa fa-list-alt"></i>
                            </td>
                            <td>CRM - <?php echo $mmrdoctor->crm; ?></td>

                        </tr>

                    </tbody>
                </table>
            </section>-->
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
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">�</button>
                <h4 class="modal-title"><i class="fa fa-plus-circle"></i>  <?php echo lang('add_appointment'); ?></h4>
            </div>
            <div class="modal-body">
                <form role="form" action="appointment/addNew" method="post" enctype="multipart/form-data">
                    <div class="col-md-12">
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
                    <div class="col-md-12">
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
                        <label for="exampleInputEmail1"> <?php echo lang('date-time'); ?></label>
                        <div data-date="" class="input-group date form_datetime-meridian">
                            <div class="input-group-btn"> 
                                <button type="button" class="btn btn-info date-set"><i class="fa fa-calendar"></i></button>
                                <button type="button" class="btn btn-danger date-reset"><i class="fa fa-times"></i></button>
                            </div>
                            <input type="text" class="form-control" readonly="" name="date" id="exampleInputEmail1" value='<?php
                            if (!empty($appointment->date)) {
                                echo $appointment->date;
                            }
                            ?>' placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"> <?php echo lang('remarks'); ?></label>
                        <input type="text" class="form-control" name="remarks" id="exampleInputEmail1" value='<?php
                        if (!empty($appointment->address)) {
                            echo $appointment->address;
                        }
                        ?>' placeholder="">
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
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">�</button>
                <h4 class="modal-title"><i class="fa fa-edit"></i>  <?php echo lang('edit_appointment'); ?></h4>
            </div>
            <div class="modal-body">
                <form role="form" id="editAppointmentForm" action="appointment/addNew" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="col-md-3"> 
                            <label for="exampleInputEmail1"> <?php echo lang('paient'); ?></label>
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
                        <label for="exampleInputEmail1"> <?php echo lang('date-time'); ?></label>
                        <div data-date="" class="input-group date form_datetime-meridian">
                            <div class="input-group-btn"> 
                                <button type="button" class="btn btn-info date-set"><i class="fa fa-calendar"></i></button>
                                <button type="button" class="btn btn-danger date-reset"><i class="fa fa-times"></i></button>
                            </div>
                            <input type="text" class="form-control" readonly="" name="date" id="exampleInputEmail1" value='' placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"> <?php echo lang('remarks'); ?></label>
                        <input type="text" class="form-control" name="remarks" id="exampleInputEmail1" value='' placeholder="">
                    </div>



                    <input type="hidden" name="id" value=''>


                    <button type="submit" name="submit" class="btn btn-info"> <?php echo lang('submit'); ?></button>
                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- Edit Event Modal-->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
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
                                                // Populate the form fields with the data returned from server
                                                $('#editAppointmentForm').find('[name="id"]').val(response.appointment.id).end()
                                                $('#editAppointmentForm').find('[name="patient"]').val(response.appointment.patient).end()
                                                $('#editAppointmentForm').find('[name="doctor"]').val(response.appointment.doctor).end()
                                                $('#editAppointmentForm').find('[name="date"]').val(response.appointment.date).end()
                                                $('#editAppointmentForm').find('[name="remarks"]').val(response.appointment.remarks).end()
                                            });
                                        });
                                    });
</script>
<script>
    $(document).ready(function () {
        $(".flashmessage").delay(3000).fadeOut(100);
    });
</script>