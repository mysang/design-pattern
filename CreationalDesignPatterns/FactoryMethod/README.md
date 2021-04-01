# Factory Method
**Factory Method** là một **Creational design pattern** cung cấp một giao diện để tạo các đối tượng trong lớp cha, nhưng cho phép các lớp con thay đổi loại đối tượng sẽ được tạo.

- Độ phức tạp của mẫu này là 1.
- Mức độ phổ biến của mẫu này là 3.

# Ví dụ thực hành
### Chạy các câu lệnh sau để chạy chương trình (Nếu đã làm rồi thì bỏ qua):
- `git clone git@github.com:mysang/design-pattern.git`
- `cd design-pattern`
- `docker-compose up -d`

### Chạy chương trình ví dụ cho Python:
- `docker exec design-pattern-python python /app/CreationalDesignPatterns/FactoryMethod/python/main.py`

### Chạy chương trình ví dụ cho PHP:
- `docker exec design-pattern-php php /app/CreationalDesignPatterns/FactoryMethod/php/main.php`

# Vấn đề

# Giải pháp

# Ứng dụng thực tế
Chúng ta đang muốn viết một tính năng để đăng bài viết lên mạng xã hội thông qua API. Đầu tiên chúng ta sẽ viết hàm đăng bài lên Facebook, nhưng đến một ngày chúng ta cần đăng bài lên Twitter, Instagram... nữa thì việc sử dụng hàm đăng bài kia sẽ không còn khả thi, khó bảo trì và phát triển.

Vậy đến lúc này, chúng ta nên áp dụng Factory Method Pattern. Chúng ta sẽ tạo một lớp cha mà trong đó chúng ta có thể tạo được một đối tượng. Sau đó chúng ta sẽ tạo các lớp con mà có thể thay đổi được loại đối tượng sẽ được tạo từ lớp cha.

Một Factory Method Pattern sẽ bào gồm:
- Creator
- Concrete Creator
- Product
- Concrete Product

Vậy theo như bài toán trên thì chúng ta sẽ có được những thành phần tương tự:
- (Creator) Abstract clas SocialNetworkPoster (Lớp cha dùng để khởi tạo đối tượng)
- (Concrete Creator) Class FacebookPoster (Lớp con dùng để khởi tạo đối tượng trong lớp cha, lớp này sẽ extends lớp cha SocialNetworkPoster)
- (Concrete Creator) Class TwitterPoster (Lớp con dùng để khởi tạo đối tượng trong lớp cha, lớp này sẽ extends lớp cha SocialNetworkPoster)
- (Product) Interface SocialNetworkConnector (Lớp này dùng để cung cấp giao diện cho các lớp con thực thi)
- (Concrete Product) Class FacebookConnector (Lớp này dùng để thực thi các hàm gửi dữ liệu qua API, lớp này kế thừa interface SocialNetworkConnector)
- (Concrete Product) Class TwitterConnector (Lớp này dùng để thực thi các hàm gửi dữ liệu qua API, lớp này kế thừa interface SocialNetworkConnector)
# Khả năng áp dụng

# Cách triển khai

# Ưu điểm và nhược điểm
## Ưu điểm

## Nhược điểm

# Mối quan hệ với các mẫu khác
