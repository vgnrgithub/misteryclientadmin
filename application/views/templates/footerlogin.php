<!-- jQuery -->
<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>assets/js/fastclick.js"></script>
<!-- NProgress -->
<script src="<?php echo base_url(); ?>assets/js/nprogress.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url(); ?>assets/js/icheck.min.js"></script>
<!--<script src="<?php echo base_url(); ?>assets/js/jquery.smartWizard.js"></script>-->
<!-- Custom Theme Scripts -->
<script src="<?php echo base_url(); ?>assets/js/custom.min.js"></script>
<!-- jQuery Smart Wizard -->
<script>
    $(document).ready(function() {
        $('#wizard').smartWizard();

        $('#wizard_verticle').smartWizard({
            transitionEffect: 'slide'
        });

        $('.buttonNext').addClass('btn btn-success');
        $('.buttonPrevious').addClass('btn btn-primary');
        $('.buttonFinish').addClass('btn btn-default');
    });
</script>
<!-- /jQuery Smart Wizard -->
</body>
</html>