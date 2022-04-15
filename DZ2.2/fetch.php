<?php
$connect = mysqli_connect("localhost", "root", "", "workorder");
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = "
	SELECT * FROM dispatcher
	WHERE name LIKE '%".$search."%'
	";
}
else
{
	$query = "
	SELECT * FROM dispatcher ORDER BY name";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
	$output .= '<div class="table">
					<table class="table">
						<tr>
							<th>Id</th>
							<th>Name</th>
							<th>Phone</th>
						</tr>';
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<tr>
				<td>'.$row["id"].'</td>
				<td>'.$row["name"].'</td>
				<td>'.$row["phone"].'</td>
				<td><button>Detalji</button>
                <button>Uredi</button>
                <button>Obriši</button>
                </td>
			</tr>
		';
	}
	echo $output;
}
else
{
	echo 'Dispatcher nije u bazi.';
}
?>