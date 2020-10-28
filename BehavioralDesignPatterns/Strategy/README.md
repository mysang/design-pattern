# Strategy
**Strategy** là một mẫu thiết kế hành vi cho phép bạn xác định một nhóm thuật toán, đặt mỗi thuật toán vào một lớp riêng biệt và làm cho các đối tượng của chúng có thể hoán đổi cho nhau.

- Độ phức tạp của mẫu này là 2.
- Mức độ phổ biến của mẫu này là 3.

# Ví dụ thực hành
### Chạy các câu lệnh sau để chạy chương trình (Nếu đã làm rồi thì bỏ qua):
- `git clone git@github.com:mysang/design-pattern.git`
- `cd design-pattern`
- `docker-compose up -d`

### Chạy chương trình ví dụ cho Python:
- `docker exec -it design-pattern-python /bin/bash`
- `cd BehavioralDesignPatterns/Strategy/python`
- `python main.py`

### Chạy chương trình ví dụ cho PHP:
- `docker exec -it design-pattern-php /bin/bash`
- `cd BehavioralDesignPatterns/Strategy/php`
- `php main.php`

# Vấn đề
Một ngày nọ, bạn quyết định tạo một ứng dụng điều hướng cho những khách du lịch bình thường. Ứng dụng tập trung vào một bản đồ đẹp giúp người dùng nhanh chóng định hướng cho mình ở bất kỳ thành phố nào.

Một trong những tính năng được yêu cầu nhiều nhất cho ứng dụng là lập kế hoạch tuyến đường tự động. Người dùng có thể nhập địa chỉ và xem tuyến đường nhanh nhất đến điểm đến đó được hiển thị trên bản đồ.

Phiên bản đầu tiên của ứng dụng chỉ có thể xây dựng các tuyến đường. Những người đi ô tô vỡ òa trong niềm vui sướng. Nhưng dường như, không phải ai cũng thích lái xe trong kỳ nghỉ của họ. Vì vậy, với bản cập nhật tiếp theo, bạn đã thêm một tùy chọn để xây dựng các tuyến đường đi bộ. Ngay sau đó, bạn đã thêm một tùy chọn khác để mọi người sử dụng phương tiện công cộng trong tuyến đường của họ.

Tuy nhiên, đó chỉ là khởi đầu. Sau đó, bạn dự định thêm xây dựng tuyến đường cho người đi xe đạp. Và thậm chí sau đó, một lựa chọn khác để xây dựng các tuyến đường qua tất cả các điểm du lịch của thành phố.

Mặc dù ở góc độ kinh doanh, ứng dụng đã thành công, nhưng phần kỹ thuật lại khiến bạn đau đầu. Mỗi lần bạn thêm một thuật toán định tuyến mới, lớp chính của trình điều hướng sẽ tăng gấp đôi kích thước. Tại một số điểm, con thú trở nên quá khó để duy trì.

Bất kỳ thay đổi nào đối với một trong các thuật toán, cho dù đó là một sửa lỗi đơn giản hay một sự điều chỉnh nhỏ về điểm số, đều ảnh hưởng đến cả lớp, làm tăng khả năng tạo ra lỗi trong mã đã hoạt động.

Ngoài ra, làm việc theo nhóm trở nên kém hiệu quả. Đồng đội của bạn, những người đã được thuê ngay sau khi phát hành thành công, phàn nàn rằng họ mất quá nhiều thời gian để giải quyết các xung đột hợp nhất. Việc triển khai một tính năng mới đòi hỏi bạn phải thay đổi cùng một lớp khổng lồ, xung đột với mã do người khác tạo ra.

# Giải pháp
Strategy pattern gợi ý rằng bạn nên chọn một lớp thực hiện điều gì đó cụ thể theo nhiều cách khác nhau và trích xuất tất cả các thuật toán này thành các lớp riêng biệt được gọi là chiến lược.

Lớp gốc, được gọi là ngữ cảnh, phải có một trường để lưu trữ tham chiếu đến một trong các chiến lược. Bối cảnh ủy quyền công việc cho một đối tượng chiến lược được liên kết thay vì tự thực thi nó.

Bối cảnh không chịu trách nhiệm chọn một thuật toán thích hợp cho công việc. Thay vào đó, khách hàng chuyển chiến lược mong muốn cho ngữ cảnh. Trên thực tế, bối cảnh không biết nhiều về chiến lược. Nó hoạt động với tất cả các chiến lược thông qua cùng một giao diện chung, chỉ hiển thị một phương pháp duy nhất để kích hoạt thuật toán được gói gọn trong chiến lược đã chọn.

