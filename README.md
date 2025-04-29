# Airmess_Web

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