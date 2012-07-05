About MGIClassifiedsBundle
===========================

MGIClassifiedsBundle allows to manage a simple classified advertising
board. It's a demo bundle built to give a practical example of the
features of `LyraAdminBundle`_.
This is a work in progress. While the *Getting Started* tutorial and other
`LyraAdminBundle docs`_ are being written, more features will be added to this
bundle.

.. _LyraAdminBundle: https://github.com/mgiagnoni/LyraAdminBundle
.. _LyraAdminBundle docs: https://github.com/mgiagnoni/LyraAdminBundle/blob/master/Resources/doc/index.rst

Installation
============

Install `LyraAdminBundle`_ (instructions are in bundle docs).
To install MGIClassifiedsBundle, from your project root folder run::

    git submodule add git://github.com/mgiagnoni/MGIClassifiedsBundle.git src/MGI/ClassifiedsBundle

To install the bundle as git submodule your whole project must be under version
control with git or the command ``git submodule add`` will return an error. In
this case, you can simply clone the repository::

    git clone git://github.com/mgiagnoni/MGIClassifiedsBundle.git src/MGI/ClassifiedsBundle

Add bundle to application kernel
--------------------------------

::

    // app/AppKernel.php

    public function registerBundles()
    {
        $bundles = array(
            // other bundles
            new MGI\ClassifiedsBundle\MGIClassifiedsBundle(),
        );

    // ...

Publish bundle assets
---------------------

::

    app/console assets:install web

Update database schema
----------------------

::

    app/console doctrine:schema:update

Import admin configuration
--------------------------

A file containing all the configuration options for the backend area
managed by LyraAdminBundle is included in the bundle and must be
imported in your application configuration::

    # app/config/config.yml

    imports:
        - { resource: '@MGIClassifiedsBundle/Resources/config/lyra_admin.yml'}

Go to backend area
------------------

::

    http://.../app_dev.php/admin/listing/list
