<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                <i class="fa fa-user"></i>  <?php echo lang('doctors'); ?>    
            </header>
            <div class="panel-body">
                <div class="adv-table editable-table ">                   
                    <div class="clearfix no-print">
                        <?php if ($this->ion_auth->in_group('Laboratorist')) { ?>
                        <a data-toggle="modal" href="#myModal">
                            <div class="btn-group">
                                <button id="" class="btn green">
                                    <i class="fa fa-plus-circle"></i> <?php echo lang('add_new'); ?> 
                                </button>
                            </div>
                        </a>
                        <?php } ?>
                        <button class="export no-print" onclick="javascript:window.print();"><?php echo lang('print'); ?></button>  
                    </div>
                    <div class="space15"></div>
                    <table class="table table-striped table-hover table-bordered" id="editable-sample">
                        <thead>
                            <tr>
                                <th>Cód.Médico</th>
                                <th><?php echo lang('name'); ?></th>
                                <?php if ($this->ion_auth->in_group(array('admin', 'Laboratorist'))) { ?>
                                    <th><?php echo lang('email'); ?></th>
                                    <th><?php echo lang('address'); ?></th>
                                    <th><?php echo lang('phone'); ?></th>
                                    <th><?php echo lang('department'); ?></th>
                                <?php } ?>
                                <th><?php echo lang('profile'); ?></th>
                                <th><?php echo lang('crm'); ?></th>
                                <th>Consultório</th>
                                <th class="no-print"><?php echo lang('options'); ?></th>
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

                        <?php foreach ($doctors as $doctor) { ?>
                        <tr class="">
                            <td><?php echo $doctor->id; ?></td>
                            <td> <?php echo $doctor->name; ?></td>
                            <?php if ($this->ion_auth->in_group(array('admin', 'Laboratorist'))) { ?>
                                <td><?php echo $doctor->email; ?></td>
                                <td class="center"><?php echo $doctor->address; ?></td>
                                <td><?php echo $doctor->phone; ?></td>
                                <td class="center"><?php echo $doctor->department; ?></td>
                            <?php } ?>
                            <td><?php echo $doctor->profile; ?></td>
                            <td><?php echo $doctor->crm; ?></td>
                            <td><?php echo $doctor->consultorio; ?></td>
                            <td class="no-print">
                                <button type="button" class="btn btn-info btn-xs btn_width editbutton" title="<?php echo lang('edit'); ?>" data-toggle="modal" data-id="<?php echo $doctor->id; ?>"><i class="fa fa-edit"> </i> </button>

                                <?php if ($this->ion_auth->in_group(array('admin', 'Laboratorist'))) { ?>   
                                <a class="btn btn-info btn-xs detailsbutton" title="<?php echo lang('appointments'); ?>"  href="appointment/getAppointmentByDoctorId?id=<?php echo $doctor->id; ?>"> <i class="fa fa-calendar"> </i> </a>
                                <?php } ?>

                                <?php if ($this->ion_auth->in_group('Laboratorist')) { ?>
                                <a class="btn btn-info btn-xs btn_width delete_button" title="<?php echo lang('delete'); ?>" href="doctor/delete?id=<?php echo $doctor->id; ?>" onclick="return confirm('Tem certeza de que deseja excluir este item?');"><i class="fa fa-trash-o"> </i></a>
                                <?php } ?>

                            </td>
                        </tr>
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






<!-- Add Accountant Modal-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><i class="fa fa-plus-circle"></i> <?php echo lang('add_new_doctor'); ?></h4>
            </div>
            <div class="modal-body">
                <form role="form" action="doctor/addNew" method="post" enctype="multipart/form-data">
                    <?php if ($this->ion_auth->in_group('Laboratorist')) { ?>
                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('name'); ?></label>
                        <input type="text" class="form-control" name="name" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <?php } ?>
                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('email'); ?></label>
                        <input type="text" class="form-control" name="email" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('password'); ?></label>
                        <input type="password" class="form-control" name="password" id="exampleInputEmail1" placeholder="********">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('address'); ?></label>
                        <input type="text" class="form-control" name="address" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('phone'); ?></label>
                        <input type="text" class="form-control" name="phone" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('department'); ?></label>
                        <select class="form-control m-bot15 js-example-basic-single" name="department" value=''>
                            <?php foreach ($departments as $department) { ?>
                            <option value="<?php echo $department->name; ?>"> <?php echo $department->name; ?> </option>
                            <?php } ?> 
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('profile'); ?></label>
                        <input type="text" class="form-control" name="profile" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('crm'); ?></label>
                        <input type="text" class="form-control" name="crm" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Consultório</label>
                        <input type="text" class="form-control" name="consultorio" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('image'); ?></label>
                        <input type="file" name="img_url">
                    </div>
                    <input type="hidden" name="id" value=''>
                    <button type="submit" name="submit" class="btn btn-info"><?php echo lang('submit'); ?></button>
                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- Add Accountant Modal-->







<!-- Edit Event Modal-->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><i class="fa fa-edit"></i> <?php echo lang('edit_doctor'); ?></h4>
            </div>
            <div class="modal-body">
                <form role="form" id="editDoctorForm" action="doctor/addNew" method="post" enctype="multipart/form-data">

                    <?php if ($this->ion_auth->in_group('Laboratorist')) { ?>
                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('name'); ?></label>
                        <input type="text" class="form-control" name="name" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('email'); ?></label>
                        <input type="text" class="form-control" name="email" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('password'); ?></label>
                        <input type="password" class="form-control" name="password" id="exampleInputEmail1" placeholder="********">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('address'); ?></label>
                        <input type="text" class="form-control" name="address" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('phone'); ?></label>
                        <input type="text" class="form-control" name="phone" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('department'); ?></label>
                        <select class="form-control m-bot15 js-example-basic-single department" name="department" value=''>
                            <?php foreach ($departments as $department) { ?>
                            <option value="<?php echo $department->name; ?>" <?php
                            if (!empty($doctor->department)) {
                                if ($department->name == $doctor->department) {
                                    echo 'selected';
                                }
                            }
                            ?> > <?php echo $department->name; ?> </option>
                            <?php } ?> 
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('profile'); ?></label>
                        <input type="text" class="form-control" name="profile" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('crm'); ?></label>
                        <input type="text" class="form-control" name="crm" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Consultório</label>
                        <input type="text" class="form-control" name="consultorio" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('image'); ?></label>
                        <input type="file" name="img_url">
                    </div>
                    <?php } ?>

                    <div class="form-group" style="display: none;">
                        <label for="exampleInputEmail1"><?php echo lang('email'); ?></label>
                        <input type="text" class="form-control" name="email" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group" style="display: none;">
                        <label for="exampleInputEmail1"><?php echo lang('password'); ?></label>
                        <input type="password" class="form-control" name="password" id="exampleInputEmail1" placeholder="********">
                    </div>
                    <div class="form-group" style="display: none;">
                        <label for="exampleInputEmail1"><?php echo lang('address'); ?></label>
                        <input type="text" class="form-control" name="address" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group" style="display: none;">
                        <label for="exampleInputEmail1"><?php echo lang('phone'); ?></label>
                        <input type="text" class="form-control" name="phone" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group" style="display: none;">
                        <label for="exampleInputEmail1"><?php echo lang('department'); ?></label>
                        <select class="form-control m-bot15 js-example-basic-single department" name="department" value=''>
                            <?php foreach ($departments as $department) { ?>
                            <option value="<?php echo $department->name; ?>" <?php
                            if (!empty($doctor->department)) {
                                if ($department->name == $doctor->department) {
                                    echo 'selected';
                                }
                            }
                            ?> > <?php echo $department->name; ?> </option>
                            <?php } ?> 
                        </select>
                    </div>
                    <div class="form-group" style="display: none;">
                        <label for="exampleInputEmail1"><?php echo lang('profile'); ?></label>
                        <input type="text" class="form-control" name="profile" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group" style="display: none;">
                        <label for="exampleInputEmail1"><?php echo lang('crm'); ?></label>
                        <input type="text" class="form-control" name="crm" id="exampleInputEmail1" value='' placeholder="">
                    </div>

                    <div class="form-group" style="display: none;">
                        <label for="exampleInputEmail1"><?php echo lang('name'); ?></label>
                        <input type="text" class="form-control" name="name" id="exampleInputEmail1" value='' placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Consultório</label>
                        <input type="text" class="form-control" name="consultorio" id="exampleInputEmail1" value='' placeholder="">
                    </div>

                    
                    <input type="hidden" name="id" value=''>
                    <button type="submit" name="submit" class="btn btn-info"><?php echo lang('submit'); ?></button>
                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- Edit Event Modal-->

<script src="common/js/codearistos.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $(".editbutton").click(function (e) {
            e.preventDefault(e);
                                                // Get the record's ID via attribute  
                                                var iid = $(this).attr('data-id');
                                                $('#editDoctorForm').trigger("reset");
                                                $('#myModal2').modal('show');
                                                $.ajax({
                                                    url: 'doctor/editDoctorByJason?id=' + iid,
                                                    method: 'GET',
                                                    data: '',
                                                    dataType: 'json',
                                                }).success(function (response) {
                                                    // Populate the form fields with the data returned from server
                                                    $('#editDoctorForm').find('[name="id"]').val(response.doctor.id).end()
                                                    $('#editDoctorForm').find('[name="name"]').val(response.doctor.name).end()
                                                    $('#editDoctorForm').find('[name="password"]').val(response.doctor.password).end()
                                                    $('#editDoctorForm').find('[name="email"]').val(response.doctor.email).end()
                                                    $('#editDoctorForm').find('[name="address"]').val(response.doctor.address).end()
                                                    $('#editDoctorForm').find('[name="phone"]').val(response.doctor.phone).end()
                                                    $('#editDoctorForm').find('[name="crm"]').val(response.doctor.crm).end()
                                                    $('#editDoctorForm').find('[name="consultorio"]').val(response.doctor.consultorio).end()
                                                    $('#editDoctorForm').find('[name="department"]').val(response.doctor.department).end()
                                                    $('#editDoctorForm').find('[name="profile"]').val(response.doctor.profile).end()

                                                    $('.js-example-basic-single.department').val(response.doctor.department).trigger('change');
                                                });
                                            });
    });
</script>
<script>
    $(document).ready(function () {
        $(".flashmessage").delay(3000).fadeOut(100);
    });
</script>

