<%@ page session="true" contentType="text/html; charset=ISO-8859-1" %>
<%@ taglib uri="http://www.tonbeller.com/jpivot" prefix="jp" %>
<%@ taglib prefix="c" uri="http://java.sun.com/jstl/core" %>


<jp:mondrianQuery id="query01" jdbcDriver="com.mysql.jdbc.Driver" 
jdbcUrl="jdbc:mysql://localhost/advuas?user=root&password=" catalogUri="/WEB-INF/queries/adventurework.xml">

select {[Measures].[Sales Amount]} ON COLUMNS,
  {([Time].[All Time],[Product].[All Products])} ON ROWS
from [Sales]


</jp:mondrianQuery>





<c:set var="title01" scope="session">Query AdventureWork</c:set>
