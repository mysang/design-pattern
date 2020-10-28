# Observer
**Observer** là một Behavioral design pattern cho phép bạn xác định cơ chế đăng ký để thông báo cho nhiều đối tượng về bất kỳ sự kiện nào xảy ra với đối tượng mà họ đang quan sát.

- Độ phức tạp của mẫu này là 2.
- Mức độ phổ biến của mẫu này là 3.

# Ví dụ thực hành
### Chạy các câu lệnh sau để chạy chương trình (Nếu đã làm rồi thì bỏ qua):
- `git clone git@github.com:mysang/design-pattern.git`
- `cd design-pattern`
- `docker-compose up -d`

### Chạy chương trình ví dụ cho Python:
- `docker exec -it design-pattern-python /bin/bash`
- `cd BehavioralDesignPatterns/Observer/python`
- `python main.py`

### Chạy chương trình ví dụ cho PHP:
- `docker exec -it design-pattern-php /bin/bash`
- `cd BehavioralDesignPatterns/Observer/php`
- `php main.php`

# Vấn đề
Hãy tưởng tượng rằng bạn có hai loại đối tượng: `Khách hàng` và `Cửa hàng`. Khách hàng rất quan tâm đến một thương hiệu sản phẩm cụ thể (giả sử đó là một mẫu iPhone mới) sẽ sớm có mặt trong cửa hàng.

Khách hàng có thể ghé thăm cửa hàng mỗi ngày và kiểm tra tính sẵn có của sản phẩm. Nhưng trong khi sản phẩm vẫn đang trên đường, hầu hết những chuyến đi này sẽ trở nên vô nghĩa.

Mặt khác, cửa hàng có thể gửi hàng tấn email (có thể được coi là thư rác) cho tất cả khách hàng mỗi khi có sản phẩm mới. Điều này sẽ giúp một số khách hàng thoát khỏi những chuyến đi bất tận đến cửa hàng. Đồng thời, điều này sẽ làm khó chịu những khách hàng khác không quan tâm đến sản phẩm mới.

Có vẻ như chúng ta đã xảy ra xung đột. Khách hàng lãng phí thời gian kiểm tra sản phẩm còn hàng hoặc cửa hàng lãng phí nguồn lực để thông báo sai cho khách hàng.

# Giải pháp
Đối tượng có một số trạng thái thú vị thường được gọi là chủ thể, nhưng vì nó cũng sẽ thông báo cho các đối tượng khác về những thay đổi đối với trạng thái của nó, chúng tôi sẽ gọi nó là nhà xuất bản. Tất cả các đối tượng khác muốn theo dõi các thay đổi đối với trạng thái của nhà xuất bản được gọi là người đăng ký.

Observer pattern gợi ý rằng bạn nên thêm cơ chế đăng ký vào publisher class để các đối tượng riêng lẻ có thể đăng ký hoặc hủy đăng ký khỏi luồng sự kiện đến từ nhà xuất bản đó. Đừng sợ! Mọi thứ không phức tạp như bạn tưởng. Trên thực tế, cơ chế này bao gồm 1) trường mảng để lưu trữ danh sách các tham chiếu đến các đối tượng người đăng ký và 2) một số phương thức công khai cho phép thêm người đăng ký vào và xóa họ khỏi danh sách đó.

Giờ đây, bất cứ khi nào một sự kiện quan trọng xảy ra với nhà xuất bản, nhà xuất bản sẽ xem xét người đăng ký của mình và gọi phương thức thông báo cụ thể trên các đối tượng của họ.

Các ứng dụng thực có thể có hàng chục subscriber classe khác nhau quan tâm đến việc theo dõi các sự kiện của cùng một publisher class. Bạn sẽ không muốn ghép nhà xuất bản vào tất cả các lớp đó. Bên cạnh đó, bạn thậm chí có thể không biết trước về một số trong số chúng nếu publisher class của bạn được người khác sử dụng.

