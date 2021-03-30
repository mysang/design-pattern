<?php

/** Creator */
abstract class SocialNetworkPoster
{
    abstract public function getSocialNetwork() : SocialNetworkConnector;

    public function post($content)
    {
        $network = $this->getSocialNetwork();
        $network->logIn();
        $network->createPost($content);
        $network->logOut();
    }
}

/** Concrete creator */
class FacebookPoster extends SocialNetworkPoster
{
    private $username, $password;

    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    public function getSocialNetwork() : SocialNetworkConnector
    {
        return new FacebookConnector($this->username, $this->password);
    }
}

/** Product */
interface SocialNetworkConnector
{
    public function logIn();
    public function logOut();
    public function createPost($content);
}

class FacebookConnector implements SocialNetworkConnector
{
    private $username, $password;

    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    public function logIn()
    {
        echo "Send API to log in user $this->email with password $this->password\n";
    }

    public function logOut()
    {
        echo "Send API to log out user $this->email with password $this->password\n";
    }

    public function createPost($content)
    {
        echo "Send API to post content: $content\n";
    }
}


function clientCode(SocialNetworkPoster $network, $content)
{
    return $network->post($content);
}

$content = "Hello world!";
$fbPoster = new FacebookPoster('sangnck@gmail.com', 'ahihi');

clientCode($fbPoster, $content);
