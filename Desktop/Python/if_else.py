a=22
b=20
c=-10

if a>b and a>c:
    print("a is big")
elif b>a and b>c:
    print("b is big")

elif c>a and c>b:
    print("c is big")

else:
    print("all are equals")


#one hand if
x=10
y=90

print("x") if x>y else print("y")

#nested if else

rohan_age=22

if rohan_age>18:
    print("rohan is major he can vote.")

    if rohan_age>=21:
        print("and also be a candidate for election")

    else:
        print("but he can'nt be a election candidate.")

else:
    print("he is below then 18 year and he is not eligible for voting.")

#pass statement

q=11
w=22

if q>w:
    print("q is big")

else:
    pass
