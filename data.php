<?php
    
    if (file_exists('../connections/post.php')) {
        require_once '../connections/post.php’;
    }
    
    
    
    if (file_exists(‘../connections/validation.php')) {
                    require_once '../connections/validation.php';
                    }
                    
                    
                    
                    function getAllPosts(){
                    
                    global $dbconn;
                    
                    $sql = "SELECT *
                    
                    FROM posts
                    
                    WHERE 1
                    
                    ORDER BY active DESC
                    
                    ";
                    
                    
                    
                    $mysql = $dbconn->prepare($sql);
                    $mysql->execute();
                    
                    $mysql = $stmt->fetchAll();
                    
                    $mysql->closeCursor();
                    
                    
                    return $result;
                    
                    }
                    
                    
                    
                    function addPost($title, $creator, $note = NULL){
                    global $dbconn;
                    
                    
                    $dbconn->beginTransaction();
                    
                    try {
                    
                    $sql = "INSERT INTO posts
                    
                    (`title`
                     
                     , active
                     
                     , created_by)
                    
                    VALUES
                    
                    (:title
                     
                     , 1
                     
                     , :creator)";
                    
                    $mysql = $dbconn->prepare($sql);
                    
                    $mysql->bindValue(':title', $title);
                    
                    $mysql->bindValue(':creator', $creator);
                    
                    $mysql->execute();
                    
                    $mysql->closeCursor();
                    
                    
                    $last_post_id = $dbconn->lastInsertID();
                    
                    
                    
                    }
                    
                    catch(PDOException $e)
                    
                    {
                    
                    //echo $e->getMessage();
                    
                    return -1;
                    
                    }
                    
                    
                    
                    try
                    
                    {
                    
                    $sql = "INSERT INTO posts
                    
                    (last_post_id
                     
                     , note
                     
                     , created_by)
                    
                    VALUES
                    
                    (: last_post_id
                     
                     , :note
                     
                     , :creator)";
                    
                    echo "$sql\n$product_id\n$note\n$creator";
                    
                    $mysql2 = $dbconn->prepare($sql);
                    
                    $mysql2->bindValue(':product_id', (int) $last_post_id);
                    
                    $mysql2->bindValue(':note', $note);
                    
                    $mysql2->bindValue(':creator', $creator);
                    
                    $mysql2->execute();
                    
                    $mysql2->closeCursor(); 
                    
                    }
                    
                    catch(PDOException $e)
                    
                    {
                    
                    //echo $e->getMessage();
                    
                    return -2;
                    
                    }
                    
                    $dbconn->commit();
                    
                    
                    
                    return 1;
                    
                    }
    
    
