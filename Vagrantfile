# -*- mode: ruby -*-
# vi: set ft=ruby :

# Vagrantfile API/syntax version. Don't touch unless you know what you're doing!
VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
  # All Vagrant configuration is done here. The most common configuration
  # options are documented and commented below. For a complete reference,
  # please see the online documentation at vagrantup.com.

  # Every Vagrant virtual environment requires a box to build off of.
  config.vm.box = "precise64"

  # The url from where the 'config.vm.box' box will be fetched if it
  # doesn't already exist on the user's system.
  config.vm.box_url = "http://files.vagrantup.com/precise64.box"

  # Create a forwarded port mapping which allows access to a specific port
  # within the machine from a port on the host machine. In the example below,
  # accessing "localhost:8080" will access port 80 on the guest machine.
  # config.vm.network :forwarded_port, guest: 80, host: 8080
  # config.vm.network :forwarded_port, guest: 443, host: 8090

  # Create a private network, which allows host-only access to the machine
  # using a specific IP.

  config.hostmanager.enabled = true
  config.hostmanager.manage_host = true
  config.hostmanager.ignore_private_ip = false
  config.hostmanager.include_offline = true
  config.vm.define 'rp3-website' do |node|
    node.vm.provision :shell, :path => "provisioning/bootstrap.sh"
    node.vm.hostname = 'rp3-website-hostname'
    node.vm.network :private_network, ip: '192.168.50.201'
    node.hostmanager.aliases = %w(rp3-website.dev)
  end

  # Create a public network, which generally matched to bridged network.
  # Bridged networks make the machine appear as another physical device on
  # your network.
  # config.vm.network :public_network

  # If true, then any SSH connections made will enable agent forwarding.
  # Default value: false
  # config.ssh.forward_agent = true

  # Share an additional folder to the guest VM. The first argument is
  # the path on the host to the actual folder. The second argument is
  # the path on the guest to mount the folder. And the optional third
  # argument is a set of non-required options.
  # config.vm.synced_folder "../data", "/vagrant_data"
  # config.vm.synced_folder "WordPress-Skeleton/wp/", "/var/www/", :owner => "www-data", :mount_options => [ "dmode=775", "fmode=774" ]
  # config.vm.synced_folder "WordPress-Skeleton/content/", "/var/www/content/", :owner => "www-data", :mount_options => [ "dmode=775", "fmode=774" ]
  # config.vm.synced_folder "prototype/", "/var/www/prototype/", :owner => "www-data", :mount_options => [ "dmode=775", "fmode=774" ]

  config.vm.synced_folder ".", "/vagrant"
  config.vm.synced_folder "wp-content/uploads", "/vagrant/wp-content/uploads", id: "uploads", :mount_options => ["dmode=777,fmode=666"]
  config.vm.synced_folder "wp-content/uploads/wp-migrate-db", "/vagrant/wp-content/uploads/wp-migrate-db", id: "migrate-db-uploads", :mount_options => ["dmode=777,fmode=666"]
end
