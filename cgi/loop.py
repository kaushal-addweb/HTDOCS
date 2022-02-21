#!/usr/bin/python 
import cgi

form = cgi.FieldStorage()
print ('Content-type:text/html\r\n\r\n')
print ('<html>')
print ('<head>')
print ('<title>Hello - Second CGI Program</title>')
print ('</head>')
print ('<body>')
for a in range(5):
    print(a)

print ('</body>')
print ('</html>')