Đó là lý do tại sao điều quan trọng là tất cả người đăng ký phải triển khai cùng một interface và nhà xuất bản chỉ giao tiếp với họ qua interface đó. Interface này nên khai báo phương thức thông báo cùng với một tập hợp các tham số mà nhà xuất bản có thể sử dụng để chuyển một số dữ liệu theo ngữ cảnh cùng với thông báo.

Nếu ứng dụng của bạn có nhiều loại publisher khác nhau và bạn muốn làm cho subscriber của mình tương thích với tất cả họ, bạn có thể tiến xa hơn nữa và làm cho tất cả các publisher tuân theo cùng một interface. Interface này chỉ cần mô tả một số phương pháp đăng ký. Interface sẽ cho phép subscriber quan sát trạng thái của publisher mà không liên quan đến các lớp cụ thể của họ.

# Ứng dụng thực tế
Nếu bạn đăng ký một tờ báo hoặc tạp chí, bạn không cần phải đến cửa hàng để kiểm tra xem số tiếp theo có sẵn hay không. Thay vào đó, nhà xuất bản sẽ gửi các số báo mới trực tiếp đến hộp thư của bạn ngay sau khi xuất bản hoặc thậm chí trước.

Nhà xuất bản duy trì danh sách những người đăng ký và biết họ quan tâm đến tạp chí nào. Người đăng ký có thể rời khỏi danh sách bất kỳ lúc nào khi họ muốn ngăn nhà xuất bản gửi các số tạp chí mới cho họ.

# Khả năng áp dụng
- Sử dụng Observer pattern khi các thay đổi đối với trạng thái của một đối tượng có thể yêu cầu thay đổi các đối tượng khác và tập đối tượng thực tế không được biết trước hoặc thay đổi động.
  - Bạn thường có thể gặp sự cố này khi làm việc với các lớp của graphical user interface. Ví dụ: bạn đã tạo các lớp nút tùy chỉnh và bạn muốn cho phép khách hàng kết nối một số mã tùy chỉnh vào các nút của bạn để nó kích hoạt bất cứ khi nào người dùng nhấn vào một nút. <br> <br>
  Observer pattern cho phép bất kỳ đối tượng nào triển khai subscriber interface đăng ký nhận thông báo sự kiện trong đối tượng publisher. Bạn có thể thêm cơ chế đăng ký vào các nút của mình, cho phép khách hàng kết nối mã tùy chỉnh của họ thông qua các lớp người đăng ký tùy chỉnh.

- Sử dụng mẫu khi một số đối tượng trong ứng dụng của bạn phải quan sát những đối tượng khác, nhưng chỉ trong thời gian giới hạn hoặc trong các trường hợp cụ thể.
  - Danh sách đăng ký là động, vì vậy subscriber có thể tham gia hoặc rời khỏi danh sách bất cứ khi nào họ cần.

# Cách triển khai
1. Xem qua logic kinh doanh của bạn và cố gắng chia nó thành hai phần: chức năng cốt lõi, độc lập với mã khác, sẽ hoạt động như publisher; phần còn lại sẽ biến thành tập các subscriber classe.

2. Khai báo subscriber interface. Ở mức tối thiểu, nó phải khai báo một phương thức cập nhật duy nhất.

3. Khai báo publisher interface và mô tả một cặp phương pháp để thêm đối tượng subscriber và xóa đối tượng đó khỏi danh sách. Hãy nhớ rằng publisher chỉ được làm việc với subscriber qua subscriber interface.

4. Quyết định vị trí đặt danh sách đăng ký thực tế và việc triển khai các phương thức đăng ký. Thông thường, mã này trông giống nhau đối với tất cả các loại publisher, vì vậy vị trí rõ ràng để đặt nó là trong một lớp trừu tượng được dẫn xuất trực tiếp từ publisher interface. publisher cụ thể mở rộng lớp đó, kế thừa hành vi đăng ký. <br> <br>
Tuy nhiên, nếu bạn đang áp dụng mẫu cho hệ thống phân cấp lớp hiện có, hãy xem xét cách tiếp cận dựa trên thành phần: đặt logic đăng ký vào một đối tượng riêng biệt và khiến tất cả các publisher thực sử dụng nó.

