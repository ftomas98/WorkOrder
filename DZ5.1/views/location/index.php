<p>Here is a list of all ZUPANIJAs:</p>

<?php foreach($zupanija as $zupanijasingle) { ?>
  <p>
    <?php echo $zupanijasingle->SIFRA_ZUPANIJE ." ".$zupanijasingle->NAZIV_ZUPANIJE  ?>
    <a href='?controller=zupanija&action=deletezupanija&id=<?php echo $zupanijasingle->SIFRA_ZUPANIJE; ?>'>BRISI ZUPANIJU</a>
  </p>
<?php } ?>