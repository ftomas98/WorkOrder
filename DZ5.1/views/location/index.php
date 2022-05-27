
		<div>
			<center><h2>Location</h2></center>
		</div>
  
		<a class="DodajBtn" href="?controller=location&action=verifyinsert" role="button">New location? <i class="fa fa-plus"></i></a>
  

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Email</th>
            <th>CompanyID</th>
						<th colspan="2"></th>
        </tr>
        <?php foreach ($location as $row): ?>
        <tr>
            <td><?php echo $row->id ?></td>
            <td><?php echo $row->name ?></td>
            <td><?php echo $row->address ?></td>
            <td><?php echo $row->phone ?></td>
            <td><?php echo $row->email ?></td>
            <td><?php echo $row->company_id ?></td>
            <td><a href="?controller=location&action=verifyupdate&loc=<?php echo $row->id?>" class="actionBtn">Update<i class="fa fa-edit"></i></a></td>
						<td><a href="?controller=location&action=verifydelete&loc=<?php echo $row->id?>" class="actionBtn">Delete<i class="fa fa-trash"></i></a></td>

        </tr>
        <?php endforeach ?>
    </table>