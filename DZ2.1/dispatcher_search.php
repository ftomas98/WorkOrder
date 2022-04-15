<?php
// get the query parameter from URL into s variable
if (isset($_REQUEST['s'])) {
	$s = $_REQUEST["s"];
} else {
	$s='';
}

$hint = "";

// lookup all hints from array if $q is different from "" 
if ($s !== "") {
    $s = strtolower($s);
    $len=strlen($s);


//query database
$db = mysqli_connect("localhost","root","");

if($db) {

$result = mysqli_select_db($db, "workorder") or die("Došlo je do problema prilikom odabira baze...");
$sql="SELECT * FROM dispatcher where name LIKE '%$s%'";
//echo $sql;
$result2 = mysqli_query($db, $sql) or die("Došlo je do problema prilikom izvrsavanja upita...");
$n=mysqli_num_rows($result2);

if ($n > 0){
	$hint .= '<div  class="table">
				<table class="table">
					<tr style="color:black">
						<th>Id</th>
						<th>Name</th>
						<th>Phone</th>
					</tr>';
		
	while ($myrow=mysqli_fetch_row($result2)){
			//echo $myrow[0].",".$myrow[1].",".$myrow[2];
			//$hint .= "<div name=\"result\" id=\"".$myrow[1]."\">".$myrow[0].",".$myrow[1].",</div>";
			$hint .= '
			<tr style="color:black">
				<td>'.$myrow[0].'</td>
				<td>'.$myrow[1].'</td>
				<td>'.$myrow[2].'</td>
				<td><button>Detalji</button>
                		<button>Uredi</button>
                		<button>Obrisi</button>
				<br>
                </td>
			</tr>
		';
		}
	}
else {
//echo "No patern rows returned<br>";
}	
}
else {
echo "<br>Nije proslo spajanje<br>";
}
/**********************************************************/
	
}

// Output "no suggestion" if no hint was found or output correct values 
echo $hint === "" ? "no suggestion" : $hint;

?>