<?php
require_once 'services.php';

$handle = fopen("php://stdin", "r");
$wantMore = 'yes';
$products = array();

while(trim($wantMore) == 'yes') {
    echo "Please type the product Code and Quantity You want to Order: \n";

    $productCode = trim(fgets($handle));
    $quantity = trim(fgets($handle));

    echo "Do you want add more? Type 'yes' to continue \n";
    $wantMore = fgets($handle);

    $products[] = array('code' => $productCode, 'qty' => $quantity);
}

$productData = getProducts();

$cart = new Order();
$cart->setNumber("10001");
foreach($products as $product) {
    $orderItem = new OrderItem();
    $orderItem->setProduct($productData[trim($product['code'])]);
    $orderItem->setQuantify($product['qty']);
    $cart->addItem($orderItem);
}

$cart = applyOfferAndDeliveryCharge($cart);

//========================Output==============================================
echo "Order Total: ". $cart->getTotal(). "\n";
echo "Shipping Charge: ". $cart->getShippingCharge(). "\n";
echo "Promotional Offer Amount: ". $cart->getPromotionalAmount(). "\n";
echo "Grand Total Amount: ". ( ($cart->getTotal() + $cart->getShippingCharge()) - $cart->getPromotionalAmount()). "\n";







