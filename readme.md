# Simple php 7 client for DarkSky API

DarkSky API docs here: https://darksky.net/dev/docs

## Requirements
- php >=7.1.0

## Installation
- Add the package to your project
```composer require tania-pets/darksky:dev-master ```

## Usage

#### Init the client

##### With preferences
```$darksKy = new Taniapets\DarkSky\DarkSky('API_KEY', ['units' => 'auto', 'lang' => 'en']);```
##### Set preferences after client initialization
```php
use Taniapets\DarkSky\DarkSky;
$darksKy = new DarkSky('API_KEY');
$darksKy->setUnits('auto');
$darksKy->setLang('en');
```

#### Forecast request
```php
$forecast = $darksKy->forecast(40.6211912,22.9285177, ['currently'], 'hourly');```
$forecast->daily(); //get daily data
$forecast->flags(); //get flags
$forecast->getData(); //get all datablocks
```
### Timemachine request
 Executes concurrent requests for multimple given timestamps
```php
$timeMachine = $darksKy->timeMachine(40.6211912,22.9285177, ['1549792109','1549292798'], ['currently']);
$timeMachine['1549792109']->daily();
...
```

##### Todo
- Add tests
- Add laravel wrapper
