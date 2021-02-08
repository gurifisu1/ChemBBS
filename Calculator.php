<html>
<head>

	<meta name="viewport" content="width=320, height=480, initial-scale=1.0, minimum-scale=1.0, maximum-scale=2.0, user-scalable=yes">
		<meta charset="utf-8">
		<title>試薬計算機</title>

</head>

<body>

<h1>試薬計算機</h1>

<?php
	if ($_POST ["calculate"] == "計算" && !empty($_POST["SMmass"]) && !empty($_POST["SMweight"])) {
		$SMmass = $_POST ["SMmass"];
		$SMweight = $_POST ["SMweight"];
		$SMmoll = $SMmass / $SMweight;
	}
?>

<table>
	<!-- 一行目 -->
	<tr>	
    	<th></th>
	    <th>質量</th>
		<th>分子量</th>
		<th>モル数</th>
		<th>当量</th>
	</tr>
	<!-- ニ行目 -->
	<tr>
    	<td>原料</td>
		<!-- 質量 -->
    	<td>
		<form action = "" method = "post" name = "SMmass_form">
		<input type = "number" name = "SMmass" placeholder = "質量">
		</form>
		</td>
		<!-- 分子量 -->
		<td>
		<form action = "" method = "post" name = "SMweight_form">
		<input type = "number" name = "SMWeight" placeholder = "分子量">
		</form>
		</td>
		<!-- モル数 -->
    	<td>
		<form action = "" method = "post" name = "SMmoll_form">
        <input type = "number" name = "SMmoll" value = "<?php echo $SMmoll; ?>">
		</td>
		<!-- 当量 -->
    	<td>
		<form action = "" method = "post" name = "SMequivalent_form">
		<input type = "number" name = "SMequivalent" placeholder = "当量">
		</form>
		</td>
	</tr>
	<!-- 三行目 -->
	<tr>
    	<td>試薬</td>
		<!-- 質量 -->
    	<td>
		<form action = "" method = "post" name = "SMmass_form">
		<input type = "number" name = "SMmass" placeholder = "質量">
		</form>
		</td>
		<!-- 分子量 -->
		<td>
		<form action = "" method = "post" name = "SMweight_form">
		<input type = "number" name = "SMWeight" placeholder = "分子量">
		</form>
		</td>
		<!-- モル数 -->
    	<td><?php  ?></td>
		<!-- 当量 -->
    	<td>
		<form action = "" method = "post" name = "SMequivalent_form">
		<input type = "number" name = "SMequivalent" placeholder = "当量">
		</form>
		</td>
	</tr>
	<form action = "" method = "post" name = "calculate_form">
	<input type = "submit" name = "calculate" value = "計算">
	</form>
</table>

</body>
</html>