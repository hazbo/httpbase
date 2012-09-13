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
### Receiving requests
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

### Making requests
HttpBase makes good use of curl, and callbacks. Below is an example of how we could make a simple `GET` request:

    $response = $http->make->get('http://graph.facebook.com/zuck');

This will return:

    {
       "id": "4",
       "name": "Mark Zuckerberg",
       "first_name": "Mark",
       "last_name": "Zuckerberg",
       "link": "https://www.facebook.com/zuck",
       "username": "zuck",
       "gender": "male",
       "locale": "en_US"
    }

We can do the same using `POST`, `HEAD`, `PUT` and `DELETE` requests, and
you can also add any params for the request as an array:

    $http->make->get($url, array());
    $http->make->post($url, array());
    $http->make->head($url, array());
    $http->make->put($url, array());
    $http->make->delete($url, array());

### Extended

HttpBase makes good use of callbacks. This involves having an option third param
and can be used like so:

    $http->make->get('http://graph.facebok.com/zuck', array(), function($data) {
      print_r(json_decode($data), true);
    });

In the example above, we have make a request to Facebook, and used `print_r` to
out put the response in the form of an array inside of the function. The `$data` variable is passed through. This is just our response from the Http request.
