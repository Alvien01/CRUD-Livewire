<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? config('app.name') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    @livewireStyles
    <style>
        /* Tambahan untuk sidebar di desktop */
        .sidebar {
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: 200px;
            background-color: #007bff;
            padding-top: 20px; /* Adjusted padding for better spacing */
            border-right: 1px solid #dee2e6;
            transition: transform 0.3s ease;
        }

        .sidebar.hidden {
            transform: translateX(-100%);
        }

        .content {
            margin-left: 220px;
            transition: margin-left 0.3s ease;
        }

        .content.shifted {
            margin-left: 20px;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: absolute;
                transform: translateX(-100%);
            }

            .content {
                margin-left: 0;
            }
        }

        .sidebar-header {
            font-size: 24px; /* Make the Livewire header larger */
            color: white; /* Color for the header */
            text-align: center; /* Center the header text */
            margin-bottom: 20px; /* Space below the header */
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="/">Livewire</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav"></ul>
                <button class="btn btn-toggle ms-auto" id="toggleSidebar">
                    <i class="navbar-toggler-icon"></i> <!-- Ikon hamburger -->
                </button>
            </div>
        </div>
    </nav>

    <!-- Sidebar untuk Desktop -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header" href="/">Livewire</div> <!-- Header for Livewire -->
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link text-white" href="/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="/kategori">Kategori</a>
            </li>
        </ul>
    </div>

    <!-- Konten Utama -->
    <div class="content" id="content">
        <div class="container">
            <div class="row justify-content-center mt-3">
                @livewire('post')
            </div>
        </div>
    </div>

    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+W1DWSTiN1p6w4ujBfp7iomdMVSy"
        crossorigin="anonymous"></script>
    <script>
        // JavaScript untuk mengontrol sidebar
        const sidebar = document.getElementById('sidebar');
        const content = document.getElementById('content');
        const toggleButton = document.getElementById('toggleSidebar');

        toggleButton.addEventListener('click', () => {
            sidebar.classList.toggle('hidden');
            content.classList.toggle('shifted');
        });
    </script>
</body>

</html>
