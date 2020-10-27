# Composite
**Composite** là một Structural design pattern cho phép bạn bố cục các đối tượng thành cấu trúc cây và sau đó làm việc với các cấu trúc này như thể chúng là các đối tượng riêng lẻ.

- Độ phức tạp của mẫu này là 2.
- Mức độ phổ biến của mẫu này là 2.

# Ví dụ thực hành
### Chạy các câu lệnh sau để chạy chương trình (Nếu đã làm rồi thì bỏ qua):
- `git clone git@github.com:mysang/design-pattern.git`
- `cd design-pattern`
- `docker-compose up -d`

### Chạy chương trình ví dụ cho Python:
- `docker exec -it design-pattern-python /bin/bash`
- `cd StructuralDesignPatterns/Composite/python`
- `python main.py`

### Chạy chương trình ví dụ cho PHP:
- `docker exec -it design-pattern-php /bin/bash`
- `cd StructuralDesignPatterns/Composite/php`
- `php main.php`

# Vấn đề
Sử dụng Composite pattern chỉ có ý nghĩa khi mô hình cốt lõi của ứng dụng của bạn có thể được biểu diễn dưới dạng cây.

Ví dụ, hãy tưởng tượng rằng bạn có hai loại đối tượng: `Sản phẩm` và `Hộp`. Một `Hộp` có thể chứa một số `Sản phẩm` cũng như một số `Hộp` nhỏ hơn. Những `Hộp` nhỏ này cũng có thể chứa một số `Sản phẩm` hoặc thậm chí là `Hộp` nhỏ hơn, v.v.

Giả sử bạn quyết định tạo một hệ thống đặt hàng sử dụng các lớp này. Đơn đặt hàng có thể chứa các sản phẩm đơn giản mà không có bất kỳ bao bì nào, cũng như các hộp chứa các sản phẩm ... và các hộp khác. Bạn sẽ xác định tổng giá của một đơn đặt hàng như thế nào?

Bạn có thể thử cách tiếp cận trực tiếp: mở tất cả các hộp, xem qua tất cả các sản phẩm và sau đó tính tổng. Điều đó có thể làm được trong thế giới thực; nhưng trong một chương trình, nó không đơn giản như chạy một vòng lặp. Bạn phải biết trước các loại `Sản phẩm` và `Hộp` mà bạn đang trải qua, cấp độ lồng vào nhau của các hộp và các chi tiết khó chịu khác. Tất cả những điều này làm cho cách tiếp cận trực tiếp trở nên quá khó khăn hoặc thậm chí là không thể.

# Giải pháp
Composite pattern đề xuất rằng bạn làm việc với `Sản phẩm` và `Hộp` thông qua giao diện chung khai báo phương pháp tính tổng giá.

Phương pháp này sẽ hoạt động như thế nào? Đối với một sản phẩm, nó chỉ cần trả lại giá của sản phẩm. Đối với một hộp, nó sẽ xem xét từng mục trong hộp, hỏi giá của nó và sau đó trả lại tổng số cho hộp này. Nếu một trong những mặt hàng này là một hộp nhỏ hơn, hộp đó cũng sẽ bắt đầu xem xét nội dung của nó, v.v., cho đến khi giá của tất cả các thành phần bên trong được tính. Một hộp thậm chí có thể thêm một số chi phí bổ sung vào giá cuối cùng, chẳng hạn như chi phí đóng gói.

Lợi ích lớn nhất của phương pháp này là bạn không cần quan tâm đến các lớp cụ thể của các đối tượng tạo nên cây. Bạn không cần biết một đồ vật là một sản phẩm đơn giản hay một chiếc hộp phức tạp. Bạn có thể xử lý tất cả chúng như nhau thông qua giao diện chung. Khi bạn gọi một phương thức, các đối tượng tự chuyển yêu cầu xuống cây.

# Ứng dụng thực tế
Quân đội của hầu hết các quốc gia được cấu trúc theo hệ thống cấp bậc. Một đội quân bao gồm nhiều sư đoàn; một sư đoàn là một tập hợp các lữ đoàn và một lữ đoàn bao gồm các trung đội, có thể được chia thành các tiểu đội. Cuối cùng, một đội là một nhóm nhỏ những người lính thực sự. Các mệnh lệnh được đưa ra ở trên cùng của hệ thống phân cấp và được truyền xuống từng cấp cho đến khi mọi người lính biết những gì cần phải làm.

