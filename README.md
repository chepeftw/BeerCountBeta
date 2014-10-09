BeerCount
=========

An AWESOME web app with this incredible API to keep count of the beers you have in a bar.

This repo has a simple environment with the basics (Apache, MySQL and PHP) to run a Symfony2 project(BeerCount).

To run it just use the command:

```bash
vagrant up
```

Then you can ssh to the VM:

```bash
vagrant ssh
```

And to start working, you just need to install Symfony:

```bash
cd /var/www/html/beerCount
curl -sS https://getcomposer.org/installer | php
php composer.phar install
rm -rf /tmp/symfony/ # this is due to Vagrant, in a local Symfony install you should run chmod -R 777 app/cache app/logs
```

Then you can see running the [Hello World Page!](http://localhost:8181/beerCount/web/app_dev.php/demo/hello/World)
