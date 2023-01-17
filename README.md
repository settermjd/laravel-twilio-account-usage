# Retrieve Your Twilio Account Usage in Laravel

This is a small Laravel project designed to show how you can retrieve your Twilio account usage information within Laravel.
It's not designed to show each and every way, rather just the essentials of how to do it, from a limited number of perspectives.
Currently, the information is retrieved for the last month and output using a Laravel Blade template and a Component. 

I don't have specific plans to grow this project in all manner of ways, but that might change in the future.

## Usage

### Setup

To use the project, first clone it locally, then set up the front-end assets, and finally launch the application using the following three commands:

```bash 
git clone git@github.com:settermjd/laravel-twilio-account-usage.git
cd laravel-twilio-account-usage
npm run dev

# Run the following in a separate terminal window/tab if you're on Windows
# If you're using Linux or macOS, background the previous process
# and run the following one in the current terminal window/tab.
php artisan serve
```

Then, add the following configuration to the end of _.env_.

```ini
TWILIO_ACCOUNT_SID="<TWILIO_ACCOUNT_SID>"
TWILIO_AUTH_TOKEN="<TWILIO_AUTH_TOKEN>"
```

Now, log in to [the Twilio Console](https://console.twilio.com) and retrieve your **Account SID** and **Auth Token**. 
Paste the two values in place of the two `TWILIO_` placeholders that at the end of _.env_.

### View your account usage information

To view the account usage information, open http:localhost:8000/usage-details in your browser of choice.
