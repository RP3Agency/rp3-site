## Installing Vagrant
brew cask install vagrant
vagrant plugin install vagrant-hostmanager

Everything else should be installed onto the vagrant virtual machine
automatically.

You should now run your helper applications from your host system, NOT
the vagrant VM:

* `composer install`
* `gulp watch` (or any other specific gulp task you need)

Modify theme template files in src/theme

DO NOT modify anything directly in wp-content/themes/rp3
