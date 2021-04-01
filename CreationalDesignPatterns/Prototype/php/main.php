<?php

/**
 * Prototype là một Creational design pattern cho phép bạn sao chép
 * các đối tượng hiện có mà không làm cho code của bạn phụ thuộc vào
 * các lớp của chúng.
 * Độ phức tạp của pattern này là 1.
 * Mức độ phổ biến của pattern này là 2.
 */

 /**
  * Post class of blog
  */
class Post
{
    /** @var string */
    private $title;

    /** @var string */
    private $content;

    /** @var array */
    private $comments = [];

    /** @var DateTime */
    private $published_at;

    /**
     * Constructor
     * 
     * @param string $title
     * @param string $content
     * @param DateTime $date
     */
    public function __construct(string $title, string $content, DateTime $published_at)
    {
        $this->title = $title;
        $this->content = $content;
        $this->published_at = $published_at;
    }

    /**
     * Add comment
     * 
     * @param Comment $comment
     * 
     * @return void
     */
    public function addComment(Comment $comment)
    {
        $comment->addToPost($this);
        $this->comments[] = $comment;
    }

    /**
     * Clone a post and change data
     */
    public function __clone()
    {
        // Reset post's comments
        $this->comments = [];

        // Remove comment to post relationship
        if (!empty($this->comments)) {
            foreach ($this->comments as $comment) {
                $comment->removePost();
            }
        }
    }
}

/**
 * Comment of post
 */
class Comment
{
    /** @var string */
    private $content;
    
    /** @var DateTime */
    private $date;

    /** @var Post */
    private $post = null;

    /**
     * Constructor
     * 
     * @param string $content
     * @param DateTime $date
     */
    public function __construct(string $content, DateTime $date)
    {
        $this->content = $content;
        $this->date = $date;
    }

    /**
     * Add comment to post
     * 
     * @param Post $post
     * 
     * @return void
     */
    public function addToPost(Post $post)
    {
        $this->post = $post;
    }

    /**
     * Remove comment to post relationship
     * 
     * @param Post $post
     * 
     * @return void
     */
    public function removeToPost()
    {
        $this->post = null;
    }
}

/**
 * Client code
 * 
 * @param SocialNetworkPoster $social
 * @param string $content
 * 
 * @return void
 */
function clientCode(Comment $comment, Post $post)
{
    $post->addComment($comment);
    $newPost = clone $post;

    echo "The Comment is:\n";
    print_r($comment);
    echo "====================================\n";

    echo "The original Post is:\n";
    print_r($post);
    echo "====================================\n";

    echo "The clone Post is:\n";
    print_r($newPost);
    echo "====================================\n";
}

// Create date
$date = new DateTime();

// Create new comment
$commentContent = "This is a comment.";
$comment = new Comment($commentContent, $date);

// Create new post
$title = "About Prototype Pattern";
$postContent = "This is the post about Prototype Pattern";
$post = new Post($title, $postContent, $date);

// Client code
clientCode($comment, $post);
