## This document and the provided files were provided by Bas Smit 

How to use the Arduino to update the Webserver

1. Install Xampp
2. Go to C:\\Xampp\htdocs
3. Create a subfolder called "Ethernet" and paste all the php and html files in this folder
4. Start the Apache and MySQL client from Xampp
5. Go to your webbrowser and enter the URL: "Localhost/phpmyadmin"
6. Create a database called ethernet with a table named data
7. Open the BasWorkingHitDetectionWifi.ino file and change the byte server to your local IP adress, this can be found through CMD with the command ipconfig (look for ip4 adress)
8. Go to hulpmiddelen/bibliotheek beheren and Install the following libraries (WifiNINA, ) 
