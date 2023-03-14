const accessToken = '';
const pageId = '107672455547761';

fetch(`https://graph.facebook.com/v16.0/${pageId}/ratings?fields=review_text,reviewer{name}&access_token=${accessToken}`)
  .then(response => response.json())
  .then(data => {
    const reviews = data.data;
    const reviewContainer = document.querySelector('.carousel');
    
    for (let i = 0; i < reviews.length; i++) {
      const review = reviews[i].review_text;
      const reviewerName = reviews[i].reviewer ? reviews[i].reviewer.name : 'Facebook Review';
      const reviewElement = document.createElement('div');
      reviewElement.classList.add('review');
      reviewElement.innerHTML = `
        <p class="review-text">${review}</p>
        <p class="reviewer-name">-${reviewerName}</p>
      `;
      reviewContainer.appendChild(reviewElement);
    }
  })
  .catch(error => console.error(error));

