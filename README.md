# pptp-accounting
web interface pptp server accounting/management

Need Php 5.4 or higher and pptpd server.
and some fking webserver or simply use php -S 0.0.0.0:1234 and open your ip in browser and here we go.
# Password
Default Password is "smoking nirvana" cuz its my favorite music name.
you can change it 5 line of index.php

# Note :
i wrote this panel in centos 7 so u have to care about directory names that used in index file.

-Disable Pptpd Server MultiLogin by one User Account /Centos or redhat bases
```
sleep 1
PID=$(cat /var/run/$REALDEVICE.pid)
if [ $PID ]; then
    PROCCESS="$(last -w | grep ppp | grep still | grep $REALDEVICE)"
    USERNAME=$(echo $PROCCESS | cut -d' ' -f1)
    NUMLOGINS="$(last -w | grep ppp | grep still | grep -c $USERNAME' ')"
    if [ $NUMLOGINS -gt 1 ]; then
        kill $PID
    fi
fi
```

-Disable Pptpd Server MultiLogin by one User Account / Ubuntu or debian bases
```
sleep 2
PID=$(cat /var/run/$PPP_IFACE.pid)
if [ $PID ]; then
    PROCCESS="$(last -w | grep ppp | grep still | grep $PPP_IFACE)"
    USERNAME=$(echo $PROCCESS | cut -d' ' -f1)
    NUMLOGINS="$(last -w | grep ppp | grep still | grep -c $USERNAME' ')"
    if [ $NUMLOGINS -gt 1 ]; then
        kill $PID
    fi
fi
```
Add these lines to if-up file in /etc/ppp/if-up
# Preview
![preview](https://github.com/SinaXhpm/pptpd-accounting/raw/master/preview1.jpg)

# License
press that fucking bullshit star button if it was fucking helpfull for u.
[![MIT license](https://img.shields.io/github/license/sinaxhpm/Azir_Socks_Over_Ssh)](http://opensource.org/licenses/MIT)
