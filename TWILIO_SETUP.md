# Twilio Integration Setup for Airmess

This document guides you through setting up Twilio SMS integration in your Airmess application.

## Prerequisites

1. A Twilio account (you can sign up for a free trial at [twilio.com](https://www.twilio.com))
2. A Twilio phone number capable of sending SMS
3. Your Twilio Account SID and Auth Token (available in your Twilio Console)

## Setup Instructions

### 1. Configure Environment Variables

Create or update your `.env.local` file with the following Twilio credentials:

```
# Twilio Configuration
TWILIO_ACCOUNT_SID=your_account_sid_here
TWILIO_AUTH_TOKEN=your_auth_token_here
TWILIO_PHONE_NUMBER=your_twilio_phone_number_here
```

**Important Notes:**
- Replace `your_account_sid_here` with your actual Twilio Account SID
- Replace `your_auth_token_here` with your actual Twilio Auth Token
- Replace `your_twilio_phone_number_here` with your Twilio phone number in E.164 format (e.g., +1234567890)
- Never commit your `.env.local` file to version control

### 2. Test the SMS Functionality

After setting up your environment variables:

1. Visit `/admin/sms/test` in your application
2. Enter a valid phone number in E.164 format (e.g., +1234567890)
3. Type a test message
4. Click "Send SMS" to verify your integration is working

### 3. Test Verification Codes

1. Visit `/admin/sms/verify` in your application
2. Enter a valid phone number to send a verification code
3. The code will be sent to the specified number
4. For testing purposes, the code will also be displayed in the success message

## Troubleshooting

If you encounter issues sending SMS messages:

1. **Authentication Error**: Verify your Account SID and Auth Token are correct
2. **Invalid Phone Number**: Ensure the recipient phone number is in E.164 format (+1234567890)
3. **Sending Restrictions**: New Twilio trial accounts have restrictions on which numbers they can message
4. **SSL Issues**: If experiencing SSL certificate errors, see our SSL configuration documentation

## Additional Resources

- [Twilio SMS Documentation](https://www.twilio.com/docs/sms)
- [Twilio PHP SDK Documentation](https://www.twilio.com/docs/libraries/php)
- [E.164 Phone Number Format](https://www.twilio.com/docs/glossary/what-e164) 