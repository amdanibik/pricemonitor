<?php
    include "function.php"
?>

<title>Price Monitor Web APP</title>
<form name="link" method="POST">
    Input Link : <input type="text" name="link">
    <input type="submit" name="press" value="submit">
</form>
<?php
    if(isset($_POST['press'])){
        $url = $_POST['link'];
        echo $url;
        $teks = file_get_contents($url);
        /*
        $data = [
            'name' => getStringBetween($teks, "<h1 class='block font-600 mt-0 text-24 mb-1' id='product-name'>","</h1>"),
            'price' => getStringBetween($teks, "<div class='text-24 font-600' id='product-final-price'>","</div>"),
            'desc' => getStringBetween($teks, "<div><p class='p1'><em><span class='s1'>", "</span></em></p></div>"),
        ]; */
        $name = getStringBetween($teks, "<h1 class='block font-600 mt-0 text-24 mb-1' id='product-name'>","</h1>");
        echo $name;
    }
?>