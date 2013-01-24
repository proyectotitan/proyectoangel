// incluir al CLASSPATH f:\Ejerjava;C:\oracle\ora92\jdbc\lib\classes12.zip;
package proyecto;
import java.sql.*;
import javax.sql.*;
public class ConexionOracle{
// atributos
private Connection objconexion;
// metodos
public Connection  devolver(){return objconexion;}

public ConexionOracle(){
try{
Class.forName("oracle.jdbc.driver.OracleDriver");
System.out.println("hola dentro");
objconexion=DriverManager.getConnection("jdbc:oracle:thin:@pc01:1521:oscar","system","oscar");

}
catch(ClassNotFoundException error){
System.err.println("error no de puede cargar el controlador JDBC");
System.err.println(error.toString());
System.exit(1);
}
catch(SQLException error1){
System.err.println("no se ha establecido la conexi�n a la bbdd"+ error1);
System.exit(1);
}												 
catch(Exception error2){
System.err.println("hey "+ error2);
System.exit(1);
}	

System.out.println ("Conectado a la base de datos");
}// fin constructor

}// fin de la clase