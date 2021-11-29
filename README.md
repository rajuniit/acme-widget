# Acme Widget Project

You need to install `docker` and `docker-compose`in your machine before running it.

###Just Run Following command after installing docker and docker-compose

## To Execute the Code
1. `docker-compose build`
2. `docker-compose up -d`
3. `docker-compose exec app php cli.php`


### Functional Requirements

    1. Product Listing
    2. Add/Remove product into cart
    3. Place order
    4. View cart
    5. Calculate delivery charge and Apply any special offer available for any product

### Non-Functional Requirements

    Low Latency
    Highly available
    Highly Consistent


### Out of Scope(Assumption)

    Actual Payment
    Storage System
    Inventory
    Back-office management
    Authentication
    Warehouse
    Order tracking
    Checkout
    UI/UX



### Requirement Analysis

    Product
        -> code
        -> name
        -> price
        -> qty
    Delivery Charge
        -> if total cost < $50 then $4.95
        -> if total cost < $90 then delivery cost $2.95
        -> if total cost >= $90 then delivery charge is free

    Special offer
        -> Buy one red widget then get another one half of price


### Scaling Business

We need to make the following things flexible enough so that clients extend it.
    
1. Defining Delivery charge
2. Add Offer


### Scaling System

Though premature scalability is not right. We should optimize and scale our system based on production experience. 
But we need to make our system architecture ready so that we can scale whenever we want.

The system should expose the functionality as an API
We need to decouple the frontend and backend. 
So that we can implement it easily for other client(mobile apps)
