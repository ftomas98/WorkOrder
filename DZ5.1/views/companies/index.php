
		<div>
			<center><h2>Companies</h2></center>
		</div>
 
  <a class="DodajBtn" href="?controller=company&action=verifyinsert" role="button">New company? <i class="fa fa-plus"></i></a>

 
    <table>
        <tr>
            <th>ID</th>
            <th>Company Name</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Fax</th>
            <th>Email</th>
            <th>Website</th>
            <th>Description</th>
						<th colspan="2"></th>
        </tr>
        <?php foreach ($company as $row): ?>
        <tr>
            <td><?php echo $row->id ?></td>
            <td><?php echo $row->company_name ?></td>
            <td><?php echo $row->address ?></td>
            <td><?php echo $row->phone ?></td>
            <td><?php echo $row->fax ?></td>
            <td><?php echo $row->email ?></td>
            <td><?php echo $row->website ?></td>
            <td><?php echo $row->description ?></td>
            <td><a href="?controller=company&action=verifyupdate&comp=<?php echo $row->id?>" class="actionBtn">Update<i class="fa fa-edit"></i></a></td>
            <td><a href="?controller=company&action=verifydelete&comp=<?php echo $row->id?>" class="actionBtn">Delete<i class="fa fa-trash"></i></a></td>

        </tr>
        <?php endforeach ?>
    </table>