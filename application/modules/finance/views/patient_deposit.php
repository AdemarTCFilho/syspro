
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                <i class="fa fa-money"></i>  <?php echo lang('payment_history'); ?>
            </header>
            <div class=" panel-body col-md-8">
                <div class="adv-table editable-table ">
                    <div class="panel-body no-print pull-left">
                        <a href="finance/addPaymentByPatientView?id=<?php echo $patient->id; ?>&type=gen">
                            <div class="btn-group">
                                <button id="" class="btn">
                                    <i class="fa fa-plus-circle"></i> <?php echo lang('add_payment'); ?>
                                </button>
                            </div>
                        </a>     
                    </div>
                    <div class="panel-body no-print">
                        <a data-toggle="modal" href="#myModal">
                            <div class="btn-group">
                                <button id="" class="btn green">
                                    <i class="fa fa-plus-circle"></i> <?php echo lang('deposit'); ?>
                                </button>
                            </div>
                        </a>   
                    </div>
                    <header class="panel-heading">
                        <i class="fa fa-money"></i>  <?php echo lang('all_bills'); ?> & <?php echo lang('deposits'); ?>
                    </header>
                    <div class="space15"></div>
                    <table class="table table-striped table-hover table-bordered" id="editable-samples">
                        <thead>
                            <tr>
                                <th class=""><?php echo lang('date'); ?></th>
                                <th class=""><?php echo lang('invoice'); ?> #</th>
                                <th class=""><?php echo lang('bill_amount'); ?></th>
                                <th class=""><?php echo lang('deposit'); ?></th>
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
                            .option_th{
                                width:33%;
                            }

                        </style>

                        <?php
                        $dates = array();
                        $datess = array();
                        foreach ($payments as $payment) {
                            $dates[] = $payment->date;
                        }
                        foreach ($deposits as $deposit) {
                            $datess[] = $deposit->date;
                        }
                        $dat = array_merge($dates, $datess);
                        $dattt = array_unique($dat);
                        asort($dattt);

                        $total_pur = array();

                        $total_p = array();
                        ?>

                        <?php
                        foreach ($dattt as $key => $value) {
                            foreach ($payments as $payment) {
                                if ($payment->date == $value) {
                                    ?>
                                    <tr class="">
                                        <td><?php echo date('d/m/y', $payment->date); ?></td>
                                        <td> <?php echo $payment->id; ?></td>
                                        <td><?php echo $settings->currency; ?> <?php echo $payment->gross_total; ?></td>
                                        <td><?php
                                            if (!empty($payment->amount_received)) {
                                                echo $settings->currency;
                                            }
                                            ?> <?php echo $payment->amount_received; ?></td>
                                        <td  class="no-print"> 
                                            <?php if ($this->ion_auth->in_group(array('admin', 'Accountant', 'Receptionist'))) { ?>
                                            <a class="btn btn-info btn-xs width_auto" title="<?php echo lang('edit');?>" style="width: 23px;" href="finance/editPayment?id=<?php echo $payment->id; ?>"><i class="fa fa-edit"> </i></a>
                                            <?php } ?>
                                            <a class="btn btn-xs invoicebutton width_auto" title="<?php echo lang('invoice');?>" style="color: #fff; width: 23px;" href="finance/invoice?id=<?php echo $payment->id; ?>"><i class="fa fa-file-text"></i> </a>
                                            <?php if ($this->ion_auth->in_group(array('admin', 'Accountant', 'Receptionist'))) { ?> 
                                                <a class="btn btn-info btn-xs delete_button width_auto" title="<?php echo lang('delete');?>" style="width: 23px;"  href="finance/delete?id=<?php echo $payment->id; ?>" onclick="return confirm('Tem certeza de que deseja excluir este item?');"><i class="fa fa-trash-o"></i> </a>
                                            <?php } ?>
                                            </button>
                                        </td>
                                    </tr>

                                    <?php
                                }
                            }
                            ?>


                            <?php
                            foreach ($deposits as $deposit) {
                                if ($deposit->date == $value) {
                                    if (!empty($deposit->deposited_amount) && empty($deposit->amount_received_id)) {
                                        ?>

                                        <tr class="">
                                            <td><?php echo date('d-m-y', $deposit->date); ?></td>
                                            <td><?php echo $deposit->payment_id; ?></td>
                                            <td></td>
                                            <td><?php echo $settings->currency; ?> <?php echo $deposit->deposited_amount; ?></td>
                                            <td  class="no-print"> 
                                                <?php if ($this->ion_auth->in_group(array('admin', 'Accountant', 'Receptionist'))) { ?>
                                                    <button type="button" class="btn btn-info btn-xs btn_width editbutton" title="<?php echo lang('edit');?>" style="width: 23px;" data-toggle="modal" data-id="<?php echo $deposit->id; ?>"><i class="fa fa-edit"></i> Edit</button> 
                                                <?php } ?>
                                                <?php if ($this->ion_auth->in_group(array('admin', 'Accountant', 'Receptionist'))) { ?> 
                                                    <a class="btn btn-info btn-xs delete_button width_auto" title="<?php echo lang('delete');?>" style="width: 23px;" href="finance/deleteDeposit?id=<?php echo $deposit->id; ?>&patient=<?php echo $patient->id; ?>" onclick="return confirm('Tem certeza de que deseja excluir este item?');"><i class="fa fa-trash-o"></i></a>
                                                <?php } ?>
                                                </button>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }
                            }
                            ?>
                        <?php } ?>



                        </tbody>

                    </table>
                </div>
            </div>



            <div class="col-md-4">

                <section class="panel m_t">
                    <div class="panel-body profile">

                        <div class="task-thumb-details">
                            <?php echo lang('patient'); ?> <?php echo lang('name'); ?>: <h1><a href="#"><?php echo $patient->name; ?></a></h1> <br>
                            <?php echo lang('address'); ?>: <p> <?php echo $patient->address; ?></p>
                        </div>
                    </div>
                    <table class="table table-hover personal-task">
                        <tbody>
                            <tr>
                                <td>
                                    <i class=" fa fa-envelope"></i>
                                </td>
                                <td><?php echo $patient->email; ?></td>

                            </tr>
                            <tr>
                                <td>
                                    <i class="fa fa-phone"></i>
                                </td>
                                <td><?php echo $patient->phone; ?></td>

                            </tr>

                        </tbody>
                    </table>
                </section>

                <?php
                $total_bill = array();
                foreach ($payments as $payment) {
                    $total_bill[] = $payment->gross_total;
                }
                if (!empty($total_bill)) {
                    $total_bill = array_sum($total_bill);
                } else {
                    $total_bill = 0;
                }
                ?>






                <section class="panel">
                    <div class="weather-bg">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-xs-4">
                                    <i class="fa fa-money"></i>
                                    <?php echo lang('total_bill_amount'); ?>
                                </div>
                                <div class="col-xs-8">
                                    <div class="degree">
                                        <?php echo $settings->currency; ?>
                                        <?php echo $total_payable_bill = $total_bill; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="panel">
                    <div class="weather-bg">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-xs-4">
                                    <i class="fa fa-money"></i>
                                    <?php echo lang('total_deposit_amount'); ?>
                                </div>
                                <div class="col-xs-8">
                                    <div class="degree">
                                        <?php echo $settings->currency; ?>
                                        <?php
                                        $total_deposit = array();
                                        foreach ($deposits as $deposit) {
                                            $total_deposit[] = $deposit->deposited_amount;
                                        }
                                        echo array_sum($total_deposit);
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="panel red"  style="border: 2px solid red; color: red;">
                    <div class="weather-bg">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-xs-4">
                                    <i class="fa fa-money"></i>
                                    <?php echo lang('due_amount'); ?>
                                </div>
                                <div class="col-xs-8">
                                    <div class="degree">
                                        <?php echo $settings->currency; ?>
                                        <?php
                                        echo $total_payable_bill - array_sum($total_deposit);
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>


            </div>
        </section>
        <!-- page end-->
    </section>
</section>
<!--main content end-->
<!--footer start-->



<script>
    $(document).ready(function () {
        $('#editable-samplee').DataTable();
    });
</script>






<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><i class="fa fa-plus-circle"></i> <?php echo lang('add_deposit'); ?></h4>
            </div>
            <div class="modal-body">
                <form role="form" action="finance/deposit" method="post" enctype="multipart/form-data">
                    <div class=payment_label"> 
                        <label for="exampleInputEmail1"><?php echo lang('invoice'); ?></label> 
                        <select class="form-control m-bot15 js-example-basic-single" id="" name="payment_id" value=''> 
                            <option value="">Selecionar .....</option>
                            <?php foreach ($payments as $payment) { ?>
                                <option value="<?php echo $payment->id; ?>" <?php
                                if (!empty($deposit->payment_id)) {
                                    if ($deposit->payment_id == $payment->id) {
                                        echo 'selected';
                                    }
                                }
                                ?> ><?php echo $payment->id; ?> </option>
                                    <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('deposit_amount'); ?></label>
                        <input type="text" class="form-control" name="deposited_amount" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <input type="hidden" name="id" value=''>
                    <input type="hidden" name="patient" value='<?php echo $patient->id; ?>'>
                    <section class="">
                        <button type="submit" name="submit" class="btn btn-info"><?php echo lang('submit'); ?></button>
                    </section>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- Add Patient Modal-->

<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><i class="fa fa-plus-circle"></i> <?php echo lang('choose_payment_type'); ?></h4>
            </div>
            <div class="modal-body">
                <div class="clearfix">
                    <div class="col-lg-12 clearfix">
                        <a href="finance/addPaymentByPatientView?id=<?php echo $patient->id; ?>&type=gen">
                            <div class="col-lg-6">
                                <div class="flat-carousal" style="background: #39B27C;">
                                    <div id="owl-demo" class="owl-carousel owl-theme" style="opacity: 1; display: block;">
                                        <?php echo lang('add_general_payment'); ?> <i style="float: right; font-size: 18px;"class="fa fa-arrow-circle-o-right"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="finance/addPaymentByPatientView?id=<?php echo $patient->id; ?>&type=ot">
                            <div class="col-lg-6">
                                <div class="flat-carousal" style="background: #39B27C;">
                                    <div id="owl-demo" class="owl-carousel owl-theme" style="opacity: 1; display: block;">
                                        <?php echo lang('add_ot_payment'); ?> <i style="float: right; font-size: 18px;"class="fa fa-arrow-circle-o-right"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <div class="col-lg-3"></div>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>







<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><i class="fa fa-plus-circle"></i> <?php echo lang('edit_deposit'); ?></h4>
            </div>
            <div class="modal-body">
                <form role="form" id="editDepositform" action="finance/deposit" method="post" enctype="multipart/form-data">
                    <div class=payment_label"> 
                        <label for="exampleInputEmail1"><?php echo lang('invoice'); ?></label> 
                        <select class="form-control m-bot15 js-example-basic-single" id="" name="payment_id" value=''> 
                            <option value="">Selecionar .....</option>
                            <?php foreach ($payments as $payment) { ?>
                                <option value="<?php echo $payment->id; ?>" <?php
                                if (!empty($deposit->payment_id)) {
                                    if ($deposit->payment_id == $payment->id) {
                                        echo 'selected';
                                    }
                                }
                                ?> ><?php echo $payment->id; ?> </option>
                                    <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('deposit_amount'); ?></label>
                        <input type="text" class="form-control" name="deposited_amount" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <input type="hidden" name="id" value=''>
                    <input type="hidden" name="patient" value='<?php echo $patient->id; ?>'>
                    <section class="">
                        <button type="submit" name="submit" class="btn btn-info"><?php echo lang('submit'); ?></button>
                    </section>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- Add Patient Modal-->






<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $(".editbutton").click(function (e) {
            e.preventDefault(e);
            // Get the record's ID via attribute  
            var iid = $(this).attr('data-id');
            $('#editDepositform').trigger("reset");
            $('#myModal2').modal('show');
            $.ajax({
                url: 'finance/editDepositbyJason?id=' + iid,
                method: 'GET',
                data: '',
                dataType: 'json',
            }).success(function (response) {
                // Populate the form fields with the data returned from server

                $('#editDepositform').find('[name="id"]').val(response.deposit.id).end()
                $('#editDepositform').find('[name="patient"]').val(response.deposit.patient).end()
                $('#editDepositform').find('[name="payment_id"]').val(response.deposit.payment_id).end()
                $('#editDepositform').find('[name="date"]').val(response.deposit.date).end()
                $('#editDepositform').find('[name="deposited_amount"]').val(response.deposit.deposited_amount).end()
            });
        });
    });
</script>
<script>
    $(document).ready(function () {
        $(".flashmessage").delay(3000).fadeOut(100);
    });
</script>

