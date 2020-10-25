# Template Method
**Template Method** là một **Behavioral design pattern** xác định khung của một thuật toán trong lớp cha nhưng cho phép các lớp con ghi đè các bước cụ thể của thuật toán mà không thay đổi cấu trúc của nó.

- Độ phức tạp của mẫu này là 1.
- Mức độ phổ biến của mẫu này là 2.

# Vấn đề
Hãy tưởng tượng rằng bạn đang tạo một ứng dụng khai thác dữ liệu để phân tích các tài liệu của công ty. Người dùng cung cấp các tài liệu ứng dụng ở các định dạng khác nhau (PDF, DOC, CSV) và nó cố gắng trích xuất dữ liệu có ý nghĩa từ các tài liệu này ở định dạng thống nhất.

Phiên bản đầu tiên của ứng dụng chỉ có thể hoạt động với các tệp DOC. Trong phiên bản sau, nó có thể hỗ trợ các tệp CSV. Một tháng sau, bạn đã "dạy" nó cách trích xuất dữ liệu từ các tệp PDF.

Tại một số điểm, bạn nhận thấy rằng cả ba lớp có rất nhiều mã giống nhau. Mặc dù mã để xử lý các định dạng dữ liệu khác nhau hoàn toàn khác nhau trong tất cả các lớp, mã để xử lý và phân tích dữ liệu gần như giống hệt nhau. Sẽ không tuyệt khi loại bỏ sự trùng lặp mã, giữ nguyên cấu trúc thuật toán phải không?

Có một vấn đề khác liên quan đến client code sử dụng các lớp này. Nó có rất nhiều điều kiện chọn một hành động thích hợp tùy thuộc vào lớp của đối tượng xử lý. Nếu cả ba lớp xử lý đều có một giao diện chung hoặc một lớp cơ sở, bạn có thể loại bỏ các điều kiện trong client code và sử dụng tính đa hình khi gọi các phương thức trên một đối tượng xử lý.

# Giải pháp
Mẫu Template Method gợi ý rằng bạn nên chia nhỏ một thuật toán thành một chuỗi các bước, chuyển các bước này thành các phương thức và đặt một loạt các lệnh gọi đến các phương thức này bên trong một Template Method duy nhất. Các bước có thể là trừu tượng hoặc có một số triển khai mặc định. Để sử dụng thuật toán, client code phải cung cấp lớp con của chính nó, triển khai tất cả các bước trừu tượng và ghi đè một số bước tùy chọn nếu cần (nhưng không phải chính Template Method đó).

Hãy xem điều này sẽ diễn ra như thế nào trong ứng dụng khai thác dữ liệu của chúng ta. Chúng ta có thể tạo một lớp cơ sở cho cả ba thuật toán phân tích cú pháp. Lớp này định nghĩa một phương thức khuôn mẫu bao gồm một loạt các lệnh gọi đến các bước xử lý tài liệu khác nhau.

Lúc đầu, chúng ta có thể khai báo tất cả các bước là trừu tượng, buộc các lớp con cung cấp các triển khai của riêng chúng cho các phương thức này. Trong trường hợp của chúng ta, các lớp con đã có tất cả các triển khai cần thiết, vì vậy điều duy nhất chúng ta có thể cần làm là điều chỉnh chữ ký của các phương thức để phù hợp với các phương thức của lớp cha.

Bây giờ, hãy xem chúng ta có thể làm gì để loại bỏ mã trùng lặp. Có vẻ như mã để mở / đóng tệp và trích xuất / phân tích cú pháp dữ liệu là khác nhau đối với các định dạng dữ liệu khác nhau, vì vậy bạn không cần phải đụng đến các phương pháp đó. Tuy nhiên, việc thực hiện các bước khác, chẳng hạn như phân tích dữ liệu thô và soạn báo cáo, rất giống nhau, vì vậy nó có thể được kéo lên lớp cơ sở, nơi các lớp con có thể chia sẻ mã đó.

Như bạn có thể thấy, chúng ta có hai loại bước:

- Các bước trừu tượng phải được thực hiện bởi mọi lớp con

- Các bước tùy chọn đã có một số triển khai mặc định, nhưng vẫn có thể bị ghi đè nếu cần.

- Có một loại bước khác, được gọi là hook. Hook là một bước tùy chọn với phần thân trống. Template Method sẽ hoạt động ngay cả khi hook không bị ghi đè. Thông thường, các hook được đặt trước và sau các bước quan trọng của thuật toán, cung cấp các lớp con với các điểm mở rộng bổ sung cho một thuật toán.

