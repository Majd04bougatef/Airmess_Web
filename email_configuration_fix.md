# How to Fix Email Verification in Airmess

Based on our testing, there are SSL verification issues preventing emails from being sent successfully. Here are the steps to fix this:

## 1. Install Required Components

We've already installed the HTTP client which can help with SSL connections:

```bash
composer require symfony/http-client
```

## 2. Update Your .env Configuration

Create or modify your `.env.local` file in your project root with these settings:

```
# Gmail SMTP settings with SSL verification disabled
MAILER_DSN=smtp://oussemabelhajbb22@gmail.com:pukkrnjfybrjlhsr@smtp.gmail.com:587?verify_peer=0&verify_peer_name=0
```

> **Important**: If you're using Gmail, make sure:
> - You're using an **App Password** if you have 2FA enabled
> - Less secure app access is enabled (if you don't use 2FA)
> - The password in the MAILER_DSN is correct

## 3. Alternative Options

If Gmail still doesn't work, try these alternatives:

### Option A: Use Mailtrap.io (Recommended for Development)

1. Sign up for a free [Mailtrap.io](https://mailtrap.io) account
2. Get your SMTP credentials from your inbox settings
3. Update your .env.local file:

```
MAILER_DSN=smtp://your_username:your_password@smtp.mailtrap.io:2525
```

### Option B: Use the Null Mailer for Testing

```
MAILER_DSN=null://null
```

This won't send actual emails but will allow your application to function without errors.

## 4. Clear Symfony Cache

After making changes to your .env files, clear the cache:

```bash
php bin/console cache:clear
```

## 5. Verify Your Configuration

You can check your current mailer configuration with:

```bash
php bin/console debug:config framework mailer
```

## 6. Test Email Sending

After making these changes, test email sending with:

```bash
php bin/console app:test-email oussemabelhajbb22@gmail.com
```

## Why This Works

- Disabling peer verification (`verify_peer=0`) bypasses the SSL certificate validation issues
- The HTTP client provides better handling of SMTP connections than PHP's native stream functions
- Mailtrap.io is specifically designed for testing email sending without the complications of real mail servers

Let me know if you need help with any of these steps! 