#!/usr/bin/python3

import cgi, cgitb
cgitb.enable()

form = cgi.FieldStorage()

print ("Content-Type: text/html;charset=utf-8")
print ("Content-type:text/html\r\n\r\n")
print ('<html>')
print ('<head>')
print ('<title>Hello - Second CGI Program</title>')
print ('</head>')
print ('<body>')
first_name = form.getvalue('first_name')
last_name  = form.getvalue('last_name')
print ('<h2>Hello %s %s</h2>' % (first_name, last_name))
print ('</body>')
print ('</html>')