5. Tạo các publisher classe cụ thể. Mỗi khi có điều gì quan trọng xảy ra bên trong publisher, publisher phải thông báo cho tất cả những subscriber của mình.

6. Thực hiện các phương pháp thông báo cập nhật trong các subscriber classe cụ thể. Hầu hết subscriber sẽ cần một số dữ liệu ngữ cảnh về sự kiện. Nó có thể được chuyển như một đối số của phương thức thông báo. <br> <br>
Nhưng có một lựa chọn khác. Khi nhận được thông báo, subscriber có thể lấy bất kỳ dữ liệu nào trực tiếp từ thông báo. Trong trường hợp này, publisher phải tự chuyển qua phương thức cập nhật. Tùy chọn kém linh hoạt hơn là liên kết publisher với subscriber vĩnh viễn thông qua phương thức khởi tạo.

7. Client phải tạo tất cả subscriber cần thiết và đăng ký họ với các publisher thích hợp.

# Ưu điểm và nhược điểm
## Ưu điểm
- Open/Closed Principle. You can introduce new subscriber classes without having to change the publisher’s code (and vice versa if there’s a publisher interface).

- Nguyên tắc Mở / Đóng. Bạn có thể giới thiệu các subscriber classe mới mà không cần phải thay đổi mã của publisher (và ngược lại nếu có publisher interface).

- Bạn có thể thiết lập quan hệ giữa các đối tượng trong thời gian chạy.

## Nhược điểm
- Subscribers được thông báo theo thứ tự ngẫu nhiên.

# Mối quan hệ với các mẫu khác
- Chain of Responsibility, Command, Mediator và Observer giải quyết các cách khác nhau để kết nối người gửi và người nhận yêu cầu:
  - Chain of Responsibility chuyển một yêu cầu tuần tự dọc theo một chuỗi động gồm những người nhận tiềm năng cho đến khi một trong số họ xử lý nó.

  - Command kết nối một chiều giữa người gửi và người nhận.

  - Mediator loại bỏ các kết nối trực tiếp giữa người gửi và người nhận, buộc họ phải giao tiếp gián tiếp thông qua một đối tượng trung gian.

  - Observer cho phép người nhận đăng ký động và hủy đăng ký nhận yêu cầu.

- Sự khác biệt giữa Mediator và Observer thường khó nắm bắt. Trong hầu hết các trường hợp, bạn có thể triển khai một trong các mẫu này; nhưng đôi khi bạn có thể áp dụng đồng thời cả hai. Hãy xem cách chúng tôi có thể làm điều đó.<br><br>
Mục tiêu chính của Mediator là loại bỏ sự phụ thuộc lẫn nhau giữa một tập hợp các thành phần hệ thống. Thay vào đó, các thành phần này trở nên phụ thuộc vào một đối tượng trung gian duy nhất. Mục tiêu của Observer là thiết lập các kết nối động một chiều giữa các đối tượng, nơi một số đối tượng hoạt động như cấp dưới của những đối tượng khác.<br><br>
Có một cách triển khai phổ biến của Mediator pattern dựa vào Observer. Đối tượng mediator đóng vai trò là publisher và các thành phần đóng vai trò là subscriber đăng ký và hủy đăng ký các sự kiện của mediator. Khi Mediator được triển khai theo cách này, nó có thể trông rất giống với Observer.<br><br>
Khi bạn bối rối, hãy nhớ rằng bạn có thể triển khai Mediator pattern theo những cách khác. Ví dụ: bạn có thể liên kết vĩnh viễn tất cả các thành phần với cùng một đối tượng mediator. Việc triển khai này sẽ không giống với Observer nhưng vẫn sẽ là một bản sao của mẫu Mediator.<br><br>
Bây giờ hãy tưởng tượng một chương trình mà tất cả các thành phần đã trở thành publisher, cho phép các kết nối động giữa nhau. Sẽ không có đối tượng dàn xếp tập trung, chỉ có một nhóm quan sát viên phân tán.
