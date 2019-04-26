<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
              <i class="fa fa-money"></i>   <?php echo lang('expense_categories'); ?>
            </header>
            <div class="panel-body">
                <div class="adv-table editable-table ">
                    <div class="clearfix no-print">
                        <a href="finance/addExpenseCategoryView">
                            <div class="btn-group">
                                <button id="" class="btn green">
                                    <i class="fa fa-plus-circle"></i> <?php echo lang('add_expense_category'); ?>
                                </button>
                            </div>
                        </a>
                        <button class="export no-print" onclick="javascript:window.print();"><?php echo lang('print'); ?></button>  
                    </div>
                    <div class="space15"></div>
                    <table class="table table-striped table-hover table-bordered" id="editable-sample">
                        <thead>
                            <tr>
                                <th><?php echo lang('category'); ?></th>
                                <th><?php echo lang('description'); ?></th>
                                <?php if ($this->ion_auth->in_group('admin')) { ?>
                                    <th class="no-print"><?php echo lang('options'); ?></th>
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

                        <?php foreach ($categories as $category) { ?>
                            <tr class="">
                                <td><?php echo $category->category; ?></td>
                                <td> <?php echo $category->description; ?></td>
                                <?php if ($this->ion_auth->in_group('admin')) { ?>
                                    <td class="no-print">
                                        <a class="btn btn-info btn-xs editbutton" title="<?php echo lang('edit'); ?>" href="finance/editExpenseCategory?id=<?php echo $category->id; ?>"><i class="fa fa-edit"></i> </a>
                                        <a class="btn btn-info btn-xs delete_button" title="<?php echo lang('delete'); ?>" href="finance/deleteExpenseCategory?id=<?php echo $category->id; ?>" onclick="return confirm('Tem certeza de que deseja excluir este item?');"><i class="fa fa-trash-o"></i> </a>
                                    </td>
                                <?php } ?>
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