# Ứng dụng thực tế
Template Method có thể được sử dụng trong xây dựng nhà ở hàng loạt. Kế hoạch kiến trúc để xây dựng một ngôi nhà tiêu chuẩn có thể chứa một số điểm mở rộng cho phép chủ sở hữu điều chỉnh một số chi tiết của ngôi nhà.

Mỗi bước xây dựng như đặt móng, đóng khung, xây tường, lắp đặt hệ thống ống nước, đi dây điện nước,… đều có thể thay đổi đôi chút để tạo nên một ngôi nhà khác một chút so với những ngôi nhà khác.

# Khả năng áp dụng
- Sử dụng mẫu Template Method khi bạn muốn cho phép khách hàng chỉ mở rộng các bước cụ thể của một thuật toán, nhưng không mở rộng toàn bộ thuật toán hoặc cấu trúc của nó.

- Template Method cho phép bạn biến một thuật toán nguyên khối thành một loạt các bước riêng lẻ có thể dễ dàng mở rộng bởi các lớp con trong khi vẫn giữ nguyên cấu trúc được xác định trong lớp cha.

- Sử dụng mẫu khi bạn có một số lớp chứa các thuật toán gần như giống hệt nhau với một số khác biệt nhỏ. Do đó, bạn có thể cần phải sửa đổi tất cả các lớp khi thuật toán thay đổi.

- Khi bạn biến một thuật toán như vậy thành một phương thức khuôn mẫu, bạn cũng có thể kéo các bước có triển khai tương tự lên thành một lớp cha, loại bỏ sự trùng lặp mã. Mã khác nhau giữa các lớp con có thể vẫn còn trong các lớp con.

# Cách triển khai
1. Phân tích thuật toán mục tiêu để xem liệu bạn có thể chia nó thành các bước hay không. Xem xét các bước nào là chung cho tất cả các lớp con và những bước nào sẽ luôn là duy nhất.

2. Tạo lớp cơ sở trừu tượng và khai báo Template Method và một tập hợp các phương thức trừu tượng đại diện cho các bước của thuật toán. Phác thảo cấu trúc của thuật toán trong Template Method bằng cách thực hiện các bước tương ứng. Cân nhắc việc tạo Template Method cuối cùng để ngăn các lớp con ghi đè nó.

3. Sẽ không sao nếu tất cả các bước đều trừu tượng. Tuy nhiên, một số bước có thể được hưởng lợi từ việc triển khai mặc định. Các lớp con không phải triển khai các phương thức đó.

4. Hãy nghĩ đến việc thêm các hook giữa các bước quan trọng của thuật toán.

5. Đối với mỗi biến thể của thuật toán, hãy tạo một lớp con cụ thể mới. Nó phải triển khai tất cả các bước trừu tượng, nhưng cũng có thể ghi đè một số bước tùy chọn.

# Ưu điểm và nhược điểm
## Ưu điểm
- Bạn có thể cho phép khách hàng chỉ ghi đè một số phần nhất định của một thuật toán lớn, giúp chúng ít bị ảnh hưởng bởi những thay đổi xảy ra với các phần khác của thuật toán.

- Bạn có thể kéo mã trùng lặp vào một lớp cha.

## Nhược điểm
- Một số khách hàng có thể bị giới hạn bởi khung được cung cấp của một thuật toán.

- Bạn có thể vi phạm Nguyên tắc thay thế Liskov bằng cách chặn triển khai bước mặc định thông qua một lớp con.

- Template Method có xu hướng khó duy trì hơn khi chúng có nhiều bước hơn.

# Mối quan hệ với các mẫu khác
- Factory Method là một chuyên ngành của Template Method. Đồng thời, Factory Method có thể đóng vai trò là một bước trong Template Method lớn.

- Template Method dựa trên sự kế thừa: nó cho phép bạn thay đổi các phần của thuật toán bằng cách mở rộng các phần đó trong các lớp con. Strategy dựa trên cấu tạo: bạn có thể thay đổi các phần trong hành vi của đối tượng bằng cách cung cấp cho đối tượng các chiến lược khác nhau tương ứng với hành vi đó. Template Method hoạt động ở cấp lớp, vì vậy nó tĩnh. Strategy hoạt động ở cấp đối tượng, cho phép bạn chuyển đổi hành vi trong thời gian chạy.
