# Iterator
Iterator là một Behavioral design pattern cho phép bạn duyệt qua các phần tử của một tập hợp mà không để lộ biểu diễn cơ bản của nó (danh sách, ngăn xếp, cây, v.v.).

- Độ phức tạp của mẫu này là 2.
- Mức độ phổ biến của mẫu này là 3.

# Ví dụ thực hành
### Chạy các câu lệnh sau để chạy chương trình (Nếu đã làm rồi thì bỏ qua):
- `git clone git@github.com:mysang/design-pattern.git`
- `cd design-pattern`
- `docker-compose up -d`

### Chạy chương trình ví dụ cho Python:
- `docker exec -it design-pattern-python /bin/bash`
- `cd BehavioralDesignPatterns/Iterator/python`
- `python main.py`

### Chạy chương trình ví dụ cho PHP:
- `docker exec -it design-pattern-php /bin/bash`
- `cd BehavioralDesignPatterns/Iterator/php`
- `php main.php`

# Vấn đề
Collections là một trong những kiểu dữ liệu được sử dụng nhiều nhất trong lập trình. Tuy nhiên, một bộ sưu tập chỉ là một container cho một nhóm các đối tượng.

Hầu hết các bộ sưu tập lưu trữ các phần tử của chúng trong các danh sách đơn giản. Tuy nhiên, một số trong số chúng dựa trên ngăn xếp, cây, đồ thị và các cấu trúc dữ liệu phức tạp khác.

Nhưng bất kể collection được cấu trúc như thế nào, nó phải cung cấp một số cách truy cập các phần tử của nó để mã khác có thể sử dụng các phần tử này. Cần có một cách để đi qua từng phần tử của collection mà không cần truy cập lặp lại các phần tử giống nhau.

Điều này nghe có vẻ là một công việc dễ dàng nếu bạn có một collection dựa trên một danh sách. Bạn chỉ cần lặp lại tất cả các phần tử. Nhưng làm cách nào để bạn duyệt tuần tự các phần tử của một cấu trúc dữ liệu phức tạp, chẳng hạn như một cái cây? Ví dụ, một ngày nào đó bạn có thể cảm thấy ổn với việc đi qua độ sâu đầu tiên của một cái cây. Tuy nhiên, ngày hôm sau, bạn có thể yêu cầu truyền tải đầu tiên theo chiều rộng. Và tuần tới, bạn có thể cần một thứ gì đó khác, chẳng hạn như quyền truy cập ngẫu nhiên vào các phần tử cây.

Việc thêm ngày càng nhiều thuật toán truyền tải vào collection dần dần làm lu mờ trách nhiệm chính của nó, đó là lưu trữ dữ liệu hiệu quả. Ngoài ra, một số thuật toán có thể được điều chỉnh cho một ứng dụng cụ thể, vì vậy việc gộp chúng vào một lớp tập hợp chung sẽ rất kỳ lạ.

Mặt khác, client code được cho là hoạt động với các collection khác nhau thậm chí có thể không quan tâm đến cách chúng lưu trữ các phần tử của chúng. Tuy nhiên, vì tất cả các collection đều cung cấp các cách khác nhau để truy cập các phần tử của chúng, bạn không có lựa chọn nào khác ngoài việc ghép mã của mình với các lớp collection cụ thể.

# Giải pháp
Ý tưởng chính của mẫu Iterator là trích xuất hành vi truyền tải của một tập hợp thành một đối tượng riêng biệt được gọi là trình vòng lặp.

Ngoài việc thực hiện chính thuật toán, một đối tượng trình lặp còn đóng gói tất cả các chi tiết truyền tải, chẳng hạn như vị trí hiện tại và số phần tử còn lại cho đến cuối. Do đó, một số trình lặp có thể đi qua cùng một tập hợp cùng một lúc, độc lập với nhau.

Thông thường, các trình vòng lặp cung cấp một phương thức chính để tìm nạp các phần tử của tập hợp. Client có thể tiếp tục chạy phương thức này cho đến khi nó không trả về bất kỳ thứ gì, có nghĩa là trình vòng lặp đã duyệt qua tất cả các phần tử.

All iterators must implement the same interface. This makes the client code compatible with any collection type or any traversal algorithm as long as there’s a proper iterator. If you need a special way to traverse a collection, you just create a new iterator class, without having to change the collection or the client.

Tất cả các trình lặp phải triển khai cùng một interface. Điều này làm cho client code tương thích với bất kỳ loại tập hợp nào hoặc bất kỳ thuật toán truyền tải nào miễn là có một trình lặp thích hợp. Nếu bạn cần một cách đặc biệt để duyệt qua một tập hợp, bạn chỉ cần tạo một iterator class mới mà không cần phải thay đổi collection hoặc client.

# Ứng dụng thực tế
Bạn có kế hoạch đến thăm Rome trong một vài ngày và thăm tất cả các điểm tham quan và hấp dẫn chính của nó. Nhưng khi đến đó, bạn có thể lãng phí rất nhiều thời gian để đi vòng quanh, thậm chí không thể tìm thấy `Đấu trường La Mã` (Colosseum).

Mặt khác, bạn có thể mua một ứng dụng hướng dẫn ảo cho điện thoại thông minh của mình và sử dụng nó để điều hướng. Nó thông minh và không tốn kém, và bạn có thể lưu trú tại một số địa điểm thú vị bao lâu tùy thích.

