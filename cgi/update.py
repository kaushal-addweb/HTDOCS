#!/usr/bin/python3
import pymysql
import cgi,cgitb
cgitb.enable()

form = cgi.FieldStorage()
id = form['id'].value
print ("Content-type:text/html\r\n")
print(id)




# db = pymysql.connect(host="localhost",user="root",password="",database="Admin_Panel" )

# # prepare a cursor object using cursor() method
# cursor = db.cursor()

# try:
# 	# execute SQL query using execute() method.
# 	cursor.execute("update info set name='%s',email='%s',password='%s',mobno='%s' where id=%d" %(name,email,password,mobno))
# 	# Commit your changes in the database
# 	db.commit()
# 	print("Data Updated")
# except:
#     # Rollback in case there is any error
#     db.rollback()
#     print("error in updating")
# # disconnect from server
# db.close()