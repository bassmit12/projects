#include <WiFiNINA.h>

byte serv[] = {192, 168, 1, 119} ; //Enter the IPv4 address
char ssid[] = "ASUS_Router";        // your network SSID (name)
char pass[] = "yuM5KrkO4";    // your network password (use for WPA, or use as key for WEP)
int status = WL_IDLE_STATUS;     // the Wifi radio's status

WiFiClient client;

int sensorPin0 = A0;   
int sensorPin1 = A1;
int sensorPin2 = A2;
int sensorPin3 = A3;

int sensorValue0 = 1023; // variable to store the value coming from the sensor
int sensorValue1 = 1023;
int sensorValue2 = 1023;
int sensorValue3 = 1023;

int minimalHit = 990;

void setup() {
Serial.begin(9600); //setting the baud rate at 9600
Serial.print("Attempting to connect to network: ");
  // attempt to connect to Wifi network:
  while (status != WL_CONNECTED) {
    Serial.print("Connected to the network: ");
    Serial.println(ssid);
    // Connect to WPA/WPA2 network:
    status = WiFi.begin(ssid, pass);

    // wait 10 seconds for connection:
    delay(10000);
  }

  // you're connected now, so print out the data:
  Serial.println("You're connected to the network");
  
  Serial.println("----------------------------------------");
  printData();
  Serial.println("----------------------------------------");

pinMode(A0, INPUT);
pinMode(A1, INPUT);
pinMode(A2, INPUT);
pinMode(A3, INPUT);
   
Serial.println("Initialising monitor");

}
void loop() {

String player = "player2";
int score = 2;

sensorValue0 = analogRead(sensorPin0);
sensorValue1 = analogRead(sensorPin1);
sensorValue2 = analogRead(sensorPin2);
sensorValue3 = analogRead(sensorPin3);
  
String PostData = String("?player=") + String(player) + String("&score=") + String(score);
String Adress = String ("POST ") + String("/ethernet/data.php") + String(PostData) + String(" HTTP/1.1");


if (client.connect(serv, 80) ==1 && (sensorValue0 < minimalHit || sensorValue1 < minimalHit || sensorValue2 < minimalHit || sensorValue3 < minimalHit)) { //Connecting at the IP address and port we saved before

  Serial.println("connected + hit");
  
  client.println(Adress);//Connecting and Sending values to database
  client.println("Host: 192.168.1.119"); //CHANGE THIS
  client.println("User-Agent: Arduino/1.0");
  client.println("Connection: close");
  client.print("Content-Length: ");
  client.println(PostData.length());
  client.println();
  client.println(PostData);
  
  client.stop(); //Closing the connection
  delay(1500);
  }
else {
// if you didn't get a connection to the server:
//Serial.println("connection failed");
}
}

void printData() {
  Serial.println("Board Information:");
  // print your board's IP address:
  IPAddress ip = WiFi.localIP();
  Serial.print("IP Address: ");
  Serial.println(ip);

  Serial.println();
  Serial.println("Network Information:");
  Serial.print("SSID: ");
  Serial.println(WiFi.SSID());

  // print the received signal strength:
  long rssi = WiFi.RSSI();
  Serial.print("signal strength (RSSI):");
  Serial.println(rssi);

  byte encryption = WiFi.encryptionType();
  Serial.print("Encryption Type:");
  Serial.println(encryption, HEX);
  Serial.println();
}
