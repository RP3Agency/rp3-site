#!/usr/bin/env bash

# Update variables here. We'll get to them later in the script.
MYSQL_PASS="password"
DEV_URL="http://rp3-website.dev/_wp"
DEV_TITLE="RP3 Agency"
DEV_ADMIN_USER=admin
DEV_ADMIN_PASSWORD=password
DEV_ADMIN_EMAIL=analytics@rp3agency.com



# Now go forth and provision...

echo "Install Node and npm"
apt-get update
apt-get install -y software-properties-common python-software-properties
apt-get install -y python g++ make
add-apt-repository -y ppa:chris-lea/node.js
apt-get update
apt-get install -y nodejs

echo "Installing gulp globally"
npm install gulp -g

echo "Installing Local Packages"
cd /vagrant
npm install

echo "Installing Ruby"
apt-get install -y ruby-full build-essential
apt-get install -y rubygems

echo "Installing Sass and other Sass-related things"
gem install sass
gem install susy
gem install compass
gem install breakpoint

# echo "Running gulp for build compilation"
# cd /vagrant
# gulp

echo "Installing apache2..."
apt-get update
apt-get install -y apache2 libapache2-mod-php5 php5-gd php5-curl php5-memcache >/dev/null 2>&1
rm -rf /var/www
ln -fs /vagrant /var/www
a2enmod rewrite
sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/sites-enabled/000-default
sed -i 's/www-data/vagrant/' /etc/apache2/envvars

echo "Installing php5..."
apt-get install -y php5 >/dev/null 2>&1

echo "Installing curl..."
apt-get install -y curl >/dev/null 2>&1

echo "Installing Subversion"
apt-get install -y subversion >/dev/null 2>&1

echo "Installing composer"
curl -sS https://getcomposer.org/installer | php
mv composer.phar /usr/bin/composer

echo "Installing packages from composer"
cd /var/www
composer install

echo "Installing mysql..."
debconf-set-selections <<< "mysql-server mysql-server/root_password password $MYSQL_PASS"
debconf-set-selections <<< "mysql-server mysql-server/root_password_again password $MYSQL_PASS"
apt-get install -y mysql-server mysql-client >/dev/null 2>&1
mysql -uroot -proot -p$MYSQL_PASS -e "GRANT ALL PRIVILEGES ON *.* TO 'root'@'%' IDENTIFIED BY '"$MYSQL_PASS"'; FLUSH PRIVILEGES;"
service mysql restart



echo "Getting php5 & mysql to talk to each other..."
apt-get install -y php5-mysql >/dev/null 2>&1

echo "Installing vim..."
apt-get install -y vim >/dev/null 2>&1

echo "Installing wp-cli..."
curl -L https://raw.github.com/wp-cli/builds/gh-pages/phar/wp-cli.phar > wp-cli.phar
chmod +x wp-cli.phar
mv wp-cli.phar /usr/bin/wp

echo "Installing pecl_http"
apt-get install -y libpcre3-dev php-http php-pear libcurl3-openssl-dev
pear config-set php_ini /etc/php5/apache2/php.ini; sudo pecl config-set php_ini /etc/php5/apache2/php.ini
printf "\n" | sudo pecl install pecl_http-1.7.6

echo "Restarting Apache"
service apache2 restart

echo "Initializing our WordPress installation..."
cd /var/www

# Create the database based on values that already exist in wp-config.php
sudo -u www-data -i -- wp db create

# Install the bare minimum of our site
sudo -u www-data -i -- wp core install --url="$DEV_URL" --title="$DEV_TITLE" --admin_user="$DEV_ADMIN_USER" --admin_password="$DEV_ADMIN_PASSWORD" --admin_email="$DEV_ADMIN_EMAIL"
