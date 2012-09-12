# Http Base

Community is a small and simple dependency injection container for PHP 5.3.0 +

  - PSR-0 compliant
  - Easy to use
  - Stable

## Installation
Add `outglow/httpbase` to your composer.json file

    {
        "require" : {
            "outglow/httpbase" : "dev-master"
        }
    }
Then run: `php composer.phar install`
(NOTE: An update may be required first)

## Usage
Http Base allows you to look at `GET` and `POST` requests, and deal with them in an elegant manner.
Below is an example of how you set it up:

    include('vendor/autoload.php');
    
    use Outglow\Component\HttpBase\HttpBase;
    
    $http = new HttpBase();

We can now use the `$http` variable to access data sent using either a `GET` or `POST` request.
Let's say `name` has been passed into our query string

	http://example.com/index.php?name=Harry

We can access `name` like so:

	$name = $http->query->get('name');

We can also do the same if name has been sent using a `POST` request:

	$name = $http->query->post('name');

It even allows us to access all `POST` or `GET` variables by not passing anything through:

	$getVars = $http->query->get();

The same will work with `POST`.

### TODO

  - Allow to make Http Requests using `make`