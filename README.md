# Design pattern là gì?
**Design patterns** là giải pháp điển hình cho các vấn đề thường xảy ra trong thiết kế phần mềm. Chúng giống như các bản thiết kế được tạo sẵn mà bạn có thể tùy chỉnh để giải quyết vấn đề trùng lặp mã trong phần mềm của mình.

Bạn không thể chỉ tìm một mẫu và sao chép nó vào chương trình của mình, giống như cách bạn đang làm với các chức năng hoặc thư viện có sẵn. Mẫu không phải là một đoạn mã cụ thể, mà là một khái niệm chung để giải quyết một vấn đề cụ thể. Bạn có thể theo dõi chi tiết, nghiên cứu, học hỏi các mẫu và triển khai giải pháp phù hợp với thực tế của chương trình của bạn.

Các mẫu thường bị nhầm lẫn với các thuật toán, vì cả hai khái niệm đều mô tả các giải pháp điển hình cho một số vấn đề đã biết. Trong khi một thuật toán luôn xác định một tập hợp các hành động rõ ràng có thể đạt được một số mục tiêu, thì một mẫu là một mô tả cấp cao hơn về một giải pháp. Mã của cùng một mẫu được áp dụng cho hai chương trình khác nhau có thể khác nhau.

Một thuật toán giống như là một công thức nấu ăn: cả hai đều có các bước rõ ràng để đạt được mục tiêu. Mặt khác, một mẫu thì giống như một bản thiết kế: bạn có thể xem kết quả và các tính năng của nó, nhưng thứ tự thực hiện chính xác là tùy thuộc vào bạn.

# Lịch sử của các mẫu
Ai là người phát minh ra các mẫu? Đó là một câu hỏi hay, nhưng không chính xác lắm. Các mẫu thiết kế không phải là những khái niệm phức tạp, khó hiểu — hoàn toàn ngược lại. Các mẫu là giải pháp điển hình cho các vấn đề thường gặp trong thiết kế hướng đối tượng. Khi một giải pháp được lặp đi lặp lại trong các dự án khác nhau, cuối cùng ai đó sẽ đặt tên cho nó và mô tả chi tiết giải pháp. Về cơ bản, đó là cách một mẫu được phát hiện.

