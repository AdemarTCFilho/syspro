<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <section class="panel">
            <!-- page start-->
            <div class="row">
                <aside class="profile-nav col-lg-3">
                    <section class="panel">
                        <div class="user-heading round">
                            <a>
                                <img src="<?php echo $patient->img_url ?>" alt="">
                            </a>
                            <h1 class="no-print"><?php echo $patient->name ?></h1>
                         <!--   <p><?php echo $patient->email ?></p> -->
                        </div>
                    </section>
                    <a class="btn btn-primary no-print" href="JavaScript: window.history.back();"><i class="fa fa-mail-reply"> </i> Voltar</a>
                </aside>
                <aside class="profile-info col-lg-9">
                    <section class="panel">
                        <div class="bio-graph-heading">
                            Médico : <?php echo $patient->doctor; ?>
                        </div>
                        <div class="bio-graph-info">
                            <h1>Informações do Paciente</h1>
                            <div class="row">
                                <div class="bio-row">
                                    <p><span>Nome </span>: <?php echo $patient->name; ?></p>
                                </div>

                                <div class="bio-row">
                                    <p><span>Nome da Mãe</span>: <?php echo $patient->name_mother; ?></p>
                                </div>
                                
                                <!--<div class="bio-row">
                                    <p><span>Email </span>: <?php echo $patient->email; ?></p>
                                </div>-->
                                
                                <div class="bio-row">
                                    <p><span>Endereço</span>: <?php echo $patient->address; ?></p>
                                </div>
                                <div class="bio-row">
                                    <p><span>Telefone </span>: <?php echo $patient->phone; ?></p>
                                </div>
                                <div class="bio-row">
                                    <p><span>Sexo </span>: <?php echo $patient->sex; ?></p>
                                </div>
                                
                                <div class="bio-row">
                                    <p><span>Data de Nascimento </span>: <?php echo $patient->birthdate; ?></p>
                                </div>                              
                                <div class="bio-row">
                                    <p><span>Médico </span>: <?php echo $patient->doctor; ?></p>
                                </div>
                                <div class="bio-row">
                                    <p><span>Id do paciente </span>: <?php echo $patient->id; ?></p>
                                </div>
                                <div class="bio-row">
                                    <p><span>Cartão Nacional de Saúde </span>: <?php echo $patient->sus; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="text-center invoice-btn no-print">
                        <a class="btn btn-info btn-lg invoice_button" onclick="javascript:window.print();"><i class="fa fa-print"></i> <?php echo lang('print'); ?> </a>
                    </div>
                    </section>
                </aside>
            </div>
        </section>
        <!-- page end-->
    </section>
</section>
<!--main content end-->
<!--footer start-->
