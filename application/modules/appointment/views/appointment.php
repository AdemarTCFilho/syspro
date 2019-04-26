
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <?php echo $this->session->flashdata('feedback_atualizar'); ?>
        <section class="panel">
            <header class="panel-heading">
                <i class="fa fa-user"></i>  Todos os agendamentos
            </header>
            <div class="panel-body">
                <div class="adv-table editable-table ">

                    <button class="export" onclick="javascript:window.print();">Imprimir</button>  

                    <form class="form-horizontal">
                      <div class="rows form-group has-success has-feedback">                       
                        <div class="col-sm-2">
                            <?php if ($this->ion_auth->in_group(array('admin', 'Laboratorist', 'Receptionist'))) { ?>
                            <a data-toggle="modal" href="#myModal">
                                <button id="" class="btn green">
                                    <i class="fa fa-plus-circle"></i>   Adicionar agend. 
                                </button>
                            </a>
                            <?php } ?>
                        </div>
                        <div class="col-sm-2">
                            <a href="appointment/todays" class="btn card-cor-laranja"><i class="fa fa-list-alt"></i> <?php echo lang('todays'); ?></a>
                        </div>
                        <div class="col-sm-2">
                            <a href="appointment/upcoming" class="btn card-cor-cinza"><i class="fa fa-list-alt"></i> Próx. agend.</a>
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
            <table class="table table-striped table-hover table-bordered order-table"  id="editable-sample">
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
                        <?php if ($this->ion_auth->in_group(array('admin', 'Laboratorist', 'Receptionist'))) { ?>
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

                <?php foreach ($appointments as $appointment) { ?>
                <?php if ($this->ion_auth->in_group(array('admin', 'Laboratorist', 'Doctor', 'Receptionist'))) { ?>
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
                    <button type="button" class="editbutton2 btn btn-xs" data-toggle="modal" data-id="<?php echo $appointment->id; ?>" style="float: right;"><i class="fa fa-ban" style="font-size:18px;color:red;float: right;"></i></button>
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

            <?php if ($this->ion_auth->in_group(array('Receptionist'))) { ?>
            <tr class="">
                <td style="width: 5%;"><?php echo $appointment->id; ?></td>
                <td>
                    <a class="historico-padding">
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
                <a class="historico-padding">
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
                <button type="button" class="editbutton2 btn btn-xs" data-toggle="modal" data-id="<?php echo $appointment->id; ?>" style="float: right;"><i class="fa fa-ban" style="font-size:18px;color:red;float: right;"></i></button>
                <?php } ?>
            </td>

            <td>
                <?php if ($this->ion_auth->in_group(array('admin', 'Laboratorist'))) { ?>  
                <a class="btn green btn-xs" href="patient/medicalHistory?id=<?php echo $this->db->get_where('patient', array('id' => $appointment->patient))->row()->id; ?>"><i class="fa fa-book"> </i> Histórico</a>

                <button type="button" class="btn btn-info btn-xs btn_width editbutton" data-toggle="    modal" data-id="<?php echo $appointment->id; ?>"><i class="fa fa-edit"> <?php echo lang('edit'); ?></i></button>
                <?php } ?> 
                <?php if ($this->ion_auth->in_group(array('Receptionist'))) { ?> 

                <?php if ($appointment->status_appointment != "ATENDIDO") { ?>                      
                <a class="btn btn-info btn-xs btn_width delete_button" href="appointment/delete?id=<?php echo $appointment->id; ?>" <?php echo lang('delete'); ?> onclick="return confirm('Tem certeza de que deseja excluir este item?');"><i class="fa fa-trash-o"> </i></a>
                <?php } ?>
                <?php } ?>

                <?php if ($this->ion_auth->in_group(array('admin', 'Laboratorist'))) { ?>                       
                <a class="btn btn-info btn-xs btn_width delete_button" href="appointment/delete?id=<?php echo $appointment->id; ?>" <?php echo lang('delete'); ?> onclick="return confirm('Tem certeza de que deseja excluir este item?');"><i class="fa fa-trash-o"> </i></a>

                <?php } ?>                                   
            </td>

        </tr>
        <?php } ?>
        <?php } ?>
        <?php } ?>




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
                                <option value="add_new" style="color: #41cac0 !important;"><?php echo lang('add_new'); ?></option>
                                <?php foreach ($patients as $patient) { ?>
                                <option value="<?php echo $patient->id; ?>" <?php
                                if (!empty($payment->patient)) {
                                    if ($payment->patient == $patient->id) {
                                        echo 'selected';
                                    }
                                }
                                ?> >CPF: <?php echo $patient->cpf; ?> | <?php echo $patient->name; ?> | SUS: <?php echo $patient->sus; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="pos_client clearfix">
                        <div class="col-md-8 payment pad_bot pull-right">
                            <div class="col-md-3 payment_label"> 
                                <label for="exampleInputEmail1"> CPF</label>
                            </div>
                            <div class="col-md-9"> 
                                <input type="text" class="form-control pay_in" name="p_cpf" value='<?php
                                if (!empty($payment->p_cpf)) {
                                    echo $payment->p_cpf;
                                }
                                ?>' placeholder="">
                            </div>
                        </div>
                        <div class="col-md-8 payment pad_bot pull-right">
                            <div class="col-md-3 payment_label"> 
                                <label for="exampleInputEmail1"> Nome do paciente</label>
                            </div>
                            <div class="col-md-9"> 
                                <input type="text" class="form-control pay_in" name="p_name" value='<?php
                                if (!empty($payment->p_name)) {
                                    echo $payment->p_name;
                                }
                                ?>' placeholder="">
                            </div>
                        </div>
                        <!--<div class="col-md-8 payment pad_bot pull-right">
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
                        </div>-->
                        <!--<div class="col-md-8 payment pad_bot pull-right">
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
                        </div>-->
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
                                ?>>Cód: <?php echo $doctor->id; ?> | <?php echo $doctor->name; ?>  | CRM: <?php echo $doctor->crm; ?></option>
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

                    <div class="col-md-12 panel bg-info">
                      <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">Definir hora do agendamento</button>
                      <div id="demo" class="collapse">
                        <hr>

                        <div class="row bg-info">
                            <div class="col-xs-4"></div>
                            <div class="col-xs-2" style="text-align:center">
                                <span class="text-center">Inicío do agendamento</span>
                                <input type="text" class="form-control" id="inicio" name="s_time" style="text-align:center">
                                <br>
                            </div>
                            <div class="col-xs-2" style="text-align:center">
                                <span class="text-center">Fim do agendamento</span>
                                <input type="text" class="form-control" id="fim" name="e_time" style="text-align:center">
                                <br>
                            </div>

                            <div class="">

                              <table class="table table-bordered">
                                <thead>
                                  <tr>
                                    <th>07:00</th>
                                    <th>08:00</th>
                                    <th>09:00</th>
                                    <th>10:00</th>
                                    <th>11:00</th>
                                    <th>12:00</th>
                                    <th>13:00</th>
                                    <th>14:00</th>
                                    <th>15:00</th>
                                    <th>16:00</th>
                                </tr>
                            </thead>
                            <tbody>

                              <tr style="font-size:11px;">

                                <td>


                                    <div class="">

                                        <div class="radio">
                                            <input id="radio-1" name="radio" type="radio" onclick="carrega_hora1()">
                                            <label for="radio-1" class="radio-label">07:00 - 07:10</label>
                                        </div>

                                        <div class="radio">
                                            <input id="radio-2" name="radio" type="radio" onclick="carrega_hora2()">
                                            <label  for="radio-2" class="radio-label">07:10 - 07:20</label>
                                        </div>

                                        <div class="radio">
                                            <input id="radio-3" name="radio" type="radio" onclick="carrega_hora3()">
                                            <label for="radio-3" class="radio-label">07:20 - 07:30</label>
                                        </div>

                                        <div class="radio">
                                            <input id="radio-4" name="radio" type="radio" onclick="carrega_hora4()">
                                            <label for="radio-4" class="radio-label">07:30 - 07:40</label>
                                        </div>

                                        <div class="radio">
                                            <input id="radio-5" name="radio" type="radio" onclick="carrega_hora5()">
                                            <label for="radio-5" class="radio-label">07:40 - 07:50</label>
                                        </div>

                                        <div class="radio">
                                            <input id="radio-6" name="radio" type="radio" onclick="carrega_hora6()">
                                            <label for="radio-6" class="radio-label">07:50 - 08:00</label>
                                        </div>

                                    </div>

                                </td>

                                <td>
                                    <div class="">
                                      <div class="radio">
                                        <input id="radio-7" name="radio" type="radio" onclick="carrega_hora7()">
                                        <label for="radio-7" class="radio-label">08:00 - 08:10</label>
                                    </div>

                                    <div class="radio">
                                        <input id="radio-8" name="radio" type="radio" onclick="carrega_hora8()">
                                        <label  for="radio-8" class="radio-label">08:10 - 08:20</label>
                                    </div>

                                    <div class="radio">
                                        <input id="radio-9" name="radio" type="radio" onclick="carrega_hora9()">
                                        <label for="radio-9" class="radio-label">08:20 - 08:30</label>
                                    </div>

                                    <div class="radio">
                                        <input id="radio-10" name="radio" type="radio" onclick="carrega_hora10()">
                                        <label for="radio-10" class="radio-label">08:30 - 08:40</label>
                                    </div>

                                    <div class="radio">
                                        <input id="radio-11" name="radio" type="radio" onclick="carrega_hora11()">
                                        <label for="radio-11" class="radio-label">08:40 - 08:50</label>
                                    </div>

                                    <div class="radio">
                                        <input id="radio-12" name="radio" type="radio" onclick="carrega_hora12()">
                                        <label for="radio-12" class="radio-label">08:50 - 09:00</label>
                                    </div>
                                </div>
                            </td>

                            <td>
                                <div class="">
                                  <div class="radio">
                                    <input id="radio-13" name="radio" type="radio" onclick="carrega_hora13()">
                                    <label for="radio-13" class="radio-label">09:00 - 09:10</label>
                                </div>

                                <div class="radio">
                                    <input id="radio-14" name="radio" type="radio" onclick="carrega_hora14()">
                                    <label  for="radio-14" class="radio-label">09:10 - 09:20</label>
                                </div>

                                <div class="radio">
                                    <input id="radio-15" name="radio" type="radio" onclick="carrega_hora15()">
                                    <label for="radio-15" class="radio-label">09:20 - 09:30</label>
                                </div>

                                <div class="radio">
                                    <input id="radio-16" name="radio" type="radio" onclick="carrega_hora16()">
                                    <label for="radio-16" class="radio-label">09:30 - 09:40</label>
                                </div>

                                <div class="radio">
                                    <input id="radio-17" name="radio" type="radio" onclick="carrega_hora17()">
                                    <label for="radio-17" class="radio-label">09:40 - 09:50</label>
                                </div>

                                <div class="radio">
                                    <input id="radio-18" name="radio" type="radio" onclick="carrega_hora18()">
                                    <label for="radio-18" class="radio-label">09:50 - 10:00</label>
                                </div>
                            </div>
                        </td>

                        <td>
                            <div class="">
                              <div class="radio">
                                <input id="radio-13" name="radio" type="radio" onclick="carrega_hora19()">
                                <label for="radio-13" class="radio-label">10:00 - 10:10</label>
                            </div>

                            <div class="radio">
                                <input id="radio-14" name="radio" type="radio" onclick="carrega_hora20()">
                                <label  for="radio-14" class="radio-label">10:10 - 10:20</label>
                            </div>

                            <div class="radio">
                                <input id="radio-15" name="radio" type="radio" onclick="carrega_hora21()">
                                <label for="radio-15" class="radio-label">10:20 - 10:30</label>
                            </div>

                            <div class="radio">
                                <input id="radio-16" name="radio" type="radio" onclick="carrega_hora22()">
                                <label for="radio-16" class="radio-label">10:30 - 10:40</label>
                            </div>

                            <div class="radio">
                                <input id="radio-17" name="radio" type="radio" onclick="carrega_hora23()">
                                <label for="radio-17" class="radio-label">10:40 - 10:50</label>
                            </div>

                            <div class="radio">
                                <input id="radio-18" name="radio" type="radio" onclick="carrega_hora24()">
                                <label for="radio-18" class="radio-label">10:50 - 11:00</label>
                            </div>
                        </div>
                    </td>

                    <td>
                        <div class="">
                          <div class="radio">
                            <input id="radio-13" name="radio" type="radio" onclick="carrega_hora25()">
                            <label for="radio-13" class="radio-label">11:00 - 11:10</label>
                        </div>

                        <div class="radio">
                            <input id="radio-14" name="radio" type="radio" onclick="carrega_hora26()">
                            <label  for="radio-14" class="radio-label">11:10 - 11:20</label>
                        </div>

                        <div class="radio">
                            <input id="radio-15" name="radio" type="radio" onclick="carrega_hora27()">
                            <label for="radio-15" class="radio-label">11:20 - 11:30</label>
                        </div>

                        <div class="radio">
                            <input id="radio-16" name="radio" type="radio" onclick="carrega_hora28()">
                            <label for="radio-16" class="radio-label">11:30 - 11:40</label>
                        </div>

                        <div class="radio">
                            <input id="radio-17" name="radio" type="radio" onclick="carrega_hora29()">
                            <label for="radio-17" class="radio-label">11:40 - 11:50</label>
                        </div>

                        <div class="radio">
                            <input id="radio-18" name="radio" type="radio" onclick="carrega_hora30()">
                            <label for="radio-18" class="radio-label">11:50 - 12:00</label>
                        </div>
                    </div>
                </td>

                <td>
                    <div class="">
                      <div class="radio">
                        <input id="radio-1" name="radio" type="radio" onclick="carrega_hora31()">
                        <label for="radio-1" class="radio-label">12:00 - 12:10</label>
                    </div>

                    <div class="radio">
                        <input id="radio-2" name="radio" type="radio" onclick="carrega_hora32()">
                        <label  for="radio-2" class="radio-label">12:10 - 12:20</label>
                    </div>

                    <div class="radio">
                        <input id="radio-3" name="radio" type="radio" onclick="carrega_hora33()">
                        <label for="radio-3" class="radio-label">12:20 - 12:30</label>
                    </div>

                    <div class="radio">
                        <input id="radio-4" name="radio" type="radio" onclick="carrega_hora34()">
                        <label for="radio-4" class="radio-label">12:30 - 12:40</label>
                    </div>

                    <div class="radio">
                        <input id="radio-5" name="radio" type="radio" onclick="carrega_hora35()">
                        <label for="radio-5" class="radio-label">12:40 - 12:50</label>
                    </div>

                    <div class="radio">
                        <input id="radio-6" name="radio" type="radio" onclick="carrega_hora36()">
                        <label for="radio-6" class="radio-label">12:50 - 13:00</label>
                    </div>
                </div>
            </td>

            <td>
                <div class="">
                  <div class="radio">
                    <input id="radio-7" name="radio" type="radio" onclick="carrega_hora37()">
                    <label for="radio-7" class="radio-label">13:00 - 13:10</label>
                </div>

                <div class="radio">
                    <input id="radio-8" name="radio" type="radio" onclick="carrega_hora38()">
                    <label  for="radio-8" class="radio-label">13:10 - 13:20</label>
                </div>

                <div class="radio">
                    <input id="radio-9" name="radio" type="radio" onclick="carrega_hora39()">
                    <label for="radio-9" class="radio-label">13:20 - 13:30</label>
                </div>

                <div class="radio">
                    <input id="radio-10" name="radio" type="radio" onclick="carrega_hora40()">
                    <label for="radio-10" class="radio-label">13:30 - 13:40</label>
                </div>

                <div class="radio">
                    <input id="radio-11" name="radio" type="radio" onclick="carrega_hora41()">
                    <label for="radio-11" class="radio-label">13:40 - 13:50</label>
                </div>

                <div class="radio">
                    <input id="radio-12" name="radio" type="radio" onclick="carrega_hora42()">
                    <label for="radio-12" class="radio-label">13:50 - 14:00</label>
                </div>
            </div>
        </td>

        <td>
            <div class="">
              <div class="radio">
                <input id="radio-13" name="radio" type="radio" onclick="carrega_hora43()">
                <label for="radio-13" class="radio-label">14:00 - 14:10</label>
            </div>

            <div class="radio">
                <input id="radio-14" name="radio" type="radio" onclick="carrega_hora44()">
                <label  for="radio-14" class="radio-label">14:10 - 14:20</label>
            </div>

            <div class="radio">
                <input id="radio-15" name="radio" type="radio" onclick="carrega_hora55()">
                <label for="radio-15" class="radio-label">14:20 - 14:30</label>
            </div>

            <div class="radio">
                <input id="radio-16" name="radio" type="radio" onclick="carrega_hora46()">
                <label for="radio-16" class="radio-label">14:30 - 14:40</label>
            </div>

            <div class="radio">
                <input id="radio-17" name="radio" type="radio" onclick="carrega_hora47()">
                <label for="radio-17" class="radio-label">14:40 - 14:50</label>
            </div>

            <div class="radio">
                <input id="radio-18" name="radio" type="radio" onclick="carrega_hora48()">
                <label for="radio-18" class="radio-label">14:50 - 15:00</label>
            </div>
        </div>
    </td>

    <td>
        <div class="">
          <div class="radio">
            <input id="radio-13" name="radio" type="radio" onclick="carrega_hora49()">
            <label for="radio-13" class="radio-label">15:00 - 15:10</label>
        </div>

        <div class="radio">
            <input id="radio-14" name="radio" type="radio" onclick="carrega_hora50()">
            <label  for="radio-14" class="radio-label">15:10 - 15:20</label>
        </div>

        <div class="radio">
            <input id="radio-15" name="radio" type="radio" onclick="carrega_hora51()">
            <label for="radio-15" class="radio-label">15:20 - 15:30</label>
        </div>

        <div class="radio">
            <input id="radio-16" name="radio" type="radio" onclick="carrega_hora52()">
            <label for="radio-16" class="radio-label">15:30 - 15:40</label>
        </div>

        <div class="radio">
            <input id="radio-17" name="radio" type="radio" onclick="carrega_hora53()">
            <label for="radio-17" class="radio-label">15:40 - 15:50</label>
        </div>

        <div class="radio">
            <input id="radio-18" name="radio" type="radio" onclick="carrega_hora54()">
            <label for="radio-18" class="radio-label">15:50 - 16:00</label>
        </div>
    </div>
</td>

<td>
    <div class="">
      <div class="radio">
        <input id="radio-13" name="radio" type="radio" onclick="carrega_hora55()">
        <label for="radio-13" class="radio-label">16:00 - 16:10</label>
    </div>

    <div class="radio">
        <input id="radio-14" name="radio" type="radio" onclick="carrega_hora56()">
        <label  for="radio-14" class="radio-label">16:10 - 16:20</label>
    </div>

    <div class="radio">
        <input id="radio-15" name="radio" type="radio" onclick="carrega_hora57()">
        <label for="radio-15" class="radio-label">16:20 - 16:30</label>
    </div>

    <div class="radio">
        <input id="radio-16" name="radio" type="radio" onclick="carrega_hora58()">
        <label for="radio-16" class="radio-label">16:30 - 16:40</label>
    </div>

    <div class="radio">
        <input id="radio-17" name="radio" type="radio" onclick="carrega_hora59()">
        <label for="radio-17" class="radio-label">16:40 - 16:50</label>
    </div>

    <div class="radio">
        <input id="radio-18" name="radio" type="radio" onclick="carrega_hora60()">
        <label for="radio-18" class="radio-label">16:50 - 17:00</label>
    </div>
</div>
</td>

</tr>
</tbody>
</table>
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

        <!--<option value="ATENDIDO" <?php
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
        ?> > CANCELADO </option>-->
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


<!-- Edit Event Modal-->
<div class="modal fade" id="myModal7" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content" style="width: 45%;margin-left: 26%;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><i class="fa fa-edit"></i> Modificar status do agendamento</h4>
            </div><br>
            <div class="">
                <form role="form" id="editAppointmentForm" action="appointment/addNewStatus" method="post" enctype="multipart/form-data">
                    <div class="form-group" style="display: none;">
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
                    <div class="form-group" style="display: none;">
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
                    <div class="form-group" style="display: none;">
                        <label for="exampleInputEmail1"> <?php echo lang('date'); ?></label>

                        <input type="text" class="form-control default-date-picker" readonly="" name="date" id="exampleInputEmail1" value='' placeholder="">

                    </div>
                    <div class="form-group col-md-12" style="display: none;">
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

                    <div class="form-group col-md-12" style="display: none;">
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

                    <div class="form-group" style="display: none;">
                        <label for="exampleInputEmail1"> <?php echo lang('remarks'); ?></label>
                        <input type="text" class="form-control" name="remarks" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    
                    <div class="form-group col-md-12 modal-content">
                        <?php if ($this->ion_auth->in_group(array('admin', 'Laboratorist', 'Doctor'))) { ?>
                        <div class="col-md-6 panel">
                            <label class="container">ATENDIDO
                                <input value="ATENDIDO" type="radio" checked="checked" name="status_appointment">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <?php } ?>
                        <?php if ($this->ion_auth->in_group(array('admin', 'Laboratorist'))) { ?>
                        <div class="col-md-6 panel">
                            <label class="container">CANCELADO
                                <input value="CANCELADO" type="radio" name="status_appointment">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if ($this->ion_auth->in_group(array('admin', 'Laboratorist', 'Receptionist'))) { ?>
                    <div class="form-group col-md-12 modal-content">

                        <div class="col-6">
                            <label class="container">CONFIRMADO
                                <input value="CONFIRMADO" type="radio" checked="checked" name="status_appointment">
                                <span class="checkmark"></span>
                            </label>
                        </div>

                        <div class="col-6">
                            <label class="container">AGENDADO
                                <input value="AGENDADO" type="radio" name="status_appointment">
                                <span class="checkmark"></span>
                            </label>
                        </div>

                        <div class="col-6">
                            <label class="container">CANCELADO
                                <input value="CANCELADO" type="radio" name="status_appointment">
                                <span class="checkmark"></span>
                            </label>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"> <?php echo lang('remarks'); ?></label>
                            <input type="text" class="form-control" name="remarks" id="exampleInputEmail1" value='' placeholder="">
                        </div>

                        <?php } ?>

                        <input type="hidden" name="id" value=''>

                        <div class="text-center col-md-12 panel">
                            <button type="submit" name="submit" class="btn btn-info btn-lg"> <?php echo lang('submit'); ?></button>
                        </div>
                    </div>
                </form>

            </div>
            <br><br>
        </div><!-- /.modal-content -->
        <br><br><br><br>
    </div><!-- /.modal-dialog -->
</div>
<!-- Edit Event Modal-->

<style type="text/css">
/* The container */
.container {
    display: block;
    position: relative;
    padding-left: 35px;
    margin-bottom: 12px;
    cursor: pointer;
    font-size: 22px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

/* Hide the browser's default radio button */
.container input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
}

/* Create a custom radio button */
.checkmark {
    position: absolute;
    top: 0;
    left: 0;
    height: 27px;
    width: 27px;
    background-color: #eee;
    border-radius: 50%;
    border: 2px solid #08c;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
    background-color: #ccc;
}

/* When the radio button is checked, add a blue background */
.container input:checked ~ .checkmark {
    background-color: #2196F3;
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.checkmark:after {
    content: "";
    position: absolute;
    display: none;
}

/* Show the indicator (dot/circle) when checked */
.container input:checked ~ .checkmark:after {
    display: block;
}

/* Style the indicator (dot/circle) */
.container .checkmark:after {
    top: 9px;
    left: 9px;
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: white;
}

.historico-padding{
    padding: inherit;
}
</style>

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


<script type="text/javascript">




 //JS table filter
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
//Filter Table
</script>


<script type="text/javascript">
    $(document).ready(function () {
        $(".editbutton2").click(function (e) {
            e.preventDefault(e);
                                            // Get the record's ID via attribute  
                                            var iid = $(this).attr('data-id');
                                            $('#editAppointmentForm').trigger("reset");
                                            $('#myModal7').modal('show');
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
<?php if ($this->session->flashdata('feedback', 'Adicionado')): ?>
    <script type="text/javascript">
      $(document).ready(function() {
          Swal.fire({
              position: 'center',
              type: 'success',
              //text: 'Operação realizada com sucesso!',
              title: "<?php echo $this->session->flashdata('feedback', 'Adicionado'); ?>",
              showConfirmButton: false,
              timer: 3500
          });
      });
  </script>
<?php endif; ?>

<?php if ($this->session->flashdata('feedback_atualizar', 'Adicionado')): ?>
    <script type="text/javascript">
      $(document).ready(function() {
          Swal.fire({
              position: 'center',
              type: 'success',
              //text: 'Operação realizada com sucesso!',
              title: "<?php echo $this->session->flashdata('feedback_atualizar', 'Adicionado'); ?>",
              showConfirmButton: false,
              timer: 3500
          });
      });
  </script>
<?php endif; ?>

<?php if ($this->session->flashdata('feedback_data', '')): ?>
    <script type="text/javascript">
      $(document).ready(function() {
          Swal.fire({
              type: 'error',
              title: "<?php echo $this->session->flashdata('feedback_data', ''); ?>",
              text: 'Algo deu errado!',
              footer: '<a href></a>'
          });
      });
  </script>
<?php endif; ?>