@echo off

cd "C:\xampp"
call apache_stop.bat
call mysql_stop.bat
taskkill /f /IM xampp-control.exe

exit