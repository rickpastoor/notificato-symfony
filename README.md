# Notificato for Symfony2

[Notificato](https://github.com/wrep/notificato) takes care of push notifications in your Symfony2 projects.

> *Italian:* **notificato** è: participio passato *English:* **notified**

## What is Notificato?
Notificato makes you send push messages from PHP projects, this repository is a Symfony2 bundle to easily integrate into Symfony. Want to know more about Notificato? Please check out the [Notificate repository](https://github.com/wrep/notificato) for more information.

## Installation

### 1. Add Composer dependency
Installation with [Composer](http://getcomposer.org) is recommended. Run the require command to add Notificato to your project:

`composer require wrep/notificato-symfony`

### 2. Include the bundle in your Kernel
Add `NotificatoBundle` to `app/AppKernel.php`:

```php
public function registerBundles()
{
    $bundles = array(
        ...
        new Wrep\Bundle\NotificatoBundle\NotificatoBundle(),
        ...
    );
}
```

### 3. Configuration of the default certificate
Add the following configuration options to your `app/config.yml`:

```yml
notificato:
    apns:
        certificate:
            pem: /path/to/pem/certificate.pem       # Required if you want to use a default certificate
            passphrase: the-passphrase-of-the-pem   # Required if you want to use a default certificate
            validate: true                          # Optional, default true, set to false if certificate validation fails
            environment: sandbox                    # Optional, autodetect by default, set to production/sandbox if certificate validation fails
```

The given certificate will be used as default certificate. It's completely optional to set a default certificate, but recommended if you only push to one App.

## Getting started
Once installed you can start using Notificato quite easily from any `ContainerAware`-environment. Lets say you want to send a pushmessage from a controller:

```php
class PushController extends Controller
{
    public function indexAction()
    {
        // First we get a Notificato instance
        $notificato = $this->get('notificato');

        // Now let us get a fresh message from Notificato
        //  This message will be send to device with pushtoken 'fffff...'
        //  it will automaticly be associated with the default certificate
        $message = $notificato->createMessage('ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff');

        // Let's set App icon badge with this push to 1
        $message->setBadge(1);

        // The message is ready, let's send it!
        //  Be aware that this method is blocking and on failure Notificato will retry a few times
        $messageEnvelope = $notificato->send($message);

        // The returned envelope contains usefull information about how many retries where needed and if sending succeeded
        echo $messageEnvelope->getFinalStatusDescription();

        // Of course you should return a nice Response here!
    }
}
```

Use `$this->get('notificato');` to get a Notificato object that is already set up with the default certificate from the config. From there everything is the same as using the normal Notificato library, so check out the [docs](https://github.com/wrep/notificato/blob/master/doc/Readme.md) and [API description](http://wrep.github.com/notificato/master/) over there for more tips and tricks.

Note that there are more services available to get deeper into the Notificare structure, take a look at the services.xml if you're interested.

## Contribute
We'll love contributions, read the Notificare [Contribute.md](https://github.com/wrep/notificato/blob/master/Contribute.md) for some more info on what you can do and stuff that you should know if you want to help!

Please note that issues and feature requests specific to Notificare for Symfony2 are tracked in the [GitHub issue tracker](https://github.com/wrep/notificato-symfony/issues) with this repository. Issues and feature requests for Noticare itself can be submitted at [the issue tracker at that repository](https://github.com/wrep/notificato/issues).

## License & Credits
Notificato for Symfony2 is released under the [MIT License](License) by [Wrep](http://www.wrep.nl/), so feel free to use it in commercial and non-commercial projects.