<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('company/create'); ?>

<label for="name">Name</label>
<input type="input" name="client" /><br />

<label for="email">Email</label>
<input type="input" name="clientemail" /><br />

<label for="requester">Requester</label>
<input type="input" name="clientrequester" /><br />

<input type="submit" name="submit" value="Create new company" />

</form>