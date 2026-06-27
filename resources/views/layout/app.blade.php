<!DOCTYPE html>
<html>
<head>
    <title>Sistem Plotting Asesor</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body{
            background:#f4f6f9;
        }

        .sidebar{
            width:250px;
            height:100vh;
            position:fixed;
            background:#343a40;
            padding:20px;
        }

        .sidebar h3{
            color:white;
            margin-bottom:30px;
        }

        .sidebar a{
            color:white;
            display:block;
            padding:12px;
            text-decoration:none;
            border-radius:10px;
            margin-bottom:10px;
            transition:0.3s;
        }

        .sidebar a:hover{
            background:#0d6efd;
        }

        .content{
            margin-left:270px;
            padding:30px;
        }

        .card{
            border:none;
            border-radius:20px;
            box-shadow:0 0 20px rgba(0,0,0,0.05);
        }

    </style>

</head>
<body>

<div class="sidebar">

    <h3>Plotting Asesor</h3>

    <a href="/dashboard">Dashboard</a>
    <a href="/asesor">Data Asesor</a>
    <a href="/peserta">Data Peserta</a>
    <a href="/tuk">Data TUK</a>
    <a href="/plotting">Plotting</a>

</div>

<div class="content">

    @yield('content')

</div>

</body>
</html>