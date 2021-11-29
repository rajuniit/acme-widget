<?php
require_once 'services.php';

$productData = getProducts();

$cart = new Order();
$cart->setNumber("10001");

$orderItem = new OrderItem();
$orderItem->setProduct($productData['R01']);
$orderItem->setQuantify(4);


$orderItem1 = new OrderItem();
$orderItem1->setProduct($productData['B01']);
$orderItem1->setQuantify(2);

$cart->addItem($orderItem);
$cart->addItem($orderItem1);

$cart = applyOfferAndDeliveryCharge($cart);

//========================Output==============================================
echo "Order Total: ". $cart->getTotal(). "\n";
echo "Shipping Charge: ". $cart->getShippingCharge(). "\n";
echo "Promotional Offer Amount: ". $cart->getPromotionalAmount(). "\n";
echo "Grand Total Amount: ". ( ($cart->getTotal() + $cart->getShippingCharge()) - $cart->getPromotionalAmount()). "\n";








