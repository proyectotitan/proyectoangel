package proyecto;
import java.io.*;
import javax.servlet.*;
import javax.servlet.http.*;
import java.sql.*;
//import javax.sql.*;

public class GuardarUsuario extends HttpServlet{

public void doPost (HttpServletRequest request,
						  HttpServletResponse response
						 ) throws ServletException, IOException{
			devolverPagina(request, response);
			}
			
public void devolverPagina(HttpServletRequest request, HttpServletResponse  response) throws IOException{
	
	
	Connection conexion;
	ConexionOracle objconexion = new ConexionOracle();
	conexion = objconexion.devolver();
	ResultSet result;
	Statement orden;
	orden = conexion.createStatement();
	String usuario;
	String password;
	String correo;

	usuario = request.getParameter("r_usuario");
	password = request.getParameter("r_pass");
	correo = request.getParameter("r_email");

	
	String consulta = "insert into usuario values('"+usuario+"','"+password+"','"+correo+"')";
             //System.out.println("Consulta :"+consulta);
           orden.executeUpdate(consulta);
           orden.close();

}// fin del poost
}// fin de la clase

		
