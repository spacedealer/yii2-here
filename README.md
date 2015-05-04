# Here REST APIs client extension for Yii2

**Attention**: Please do not use in production environments. It‘s WIP.

This is a [Here APIs](https://developer.here.com/rest-apis) client extension for the Yii2 Framework.
It wraps around the [here-api php library](https://github.com/spacedealer/here-api).

Please see [here-api php library](https://github.com/spacedealer/here-api) readme for currently supported APIs.

[![Build Status](https://travis-ci.org/spacedealer/yii2-here.svg?branch=master)](https://travis-ci.org/spacedealer/yii2-here)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/277b77ff-44fd-4c89-ad74-205a29e47dcd/mini.png)](https://insight.sensiolabs.com/projects/277b77ff-44fd-4c89-ad74-205a29e47dcd)
[![Dependency Status](https://www.versioneye.com/user/projects/547f125d8674a43281000116/badge.svg?style=flat)](https://www.versioneye.com/user/projects/547f125d8674a43281000116)

## Requirements

 - php >= 5.4
 - spacedealer/here-api 0.1
 
## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist spacedealer/yii2-here "*"
```

or add

```
"spacedealer/yii2-here": "*"
```

to the require section of your `composer.json` file.

## Usage

Once the extension is installed, simply modify your application components configuration as follows:

```php
'here' => [
	'class' => 'spacedealer\here\Here',
	'appCode' => 'your_app_code',
	'appId' => 'your_app_id',
],
```
Use within your Yii2 application logic:

```php
$geocoder = \Yii::$app->get('here')->getGeoCoder();
$response = $geocoder->geocode([
   'city' => 'Berlin',
   'postalCode' => '10997',
   'street' => 'Schlessische Str.',
   'housenumber' => '28',
]);
$displayPosition = $response->getPath('Response/View/0/Result/0/Location/DisplayPosition');
```

## Resources

 - [Source](https://github.com/spacedealer/yii2-here)
 - [Issues](https://github.com/spacedealer/yii2-here/issues)
