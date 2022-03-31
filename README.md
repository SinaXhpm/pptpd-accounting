# pptp-accounting
web interface pptp server accounting/management

# Dependencies
Php 5.4 or higher.
pptpd server
a Webserver or simply use php -S 0.0.0.0:1234 

# Password
Default Password is "smoking nirvana" cuz its my favorite music name.
You can change this value in line 5 of the index.php file.

# Note :
i made this on centos7 distro, so u have to care about directory names that used in index file.

-Limit Multilogin to 1 online connection per user/Centos or redhat bases
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

-Limit Multilogin to 1 online connection per user / Ubuntu or debian bases
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
hit star if u like it.
[![MIT license](https://img.shields.io/github/license/sinaxhpm/Azir_Socks_Over_Ssh)](http://opensource.org/licenses/MIT)
