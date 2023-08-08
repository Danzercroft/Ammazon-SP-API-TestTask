# Ammazon-SP-API-TestTask
## Description
This is test tasks. 

Need to create a service class that implements App\ShippingServiceInterface interface. 
Service should send a command to Amazon's fulfillment network (FBA) to fulfill seller order using seller inventory in Amazon's fulfillment network (FBA) and return the tracking number as string for this order when method ship will be invoked. 
Link to FBA API documentation: https://developer-docs.amazon.com/sp-api

## How to test
### Step 1
You should change string constant in SDKService on yours.
```php
        $this->configuration = Configuration::forIAMUser(
            'aaaaaa',
            'aAAaaa',
            'aaaaaaa',
            'aaaaaa'
        );
```
```php
$this->accessToken = $this->sdk->oAuth()->exchangeRefreshToken('aaaaaaaaaaa');
```
### Step 2
Start main.php
```bash
php public/main.php
```

## How to improve
1. Add feature work with confing
2. Add test
