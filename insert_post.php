<?php
    require_once("head.php");
    require_once("layout/header.php");


    if ($user === null) {
        session_destroy();
        show_error('Datubāzē Tevis nav');
    }

     if (isset($_GET['insert_post'], $_FILES['article_image'], $_POST['article_title'],$_POST['article_content'])) {
            $files_info = $_FILES['article_image'];
            $tmp_name = $files_info['tmp_name'];

            $filename = microtime();
            $filename = str_replace(' ', '_', $filename);
            $filename = str_replace('.', '_', $filename);
            $filename = $filename . ".";

            $pathinfo = pathinfo($files_info['name']);

            $filename = $filename . $pathinfo['extension'];


            $target_file = "./uploads_post/" . $filename;

            $result = move_uploaded_file($tmp_name, $target_file);

            $article_title = $_POST['article_title'];
            $article_content = $_POST['article_content'];

            //$result = $post->insert($article_title, $article_content, $filename);
            $result = Post::insert($article_title, $article_content, $filename, $_SESSION['registered']);
            var_dump($result);
            exit;

            if ($result) {
                if ($usepostr->image !== null && file_exists("./uploads_post/" . $post->image)) {
                    unlink("./uploads_post/" . $post->image);
                }

                /*$post->image = $filename;
                $post->title = $article_title;
                $post->content = $article_content;*/

            }
    }
?>

<div class="row">
    <div class="col-6 ">
    <?php
            $post=Post::get($_SESSION['registered']);
            if ($post!==null){
            echo '<img src="uploads_post/'.$post->image.'" class="img-fluid"  width="170px" align="left" />';
            echo "<h1>" . $post->title . "</h1>";
            echo "<h3>" . $post->content . "</h3>";
           
            echo "<h5> Autors: " . $post->email ;
            echo "<br/>Publicēšanas datums:  " . $post->data . "</datums>";
            }
            //var_dump($_SESSION['registered']);
        ?>
    </div>
    <div class="col-6 ">
        <form action="?insert_post" method="post" enctype="multipart/form-data">
            <div class="custom-file">
                <label class="custom-file-label" for="customFile">Featured image</label>
                <input type="file" name="article_image" class="custom-file-input" id="customFile">
            </div>
            <div class="form-group">
                <label>Article title</label>
                <input type="text" name="article_title" class="form-control" />
            </div>
            <div class="form-group">
                <label>Article content</label>
                <textarea name="article_content" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <input type="submit" value="Submit" />
            </div>
        </form>
        
    </div>
</div>

<?php
    require_once("layout/footer.php");
?>
