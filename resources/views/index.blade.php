<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EmplySys</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        /* Add your custom styles here */
        .background-container {
            background-image: url('/images/landing-bg.jpg'); /* Replace with the path to your image */
            background-size: cover;
            background-position: center;
            height: 100vh;
            position: relative;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6); /* Adjust the alpha value for the desired overlay darkness */
        }

        .landing-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            color: white;
            z-index: 1; /* Set the text color to be visible on the overlay */
        }

        .landing-text {
            text-align: center;
            font-size: 3rem;
            font-weight: bold;
            color: white; 
            z-index: 2;/* Set text color */
        }

        .btn-primary {
            z-index: 2; /* Ensure the button is above the overlay */
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg shadow" style="background-color: #D3D3D3;">
        <div class="container">
            <a class="navbar-brand text-dark" href="#">
                <h2><i class="bi bi-buildings-fill me-2"></i>EmplySys</h2>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <strong><a class="nav-link active" aria-current="page" href="/login"><i class="bi bi-box-arrow-in-right me-2"></i>Login</a></strong>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <div class="background-container">
        <div class="overlay"></div>

        <div class="container landing-container text-center">
            <h1 class="landing-text">Welcome to EmplySys - Employee Management System</h1>
            <p class="text-white" style="z-index: 2;">Nurturing Growth, Fostering Excellence in Employee Management</p>
            <!-- Add more content or call-to-action buttons as needed -->
            <a href="/login" class="btn btn-primary mt-3">Get Started</a>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-light text-center py-2">
        <div class="container">
            <p>&copy; 2022 EmplySys. All rights reserved.</p>

        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>