# Notificato for Symfony2

A bundle to integrate [Notificato](https://github.com/wrep/notificato) into [Symfony2](http://symfony.com).

## Installation

### 1. Add Composer dependency

The best way to install the bundle is by using [Composer](http://getcomposer.org). Run the following command to add Notificato as a requirement to your project:

`composer require wrep/notificato-symfony`

You can use `*` as a version constraint if you don't know what to use.

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

### 3. Configuration (optional)

Add the following configuration options to your `app/config.yml`:

```yml
notificato:
    apns:
        certificate:
            pem: /path/to/pem/certificate.pem
            passphrase: the-passphrase-of-the-pem
            environment: sandbox
```

The given certificate will be used as default certificate. It's completely optional to set a default certificate, but recommended if you only push to one App.

## Getting started

We should add some basic examples of how to use this bundle in your project. :)

## License

Notificato and Notificato for Symfony2 are released under the [MIT License](Resources/meta/LICENSE) so you can use it in commercial and non-commercial projects.

## Reporting an issue or a feature request

Symfony2 specific issues and feature requests are tracked in the [GitHub issue tracker](https://github.com/wrep/notificato-symfony/issues). Issues and feature requests for Noticare itself can be submitted at [the issue tracker at that repository](https://github.com/wrep/notificato/issues). You're very welcome to submit issues or submit a pull request.