Bằng cách này, ngữ cảnh trở nên độc lập với các chiến lược cụ thể, vì vậy bạn có thể thêm các thuật toán mới hoặc sửa đổi các thuật toán hiện có mà không cần thay đổi mã của ngữ cảnh hoặc các chiến lược khác.

Trong ứng dụng điều hướng của chúng tôi, mỗi thuật toán định tuyến có thể được trích xuất vào lớp riêng của nó bằng một phương thức `buildRoute` duy nhất. Phương thức chấp nhận một điểm xuất phát và điểm đến và trả về một tập hợp các điểm kiểm tra của tuyến đường.

Mặc dù đưa ra các đối số giống nhau, mỗi lớp định tuyến có thể xây dựng một tuyến đường khác nhau, lớp điều hướng chính không thực sự quan tâm đến thuật toán nào được chọn vì công việc chính của nó là hiển thị một tập hợp các điểm kiểm tra trên bản đồ. Lớp có một phương thức để chuyển đổi chiến lược định tuyến hoạt động, vì vậy các máy khách của nó, chẳng hạn như các nút trong giao diện người dùng, có thể thay thế hành vi định tuyến hiện được chọn bằng một hành vi khác.

# Ứng dụng thực tế
Hãy tưởng tượng rằng bạn phải đến sân bay. Bạn có thể bắt xe buýt, gọi taxi hoặc đi xe đạp. Đây là những chiến lược vận chuyển của bạn. Bạn có thể chọn một trong các chiến lược tùy thuộc vào các yếu tố như hạn chế về ngân sách hoặc thời gian.

# Khả năng áp dụng
- Sử dụng Strategy pattern khi bạn muốn sử dụng các biến thể khác nhau của thuật toán trong một đối tượng và có thể chuyển từ thuật toán này sang thuật toán khác trong thời gian chạy.
  - Strategy pattern cho phép bạn gián tiếp thay đổi hành vi của đối tượng trong thời gian chạy bằng cách liên kết nó với các đối tượng phụ khác nhau có thể thực hiện các nhiệm vụ phụ cụ thể theo những cách khác nhau.

- Sử dụng Strategy pattern khi bạn có nhiều lớp giống nhau chỉ khác nhau về cách chúng thực hiện một số hành vi.
  - Strategy pattern cho phép bạn trích xuất các hành vi khác nhau thành một hệ thống phân cấp lớp riêng biệt và kết hợp các lớp ban đầu thành một, do đó giảm mã trùng lặp.

- Sử dụng mẫu để cô lập logic nghiệp vụ của một lớp khỏi các chi tiết triển khai của các thuật toán có thể không quan trọng trong ngữ cảnh của logic đó.
  - Strategy pattern cho phép bạn tách biệt mã, dữ liệu nội bộ và phụ thuộc của các thuật toán khác nhau khỏi phần còn lại của mã. Các máy khách khác nhau có được một giao diện đơn giản để thực thi các thuật toán và chuyển đổi chúng trong thời gian chạy.

- Sử dụng mẫu khi lớp của bạn có một toán tử điều kiện lớn chuyển đổi giữa các biến thể khác nhau của cùng một thuật toán.
  - Strategy pattern cho phép bạn loại bỏ điều kiện như vậy bằng cách trích xuất tất cả các thuật toán thành các lớp riêng biệt, tất cả đều triển khai cùng một giao diện. Đối tượng ban đầu ủy quyền thực thi cho một trong những đối tượng này, thay vì triển khai tất cả các biến thể của thuật toán.

# Cách triển khai
1. Trong lớp ngữ cảnh, xác định một thuật toán dễ bị thay đổi thường xuyên. Nó cũng có thể là một điều kiện lớn chọn và thực thi một biến thể của cùng một thuật toán trong thời gian chạy.

2. Khai báo strategy interface chung cho tất cả các biến thể của thuật toán.

3. Từng người một, trích xuất tất cả các thuật toán vào các lớp riêng của chúng. Tất cả họ nên triển khai strategy interface.

