# Ammazon-SP-API-TestTask

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

