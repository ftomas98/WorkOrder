<p>Here is a list of all DJELATNIKs:</p>

<?php foreach($djelatnici as $djelatnik) { ?>
  <p>
    <?php echo $djelatnik->IME ." ".$djelatnik->PREZIME  ?>
    <a href='?controller=djelatnici&action=show&id=<?php echo $djelatnik->ID_DJELATNIKA; ?>'>Vidi detalje</a>
  </p>
<?php } ?>