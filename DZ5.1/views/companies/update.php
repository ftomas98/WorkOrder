<div class="forma">
<div class="title">Edit Company</div>
<form action="?controller=companies&action=updatecompanies" method="POST">
  <div class="form-group">
    <input type="number" readonly class="form-control" placeholder="ID" name="comp" value=<?php echo $companydetails->id?>>
  <div class="form-group">
    <input type="text" class="form-control" name="company_name"  placeholder="Company name" value=<?php echo $companydetails->company_name?>>
  </div>
  <div class="form-group">
    <input type="text" class="form-control" name="address"  placeholder="Address" value=<?php echo $companydetails->address?>>
  </div>
  <div class="form-group">
    <input type="number" class="form-control" name="phone"  placeholder="Phone" value=<?php echo $companydetails->phone?>>
  </div>
  <div class="form-group">
    <input type="text" class="form-control" name="fax"  placeholder="Fax" value=<?php echo $companydetails->fax?>>
  </div>
  <div class="form-group">
    <input type="text" class="form-control" name="email"  placeholder="Email" value=<?php echo $companydetails->email?>>
  </div>
  <div class="form-group">
    <input type="text" class="form-control" name="website"  placeholder="Website" value=<?php echo $companydetails->website?>>
  </div>
  <div class="form-group">
    <input type="text" class="form-control" name="description"  placeholder="Description" value=<?php echo $companydetails->description?>>
  </div>
    <button type="submit" class="DodajBtn">Confirm</button>
</form> 
</div>