fetch('reviews.json')
  .then(response => response.json())
  .then(data => {
    // process the data and display the reviews
    for (let i = 0; i < data.data.length; i++) {
      const review = data.data[i];
      const reviewHTML = `
        <div class="review">
          <p>${review.message}</p>
          <div class="author">
            <span class="name">${review.name}</span>
            <span class="rating">${'★'.repeat(review.rating)}</span>
          </div>
        </div>
      `;
      carousel.innerHTML += reviewHTML;
    }
  })
  .catch(error => {
    console.error('Error fetching reviews:', error);
  });
