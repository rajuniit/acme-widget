<?php
require_once 'classes.php';

function getProducts() {
    $productData = array(
        array(
            'code' => "R01",
            "name" => "Red Widget",
            "price" => 32.95
        ),
        array(
            'code' => "B01",
            "name" => "Blue Widget",
            "price" => 7.95
        ),
        array(
            'code' => "G01",
            "name" => "Green Widget",
            "price" => 24.95
        )
    );


    foreach($productData as $item) {
        $product = new Product();
        $product->setCode($item['code']);
        $product->setName($item['name']);
        $product->setPrice($item['price']);
        $productData[$item['code']] = $product;
    }

    return $productData;
}



function applyOfferAndDeliveryCharge($cart) {
    //==========================Offer Declaration Start======================
    $offer = new OfferModel();
    $offer->setName('Special Offer of Red Widget Product');

    $offerRule = new OfferRuleModel();
    $offerRule->setType(ContainsProductWithQtyOfferRule::TYPE);
    $settings = array('product_code'=>'R01', 'qty'=>2);
    $offerRule->setSettings($settings);
    $offerRule->setOffer($offer);


    $offerAction = new OfferActionModel();
    $offerAction->setType(FixedProductPercentageOfferAction::TYPE);
    $settings = array('product_code'=>'R01', 'percentage'=>50, 'qty' => 2);
    $offerAction->setSettings($settings);
    $offerAction->setOffer($offer);

    $offer->setRule($offerRule);
    $offer->setAction($offerAction);
//===========================OFFER DECLARATION END=========================


//======================================Delivery Charge Rule and Action===============
    $deliveryMethod = new DeliveryMethod();
    $deliveryMethod->setCode('D001');
    $deliveryMethod->setName("Order under $50");
    $deliveryMethod->setSettings(array('amount' => 4.95));

    $deliveryMethodRole = new DeliveryMethodRule();
    $deliveryMethodRole->setType(OrderLessThanTotalRule::TYPE);
    $settings1 = array('amount'=>50);
    $deliveryMethodRole->setSettings($settings1);
    $deliveryMethodRole->setDeliveryMethod($deliveryMethod);


    $deliveryMethod2 = new DeliveryMethod();
    $deliveryMethod2->setCode('D002');
    $deliveryMethod2->setName("Order under $90");
    $deliveryMethod2->setSettings(array('amount' => 2.95));

    $deliveryMethodRole2 = new DeliveryMethodRule();
    $deliveryMethodRole2->setType(OrderLessThanTotalRule::TYPE);
    $settings2 = array('amount'=>90);
    $deliveryMethodRole2->setSettings($settings2);
    $deliveryMethodRole2->setDeliveryMethod($deliveryMethod2);

    $deliveryMethod3 = new DeliveryMethod();
    $deliveryMethod3->setCode('D003');
    $deliveryMethod3->setName("Order under $90");
    $deliveryMethod3->setSettings(array('amount' => 0.0));

    $deliveryMethodRole3 = new DeliveryMethodRule();
    $deliveryMethodRole3->setType(OrderLessThanTotalRule::TYPE);
    $settings3 = array('amount'=>90);
    $deliveryMethodRole3->setSettings($settings3);
    $deliveryMethodRole3->setDeliveryMethod($deliveryMethod3);
//======================================END DELIVERY CHARGE===============================



//=====================Check Offer Eligibility============================
    $offerRuleChecker = new ContainsProductWithQtyOfferRule();
    $offerActionExecution = new FixedProductPercentageOfferAction();

    if($offerRuleChecker->isEligible($cart, $offerRule->getSettings())) {
        $cart = $offerActionExecution->execute($cart, $offerAction->getSettings());
    }



//===================================Check Delivery Charge=================================
    $deliveryRuleChecker = new OrderLessThanTotalRule();
    $deliveryChargeCalculator = new DeliveryFixedRateAction();

    if($deliveryRuleChecker->isEligible($cart, $deliveryMethodRole->getSettings())) {
        $cart = $deliveryChargeCalculator->calculate($cart, $deliveryMethod->getSettings());
    } else if($deliveryRuleChecker->isEligible($cart, $deliveryMethodRole2->getSettings())) {
        $cart = $deliveryChargeCalculator->calculate($cart, $deliveryMethod2->getSettings());
    }


    $deliveryRuleChecker = new OrderGreaterthanEqualTotalRule();
    $deliveryChargeCalculator = new DeliveryFixedRateAction();
    if($deliveryRuleChecker->isEligible($cart, $deliveryMethodRole3->getSettings())) {
        $cart = $deliveryChargeCalculator->calculate($cart, $deliveryMethod3->getSettings());
    }

    return $cart;
}






