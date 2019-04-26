<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="">
            <img alt="" src="uploads/img_login.png" width="100" height="70">
            <header class="panel-heading">
             <a class="btn btn-info btn-xs btn_width no-print" href="JavaScript: window.history.back();"><i class="fa fa-mail-reply"> </i> Voltar</a> <i class="fa fa-book no-print"></i>  <?php echo $patient->name; ?>
         </header> 
         <div class="row ">
            <div class="">
                <?php if ($this->ion_auth->in_group(array('Doctor'))) { ?>
                <div class="">

                        <!--<a class="btn btn-info btn_width" data-toggle="modal" href="#myModa3">
                            <i class="fa fa-plus-circle"> </i> <?php echo lang('add_new'); ?> 
                        </a>-->
                    </div>
                    <?php } ?>

                    <div class="col-md-12">
                        <?php
                        $current_user = $this->ion_auth->get_user_id();
                        if ($this->ion_auth->in_group('Doctor')) {
                            $doctor_id = $this->db->get_where('doctor', array('ion_user_id' => $current_user))->row()->id;
                        }
                        ?>
                        <form class="" role="form" action="prescription/addNewPrescription" method="post" enctype="multipart/form-data">
                            <div class="form-group col-md-12">
                                <input type="hidden" class="form-control form-control-inline input-medium default-date-picker" name="doctor" id="exampleInputEmail1" value='<?php
                                if (!empty($doctor_id)) {
                                    echo $doctor_id;
                                }
                                ?>' placeholder="">
                            </div>
                            <div class="form-group col-md-3 no-print" style="display: none;">
                                <label for="exampleInputEmail1"><?php echo lang('date'); ?></label>
                                <input type="text" class="form-control form-control-inline input-medium default-date-picker" name="date" id="exampleInputEmail1" value='<?php echo date('d-m-Y'); ?>' placeholder="">
                            </div>
                            <div class="form-group col-md-8 no-print" style="display: none;">
                                <label for="exampleInputEmail1"><?php echo lang('patient'); ?></label>
                                <select class="form-control m-bot15" name="patient" value=''> 
                                    <option value="<?php echo $patient->id; ?>" ><?php echo $patient->name; ?> </option>
                                </select>
                            </div>

                        <!--<?php foreach ($prescriptions as $department) { ?>
                            <?php if ($this->ion_auth->user()->row()->username == $this->doctor_model->getDoctorById($department->doctor)->name && $this->doctor_model->getDoctorById($department->doctor)->department == "Diagnóstico por Imagem") { ?>
                            <div class="form-group">
                                <label class="control-label col-md-3">Laudar</label>
                                <div class="col-md-9">
                                    <textarea class="" name="symptom" value="" rows="10" cols="100"></textarea>
                                </div>
                            </div>
                            <?php } ?>
                            <?php } ?>-->

          <div class="container">
  <div class="" id="accordion">
    <div class="panel panel-default">
      <div class="">
        <h4 class="panel-title">
          <a class="btn btn-info btn-xs btn_width no-print" data-toggle="collapse" data-parent="#accordion" href="#collapse1">Histórico médico</a>
          <a class="btn btn-info btn-xs btn_width no-print" data-toggle="collapse" data-parent="#accordion" href="#collapse2">Receituário</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse">
        <div class="panel-body">
                                   <div class="col-md-8">
                                <h3 class="text-center no-print">Histórico</h3>
                                <div class="col-md-12">
                                    <strong><label class="control-label col-md-9" style="font-size: 16px;"><?php echo lang('history'); ?></label></strong>
                                    <textarea oninput='if(this.scrollHeight > this.offsetHeight) this.rows += 1' class="receituario" name="symptom" value="" rows="8" cols="80"></textarea>
                                </div>

                                <div class="col-md-12">
                                    <label class="control-label col-md-9" style="font-size: 16px;"><?php echo lang('medication'); ?></label>
                                    <textarea  oninput='if(this.scrollHeight > this.offsetHeight) this.rows += 1' class="receituario" name="medicine" value="" rows="8" cols="80"></textarea>
                                </div>

                                <div class="col-md-12">
                                    <label class="control-label col-md-9" style="font-size: 16px;"><?php echo lang('note'); ?></label>
                                    <textarea  oninput='if(this.scrollHeight > this.offsetHeight) this.rows += 1' class="receituario" name="note" value="" rows="8" cols="80"></textarea>
                                </div>
                            </div>

                            <button type="submit" name="submit" class="btn btn-info btn-xs btn_width no-print" onclick="javascript:window.print();"><i class="fa fa-print"></i> Gerar histórico </button>

                            <div class="no-print" style="width: 320px; height: 800px; overflow-y: scroll;">
                                <div class="adv-table editable-table col-md-1">
                                    <br>
                                    <table class="table table-striped table-hover table-bordered" id="" style="width: 200px;">
                                        <thead>
                                            <tr style="font-size: 12px;">
                                                <th class="no-print"><i class="fa fa-book"> Histórico</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($prescriptions as $prescription) { ?>
                                            <?php if (!$prescription->symptom == 0) { ?> 
                                            <tr class="">                                               
                                                <td class="row">
                                                    <a style="font-size: 9px;" class="btn btn-xs btn_width col-md-2" href="prescription/viewPrescription?id=<?php echo $prescription->id; ?>">
                                                        <?php echo date('d/m/Y', $prescription->date); ?> <br> <?php echo $this->doctor_model->getDoctorById($prescription->doctor)->name; ?> | <?php echo $this->doctor_model->getDoctorById($prescription->doctor)->profile; ?>
                                                    </a>
                                                </td>    
                                          </tr>
                                          <?php } ?>
                                          <?php } ?>
                                      </tbody>
                                  </table>
                              </div>
                          </div>
        </div>
      </div>
    </div>
    <div class="panel panel-default">

      <div id="collapse2" class="panel-collapse collapse in">
        <div class="panel-body">
        <div class="col-md-8">
                            <h3 class="text-center no-print">Receituário</h3>
                            <div class="form-group"> 
                                <div class="col-md-12">
                                    <textarea  oninput='if(this.scrollHeight > this.offsetHeight) this.rows += 1' class="receituario" name="receita" value="" rows="8" cols="80"></textarea>
                                </div>
                            </div>
                        </div>

                        <button type="submit" name="submit" class="btn btn-info btn-xs btn_width no-print" onclick="javascript:window.print();"><i class="fa fa-print"></i> Gerar receita </button>

                        <div class="no-print" style="width: 320px; height: 800px; overflow-y: scroll;">
                                <div class="adv-table editable-table col-md-1">
                                    <br>
                                    <table class="table table-striped table-hover table-bordered" id="" style="width: 200px;">
                                        <thead>
                                            <tr style="font-size: 12px;">
                                                <th class="no-print"><i class="fa fa-medkit"></i> Receita</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($prescriptions as $prescription) { ?>
                                            <?php if (!$prescription->receita == 0) { ?> 
                                            <tr class="">                                               
                                                <td class="no-print">

                                                  <a style="font-size: 9px;" class="btn btn-xs btn_width col-md-2" href="prescription/viewPrescriptionMedecine?id=<?php echo $prescription->id; ?>">
                                                        <?php echo date('d/m/Y', $prescription->date); ?> <br> <?php echo $this->doctor_model->getDoctorById($prescription->doctor)->name; ?> | <?php echo $this->doctor_model->getDoctorById($prescription->doctor)->profile; ?>
                                                    </a>
                                                  <!-- Comparar usuário logado se tem permissão para editar ou excluir -->
                                                  <?php if ($this->doctor_model->getDoctorById($prescription->doctor)->name == $this->ion_auth->user()->row()->username) { ?> 
                                                  <?php if ($this->ion_auth->in_group('Doctor')) { ?>
                                                  <!--<button type="button" class="btn btn-info btn-xs btn_width editPrescription" data-toggle="modal" data-id="<?php echo $prescription->id; ?>"><i class="fa fa-edit"></i> <?php echo lang('edit'); ?></button>-->

                                                  <?php } ?>
                                                  <!--<a class="btn btn-info btn-xs btn_width delete_button" href="prescription/delete?id=<?php echo $prescription->id; ?>" onclick="return confirm('Tem certeza de que deseja excluir este item?');"><i class="fa fa-trash-o"></i> <?php echo lang('delete'); ?></a>-->
                                                  <?php } ?>

                                                  <?php if ($this->ion_auth->in_group('admin')) { ?>

                                                  <button type="button" class="btn btn-info btn-xs btn_width editPrescription" data-toggle="modal" data-id="<?php echo $prescription->id; ?>"><i class="fa fa-edit"></i> <?php echo lang('edit'); ?></button>

                                                  <a class="btn btn-info btn-xs btn_width delete_button" href="prescription/delete?id=<?php echo $prescription->id; ?>" onclick="return confirm('Tem certeza de que deseja excluir este item?');"><i class="fa fa-trash-o"></i> <?php echo lang('delete'); ?></a>

                                                  <?php } ?>
                                              </td>
                                          </tr>
                                          <?php } ?>
                                          <?php } ?>
                                      </tbody>
                                  </table>
                              </div>
                          </div>
        </div>
      </div>
    </div>
  </div> 
