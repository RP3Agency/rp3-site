## Installing Vagrant
brew cask install vagrant
vagrant plugin install vagrant-hostmanager

Everything else should be installed onto the vagrant virtual machine
automatically.  Run `vagrant ssh` to log into the virtual machine
and run your helper applications:

* `composer install`
* `gulp watch` (or any other specific gulp task you need)
