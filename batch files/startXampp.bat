@echo off

for /f "delims=[] tokens=2" %%a in ('ping -4 -n 1 %ComputerName% ^| findstr [') do set NetworkIP=%%a

cd "C:\xampp"
call apache_stop.bat
call mysql_stop.bat
taskkill /f /IM xampp-control.exe

start xampp-control.exe

cd "C:\xampp"
timeout /t 10 /nobreak >nul
taskkill /f /IM xampp-control.exe

cd "C:\Program Files\Google\Chrome"
start chrome.exe http://%NetworkIP%/food4kids/

exit
