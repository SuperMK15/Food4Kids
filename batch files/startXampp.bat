@echo off

cd "C:\xampp"
call apache_stop.bat
call mysql_stop.bat
taskkill /f /IM xampp-control.exe

start xampp-control.exe

cd "C:\Program Files\Google\Chrome"
start chrome.exe http://localhost/food4kids/

cd "C:\xampp"
timeout /t 3 /nobreak
taskkill /f /IM xampp-control.exe

exit