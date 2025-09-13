# Shikimori

```bash
  composer require noilty/socialiteproviders-shikimori
```

## Laravel Socialite
https://laravel.com/docs/12.x/socialite#installation

## Installation & Basic Usage

Please see the [Base Installation Guide](https://socialiteproviders.com/usage/), then follow the provider specific instructions below.

### Add configuration to `config/services.php`

```php
'shikimori' => [
    'client_id' => env('SHIKIMORI_CLIENT_ID'),
    'client_secret' => env('SHIKIMORI_CLIENT_SECRET'),
    'redirect' => env('SHIKIMORI_REDIRECT_URI')
],
```

### Add provider event listener

In Laravel 11, the default `EventServiceProvider` provider was removed. Instead, add the listener using the `listen` method on the `Event` facade, in your `AppServiceProvider` `boot` method.

* Note: You do not need to add anything for the built-in socialite providers unless you override them with your own providers.

```php
Event::listen(function (\SocialiteProviders\Manager\SocialiteWasCalled $event) {
    $event->extendSocialite('shikimori', \Noilty\SocialiteProviders\Shikimori\Provider::class);
});
```

<details>
<summary>
Laravel 10 or below
</summary>
Configure the package's listener to listen for `SocialiteWasCalled` events.

Add the event to your `listen[]` array in `app/Providers/EventServiceProvider`. See the [Base Installation Guide](https://socialiteproviders.com/usage/) for detailed instructions.

```php
protected $listen = [
    \SocialiteProviders\Manager\SocialiteWasCalled::class => [
        // ... other providers
        \Noilty\SocialiteProviders\Shikimori\ShikimoriExtendSocialite::class.'@handle',
    ],
];
```
</details>

### Usage

You should now be able to use the provider like you would regularly use Socialite (assuming you have the facade installed):

```php
return Socialite::driver('shikimori')->redirect();
```

### Returned User fields

- ``id``
- ``nickname``
- ``locale``
