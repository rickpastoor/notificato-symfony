# Notificare for Symfony2

A bundle to integrate [Notificare](https://github.com/wrep/notificare) into [Symfony2](http://symfony.com).

## Installation

### 1. Add Composer dependency

The best way to install the bundle is by using [Composer](http://getcomposer.org). Add the following to `composer.json` in the root of your project:

```javascript
{
  "require": {
    "wrep/notificare-symfony": "*"
  }
}
```

### Include the bundle in your Kernel

Update the *app/AppKernel.php* file:

```
public function registerBundles()
{
    $bundles = array(
        // System Bundles
        ...
        new Wrep\Bundle\NotificareBundle\NotificareBundle(),
        ...
    );
}
```

## License


Notificare and Notificare for Symfony2 are released under the [MIT License](Resources/meta/LICENSE) so you can use it in commercial and non-commercial projects.

## Reporting an issue or a feature request

Symfony2 specific issues and feature requests are tracked in the [GitHub issue tracker](https://github.com/wrep/notificare-symfony/issues). Issues and feature requests for Noticare itself can be submitted at [the issue tracker at that repository](https://github.com/wrep/notificare/issues). You're very welcome to submit issues or submit a pull request.