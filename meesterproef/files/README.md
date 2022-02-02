## This document and the provided files were provided by Bas Smit 

How to use the Arduino to update the Webserver

1. Install Xampp
2. Go to C:\\Xampp\htdocs
3. Create a subfolder called "Ethernet" and paste all the php and html files in this folder
4. Start the Apache and MySQL client from Xampp
5. Go to your webbrowser and enter the URL: "Localhost/phpmyadmin"
6. Create a new database on the left called ethernet and choose the option 'collation'
7. Create a folder called data with 4 collumns
8. Enter the data seen in SQL_Database.PNG
9. Create a database called ethernet with a table named data
10. Open the BasWorkingHitDetectionWifi.ino file and change the byte server to your local IP adress, this can be found through CMD with the command ipconfig (look for ip4 adress)
11. Go to hulpmiddelen/bibliotheek beheren and Install the following libraries (WifiNINA, ) 
