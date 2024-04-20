<?php

/** Set Sidebar item active */

function setActive(array $route)
{
  if (is_array($route)) {
    foreach ($route as $r) {
      if (request()->routeIs($r)) {
        return 'active';
      }
    }
  }
}

/** Check if product has discount */

function checkDiscount($product)
{
  $currentDate = date('Y-m-d');

  if ($product->offer_price > 0 && $currentDate >= $product->offer_start_date && $currentDate <= $product->offer_end_date) {
    return true;
  } 
  return false;
}

/** Calculate Discount percent */

function calculateDiscountPercent($originalPrice, $discountPrice)
{
  $discountAmount = $originalPrice - $discountPrice;
  $discountPercent = ($discountAmount / $originalPrice) * 100;
  return round($discountPercent);
}

/** Check Product Type */

function checkProductType($type):string
{
  switch ($type) {
    case 'new_arrival':
        return 'New Arrival';
    case 'featured_product':
        return 'Featured Product';
    case 'best_product':
        return 'Best Product';
    case 'top_product':
        return 'Top Product';
    default:
        return 'None';                 
        
}
}