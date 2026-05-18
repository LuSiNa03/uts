#!/bin/bash
# push.sh

echo ""
echo "=================================================="
echo "🚀 Memulai Proses Push Portofolio ke GitHub"
echo "=================================================="
echo ""

# 1. Staging perubahan
echo "📦 1. Mengumpulkan semua file perubahan..."
git add .
echo "✅ File berhasil dikumpulkan."
echo ""

# 2. Commit perubahan
echo "💾 2. Membuat riwayat commit UTS..."
git commit -m "UTS Pemrograman Web - Portfolio Premium Fadhil Afiq Badruzzaman"
echo "✅ Commit berhasil dibuat."
echo ""

# 3. Push ke remote repository
echo "🚀 3. Mengunggah perubahan ke GitHub..."
if git push origin main; then
    echo ""
    echo "=================================================="
    echo "🎉 BERHASIL! Website UTS Anda sudah aktif di GitHub!"
    echo "=================================================="
else
    echo "⚠️ Mencoba push ke branch master..."
    if git push origin master; then
        echo ""
        echo "=================================================="
        echo "🎉 BERHASIL! Website UTS Anda sudah aktif di GitHub!"
        echo "=================================================="
    else
        echo "❌ Gagal mengunggah ke GitHub. Pastikan internet Anda aktif dan Anda memiliki akses tulis ke repositori ini."
    fi
fi
echo ""
