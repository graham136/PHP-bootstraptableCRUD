<?php session_start();
require 'yourDBconnection.php';
$conn    = Connect();
	
$sql = "SELECT * FROM yourtable where yourcolumns='$yourvalue'";
$result = $conn->query($sql);
 
?>  
 <!DOCTYPE html>  
 <html>  
    <head>  
        <title>Your Results</title>  
        <script src="/jquery-3.3.1.min.js"></script>
		<script src="/bootstrap.min.js"></script>
		<link href="/bootstrap.min.css" rel="stylesheet" />
		
		// The table libraries are not my own.
		// please support the people who wrote these libraries, they are great.	
		//https://datatables.net/examples/styling/bootstrap
		
		<script src="/jquery.dataTables.min.js"></script>
		<script src="/dataTables.bootstrap.min.js"></script>
		<link href="/dataTables.bootstrap.min.css" rel="stylesheet" />
	
	</head>  
<body onload="myFunction()" style="margin:0;">
	<div id="loader"></div>

	<div style="display:none;" id="myDiv" class="animate-bottom">

           <div class="container" >  
                <h2 align="center">Results</h2>  
                <br />  
                <div class="table-responsive" >  
                     <table id="your_data" class="table table-striped table-bordered" style="width:100%">  
                          <thead>  
                               <tr>  
                                    	<td bgcolor='DodgerBlue'>Name</td>  
                                    	<td bgcolor='DodgerBlue'>Surname</td> 
					<td bgcolor='DodgerBlue'>Actions</td>
				</tr>  
                          </thead>  
                          <?php  
							// add actions for each row to edit
                          while($row = mysqli_fetch_array($result))  
                          {  
                               $htmltable ='<td><a class="btn btn-info btn-block " href="phpfiletoReadrowdata.php?id='.$row['id'].'">Read Test</a> ';
								$htmltable .='<a class="btn btn-success btn-block " href="phpfiletoUpdaterow.php?id='.$row['id'].'">Update Test</a>';
								$htmltable .='<a class="btn btn-danger btn-block " href="phpfiletoDeleterow.php?id='.$row['id'].'">Delete Test</a></td>';
	
				echo '  
                               	    <tr>  
                                    <td>'.$row["name"].'</td>  
                                    <td>'.$row["surname"].'</td>  
                                    '.$htmltable.'
                               </tr>  
                               ';  
                          }  
                          ?>  
                     </table>  
                </div>  
           </div>  
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      $('#your_data').DataTable();  
 });  
 </script>  
