<?php

session_start();
$conn = new mysqli("sql211.infinityfree.com", "if0_35339284", "u2GJR7Y0VE", "if0_35339284_blogs");

class blog
{
    public $id;
    public $title;
    public $content;
    public $author;
    public $date;
    public $image;
    public $category;
}

$sql = "SELECT * FROM blog WHERE author = ?";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    echo json_encode(array('message' => 'Database error'));
    exit;
}

$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$posts = array();

if ($result->num_rows === 0) {
    echo json_encode(array('message' => 'No posts found'));
    exit;
} else {

    while ($row = $result->fetch_assoc()) {
        $post = new blog();
        $post->id = $row['id'];
        $post->title = $row['title'];
        $post->content = $row['content'];
        $post->author = $row['author'];
        $post->date = $row['date'];
        $post->image = $row['image'];
        $post->category = $row['category'];
        array_push($posts, $post);
    }

    echo json_encode($posts);
}
