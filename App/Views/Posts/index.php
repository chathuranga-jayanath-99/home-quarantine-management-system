<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Posts</title>
</head>
<body>
    <?php foreach ($posts as $post): ?>
        <h1><ul><?php echo $post['title']; ?></ul></h1>
        <ul><?php echo $post['content']; ?></ul>
    <?php endforeach; ?>
</body>
</html>