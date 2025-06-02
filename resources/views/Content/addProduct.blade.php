<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Product</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <style>
        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            overflow-x: hidden;
        }

        nav {
            background: #fff;
            border-bottom: 1px solid #eee;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 40px;
        }

        .logo a {
            font-size: 28px;
            font-weight: bold;
            color: #e85d5d;
            text-decoration: none;
        }

        .menu {
            display: flex;
            align-items: center;
        }

        .menu a {
            font-size: 18px;
            margin-left: 30px;
            text-decoration: none;
            color: #333;
            font-weight: 500;
        }

        .container {
            max-width: 1100px;
            margin: 20px auto;
            padding: 0 40px;
        }

        form {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 80px;
        }

        .form-group {
            margin-bottom: 14px;
        }

        label {
            font-weight: 600;
            font-size: 14px;
            display: block;
            margin-bottom: 6px;
        }

        input, textarea {
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            padding: 10px 14px;
            border: 1px solid #ccc;
            border-radius: 8px;
            width: 100%;
            box-sizing: border-box;
        }

        textarea {
            resize: vertical;
            min-height: 110px;
        }

        .submit-btn {
            background-color: #e85d5d;
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 20px;
        }

        .submit-btn:hover {
            background-color: #c84848;
        }

        .form-right {
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
        }

        .file-preview-wrapper {
            display: flex;
            align-items: center;
            gap: 16px;
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 10px 14px;
            background-color: white;
        }

        .file-preview-wrapper input[type="file"] {
            flex: 1;
            border: none;
            font-family: inherit;
            font-size: 14px;
        }

        .file-preview-wrapper img {
            max-height: 220px;
            max-width: 220px;
            border-radius: 0px;
            object-fit: cover;
            display: none;
        }
    </style>
</head>
<body>

<nav>
    <div class="navbar">
        <div class="logo">
            <a href="#">Add Product</a>
        </div>
        <div class="menu">
        <a href="{{ route('dashboard') }}">Dashboard</a>
        </div>
    </div>
</nav>

<div class="container">
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- KIRI -->
        <div>
            <div class="form-group">
                <label>Product Name</label>
                <input type="text" name="productName">
            </div>
            <div class="form-group">
                <label>Code</label>
                <input type="text" name="code">
            </div>
            <div class="form-group">
                <label>Composition</label>
                <textarea name="composition"></textarea>
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea name="description"></textarea>
            </div>
            <div class="form-group">
                <label>Side Effects</label>
                <textarea name="sideEffects"></textarea>
            </div>
        </div>

        <!-- KANAN -->
        <div class="form-right">
            <div class="form-group">
                <label>Product Image</label>
                <div class="file-preview-wrapper">
                    <input type="file" name="image" id="imageInput" accept="image/*">
                    <img id="imagePreview" alt="Image Preview">
                </div>
            </div>
            <div class="form-group">
                <label>Expired</label>
                <input type="date" name="expired">
            </div>
            <div class="form-group">
                <label>Stock</label>
                <input type="number" name="stock">
            </div>
            <div class="form-group">
                <label>Category</label>
                <input type="text" name="category">
            </div>
            <div class="form-group">
                <label>Price</label>
                <input type="number" name="price">
            </div>
            <button type="submit" class="submit-btn">Add Product</button>
        </div>
    </form>
</div>

<script>
    const imageInput = document.getElementById('imageInput');
    const imagePreview = document.getElementById('imagePreview');

    imageInput.addEventListener('change', function () {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                imagePreview.src = e.target.result;
                imagePreview.style.display = 'block';
            };
            reader.readAsDataURL(file);
        } else {
            imagePreview.style.display = 'none';
        }
    });
</script>

</body>
</html>
