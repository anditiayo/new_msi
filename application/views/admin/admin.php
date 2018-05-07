<style type="text/css">

        #outerdiv {
            position: absolute;
            top: 0;
            left: 0;
            right: 23em;
        }
        #innerdiv {
            width: 100%;
            overflow-x:scroll;
            margin-left: 23em;
            margin-right: -23em;
            overflow-y:visible;
            padding-bottom:1px;
        }
         .headcol-1 {
            position:absolute;
           
            width:3em;
            left:0;
            right: 5em;
            top:auto;
            border-right: 0px none black;
            border-top-width:3px;
            /*only relevant for first row*/
            margin-top:-3px;
            /*compensate for top border*/
            background:yellow;
        }
        .headcol {
            position:absolute;
           
            width:15em;
            left:3em;
            right: 5em;
            top:auto;
            border-right: 0px none black;
            border-top-width:3px;
            /*only relevant for first row*/
            margin-top:-3px;
            /*compensate for top border*/
            background:yellow;
        }
        .headcol2 {
            position:absolute;
           
            width:5em;
            left:18em;
            right: 5em;
            top:auto;
            border-right: 0px none black;
            border-top-width:3px;
            /*only relevant for first row*/
            margin-top:-3px;
            /*compensate for top border*/
            background:yellow;
        }
        .headcol:before {
           
        }
        .long {
            background:#EEE;
           
        }
</style>
<div id="outerdiv">
    <div id="innerdiv">
        
        <?php 
	$start = '2018-04-01';
	$end = '2018-04-30';
	$db 	= mysqli_connect('localhost', 'root', 'toor', 'smarthr');
	$get 	= mysqli_query($db,"SELECT code,name FROM employee WHERE code between '2090' and '2200' order by code asc LIMIT 0,30");
	//$get 	= mysqli_query($db,"SELECT code,name FROM employee order by code asc  LIMIT 0,20");
	$datediff = strtotime($end) - strtotime($start);
	$datediff = floor($datediff/(60*60*24));
	
	function get_masuk($code,$true){
		$queries 	= "SELECT date_time FROM msi_log_data where pin = '$code' and tgl = '$true' and status = 0 LIMIT 1";
		$get_code 	= mysqli_query($db,$queries);
		$klo 		= mysqli_fetch_array($get_code);
		echo '<td>'.$klo['date_time'].'</td>'; 
		
		
	}

	function differenceInHours($startdate,$enddate){
	$starttimestamp = strtotime($startdate);
	$endtimestamp = strtotime($enddate);
	$difference = abs($endtimestamp - $starttimestamp)/3600;
	return $difference;
}
	
	echo '<table class="table table-bordered table-hover" >';
	echo '<thead class="thead-default thead-lg">';
	echo "<tr>";
	
	echo "</tr>";

	echo "<tr>";
		echo '<th class="headcol-1">&nbsp;&nbsp;</th>'; 
		echo "<th colspan='3' class='headcol'>";
		echo "WEEK";
		echo "</th>";
		for($i = 0; $i < $datediff + 1; $i++)
		{
			echo '<th>'.date("w", strtotime($start . ' + ' . $i . 'day')) .'</th>'; 
		}
	echo "</tr>";
	echo "<tr>";
		echo '<th class="headcol-1">&nbsp;&nbsp;</th>'; 
		echo "<th colspan='3' class='headcol'>";
		echo "DAY";
		echo "</th>";
		for($i = 0; $i < $datediff + 1; $i++)
		{
			echo '<th>'.date("D", strtotime($start . ' + ' . $i . 'day')) .'</th>'; 
		}
	echo "</tr>";
	
	echo "<tr>";
		echo '<th class="headcol-1">&nbsp;&nbsp;</th>'; 
		echo "<th colspan='3' class='headcol'>";
		echo "DATE";
		echo "</th>";
		for($i = 0; $i < $datediff + 1; $i++)
		{
			echo '<th>'.date("m/d", strtotime($start . ' + ' . $i . 'day')) .'</th>'; 
		}
	echo "</tr>";
	echo "<tr>";
		echo "<th colspan='2' class='headcol-1'>";
		echo "NO";
		echo "</th>";
		echo "<th colspan='2' class='headcol'>";
		echo "NAME";
		echo "</th>";
		echo "<th colspan='2' class='headcol2'>";
		echo "NIK";
		echo "</th>";
		echo '<th colspan="30">HASIL PERHITUNGAN</th>'; 
		
	echo "</tr>";
	echo '</thead>';
    echo '<tbody>';
	$x = 1;
	while($data = mysqli_fetch_array($get))
	{
		echo "<tr style='overflow: visible;'>";
			echo "<td class='headcol-1'>";
				echo $x;
			echo "</td>";
			echo "<td class='headcol2' >";
				echo $code = $data['code'];
			echo "</td>";
			echo "<td class='headcol'>";
				echo $data['name'];
				echo '</td>'; 
				for($i = 0; $i < $datediff + 1; $i++)
				{
					
					$true 		= date("Y/m/d", strtotime($start . ' + ' . $i . 'day'));
					$queries 	= "SELECT date_time FROM msi_log_data where pin = '$code' and tgl = '$true' and status = 0 LIMIT 1";
					$get_code 	= mysqli_query($db,$queries);
					$klo 		= mysqli_fetch_array($get_code);
					
					$queries2 	= "SELECT date_time FROM msi_log_data where pin = '$code' and tgl = '$true' and status = 1 LIMIT 1";
					$get_code2 	= mysqli_query($db,$queries2);
					$klo2 		= mysqli_fetch_array($get_code2);
					
					$datetime1 = strtotime($klo['date_time']);
					$datetime2 = strtotime($klo2['date_time']);
					
					
					$datetime1 = new DateTime($klo['date_time']);
					$datetime2 = new DateTime($klo2['date_time']);
					
					$interval = $datetime1->diff($datetime2);
					

					echo '<td class="long">';
					$masuk = $klo['date_time']; 
					if($masuk == NULL){
						echo '0';
					}else
						
						echo $interval->format('%H,%i');
						//echo date("H:i:s", strtotime($klo['date_time']));
					echo '</td>'; 
					//echo '<td>'.date("m/d", strtotime($start . ' + ' . $i . 'day')) .'</td>'; 
				}
				
				
				
			echo "</td>";
			$x++;
		echo "</tr>";
		
		
	
	} 
	 echo '</tbody>';
	echo "</table>";
	
?>

    </div>
</div>