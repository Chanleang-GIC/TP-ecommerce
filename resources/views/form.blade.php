<!-- resources/views/upload.blade.php -->

<form action="{{ route('image.upload') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="image" accept="image/*">
    <button type="submit">Upload Image</button>
</form>
