<%@ page contentType="text/html; charset=iso-8859-1" language="java" import="java.io.*,java.sql.*,proyecto.*, java.util.*, javax.servlet.*;"  errorPage=""  %>
<%
		Connection conexion;
		ConexionOracle objconexion = new ConexionOracle();
		conexion = objconexion.devolver();
		ResultSet result;
		Statement orden;
		String consulta = "select nombre from usuario where nombre='"+request.getParameter("s_usuario")+"'and pass='"+request.getParameter("s_pass")+"'";
		orden = conexion.createStatement();
		
	


String s_pass = request.getParameter("s_pass");
String s_usuario=request.getParameter("s_usuario");

result = orden.executeQuery(consulta);
 
 if (result.next() ==true) {

HttpSession sesion = request.getSession(true);
session.putValue("s_usuario", s_usuario);
%>
<jsp:forward page="inicio.jsp" />
<%
} else {
%>
<jsp:forward page="index.jsp">
</jsp:forward>
<%
}
orden.close();
conexion.close();
%>	