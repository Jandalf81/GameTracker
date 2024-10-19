# GameTracker

## Mount the HTML directory on every boot
* Open Crontab
```sudo crontab -e```
* Add the following entry
```@reboot sudo mount --bind /home/pi/GameTracker/HTML /var/www/html/GameTracker```