# Khả năng áp dụng
- Sử dụng Composite pattern khi bạn phải triển khai cấu trúc đối tượng dạng cây.
  - Composite pattern cung cấp cho bạn hai kiểu phần tử cơ bản có chung giao diện: leaf đơn giản và container phức tạp. Một thùng chứa có thể bao gồm cả leaf và các thùng chứa khác. Điều này cho phép bạn xây dựng một cấu trúc đối tượng đệ quy lồng nhau giống như một cái cây.

- Sử dụng mẫu khi bạn muốn client code xử lý đồng nhất cả phần tử đơn giản lẫn phức tạp.
  - Tất cả các phần tử được xác định bởi Composite pattern đều có chung một giao diện. Sử dụng giao diện này, khách hàng không phải lo lắng về lớp cụ thể của các đối tượng mà nó hoạt động.

# Cách triển khai
1. Đảm bảo rằng mô hình cốt lõi của ứng dụng của bạn có thể được biểu diễn dưới dạng cấu trúc cây. Cố gắng chia nhỏ nó thành các phần tử và container đơn giản. Hãy nhớ rằng container phải có thể chứa cả các phần tử đơn giản và các container khác.

2. Khai báo component interface với danh sách các phương thức phù hợp với cả thành phần đơn giản và phức tạp.

3. Tạo một lớp leaf để biểu diễn các phần tử đơn giản. Một chương trình có thể có nhiều lớp leaf khác nhau.

4. Tạo một lớp container để biểu diễn các phần tử phức tạp. Trong lớp này, hãy cung cấp một trường mảng để lưu trữ các tham chiếu đến các phần tử con. Mảng phải có thể lưu trữ cả leaf và container, vì vậy hãy đảm bảo rằng nó được khai báo với kiểu giao diện thành phần.<br><br>
Trong khi triển khai các phương thức của giao diện thành phần, hãy nhớ rằng một container được cho là ủy quyền hầu hết công việc cho các phần tử con.

5. Cuối cùng, xác định các phương thức để thêm và loại bỏ các phần tử con trong container.

Hãy nhớ rằng các hoạt động này có thể được khai báo trong component interface. Điều này sẽ vi phạm Interface Segregation Principle vì các phương thức sẽ trống trong lớp leaf. Tuy nhiên, khách hàng sẽ có thể đối xử bình đẳng với tất cả các yếu tố, ngay cả khi soạn thảo cây.

# Ưu điểm và nhược điểm
## Ưu điểm
- Bạn có thể làm việc với các cấu trúc cây phức tạp thuận tiện hơn: sử dụng tính đa hình và đệ quy để có lợi cho bạn.

- Nguyên tắc Mở / Đóng. Bạn có thể giới thiệu các loại phần tử mới vào ứng dụng mà không cần phá vỡ mã hiện có, mã này hiện hoạt động với cây đối tượng.

## Nhược điểm
- Có thể khó cung cấp một interface chung cho các lớp có chức năng khác nhau quá nhiều. Trong một số trường hợp nhất định, bạn cần phải tổng quát hóa quá mức component interface, khiến nó khó hiểu hơn.

# Mối quan hệ với các mẫu khác
- Bạn có thể sử dụng Builder khi tạo các cây Composite phức tạp vì bạn có thể lập trình các bước xây dựng của nó để hoạt động một cách đệ quy.

- Chain of Responsibility thường được sử dụng cùng với Composite. Trong trường hợp này, khi một leaf component nhận được một yêu cầu, nó có thể chuyển nó qua chuỗi của tất cả các components mẹ xuống gốc của cây đối tượng.

- Bạn có thể sử dụng các Iterators để duyệt qua Composite trees.

- Bạn có thể sử dụng Visitor để thực hiện một hoạt động trên toàn bộ Composite tree.

- Bạn có thể triển khai các leaf nodes chia sẻ của cây Composite dưới dạng Flyweights để tiết kiệm một số RAM.

- Composite và Decorator có các sơ đồ cấu trúc tương tự vì cả hai đều dựa vào thành phần đệ quy để tổ chức một số lượng đối tượng kết thúc mở.<br><br>
Decorator giống như Composite nhưng chỉ có một thành phần con. Có một sự khác biệt đáng kể khác: Decorator thêm các trách nhiệm bổ sung cho đối tượng được bao bọc, trong khi Composite chỉ "tổng hợp" các kết quả con của nó.<br><br>
Tuy nhiên, các mẫu cũng có thể hợp tác: bạn có thể sử dụng Decorator để mở rộng hành vi của một đối tượng cụ thể trong cây Composite.

- Các thiết kế sử dụng nhiều Composite và Decorator thường có thể được hưởng lợi từ việc sử dụng Prototype. Áp dụng mẫu cho phép bạn sao chép các cấu trúc phức tạp thay vì xây dựng lại chúng từ đầu.
