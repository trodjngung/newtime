newtime
=======
- Nó là gì?
 	- Đây là một trang web xem nhanh các thông tin mới được cập nhật của các trang web.
- Sử dụng như thế nào?
	Điểm chính trong code của project này là phần đọc file XML lí do là:
	- Đa phần các trang thông tin đều có kênh RSS và nó được cập nhật những bài mới đăng của trang thông tin đó.
	Bản chất của các kênh RSS đó là file XML do vậy việc đọc các file XML đó ta có thể cập nhật được những thông tin mới của trang tin.
	- Có những trang thông tin có các kênh RSS nhưng trong đó lại không có link hình ảnh đính theo kèm nên việc đọc những thông tin này chở nên nhàm chán,
	do vậy trong project này có phần đọc file html để lấy link ảnh hiển thị. Việc này mình không muốn đưa vào project do việc đọc html của trang thông tin để tìm ra 
	link ảnh sẽ mất nhiều thời gian và nặng nề cho server nhưng mình vẫn đưa vào để có thêm sự học hỏi về nó.
- Ưu điểm và nhược điểm của nó?
	- Ưu điểm: có thể cập nhật nhanh các thông tin của các trang tin tức mà mình chọn.
	- Nhược điểm: Các trang tin không được đa dạng do có nhiều trang không chia sẽ kênh RSS và những trang trong file XML không có link ảnh nên phải đọc html của trang tin đó lấy ảnh.
	Các khắc phục mình đưa ra một các mà mình đã sử dụng là sử dung cake trên server như vậy những người dùng khi vào web thì server sẽ không phải đọc các file XML hay html từ đầu mà
	sẽ đọc luôn từ cake mà server đã lưu, sử dụng Crontab trong linux để việc cập nhật cake một cách tự động hơn.
- Ưu và nhược điểm với những web tương tự:
	Theo như e biết thì chưa thấy web tin tức nào thực hiện các này, phương pháp này chủ yếu dùng cho các app đọc tin cho ứng dụng di động.
