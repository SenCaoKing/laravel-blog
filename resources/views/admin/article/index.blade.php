<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Document</title>
</head>
<body>

<script src="//cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<script src="{{ asset('statics/editormd/lib/marked.min.js') }}"></script>
<script>
    var str = '<script>';
var str = marked(str);
console.log(str);
$('body').sppend(str);
</script>
</body>
</html>