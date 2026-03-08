<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Pengaturan karakter dan judul halaman -->
    <meta charset="UTF-8">
    <title>Readify Sistem</title>

    <!-- Library icon FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>

        /* ================= RESET CSS =================
           Menghilangkan margin dan padding default browser
        */
        * { margin: 0; padding: 0; box-sizing: border-box; }

        /* ================= BACKGROUND VIDEO =================
           Video digunakan sebagai background halaman
        */
        .video-bg {
            position: fixed;
            top: 0; 
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 0;
        }

        /* mengatur agar video memenuhi layar */
        .video-bg video {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* ================= BODY =================
           Mengatur layout halaman agar berada di tengah layar
        */
        body {
            font-family: Arial, sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        /* ================= CONTAINER UTAMA =================
           Kotak utama yang menampilkan informasi sistem
        */
        .container {
            position: relative;
            z-index: 1;

            /* background semi transparan agar video tetap terlihat */
            background: rgba(255, 255, 255, 0.75);

            padding: 20px 20px;
            border-radius: 12px;
            text-align: center;

            /* efek bayangan */
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);

            width: 420px;

            /* animasi hover */
            transition: transform 0.3s ease;
        }

        /* efek saat cursor berada di container */
        .container:hover {
            transform: translateY(-5px);
        }

        /* ================= JUDUL ================= */
        h1 {
            font-size: 28px;
            margin-bottom: 15px;
            color: #000;
        }

        /* icon buku pada judul */
        h1 span {
            font-size: 36px;
        }

        /* ================= PARAGRAPH =================
           deskripsi sistem
        */
        p {
            color: #555;
            font-size: 15px;
            margin-bottom: 35px;
        }

        /* ================= BUTTON LOGIN ================= */
        .btn {
            display: inline-block;
            padding: 12px 28px;
            background: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            font-size: 15px;

            /* animasi transisi */
            transition: 0.3s;
        }

        /* efek hover tombol */
        .btn:hover {
            background: #0056b3;
            transform: scale(1.05);
        }

        /* pengaturan tambahan tombol */
        .btn::before {
            font-size: 16px;
        }

    </style>
</head>

<body>



<!-- ================= CONTAINER HALAMAN UTAMA ================= -->

<div class="container">

    <!-- Judul sistem -->
    <h1><span>📚</span> Readify Sistem </h1>

    <!-- deskripsi sistem -->
    <p>
        Your gateway to knowledge.<br>
        Manage books, members, and loans effortlessly.
    </p>

    <!-- tombol menuju halaman login -->
    <a href="login.php" class="btn">Login</a>

</div>

</body>
</html>