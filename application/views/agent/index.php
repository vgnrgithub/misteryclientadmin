<div>
    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <?php $this->load->library('form_validation'); ?>
                <?php echo validation_errors(); ?>
                <?php echo form_open('agent/login'); ?>
                    <h1>Introduce tus datos</h1>
                    <div>
                        <input name="email" type="text" class="form-control" placeholder="Email" required="" />
                    </div>
                    <div>
                        <input name="password" type="password" class="form-control" placeholder="Contraseña" required="" />
                    </div>
                    <div>
                        <input class="btn btn-default submit" type="submit" name="submit" value="Iniciar sesión" />
                        <a class="reset_pass" href="#">Lost your password? Contact us at email@email.com</a>
                    </div>

                    <div class="clearfix"></div>
                    <div class="separator">

                        <div class="clearfix"></div>
                        <br />

                        <div>
                            <h1><i class="fa fa-cloud"></i> MisteryClient</h1>
                            <p>©2016 All Rights Reserved.</p>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
</div>