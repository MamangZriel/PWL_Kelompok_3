<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        .register-container {
            background: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        .register-title {
            text-align: center;
            margin-bottom: 2rem;
            color: #333;
        }
        .form-group {
            margin-bottom: 1rem;
        }
        label {
            display: block;
            margin-bottom: 0.5rem;
            color: #555;
            font-weight: bold;
        }
        input[type="text"], 
        input[type="email"], 
        input[type="tel"],
        input[type="password"] {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
            box-sizing: border-box;
        }
        input:focus {
            outline: none;
            border-color: #007bff;
        }
        .register-btn {
            width: 100%;
            padding: 0.75rem;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .register-btn:hover {
            background-color: #218838;
        }
        .login-link {
            text-align: center;
            margin-top: 1rem;
        }
        .login-link a {
            color: #007bff;
            text-decoration: none;
        }
        .login-link a:hover {
            text-decoration: underline;
        }
        .alert {
            padding: 0.75rem;
            margin-bottom: 1rem;
            border-radius: 4px;
            display: none;
        }
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .alert-error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .errors {
            color: #dc3545;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h2 class="register-title">Register</h2>
        
        <div id="alert" class="alert"></div>
        
        <form id="registerForm">
            @csrf
            <div class="form-group">
                <label for="name">Nama:</label>
                <input type="text" id="name" name="name" required>
                <div id="name-error" class="errors"></div>
            </div>
            
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <div id="email-error" class="errors"></div>
            </div>
            
            <div class="form-group">
                <label for="phone">No. Telepon:</label>
                <input type="tel" id="phone" name="phone" required>
                <div id="phone-error" class="errors"></div>
            </div>
            
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <div id="password-error" class="errors"></div>
            </div>
            
            <div class="form-group">
                <label for="password_confirmation">Konfirmasi Password:</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required>
                <div id="password_confirmation-error" class="errors"></div>
            </div>
            
            <button type="submit" class="register-btn">Daftar</button>
        </form>
        
        <div class="login-link">
            <p>Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a></p>
        </div>
    </div>

    <script>
        document.getElementById('registerForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            const alert = document.getElementById('alert');
            
            // Clear previous errors
            document.querySelectorAll('.errors').forEach(el => el.textContent = '');
            
            fetch('{{ route("register") }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert.className = 'alert alert-success';
                    alert.textContent = data.message;
                    alert.style.display = 'block';
                    
                    // Redirect ke dashboard atau halaman utama
                    setTimeout(() => {
                        window.location.href = '/dashboard'; // Sesuaikan dengan route Anda
                    }, 1000);
                } else {
                    alert.className = 'alert alert-error';
                    alert.textContent = data.message;
                    alert.style.display = 'block';
                    
                    // Display validation errors
                    if (data.errors) {
                        Object.keys(data.errors).forEach(field => {
                            const errorElement = document.getElementById(field + '-error');
                            if (errorElement) {
                                errorElement.textContent = data.errors[field][0];
                            }
                        });
                    }
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert.className = 'alert alert-error';
                alert.textContent = 'Terjadi kesalahan. Silakan coba lagi.';
                alert.style.display = 'block';
            });
        });
    </script>
</body>
</html>