<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>戒名作成アプリ</title>
    <link rel="stylesheet" href="/css/style.css">
    <style>
        body, html {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background-color: #ccccff; 
        }

        .welcome-container {
            text-align: center;
            position: absolute;
            top: 40%; 
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100%;
        }

        h1 {
            color: #333;
            font-size: 48px;
            margin-bottom: 20px;
        }

        p {
            color: #444; 
            font-size: 18px;
            margin-bottom: 30px;
        }

        .button {
            display: inline-block;
            background-color: #ff69b4; /* ボタン色を変更 */
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: #ff1493;
        }

        .button-primary {
            background-color: #ff1493; 
        }

        .button-primary:hover {
            background-color: #c71585;
        }

        .cherry-blossom-container {
            position: relative;
            height: 100vh;
            width: 100%;
            overflow: hidden;
        }

        .petal {
            position: absolute;
            background-color: #ffc0cb;
            border-radius: 150% 0 150% 0;
            animation: animate-petal 10s linear;
        }

        .petal::after {
            content: "";
            position: absolute;
            top: -14%;
            left: -10%;
            display: block;
            width: 100%;
            height: 100%;
            background-color: #ffc0cb;
            border-radius: 150% 0 150% 0;
            transform: rotate(15deg);
        }

        @keyframes animate-petal {
            0% {
                top: 0;
                opacity: 0;
                transform: rotate(0deg);
            }
            10% {
                opacity: 1;
            }
            90% {
                opacity: 1;
            }
            100% {
                top: 100vh;
                opacity: 0;
                transform: rotate(3000deg);
            }
        }
    </style>
</head>
<body>
<div class="cherry-blossom-container">
    <div class="welcome-container">
        <h1>戒名作成アプリ</h1>
        <p>最後の名前を私たちと一緒に。</p>
        <div class="buttons">
            <a href="login" class="button">ログイン</a>
            <a href="register" class="button button-primary">新規登録</a>
        </div>
    </div>
    <!-- ここにコンテンツを入れる -->
</div>
</body>
</html>

<script>
    window.addEventListener('DOMContentLoaded', () => {
        const section = document.querySelector('.cherry-blossom-container');
        const createPetal = () => {
            const petalEl = document.createElement('span');
            petalEl.className = 'petal';
            const minSize = 10;
            const maxSize = 15;
            const size = Math.random() * (maxSize + 1 - minSize) + minSize;
            petalEl.style.width = `${size}px`;
            petalEl.style.height = `${size}px`;
            petalEl.style.left = Math.random() * innerWidth + 'px';
            section.appendChild(petalEl);
            setTimeout(() => {
                petalEl.remove();
            }, 10000);
        }
        setInterval(createPetal, 600);
    });
</script>
