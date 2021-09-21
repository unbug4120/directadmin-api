# Simple wrapper Laravel Package for DirectAdmin API

Support Laravel 7.x

## Installation

### Step 1. install the package

```
composer require gegeriyadi/directadmin
```

### Step 2. publish config file

publish config file with this command

```bash
php artisan vendor:publish --provider="Gegeriyadi\LaravelDirectAdmin\DirectAdminServiceProvider"
```

### Step 3. add your directadmin credential on .env file

```env
DIRECTADMIN_HOSTNAME=your-directadmin-hostname
DIRECTADMIN_PORT=2222
DIRECTADMIN_USERNAME=your-username
DIRECTADMIN_PASSWORD="your-directadmin-password"
DIRECTADMIN_SERVERIP=your-server-ip
```

### Step 4. clear config cache

and then don't forget to clear the config cache file with this command

```bash
php artisan config:cache
```

## Usage

code example:

### Get user list

```php
use Gegeriyadi\LaravelDirectAdmin\Facades\DirectAdmin;

$result = DirectAdmin::getUserList();

dd($result);
```

### Create new account

To create new account you must add `Gegeriyadi\LaravelDirectAdmin\NewAccountParameter` class for pass the new account parameter.

```php
use Gegeriyadi\LaravelDirectAdmin\Facades\DirectAdmin;
use Gegeriyadi\LaravelDirectAdmin\NewAccountParameter;

$newAccount = new NewAccountParameter();
$newAccount->domain = 'new-domain.com';
$newAccount->username = 'new-username';
$newAccount->passwd = 'new-userpass';
$newAccount->package = 'yourhostpackage';
$newAccount->email = 'usermail@gmail.com';

$result = DirectAdmin::createNewAccount($newAccount);

dd($result);
```

### Delete an account

```php
use Gegeriyadi\LaravelDirectAdmin\Facades\DirectAdmin;

$userToDelete = 'usertodelete';

$result = DirectAdmin::deleteAccount($userToDelete);

dd($result);
```

### Suspend an account

```php
use Gegeriyadi\LaravelDirectAdmin\Facades\DirectAdmin;

$userToSuspend = 'usertosuspend';

$result = DirectAdmin::suspendAccount($userToSuspend);

dd($result);
```

### Unsuspend an account

```php
use Gegeriyadi\LaravelDirectAdmin\Facades\DirectAdmin;

$userToUnsuspend = 'usertounsuspend';

$result = DirectAdmin::unsuspendAccount($userToUnsuspend);

dd($result);
```

## Contributions

As the DirectAdmin API keeps expanding pull requests are welcomed, as are requests for specific functionality. Pull requests should in general include proper unit tests for the implemented or corrected functions.

For more information about unit testing see the `README.md` in the tests folder.

## Legal

This software was developed for internal use. It is shared with the general public under the permissive MIT license, without any guarantee of fitness for any particular purpose. Refer to the included LICENSE file for more details.

The project is not in any way affiliated with JBMC Software or its employees.
