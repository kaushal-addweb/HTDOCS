#!/usr/bin/python3
import pymysql
import cgi, cgitb
cgitb.enable()
form=cgi.FieldStorage()
# Open database connection
db = pymysql.connect(host="localhost", user="root",
                     password="", database="practise")
# prepare a cursor object using cursor() method
cursor = db.cursor()
# execute SQL query using execute() method.
cursor.execute("SELECT VERSION()")
# Fetch a single row using fetchone() method.
data = cursor.fetchone()
print("Content-Type: text/html;charset=utf-8")
print("Content-type: text/html\r\n\r\n")
print("<html>")
print("<head>")
print("<title>Hello - show MYSQL CGI Program</title>")
print("</head>")
print("<body>")
print("Database version : %s " % data)
print("</body>")
print("</html>")
# disconnect from server
db.close()
