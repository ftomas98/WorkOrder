	
		<div>
			<center><h2>Manager</h2></center>
		</div>
		<a class="DodajBtn" href="?controller=manager&action=verifyinsert" role="button">New manager? <i class="fa fa-plus"></i></a>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>LocationID</th>
						<th colspan="2"></th>
        </tr>
        <?php foreach ($manager as $row): ?>
        <tr>
            <td><?php echo $row->id ?></td>
            <td><?php echo $row->name ?></td>
            <td><?php echo $row->location_id ?></td>
            <td><a href="?controller=manager&action=verifyupdate&man=<?php echo $row->id?>" class="actionBtn">Update<i class="fa fa-edit"></i></a></td>
						<td><a href="?controller=manager&action=verifydelete&man=<?php echo $row->id?>" class="actionBtn">Delete<i class="fa fa-trash"></i></a></td>

        </tr>
        <?php endforeach ?>
    </table>