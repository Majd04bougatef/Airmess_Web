# Airmess_Web

## Overview

Airmess_Web is a comprehensive web platform built with Symfony for managing bike-sharing services, transportation reservations, social media integration, and community features. The application allows users to:

- Rent bikes from various stations
- Make transportation reservations 
- Interact via social media features
- Discover and review "Bon Plans" (good deals/places)
- Track expenses and manage payments
- Schedule posts and live streams
- Find and manage stations with availability information

## Key Features

- **Bike Reservation System**: Users can reserve bikes from stations with real-time availability tracking
- **Transportation Management**: Book transportation services with confirmation and payment processing
- **User Profiles**: Complete user management with authentication, profiles, and history
- **Station Management**: View and manage bike stations, including capacity, types, and location
- **Payment Processing**: Integrated Stripe for secure payments
- **Email & SMS Notifications**: Communication via email and Twilio SMS integration
- **Expense Tracking**: Automatic expense recording for all transactions
- **Social Media Integration**: Post scheduling and content management
- **Community Features**: Reviews, comments, and ratings

## Technical Components

- **Framework**: Symfony PHP framework
- **Database**: Doctrine ORM
- **Payment Processing**: Stripe API
- **Notifications**: Email & Twilio SMS
- **Frontend**: Twig templates with responsive design
- **Authentication**: Custom security implementation

## Cron Jobs

### Updating Finished Reservations

To automatically update finished reservations and increment the number of available bikes in stations, set up a cron job to run the following command regularly:

```bash
php bin/console app:update-finished-reservations
```

This command will:
1. Find all reservations where the end date (`dateFin`) is in the past and the status is not already 'terminé'
2. Increment the number of available bikes in the corresponding stations
3. Update the status of these reservations to 'terminé'

#### Setting up the Cron Job on Linux/Unix

Example to run every 30 minutes:

```bash
# Edit crontab
crontab -e

# Add the following line (adjust the path to your application)
*/30 * * * * cd /path/to/your/app && php bin/console app:update-finished-reservations >> /var/log/reservation-updates.log 2>&1
```

#### Setting up a Scheduled Task on Windows

1. Open Task Scheduler
2. Create a Basic Task
3. Set the trigger to repeat every 30 minutes
4. Set the action to start a program
5. Program: `php`
6. Arguments: `bin/console app:update-finished-reservations`
7. Start in: `C:\path\to\your\app`

## Installation

1. Clone the repository
2. Install dependencies: `composer install`
3. Configure database in `.env.local`
4. Run migrations: `php bin/console doctrine:migrations:migrate`
5. Start the server: `symfony server:start`

## Additional Configuration

- **Email Setup**: See `EMAIL_SETUP_SUCCESS.md` for email configuration details
- **SMS Integration**: Refer to `TWILIO_SETUP.md` for Twilio SMS setup