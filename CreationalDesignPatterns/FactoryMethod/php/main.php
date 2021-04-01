<?php

/**
 * ==== Creation Design Pattern
 * ==== Factory Method
 */

/**
 * Creator SocialNetworkPoster
 */
abstract class SocialNetworkPoster
{
    /**
     * Abstract function to get social network
     */
    abstract public function getSocialNetwork() : SocialNetworkConnector;

    /**
     * Post content to social network
     * 
     * @param string $content
     */
    public function post($content)
    {
        // Get network instance
        $network = $this->getSocialNetwork();

        // Login to application
        $network->logIn();

        // Post content
        $network->postContent($content);

        // Logout
        $network->logOut();
    }
}

/**
 * Concrete Creator FacebookPoster
 * 
 * @extends SocialNetworkPoster
 */
class FacebookPoster extends SocialNetworkPoster
{
    /**
     * Account variables
     */
    private $username, $password;

    /**
     * Constructor
     * 
     * @param string $username
     * @param string $password
     * 
     * @return void
     */
    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * Get Social network connector
     */
    public function getSocialNetwork() : SocialNetworkConnector
    {
        return new FacebookConnector($this->username, $this->password);
    }
}

/**
 * Concrete Creator TwitterPoster
 * 
 * @extends SocialNetworkPoster
 */
class TwitterPoster extends SocialNetworkPoster
{
    /**
     * Account variables
     */
    private $email, $password;

    /**
     * Constructor
     * 
     * @param string $email
     * @param string $password
     * 
     * @return void
     */
    public function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * Get Social network connector
     */
    public function getSocialNetwork() : SocialNetworkConnector
    {
        return new FacebookConnector($this->email, $this->password);
    }
}

/**
 * Product SocialNetworkConnector
 */
interface SocialNetworkConnector
{
    /**
     * Login via API
     */
    public function logIn();

    /**
     * Post content via API
     * 
     * @param string $content
     */
    public function postContent($content);

    /**
     * Logout via API
     */
    public function logOut();
}

/**
 * Concrete Product FacebookConnector
 * 
 * @implements SocialNetworkConnector
 */
class FacebookConnector implements SocialNetworkConnector
{
    /**
     * Account variables
     */
    private $username, $password;

    /**
     * Constructor
     * 
     * @param string $username
     * @param string $password
     * 
     * @return void
     */
    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * Login via API
     */
    public function logIn()
    {
        echo "Log in to Facebook via API with username $this->username \n";
    }

    /**
     * Post content via API
     * 
     * @param string $content
     */
    public function postContent($content)
    {
        echo "Post content to Facebook via API with content: \n $content \n";
    }

    /**
     * Logout via API
     */
    public function logOut()
    {
        echo "Log out to Facebook via API with username $this->username \n";
    }
}

/**
 * Concrete Product TwitterConnector
 * 
 * @implements SocialNetworkConnector
 */
class TwitterConnector implements SocialNetworkConnector
{
    /**
     * Account variables
     */
    private $email, $password;

    /**
     * Constructor
     * 
     * @param string $email
     * @param string $password
     * 
     * @return void
     */
    public function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * Login via API
     */
    public function logIn()
    {
        echo "Log in to Facebook via API with email $this->email \n";
    }

    /**
     * Post content via API
     * 
     * @param string $content
     */
    public function postContent($content)
    {
        echo "Post content to Facebook via API with content: \n $content \n";
    }

    /**
     * Logout via API
     */
    public function logOut()
    {
        echo "Log out to Facebook via API with email $this->email \n";
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
function clientCode(SocialNetworkPoster $social, $content)
{
    $social->post($content);
}

// Content
$content = "Xin chao tat ca moi nguoi!";

// Post content to Facebook
$fbPoster = new FacebookPoster("0903760304", "password");
clientCode($fbPoster, $content);

// Post content to Twitter
$twPoster = new TwitterPoster("sangnck@gmail.com", "password");
clientCode($twPoster, $content);
