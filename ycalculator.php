<!DOCTYPE html>
<html lang="ja">
<head>
	<meta name="viewport" content="width=320, height=480, initial-scale=1.0, minimum-scale=1.0, maximum-scale=2.0, user-scalable=yes">
	<meta charset="utf-8">
	<title>収量収率計算機</title>
	<link rel="stylesheet" href="style.css">
</head>

<body>

<h1><img src="iconb.png" width="40px">  ChemSquareβ</h1>
<hr>

<h2>収量収率計算機</h2>

※各値は半角数字で入力してください<br>
※小数点第三位以下は四捨五入されます<br>
※収量計算フォームへの入力は任意です<br>
※収量が判明している場合は風袋込み質量に収量、風袋に0を入力してください
<hr>

<?php
	if (isset($_POST ["calculate"]) && !empty($_POST["SMmass"]) && !empty($_POST["SMweight"])) {
		$SMmass = $_POST ["SMmass"];
		$SMweight = $_POST ["SMweight"];
		$TYweight = $_POST ["TYweight"];
		//モル数計算
		$SMmoll = $SMmass / $SMweight;
		$TYmoll = $SMmoll;
		//理論収量計算
		$TYmass = $TYmoll * $TYweight;
		if (!empty($_POST["WTweight"])) {
			$WTweight = $_POST["WTweight"];
			$Tweight = $_POST["Tweight"];
			//収量計算
			$product = $WTweight - $Tweight;
			//収率計算
			$yield = $product / $TYmass * 100;
		}
	}
?>

<form action = "" method = "post" name = "calculate_form">
<table>
	<!-- 一行目 -->
	<tr>	
    	<th></th>
	    <th>質量 (mg)</th>
		<th>分子量</th>
		<th>モル数 (mmol)</th>
		<th></th>
	</tr>
	<!-- 二行目 -->
	<tr>
		<!-- 原料 -->
		<th>原料</th>
		<!-- 質量（入力） -->
		<td>
		<input type = "number" step="0.01" name = "SMmass" placeholder = "質量を入力" value = "<?php if(isset($SMmass)) {echo round($SMmass, 2);} ?>">
		</td>
		<!-- 分子量（入力） -->
		<td>
		<input type = "number" step="0.01" name = "SMweight" placeholder = "分子量を入力" value = "<?php if(isset($SMweight)) {echo round($SMweight, 2);} ?>">
		</td>
		<!-- モル数（出力） -->
    	<td>
        <input name = "SMmoll" placeholder = "モル数を表示" value = "<?php if(isset($SMmoll)) {echo round($SMmoll, 2);} ?>" readonly>
		</td>
		<!-- 空欄 -->
		<td></td>
	</tr>
	<!-- 三行目 -->
	<tr>
		<!-- 生成物 -->
		<th>生成物</th>
		<!-- 質量（出力） -->
		<td>
		<input name = "TYmass" placeholder = "質量を表示" value = "<?php if(isset($TYmass)) {echo round($TYmass, 2);} ?>" readonly>
		</td>
		<!-- 分子量（入力） -->
		<td>
		<input type = "number" step="0.01" name = "TYweight" placeholder = "分子量を入力" value = "<?php if(isset($TYweight)) {echo round($TYweight, 2);} ?>">
		</td>
		<!-- モル数（出力） -->
    	<td>
        <input name = "TYmoll" placeholder = "モル数を表示" value = "<?php if(isset($TYmoll)) {echo round($TYmoll, 2);} ?>" readonly>
		</td>
		<!-- 空欄 -->
		<td></td>
	</tr>
	<!-- 四行目 -->
	<tr>
		<th></th>
	    <th>風袋込 (mg)</th>
		<th>風袋 (mg)</th>
		<th>収量 (mg)</th>
		<th>収率 (%)</th>
	</tr>
	<!-- 五行目 -->
	<tr>
		<!-- 収量 -->
		<th>収量</th>
		<!-- 風来込み（入力） -->
		<td>
		<input type = "number" step="0.01" name = "WTweight" placeholder = "風袋込を入力" value = "<?php if(isset($WTweight)) {echo round($WTweight, 2);} ?>">
		</td>
		<!-- 風袋（入力） -->
		<td>
		<input type = "number" step="0.01" name = "Tweight" placeholder = "風袋を入力" value = "<?php if(isset($Tweight)) {echo round($Tweight, 2);} ?>">
		</td>
		<!-- 収量（出力） -->
		<td>
		<input name = "product" placeholder = "収量を表示" value = "<?php if(isset($product)) {echo round($product, 2);} ?>" readonly>
		</td>
		<!-- 収率（出力） -->
		<td>
		<input name = "yield" placeholder = "収率を表示" value = "<?php if(isset($yield)) {echo round($yield, 2);} ?>" readonly>
		</td>
	</tr>
</table><br>
<input type = "submit" name = "calculate" value = "計算">
<input type = "submit" name = "clear" value = "消去">
</form>

<hr>
<!-- トップページへのリンク -->
<a href="https://tb-221172.tech-base.net/top.html"> ChemSquareトップ </a>

</body>
</html>