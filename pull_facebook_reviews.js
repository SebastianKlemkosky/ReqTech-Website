



// Replace PAGE_ID and ACCESS_TOKEN with your page ID and access token
const PAGE_ID = "107672455547761";
const ACCESS_TOKEN = "EAAKYP9uj8a4BACnTomctkcTtZBTfywjutZC7TuFwZAFGxBx4IkZChYi66tt2oau8EjikBoVjY2ZCFpaFCUXgOJ6HxZA9mPwiejyT4sE3sEqINV6cSjzfwG7GUXvuaakW8ZC5jaXUDfZAIEiQy7YeceC2YUBdOVeR5a9dEaNHjaWnwfoPPAEokg5ySZC4RtylGDISsH1HEwnl2cGVgqgCMMeZAX";

// Define the URL for the API call
const url = `https://graph.facebook.com/${PAGE_ID}/ratings?fields=review_text,reviewer,created_time,open_graph_story.rating.value&access_token=${ACCESS_TOKEN}`;

// Get the carousel element
const carousel = document.querySelector(".carousel");

// Make the API call
fetch(url)
  .then((response) => response.json())
  .then((data) => {
    // Filter out reviews without a rating
    const reviews = data.data.filter((review) => review["open_graph_story.rating"].value !== undefined);
    // Map the reviews to HTML elements
    const reviewElements = reviews.map((review) => {
      // Create the HTML elements for the review
      const reviewElement = document.createElement("div");
      reviewElement.classList.add("review");
      const authorElement = document.createElement("p");
      authorElement.classList.add("author");
      const ratingElement = document.createElement("div");
      ratingElement.classList.add("rating");
      const starRating = Math.round(review["open_graph_story.rating"].value);
      for (let i = 0; i < starRating; i++) {
        const starElement = document.createElement("span");
        starElement.innerHTML = "&#9733;"; // filled star
        ratingElement.appendChild(starElement);
      }
      for (let i = starRating; i < 5; i++) {
        const starElement = document.createElement("span");
        starElement.innerHTML = "&#9734;"; // empty star
        ratingElement.appendChild(starElement);
      }
      const messageElement = document.createElement("p");
      messageElement.classList.add("message");
      // Set the text content for the HTML elements
      authorElement.textContent = review.reviewer.name;
      messageElement.textContent = review.review_text;
      // Append the HTML elements to the review element
      reviewElement.appendChild(authorElement);
      reviewElement.appendChild(ratingElement);
      reviewElement.appendChild(messageElement);
      return reviewElement;
    });
    // Add the review elements to the carousel
    reviewElements.forEach((reviewElement) => {
      carousel.appendChild(reviewElement);
    });
  })
  .catch((error) => {
    console.log(error);
  });
