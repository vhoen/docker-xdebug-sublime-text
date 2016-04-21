FROM debian:wheezy

# Install base packages
ENV DEBIAN_FRONTEND noninteractive
RUN apt-get update && \
    apt-get install -yq \
        apache2 \
        libapache2-mod-php5 \
        locales\
        php5-xdebug
RUN rm -rf /var/lib/apt/lists/*

RUN dpkg-reconfigure locales && \
    locale-gen C.UTF-8 && \
    /usr/sbin/update-locale LANG=C.UTF-8

ENV LC_ALL C.UTF-8

# Activate rewrite engine
RUN a2enmod php5
# RUN a2enmod rewrite

# Set Apache environment variables (can be changed on docker run with -e)
ENV APACHE_RUN_USER www-data
ENV APACHE_RUN_GROUP www-data
ENV APACHE_PID_FILE /var/run/apache2.pid
ENV APACHE_RUN_DIR /var/run/apache2
ENV APACHE_LOCK_DIR /var/lock/apache2
ENV APACHE_LOG_DIR /var/www/logs
ENV APACHE_SERVERADMIN admin@localhost
# ENV APACHE_SERVERNAME localhost
# ENV APACHE_DOCUMENTROOT /home/www
# ENV APPLICATION_ENV development

# # enable virtual host
# ADD ./001-docker.conf /etc/apache2/sites-available/
# RUN ln -s /etc/apache2/sites-available/001-docker.conf /etc/apache2/sites-enabled/

ADD ./conf/apache/apache2.conf /etc/apache2
ADD ./conf/php/xdebug.ini /etc/php5/mods-available
ADD ./conf/php/php.ini /etc/php5/apache2

# Set workdir
WORKDIR /home/www

EXPOSE 80

# Start apache by default
CMD /usr/sbin/apache2ctl -D FOREGROUND
