<?php
    include "function.php";
    $url = $_GET['link'];
    $status = $_GET['status'];
    echo $status."<br>";
    echo $url."<br>";
    $teks = file_get_contents($url);
        /*
        $data = [
            'name' => getStringBetween($teks, "<h1 class='block font-600 mt-0 text-24 mb-1' id='product-name'>","</h1>"),
            'price' => getStringBetween($teks, "<div class='text-24 font-600' id='product-final-price'>","</div>"),
            'desc' => getStringBetween($teks, "<div><p class='p1'><em><span class='s1'>", "</span></em></p></div>"),
        ]; */
    $name = getStringBetween($teks, '<h1 class="block font-600 mt-0 text-24 mb-1" id="product-name">','</h1>');
    $price = getStringBetween($teks, '<div class="text-24 font-600" id="product-final-price">','</div>');
    $desc = getStringBetween($teks, '<div class="MuiGrid-root text-16 MuiGrid-item MuiGrid-grid-xs-6">','</div>');
    $image = getStringBetween($teks, 'https://cdn-m2.fabelio.com/catalog/product/','?auto=format');

    echo $name."<br>";
        // echo $price."<br>";
    $rprice = preg_replace('/[Rp.]/','',$price);
    echo $rprice."<br>";
    echo $desc."<br>";
    echo "<img src=https://cdn-m2.fabelio.com/catalog/product/$image width=300>";

    // 'https://cdn-m2.fabelio.com/catalog/product/','?auto=format'
?>