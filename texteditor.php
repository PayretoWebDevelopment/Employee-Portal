<!DOCTYPE html>
<html>
<head>
  <script src="https://cdn.tiny.cloud/1/ihh2hj69o4753irn85ezl6bo8d4rsus9gj5nigzha8sxw1i0/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
</head>
<body>
  <textarea id="mytextarea">
    Welcome to TinyMCE!
  </textarea>
  <button onclick="getEditorContent()">Get Content</button>

    <script>
    tinymce.init({
        selector: '#mytextarea',
        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
    });
    </script>

  <script>
  function getEditorContent() {
    var content = tinymce.activeEditor.getContent();
    console.log(content);
  }
  </script>
</body>
</html>