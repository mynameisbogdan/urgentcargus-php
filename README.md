# UrgentCargus PHP API
The API is RESTful JSON over HTTP using [GuzzleHttp](http://docs.guzzlephp.org/en/latest/) as a HTTP client.

# Usage example
```php
$client = new \MNIB\UrgentCargus\Client($apiKey, $apiUri);
$client->createAccessToken('username', 'password');

$result = $client->get('PickupLocations');

$params = [
    'Sender' => [],
    'Recipient' => [],
    'Parcels' => 1,
    'TotalWeight' => 1,
    'DeclaredValue' => 1000,
    'CashRepayment' => 1000,
    'BankRepayment' => 0,
    'OpenPackage' => true,
    'SaturdayDelivery' => false,
    'PackageContent' => 'awb content',
    'CustomString' => $orderId,
];
$awbId = $client->post('Awbs', $params);
```

# Official UrgentCargus Documentation
https://urgentcargus.portal.azure-api.net