4. Trong lớp ngữ cảnh, hãy thêm một trường để lưu trữ một tham chiếu đến một strategy object. Cung cấp một bộ định vị để thay thế các giá trị của trường đó. Bối cảnh chỉ nên hoạt động với strategy object thông qua strategy interface. Bối cảnh có thể xác định một giao diện cho phép chiến lược truy cập vào dữ liệu của nó.

5. Khách hàng của bối cảnh phải liên kết nó với một chiến lược phù hợp phù hợp với cách họ mong đợi bối cảnh thực hiện công việc chính của nó.

# Ưu điểm và nhược điểm
## Ưu điểm
- Bạn có thể hoán đổi các thuật toán được sử dụng bên trong một đối tượng trong thời gian chạy.

- Bạn có thể tách biệt chi tiết triển khai của một thuật toán khỏi mã sử dụng nó.

- Bạn có thể thay thế kế thừa bằng thành phần.

- Nguyên tắc Mở / Đóng. Bạn có thể giới thiệu các chiến lược mới mà không cần phải thay đổi bối cảnh.

## Nhược điểm
- Nếu bạn chỉ có một vài thuật toán và chúng hiếm khi thay đổi, thì không có lý do thực sự nào để làm phức tạp chương trình quá mức với các lớp và giao diện mới đi kèm với mẫu.

- Khách hàng phải nhận thức được sự khác biệt giữa các chiến lược để có thể chọn một chiến lược phù hợp.

- Rất nhiều ngôn ngữ lập trình hiện đại có hỗ trợ kiểu hàm cho phép bạn triển khai các phiên bản khác nhau của thuật toán bên trong một tập hợp các hàm ẩn danh. Sau đó, bạn có thể sử dụng các chức năng này chính xác như bạn đã sử dụng các strategy object, nhưng không làm tăng mã của bạn với các lớp và giao diện bổ sung.

# Mối quan hệ với các mẫu khác
- Bridge, State, Strategy (và ở một mức độ nào đó là Adapter) có cấu trúc rất giống nhau. Thật vậy, tất cả các mẫu này đều dựa trên bố cục, tức là ủy thác công việc cho các đối tượng khác. Tuy nhiên, chúng đều giải quyết các vấn đề khác nhau. Mẫu không chỉ là một công thức để cấu trúc mã của bạn theo một cách cụ thể. Nó cũng có thể giao tiếp với các nhà phát triển khác về vấn đề mà mẫu giải quyết.

- Command và Strategy có thể trông giống nhau vì bạn có thể sử dụng cả hai để tham số hóa một đối tượng bằng một số hành động. Tuy nhiên, họ có ý định rất khác nhau.
  - Bạn có thể sử dụng Command để chuyển đổi bất kỳ thao tác nào thành một đối tượng. Các tham số của hoạt động trở thành các trường của đối tượng đó. Việc chuyển đổi cho phép bạn trì hoãn việc thực hiện thao tác, xếp hàng đợi, lưu trữ lịch sử các lệnh, gửi lệnh đến các dịch vụ từ xa, v.v.

  - Mặt khác, Strategy thường mô tả các cách khác nhau để thực hiện cùng một việc, cho phép bạn hoán đổi các thuật toán này trong một lớp ngữ cảnh duy nhất.

- Decorator cho phép bạn thay đổi giao diện của một đối tượng, trong khi Strategy cho phép bạn thay đổi ruột.

- Template Method dựa trên sự kế thừa: nó cho phép bạn thay đổi các phần của một thuật toán bằng cách mở rộng các phần đó trong các lớp con. Strategy dựa trên cấu tạo: bạn có thể thay đổi các phần trong hành vi của đối tượng bằng cách cung cấp cho đối tượng các chiến lược khác nhau tương ứng với hành vi đó. Template Method hoạt động ở cấp lớp, vì vậy nó tĩnh. Strategy hoạt động ở cấp độ đối tượng, cho phép bạn chuyển đổi hành vi trong thời gian chạy.

- State có thể được coi là một phần mở rộng của Strategy. Cả hai mẫu đều dựa trên thành phần: chúng thay đổi hành vi của ngữ cảnh bằng cách ủy quyền một số công việc cho các đối tượng trợ giúp. Strategy làm cho các đối tượng này hoàn toàn độc lập và không biết về nhau. Tuy nhiên, State không hạn chế sự phụ thuộc giữa các trạng thái cụ thể, cho phép chúng thay đổi trạng thái của ngữ cảnh theo ý muốn.
