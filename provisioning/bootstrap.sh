#!/usr/bin/env bash

echo "Installing apache2..."
apt-get update >/dev/null 2>&1
apt-get install -y apache2 >/dev/null 2>&1
rm -rf /var/www
ln -fs /vagrant /var/www

echo "Installing php5..."
apt-get install -y php5 >/dev/null 2>&1

echo "Installing mysql..."
debconf-set-selections <<< 'mysql-server mysql-server/root_password password password'
debconf-set-selections <<< 'mysql-server mysql-server/root_password_again password password'
apt-get install -y mysql-server >/dev/null 2>&1

echo "Getting php5 & mysql to talk to each other..."
apt-get install -y php5-mysql >/dev/null 2>&1

echo "Installing curl..."
apt-get install -y curl >/dev/null 2>&1

echo "Installing vim..."
apt-get install -y vim >/dev/null 2>&1

echo "Installing wp-cli..."
curl -L https://raw.github.com/wp-cli/builds/gh-pages/phar/wp-cli.phar > wp-cli.phar
chmod +x wp-cli.phar
mv wp-cli.phar /usr/bin/wp

echo "Initializing our WordPress database..."
cd /var/www
sudo -u www-data -i -- wp core download >/dev/null 2>&1
