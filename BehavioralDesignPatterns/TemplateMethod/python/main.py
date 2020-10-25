import sys
import time
from getpass import getpass
from abc import ABC, abstractmethod

# Định nghĩa các khuôn mẫu và các bước thực hiện
class SocialNetwork(ABC):
  def __init__(self, username: str, password: str):
    self._username = username
    self._password = password

  def post(self, message):
    if self.login(self._username, self._password):
      result = self.sendData(message)
      self.logOut()
      return result
    return False
  
  @abstractmethod
  def login(self, username: str, password: str):
    pass

  @abstractmethod
  def sendData(self, message: str):
    pass

  @abstractmethod
  def logOut(self):
    pass

# Concrete Class này triển khai API Facebook
class Facebook(SocialNetwork):
  def login(self, username: str, password: str):
    print("Checking user's credentials...")
    print("Name: " + self._username)
    print("Password: " + '*'*len(self._password))
    simulateNetworkLatency()
    print("Facebook: " + self._username + " has logged in successfully.")
    return True

  def sendData(self, message: str):
    print("Facebook: " + self._username + " has posted '" + message + "'.")
    return True

  def logOut(self):
    print("Facebook: " + self._username + " has been logged out.")

# Concrete Class này triển khai API Twitter
class Twitter(SocialNetwork):
  def login(self, username: str, password: str):
    print("Checking user's credentials...")
    print("Name: " + self._username)
    print("Password: " + '*'*len(self._password))
    simulateNetworkLatency()
    print("Twitter: " + self._username + " has logged in successfully.")
    return True

  def sendData(self, message: str):
    print("Twitter: " + self._username + " has posted '" + message + "'.")
    return True

  def logOut(self):
    print("Twitter: " + self._username + " has been logged out.")

def simulateNetworkLatency():
  i = 0
  while (i < 5):
    print(".", end='', flush=True)
    time.sleep(1)
    i += 1
  print("\n")

# The client code
print("Username: ")
username = str(input())
password = str(getpass())
print("Message: ")
message = str(input())

print("Choose the social network to post the message:\n")
print("1 - Facebook")
print("2 - Twitter")

choice = int(input())

if choice == 1:
  network = Facebook(username, password)
elif choice == 2:
  network = Twitter(username, password)
else:
  sys.exit("Sorry, I'm not sure what you mean by that.")

network.post(message)
