<?php
/*
Plugin Name: Display netto brutto price
Description: Wyświetla ceny netto i brutto dla produktów
Version: 1.0
Author: Tobiasz Tonn
*/

add_action( 'woocommerce_get_price_html', 'display_netto_brutto_price', 10 );
function display_netto_brutto_price() {
    global $product;
 
    $brutto_price = floatval($product->get_price());
    $netto_price = $brutto_price/1.23;
    if($netto_price!=0.00){
        echo '<div class="netto-brutto-price">';
        echo '<p class="netto-price">' . wc_price($netto_price) . ' Netto</p>';
        echo '<p class="brutto-price">' . wc_price($brutto_price) . ' Brutto</p>';
        echo '</div>';
    } else {
        echo '<div class="netto-brutto-price">';
        echo '<p class="netto-price">' . wc_price($brutto_price) . '</p>';
        echo '</div>';
    }
}

//Przy moich testach miałem postawionego podstawowego woocommerce i podjałem decyzję, że cena wprowadzana w panelu admina jest to cenna brutto więc w kodzie powyżej do zmiennej $brutto_price pobieram cenę z systemu a do zmiennej $netto_price obliczam kwotę z $brutto_price
//Oczywiscie przy większej ilości produktów z innym VATem trzeba byłoby dodać zmienną która pobiera odpowiedni VAT do produktu - zależne czy jest funkcja czy nie
//Przykładowy kod z funkcja:
// $brutto_price = floatval($product->get_price();
// $vat = $product-get_vat();
// $netto_price = $brutto_price/$vat;