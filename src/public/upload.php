<?php
// src/public/upload.php

if (isset($_FILES['photo'])) {
    // Save to Laravel's writable storage directory to bypass permissions
    $targetDir = __DIR__ . '/../storage/app/public';
    
    // Ensure directory exists
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }
    
    $target = $targetDir . '/fadhil.jpg';
    if (move_uploaded_file($_FILES['photo']['tmp_name'], $target)) {
        // Success! Redirect to home page
        header('Location: /');
        exit;
    } else {
        $error = "Gagal memindahkan file ke folder storage. Silakan coba lagi.";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Foto Profil - Fadhil</title>
    <style>
        body {
            background-color: #FAF9F6;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        .card {
            background: white;
            padding: 40px 30px;
            border-radius: 24px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.03);
            border: 1px solid #f0f0f0;
            text-align: center;
            max-width: 380px;
            width: 100%;
            box-sizing: border-box;
        }
        h2 { 
            color: #800000; 
            margin-top: 0;
            margin-bottom: 8px; 
            font-weight: 900;
            font-size: 22px;
        }
        p { 
            color: #666; 
            font-size: 14px; 
            margin-bottom: 25px; 
            line-height: 1.5;
        }
        .btn-upload {
            background-color: #800000;
            color: white;
            border: none;
            padding: 14px 25px;
            border-radius: 12px;
            font-weight: bold;
            font-size: 14px;
            cursor: pointer;
            width: 100%;
            margin-top: 15px;
            box-shadow: 0 4px 6px rgba(128, 0, 0, 0.15);
            transition: all 0.2s;
        }
        .btn-upload:hover { 
            background-color: #600000; 
            transform: translateY(-1px);
        }
        input[type="file"] {
            display: none;
        }
        .file-label {
            border: 2px dashed #ffd1d1;
            background: #fff5f5;
            padding: 24px 20px;
            border-radius: 16px;
            display: block;
            cursor: pointer;
            color: #800000;
            font-weight: bold;
            font-size: 14px;
            transition: all 0.2s;
        }
        .file-label:hover { 
            background: #ffebeb; 
            border-color: #800000;
        }
        .error-msg {
            color: #e53e3e;
            font-size: 13px;
            margin-top: 10px;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <div class="card">
        <h2>Upload Foto Profil 📸</h2>
        <p>Pilih foto air terjun Anda dari komputer untuk dipasang langsung di kartu profil portofolio.</p>
        
        <?php if (isset($error)): ?>
            <div class="error-msg"><?php echo $error; ?></div>
        <?php endif; ?>

        <form action="" method="POST" enctype="multipart/form-data">
            <label for="file-input" class="file-label" id="label-text">📂 Klik untuk Pilih Foto</label>
            <input type="file" id="file-input" name="photo" accept="image/*" required onchange="updateLabel()">
            <button type="submit" class="btn-upload">Pasang Foto Sekarang! 🚀</button>
        </form>
    </div>
    <script>
        function updateLabel() {
            const input = document.getElementById('file-input');
            const label = document.getElementById('label-text');
            if (input.files.length > 0) {
                label.innerHTML = "✅ " + input.files[0].name;
                label.style.background = "#e6fffa";
                label.style.borderColor = "#319795";
                label.style.color = "#234e52";
            }
        }
    </script>
</body>
</html>
