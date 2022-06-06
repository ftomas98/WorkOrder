<div class="forma">
<div class="title">Edit Manager</div>
<form action="?controller=manager&action=updatemanager" method="POST">
  <div class="form-group">
    <input type="number" readonly class="form-control" placeholder="ID" name="man" value=<?php echo $managerdetails->id?>>
    </div>
  <div class="form-group">
    <input type="text" class="form-control" name="name" placeholder="Name" value=<?php echo $managerdetails->name?>>
  </div>
  <div class="form-group">
    <input type="number" class="form-control" name="location_id" placeholder="LocationID" value=<?php echo $managerdetails->location_id?>>
  </div>
    <button type="submit" class="DodajBtn">Confirm</button>
</form> 
</div>