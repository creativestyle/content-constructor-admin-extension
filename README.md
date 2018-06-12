How to install:
=======

Add repository to composer.json:

```
"repositories": [
    {
        "type": "vcs",
        "url":  "ssh://git@gitlab.creativestyle.pl/m2c/content-constructor-admin-extension.git"
    }
]
```

Add package to require section:

```
"require": {
    "creativestyle/content-constructor-admin-extension": "dev-master@dev"
}
```
Install with composer.

Enable module using CLI:

```
bin/magento module:enable Creativestyle_ContentConstructorAdminExtension
bin/magento setup:upgrade
```