Một giải pháp thay thế thứ ba là bạn có thể chi tiêu một phần ngân sách của chuyến đi và thuê một hướng dẫn viên địa phương, người hiểu rõ thành phố như bàn tay của anh ta. Hướng dẫn viên sẽ có thể điều chỉnh chuyến tham quan theo ý thích của bạn, chỉ cho bạn mọi điểm tham quan và kể rất nhiều câu chuyện thú vị. Điều đó sẽ còn thú vị hơn nữa; nhưng, than ôi, cũng đắt hơn.

Tất cả các tùy chọn này — các chỉ đường ngẫu nhiên sinh ra trong đầu bạn, điều hướng trên điện thoại thông minh hoặc hướng dẫn của con người — hoạt động như các trình vòng lặp trên bộ sưu tập rộng lớn các thắng cảnh và điểm tham quan ở Rome.

# Khả năng áp dụng
- Sử dụng Iterator pattern khi collection của bạn có cấu trúc dữ liệu phức tạp, nhưng bạn muốn ẩn sự phức tạp của nó khỏi client (vì lý do thuận tiện hoặc bảo mật).
  - Trình lặp đóng gói các chi tiết làm việc với cấu trúc dữ liệu phức tạp, cung cấp cho client một số phương pháp đơn giản để truy cập các phần tử của collection. Mặc dù cách tiếp cận này rất thuận tiện cho client, nhưng nó cũng bảo vệ collection khỏi các hành động bất cẩn hoặc độc hại mà client có thể thực hiện nếu làm việc trực tiếp với collection.

- Sử dụng mẫu để giảm trùng lặp mã truyền tải trên ứng dụng của bạn.
  - Mã của các thuật toán lặp không tầm thường có xu hướng rất cồng kềnh. Khi được đặt trong logic nghiệp vụ của một ứng dụng, nó có thể làm mờ trách nhiệm của mã gốc và làm cho nó khó bảo trì hơn. Di chuyển mã duyệt sang các trình vòng lặp được chỉ định có thể giúp bạn làm cho mã của ứng dụng gọn gàng và sạch sẽ hơn.

- Sử dụng Iterator khi bạn muốn mã của mình có thể duyệt qua các cấu trúc dữ liệu khác nhau hoặc khi các loại cấu trúc này chưa được biết trước.
  - The pattern provides a couple of generic interfaces for both collections and iterators. Given that your code now uses these interfaces, it’ll still work if you pass it various kinds of collections and iterators that implement these interfaces.
  - Mẫu cung cấp một vài interface chung cho cả collection và iterator. Cho rằng mã của bạn hiện sử dụng các interface này, mã sẽ vẫn hoạt động nếu bạn chuyển cho nó nhiều loại collection và iterator khác nhau triển khai các interface này.

# Cách triển khai
1. Khai báo iterator interface. Ít nhất, nó phải có một phương thức để tìm nạp phần tử tiếp theo từ một collection. Nhưng để thuận tiện, bạn có thể thêm một số phương pháp khác, chẳng hạn như tìm nạp phần tử trước đó, theo dõi vị trí hiện tại và kiểm tra kết thúc của lần lặp.

2. Khai báo collection interface và mô tả một phương pháp để tìm nạp các iterator. Kiểu trả về phải bằng kiểu của iterator interface. Bạn có thể khai báo các phương thức tương tự nếu bạn định có một số nhóm iterator khác nhau.

3. Triển khai các iterator classe cụ thể cho các collection mà bạn muốn có thể duyệt được bằng iterator. Một đối tượng iterator phải được liên kết với một cá thể tập hợp duy nhất. Thông thường, liên kết này được thiết lập thông qua phương thức khởi tạo của iterator (iterator’s constructor).

4. Triển khai collection interface trong các collection classe của bạn. Ý tưởng chính là cung cấp cho client một lối tắt để tạo iterator, được điều chỉnh cho một lớp collection cụ thể. Đối tượng collection phải chuyển chính nó đến phương thức khởi tạo của iterator để thiết lập liên kết giữa chúng.

5. Xem qua client code để thay thế tất cả mã truyền tải collection bằng việc sử dụng iterator. Client tìm nạp một đối tượng iterator mới mỗi khi nó cần lặp qua các phần tử collection.

# Ưu điểm và nhược điểm
## Ưu điểm
- Single Responsibility Principle. Bạn có thể làm sạch client code và các collection bằng cách trích xuất các thuật toán truyền tải cồng kềnh thành các lớp riêng biệt.

- Nguyên tắc Mở / Đóng. Bạn có thể triển khai các loại collection và iterator mới và chuyển chúng vào mã hiện có mà không vi phạm bất kỳ điều gì.

- Bạn có thể lặp song song trên cùng một tập hợp vì mỗi đối tượng iterator chứa trạng thái lặp riêng của nó.

- Vì lý do tương tự, bạn có thể trì hoãn một lần lặp và tiếp tục nó khi cần.

## Nhược điểm
- Áp dụng mẫu có thể là một việc làm quá mức cần thiết nếu ứng dụng của bạn chỉ hoạt động với các collection đơn giản.

- Sử dụng iterator có thể kém hiệu quả hơn so với việc đi qua trực tiếp các phần tử của một số collection chuyên biệt.

# Mối quan hệ với các mẫu khác
- Bạn có thể sử dụng Iterator để duyệt cây Composite.

- Bạn có thể sử dụng Factory Method cùng với Iterator để cho phép các lớp con của collection trả về các loại iterator khác nhau tương thích với các collection.

- Bạn có thể sử dụng Memento cùng với Iterator để nắm bắt trạng thái lặp lại hiện tại và cuộn lại nếu cần.

- Bạn có thể sử dụng Visitor cùng với Iterator để xem qua một cấu trúc dữ liệu phức tạp và thực hiện một số thao tác trên các phần tử của nó, ngay cả khi tất cả chúng đều có các lớp khác nhau.
