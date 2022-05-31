<?php 

    include(ROOT_PATH . "/app/database/db.php");
    include(ROOT_PATH . "/app/helpers/middleware.php");
    include(ROOT_PATH . "/app/helpers/validateTopic.php");

    $table = 'topics';

    $errors = array();

    $id = '';
    $name = '';
    $description = '';

    $topics = selectAll($table);

    if (isset($_POST['add-topic'])) {
        adminOnly();

        $errors = validateTopic($_POST);
        
        if(count($errors) === 0) {
            
                unset($_POST['add-topic']);
                $topic_id = create($table, $_POST); // create new topic and return topic id
                $_SESSION['message'] = 'Topic created successfully';
                $_SESSION['type'] = 'success';
                header('location: ' . BASE_URL . '/admin/topics/index.php'); //redirect user  to index php
                exit();   
        } else {
                $name = $_POST['name'];
                $description = $_POST['description'];
        }
            
    }



    if (isset($_GET['id'])) {
                //this two lines say when you edit select id and get it select topic with using id that we has got it from url 
                $id = $_GET['id'];
                $topic = selectOne($table, ['id' => $id]);

                $id = $topic['id'];
                $name = $topic['name'];
                $description = $topic['description'];
            
    }



    if (isset($_GET['del-id'])) {
        adminOnly();
                //this two lines say when you edit select id and get it select topic with using id that we has got it from url 
                $id = $_GET['del-id'];
                $count = delete($table, $id);
                $_SESSION['message'] = 'Topic updated successfully';
                $_SESSION['type'] = 'success';
                header('location: ' . BASE_URL . '/admin/topics/index.php'); //redirect user  to index php
                exit();
    }



    if (isset($_POST['update-topic'])) {
        adminOnly();
                //this two lines say when you edit select id and get it select topic with using id that we has got it from url 
        $errors = validateTopic($_POST);
        
        if(count($errors) === 0) {
                $id = $_POST['id'];
                unset($_POST['update-topic'], $_POST['id']);
                $topic_id = update($table, $id, $_POST);
                $_SESSION['message'] = 'Topic updated successfully';
                $_SESSION['type'] = 'success';
                header('location: ' . BASE_URL . '/admin/topics/index.php');
                exit();   
        } else {
                $id = $_POST['id'];
                $name = $_POST['name'];
                $description = $_POST['description'];
        }
        
    }



