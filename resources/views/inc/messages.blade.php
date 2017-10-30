
<!-- If there are error, fe. the fields are empty, show these errors -->
<?php if ( count( $errors ) > 0 ) {
	 foreach ( $errors->all() as $error ) { ?>
          <div class="alert alert-danger">
              <p> <?php echo $error; ?> </p>
          </div>
	<?php  } 
} ?> 

<?php if ( session('success') ) { ?>
       <div class="alert alert-success">
              <p> <?php echo session('success'); ?> </p>
          </div>
<?php } ?>

<?php if ( session('error') ) { ?>
       <div class="alert alert-danger">
              <p> <?php echo session('error'); ?> </p>
          </div>
<?php } ?>