<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.



## Usage <br>
Setup your coding environment <br>
```
git clone git@github.com:Malshi623/webquiz.git
cd laravel8-tailwindcss2
composer install
cp .env.example .env 
php artisan key:generate
php artisan cache:clear && php artisan config:clear 
php artisan serve 
```

## Database Setup <br>
We will be performing database tests which (obviously) needs to interact with the database. Make sure that your database credentials are up and running.
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=webquiz
DB_USERNAME=root
DB_PASSWORD=
```

Next up, we need to create the database which will be grabbed from the ```DB_DATABASE``` environment variable.
```
mysql;
create database webquizdb;
exit;
```

Finally, make sure that you migrate your migrations.
```
php artisan migrate
```

## Running tests
One of the most important things about tests is obviously running them since you can create as many as you want, but you can’t test anything if it doesn’t work.

Laravel makes it very easy for us to run our tests through the terminal. Keep in mind that you can only perform tests from the root of your project directory. You can run your tests by performing one of the following commands:
```
./vendor/bin/phpunit
php artisan test

OUTPUT EXAMPLE (./vendor/bin/phpunit):
PHPUnit 9.5.8 by Sebastian Bergmann and contributors.
``		2/2 (100%)
Time: 00:00.200, Memory: 18.00 MB
``` 

#### PHPunit file
Whenever you run your tests, you’ll be running the ```phpunit.xml``` file from the root of your directory.

The most important piece of code is the ```testsuites```, which makes sure that PHPunit is able to run the ```./tests/Unit``` and ```./tests/Feature``` subfolders.

```ruby
<testsuites>
    <testsuite name="Unit">
        <directory suffix="Test.php">./tests/Unit</directory>
    </testsuite>
    <testsuite name="Feature">
        <directory suffix="Test.php">./tests/Feature</directory>
    </testsuite>
</testsuites>
```

## Creating our first test
The easiest way to create a test is through Artisan. 
```
php artisan make:test UserTest
```

This will create a new file with the name of ```UserTest``` inside the ```/tests/Feature``` folder with one method called ```test_example()```. It will check if the / URI can be reached, and if it can, it will send back the ```assertStatus()``` method. 

 If you perform the test through the CLI, you’ll see that the unit test has indeed passed the test, because Laravel defines the / URI by default in the ```web.php``` file.

```ruby
Route::get('/', function () {
    return view('welcome');
});
```

It’s also good to know what will happen if the unit tests do not pass the test. Let’s change the URI to ```/test``` and run the command one more time.

Finally! Our first error message. We received a ```FAIL``` message with an in-depth description. The test should receive a status code of 200, but it actually received a 404 because the route has not been found. 


## Unit tests
Up until this point we worked with a test from the ```Feature``` folder. Unit tests obviously get stored inside the ```Unit``` folder. We can create a Unit test by performing the same command, with an additional flag.

```
php artisan make:test UserTest --unit
```

I personally prefer to run unit tests through the authentication scaffolding because it allows us to use the ```User``` model. Let’s perform the following command to pull in an authentication scaffolding (Make sure that you have setup your database).

```
composer require Laravel/ui 
php artisan ui react –auth
php artisan migrate
```

Also, make sure that you add the authentication route inside the ```routes/web.php``` file.
```
Auth::routes();
```

The rest of the Unit tests are available through the video since it makes no sense to copy paste the entire code.

## HTTP tests
We have already performed the get() method (which is added by default), but you can also perform the ```get()```, ```post()```, ```put()```, ```patch()``` or ```delete()``` method.

Keep in mind that you do need to return a response object that will represent the HTTP response. This will not be the Illuminate response object that you’re familiar with, but it will be an instance of the ```Illuminate\Foundation\Testing\TestResponse, which is a wrapper around the Response object with some additional assertions for testing.

If you perform the ```php artisan route:list``` command, you’ll see that the ```/register``` URI is using an HTTP method of ```post()```. An example of the ```post()``` method might look like the following:

```ruby
public function test_if_it_stores_new_users()
{
    $response = $this->post('/register', [
        'name' => 'malsha',
        'email' => 'malsha@gmail.com',
        'password' => 'malsha123',
        'password_confirmation' => 'malsha123'
    ]);
    
    $response->assertRedirect('/home');
}
```

Be aware that you’re performing the ```post()``` method from the form of your register view. Therefore, you do need to pass in the password_confirmation, even though it doesn’t exist in the database.

## Database test
Laravel offers a lot of tools and assertions in order to make it easier to test your database driven applications. We have already created tests where we’ve checked if we could insert a new user in the database, which honestly isn’t the most effective way. You rather want to make an HTTP call to the store endpoint and then assert that package exists in the database.

There are two assertions you can use.

The first one is the ```$this->assertDatabaseHas()```, which looks inside a database and checks if the given data exists.
The second one is the ```$thid->assertDatabaseMissing()```, which checks whether a given value is missing in the database.

Quick exercise. Check if you can find out what the SQL query will be for both methods.
Answer 1: the ```$this->assertDatabaseHas()``` method looks like an WHERE statement because MySQL will check inside the database whether the given value exists or not.

We do need to make sure that we create a user inside the database. Let’s do this with a Seeder since the Seeder will be used in the next section.

```
php artisan make:seeder UsersTableSeeder
```

Add the following method inside the run method of the ```/database/seeders/UsersTableSeeder.php```.

```ruby
public function run()
{
    DB::table('users')->insert([
            'name' => 'malsha',
            'email' => 'malsha@gmail.com',
            'password' => Hash::make('password'),
        ]);
    ]);
}
```

The last step is to run our database seeder through the CLI.
```
php artisan db:seed –class=UsersTableSeeder
```

If we navigate back to our ```Unit/UserTest.php``` file, we got to make sure that we create a new method that will use the ```$this->assertDatabaseHas()``` method. 

The ```$this->assertDatabaseHas()``` accepts two parameters, the first one will be the table name where you want to search in. The second parameter will be an array with a key value pair. The key will be the column name inside the ```users``` table, and the value will be the value of our ```name``` column.

public function test_if_data_exists_in_database()
{
    $this->assertDatabaseHas('users', [
        'name' => 'malsha'
    ]);
}

The ```$this->assertDatabaseMissing()``` method works in the same exact way, but you got to search for a name that does not exist in the database.

```ruby
public function test_if_data_does_not_exists_in_database()
{
    $this->assertDatabaseHas('users', [
        'name' => 'John'
    ]);
}
```

## Seeding tests
The last type of test that we’ll be performing will be seeding tests. We’re going to check whether we can seed a single seeder, or all seeders at the same time.

In order to test all seeders, you simply have to add the following line inside a method.
```ruby
public function test_if_seeders_works()
{
    $this->seed();
}
```

This command is equal to the ```php artisan db:seed``` command, which will seed all seeders available inside the ```/database/seeders``` folder.


# Credits due where credits due…
Thanks to [Laravel](https://laravel.com/) for giving me the opportunity to make this tutorial on [Testing](https://laravel.com/docs/8.x/testing#introduction).