</div>
    


                <input type="hidden" name="patient_id" value='<?php echo $patient->id; ?>'>
                <input type="hidden" name="id" value=''>
                <section class="">
                    <!--<button type="submit" name="submit" class="btn btn-info submit_button no-print">Enviar</button>-->
                </section>
            </form>
        </div> 

    </div>
</div>

            <!--<div class="col-md-6">
                          <div class="panel-body">
                    <div class="panel-body">
                        <a class="btn btn-info btn_width" data-toggle="modal" href="#myModal">
                            <i class="fa fa-plus-circle"> </i> <?php echo lang('add_new'); ?> 
                        </a>
                    </div>
                    <header class="panel-heading">
                        Histórico Médico
                    </header> 

                    <div class="adv-table editable-table panel-body">
                        <table class="table table-striped table-hover table-bordered" id="">
                            <thead>
                                <tr>
                                    <th><?php echo lang('date'); ?></th>
                                    <th><?php echo lang('description'); ?></th>
                                    <th class="no-print"><?php echo lang('options'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($medical_histories as $medical_history) { ?>
                                    <tr class="">

                                        <td><?php echo $medical_history->date; ?></td>
                                        <td><?php echo $medical_history->description; ?></td>
                                        <td class="no-print">
                                            <button type="button" class="btn btn-info btn-xs btn_width editbutton" title="<?php echo lang('edit'); ?>" data-toggle="modal" data-id="<?php echo $medical_history->id; ?>"><i class="fa fa-edit"></i> </button>   
                                            <a class="btn btn-info btn-xs btn_width delete_button" title="<?php echo lang('delete'); ?>" href="patient/deleteCaseHistory?id=<?php echo $medical_history->id; ?>" onclick="return confirm('Tem certeza de que deseja excluir este item?');"><i class="fa fa-trash-o"></i> </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div> 
                <div class="panel-body">
                    <div class="panel-body">
                        <a class="btn btn-info btn_width" data-toggle="modal" href="#myModal1">
                            <i class="fa fa-plus-circle"> </i> <?php echo lang('add_new'); ?> 
                        </a>
                    </div>
                    <header class="panel-heading">
                        <?php echo lang('documents'); ?> 
                    </header>
                    <div class="adv-table editable-table ">



                        <div class="panel-body">
                            <?php foreach ($patient_materials as $patient_material) { ?>
                                <div class="panel col-md-3"  style="height: 200px; margin-right: 10px; margin-bottom: 36px;">
                                    <a class="btn btn-info btn-xs btn_width" href="patient/deletePatientMaterial?id=<?php echo $patient_material->id; ?>"onclick="return confirm('Tem certeza de que deseja excluir este item?');"> X </a>
                                    <div class="post-info">
                                        <img src="<?php echo $patient_material->url; ?>" width="100%">
                                    </div>
                                    <div class="post-info">
                                        <?php
                                        if (!empty($patient_material->title)) {
                                            echo $patient_material->title;
                                        }
                                        ?>
                                    </div>
                                    <div class="post-info">
                                        <a class="btn btn-info btn-xs btn_width" href="<?php echo $patient_material->url; ?>" download> <?php echo lang('download'); ?> </a>
                                        <hr>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>-->
        </section>
        <!-- page end-->
    </section>
</section>
<!--main content end-->
<!--footer start-->
<?php if (!empty($prescription->date)) { ?>
    <footer>
        <div class="text-center">
            <p>Garanhuns      <?php echo date('m/d/Y', $prescription->date); ?></p>
            <p><?php echo $this->doctor_model->getDoctorById($prescription->doctor)->name . ' - CRM - '; ?><?php echo $this->doctor_model->getDoctorById($prescription->doctor)->crm; ?> - <?php echo $this->doctor_model->getDoctorById($prescription->doctor)->profile; ?></p> 
        </div>
    </footer>
<?php } ?>


<!-- Add Patient Material Modal-->
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><i class="fa fa-plus-circle"></i>  <?php echo lang('add'); ?> <?php echo lang('files'); ?></h4>
            </div>
            <div class="modal-body">
                <form role="form" action="patient/addPatientMaterial" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="exampleInputEmail1"> <?php echo lang('title'); ?></label>
                        <input type="text" class="form-control" name="title" id="exampleInputEmail1" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"> <?php echo lang('file'); ?></label>
                        <input type="file" name="img_url">
                    </div>

                    <input type="hidden" name="patient" value='<?php echo $patient->id; ?>'>


                    <button type="submit" name="submit" class="btn btn-info"> <?php echo lang('submit'); ?></button>
                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- Add Patient Modal-->


<!-- Add Department Modal-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><i class="fa fa-plus-circle"></i> <?php echo lang('add_medical_history'); ?></h4>
            </div> 
            <div class="modal-body">
                <form role="form" action="patient/addMedicalHistory" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('date'); ?></label>
                        <input type="text" class="form-control form-control-inline input-medium default-date-picker" name="date" id="exampleInputEmail1" value='<?php echo date('d-m-Y'); ?>' placeholder="">
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3"><?php echo lang('description'); ?></label>
                        <div class="col-md-9">
                            <textarea class="ckeditor form-control" name="description" value="" rows="10"></textarea>
                        </div>
                    </div>

                    <input type="hidden" name="patient_id" value='<?php echo $patient->id; ?>'>
                    <input type="hidden" name="id" value=''>
                    <section class="">
                        <button type="submit" name="submit" class="btn btn-info submit_button">Enviar</button>
                    </section>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- Add Department Modal-->

<!-- Edit Department Modal-->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><i class="fa fa-edit"></i> <?php echo lang('edit_medical_history'); ?></h4>
            </div>
            <div class="modal-body">
                <form role="form" id="medical_historyEditForm" action="patient/addMedicalHistory" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('date'); ?></label>
                        <input type="text" class="form-control form-control-inline input-medium default-date-picker" name="date" id="exampleInputEmail1" value='<?php echo date('d-m-Y'); ?>' placeholder="">
                    </div>
                    <div class="form-group col-md-12">
                        <label class="control-label col-md-3"><?php echo lang('description'); ?></label>
                        <div class="col-md-9">
                            <textarea class="ckeditor form-control editor" id="editor" name="description" value="" rows="10"></textarea>
                        </div>
                    </div>
                    <input type="hidden" name="patient_id" value='<?php echo $patient->id; ?>'>
                    <input type="hidden" name="id" value=''>
                    <section class="">
                        <button type="submit" name="submit" class="btn btn-info submit_button">Submit</button>
                    </section>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>



<!-- Add Prescription Modal-->

<!-- Add Prescription Modal-->



<!-- Edit Prescription Modal-->
<div class="modal fade" id="myModal5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">  
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><i class="fa fa-plus-circle"></i> <?php echo lang('add_prescription'); ?></h4>
            </div> 
            <div class="modal-body">
                <form role="form" id="prescriptionEditForm" action="prescription/addNewPrescription" method="post" enctype="multipart/form-data">
                    <div class="form-group col-md-12">
                        <input type="hidden" class="form-control form-control-inline input-medium default-date-picker" name="doctor" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"><?php echo lang('date'); ?></label>
                        <input type="text" class="form-control form-control-inline input-medium default-date-picker" name="date" id="exampleInputEmail1" value='<?php echo date('d-m-Y'); ?>' placeholder="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"><?php echo lang('patient'); ?></label>
                        <select class="form-control m-bot15" name="patient" value=''> 
                            <option value="">Selecionar .....</option>
                            <?php foreach ($patients as $patientss) { ?>
                            <option value="<?php echo $patientss->id; ?>" <?php
                            if (!empty($prescription->patient)) {
                                if ($prescription->patient == $patientss->id) {
                                    echo 'selected';
                                }
                            }
                            ?> ><?php echo $patientss->name; ?> </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3"><?php echo lang('history'); ?></label>
                        <div class="col-md-9">
                            <textarea class="ckeditor form-control" id="editor1" name="symptom" value="" rows="10"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3"><?php echo lang('medication'); ?></label>
                        <div class="col-md-9">
                            <textarea class="ckeditor form-control" id="editor2" name="medicine" value="" rows="10"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3"><?php echo lang('note'); ?></label>
                        <div class="col-md-9">
                            <textarea class="ckeditor form-control" id="editor3" name="note" value="" rows="10"></textarea>
                        </div>
                    </div>


                    <input type="hidden" name="id" value=''>
                    <section class="">
                        <button type="submit" name="submit" class="btn btn-info submit_button"><?php echo lang('submit'); ?></button>
                    </section>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- Edit Prescription Modal-->



<script src="common/js/codearistos.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $(".editbutton").click(function (e) {
            e.preventDefault(e);
                                                // Get the record's ID via attribute  
                                                var iid = $(this).attr('data-id');
                                                $('#myModal2').modal('show');
                                                $.ajax({
                                                    url: 'patient/editMedicalHistoryByJason?id=' + iid,
                                                    method: 'GET',
                                                    data: '',
                                                    dataType: 'json',
                                                }).success(function (response) {
                                                    // Populate the form fields with the data returned from server
                                                    $('#medical_historyEditForm').find('[name="id"]').val(response.medical_history.id).end()
                                                    $('#medical_historyEditForm').find('[name="date"]').val(response.medical_history.date).end()
                                                    CKEDITOR.instances['editor'].setData(response.medical_history.description)
                                                });
                                            });
    });
