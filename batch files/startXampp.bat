@echo off

cd "C:\xampp"
call apache_stop.bat
call mysql_stop.bat
taskkill /f /IM xampp-control.exe

start xampp-control.exe

cd "C:\xampp"
timeout /t 10 /nobreak >nul
taskkill /f /IM xampp-control.exe

cd "C:\Program Files\Google\Chrome"
start chrome.exe http://192.168.1.103/food4kids/

exit
