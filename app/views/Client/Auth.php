<?PHP

use App\core\Database;
use App\models\User;

$database = new Database();
$userModel = new User($database);

function validatePassword($password)
{
    // Kiểm tra độ dài của mật khẩu
    if (strlen($password) < 8) {
        return false;
    }

    // Kiểm tra điều kiện phức tạp (ví dụ: ít nhất một chữ cái hoa, một chữ cái thường, một số và một ký tự đặc biệt)
    if (
        !preg_match("#[A-Z]+#", $password) || // Kiểm tra chữ cái hoa
        !preg_match("#[a-z]+#", $password) || // Kiểm tra chữ cái thường
        !preg_match("#[0-9]+#", $password) || // Kiểm tra số
        !preg_match("#\W+#", $password) // Kiểm tra ký tự đặc biệt
    ) {
        return false;
    }

    // Mật khẩu hợp lệ
    return true;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['login'])) {
        $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
        $password = trim($_POST['password']);

        if (empty($email)) {
            $_SESSION['error']['email']  = 'Vui lòng nhập email';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error']['email']  = 'Vui lòng nhập đúng định dạng email';
        }

        if (empty($password)) {
             $_SESSION['error']['password'] = 'Vui lòng nhập password';
        } elseif (!validatePassword($password)) {
             $_SESSION['error']['password'] = 'Vui lòng nhập đúng định dạng password';
        }

        if (empty($errors)) {
            if ($userModel->login($email, $password)) {
                $role = $_SESSION['user']['role'];

                header("Location: " . ($role === 'admin' ? 'admin' : '/'));
                exit;
            } else {
                $_SESSION['error']['login'] = 'Đăng nhập không thành công. Vui lòng kiểm tra email và mật khẩu.';
            }
        }
    } elseif (isset($_POST['register'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $username = $_POST['username'];

        if (empty($username) || strlen($username) < 8) {
            $_SESSION['error']['username'] = 'Vui lòng nhập ít nhất 8 ký tự';
        }

        if (empty($email)) {
            $_SESSION['error']['email'] = 'Vui lòng nhập email';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error']['email'] = 'Vui lòng nhập đúng định dạng email';
        }

        if (empty($password)) {
            $_SESSION['error']['password'] = 'Vui lòng nhập password';
        } elseif (!validatePassword($password)) {
            $_SESSION['error']['password'] = 'Vui lòng nhập đúng định dạng password';
        }

        if (empty($errors)) {
            $existingUser = $userModel->getUserByEmail($email);

            if ($existingUser) {
                $_SESSION['error']['email_had'] = 'Email đã được sử dụng. Vui lòng nhập email khác.';
            } else {
                if ($userModel->register($email, $password, $username)) {
                    $_SESSION['success']['register'] = 'Đăng ký thành công';
                } else {
                    $_SESSION['error']['register'] = 'Đăng ký thất bại';
                }
            }
        }
    } elseif (isset($_POST['logout'])) {
        $userModel->logout();
        header('Location: /');
        exit;
    }
}
