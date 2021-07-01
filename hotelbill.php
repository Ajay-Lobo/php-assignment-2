<html>
<head>
<STYLE>
		body
		{
			height: 750px;
			width: 400px;
			border: 5px solid green;
			border-style:ridge;
			color:blue;
		}
		th, tr, td
		{
			
			width: 300px;
			height: 50px;
			font-family:consolas;
			
		}
	
		
	</STYLE>
</head>
<body>

	<?php
	$billno = $_POST['blno'];
	$itemname =$_POST['items'];
	$itemprice =$_POST['prices'];
	$quantity = $_POST['quantity'];
	
	if( empty($billno) || empty($itemname)|| empty($itemprice)||  empty($quantity))
	{
	die(" Please fill all the fields ");
	}
	
	$items = explode(" ",$itemname);
	$price = explode(" ",$itemprice);
	$quantity = explode(" ",$quantity);
	
	
	$item_count = count($items); 
	$price_count = count($price);
	$quan_count = count($quantity);
 
 
 
	if(($item_count!= $price_count) || ($price_count != $quan_count) || ($item_count!= $quan_count ))
	{
	die("The number of items, price and quantity should match ");
	}
	?>
 
 
	<table align=center ><br>
 
	<tr><th colspan= 2><h2>CASTLE RESTURANT</h2> Q-24, Oberoi Mall, <br>Goregaon East, Mumbai -<br>400065<br></th></tr>
 <tr style="height:30px;">
	</tr>
	<tr>
	<td style="border-top:3px dashed black;">Date : <?php echo date("d-m-Y"); ?> 
	<br>
	<br>
	Bill No :<?php echo $billno; ?>
	</td> 
	<td style="border-top:3px dashed black;"></td>
	</tr>
	</table>
	
	<table>
	<tr style="height:10px;">
	</tr>
	
	<tr style="height:50px;"><th style=" border-bottom: 3px dashed black; border-top:3px dashed black;"> &nbsp; PARTICULARS </th>
 
	<th style=" border-bottom: 3px dashed black; border-top:3px dashed black;"> QTY </th>
	
	<th style=" border-bottom: 3px dashed black; border-top:3px dashed black;text-align:left;">  RATE </th>
 
 
	<th style=" border-bottom: 3px dashed black; border-top:3px dashed black;"> AMOUNT </th>
	</tr>
	
	<?php 
	for($i=0; $i<$item_count ;$i++)
	{	
	echo "<tr><td> &emsp; &nbsp; ".$items[$i]." </td>
	<td align=center>" .$quantity[$i]."</td> 
	<td>".$price[$i]."</td><td align=center>" .($quantity[$i]*$price[$i]). "</td>
	</tr>";
	}
	echo "</table>";
	
	$tamount=0;
	$tax=0;
	$gtotal=0;
	for($i=0; $i<$item_count ;$i++)
	{
		$amount[$i]=$quantity[$i]*$price[$i];
		$tamount=$tamount+$amount[$i];
	}
	$tax=$tamount*0.1;
	$gtotal=$tax+$tamount;
	?>
	<table>
	<tr><th colspan=2 align=CENTER style="border-top:3px dashed black;">  SUB TOTAL</th><th align=center style="border-top:3px dashed black;"> &emsp; &emsp; &emsp; &emsp; &emsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;<?php echo $tamount; ?></th>
	</tr>
		<tr><th colspan=2 align=CENTER> TAX(10%)</th>
		
		<th align=center > &emsp; &emsp; &emsp; &emsp; &emsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; <?php echo $tax; ?></th></tr>


	
	<tr> <th colspan=2 align=center style="border-bottom:3px dashed black;  font-size:24px;" >TOTAL </th>
	
<th style="  border-bottom:3px dashed black; "> &emsp; &emsp; &emsp; &emsp; &nbsp; &nbsp; &nbsp; &nbsp; <?php echo "₹ ".$gtotal; ?></th>
	</tr>

	</table>
	<table>
	<tr>
	<th align=left>GSTN</TH><TH align=right>234567542235666633</th></tr>
	</table>
	<br>
	<br>
	<h3 style="font-family:consolas; text-align:center; "> Thank You. Visit Us Again! </h3> 
</body>
</html>