FROM ubuntu:19.04

ENV DENO_VERSION=0.11.0
ENV DEBIAN_FRONTEND=noninteractive

RUN apt-get update -y
RUN apt-get upgrade -y
RUN apt-get install -y nano
RUN apt-get install -y curl
RUN apt-get install -y tzdata
# set your timezone
RUN ln -fs /usr/share/zoneinfo/Europe/London /etc/localtime
RUN dpkg-reconfigure --frontend noninteractive tzdata

# RUN apt-get install -y apache2
# RUN a2enmod rewrite
# COPY 000-default.conf /etc/apache2/sites-available/000-default.conf
#ENV APACHE_RUN_USER www-data
#ENV APACHE_RUN_GROUP www-data
# ENV APACHE_RUN_GROUP www-data
# ENV APACHE_RUN_USER www-data
#ENV APACHE_LOG_DIR /var/log/apache2
#RUN chmod a+rwx -R /var/www/html
#RUN chown www-data:www-data -R /var/www/html

# EXPOSE 80 443

# Repos for PHP
#RUN apt-get install -y software-properties-common
#RUN export DEBIAN_FRONTEND=noninteractive
# RUN apt-get install -y -q mysql-server
# RUN mysqladmin -u root password root
#RUN curl -y -sS https://getcomposer.org/installer | php

#RUN curl -fsSL https://deno.land/x/install/install.sh | sh
RUN curl -fsSL https://github.com/denoland/deno/releases/download/v${DENO_VERSION}/deno_linux_x64.gz --output deno.gz
RUN gunzip deno.gz
RUN chmod 777 deno
RUN mv deno /usr/bin/deno
RUN apt-get remove -y curl
RUN apt-get clean
RUN rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

COPY main.ts     /main.ts

EXPOSE 8080 443

#RUN deno /main.ts --allow-all

CMD ["deno", "/main.ts", "--allow-all"]

#CMD ["tail", "-f", "/dev/null"]

#CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]

#ENTRYPOINT ["deno", "run", "https://deno.land/welcome.ts"]