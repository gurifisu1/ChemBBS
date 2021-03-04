<!DOCTYPE html>
<html lang="ja">
<head>
	<meta name="viewport" content="width=320, height=480, initial-scale=1.0, minimum-scale=1.0, maximum-scale=2.0, user-scalable=yes">
	<meta charset="utf-8">
	<title>試薬計算機</title>
	<link rel="stylesheet" href="style.css">
</head>

<body>

<h1><img src="iconb.png" width="40px">  ChemSquareβ</h1>
<hr>

<h2>試薬当量計算機</h2>

※各値は半角数字で小数点第二位以上で入力してください<br>
※小数点第三位以下は四捨五入されます<br>
※試薬２以下および溶媒の入力は任意です
<hr>

<?php
if (isset($_POST ["calculate"]) && !empty($_POST["SMmass"]) && !empty($_POST["SMweight"])) {
    //変数定義
	$SMmass = $_POST ["SMmass"];
	$SMweight = $_POST ["SMweight"];
	$SMeq = $_POST ["SMeq"];
	$SLdensity = $_POST ["SLdensity"];
	$SLconcent = $_POST ["SLconcent"];
    $choice = $_POST ["choice"];
	//原料計算
	$SMmoll = $SMmass / $SMweight;
    //試薬１計算
    if(!empty($_POST["RAweight1"]) && !empty($_POST["RAeq1"])) {
        $RAweight1 = $_POST ["RAweight1"];
        $RAeq1 = $_POST ["RAeq1"];
	    $RAmoll1 = $SMmoll * $RAeq1;
	    $RAmass1 = $RAweight1 * $RAmoll1;
    	//試薬２計算
	    if(!empty($_POST["RAweight2"]) && !empty($_POST["RAeq2"])) {
		    $RAweight2 = $_POST ["RAweight2"];
    		$RAeq2 = $_POST ["RAeq2"];
	    	$RAmoll2 = $SMmoll * $RAeq2;
		    $RAmass2 = $RAweight2 * $RAmoll2;
    		//試薬３計算
	    	if(!empty($_POST["RAweight3"]) && !empty($_POST["RAeq3"])) {
		    	$RAweight3 = $_POST ["RAweight3"];
			    $RAeq3 = $_POST ["RAeq3"];
    			$RAmoll3 = $SMmoll * $RAeq3;
	    		$RAmass3 = $RAweight3 * $RAmoll3;
		    	//試薬４計算
			    if(!empty($_POST["RAweight4"]) && !empty($_POST["RAeq4"])) {
	    			$RAweight4 = $_POST ["RAweight4"];
		    		$RAeq4 = $_POST ["RAeq4"];
			    	$RAmoll4 = $SMmoll * $RAeq4;
				    $RAmass4 = $RAweight4 * $RAmoll4;
    				//試薬５計算
	    			if(!empty($_POST["RAweight5"]) && !empty($_POST["RAeq5"])) {
		    			$RAweight5 = $_POST ["RAweight5"];
			    		$RAeq5 = $_POST ["RAeq5"];
				    	$RAmoll5 = $SMmoll * $RAeq5;
					    $RAmass5 = $RAweight5 * $RAmoll5;
			    	}
	    		}
		    }
	    }
    }
    //溶媒計算（モーラー）
	if(!empty($_POST["SLconcent"]) && $choice == "molar") {
	    $SLvolume = $SMmoll / $SLconcent;
        if(!empty($_POST["SLdensity"])) {
	        $SLmass = $SLvolume * $SLdensity;
        }
    //溶媒計算（モーラーインバース）
	}elseif(!empty($_POST["SLconcent"]) && $choice == "molarinv") {
        $SLvolume = $SMmoll * $SLconcent;
        if(!empty($_POST["SLdensity"])) {
    	    $SLmass = $SLvolume * $SLdensity;
        }
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
		<th>当量</th>
	</tr>
	<!-- ニ行目 -->
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
		<!-- 当量（入力） -->
    	<td>
		<input type = "number" step="0.01" name = "SMeq" placeholder = "当量" value = 1>
		</td>
	</tr>
	<!-- 三行目 -->
	<tr>
		<!-- 試薬１ -->
    	<th>試薬１</th>
		<!-- 質量（出力） -->
    	<td>
		<input name = "RAmass1" placeholder = "質量を表示" value = "<?php if(isset($RAmass1)) {echo round($RAmass1, 2);} ?>" readonly>
		</td>
		<!-- 分子量（入力） -->
		<td>
		<input type = "number" step="0.01" name = "RAweight1" placeholder = "分子量を入力" value = "<?php if(isset($RAweight1)) {echo round($RAweight1, 2);} ?>">
		</td>
		<!-- モル数（出力） -->
    	<td>
		<input name = "RAmoll1" placeholder = "モル数を表示" value = "<?php if(isset($RAmoll1)) {echo round($RAmoll1, 2);} ?>" readonly>
		</td>
		<!-- 当量（入力） -->
    	<td>
		<input type = "number" step="0.01" name = "RAeq1" placeholder = "当量を入力" value = "<?php if(isset($RAeq1)) {echo $RAeq1;} ?>">
		</td>
	</tr>
	<!-- 四行目 -->
	<tr>
		<!-- 試薬２ -->
    	<th>試薬２</th>
		<!-- 質量（出力） -->
    	<td>
		<input name = "RAmass2" placeholder = "質量を表示" value = "<?php if(isset($RAmass2)) {echo round($RAmass2, 2);} ?>" readonly>
		</td>
		<!-- 分子量（入力） -->
		<td>
		<input type = "number" step="0.01" name = "RAweight2" placeholder = "分子量を入力" value = "<?php if(isset($RAweight2)) {echo round($RAweight2, 2);} ?>">
		</td>
		<!-- モル数（出力） -->
    	<td>
		<input name = "RAmoll2" placeholder = "モル数を表示" value = "<?php if(isset($RAmoll2)) {echo round($RAmoll2, 2);} ?>" readonly>
		</td>
		<!-- 当量（入力） -->
    	<td>
		<input type = "number" step="0.01" name = "RAeq2" placeholder = "当量を入力" value = "<?php if(isset($RAeq2)) {echo $RAeq2;} ?>">
		</td>
	</tr>
	<!-- 五行目 -->
	<tr>
		<!-- 試薬３ -->
    	<th>試薬３</th>
		<!-- 質量（出力） -->
    	<td>
		<input name = "RAmass3" placeholder = "質量を表示" value = "<?php if(isset($RAmass3)) {echo round($RAmass3, 2);} ?>" readonly>
		</td>
		<!-- 分子量（入力） -->
		<td>
		<input type = "number" step="0.01" name = "RAweight3" placeholder = "分子量を入力" value = "<?php if(isset($RAweight3)) {echo round($RAweight3, 2);} ?>">
		</td>
		<!-- モル数（出力） -->
    	<td>
		<input name = "RAmoll3" placeholder = "モル数を表示" value = "<?php if(isset($RAmoll3)) {echo round($RAmoll3, 2);} ?>" readonly>
		</td>
		<!-- 当量（入力） -->
    	<td>
		<input type = "number" step="0.01" name = "RAeq3" placeholder = "当量を入力" value = "<?php if(isset($RAeq3)) {echo $RAeq3;} ?>">
		</td>
	</tr>
	<!-- 六行目 -->
	<tr>
		<!-- 試薬４ -->
    	<th>試薬４</th>
		<!-- 質量（出力） -->
    	<td>
		<input name = "RAmass4" placeholder = "質量を表示" value = "<?php if(isset($RAmass4)) {echo round($RAmass4, 2);} ?>" readonly>
		</td>
		<!-- 分子量（入力） -->
		<td>
		<input type = "number" step="0.01" name = "RAweight4" placeholder = "分子量を入力" value = "<?php if(isset($RAweight4)) {echo round($RAweight4, 2);} ?>">
		</td>
		<!-- モル数（出力） -->
    	<td>
		<input name = "RAmoll4" placeholder = "モル数を表示" value = "<?php if(isset($RAmoll4)) {echo round($RAmoll4, 2);} ?>" readonly>
		</td>
		<!-- 当量（入力） -->
    	<td>
		<input type = "number" step="0.01" name = "RAeq4" placeholder = "当量を入力" value = "<?php if(isset($RAeq4)) {echo $RAeq4;} ?>">
		</td>
	</tr>
	<!-- 七行目 -->
	<tr>
		<!-- 試薬５ -->
    	<th>試薬５</th>
		<!-- 質量（出力） -->
    	<td>
		<input name = "RAmass5" placeholder = "質量を表示" value = "<?php if(isset($RAmass5)) {echo round($RAmass5, 2);} ?>" readonly>
		</td>
		<!-- 分子量（入力） -->
		<td>
		<input type = "number" step="0.01" name = "RAweight5" placeholder = "分子量を入力" value = "<?php if(isset($RAweight5)) {echo round($RAweight5, 2);} ?>">
		</td>
		<!-- モル数（出力） -->
    	<td>
		<input name = "RAmoll5" placeholder = "モル数を表示" value = "<?php if(isset($RAmoll5)) {echo round($RAmoll5, 2);} ?>" readonly>
		</td>
		<!-- 当量（入力） -->
    	<td>
		<input type = "number" step="0.01" name = "RAeq5" placeholder = "当量を入力" value = "<?php if(isset($RAeq5)) {echo $RAeq5;} ?>">
		</td>
	</tr>
	<!-- 八行目 -->
	<tr>	
    	<th></th>
	    <th>質量 (mg)</th>
		<th>密度 (mg/mL)</th>
		<th>体積 (mL)</th>
		<th>
			<b>
			<select name = "choice">
				<option value = "molar"><b>モル濃度 (M)</b></option>
				<option value = "molarinv"><b>逆モル濃度 (M^-1)</b></option>
			</select>
			</b>
		</th>
	</tr>
	<!-- 九行目 -->
	<tr>
		<!-- 溶媒 -->
    	<th>溶媒</th>
		<!-- 質量（出力） -->
    	<td>
		<input name = "SLmass" placeholder = "質量を表示" value = "<?php if(isset($SLmass)) {echo round($SLmass, 2);} ?>" readonly>
		</td>
		<!-- 密度（入力） -->
		<td>
		<input type = "number" step="0.01" name = "SLdensity" placeholder = "密度を入力" value = "<?php if(isset($SLdensity)) {echo round($SLdensity, 2);} ?>">
		</td>
		<!-- 体積（出力） -->
    	<td>
		<input name = "SLvolume" placeholder = "体積を表示" value = "<?php if(isset($SLvolume)) {echo round($SLvolume, 2);} ?>" readonly>
		</td>
		<!-- 濃度（入力） -->
    	<td>
		<input type = "number" step="0.01" name = "SLconcent" placeholder = "濃度を入力" value = "<?php if(isset($SLconcent)) {echo round($SLconcent, 2);} ?>">
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