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
                                <li><a href="<?php echo base_url(); ?>index.php/agent/logout"><i class="fa fa-sign-out pull-right"></i> Cerrar sesión</a></li>
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
                        <h3>Mis Auditorías <small>De mis clientes</small></h3>
                    </div>
                    <a href="<?php echo base_url(); ?>index.php/audit/create/<?php echo $companyid; ?>" class="btn btn-success">Nueva Auditoría</a>
                </div>

                <div class="clearfix"></div>

                <div class="row">

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">

                                <div class="clearfix"></div>
                            </div>

                            <div class="x_content">


                                <div class="table-responsive">
                                    <table class="table table-striped jambo_table">
                                        <thead>
                                        <tr class="headings">
                                            <th class="column-title">Nombre </th>
                                            <th class="column-title">Categoría </th>
                                            <th class="column-title">Estado </th>
                                            <th class="column-title">Fecha </th>
                                            <th class="column-title no-link last"><span class="nobr">Acciones</span>
                                            </th>
                                            <th class="bulk-actions" colspan="7">
                                                <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                            </th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        <?php foreach ($audits as $audit): ?>
                                            <tr class="even pointer">
                                                <td class=" "><?php echo $audit['name']; ?></td>
                                                <td class=" "><?php echo $audit['category_id']; ?></td>
                                                <td class=" "><?php echo $audit['state']; ?></td>
                                                <td class=" "><?php echo $audit['created']; ?></td>
                                                <td class=" last"><a href="<?php echo base_url(); ?>index.php/response/edit/<?php echo $audit['id']; ?>">Editar auditoría</a>
                                                -- <a href="<?php echo base_url(); ?>index.php/audit/pdf/<?php echo $audit['id']; ?>">Generar PDF</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->
    </div>
</div>