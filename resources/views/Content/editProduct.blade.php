<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Edit Product</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
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
            min-height: 90px;
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

        .validation-error {
            color: #DC5858;
            font-size: 13px;
            margin-top: 6px;
            display: none;
        }

        .max-img-size {
            max-width: 100%;
            max-height: 220px;
            object-fit: cover;
            display: block;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<nav>
    <div class="navbar">
        <div class="logo">
            <a href="{{ route('Content/dashboard') }}">Edit Product</a>
        </div>
        <div class="menu">
            <a href="{{ route('Content/dashboard') }}">Dashboard</a>
        </div>
    </div>
</nav>

<div class="container">
    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- KIRI -->
        <div>
            <div class="form-group">
                <label>Product Name</label>
                <input type="text" name="productName" value="{{ old('productName', $product->productName) }}">
                @error('productName')
                    <div class="validation-error" style="display: block">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Code</label>
                <input type="text" name="code" value="{{ old('code', $product->code) }}">
                @error('code')
                    <div class="validation-error" style="display: block">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Composition</label>
                <textarea name="composition">{{ old('composition', $product->composition) }}</textarea>
                @error('composition')
                    <div class="validation-error" style="display: block">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea name="description">{{ old('description', $product->description) }}</textarea>
                @error('description')
                    <div class="validation-error" style="display: block">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Side Effects</label>
                <textarea name="sideEffects">{{ old('sideEffects', $product->sideEffects) }}</textarea>
                @error('sideEffects')
                    <div class="validation-error" style="display: block">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- KANAN -->
        <div class="form-right">
            <div class="form-group">
                <label>Product Image</label>
                <div class="file-preview-wrapper">
                    <input type="file" name="image" id="imageInput" accept="image/*">
                    <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->productName }}" class="img-fluid max-img-size mb-3">
                    @if($product->image)
                        <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->productName }}" class="img-fluid max-img-size mb-3">
                    @else
                        <img id="imagePreview" alt="Image Preview" class="max-img-size" style="display:none;">
                    @endif
                </div>
                @error('image')
                    <div class="validation-error" style="display: block">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Expired</label>
                <input type="date" name="expired" value="{{ old('expired', \Carbon\Carbon::parse($product->expired)->format('Y-m-d')) }}">
                @error('expired')
                    <div class="validation-error" style="display: block">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Stock</label>
                <input type="number" name="stock" value="{{ old('stock', $product->stock) }}">
                @error('stock')
                    <div class="validation-error" style="display: block">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Category</label>
                <input type="text" name="category" value="{{ old('category', $product->category) }}">
                @error('category')
                    <div class="validation-error" style="display: block">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Price</label>
                <input type="number" name="price" value="{{ old('price', $product->price) }}">
                @error('price')
                    <div class="validation-error" style="display: block">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="submit-btn">Update Product</button>
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
        }
    });
</script>

</body>
</html>
