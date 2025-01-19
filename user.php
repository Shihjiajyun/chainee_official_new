<?php
session_start();
require 'php/db.php'; // 引入資料庫連線

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// 從資料庫獲取用戶當前資料
$userId = $_SESSION['user_id'];
$stmt = $mysqli->prepare("
    SELECT username, email, nickname, bio, avatar, profession, skills, interests, birthday, gender, google_account_bound 
    FROM users 
    WHERE id = ?
");
$stmt->bind_param('i', $userId);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// 如果某些欄位不存在，設置默認值
$user['bio'] = $user['bio'] ?? '';
$user['avatar'] = $user['avatar'] ?? '';
$user['profession'] = $user['profession'] ?? '';
$user['skills'] = $user['skills'] ?? '';
$user['interests'] = $user['interests'] ?? '';
$user['birthday'] = $user['birthday'] ?? '';
$user['gender'] = $user['gender'] ?? '';
$user['google_account_bound'] = $user['google_account_bound'] ?? false; // 默認為未綁定
?>


<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>編輯個人資料</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

</head>

<body>
    <?php include './navbar.php' ?>

    <?php if (isset($_GET['success']) && $_GET['success'] === '1'): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            資料已成功更新！
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="removeSuccessParam()"></button>
        </div>
    <?php endif; ?>

    <?php if (isset($_GET['error']) ):?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php
            if ($_GET['error'] === 'incorrect_password') {
                echo '當前密碼不正確，請再試一次。';
            } elseif ($_GET['error'] === 'update_failed') {
                echo '密碼更新失敗，請稍後再試。';
            }
            ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="removeSuccessParam()"></button>
        </div>
    <?php endif; ?>

    <?php if (isset($_GET['success']) && $_GET['success'] === 'password_updated'): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            密碼已成功更新！
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="removeSuccessParam()"></button>
        </div>
    <?php endif; ?>



    <div class="container my-5">
        <h1 class="mb-4 text-center">編輯個人資料</h1>
        <form action="php/update_profile.php" method="POST">
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="username" class="form-label">使用者名稱</label>
                    <input type="text" id="username" name="username" class="form-control" value="<?php echo htmlspecialchars($user['username']); ?>" required>
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">電子郵件</label>
                    <input type="email" id="email" name="email" class="form-control" value="<?php echo htmlspecialchars($user['email']); ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="nickname" class="form-label">暱稱</label>
                    <input type="text" id="nickname" name="nickname" class="form-control" value="<?php echo htmlspecialchars($user['nickname']); ?>">
                </div>
                <div class="col-md-6">
                    <label for="bio" class="form-label">個人簡介</label>
                    <textarea id="bio" name="bio" class="form-control" rows="3"><?php echo htmlspecialchars($user['bio']); ?></textarea>
                </div>
            </div>

            <!-- 是否綁定 Google -->
            <div class="mb-3">
                <label class="form-label">Google 帳號綁定</label>
                <input type="text" class="form-control" value="<?php echo $user['google_account_bound'] ? '已綁定' : '未綁定'; ?>" readonly>
            </div>

            <!-- 上傳大頭照 -->
            <div class="mb-3">
                <label for="avatar" class="form-label">上傳個人大頭照</label>
                <input type="file" id="avatar" name="avatar" class="form-control">
                <?php if (!empty($user['avatar'])): ?>
                    <img src="<?php echo $user['avatar']; ?>" alt="頭像" class="img-thumbnail mt-3" style="max-height: 150px;">
                <?php endif; ?>
            </div>

            <!-- 職業 -->
            <div class="mb-3">
                <label for="profession" class="form-label">職業</label>
                <select id="profession" name="profession" class="form-select">
                    <option value="工程師" <?php echo $user['profession'] === '工程師' ? 'selected' : ''; ?>>工程師</option>
                    <option value="教師" <?php echo $user['profession'] === '教師' ? 'selected' : ''; ?>>教師</option>
                    <option value="醫師" <?php echo $user['profession'] === '醫師' ? 'selected' : ''; ?>>醫師</option>
                    <option value="學生" <?php echo $user['profession'] === '學生' ? 'selected' : ''; ?>>學生</option>
                    <option value="其他" <?php echo $user['profession'] === '其他' ? 'selected' : ''; ?>>其他</option>
                </select>
            </div>

            <!-- 專長 -->
            <div class="mb-3">
                <label class="form-label">專長</label>
                <?php $skills = explode(',', $user['skills']); ?>
                <div class="form-check">
                    <input type="checkbox" name="skills[]" value="編程" class="form-check-input" <?php echo in_array('編程', $skills) ? 'checked' : ''; ?>>
                    <label class="form-check-label">編程</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" name="skills[]" value="設計" class="form-check-input" <?php echo in_array('設計', $skills) ? 'checked' : ''; ?>>
                    <label class="form-check-label">設計</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" name="skills[]" value="行銷" class="form-check-input" <?php echo in_array('行銷', $skills) ? 'checked' : ''; ?>>
                    <label class="form-check-label">行銷</label>
                </div>
            </div>

            <!-- 興趣 -->
            <div class="mb-3">
                <label class="form-label">興趣</label>
                <?php $interests = explode(',', $user['interests']); ?>
                <div class="form-check">
                    <input type="checkbox" name="interests[]" value="閱讀" class="form-check-input" <?php echo in_array('閱讀', $interests) ? 'checked' : ''; ?>>
                    <label class="form-check-label">閱讀</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" name="interests[]" value="運動" class="form-check-input" <?php echo in_array('運動', $interests) ? 'checked' : ''; ?>>
                    <label class="form-check-label">運動</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" name="interests[]" value="旅行" class="form-check-input" <?php echo in_array('旅行', $interests) ? 'checked' : ''; ?>>
                    <label class="form-check-label">旅行</label>
                </div>
            </div>

            <!-- 生日 -->
            <div class="mb-3">
                <label for="birthday" class="form-label">生日</label>
                <input type="date" id="birthday" name="birthday" class="form-control" value="<?php echo htmlspecialchars($user['birthday']); ?>">
            </div>

            <!-- 心理性別 -->
            <div class="mb-3">
                <label for="gender" class="form-label">心理性別</label>
                <select id="gender" name="gender" class="form-select">
                    <option value="男性" <?php echo $user['gender'] === '男性' ? 'selected' : ''; ?>>男性</option>
                    <option value="女性" <?php echo $user['gender'] === '女性' ? 'selected' : ''; ?>>女性</option>
                    <option value="其他" <?php echo $user['gender'] === '其他' ? 'selected' : ''; ?>>其他</option>
                </select>
            </div>

            <!-- 提交按鈕 -->
            <button type="submit" class="btn btn-primary">更新資料</button>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#changePasswordModal">
                修改密碼
            </button>
        </form>
    </div>

    <!-- 密碼修改的彈出視窗 -->
    <div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="changePasswordModalLabel">修改密碼</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="changePasswordForm" action="./php/change_password.php" method="POST">
                    <div class="modal-body">
                        <div class="mb-3 position-relative">
                            <label for="currentPassword" class="form-label">當前密碼</label>
                            <div class="input-group">
                                <input type="password" id="currentPassword" name="current_password" class="form-control" required>
                                <button type="button" class="btn btn-outline-secondary toggle-password" data-target="#currentPassword">
                                    <i class="fa fa-eye"></i>
                                </button>
                            </div>
                        </div>
                        <div class="mb-3 position-relative">
                            <label for="newPassword" class="form-label">新密碼</label>
                            <div class="input-group">
                                <input type="password" id="newPassword" name="new_password" class="form-control" required>
                                <button type="button" class="btn btn-outline-secondary toggle-password" data-target="#newPassword">
                                    <i class="fa fa-eye"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
                        <button type="submit" class="btn btn-primary">確認修改</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function removeSuccessParam() {
            // 获取当前的 URL
            const url = new URL(window.location.href);

            // 删除 success 参数
            url.searchParams.delete('success');
            url.searchParams.delete('error');

            // 更新地址栏中的 URL (不会刷新页面)
            window.history.replaceState({}, document.title, url.toString());
        }
    </script>

    <!-- 顯示密碼 -->
    <script>
        document.querySelectorAll('.toggle-password').forEach(button => {
            button.addEventListener('click', function() {
                const target = document.querySelector(this.getAttribute('data-target'));
                const icon = this.querySelector('i');
                if (target.type === 'password') {
                    target.type = 'text';
                    icon.classList.remove('fa-eye');
                    icon.classList.add('fa-eye-slash');
                } else {
                    target.type = 'password';
                    icon.classList.remove('fa-eye-slash');
                    icon.classList.add('fa-eye');
                }
            });
        });
    </script>
</body>

<footer>
    <?php include 'footer.php' ?>
</footer>

</html>