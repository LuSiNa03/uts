@echo off
title Salin Foto Profil Fadhil
echo =======================================================
echo     MENYALIN FOTO PROFIL FADHIL KE PROYEK LARAVEL
echo =======================================================
echo.

:: Path file sumber foto Anda
set "SOURCE_IMAGE=%USERPROFILE%\.gemini\antigravity\brain\7efe6265-db1c-421f-a16d-66cc59338832\media__1779111886661.jpg"

:: Path folder tujuan di proyek Laravel
set "DEST_DIR=%~dp0src\public"
set "DEST_IMAGE=%DEST_DIR%\fadhil.jpg"

if not exist "%SOURCE_IMAGE%" (
    echo [ERROR] Foto Anda tidak ditemukan di path:
    echo %SOURCE_IMAGE%
    echo.
    echo Silakan hubungi AI untuk petunjuk lebih lanjut.
    goto end
)

if not exist "%DEST_DIR%" (
    echo [ERROR] Folder tujuan '%DEST_DIR%' tidak ditemukan.
    echo Pastikan script ini dijalankan dari dalam folder utama proyek 'uts'.
    goto end
)

echo Menyalin file foto...
copy /Y "%SOURCE_IMAGE%" "%DEST_IMAGE%" >nul

if %ERRORLEVEL% equ 0 (
    echo.
    echo =======================================================
    echo  [SELESAI] Foto Anda sukses disalin ke public/fadhil.jpg!
    echo  Silakan refresh browser Anda di https://uts.test sekarang!
    echo =======================================================
) else (
    echo.
    echo [ERROR] Gagal menyalin file. Silakan jalankan script ini sebagai Administrator.
)

:end
echo.
pause
