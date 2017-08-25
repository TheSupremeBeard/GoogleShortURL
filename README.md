# GoogleShortURL
Easy client for shortening URLs via Google Short URL API.

# Installation
Simply add this class to your project.

# Setup
Open up GoogleShortURL.php and in the construct function change <b>your-google-key</b> to the key given to you by Google.

# Shortening a URL
To shorten a url just call the static class <b>GoogleShortURL</b> and the function <b>generate</b> passing the URL you want to shorten to the function.

# Example
$short_url = GoogleShortURL::generate('https://www.mylink.com');
