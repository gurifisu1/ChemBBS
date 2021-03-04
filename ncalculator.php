<!DOCTYPE html>
<html lang="ja">
<head>
	<meta name="viewport" content="width=320, height=480, initial-scale=1.0, minimum-scale=1.0, maximum-scale=2.0, user-scalable=yes">
	<meta charset="utf-8">
	<title>NMR収率計算機</title>
	<link rel="stylesheet" href="style.css">
</head>

<body>

<h1><img src="iconb.png" width="40px">  ChemSquareβ</h1>
<hr>

<h2>NMR収率計算機</h2>

※各値は半角数字で入力してください<br>
※小数点第三位以下は四捨五入されます<br>
※全質量および分子量の入力は任意です
<hr>

<?php
    if (isset($_POST ["calculate"]) && !empty($_POST["propeak"])) {
        //変数定義
        $totalmass = $_POST ["totalmass"];
    	$propeak = $_POST ["propeak"];
	    $propro = $_POST ["propro"];
    	$proweight = $_POST ["proweight"];
	    $imppeak = $_POST ["imppeak"];
    	$imppro = $_POST ["imppro"];
        $impweight = $_POST ["impweight"];
        //モル比計算
        $mratiobase = $propeak / $propro;
        $promratio = $propeak / $propro / $mratiobase;
        $impmratio = $imppeak / $imppro / $mratiobase;
        if (!empty($_POST["proweight"]) && !empty($_POST["impweight"])) {
            //質量比計算
            $wratiobase = $promratio * $proweight;
            $prowratio = $promratio * $proweight / $wratiobase;
            $impwratio = $impmratio * $impweight / $wratiobase;
            if (!empty($_POST["totalmass"])) {
            //質量計算
            $massbase = $prowratio + $impwratio;
            $promass = $totalmass / $massbase * $prowratio;
            $impmass = $totalmass / $massbase * $impwratio;
            }
        }
    }
?>

<form action = "" method = "post" name = "calculate_form">
<table>
    <!-- 一行目 -->
	<tr>
	    <!-- 目的物 -->
		<th>全質量</th>
		<!-- 全体質量（入力） -->
		<td>
		<input type = "number" step="0.01" name = "totalmass" placeholder = "質量を入力" value = "<?php if(isset($totalmass)) {echo round($totalmass, 2);} ?>">
		</td>
    </tr>
	<!-- ニ行目 -->
	<tr>	
    	<th></th>
	    <th>ピーク比</th>
        <th>プロトン数</th>
        <th>分子量</th>
		<th>モル比</th>
		<th>質量比</th>
        <th>質量 (mg)</th>
	</tr>
	<!-- 三行目 -->
	<tr>
		<!-- 目的物 -->
		<th>目的物</th>
		<!-- ピーク比（入力） -->
		<td>
		<input type = "number" step="0.01" name = "propeak" placeholder = "ピーク比を入力" value = "<?php if(isset($propeak)) {echo round($propeak, 2);} ?>">
		</td>
        <!-- プロトン数（入力） -->
		<td>
		<input type = "number" name = "propro" placeholder = "プロトン数を入力" value = "<?php if(isset($propro)) {echo round($propro, 2);} ?>">
        <!-- 分子量（入力） -->
		<td>
		<input type = "number" step="0.01" name = "proweight" placeholder = "分子量を入力" value = "<?php if(isset($proweight)) {echo round($proweight, 2);} ?>">
		</td>
		<!-- モル比（出力） -->
		<td>
		<input name = "promratio" placeholder = "モル比を表示" value = "<?php if(isset($promratio)) {echo round($promratio, 2);} ?>" readonly>
		</td>
		<!-- 質量比（出力） -->
    	<td>
        <input name = "prowratio" placeholder = "質量比を表示" value = "<?php if(isset($prowratio)) {echo round($prowratio, 2);} ?>" readonly>
		</td>
		<!-- 質量（出力） -->
    	<td>
        <input name = "promass" placeholder = "質量を表示" value = "<?php if(isset($promass)) {echo round($promass, 2);} ?>" readonly>
		</td>
	</tr>
    <!-- 四行目 -->
	<tr>
		<!-- 不純物 -->
		<th>不純物</th>
		<!-- ピーク比（入力） -->
		<td>
		<input type = "number" step="0.01" name = "imppeak" placeholder = "ピーク比を入力" value = "<?php if(isset($imppeak)) {echo round($imppeak, 2);} ?>">
		</td>
        <!-- プロトン数（入力） -->
		<td>
		<input type = "number" name = "imppro" placeholder = "プロトン数を入力" value = "<?php if(isset($imppro)) {echo round($imppro, 2);} ?>">
		</td>        
        <!-- 分子量（入力） -->
		<td>
		<input type = "number" step="0.01" name = "impweight" placeholder = "分子量を入力" value = "<?php if(isset($impweight)) {echo round($impweight, 2);} ?>">
		</td>
		<!-- モル比（出力） -->
		<td>
		<input name = "impmratio" placeholder = "モル比を表示" value = "<?php if(isset($impmratio)) {echo round($impmratio, 2);} ?>" readonly>
		</td>
		<!-- 質量比（出力） -->
    	<td>
        <input name = "impwratio" placeholder = "質量比を表示" value = "<?php if(isset($impwratio)) {echo round($impwratio, 2);} ?>" readonly>
		</td>
        <!-- 質量（出力） -->
    	<td>
        <input name = "impmass" placeholder = "質量を表示" value = "<?php if(isset($impmass)) {echo round($impmass, 2);} ?>" readonly>
		</td>
	</tr>
</table>
<input type = "submit" name = "calculate" value = "計算">
<input type = "submit" name = "clear" value = "消去">
</form>

<hr>
<!-- トップページへのリンク -->
<a href="https://tb-221172.tech-base.net/top.html"> ChemSquareトップ </a>

</body>
</html>