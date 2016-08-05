<html>
<body>
<input type="text" class="mytext" />
<button>enkrip</button>
<?php
$text = "ganteng";
echo "<br />".$text;
$a = md5($text);
$b = md5($a);
$c = md5($b);
echo "<br />"."enkrip ".$c;
?>
</body>
</html>