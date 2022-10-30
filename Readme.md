Bitcoin tracker

1. Use Laravel 7+ to create a site that has a page showing graphics collected using the Bitfinex API and tracks the bitcoin trades compared to USD.

2. Use vue.js or React to build a single page application and use Chart.js library to create the chart, or another similar library. 

3. The chart should look something like this:

4. You must consume the API of Bitfinex and create a job that will periodically collect the information and store it in a local database, 
    so the chart can be created from that data. 

5. The bitfinex endpoint you must use is: GET Ticker https://docs.bitfinex.com/v1/reference#rest-public-ticker

6. Below the graphic add a web form that will enable the end user to enter and email and a price at which to be notified. 

7. Each time the price goes above the limit set by the user, he should be notifiedvia email. 

8. The email should state that the price of BTC has exceeded the limit of X USD.

9. Take note of how much time it takes you to complete the project.

    Hint: Use 3rd party components as much as possible in order to reduce development time. 
    Follow best practices.
    Tests.
