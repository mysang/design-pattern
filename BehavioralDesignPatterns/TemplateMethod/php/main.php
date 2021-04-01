<?php
/**
 * Template Method là một Behavioral design pattern xác định khung
 * của một thuật toán trong lớp cha nhưng cho phép các lớp con ghi đè
 * các bước cụ thể của thuật toán mà không thay đổi cấu trúc của nó.
 * Độ phức tạp của pattern này là 1.
 * Mức độ phổ biến của pattern này là 2.
 */

/**
 * Abstract Class định nghĩa phương thức khuôn mẫu và khai báo tất cả các bước của nó.
 */
abstract class SocialNetwork
{
    protected $username;

    protected $password;

    public function __construct(string $username, string $password)
    {
        $this->username = $username;
        $this->password = $password;
    }
    
    /**
     * Template Method thực tế gọi các bước trừu tượng theo một thứ tự cụ thể.
     * Một lớp con có thể thực hiện tất cả các bước, cho phép phương pháp này
     * thực sự đăng nội dung nào đó lên mạng xã hội.
     */
    public function post(string $message): bool
    {
        // Xác thực trước khi đăng.
        // Mỗi mạng sử dụng một phương pháp xác thực khác nhau
        if ($this->logIn($this->username, $this->password)) {
            // Gửi dữ liệu bài đăng. Tất cả các mạng đều có các API khác nhau.
            $result = $this->sendData($message);
            $this->logOut();

            return $result;
        }

        return false;
    }

    /**
     * Các bước được khai báo là trừu tượng để buộc các lớp con thực hiện tất cả chúng.
     */
    abstract public function logIn(string $userName, string $password): bool;

    abstract public function sendData(string $message): bool;

    abstract public function logOut(): void;
}

/**
 * Concrete Class này triển khai API Facebook
 */
class Facebook extends SocialNetwork
{
    public function logIn(string $userName, string $password): bool
    {
        echo "\nChecking user's credentials...\n";
        echo "Name: " . $this->username . "\n";
        echo "Password: " . str_repeat("*", strlen($this->password)) . "\n";

        simulateNetworkLatency();

        echo "\n\nFacebook: '" . $this->username . "' has logged in successfully.\n";

        return true;
    }

    public function sendData(string $message): bool
    {
        echo "Facebook: '" . $this->username . "' has posted '" . $message . "'.\n";

        return true;
    }

    public function logOut(): void
    {
        echo "Facebook: '" . $this->username . "' has been logged out.\n";
    }
}

/**
 * Concrete Class này triển khai API Twitter.
 */
class Twitter extends SocialNetwork
{
    public function logIn(string $userName, string $password): bool
    {
        echo "\nChecking user's credentials...\n";
        echo "Name: " . $this->username . "\n";
        echo "Password: " . str_repeat("*", strlen($this->password)) . "\n";

        simulateNetworkLatency();

        echo "\n\nTwitter: '" . $this->username . "' has logged in successfully.\n";

        return true;
    }

    public function sendData(string $message): bool
    {
        echo "Twitter: '" . $this->username . "' has posted '" . $message . "'.\n";

        return true;
    }

    public function logOut(): void
    {
        echo "Twitter: '" . $this->username . "' has been logged out.\n";
    }
}

/**
 * Một chức năng trợ giúp nhỏ giúp thời gian chờ đợi trở nên chân thực.
 */
function simulateNetworkLatency()
{
    $i = 0;
    while ($i < 5) {
        echo ".";
        sleep(1);
        $i++;
    }
}

/**
 * The client code.
 */
echo "Username: \n";
$username = readline();
echo "Password: \n";
$password = readline();
echo "Message: \n";
$message = readline();

echo "\nChoose the social network to post the message:\n" .
    "1 - Facebook\n" .
    "2 - Twitter\n";
$choice = readline();

// Bây giờ, hãy tạo một đối tượng mạng xã hội thích hợp và gửi tin nhắn.
if ($choice == 1) {
    $network = new Facebook($username, $password);
} elseif ($choice == 2) {
    $network = new Twitter($username, $password);
} else {
    die("Sorry, I'm not sure what you mean by that.\n");
}
$network->post($message);
