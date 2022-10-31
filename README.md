## Bitcoin tracker

- Use Laravel 7+ to create a site that has a page showing graphics collected using the Bitfinex API and tracks the bitcoin trades compared to USD.

- Use vue.js or React to build a single page application and use Chart.js library to create the chart, or another similar library. 

- The chart should look something like this:

- Below the graphic add a web form that will enable the end user to enter and email and a price at which to be notified. 

- Each time the price goes above the limit set by the user, he should be notifiedvia email. 

- The email should state that the price of BTC has exceeded the limit of X USD.

- You must consume the API of Bitfinex and create a job that will periodically collect the information and store it in a local database, 
    so the chart can be created from that data. 

- The bitfinex endpoint you must use is: GET Ticker https://docs.bitfinex.com/v1/reference#rest-public-ticker

    https://api.bitfinex.com/v1/pubticker/BTCUSD

- Use 3rd party components as much as possible in order to reduce development time. 

- Follow best practices.


## Installation

0. Set smtp mail settings in .env

```
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=username
MAIL_PASSWORD=password
MAIL_ENCRYPTION=tls
MAIL_FROM_NAME="${APP_NAME}"
```

1. Install project dependencies

```
composer install
```

2. Run migrations to setup database

```
php artisan migrate
```

3. Serve the backend

```
php artisan serve
```

4. Run the scheduler

```
php artisan schedule:work
```

5. Check the queue

```
php artisan queue:work
```
