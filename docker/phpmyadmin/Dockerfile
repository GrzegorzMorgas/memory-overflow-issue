FROM phpmyadmin/phpmyadmin:5.0.4

RUN apt-get install tzdata
RUN ln -sf "/usr/share/zoneinfo/Europe/Zurich" /etc/localtime && echo "Europe/Zurich" > /etc/timezone