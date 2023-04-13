<div class="forum-container">
  <?php 
    // Fetch all topics from the database
    $query = "SELECT * FROM topics";
    $result = mysqli_query($conn, $query);

    while($row = mysqli_fetch_assoc($result)){
      $topic_id = $row['id'];
      $topic_title = $row['title'];
      $topic_content = $row['content'];
      $topic_author = $row['author'];
      $topic_date = $row['created_at'];

      // Display each topic
      echo '<div class="forum-topic">';
      echo '<h2 class="topic-title">' . $topic_title . '</h2>';
      echo '<p class="topic-content">' . $topic_content . '</p>';
      echo '<p class="topic-author">Posted by ' . $topic_author . ' on ' . $topic_date . '</p>';

      // Display the replies to the topic
      $query_replies = "SELECT * FROM replies WHERE topic_id=$topic_id";
      $result_replies = mysqli_query($conn, $query_replies);

      while($row_reply = mysqli_fetch_assoc($result_replies)){
        $reply_content = $row_reply['content'];
        $reply_author = $row_reply['author'];
        $reply_date = $row_reply['created_at'];

        echo '<div class="forum-reply">';
        echo '<p class="reply-content">' . $reply_content . '</p>';
        echo '<p class="reply-author">Posted by ' . $reply_author . ' on ' . $reply_date . '</p>';
        echo '</div>';
      }

      // Display the form to add a new reply
      echo '<div class="forum-reply-form">';
      echo '<h3>Add a Reply</h3>';
      echo '<form method="post" action="add_reply.php">';
      echo '<input type="hidden" name="topic_id" value="' . $topic_id . '">';
      echo '<label for="reply-author">Your Name</label>';
      echo '<input type="text" name="author" id="reply-author">';
      echo '<label for="reply-content">Your Reply</label>';
      echo '<textarea name="content" id="reply-content"></textarea>';
      echo '<button type="submit">Submit</button>';
      echo '</form>';
      echo '</div>';

      echo '</div>';
    }
  ?>
</div>
