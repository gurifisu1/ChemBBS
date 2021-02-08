<html>
<head>

	<meta name="viewport" content="width=320, height=480, initial-scale=1.0, minimum-scale=1.0, maximum-scale=2.0, user-scalable=yes">
		<meta charset="utf-8">
		<title>試薬計算機</title>

</head>

<body>

<h1>化学実験BBS</h1>

<h2>試薬計算機</h2>

<?php
	if (isset($_POST ["calculate"]) && !empty($_POST["SMmass"]) && !empty($_POST["SMweight"])) {
		echo "OK";
		$SMmass = $_POST ["SMmass"];
		$SMweight = $_POST ["SMweight"];
		$SMmoll = $SMmass / $SMweight;
	}else{
		echo "NO";
	}
?>

<table>
	<form action = "" method = "post" name = "calculate_form">
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
		<!-- 原料 -->
    	<td>原料</td>
		<!-- 質量 -->
    	<td>
		<input type = "number" name = "SMmass" placeholder = "質量">
		</td>
		<!-- 分子量 -->
		<td>
		<input type = "number" name = "SMWeight" placeholder = "分子量">
		</td>
		<!-- モル数 -->
    	<td>
        <input type = "number" name = "SMmoll" value = "<?php if(isset($SMmoll)) {echo $SMmoll;} ?>">
		</td>
		<!-- 当量 -->
    	<td>
		<input type = "number" name = "SMequivalent" placeholder = "当量">
		</td>
	</tr>
	<!-- 三行目 -->
	<tr>
		<!-- 試薬 -->
    	<td>試薬</td>
		<!-- 質量 -->
    	<td>
		<input type = "number" name = "SMmass" placeholder = "質量">
		</td>
		<!-- 分子量 -->
		<td>
		<input type = "number" name = "SMWeight" placeholder = "分子量">
		</td>
		<!-- モル数 -->
    	<td><?php  ?></td>
		<!-- 当量 -->
    	<td>
		<input type = "number" name = "SMequivalent" placeholder = "当量">
		</td>
	</tr>
	<input type = "submit" name = "calculate" value = "計算">
	</form>
</table>

</body>
</html>
