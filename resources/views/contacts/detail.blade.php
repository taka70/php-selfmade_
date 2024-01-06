<?php

$id = $_GET['id'];
echo $id;

include('update.php');

//SQL準備
$stmt = $dbh->prepare('SELECT * FROM cafe.contacts Where id = :id');
$stmt->bindValue(':id', (int)$id, PDO::PARAM_INT);

//SQL実行
$stmt->execute();

//結果を取得
$result = $stmt->fetch(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
<link rel="stylesheet" style="text/css" href="./css/style.css">
<title>cafe-cafe</title>
</head>
 <body>
    <?php
    include('header1.php'); // ヘッダーの共通化
    ?>
    <section>
        <div class="contact_box">
        <h2 style=background-color:coral;>お問い合わせ内容の編集</h2>
        <form id="myForm" action="edit.php" method="post" >
            <h3>下記の項目をご記入の上送信ボタンを押してください</h3>
            <p>送信頂いた件につきましては、当社より折り返しご連絡を差し上げます。</p>
            <p>なお、ご連絡までに、お時間を頂く場合もございますので予めご了承ください。</p>
            <p><span class="required">*</span>
            は必須項目となります。</p>
            <dl>
            </dt>
                <dt>
                    <label for="name">氏名</label>
                    <span class="required">*</span>
                </dt>
                    <div class="error-message">
                        <?php
                            echo $error_messages["name"];
                        ?>
                    </div>
                <dd>
                    <div class="form-input-error"></div>
                    <input type="text" name="name" id="name" placeholder="山田太郎" value="<?php echo htmlspecialchars($name_value, ENT_QUOTES); ?>">
                </dd>
                <dt>
                    <label for="kana">フリガナ</label>
                    <span class="required">*</span>
                </dt>
                    <div class="error-message">
                        <?php
                            echo $error_messages["kana"];
                        ?>
                    </div>
                <dd>
                    <div class="form-input-error"></div>
                    <input type="text" name="kana" id="kana" placeholder="ヤマダタロウ" value="<?php echo htmlspecialchars($kana_value, ENT_QUOTES); ?>">
                </dd>
                <dt>
                    <label for="number">電話番号</label>
                </dt>
                    <div class="error-message">
                        <?php
                            echo $error_messages["number"];
                        ?>
                    </div>
                <dd>
                    <div class="form-input-error"></div>
                    <input type="text" name="number" id="number" placeholder="09012345678" value="<?php echo htmlspecialchars($number_value, ENT_QUOTES); ?>">
                </dd>
                <dt>
                    <label for="mail">メールアドレス</label>
                    <span class="required">*</span>
                </dt>
                    <div class="error-message">
                        <?php
                            echo $error_messages["mail"];
                        ?>
                    </div>
                <dd>
                        <div class="form-input-error"></div>
                    <input type="text" name="mail" id="mail" placeholder="test@test.co.jp" value="<?php echo htmlspecialchars($mail_value, ENT_QUOTES); ?>">
                </dd>
            </dl>
            <h3>
                <label for="body">
                    "お問い合わせ内容をご記載ください"
                    <span class="required">*</span>
                </label>
            </h3>
                <div class="error-message">
                    <?php
                        echo $error_messages["body"];
                    ?>
                </div>
            <dl class="body">
                <dd>
                    <div class="form-input-error"></div>
                    <textarea name="body" id="body"><?php echo htmlspecialchars($body_value, ENT_QUOTES); ?></textarea>
                </dd>
            </dl>
            <dd>
                <button type="submit" class="submit">送信</button>
            </dd>
            </form>
    </div>
</section>
            <table border="1">
    <tr class="tableColor">
        <td>ID</td>
        <td>名前</td>
        <td>フリガナ</td>
        <td>電話番号</td>
        <td>メールアドレス</td>
        <td>お問い合わせ内容</td>
        <td></td>
        <td></td>
    </tr>
    <tr class="tableColor2">
        <td><?php echo $row['id'] ?></td>
        <td><?php echo $row['name'] ?></td>
        <td><?php echo $row['kana'] ?></td>
        <td><?php echo $row['tel'] ?></td>
        <td><?php echo $row['mail'] ?></td>
        <td><?php echo $row['body'] ?></td>
        <a href = 'edit_contact.php' class="submit" style=color:black;>編集</a>
        <a href = 'cafe.php#sectionId'><?php echo "削除" ?></a>
    </tr>
    </table>
    <?php
include('footer.php'); ?> <!-- フッターの共通化 -->
<script src="./css/index1.js"></script>

</body>
</html>