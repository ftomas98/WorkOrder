<div class="forma" >
<div class="title">Are you sure?</div>
<td><a href="?controller=manager&action=delete&man=<?php echo $_GET["man"]?>" class="DelBtn"> Confirm</a></td>
<td><a onclick="goBack()" class="DodajBtn">Back</a></td>

<script>
function goBack() {
  window.history.back();
}
</script>
</div>