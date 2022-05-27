<div class="forma">
<div class="title">Edit Location</div>
<form action="?controller=location&action=updatelocation" method="POST">
  <div class="form-group">
    <input type="number" readonly class="form-control" placeholder="ID" name="loc" value=<?php echo $locationdetails->id?>>
  <div class="form-group">
    <input type="text" class="form-control" name="name" placeholder="Name" value=<?php echo $locationdetails->name?>>
  </div>
  <div class="form-group">
    <input type="text" class="form-control" name="address" placeholder="Address" value=<?php echo $locationdetails->address?>>
  </div>
  <div class="form-group">
    <input type="text" class="form-control" name="phone" placeholder="Phone" value=<?php echo $locationdetails->phone?>>
  </div>
  <div class="form-group">
    <input type="text" class="form-control" name="email" placeholder="Email" value=<?php echo $locationdetails->email?>>
  </div>
  <div class="form-group">
    <input type="number" class="form-control" name="company_id" placeholder="CompanyID" value=<?php echo $locationdetails->company_id?>>
  </div>
    <button type="submit" class="DodajBtn">Confirm</button>
</form> 
</div>