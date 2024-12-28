<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
  </head>
  <body>
    <div id="news-feed">
      <h1>Greening Cities: The Rise of Urban Gardening</h1>
      <p>
        Urbanites worldwide are transforming limited spaces into green
        sanctuaries—balconies, rooftops, and community plots. From small-scale
        innovations like Sarah's balcony garden to citywide initiatives, urban
        gardening is reshaping city life. Embracing challenges with hydroponics
        and vertical solutions, this movement goes beyond a trend, fostering a
        connection with nature, promoting sustainability, and building
        communities in the heart of urban chaos. Join the flourishing green
        revolution urban gardening welcomes all, from seasoned gardeners to
        novices.
      </p>
    </div>
    <button id="load-more">Load More</button>
  </body>
  <script src="">

document.getElementById('load-more').addEventListener('click', function () {
  // Create a new XMLHttpRequest object
  var xhr = new XMLHttpRequest();

  // Define the callback function to handle the server response
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4) {
      // Check if the request was successful (status code 200)
      if (xhr.status === 200) {
        // Process the server response and update the news feed
        document.getElementById('news-feed').innerHTML += xhr.responseText;
      } else {
        // Handle errors gracefully (display an error message, log, etc.)
        console.error('Error loading more content. Status:', xhr.status);
      }
    }
  };

  // Open a GET request to the server endpoint
  xhr.open('GET', 'your-server-endpoint', true);

  // Send the request to the server
  xhr.send();
});

// Define the callback function to handle the server response
xhr.onreadystatechange = function () {
  if (xhr.readyState === 4) {
    // Check if the request was successful (status code 200)
    if (xhr.status === 200) {
      // Process the server response and update the news feed
      var response = JSON.parse(xhr.responseText); // Assuming the response is in JSON format

      // Check if the response is an array (adjust as per your server response structure)
      if (Array.isArray(response)) {
        // Loop through the response and append each item to the news feed
        response.forEach(function (item) {
          appendNewsFeedItem(item);
        });
      } else {
        console.error('Invalid server response format.');
      }
    } else {
      // Handle errors gracefully (display an error message, log, etc.)
      console.error('Error loading more content. Status:', xhr.status);
    }
  }
};

// Function to append a news feed item to the DOM
function appendNewsFeedItem(item) {
  // Create a new div element for the news feed item
  var newsFeedItem = document.createElement('div');

  // Assuming each item has a 'content' property (adjust as per your server response structure)
  newsFeedItem.textContent = item.content;

  // Append the news feed item to the 'news-feed' element
  document.getElementById('news-feed').appendChild(newsFeedItem);
}
  </script>
</html>