</script>


<script type="text/javascript">
    $(document).ready(function () {
        $(".editPrescription").click(function (e) {
            e.preventDefault(e);
                                                // Get the record's ID via attribute  
                                                var iid = $(this).attr('data-id');
                                                $('#myModal5').modal('show');
                                                $.ajax({
                                                    url: 'prescription/editPrescriptionByJason?id=' + iid,
                                                    method: 'GET',
                                                    data: '',
                                                    dataType: 'json',
                                                }).success(function (response) {
                                                    // Populate the form fields with the data returned from server
                                                    $('#prescriptionEditForm').find('[name="id"]').val(response.prescription.id).end()
                                                    $('#prescriptionEditForm').find('[name="patient"]').val(response.prescription.patient).end()
                                                    $('#prescriptionEditForm').find('[name="doctor"]').val(response.prescription.doctor).end()

                                                    CKEDITOR.instances['editor1'].setData(response.prescription.symptom)
                                                    CKEDITOR.instances['editor2'].setData(response.prescription.medicine)
                                                    CKEDITOR.instances['editor3'].setData(response.prescription.note)
                                                });
                                            });
    });
</script>

<script>
    $(document).ready(function () {
        $(".flashmessage").delay(3000).fadeOut(100);
    });


     function autoResize()
    {
        objTextArea = document.getElementById('txtTextArea');
        while (objTextArea.scrollHeight > objTextArea.offsetHeight)
        {
            objTextArea.rows += 1;
        }
    }
</script>
