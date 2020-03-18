
  #include <Ultrasonic.h>
  #include <SoftwareSerial.h>
  #define TRIGGER_PIN 4               
  #define ECHO_PIN    5               
  Ultrasonic ultrassom(TRIGGER_PIN, ECHO_PIN); 

  SoftwareSerial mySerial(10, 11);

  int distancia;

void setup() {
  // put your setup code here, to run once:
  mySerial.begin(9600);
  Serial.begin(9600);
} 

void loop() {
  // put your main code here, to run repeatedly:
//  
//  float cmMsec;
//  long microsec = ultrasonic.timing();
//  cmMsec = ultrasonic.convert(microsec, Ultrasonic::CM);
//  //inMsec = ultrasonic.convert(microsec, Ultrasonic::IN);
//  //Exibe informacoes no serial monitor
//
  char buf[10];
//
//  //sprintf(buf, "AT+SEND = %lu", cmMsec);
//  Serial.print("Distancia em cm: ");
//  Serial.print(cmMsec);
  //Serial.print(" - Distancia em polegadas: ");
  //Serial.println(inMsec);

  //mySerial.println("AT+SEND = cmMsec inMsec");

 // Serial.println("INICIANDO LEITURA");

  distancia = ultrassom.Ranging(CM);// ultrassom.Ranging(CM) retorna a distancia em
                                     // centímetros(CM) ou polegadas(INC)

//   Serial.println(distancia); //imprime o valor da variável distancia
//   Serial.println("cm");
   sprintf(buf, "AT+SEND =\"%d\"", distancia);
   Serial.println(buf);
  //if(distancia < 10){
    mySerial.println(buf); 
  //}
   
//   sprintf(buf, "AT+SEND = %lu", distancia);
   delay(5000);

  
}
