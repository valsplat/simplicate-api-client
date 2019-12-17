<p align="center">
    <img src="https://developer.simplicate.com/images/simplicate_icon.png" height="100">
    <h3 align="center">(Unofficial) Simplicate v2 API Client for PHP</h3>
</p>

## Contributing

```
$ git clone git@github.com:valsplat/simplicate-api-client.git
$ cd simplicate-api-client
$ composer update -o
```

## Installation

```
$ composer require valsplat/simplicate-api-client
```

## Endpoints

This API client is very much a work in progress and is incomplete at this time. You can only use the `Project` endpoint. Feel free to create a Pull Request to increase coverage.

## Authentication

Authentication is done via providing your account ID and a personal access token:

```
$connection = new \Valsplat\Simplicate\Connection();
$connection->setApiUrl('https://YOURDOMAIN.simplicate.nl/api/v2');
$connection->setAccessToken('ACCESS_TOKEN');
$connection->setAccountId('ACCOUNT_ID');
```

## Errors

The API client throws two exceptions:

* `\Valsplat\Simplicate\Exceptions\NotFoundException` - Entity could not be found
* `\Valsplat\Simplicate\Exceptions\ApiException` - Generic Api exception

## Basic Usage

Each endpoint is accessible via its own method on the `\Valsplat\Simplicate\Simplicate` instance. The method name is singular, camelcased:

```
$simplicate = new \Valsplat\Simplicate\Simplicate($connection);
$simplicate->TaskAssignment();
```

## Generic methods & filters

* `list((array)params)` - get a collection of entities. You find the available params per endpoint in the [Harvest docs](https://help.getharvest.com/api-v2/).
* `get((int)id)` - get a single entity via its id.
* `create()` - create given entity.
* `update()` - update given entity.
* `save()` - convenience method; calls `update()` if the entity already exists, `create()` otherwise.
* `delete()` - delete given entity.

## Usage examples

Authentication and usage examples: [example.php](example.php)

## TODO

* Tests w/ mocked http client
* Complete endpoint support
* Automatic marshaling of attributes
