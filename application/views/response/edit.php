<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="<?php echo base_url(); ?>index.php/agent/login" class="site_title"><i class="fa fa-cloud"></i> <span>MisteryClient</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile">
                    <div class="profile_pic">
                        <img src="<?php echo base_url(); ?>assets/images/img.jpg" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Bienvenido,</span>
                        <h2><?php echo $agent['name']; ?></h2>
                    </div>
                </div>
                <!-- /menu profile quick info -->

                <br />

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <h3>General</h3>
                        <ul class="nav side-menu">
                            <li><a><i class="fa fa-home"></i> Inicio <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="login">Mis Clientes</a></li>
                                </ul>
                            </li>

                        </ul>
                    </div>


                </div>
                <!-- /sidebar menu -->


            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <img src="<?php echo base_url(); ?>assets/images/img.jpg" alt=""><?php echo $agent['name']; ?>
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="<?php echo base_url(); ?>index.php/agent/logout"><i class="fa fa-sign-out pull-right"></i> Cerra sesión</a></li>
                            </ul>
                        </li>


                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Auditoría</h3>
                    </div>

                </div>

                <div class="clearfix"></div>

                <div class="row">

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2><?php echo $audit['name']; ?></h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">


                                <!-- Smart Wizard -->
                                <p>Completa o edita la información de la auditoría completando las preguntas.</p>
                                <div id="wizard" class="form_wizard wizard_horizontal">
                                    <!--<ul class="wizard_steps">
                                        <li>
                                            <a href="#step-1">
                                                <span class="step_no">1</span>
                                                <span class="step_descr">
                                              Paso 1<br />
                                          </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#step-2">
                                                <span class="step_no">2</span>
                                                <span class="step_descr">
                                              Paso 2<br />
                                          </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#step-3">
                                                <span class="step_no">3</span>
                                                <span class="step_descr">
                                              Paso 3<br />
                                          </span>
                                            </a>
                                        </li>

                                    </ul>-->
                                    <div id="step-1">
                                        <?php
                                        $attributes = array('class' => 'form-horizontal form-label-left');
                                        echo form_open('response/update', $attributes);
                                        ?>
                                        <input type="hidden" value="<?php echo $audit['id']; ?>" name="auditoriaid">
                                        <?php
                                        foreach ($questions as $question):
                                            ?>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"><?php echo $question['text']; ?> <span class="required">*</span>
                                                </label><a class="showinfo"><img src="<?php echo base_url(); ?>assets/images/info_png.png" style="width: 30px;"/></a>
                                                <div class="infodiv"><?php echo $question['explication']; ?></div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="hidden" value="<?php echo $question['question_id']; ?>" name="questionid[]">
                                                    <input type="hidden" value="<?php echo $question['response_id']; ?>" name="responseid[]">
                                                    <input type="text" id="first-name" value="<?php echo $question['response'] ?>" name="response[]" class="form-control col-md-7 col-xs-12" spellcheck="true">
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                        <button type="submit" class="btn btn-success">Guardar</button>
                                        </form>
                                    </div>
                                    <!--<div id="step-2">
                                        <h2 class="StepTitle">Step 2 Content</h2>
                                        <p>
                                            do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                                            fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                        </p>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
                                            in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                        </p>
                                    </div>
                                    <div id="step-3">
                                        <h2 class="StepTitle">Step 3 Content</h2>
                                        <p>
                                            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore
                                            eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                        </p>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
                                            in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                        </p>
                                    </div>-->


                                </div>
                                <!-- End SmartWizard Content -->
                                <!-- End SmartWizard Content -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->
    </div>
</div>