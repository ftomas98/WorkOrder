<div class="forma" >
<div class="title">Are you sure?</div>
<td><a href="?controller=location&action=delete&loc=<?php echo $_GET["loc"]?>" class="DelBtn"> Confirm</a></td>
<td><a onclick="goBack()" class="DodajBtn">Back</a></td>

<script>
function goBack() {
    window.history.back();
}
</script>
</div>