<div class="forma" >
<div class="title">Are you sure?</div>
<td><a href="?controller=company&action=delete&co=<?php echo $_GET["co"]?>" class="DelBtn"> Confirm</a></td>
<td><a onclick="goBack()" class="DodajBtn">Back</a></td>

<script>
function goBack() {
  window.history.back();
}
</script>
</div>