Khái niệm về mẫu lần đầu tiên được Christopher Alexander mô tả trong [A Pattern Language: Towns, Buildings, Construction](https://www.amazon.com/Pattern-Language-Buildings-Construction-Environmental/dp/0195019199). Cuốn sách mô tả một "ngôn ngữ" để thiết kế đô thị. Các đơn vị của ngôn ngữ này là các mẫu. Họ có thể mô tả các cửa sổ nên cao như thế nào, một tòa nhà nên có bao nhiêu tầng, diện tích cây xanh lớn như thế nào trong khu vực lân cận, v.v.

Ý tưởng được chọn bởi bốn tác giả: Erich Gamma, John Vlissides, Ralph Johnson, and Richard Helm. Năm 1994, họ xuất bản [Design Patterns: Elements of Reusable Object-Oriented Software](https://www.amazon.com/gp/product/0201633612/), trong đó họ áp dụng khái niệm mẫu thiết kế vào lập trình. Cuốn sách giới thiệu 23 mẫu giải quyết các vấn đề khác nhau của thiết kế hướng đối tượng và nhanh chóng trở thành sách bán chạy nhất. Do cái tên dài dòng của nó, mọi người bắt đầu gọi nó là "the book by the gang of four" (Cuốn sách của nhóm bốn người), sau đó nhanh chóng được rút gọn thành "the GoF book" (Cuốn sách của GoF).

Since then, dozens of other object-oriented patterns have been discovered. The “pattern approach” became very popular in other programming fields, so lots of other patterns now exist outside of object-oriented design as well.

Kể từ đó, hàng chục mẫu hướng đối tượng khác đã được phát hiện. “Phương pháp tiếp cận mẫu” đã trở nên rất phổ biến trong các lĩnh vực lập trình khác nhau, vì vậy rất nhiều mẫu khác hiện cũng tồn tại bên ngoài thiết kế hướng đối tượng.

# Tại sao nên học các mẫu?
Sự thật là bạn có thể xoay sở để làm việc như một lập trình viên trong nhiều năm mà không cần biết về một khuôn mẫu nào. Rất nhiều người làm điều đó. Tuy nhiên, ngay cả trong trường hợp đó, bạn có thể đang triển khai một số mẫu mà không hề hay biết. Vậy tại sao bạn lại dành thời gian học chúng?

- Các mẫu thiết kế là một bộ công cụ bao gồm các giải pháp đã được **thử nghiệm và kiểm tra** cho các vấn đề thường gặp trong thiết kế phần mềm. Ngay cả khi bạn không bao giờ gặp phải những vấn đề này, việc biết các mẫu vẫn hữu ích vì nó dạy bạn cách giải quyết tất cả các loại vấn đề bằng cách sử dụng các nguyên tắc thiết kế hướng đối tượng (principles of object-oriented design).

- Các mẫu thiết kế xác định một ngôn ngữ chung mà bạn và đồng đội của bạn có thể sử dụng để giao tiếp hiệu quả hơn. Bạn có thể nói, “Ồ, chỉ cần sử dụng Singleton cho điều đó,” và mọi người sẽ hiểu ý tưởng đằng sau đề xuất của bạn. Không cần phải giải thích singleton là gì nếu bạn biết mẫu và tên của nó.

# Phê bình các mẫu
Có vẻ như chỉ có những người lười biếng là chưa phê bình các mẫu thiết kế. Hãy cùng xem xét các lập luận tiêu biểu nhất chống lại việc sử dụng các mẫu.

## Kết hợp những thứ không hợp lệ trong các ngôn ngữ lập trình yếu
Thông thường nhu cầu về các mẫu phát sinh khi mọi người chọn một ngôn ngữ lập trình hoặc một công nghệ thiếu mức độ trừu tượng cần thiết. Trong trường hợp này, các mẫu sẽ trở thành một thứ vô cùng đặc biệt mang lại cho ngôn ngữ những khả năng siêu cần thiết.

Ví dụ, mẫu Strategy có thể được triển khai bằng một hàm ẩn danh (lambda) đơn giản trong hầu hết các ngôn ngữ lập trình hiện đại.

## Các giải pháp không hiệu quả
Các mẫu cố gắng hệ thống hóa các phương pháp tiếp cận đã được sử dụng rộng rãi. Sự thống nhất này được nhiều người coi là một giáo điều và họ triển khai các mô hình "to the point", mà không điều chỉnh chúng cho phù hợp với bối cảnh dự án của họ.

## Sử dụng không hợp lý
`If all you have is a hammer, everything looks like a nail. (Nếu tất cả những gì bạn có là một cái búa, mọi thứ giống như một cái đinh.)`

Đây là vấn đề ám ảnh nhiều người mới làm quen với các mẫu. Sau khi học về các mẫu, họ cố gắng áp dụng chúng ở mọi nơi, ngay cả trong những tình huống mà mã đơn giản hơn sẽ hoạt động tốt hơn.

# Phân loại các mẫu
Các mẫu thiết kế khác nhau bởi độ phức tạp, mức độ chi tiết và quy mô khả năng áp dụng cho toàn bộ hệ thống đang được thiết kế. Tương tự với việc xây dựng đường: bạn có thể làm cho một giao lộ an toàn hơn bằng cách lắp đặt một số đèn giao thông hoặc xây dựng toàn bộ nút giao thông nhiều tầng với lối đi ngầm dành cho người đi bộ.

Các mẫu cơ bản và cấp thấp nhất thường được gọi là thành ngữ. Chúng thường chỉ áp dụng cho một ngôn ngữ lập trình duy nhất.

Các mẫu phổ thông và cao cấp nhất là mẫu kiến trúc. Các nhà phát triển có thể triển khai các mẫu này bằng hầu hết mọi ngôn ngữ. Không giống như các mẫu khác, chúng có thể được sử dụng để thiết kế kiến trúc của toàn bộ ứng dụng.

Ngoài ra, tất cả các mẫu có thể được phân loại theo ý định hoặc mục đích của chúng. Cuốn sách này bao gồm ba nhóm mẫu chính:

## Creational patterns (Mẫu sáng tạo)
**Creational patterns** cung cấp các cơ chế tạo đối tượng để tăng tính linh hoạt và tái sử dụng mã hiện có.

- **Factory Method** là một Creational design pattern cung cấp interface để tạo các đối tượng trong lớp cha, nhưng cho phép các lớp con thay đổi loại đối tượng sẽ được tạo. Độ khó của mẫu này là 3.

- **Abstract Factory** là một Creational design pattern cho phép bạn tạo ra các họ các đối tượng liên quan mà không cần chỉ định các lớp cụ thể của chúng. Độ khó của mẫu này là 3.

- **Builder** là một Creational design pattern cho phép bạn xây dựng các đối tượng phức tạp theo từng bước. Mẫu này cho phép bạn tạo ra các kiểu và thể hiện khác nhau của một đối tượng bằng cách sử dụng cùng một mã xây dựng. Độ khó của mẫu này là 3.

- **Prototype** là một Creational design pattern cho phép bạn sao chép các đối tượng hiện có mà không làm cho mã của bạn phụ thuộc vào các lớp của chúng. Độ khó của mẫu này là 2.

- **Singleton** là một Creational design pattern cho phép bạn đảm bảo rằng một lớp chỉ có một thể hiện (instance), đồng thời cung cấp một điểm truy cập toàn cục cho thể hiện này. Độ khó của mẫu này là 2.

## Structural patterns (Mẫu cấu trúc)
**Structural patterns** giải thích cách tập hợp các đối tượng và lớp thành các cấu trúc lớn hơn, trong khi vẫn giữ cho cấu trúc linh hoạt và hiệu quả.

- **Adapter** là một Structural design pattern cho phép các đối tượng có interface không tương thích cộng tác. Độ khó của mẫu này là 3.

- **Bridge** là một Structural design pattern cho phép bạn chia một lớp lớn hoặc một tập hợp các lớp có liên quan chặt chẽ thành hai cấu trúc phân cấp riêng biệt — trừu tượng (hierarchies—abstraction) và thực thi — cái nào (implementation—which) có thể được phát triển độc lập với nhau. Độ khó của mẫu này là 1.

- **Composite** là một Structural design pattern cho phép bạn soạn các đối tượng thành cấu trúc cây và sau đó làm việc với các cấu trúc này như thể chúng là các đối tượng riêng lẻ. Độ khó của mẫu này là 2.

- **Decorator** là một Structural design pattern cho phép bạn đính kèm các hành vi mới vào các đối tượng bằng cách đặt các đối tượng này bên trong các đối tượng trình bao bọc đặc biệt có chứa các hành vi. Độ khó của mẫu này là 2.

- **Facade** là một Structural design pattern cung cấp interface đơn giản hóa cho library, framework hoặc bất kỳ tập hợp lớp phức tạp nào khác. Độ khó của mẫu này là 2.

- **Flyweight** là một Structural design pattern cho phép bạn nhét nhiều đối tượng hơn vào dung lượng RAM có sẵn bằng cách chia sẻ các phần trạng thái chung giữa nhiều đối tượng thay vì giữ tất cả dữ liệu trong mỗi đối tượng. Độ khó của mẫu này là 0.

- **Proxy** là một Structural design pattern cho phép bạn cung cấp vật thay thế hoặc trình giữ chỗ cho một đối tượng khác. Một proxy kiểm soát quyền truy cập vào đối tượng gốc, cho phép bạn thực hiện một điều gì đó trước hoặc sau khi yêu cầu được chuyển đến đối tượng gốc. Độ khó của mẫu này là 1.

## Behavioral patterns (Mẫu hành vi)
**Behavioral patterns** quan tâm đến việc giao tiếp hiệu quả và sự phân công trách nhiệm giữa các đối tượng.

- **Chain of Responsibility** là một Behavioral design pattern cho phép bạn chuyển các yêu cầu dọc theo một chuỗi các trình xử lý. Khi nhận được yêu cầu, mỗi trình xử lý sẽ quyết định xử lý yêu cầu hoặc chuyển nó cho trình xử lý tiếp theo trong chuỗi. Độ khó của mẫu này là 1.

- **Command** là một Behavioral design pattern biến một yêu cầu thành một đối tượng độc lập chứa tất cả thông tin về yêu cầu. Sự chuyển đổi này cho phép bạn tham số hóa các phương thức với các yêu cầu khác nhau, trì hoãn hoặc xếp hàng đợi việc thực thi một yêu cầu và hỗ trợ các hoạt động hoàn tác. Độ khó của mẫu này là 3.

- **Iterator** là một Behavioral design pattern cho phép bạn duyệt qua các phần tử của một tập hợp mà không để lộ biểu diễn cơ bản của nó (list, stack, tree, v.v.). Độ khó của mẫu này là 3.

- **Mediator** là một Behavioral design pattern cho phép bạn giảm bớt sự phụ thuộc hỗn loạn giữa các đối tượng. Mẫu hạn chế giao tiếp trực tiếp giữa các đối tượng và buộc chúng chỉ cộng tác thông qua một đối tượng trung gian. Độ khó của mẫu này là 0.

- **Memento** là một Behavioral design pattern cho phép bạn lưu và khôi phục trạng thái trước đó của một đối tượng mà không tiết lộ chi tiết về việc triển khai nó. Độ khó của mẫu này là 1.

- **Observer** là một Behavioral design pattern cho phép bạn xác định cơ chế đăng ký để thông báo cho nhiều đối tượng về bất kỳ sự kiện nào xảy ra với đối tượng mà họ đang quan sát. Độ khó của mẫu này là 3.

- **State** là một Behavioral design pattern cho phép một đối tượng thay đổi hành vi của nó khi trạng thái bên trong của nó thay đổi. Nó xuất hiện như thể đối tượng đã thay đổi lớp của nó. Độ khó của mẫu này là 2.

- **Strategy** là một Behavioral design pattern cho phép bạn xác định một nhóm thuật toán, đặt mỗi thuật toán vào một lớp riêng biệt và làm cho các đối tượng của chúng có thể hoán đổi cho nhau. Độ khó của mẫu này là 3.

- **Template Method** là một Behavioral design pattern xác định khung của một thuật toán trong lớp cha nhưng cho phép các lớp con ghi đè các bước cụ thể của thuật toán mà không thay đổi cấu trúc của nó. Độ khó của mẫu này là 2.

- **Visitor** là một Behavioral design pattern cho phép bạn tách các thuật toán khỏi các đối tượng mà chúng hoạt động. Độ khó của mẫu này là 1.
